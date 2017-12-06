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
 * This is the model class for table "cms_about".
 *

 * @property string $id
 * @property string $thumbnail
 * @property string $image
 * @property string $name
 * @property string $overview
 * @property string $content
 * @property string $color
 * @property integer $sort_order
 * @property string $linkurl
 * @property string $icon
 * @property string $lang
 * @property integer $is_active
 * @property integer $is_top
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class CmsAboutBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_about';

    public static function tableName()
    {
        return 'cms_about';
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
                    'id' => FHtml::t('CmsAbout', 'ID'),
                    'thumbnail' => FHtml::t('CmsAbout', 'Thumbnail'),
                    'image' => FHtml::t('CmsAbout', 'Image'),
                    'name' => FHtml::t('CmsAbout', 'Name'),
                    'overview' => FHtml::t('CmsAbout', 'Overview'),
                    'content' => FHtml::t('CmsAbout', 'Content'),
                    'color' => FHtml::t('CmsAbout', 'Color'),
                    'sort_order' => FHtml::t('CmsAbout', 'Sort Order'),
                    'linkurl' => FHtml::t('CmsAbout', 'Linkurl'),
                    'icon' => FHtml::t('CmsAbout', 'Icon'),
                    'lang' => FHtml::t('CmsAbout', 'Lang'),
                    'is_active' => FHtml::t('CmsAbout', 'Is Active'),
                    'is_top' => FHtml::t('CmsAbout', 'Is Top'),
                    'created_date' => FHtml::t('CmsAbout', 'Created Date'),
                    'created_user' => FHtml::t('CmsAbout', 'Created User'),
                    'modified_date' => FHtml::t('CmsAbout', 'Modified Date'),
                    'modified_user' => FHtml::t('CmsAbout', 'Modified User'),
                    'application_id' => FHtml::t('CmsAbout', 'Application ID'),
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
        $i18n->translations['CmsAbout*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsAbout' => 'CmsAbout.php',
            ],
        ];
    }



}
