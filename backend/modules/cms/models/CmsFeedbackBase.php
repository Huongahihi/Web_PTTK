<?php

namespace backend\modules\cms\models;

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
 * This is the model class for table "cms_feedback".
 *

 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $title
 * @property string $content
 * @property string $user_id
 * @property string $ip_address
 * @property string $type
 * @property string $status
 * @property string $created_date
 * @property string $application_id
 */
class CmsFeedbackBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_feedback';

    public static function tableName()
    {
        return 'cms_feedback';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return FHtml::currentDb();
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
                    'id' => FHtml::t('CmsFeedback', 'ID'),
                    'name' => FHtml::t('CmsFeedback', 'Name'),
                    'email' => FHtml::t('CmsFeedback', 'Email'),
                    'phone' => FHtml::t('CmsFeedback', 'Phone'),
                    'address' => FHtml::t('CmsFeedback', 'Address'),
                    'title' => FHtml::t('CmsFeedback', 'Title'),
                    'content' => FHtml::t('CmsFeedback', 'Content'),
                    'user_id' => FHtml::t('CmsFeedback', 'User ID'),
                    'ip_address' => FHtml::t('CmsFeedback', 'Ip Address'),
                    'type' => FHtml::t('CmsFeedback', 'Type'),
                    'status' => FHtml::t('CmsFeedback', 'Status'),
                    'created_date' => FHtml::t('CmsFeedback', 'Created Date'),
                    'application_id' => FHtml::t('CmsFeedback', 'Application ID'),
                ];
    }

    public static function tableSchema()
    {
        return FHtml::getTableSchema(self::tableName());
    }

    public static function Columns()
    {
        return self::tableSchema()->columns;
    }

    public static function ColumnsArray()
    {
        return ArrayHelper::getColumn(self::tableSchema()->columns, 'name');
    }

    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        $i18n = Yii::$app->i18n;
        $i18n->translations['CmsFeedback*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsFeedback' => 'CmsFeedback.php',
            ],
        ];
    }



}
