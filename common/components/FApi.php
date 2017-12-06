<?php
/**
 * Created by PhpStorm.
 * User: Darkness
 * Date: 11/30/2016
 * Time: 2:00 PM
 */

namespace common\components;


use creocoder\flysystem\FtpFilesystem;
use League\Flysystem\Filesystem;
use yii\base\Exception;
use yii\helpers\BaseInflector;
use yii\helpers\Html;
use yii\helpers\Json;
use Yii;
use Globals;
use common\components\Setting;

include_once('simple_html_dom.php');

class FApi extends FModel
{
    /**
     * API URL
     */
    const GOOGLE_TRANSLATE_API_URL = 'https://www.googleapis.com/language/translate/v2';

    const BASE_API_URL = 'admin/';

    public static function createBaseAPIUrl($action, $params = [], $position = null)
    {
        if (empty($position))
            $position = FHtml::currentZone();
        return FHtml::createUrl(self::BASE_API_URL . $action, $params, $position);
    }

    /**
     * You can translate text from one language
     * to another language
     * @param string $source Source language
     * @param string $target Target language
     * @param string $text Source text string
     * @return array
     */
    public static function translate($source, $target, $text)
    {
        return self::getResponse(self::getGoogleAPIRequest('', $text, $source, $target));
    }

    /**
     * You can discover the supported languages of this API
     * @return array Array supported languages
     */
    public static function discoverLanguage()
    {
        return self::getResponse(self::getGoogleAPIRequest('languages'));
    }

    /**
     * You can detect the language of a text string
     * @param  string $text Source text string
     * @return array        Data properties
     */
    public function detectLanguage($text)
    {
        return self::getResponse(self::getGoogleAPIRequest('detect', $text));
    }

    /**
     * Forming query parameters
     * @param  string $method API method
     * @param  string $text Source text string
     * @param  string $source Source language
     * @param  string $target Target language
     * @return array          Data properties
     */
    public static function getGoogleAPIRequest($method, $text = '', $source = '', $target = '', $key = '')
    {
        if (empty($key))
            $key = FConfig::config(FConfig::SETTINGS_GOOGLE_API_KEY);

        $request = self::GOOGLE_TRANSLATE_API_URL . '/' . $method . '?' . http_build_query(
                [
                    'key' => $key,
                    'source' => $source,
                    'target' => $target,
                    'q' => Html::encode($text),
                ]
            );
        return $request;
    }

    /**
     * Getting response
     * @param string $request
     * @return array
     */
    public static function getResponse($request)
    {
        $response = file_get_contents($request);
        return Json::decode($response, true);
    }

