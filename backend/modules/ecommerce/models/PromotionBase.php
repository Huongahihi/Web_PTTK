<?php

namespace backend\modules\ecommerce\models;

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
 * This is the model class for table "promotion".
 *

 * @property integer $id
 * @property string $code
 * @property string $image
 * @property string $banner
 * @property string $name
 * @property string $overview
 * @property string $content
 * @property string $link_url
 * @property string $discount_type
 * @property integer $discount
 * @property integer $usage_limit
 * @property integer $usage_current
 * @property string $apply_type
 * @property integer $sales_over
 * @property string $products
 * @property string $start_date
 * @property string $end_date
 * @property integer $is_top
 * @property integer $is_active
 * @property integer $sort_order
 * @property integer $count_views
 * @property integer $count_shares
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class PromotionBase extends BaseModel //\yii\db\ActiveRecord
{
    const DISCOUNT_TYPE_PERCENT = 'percent';
    const DISCOUNT_TYPE_PRICE_OFF = 'price_off';
    const APPLY_TYPE_ALL = 'all';
    const APPLY_TYPE_SALES_OVER = 'sales_over';
    const APPLY_TYPE_PRODUCTS = 'products';

    /**
    * @inheritdoc
    */
    public $tableName = 'promotion';

    public static function tableName()
    {
        return 'promotion';
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
                    'id' => FHtml::t('Promotion', 'ID'),
                    'code' => FHtml::t('Promotion', 'Code'),
                    'image' => FHtml::t('Promotion', 'Image'),
                    'banner' => FHtml::t('Promotion', 'Banner'),
                    'name' => FHtml::t('Promotion', 'Name'),
                    'overview' => FHtml::t('Promotion', 'Overview'),
                    'content' => FHtml::t('Promotion', 'Content'),
                    'link_url' => FHtml::t('Promotion', 'Link Url'),
                    'discount_type' => FHtml::t('Promotion', 'Discount Type'),
                    'discount' => FHtml::t('Promotion', 'Discount'),
                    'usage_limit' => FHtml::t('Promotion', 'Usage Limit'),
                    'usage_current' => FHtml::t('Promotion', 'Usage Current'),
                    'apply_type' => FHtml::t('Promotion', 'Apply Type'),
                    'sales_over' => FHtml::t('Promotion', 'Sales Over'),
                    'products' => FHtml::t('Promotion', 'Products'),
                    'start_date' => FHtml::t('Promotion', 'Start Date'),
                    'end_date' => FHtml::t('Promotion', 'End Date'),
                    'is_top' => FHtml::t('Promotion', 'Is Top'),
                    'is_active' => FHtml::t('Promotion', 'Is Active'),
                    'sort_order' => FHtml::t('Promotion', 'Sort Order'),
                    'count_views' => FHtml::t('Promotion', 'Count Views'),
                    'count_shares' => FHtml::t('Promotion', 'Count Shares'),
                    'created_date' => FHtml::t('Promotion', 'Created Date'),
                    'created_user' => FHtml::t('Promotion', 'Created User'),
                    'modified_date' => FHtml::t('Promotion', 'Modified Date'),
                    'modified_user' => FHtml::t('Promotion', 'Modified User'),
                    'application_id' => FHtml::t('Promotion', 'Application ID'),
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
        $i18n->translations['Promotion*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/ecommerce/messages',
            'fileMap' => [
                'Promotion' => 'Promotion.php',
            ],
        ];
    }



}
