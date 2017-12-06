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
 * This is the model class for table "ecommerce_order".
 *

 * @property integer $id
 * @property string $user_id
 * @property string $billing_name
 * @property string $billing_phone
 * @property string $billing_address
 * @property string $billing_email
 * @property string $billing_postcode
 * @property string $billing_city
 * @property string $billing_state
 * @property string $billing_country
 * @property string $shipping_address
 * @property string $shipping_time
 * @property string $shipping_note
 * @property string $order_date
 * @property string $order_detail
 * @property string $order_note
 * @property string $order_type
 * @property string $order_status
 * @property integer $is_active
 * @property double $price_total
 * @property string $tax
 * @property double $price_tax
 * @property string $promotion_code
 * @property double $price_discount
 * @property double $price_shipping
 * @property double $price_final
 * @property string $payment_method
 * @property string $payment_status
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class EcommerceOrderBase extends BaseModel //\yii\db\ActiveRecord
{
    const ORDER_TYPE_WEB = 'web';
    const ORDER_TYPE_MOBILE = 'mobile';
    const ORDER_TYPE_CALL = 'call';
    const ORDER_TYPE_DIRECT = 'direct';
    const ORDER_TYPE_AGENCY = 'agency';
    const ORDER_STATUS_PENDING = 'pending';
    const ORDER_STATUS_APPROVED = 'approved';
    const ORDER_STATUS_PROCESSING = 'processing';
    const ORDER_STATUS_FINISH = 'finish';
    const ORDER_STATUS_DONE = 'done';
    const ORDER_STATUS_FAIL = 'fail';
    const PAYMENT_METHOD_CASH = 'cash';
    const PAYMENT_METHOD_POINT = 'point';
    const PAYMENT_METHOD_CREDIT = 'credit';
    const PAYMENT_METHOD_COD = 'cod';
    const PAYMENT_METHOD_BANK = 'bank';
    const PAYMENT_STATUS_PAID = 'paid';

    /**
    * @inheritdoc
    */
    public $tableName = 'ecommerce_order';

    public static function tableName()
    {
        return 'ecommerce_order';
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
                    'id' => FHtml::t('EcommerceOrder', 'ID'),
                    'user_id' => FHtml::t('EcommerceOrder', 'User ID'),
                    'billing_name' => FHtml::t('EcommerceOrder', 'Billing Name'),
                    'billing_phone' => FHtml::t('EcommerceOrder', 'Billing Phone'),
                    'billing_address' => FHtml::t('EcommerceOrder', 'Billing Address'),
                    'billing_email' => FHtml::t('EcommerceOrder', 'Billing Email'),
                    'billing_postcode' => FHtml::t('EcommerceOrder', 'Billing Postcode'),
                    'billing_city' => FHtml::t('EcommerceOrder', 'Billing City'),
                    'billing_state' => FHtml::t('EcommerceOrder', 'Billing State'),
                    'billing_country' => FHtml::t('EcommerceOrder', 'Billing Country'),
                    'shipping_address' => FHtml::t('EcommerceOrder', 'Shipping Address'),
                    'shipping_time' => FHtml::t('EcommerceOrder', 'Shipping Time'),
                    'shipping_note' => FHtml::t('EcommerceOrder', 'Shipping Note'),
                    'order_date' => FHtml::t('EcommerceOrder', 'Order Date'),
                    'order_detail' => FHtml::t('EcommerceOrder', 'Order Detail'),
                    'order_note' => FHtml::t('EcommerceOrder', 'Order Note'),
                    'order_type' => FHtml::t('EcommerceOrder', 'Order Type'),
                    'order_status' => FHtml::t('EcommerceOrder', 'Order Status'),
                    'is_active' => FHtml::t('EcommerceOrder', 'Is Active'),
                    'price_total' => FHtml::t('EcommerceOrder', 'Price Total'),
                    'tax' => FHtml::t('EcommerceOrder', 'Tax'),
                    'price_tax' => FHtml::t('EcommerceOrder', 'Price Tax'),
                    'promotion_code' => FHtml::t('EcommerceOrder', 'Promotion Code'),
                    'price_discount' => FHtml::t('EcommerceOrder', 'Price Discount'),
                    'price_shipping' => FHtml::t('EcommerceOrder', 'Price Shipping'),
                    'price_final' => FHtml::t('EcommerceOrder', 'Price Final'),
                    'payment_method' => FHtml::t('EcommerceOrder', 'Payment Method'),
                    'payment_status' => FHtml::t('EcommerceOrder', 'Payment Status'),
                    'created_date' => FHtml::t('EcommerceOrder', 'Created Date'),
                    'created_user' => FHtml::t('EcommerceOrder', 'Created User'),
                    'modified_date' => FHtml::t('EcommerceOrder', 'Modified Date'),
                    'modified_user' => FHtml::t('EcommerceOrder', 'Modified User'),
                    'application_id' => FHtml::t('EcommerceOrder', 'Application ID'),
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
        $i18n->translations['EcommerceOrder*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/ecommerce/messages',
            'fileMap' => [
                'EcommerceOrder' => 'EcommerceOrder.php',
            ],
        ];
    }



}
