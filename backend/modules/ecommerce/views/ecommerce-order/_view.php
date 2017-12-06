<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use \common\components\FHtml;
use common\components\Helper;
use common\widgets\FDetailView;
use yii\widgets\Pjax;

$moduleName = 'EcommerceOrder';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);
$currentAction = FHtml::currentAction();

$print = isset($print) ? $print : true;
$ajax = isset($ajax) ? $ajax : (FHtml::isListAction($currentAction) ? false : true);

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\EcommerceOrder */
?>
<?php if (!Yii::$app->request->isAjax) {
$this->title = 'Ecommerce Orders';
$this->params['toolBarActions'] = array(
'linkButton'=>array(),
'button'=>array(),
'dropdown'=>array(),
);
$this->params['mainIcon'] = 'fa fa-list';
} ?>
<?php if ($ajax) Pjax::begin(['id' => 'crud-datatable'])  ?>

<?php if (Yii::$app->request->isAjax) { ?>
<div class="ecommerce-order-view">

       <?= FDetailView::widget([
    'model' => $model,
    'attributes' => [
                    'id',
                'user_id',
                'billing_name',
                'billing_phone',
                'billing_address',
                'billing_email',
                'billing_postcode',
                'billing_city',
                'billing_state',
                'billing_country',
                'shipping_name',
                'shipping_phone',
                'shipping_address',
                'shipping_email',
                'shipping_postcode',
                'shipping_city',
                'shipping_state',
                'shipping_country',
                'shipping_method',
                'order_date',
                'order_detail',
                'order_note',
                'promotion_code',
                'tax',
                'order_type',
                'order_status',
                'is_active',
                'price_total',
                'price_shipping',
                'price_tax',
                'price_discount',
                'price_final',
                'payment_method',
                'payment_status',
                'delivery_time',
                'delivery_status',
                'delivery_type',
                'delivery_note',
                'created_date',
                'created_user',
                'modified_date',
                'modified_user',
    ],
    ]) ?>
</div>
<?php } else { ?>

        <div class="row" style="padding: 20px">
            <div class="col-md-12" style="background-color: white; padding: 20px">
                <?= FDetailView::widget([
                'model' => $model,
                'attributes' => [
                                'id',
                'user_id',
                'billing_name',
                'billing_phone',
                'billing_address',
                'billing_email',
                'billing_postcode',
                'billing_city',
                'billing_state',
                'billing_country',
                'shipping_name',
                'shipping_phone',
                'shipping_address',
                'shipping_email',
                'shipping_postcode',
                'shipping_city',
                'shipping_state',
                'shipping_country',
                'shipping_method',
                'order_date',
                'order_detail',
                'order_note',
                'promotion_code',
                'tax',
                'order_type',
                'order_status',
                'is_active',
                'price_total',
                'price_shipping',
                'price_tax',
                'price_discount',
                'price_final',
                'payment_method',
                'payment_status',
                'delivery_time',
                'delivery_status',
                'delivery_type',
                'delivery_note',
                'created_date',
                'created_user',
                'modified_date',
                'modified_user',
                ],
                ]) ?>

            </div>

        </div>

<?php } ?><?php if ($ajax) Pjax::end()  ?>

