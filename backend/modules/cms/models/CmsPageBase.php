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
 * This is the model class for table "cms_page".
 *

 * @property string $id
 * @property string $code
 * @property string $image
 * @property string $name
 * @property string $description
 * @property string $content
 * @property string $keywords
 * @property string $page_image
 * @property string $page_title
 * @property string $page_slug
 * @property string $page_description
 * @property string $page_content
 * @property string $page_width
 * @property string $page_background
 * @property string $body_css
 * @property string $body_style
 * @property string $page_style
 * @property string $page_script
 * @property integer $views_count
 * @property integer $is_active
 * @property integer $sort_order
 * @property string $created_date
 * @property string $created_user
 * @property string $application_id
 */
class CmsPageBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_page';

    public static function tableName()
    {
        return 'cms_page';
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
                    'id' => FHtml::t('CmsPage', 'ID'),
                    'code' => FHtml::t('CmsPage', 'Code'),
                    'image' => FHtml::t('CmsPage', 'Image'),
                    'name' => FHtml::t('CmsPage', 'Name'),
                    'description' => FHtml::t('CmsPage', 'Description'),
                    'content' => FHtml::t('CmsPage', 'Content'),
                    'keywords' => FHtml::t('CmsPage', 'Keywords'),
                    'page_image' => FHtml::t('CmsPage', 'Page Image'),
                    'page_title' => FHtml::t('CmsPage', 'Page Title'),
                    'page_slug' => FHtml::t('CmsPage', 'Page Slug'),
                    'page_description' => FHtml::t('CmsPage', 'Page Description'),
                    'page_content' => FHtml::t('CmsPage', 'Page Content'),
                    'page_width' => FHtml::t('CmsPage', 'Page Width'),
                    'page_background' => FHtml::t('CmsPage', 'Page Background'),
                    'body_css' => FHtml::t('CmsPage', 'Body Css'),
                    'body_style' => FHtml::t('CmsPage', 'Body Style'),
                    'page_style' => FHtml::t('CmsPage', 'Page Style'),
                    'page_script' => FHtml::t('CmsPage', 'Page Script'),
                    'views_count' => FHtml::t('CmsPage', 'Views Count'),
                    'is_active' => FHtml::t('CmsPage', 'Is Active'),
                    'sort_order' => FHtml::t('CmsPage', 'Sort Order'),
                    'created_date' => FHtml::t('CmsPage', 'Created Date'),
                    'created_user' => FHtml::t('CmsPage', 'Created User'),
                    'application_id' => FHtml::t('CmsPage', 'Application ID'),
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
        $i18n->translations['CmsPage*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsPage' => 'CmsPage.php',
            ],
        ];
    }



}
