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
 * This is the model class for table "cms_testimonial".
 *

 * @property integer $id
 * @property string $image
 * @property string $name
 * @property string $description
 * @property string $location
 * @property string $content
 * @property integer $rate
 * @property string $linkurl
 * @property integer $sort_order
 * @property integer $is_active
 * @property integer $is_top
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class CmsTestimonialBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_testimonial';

    public static function tableName()
    {
        return 'cms_testimonial';
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
                    'id' => FHtml::t('CmsTestimonial', 'ID'),
                    'image' => FHtml::t('CmsTestimonial', 'Image'),
                    'name' => FHtml::t('CmsTestimonial', 'Name'),
                    'description' => FHtml::t('CmsTestimonial', 'Description'),
                    'location' => FHtml::t('CmsTestimonial', 'Location'),
                    'content' => FHtml::t('CmsTestimonial', 'Content'),
                    'rate' => FHtml::t('CmsTestimonial', 'Rate'),
                    'linkurl' => FHtml::t('CmsTestimonial', 'Linkurl'),
                    'sort_order' => FHtml::t('CmsTestimonial', 'Sort Order'),
                    'is_active' => FHtml::t('CmsTestimonial', 'Is Active'),
                    'is_top' => FHtml::t('CmsTestimonial', 'Is Top'),
                    'created_date' => FHtml::t('CmsTestimonial', 'Created Date'),
                    'created_user' => FHtml::t('CmsTestimonial', 'Created User'),
                    'modified_date' => FHtml::t('CmsTestimonial', 'Modified Date'),
                    'modified_user' => FHtml::t('CmsTestimonial', 'Modified User'),
                    'application_id' => FHtml::t('CmsTestimonial', 'Application ID'),
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
        $i18n->translations['CmsTestimonial*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsTestimonial' => 'CmsTestimonial.php',
            ],
        ];
    }



}
