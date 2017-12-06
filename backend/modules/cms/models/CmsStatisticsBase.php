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
 * This is the model class for table "cms_statistics".
 *

 * @property integer $id
 * @property string $name
 * @property string $value
 * @property string $icon
 * @property integer $sort_order
 * @property integer $is_active
 * @property integer $is_top
 * @property string $application_id
 */
class CmsStatisticsBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_statistics';

    public static function tableName()
    {
        return 'cms_statistics';
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
                    'id' => FHtml::t('CmsStatistics', 'ID'),
                    'name' => FHtml::t('CmsStatistics', 'Name'),
                    'value' => FHtml::t('CmsStatistics', 'Value'),
                    'icon' => FHtml::t('CmsStatistics', 'Icon'),
                    'sort_order' => FHtml::t('CmsStatistics', 'Sort Order'),
                    'is_active' => FHtml::t('CmsStatistics', 'Is Active'),
                    'is_top' => FHtml::t('CmsStatistics', 'Is Top'),
                    'application_id' => FHtml::t('CmsStatistics', 'Application ID'),
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
        $i18n->translations['CmsStatistics*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsStatistics' => 'CmsStatistics.php',
            ],
        ];
    }



}
