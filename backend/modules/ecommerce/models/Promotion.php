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
 * This is the customized model class for table "promotion".
 */
class Promotion extends PromotionBase //\yii\db\ActiveRecord
{
    const LOOKUP = [        'discount_type' => [
		['id' => Promotion::DISCOUNT_TYPE_PERCENT, 'name' => 'percent'],
 	['id' => Promotion::DISCOUNT_TYPE_PRICE_OFF, 'name' => 'price_off'],
 ],
        'apply_type' => [
		['id' => Promotion::APPLY_TYPE_ALL, 'name' => 'all'],
 	['id' => Promotion::APPLY_TYPE_SALES_OVER, 'name' => 'sales_over'],
 	['id' => Promotion::APPLY_TYPE_PRODUCTS, 'name' => 'products'],
 ],
];

    const COLUMNS_UPLOAD = ['image','banner',];

    public $order_by = 'sort_order asc,is_top desc,is_active desc,created_date desc,';

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
        
            [['id', 'code', 'image', 'banner', 'name', 'overview', 'content', 'link_url', 'discount_type', 'discount', 'usage_limit', 'usage_current', 'apply_type', 'sales_over', 'products', 'start_date', 'end_date', 'is_top', 'is_active', 'sort_order', 'count_views', 'count_shares', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['name'], 'required'],
            [['content'], 'string'],
            [['discount', 'usage_limit', 'usage_current', 'sales_over', 'is_top', 'is_active', 'sort_order', 'count_views', 'count_shares'], 'integer'],
            [['start_date', 'end_date', 'created_date', 'modified_date'], 'safe'],
            [['code', 'name', 'link_url'], 'string', 'max' => 255],
            [['image', 'banner'], 'string', 'max' => 300],
            [['overview'], 'string', 'max' => 2000],
            [['discount_type', 'apply_type', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
            [['products'], 'string', 'max' => 500],
        ];
    }



    // Lookup Object: products\n
    public $products;
    public function getProducts() {
        if (!isset($this->products))
        $this->products = FHtml::getModel('product', '', $this->products_id, '', false);

        return $this->products;
    }
    public function setProducts($value) {
        $this->products = $value;
    }


    public function prepareCustomFields() {
        parent::prepareCustomFields();

        $this->products = self::getProducts();
    }


    public static function getRelatedObjects() {
        return self::OBJECTS_RELATED;
    }

    public static function getMetaObjects() {
        return self::OBJECTS_META;
    }
}
