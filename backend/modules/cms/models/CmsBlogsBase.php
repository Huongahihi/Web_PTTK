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
 * This is the model class for table "cms_blogs".
 *

 * @property string $id
 * @property string $thumbnail
 * @property string $image
 * @property string $banner
 * @property string $code
 * @property string $name
 * @property string $overview
 * @property string $content
 * @property string $type
 * @property string $status
 * @property string $category_id
 * @property integer $is_active
 * @property string $lang
 * @property string $tags
 * @property string $linkurl
 * @property string $author
 * @property integer $is_top
 * @property integer $is_new
 * @property integer $is_hot
 * @property integer $count_views
 * @property integer $count_comments
 * @property integer $count_likes
 * @property integer $count_rates
 * @property integer $rates
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class CmsBlogsBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_blogs';

    public static function tableName()
    {
        return 'cms_blogs';
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
                    'id' => FHtml::t('CmsBlogs', 'ID'),
                    'thumbnail' => FHtml::t('CmsBlogs', 'Thumbnail'),
                    'image' => FHtml::t('CmsBlogs', 'Image'),
                    'banner' => FHtml::t('CmsBlogs', 'Banner'),
                    'code' => FHtml::t('CmsBlogs', 'Code'),
                    'name' => FHtml::t('CmsBlogs', 'Name'),
                    'overview' => FHtml::t('CmsBlogs', 'Overview'),
                    'content' => FHtml::t('CmsBlogs', 'Content'),
                    'type' => FHtml::t('CmsBlogs', 'Type'),
                    'status' => FHtml::t('CmsBlogs', 'Status'),
                    'category_id' => FHtml::t('CmsBlogs', 'Category ID'),
                    'is_active' => FHtml::t('CmsBlogs', 'Is Active'),
                    'lang' => FHtml::t('CmsBlogs', 'Lang'),
                    'tags' => FHtml::t('CmsBlogs', 'Tags'),
                    'linkurl' => FHtml::t('CmsBlogs', 'Linkurl'),
                    'author' => FHtml::t('CmsBlogs', 'Author'),
                    'is_top' => FHtml::t('CmsBlogs', 'Is Top'),
                    'is_new' => FHtml::t('CmsBlogs', 'Is New'),
                    'is_hot' => FHtml::t('CmsBlogs', 'Is Hot'),
                    'count_views' => FHtml::t('CmsBlogs', 'Count Views'),
                    'count_comments' => FHtml::t('CmsBlogs', 'Count Comments'),
                    'count_likes' => FHtml::t('CmsBlogs', 'Count Likes'),
                    'count_rates' => FHtml::t('CmsBlogs', 'Count Rates'),
                    'rates' => FHtml::t('CmsBlogs', 'Rates'),
                    'created_date' => FHtml::t('CmsBlogs', 'Created Date'),
                    'created_user' => FHtml::t('CmsBlogs', 'Created User'),
                    'modified_date' => FHtml::t('CmsBlogs', 'Modified Date'),
                    'modified_user' => FHtml::t('CmsBlogs', 'Modified User'),
                    'application_id' => FHtml::t('CmsBlogs', 'Application ID'),
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
        $i18n->translations['CmsBlogs*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsBlogs' => 'CmsBlogs.php',
            ],
        ];
    }



}
