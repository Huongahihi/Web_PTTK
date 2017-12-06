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
 * This is the customized model class for table "ecommerce_order_item".
 */
class EcommerceOrderItem extends EcommerceOrderItemBase //\yii\db\ActiveRecord
{
    const LOOKUP = [];

    const COLUMNS_UPLOAD = [];

    public $order_by = '';

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];
    const COLUMNS = [
        'api' => ['id', 'order_id', 'product_id', 'name', 'note', 'quantity', 'price', 'total', ],
        'all' => ['id', 'order_id', 'product_id', 'name', 'note', 'quantity', 'price', 'total',  'objectAttributes', 'objectFile', 'objectCategories'],
        '+' => [  'objectAttributes', 'objectFile', 'objectCategories']
    ];

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
        
            [['id', 'order_id', 'product_id', 'name', 'quantity', 'price', 'total'], 'filter', 'filter' => 'trim'],
                
            [['order_id', 'product_id', 'name', 'quantity', 'price', 'total'], 'required'],
            [['order_id', 'product_id', 'quantity'], 'integer'],
            [['price', 'total'], 'number'],
            [['name'], 'string', 'max' => 255],
           // [['note'], 'string', 'max' => 2000],
        ];
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
                    'id' => FHtml::t('EcommerceOrderItem', 'ID'),
                    'order_id' => FHtml::t('EcommerceOrderItem', 'Order ID'),
                    'product_id' => FHtml::t('EcommerceOrderItem', 'Product ID'),
                    'name' => FHtml::t('EcommerceOrderItem', 'Name'),
                    'note' => FHtml::t('EcommerceOrderItem', 'Note'),
                    'quantity' => FHtml::t('EcommerceOrderItem', 'Quantity'),
                    'price' => FHtml::t('EcommerceOrderItem', 'Price'),
                    'total' => FHtml::t('EcommerceOrderItem', 'Total'),
                ];
    }

    public function prepareCustomFields() {
        parent::prepareCustomFields();
    }

    private $product;
    public function getProduct() {
        if (!isset($this->product))
            $this->product = FHtml::getModel('product', '', $this->product_id, '', false);

        return $this->product;
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
        $i18n->translations['EcommerceOrderItem*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/messages',
            'fileMap' => [
                'EcommerceOrderItem' => 'EcommerceOrderItem.php',
            ],
        ];
    }

    public function toViewModel() {
    $model = new ViewModel();
            FHtml::setFieldValue($model, ['id'], $this->id);
            FHtml::setFieldValue($model, ['order_id'], $this->order_id);
            FHtml::setFieldValue($model, ['product_id'], $this->product_id);
            FHtml::setFieldValue($model, ['name'], $this->name);
            FHtml::setFieldValue($model, ['note'], $this->note);
            FHtml::setFieldValue($model, ['quantity'], $this->quantity);
            FHtml::setFieldValue($model, ['price'], $this->price);
            FHtml::setFieldValue($model, ['total'], $this->total);
        return $model;
    }
}
