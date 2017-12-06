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
 * This is the customized model class for table "product".
 */
class Product extends ProductBase //\yii\db\ActiveRecord
{
    const LOOKUP = [        'unit' => [
		['id' => Product::UNIT_ITEM, 'name' => 'Item'],
 	['id' => Product::UNIT_KG, 'name' => 'Kg'],
 	['id' => Product::UNIT_BOX, 'name' => 'Box'],
 	['id' => Product::UNIT_COURSE, 'name' => 'Course'],
 	['id' => Product::UNIT_HOUR, 'name' => 'Hour'],
 	['id' => Product::UNIT_LICENSE, 'name' => 'License'],
 ],
        'currency' => [
		['id' => Product::CURRENCY_USD, 'name' => 'USD'],
 	['id' => Product::CURRENCY_VND, 'name' => 'VND'],
 	['id' => Product::CURRENCY_CREDIT, 'name' => 'Credit'],
 ],
        'tax' => [
		['id' => Product::TAX_INCLUDED, 'name' => 'Included'],
 ],
];

    const COLUMNS_UPLOAD = ['thumbnail','image','banner','qrcode_image','barcode_image',];

    public $order_by = 'sort_order asc,is_active desc,is_hot desc,is_top desc,created_date desc,';

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];

    public static function getLookupArray($column) {
        if (key_exists($column, self::LOOKUP))
            return self::LOOKUP[$column];
        return [];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
        
            [['id', 'thumbnail', 'image', 'banner', 'code', 'name', 'overview', 'content', 'cost', 'price', 'unit', 'currency', 'color', 'type', 'status', 'brand_id', 'category_id', 'is_active', 'is_hot', 'is_top', 'promotion_id', 'quantity', 'discount', 'tax', 'sort_order', 'count_views', 'count_comments', 'count_purchase', 'count_likes', 'count_rates', 'rates', 'qrcode_image', 'barcode_image', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['name'], 'required'],
            [['content'], 'string'],
            [['cost', 'price'], 'number'],
            [['is_active', 'is_hot', 'is_top', 'discount', 'sort_order', 'count_views', 'count_comments', 'count_purchase', 'count_likes', 'count_rates', 'rates'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['thumbnail', 'image', 'name', 'quantity', 'qrcode_image', 'barcode_image'], 'string', 'max' => 255],
            [['banner'], 'string', 'max' => 300],
            [['code'], 'string', 'max' => 45],
            [['overview'], 'string', 'max' => 2000],
            [['unit', 'currency', 'color', 'type', 'status', 'brand_id', 'promotion_id', 'tax', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
            [['category_id'], 'string', 'max' => 500],
        ];
    }



    // Lookup Object: brand\n
    public $brand;
    public function getBrand() {
        if (!isset($this->brand))
        $this->brand = FHtml::getModel('provider', '', $this->brand_id, '', false);

        return $this->brand;
    }
    public function setBrand($value) {
        $this->brand = $value;
    }

    // Lookup Object: promotion\n
    public $promotion;
    public function getPromotion() {
        if (!isset($this->promotion))
        $this->promotion = FHtml::getModel('promotion', '', $this->promotion_id, '', false);

        return $this->promotion;
    }
    public function setPromotion($value) {
        $this->promotion = $value;
    }


    public function prepareCustomFields() {
        parent::prepareCustomFields();

        $this->brand = self::getBrand();
        $this->promotion = self::getPromotion();
    }


    public static function getRelatedObjects() {
        return self::OBJECTS_RELATED;
    }

    public static function getMetaObjects() {
        return self::OBJECTS_META;
    }
}
