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
 * This is the model class for table "cms_faq".
 *

 * @property integer $id
 * @property string $name
 * @property string $content
 * @property string $type
 * @property integer $sort_order
 * @property string $lang
 * @property integer $is_active
 * @property integer $is_top
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class CmsFaqBase extends BaseModel //\yii\db\ActiveRecord
{
    const TYPE_COMMON = 'COMMON';
    const TYPE_PURCHASE = 'PURCHASE';
    const TYPE_SUPPORT = 'SUPPORT';

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_faq';

    public static function tableName()
    {
        return 'cms_faq';
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
                    'id' => FHtml::t('CmsFaq', 'ID'),
                    'name' => FHtml::t('CmsFaq', 'Name'),
                    'content' => FHtml::t('CmsFaq', 'Content'),
                    'type' => FHtml::t('CmsFaq', 'Type'),
                    'sort_order' => FHtml::t('CmsFaq', 'Sort Order'),
                    'lang' => FHtml::t('CmsFaq', 'Lang'),
                    'is_active' => FHtml::t('CmsFaq', 'Is Active'),
                    'is_top' => FHtml::t('CmsFaq', 'Is Top'),
                    'created_date' => FHtml::t('CmsFaq', 'Created Date'),
                    'created_user' => FHtml::t('CmsFaq', 'Created User'),
                    'modified_date' => FHtml::t('CmsFaq', 'Modified Date'),
                    'modified_user' => FHtml::t('CmsFaq', 'Modified User'),
                    'application_id' => FHtml::t('CmsFaq', 'Application ID'),
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
        $i18n->translations['CmsFaq*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsFaq' => 'CmsFaq.php',
            ],
        ];
    }



}
