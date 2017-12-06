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
 * This is the model class for table "ecommerce_reservation".
 *

 * @property integer $id
 * @property integer $buyer_id
 * @property string $buyer_name
 * @property string $buyer_note
 * @property integer $buyer_confirm
 * @property integer $buyer_visible
 * @property integer $seller_id
 * @property string $seller_name
 * @property string $seller_note
 * @property integer $seller_confirm
 * @property integer $seller_visible
 * @property integer $deal_id
 * @property string $deal_name
 * @property double $price
 * @property string $time
 * @property string $payment_method
 * @property string $payment_status
 * @property string $status
 * @property integer $is_active
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class EcommerceReservationBase extends BaseModel //\yii\db\ActiveRecord
{
    const PAYMENT_METHOD_POINT = 'point';
    const PAYMENT_METHOD_CREDIT = 'credit';
    const PAYMENT_METHOD_CASH = 'cash';
    const PAYMENT_METHOD_PAYPAL = 'paypal';
    const PAYMENT_METHOD_COD = 'cod';
    const PAYMENT_STATUS_PAID = 'Paid';
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';
    const STATUS_PROCESSING = 'processing';
    const STATUS_FINISH = 'finish';
    const STATUS_FAIL = 'fail';

// id, buyer_id, buyer_name, buyer_note, buyer_confirm, buyer_visible, seller_id, seller_name, seller_note, seller_confirm, seller_visible, deal_id, deal_name, price, time, payment_method, payment_status, status, is_active, created_date, created_user, modified_date, modified_user, application_id
    const COLUMN_ID = 'id';
    const COLUMN_BUYER_ID = 'buyer_id';
    const COLUMN_BUYER_NAME = 'buyer_name';
    const COLUMN_BUYER_NOTE = 'buyer_note';
    const COLUMN_BUYER_CONFIRM = 'buyer_confirm';
    const COLUMN_BUYER_VISIBLE = 'buyer_visible';
    const COLUMN_SELLER_ID = 'seller_id';
    const COLUMN_SELLER_NAME = 'seller_name';
    const COLUMN_SELLER_NOTE = 'seller_note';
    const COLUMN_SELLER_CONFIRM = 'seller_confirm';
    const COLUMN_SELLER_VISIBLE = 'seller_visible';
    const COLUMN_DEAL_ID = 'deal_id';
    const COLUMN_DEAL_NAME = 'deal_name';
    const COLUMN_PRICE = 'price';
    const COLUMN_TIME = 'time';
    const COLUMN_PAYMENT_METHOD = 'payment_method';
    const COLUMN_PAYMENT_STATUS = 'payment_status';
    const COLUMN_STATUS = 'status';
    const COLUMN_IS_ACTIVE = 'is_active';
    const COLUMN_CREATED_DATE = 'created_date';
    const COLUMN_CREATED_USER = 'created_user';
    const COLUMN_MODIFIED_DATE = 'modified_date';
    const COLUMN_MODIFIED_USER = 'modified_user';
    const COLUMN_APPLICATION_ID = 'application_id';

    /**
    * @inheritdoc
    */
    public $tableName = 'ecommerce_reservation';

    public static function tableName()
    {
        return 'ecommerce_reservation';
    }



    /**
     * @inheritdoc
     * @return EcommerceReservationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EcommerceReservationQuery(get_called_class());
    }
}
