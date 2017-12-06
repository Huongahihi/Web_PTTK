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
 * This is the model class for table "cms_slide".
 *

 * @property integer $id
 * @property string $image
 * @property string $name
 * @property string $overview
 * @property string $transition_type
 * @property string $transition_speed
 * @property string $alignment
 * @property string $lang
 * @property string $url1_label
 * @property string $url1_link
 * @property string $url2_label
 * @property string $url2_link
 * @property string $url3_label
 * @property string $url3_link
 * @property integer $sort_order
 * @property integer $is_active
 * @property string $application_id
 */
class CmsSlideBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_slide';

    public static function tableName()
    {
        return 'cms_slide';
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
                    'id' => FHtml::t('CmsSlide', 'ID'),
                    'image' => FHtml::t('CmsSlide', 'Image'),
                    'name' => FHtml::t('CmsSlide', 'Name'),
                    'overview' => FHtml::t('CmsSlide', 'Overview'),
                    'transition_type' => FHtml::t('CmsSlide', 'Transition Type'),
                    'transition_speed' => FHtml::t('CmsSlide', 'Transition Speed'),
                    'alignment' => FHtml::t('CmsSlide', 'Alignment'),
                    'lang' => FHtml::t('CmsSlide', 'Lang'),
                    'url1_label' => FHtml::t('CmsSlide', 'Url1 Label'),
                    'url1_link' => FHtml::t('CmsSlide', 'Url1 Link'),
                    'url2_label' => FHtml::t('CmsSlide', 'Url2 Label'),
                    'url2_link' => FHtml::t('CmsSlide', 'Url2 Link'),
                    'url3_label' => FHtml::t('CmsSlide', 'Url3 Label'),
                    'url3_link' => FHtml::t('CmsSlide', 'Url3 Link'),
                    'sort_order' => FHtml::t('CmsSlide', 'Sort Order'),
                    'is_active' => FHtml::t('CmsSlide', 'Is Active'),
                    'application_id' => FHtml::t('CmsSlide', 'Application ID'),
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
        $i18n->translations['CmsSlide*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsSlide' => 'CmsSlide.php',
            ],
        ];
    }



}
