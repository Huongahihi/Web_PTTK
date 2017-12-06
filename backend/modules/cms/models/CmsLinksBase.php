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
 * This is the model class for table "cms_links".
 *

 * @property integer $id
 * @property string $image
 * @property string $link_url
 * @property string $title
 * @property integer $category_id
 * @property string $content
 * @property string $type
 * @property integer $sort_order
 * @property string $created_user
 * @property string $created_date
 * @property string $application_id
 */
class CmsLinksBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_links';

    public static function tableName()
    {
        return 'cms_links';
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
                    'id' => FHtml::t('CmsLinks', 'ID'),
                    'image' => FHtml::t('CmsLinks', 'Image'),
                    'link_url' => FHtml::t('CmsLinks', 'Link Url'),
                    'title' => FHtml::t('CmsLinks', 'Title'),
                    'category_id' => FHtml::t('CmsLinks', 'Category ID'),
                    'content' => FHtml::t('CmsLinks', 'Content'),
                    'type' => FHtml::t('CmsLinks', 'Type'),
                    'sort_order' => FHtml::t('CmsLinks', 'Sort Order'),
                    'created_user' => FHtml::t('CmsLinks', 'Created User'),
                    'created_date' => FHtml::t('CmsLinks', 'Created Date'),
                    'application_id' => FHtml::t('CmsLinks', 'Application ID'),
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
        $i18n->translations['CmsLinks*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsLinks' => 'CmsLinks.php',
            ],
        ];
    }



}
