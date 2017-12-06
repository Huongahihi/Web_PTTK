<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace common\components;

use common\components\filesystem\FtpFilesystem;
use common\components\filesystem\LocalFilesystem;
use common\components\filesystem\SftpFilesystem;
use Yii;
use yii\base\Component;


class FEmail extends Component
{
    const MAIL_CONTACT = 'Contact';
    const MAIL_ORDER = 'Order';
    const MAIL_TITLES = [
        'Contact' => 'Contact Confirmation',
        'Order' => 'Purchase Order Confirmation'
    ];

    public static function sendEmail($email, $name, $emailCC, $nameCC, $title, $content, $view = '', $params = null) {
        if (!empty($view)) {
            $mail = Yii::$app->mailer->compose($view, $params);
        } else {
            $mail = Yii::$app->mailer->compose()
                ->setHtmlBody($content);
        }
        return $mail->setTo([$emailCC => $nameCC])->setCc($email)
            ->setFrom([$email => $name])
            ->setSubject($title)
            ->send();
    }

    public static function sendEmailFromAdmin($client_email, $client_name, $type, $content, $view = '', $params = null)
    {
        $adminMail = FHtml::settingCompanyEmail(false);
        $adminName = FHtml::currentCompanyName();

        if (key_exists($type, self::MAIL_TITLES))
            $title = FHtml::t('common', self::MAIL_TITLES[$type]);
        else
            $title = FHtml::t('common', $type);

        if (is_object($content)) {
            $params = ['model' => $content];
            $content = FHtml::showObjectAsTable($content);
        }
        else if (is_array($content)) {
            $params = $content;
            $content = FHtml::showArrayAsTable($content);
        }

        //$content = "<div style='padding-top:20px; padding-bottom:20px'>$content</div>";
        $content = self::getContentHeader($type, $client_name) . $content;
        $footer = self::getContentFooter($type, $client_name);

        if (!empty($view))
            $params = array_merge($params, ['content' => $content, 'footer' => $footer]);

        return self::sendEmail($adminMail, $adminName, $client_email, $client_name, $title, $content, $view, $params);
    }

    public static function getContentHeader($type, $client_name) {
        $result = "Dear " . ucfirst($client_name) . ", <br/><br/>";
        $result .= "We already received your $type at " . FHtml::Today(FHtml::settingDateFormat()) . ". We will review and get back to you ASAP. <br/><br/>";

        return "<div style='font-size: 18px; padding-bottom: 20px; color:darkblue'> $result </div>";
    }

    public static function getContentFooter($type, $client_name) {
        $result = '';

        return $result;
    }
}
