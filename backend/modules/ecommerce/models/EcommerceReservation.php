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
 * This is the customized model class for table "ecommerce_reservation".
 */
class EcommerceReservation extends EcommerceReservationBase //\yii\db\ActiveRecord
{
    const LOOKUP = [        'payment_method' => [['id' => EcommerceReservation::PAYMENT_METHOD_POINT, 'name' => 'point'], ['id' => EcommerceReservation::PAYMENT_METHOD_CREDIT, 'name' => 'credit'], ['id' => EcommerceReservation::PAYMENT_METHOD_CASH, 'name' => 'cash'], ['id' => EcommerceReservation::PAYMENT_METHOD_PAYPAL, 'name' => 'paypal'], ['id' => EcommerceReservation::PAYMENT_METHOD_COD, 'name' => 'cod'], ],
        'payment_status' => [['id' => EcommerceReservation::PAYMENT_STATUS_PAID, 'name' => 'Paid'], ],
        'status' => [['id' => EcommerceReservation::STATUS_PENDING, 'name' => 'pending'], ['id' => EcommerceReservation::STATUS_APPROVED, 'name' => 'approved'], ['id' => EcommerceReservation::STATUS_REJECTED, 'name' => 'rejected'], ['id' => EcommerceReservation::STATUS_PROCESSING, 'name' => 'processing'], ['id' => EcommerceReservation::STATUS_FINISH, 'name' => 'finish'], ['id' => EcommerceReservation::STATUS_FAIL, 'name' => 'fail'], ],
];

    const COLUMNS_UPLOAD = [];

