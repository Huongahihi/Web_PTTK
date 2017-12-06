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
class EcommerceOrderAPI extends EcommerceOrder{
    public function fields()
    {
        //Customize fields to be displayed in API
        $fields = ['id', 'user_id', 'billing_name', 'billing_phone', 'billing_address', 'billing_email', 'billing_postcode', 'billing_city', 'billing_state', 'billing_country', 'shipping_address', 'shipping_time', 'shipping_note', 'order_date', 'order_detail', 'order_note', 'order_type', 'order_status', 'is_active', 'price_total', 'tax', 'price_tax', 'promotion_code', 'price_discount', 'price_shipping', 'price_final', 'payment_method', 'payment_status', ];

        return $fields;
    }

    public function rules()
    {
        //No Rules required for API object
        return [];
    }
}
