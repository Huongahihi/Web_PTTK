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
 * This is the model class for table "cms_service".
 *

 * @property string $id
 * @property string $thumbnail
 * @property string $image
 * @property string $icon
 * @property string $name
 * @property string $overview
 * @property string $content
 * @property string $linkurl
 * @property integer $sort_order
 * @property string $lang
 * @property integer $is_active
 * @property integer $is_top
 * @property string $created_date
 * @property string $created_user
 * @property string $application_id
 */
class CmsServiceBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_service';

    public static function tableName()
    {
        return 'cms_service';
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
                    'id' => FHtml::t('CmsService', 'ID'),
                    'thumbnail' => FHtml::t('CmsService', 'Thumbnail'),
                    'image' => FHtml::t('CmsService', 'Image'),
                    'icon' => FHtml::t('CmsService', 'Icon'),
                    'name' => FHtml::t('CmsService', 'Name'),
                    'overview' => FHtml::t('CmsService', 'Overview'),
                    'content' => FHtml::t('CmsService', 'Content'),
                    'linkurl' => FHtml::t('CmsService', 'Linkurl'),
                    'sort_order' => FHtml::t('CmsService', 'Sort Order'),
                    'lang' => FHtml::t('CmsService', 'Lang'),
                    'is_active' => FHtml::t('CmsService', 'Is Active'),
                    'is_top' => FHtml::t('CmsService', 'Is Top'),
                    'created_date' => FHtml::t('CmsService', 'Created Date'),
                    'created_user' => FHtml::t('CmsService', 'Created User'),
                    'application_id' => FHtml::t('CmsService', 'Application ID'),
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
        $i18n->translations['CmsService*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsService' => 'CmsService.php',
            ],
        ];
    }



}