    public $order_by = 'is_active desc,created_date desc,';

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];
    const COLUMNS = [
        'api' => ['id', 'buyer_id', 'buyer_name', 'buyer_note', 'buyer_confirm', 'buyer_visible', 'seller_id', 'seller_name', 'seller_note', 'seller_confirm', 'seller_visible', 'deal_id', 'deal_name', 'price', 'time', 'payment_method', 'payment_status', 'status', 'is_active', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id', ],
        'all' => ['id', 'buyer_id', 'buyer_name', 'buyer_note', 'buyer_confirm', 'buyer_visible', 'seller_id', 'seller_name', 'seller_note', 'seller_confirm', 'seller_visible', 'deal_id', 'deal_name', 'price', 'time', 'payment_method', 'payment_status', 'status', 'is_active', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id',  'objectAttributes', 'objectFile', 'objectCategories'],
        '+' => ['buyer', 'seller',   'objectAttributes', 'objectFile', 'objectCategories']
    ];

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
        
            [['id', 'buyer_id', 'buyer_name', 'buyer_note', 'buyer_confirm', 'buyer_visible', 'seller_id', 'seller_name', 'seller_note', 'seller_confirm', 'seller_visible', 'deal_id', 'deal_name', 'price', 'time', 'payment_method', 'payment_status', 'status', 'is_active', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['buyer_id', 'seller_id'], 'required'],
            [['buyer_id', 'buyer_confirm', 'buyer_visible', 'seller_id', 'seller_confirm', 'seller_visible', 'deal_id', 'is_active'], 'integer'],
            [['buyer_note', 'seller_note'], 'string'],
            [['price'], 'number'],
            [['created_date', 'modified_date'], 'safe'],
            [['buyer_name', 'seller_name', 'deal_name', 'time'], 'string', 'max' => 255],
            [['payment_method', 'payment_status', 'status', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
        ];
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
                    'id' => FHtml::t('EcommerceReservation', 'ID'),
                    'buyer_id' => FHtml::t('EcommerceReservation', 'Buyer ID'),
                    'buyer_name' => FHtml::t('EcommerceReservation', 'Buyer Name'),
                    'buyer_note' => FHtml::t('EcommerceReservation', 'Buyer Note'),
                    'buyer_confirm' => FHtml::t('EcommerceReservation', 'Buyer Confirm'),
                    'buyer_visible' => FHtml::t('EcommerceReservation', 'Buyer Visible'),
                    'seller_id' => FHtml::t('EcommerceReservation', 'Seller ID'),
                    'seller_name' => FHtml::t('EcommerceReservation', 'Seller Name'),
                    'seller_note' => FHtml::t('EcommerceReservation', 'Seller Note'),
                    'seller_confirm' => FHtml::t('EcommerceReservation', 'Seller Confirm'),
                    'seller_visible' => FHtml::t('EcommerceReservation', 'Seller Visible'),
                    'deal_id' => FHtml::t('EcommerceReservation', 'Deal ID'),
                    'deal_name' => FHtml::t('EcommerceReservation', 'Deal Name'),
                    'price' => FHtml::t('EcommerceReservation', 'Price'),
                    'time' => FHtml::t('EcommerceReservation', 'Time'),
                    'payment_method' => FHtml::t('EcommerceReservation', 'Payment Method'),
                    'payment_status' => FHtml::t('EcommerceReservation', 'Payment Status'),
                    'status' => FHtml::t('EcommerceReservation', 'Status'),
                    'is_active' => FHtml::t('EcommerceReservation', 'Is Active'),
                    'created_date' => FHtml::t('EcommerceReservation', 'Created Date'),
                    'created_user' => FHtml::t('EcommerceReservation', 'Created User'),
                    'modified_date' => FHtml::t('EcommerceReservation', 'Modified Date'),
                    'modified_user' => FHtml::t('EcommerceReservation', 'Modified User'),
                    'application_id' => FHtml::t('EcommerceReservation', 'Application ID'),
                ];
    }



    // Lookup Object: buyer\n
    public $buyer;
    public function getBuyer() {
        if (!isset($this->buyer))
        $this->buyer = FHtml::getModel('user', '', $this->buyer_id, '', false);

        return $this->buyer;
    }
    public function setBuyer($value) {
        $this->buyer = $value;
    }

    // Lookup Object: seller\n
    public $seller;
    public function getSeller() {
        if (!isset($this->seller))
        $this->seller = FHtml::getModel('user', '', $this->seller_id, '', false);

        return $this->seller;
    }
    public function setSeller($value) {
        $this->seller = $value;
    }


    public function prepareCustomFields() {
        parent::prepareCustomFields();

        $this->buyer = self::getBuyer();
        $this->seller = self::getSeller();
    }

    public function fields()
    {
        $fields = parent::fields();

        $columns = self::COLUMNS;
        if (is_string($this->columnsMode) && !empty($this->columnsMode) && key_exists($this->columnsMode, $columns)) {
            $fields1 = $columns[$this->columnsMode];
            if (!empty($fields1))
            $fields = $fields1;
        } else if (is_array($this->columnsMode))
            return $this->columnsMode;

        if (key_exists('+', $columns) && !empty($columns['+'])) {
            $fields = array_merge($fields, $columns['+']);
        }
        //unset($fields['xxx'], $fields['yyy'], $fields['zzz']);

        return $fields;
    }

    public static function getLookupArray($column) {
        if (key_exists($column, self::LOOKUP))
            return self::LOOKUP[$column];
        return [];
    }

    public static function getRelatedObjects() {
        return self::OBJECTS_RELATED;
    }

    public static function getMetaObjects() {
        return self::OBJECTS_META;
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
        $i18n->translations['EcommerceReservation*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/messages',
            'fileMap' => [
                'EcommerceReservation' => 'EcommerceReservation.php',
            ],
        ];
    }

    public function toViewModel() {
    $model = new ViewModel();
            FHtml::setFieldValue($model, ['id'], $this->id);
            FHtml::setFieldValue($model, ['buyer_id'], $this->buyer_id);
            FHtml::setFieldValue($model, ['buyer_name'], $this->buyer_name);
            FHtml::setFieldValue($model, ['buyer_note'], $this->buyer_note);
            FHtml::setFieldValue($model, ['buyer_confirm'], $this->buyer_confirm);
            FHtml::setFieldValue($model, ['buyer_visible'], $this->buyer_visible);
            FHtml::setFieldValue($model, ['seller_id'], $this->seller_id);
            FHtml::setFieldValue($model, ['seller_name'], $this->seller_name);
            FHtml::setFieldValue($model, ['seller_note'], $this->seller_note);
            FHtml::setFieldValue($model, ['seller_confirm'], $this->seller_confirm);
            FHtml::setFieldValue($model, ['seller_visible'], $this->seller_visible);
            FHtml::setFieldValue($model, ['deal_id'], $this->deal_id);
            FHtml::setFieldValue($model, ['deal_name'], $this->deal_name);
            FHtml::setFieldValue($model, ['price'], $this->price);
            FHtml::setFieldValue($model, ['time'], $this->time);
            FHtml::setFieldValue($model, ['payment_method'], $this->payment_method);
            FHtml::setFieldValue($model, ['payment_status'], $this->payment_status);
            FHtml::setFieldValue($model, ['status'], $this->status);
            FHtml::setFieldValue($model, ['is_active'], $this->is_active);
            FHtml::setFieldValue($model, ['created_date'], $this->created_date);
            FHtml::setFieldValue($model, ['created_user'], $this->created_user);
            FHtml::setFieldValue($model, ['modified_date'], $this->modified_date);
            FHtml::setFieldValue($model, ['modified_user'], $this->modified_user);
            FHtml::setFieldValue($model, ['application_id'], $this->application_id);
        return $model;
    }
}