    public static function async($des){
        $url = Yii::$app->urlManager->createAbsoluteUrl($des);

        ignore_user_abort(true); // CAUTION!  run over return
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // comment when test
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1); // Skip receive return
        curl_exec($ch);
        curl_close($ch);
    }

    public static function executeNotification($notificationModel) {

        if (!$notificationModel->is_sent || $notificationModel->sent_date > FHtml::Now()) {
            return;
        }
        $sent_type = FHtml::getFieldValue($notificationModel, 'sent_type');
        if (is_string($sent_type))
            $sent_type = FHtml::decode($sent_type, true);

        if (empty($sent_type))
            return;

        if (empty($notificationModel->sent_date))
            $notificationModel->sent_date = FHtml::Now();

        if (is_array($sent_type) && (in_array('all', $sent_type) || in_array('app', $sent_type))) {

            $url = ['api/push-notification',
                "message" => FHtml::getFieldValue($notificationModel, 'message'),
                'action' => FHtml::getFieldValue($notificationModel, 'action'), //api/news/detail
                'params' => FHtml::getFieldValue($notificationModel, 'params') //id=10
            ];

            FApi::async($url);
        }
    }

    public static function pushAndroid($a_devices, $msg, $action, $params)
    {
        $api_key = \backend\models\Setting::getSettingValueByKey(\Globals::GOOGLE_API_KEY);


        $url = 'https://fcm.googleapis.com/fcm/send';

        $loop = ceil(count($a_devices) / 1000);
        $msg = array
        (
            'message' => $msg,
            'action' => $action,
            'params' => $params
        );

        $success = [];
        $fail = [];

        for ($i = 1; $i <= $loop; $i++) {
            try {
                if (0 < count($a_devices) && count($a_devices) < 1000)
                    $registrationID = $a_devices;
                else {
                    $registrationID = array_slice($a_devices, 0, 1000);
                    $a_devices = array_slice($a_devices, 1000, count($a_devices));
                }

                $fields = array
                (
                    'registration_ids' => $registrationID,
                    'data' => $msg
                );

                $headers = array(
                    'Authorization: key=' . $api_key,
                    'Content-Type: application/json'
                );
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                $result = curl_exec($ch);
                curl_close($ch);
            } catch (\yii\db\Exception $ex) {

            }
            //echo $result;
        }

        return [
            'success' => $success, 'fail' => $fail
        ];
    }

    // Push Notification
    public static function pushIos($i_devices, $message, $action, $params)
    {
        //working any case
        $badge = 1;
        $sound = 'default';
        $development = true;//make it false if it is not in development mode
        $passphrase = 'Leagues';

        $payload = array();
        $payload['aps'] = array(
            'alert' => $message,
            'badge' => intval($badge),
            'sound' => $sound
        );
        $payload['action'] = $action;
        $payload['params'] = $params;


        $payload = json_encode($payload);

        $apns_url = NULL;
        $apns_cert = NULL;
        $apns_port = 2195;

        $pem = Setting::getSettingValueByKey(Globals::SETTINGS_PEM_FILE);

        if (strlen($pem) > 0) {
            if ($development) {
                $apns_url = 'gateway.sandbox.push.apple.com';
                $apns_cert = dirname(Yii::$app->request->scriptFile) . '/' . UPLOAD_DIR . '/' . PEM_DIR . '/' . $pem;
            } else {
                $apns_url = 'gateway.push.apple.com';
                $apns_cert = dirname(Yii::$app->request->scriptFile) . '/' . UPLOAD_DIR . '/' . PEM_DIR . '/' . $pem;
            }
        }

        $stream_context = stream_context_create();
        stream_context_set_option($stream_context, 'ssl', 'local_cert', $apns_cert);
        stream_context_set_option($stream_context, 'ssl', 'passphrase', $passphrase);

        try {
            $apns = stream_socket_client('ssl://' . $apns_url . ':' . $apns_port, $error, $error_string, 2, STREAM_CLIENT_CONNECT, $stream_context);
        } catch (Exception $e) {
            var_dump($e);
            die('Can not connect to APNS');
        }

        $number = 0;

        foreach ($i_devices as $idevice) {
            $number += 1;
            $token = $idevice;
            $device_tokens = str_replace("<", "", $token);
            $device_tokens1 = str_replace(">", "", $device_tokens);
            $device_tokens2 = str_replace(' ', '', $device_tokens1);

            $expiry = time() + 30;

            $apns_message = chr(1) . pack("N", rand(1000, 9999)) . pack("N", $expiry) . pack("n", 32) . pack('H*', $device_tokens2) . pack("n", strlen($payload)) . $payload;
            $msgapns = fwrite($apns, $apns_message);

            usleep(2000);

            if (!$msgapns) {
                //@socket_close($apns);
                @fclose($apns);
            } else {
                $read = array($apns);
                $null = null;
                $changedStreams = stream_select($read, $null, $null, 0, 1000000);

                if ($changedStreams === false) {
                    //fail
                } elseif ($changedStreams > 0) {
                    $responseBinary = fread($apns, 6);
                    if ($responseBinary !== false || strlen($responseBinary) == 6) {
                        $response = unpack('Ccommand/Cstatus_code/Nidentifier', $responseBinary);
                        if ($response['status_code']) {
                            //echo $number . ' Fail!. ';
                            //fail
                            //@socket_close($apns);
                            @fclose($apns);
                            $stream_context = stream_context_create();
                            stream_context_set_option($stream_context, 'ssl', 'local_cert', $apns_cert);
                            stream_context_set_option($stream_context, 'ssl', 'passphrase', $passphrase);
                            $apns = stream_socket_client('ssl://' . $apns_url . ':' . $apns_port, $error, $error_string, 2, STREAM_CLIENT_CONNECT, $stream_context);
                            stream_set_blocking($apns, 0);
                        }
                    }
                } else {
                    //echo $number . ' Success!. ';
                }
            }
        }
        //cause fatal errors
        //@socket_close($apns);
        @fclose($apns);
    }

    public static function setPageMeta($title = '', $description = '', $image = '', $keyword = '', $url = '')
    {
        $key = FHtml::currentController() . '/' . FHtml::currentAction() . ':';
        FHtml::Session()->set($key . 'page_description', $description);
        FHtml::Session()->set($key . 'page_title', $title);
        FHtml::Session()->set($key . 'page_image', $image);
        FHtml::Session()->set($key . 'page_keyword', $image);
    }

    public static function getPageSEO($page = '', $title = '', $description = '', $keyword = '', $image = '', $checkSession = false)
    {
        $key = FHtml::currentController() . '/' . FHtml::currentAction() . ':';

        if (empty($description) && $checkSession)
            $description = FHtml::Session()->get($key . 'page_description');

        if (empty($title) && $checkSession)
            $title = FHtml::Session()->get($key . 'page_title');

        if (empty($image) && $checkSession)
            $image = FHtml::Session()->get($key . 'page_image');

        $title = (!empty($title) ? ($title . ' | ') : FHtml::settingPageTitle(BaseInflector::camel2words(FHtml::currentController())) . ' | ') . FHtml::settingWebsiteName(FHtml::currentCompanyName());
        $title = trim($title, " | .");

        if (empty($description))
            $description = FHtml::settingWebsiteDescription();

        if (empty($image))
            $image = FHtml::settingPageImage();

        $result = '';
        $result .= '<title>' . $title . '</title>';

        $result .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        $result .= '<meta name="description" content="' . trim(FHtml::settingPageDescription() . '|' . FHtml::settingWebsiteDescription() . ' | ' . $description, ", | ") . '" />';
        $result .= '<meta name="keywords" content="' . trim(FHtml::settingWebsiteKeyWords() . ', ' . FHtml::settingPageKeywords() . ', ' . $keyword, ", ") . '" />';
        $result .= '<meta name="robots" content="INDEX,FOLLOW" />';

        $result .= '<meta property="og:url" content="' . FHtml::currentUrl() . '" />';
        $result .= '<meta property="og:title" content="' . $title    . '" />';
        $result .= '<meta property="og:description" content="' . $description . '" />';
        $result .= '<meta property="og:image" content="' . $image . '" />';
        $result .= '<meta property="og:site_name" content="' . FHtml::settingWebsiteName() . '" />';

        $result .= '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
        return $result;
    }
}