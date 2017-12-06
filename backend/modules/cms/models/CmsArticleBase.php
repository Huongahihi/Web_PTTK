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
 * This is the model class for table "cms_article".
 *

 * @property string $id
 * @property string $thumbnail
 * @property string $image
 * @property string $banner
 * @property string $code
 * @property string $icon
 * @property string $name
 * @property string $overview
 * @property string $content
 * @property string $linkurl
 * @property integer $sort_order
 * @property string $type
 * @property string $lang
 * @property integer $is_active
 * @property integer $is_top
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class CmsArticleBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_article';

    public static function tableName()
    {
        return 'cms_article';
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
                    'id' => FHtml::t('CmsArticle', 'ID'),
                    'thumbnail' => FHtml::t('CmsArticle', 'Thumbnail'),
                    'image' => FHtml::t('CmsArticle', 'Image'),
                    'banner' => FHtml::t('CmsArticle', 'Banner'),
                    'code' => FHtml::t('CmsArticle', 'Code'),
                    'icon' => FHtml::t('CmsArticle', 'Icon'),
                    'name' => FHtml::t('CmsArticle', 'Name'),
                    'overview' => FHtml::t('CmsArticle', 'Overview'),
                    'content' => FHtml::t('CmsArticle', 'Content'),
                    'linkurl' => FHtml::t('CmsArticle', 'Linkurl'),
                    'sort_order' => FHtml::t('CmsArticle', 'Sort Order'),
                    'type' => FHtml::t('CmsArticle', 'Type'),
                    'lang' => FHtml::t('CmsArticle', 'Lang'),
                    'is_active' => FHtml::t('CmsArticle', 'Is Active'),
                    'is_top' => FHtml::t('CmsArticle', 'Is Top'),
                    'created_date' => FHtml::t('CmsArticle', 'Created Date'),
                    'created_user' => FHtml::t('CmsArticle', 'Created User'),
                    'modified_date' => FHtml::t('CmsArticle', 'Modified Date'),
                    'modified_user' => FHtml::t('CmsArticle', 'Modified User'),
                    'application_id' => FHtml::t('CmsArticle', 'Application ID'),
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
        $i18n->translations['CmsArticle*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsArticle' => 'CmsArticle.php',
            ],
        ];
    }



}
