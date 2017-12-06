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
 * This is the model class for table "cms_album".
 *

 * @property integer $id
 * @property string $image
 * @property string $name
 * @property string $description
 * @property string $linkurl
 * @property integer $sort_order
 * @property string $type
 * @property integer $is_active
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class CmsAlbumBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_album';

    public static function tableName()
    {
        return 'cms_album';
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
                    'id' => FHtml::t('CmsAlbum', 'ID'),
                    'image' => FHtml::t('CmsAlbum', 'Image'),
                    'name' => FHtml::t('CmsAlbum', 'Name'),
                    'description' => FHtml::t('CmsAlbum', 'Description'),
                    'linkurl' => FHtml::t('CmsAlbum', 'Linkurl'),
                    'sort_order' => FHtml::t('CmsAlbum', 'Sort Order'),
                    'type' => FHtml::t('CmsAlbum', 'Type'),
                    'is_active' => FHtml::t('CmsAlbum', 'Is Active'),
                    'created_date' => FHtml::t('CmsAlbum', 'Created Date'),
                    'created_user' => FHtml::t('CmsAlbum', 'Created User'),
                    'modified_date' => FHtml::t('CmsAlbum', 'Modified Date'),
                    'modified_user' => FHtml::t('CmsAlbum', 'Modified User'),
                    'application_id' => FHtml::t('CmsAlbum', 'Application ID'),
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
        $i18n->translations['CmsAlbum*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsAlbum' => 'CmsAlbum.php',
            ],
        ];
    }



}
