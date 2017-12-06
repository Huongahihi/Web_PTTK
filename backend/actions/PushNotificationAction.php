<?php
namespace backend\actions;

use backend\models\Setting;
use backend\modules\app\models\AppUserDevice;
use common\components\FApi;
use common\components\FHtml;


class PushNotificationAction extends BaseAction
{
    public $is_secured = false;

    public function run()
    {
        if (($re = $this->isAuthorized()) !== true)
            return $re;

        $message = FHtml::getRequestParam(['msg', 'message'] );
        $user_id = FHtml::getRequestParam('user_id', 'users');
        $params = FHtml::getRequestParam(['params'], '');
        $action = FHtml::getRequestParam(['action'], '');

        $a_devices = array();
        $i_devices = array();

        if (empty($user_id) || strlen($user_id) == 0  or $user_id ==0) {
            $android_devices = AppUserDevice::find()->where("type = 1 AND status = 1")->all();
            $ios_devices = AppUserDevice::find()->where("type = 2 AND status = 1")->all();
        } else {
            $android_devices = AppUserDevice::find()->where("user_id = $user_id AND type = 1 AND status = 1")->all();
            $ios_devices = AppUserDevice::find()->where("user_id = $user_id AND type = 2 AND status = 1")->all();
        }

        foreach ($android_devices as $a) {
            array_push($a_devices, $a->gcm_id);
        }

        foreach ($ios_devices as $i) {
            array_push($i_devices, $i->gcm_id);
        }

        if (count($a_devices) > 0) {
            try {
                FApi::pushAndroid($a_devices, $message, $action, $params);
            } catch (\Exception $e) {
                 return $e;
            }
        }

        if (count($i_devices) > 0) {
            try {
                FApi::pushIos($i_devices, $message, $action, $params);
            } catch (\Exception $e) {
                 return $e;
            }
        }
    }
}
