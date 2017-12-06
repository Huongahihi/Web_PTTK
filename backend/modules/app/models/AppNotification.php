<?php

namespace backend\modules\app\models;

use Yii;
use common\components\FHtml;
use common\components\FModel;
use common\models\BaseModel;
use frontend\models\ViewModel;
use yii\helpers\ArrayHelper;

/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "app_notification".
 */
class AppNotification extends AppNotificationBase //\yii\db\ActiveRecord
{
    public $is_sent;

    const LOOKUP = ['sent_type' => [
        ['id' => AppNotification::SENT_TYPE_SMS, 'name' => 'sms'],
        ['id' => AppNotification::SENT_TYPE_APP, 'name' => 'app'],
        ['id' => AppNotification::SENT_TYPE_EMAIL, 'name' => 'email'],
        ['id' => AppNotification::SENT_TYPE_MESSAGE, 'name' => 'message'],
        ['id' => AppNotification::SENT_TYPE_ALL, 'name' => 'all'],
    ],
    ];

    const COLUMNS_UPLOAD = [];
    const COLUMNS_ARRAY = ['sent_type'];

    public $order_by = 'created_date desc,';

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];

    public static function getLookupArray($column)
    {
        if (key_exists($column, self::LOOKUP))
            return self::LOOKUP[$column];
        return [];
    }

    public function fields()
    {
        $fields = array_merge(parent::fields(), self::OBJECTS_RELATED);

        foreach (self::COLUMNS_UPLOAD as $field) {
            $this->{$field} = FHtml::getFileURL($this->{$field}, $this->getTableName());
        }

        return $fields;
    }

    public function prepareCustomFields()
    {
        parent::prepareCustomFields();
    }


    public static function getRelatedObjects()
    {
        return self::OBJECTS_RELATED;
    }

    public static function getMetaObjects()
    {
        return self::OBJECTS_META;
    }

    public function beforeSave($insert)
    {
        //$this->sent_type = is_array($this->sent_type) ? FHtml::encode($this->sent_type) : $this->sent_type; // alternatively, can use const COLUMNS_ARRAY = ['sent_type']
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function afterFind()
    {
        //$this->sent_type = is_string($this->sent_type) ? FHtml::decode($this->sent_type) : $this->sent_type; // alternatively, can use const COLUMNS_ARRAY = ['sent_type']
        $this->is_sent = $this->isNewRecord;
        parent::afterFind(); // TODO: Change the autogenerated stub
    }
}