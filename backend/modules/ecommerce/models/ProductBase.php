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
 * This is the model class for table "product".
 *

 * @property string $id
 * @property string $thumbnail
 * @property string $image
 * @property string $banner
 * @property string $code
 * @property string $name
 * @property string $overview
 * @property string $content
 * @property string $cost
 * @property string $price
 * @property string $unit
 * @property string $currency
 * @property string $color
 * @property string $type
 * @property string $status
 * @property string $brand_id
 * @property string $category_id
 * @property integer $is_active
 * @property integer $is_hot
 * @property integer $is_top
 * @property string $promotion_id
 * @property string $quantity
 * @property integer $discount
 * @property string $tax
 * @property integer $sort_order
 * @property integer $count_views
 * @property integer $count_comments
 * @property integer $count_purchase
 * @property integer $count_likes
 * @property integer $count_rates
 * @property integer $rates
 * @property string $qrcode_image
 * @property string $barcode_image
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class ProductBase extends BaseModel //\yii\db\ActiveRecord
{
    const UNIT_ITEM = 'Item';
    const UNIT_KG = 'Kg';
    const UNIT_BOX = 'Box';
    const UNIT_COURSE = 'Course';
    const UNIT_HOUR = 'Hour';
    const UNIT_LICENSE = 'License';
    const CURRENCY_USD = 'USD';
    const CURRENCY_VND = 'VND';
    const CURRENCY_CREDIT = 'Credit';
    const TAX_INCLUDED = 0;

    /**
    * @inheritdoc
    */
    public $tableName = 'product';

    public static function tableName()
    {
        return 'product';
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
                    'id' => FHtml::t('Product', 'ID'),
                    'thumbnail' => FHtml::t('Product', 'Thumbnail'),
                    'image' => FHtml::t('Product', 'Image'),
                    'banner' => FHtml::t('Product', 'Banner'),
                    'code' => FHtml::t('Product', 'Code'),
                    'name' => FHtml::t('Product', 'Name'),
                    'overview' => FHtml::t('Product', 'Overview'),
                    'content' => FHtml::t('Product', 'Content'),
                    'cost' => FHtml::t('Product', 'Cost'),
                    'price' => FHtml::t('Product', 'Price'),
                    'unit' => FHtml::t('Product', 'Unit'),
                    'currency' => FHtml::t('Product', 'Currency'),
                    'color' => FHtml::t('Product', 'Color'),
                    'type' => FHtml::t('Product', 'Type'),
                    'status' => FHtml::t('Product', 'Status'),
                    'brand_id' => FHtml::t('Product', 'Brand ID'),
                    'category_id' => FHtml::t('Product', 'Category ID'),
                    'is_active' => FHtml::t('Product', 'Is Active'),
                    'is_hot' => FHtml::t('Product', 'Is Hot'),
                    'is_top' => FHtml::t('Product', 'Is Top'),
                    'promotion_id' => FHtml::t('Product', 'Promotion ID'),
                    'quantity' => FHtml::t('Product', 'Quantity'),
                    'discount' => FHtml::t('Product', 'Discount'),
                    'tax' => FHtml::t('Product', 'Tax'),
                    'sort_order' => FHtml::t('Product', 'Sort Order'),
                    'count_views' => FHtml::t('Product', 'Count Views'),
                    'count_comments' => FHtml::t('Product', 'Count Comments'),
                    'count_purchase' => FHtml::t('Product', 'Count Purchase'),
                    'count_likes' => FHtml::t('Product', 'Count Likes'),
                    'count_rates' => FHtml::t('Product', 'Count Rates'),
                    'rates' => FHtml::t('Product', 'Rates'),
                    'qrcode_image' => FHtml::t('Product', 'Qrcode Image'),
                    'barcode_image' => FHtml::t('Product', 'Barcode Image'),
                    'created_date' => FHtml::t('Product', 'Created Date'),
                    'created_user' => FHtml::t('Product', 'Created User'),
                    'modified_date' => FHtml::t('Product', 'Modified Date'),
                    'modified_user' => FHtml::t('Product', 'Modified User'),
                    'application_id' => FHtml::t('Product', 'Application ID'),
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
        $i18n->translations['Product*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/ecommerce/messages',
            'fileMap' => [
                'Product' => 'Product.php',
            ],
        ];
    }



}
