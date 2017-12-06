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
 * This is the customized model class for table "ecommerce_order".
 */
class EcommerceOrder extends EcommerceOrderBase //\yii\db\ActiveRecord
{
    const LOOKUP = [        'order_type' => [
		['id' => EcommerceOrder::ORDER_TYPE_WEB, 'name' => 'web'],
 	['id' => EcommerceOrder::ORDER_TYPE_MOBILE, 'name' => 'mobile'],
 	['id' => EcommerceOrder::ORDER_TYPE_CALL, 'name' => 'call'],
 	['id' => EcommerceOrder::ORDER_TYPE_DIRECT, 'name' => 'direct'],
 	['id' => EcommerceOrder::ORDER_TYPE_AGENCY, 'name' => 'agency'],
 ],
        'order_status' => [
		['id' => EcommerceOrder::ORDER_STATUS_PENDING, 'name' => 'pending'],
 	['id' => EcommerceOrder::ORDER_STATUS_APPROVED, 'name' => 'approved'],
 	['id' => EcommerceOrder::ORDER_STATUS_PROCESSING, 'name' => 'processing'],
 	['id' => EcommerceOrder::ORDER_STATUS_FINISH, 'name' => 'finish'],
 	['id' => EcommerceOrder::ORDER_STATUS_DONE, 'name' => 'done'],
 	['id' => EcommerceOrder::ORDER_STATUS_FAIL, 'name' => 'fail'],
 ],
        'payment_method' => [
		['id' => EcommerceOrder::PAYMENT_METHOD_CASH, 'name' => 'cash'],
 	['id' => EcommerceOrder::PAYMENT_METHOD_POINT, 'name' => 'point'],
 	['id' => EcommerceOrder::PAYMENT_METHOD_CREDIT, 'name' => 'credit'],
 	['id' => EcommerceOrder::PAYMENT_METHOD_COD, 'name' => 'cod'],
 	['id' => EcommerceOrder::PAYMENT_METHOD_BANK, 'name' => 'bank'],
 ],
        'payment_status' => [
		['id' => EcommerceOrder::PAYMENT_STATUS_PAID, 'name' => 'paid'],
 ],
];

    const COLUMNS_UPLOAD = [];

    public $order_by = 'is_active desc,created_date desc,';

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
        
            [['id', 'user_id', 'billing_name', 'billing_phone', 'billing_address', 'billing_email', 'billing_postcode', 'billing_city', 'billing_state', 'billing_country', 'shipping_address', 'shipping_time', 'shipping_note', 'order_date', 'order_detail', 'order_note', 'order_type', 'order_status', 'is_active', 'price_total', 'tax', 'price_tax', 'promotion_code', 'price_discount', 'price_shipping', 'price_final', 'payment_method', 'payment_status', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['billing_name'], 'required'],
            [['order_detail', 'order_note'], 'string'],
            [['is_active'], 'integer'],
            [['price_total', 'price_tax', 'price_discount', 'price_shipping', 'price_final'], 'number'],
            [['created_date', 'modified_date'], 'safe'],
            [['user_id', 'order_type', 'order_status', 'payment_method', 'payment_status', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
            [['billing_name', 'billing_phone', 'billing_email', 'billing_postcode', 'billing_city', 'billing_state', 'billing_country', 'shipping_time', 'promotion_code'], 'string', 'max' => 255],
            [['billing_address'], 'string', 'max' => 1000],
            [['shipping_address', 'shipping_note'], 'string', 'max' => 2000],
            [['order_date'], 'string', 'max' => 200],
            [['tax'], 'string', 'max' => 500],
        ];
    }



    // Lookup Object: user\n
    public $user;
    public function getUser() {
        if (!isset($this->user))
        $this->user = FHtml::getModel('user', '', $this->user_id, '', false);

        return $this->user;
    }
    public function setUser($value) {
        $this->user = $value;
    }


    public function prepareCustomFields() {
        parent::prepareCustomFields();

        $this->user = self::getUser();
    }


    public static function getRelatedObjects() {
        return self::OBJECTS_RELATED;
    }

    public static function getMetaObjects() {
        return self::OBJECTS_META;
    }
}
