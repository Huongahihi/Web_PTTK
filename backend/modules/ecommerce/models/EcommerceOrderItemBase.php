<?php

namespace backend\modules\ecommerce\models;

use Yii;
use common\components\FHtml;
use common\components\FModel;
use common\models\BaseModel;
use frontend\models\ViewModel;

/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the model class for table "ecommerce_order_item".
 *

 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property string $name
 * @property string $note
 * @property integer $quantity
 * @property double $price
 * @property double $total
 */
class EcommerceOrderItemBase extends BaseModel //\yii\db\ActiveRecord
{

// id, order_id, product_id, name, note, quantity, price, total
    const COLUMN_ID = 'id';
    const COLUMN_ORDER_ID = 'order_id';
    const COLUMN_PRODUCT_ID = 'product_id';
    const COLUMN_NAME = 'name';
    const COLUMN_NOTE = 'note';
    const COLUMN_QUANTITY = 'quantity';
    const COLUMN_PRICE = 'price';
    const COLUMN_TOTAL = 'total';

    /**
    * @inheritdoc
    */
    public $tableName = 'ecommerce_order_item';

    public static function tableName()
    {
        return 'ecommerce_order_item';
    }



    /**
     * @inheritdoc
     * @return EcommerceOrderItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EcommerceOrderItemQuery(get_called_class());
    }
}
