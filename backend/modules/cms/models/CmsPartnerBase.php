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
 * This is the model class for table "cms_partner".
 *

 * @property integer $id
 * @property string $image
 * @property string $name
 * @property string $linkurl
 * @property string $hotline
 * @property string $address
 * @property string $email
 * @property string $overview
 * @property integer $sort_order
 * @property integer $is_top
 * @property integer $is_active
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class CmsPartnerBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_partner';

    public static function tableName()
    {
        return 'cms_partner';
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
                    'id' => FHtml::t('CmsPartner', 'ID'),
                    'image' => FHtml::t('CmsPartner', 'Image'),
                    'name' => FHtml::t('CmsPartner', 'Name'),
                    'linkurl' => FHtml::t('CmsPartner', 'Linkurl'),
                    'hotline' => FHtml::t('CmsPartner', 'Hotline'),
                    'address' => FHtml::t('CmsPartner', 'Address'),
                    'email' => FHtml::t('CmsPartner', 'Email'),
                    'overview' => FHtml::t('CmsPartner', 'Overview'),
                    'sort_order' => FHtml::t('CmsPartner', 'Sort Order'),
                    'is_top' => FHtml::t('CmsPartner', 'Is Top'),
                    'is_active' => FHtml::t('CmsPartner', 'Is Active'),
                    'created_date' => FHtml::t('CmsPartner', 'Created Date'),
                    'created_user' => FHtml::t('CmsPartner', 'Created User'),
                    'modified_date' => FHtml::t('CmsPartner', 'Modified Date'),
                    'modified_user' => FHtml::t('CmsPartner', 'Modified User'),
                    'application_id' => FHtml::t('CmsPartner', 'Application ID'),
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
        $i18n->translations['CmsPartner*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsPartner' => 'CmsPartner.php',
            ],
        ];
    }



}
