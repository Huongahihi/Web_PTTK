<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use \common\components\FHtml;


$moduleName = 'EcommerceReservation';
$currentRole = FHtml::getCurrentRole();

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\EcommerceReservation */
?>
<?php if (!Yii::$app->request->isAjax) {
$this->title = FHtml::t('app', 'Ecommerce Reservations');
$this->params['toolBarActions'] = array(
'linkButton'=>array(),
'button'=>array(),
'dropdown'=>array(),
);
$this->params['mainIcon'] = 'fa fa-list';
} ?><?php if (Yii::$app->request->isAjax) { ?>
<div class="ecommerce-reservation-view">

       <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
                    'id',
                'buyer_id',
                'buyer_name',
                'buyer_note:ntext',
                'buyer_confirm',
                'buyer_visible',
                'seller_id',
                'seller_name',
                'seller_note:ntext',
                'seller_confirm',
                'seller_visible',
                'deal_id',
                'deal_name',
                'price',
                'time',
                'payment_method',
                'payment_status',
                'status',
                'is_active',
                'created_date',
                'created_user',
                'modified_date',
                'modified_user',
                'application_id',
    ],
    ]) ?>
</div>
<?php } else { ?>
<div class="<?= $this->params['portletStyle'] ?>">
    <?= $this->render(\Globals::VIEWS_PRINT_HEADER, ['title' => '',]) ?>
    <div class="portlet-title">
        <div class="caption font-dark">
                <span class="caption-subject bold uppercase">
                <i class="<?php  echo $this->params['mainIcon'] ?>"></i>
                    <?= FHtml::t('app', 'Ecommerce Reservations')?>
</span>
            <span class="caption-helper"><?=  FHtml::t('common', 'title.view') ?>
</span>
        </div>
        <div class="tools">
            <a href="#" class="fullscreen"></a>
            <a href="#" class="collapse"></a>
        </div>
        <div class="actions">
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                                           'id',
                           'buyer_id',
                           'buyer_name',
                           'buyer_note:ntext',
                           'buyer_confirm',
                           'buyer_visible',
                           'seller_id',
                           'seller_name',
                           'seller_note:ntext',
                           'seller_confirm',
                           'seller_visible',
                           'deal_id',
                           'deal_name',
                           'price',
                           'time',
                           'payment_method',
                           'payment_status',
                           'status',
                           'is_active',
                           'created_date',
                           'created_user',
                           'modified_date',
                           'modified_user',
                           'application_id',
                ],
                ]) ?>
                <p>
                    <?php if (FHtml::isInRole('', 'update', $currentRole)) { Html::a( FHtml::t('common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']); } ?>
                    <?php if (FHtml::isInRole('', 'delete', $currentRole)) {Html::a( FHtml::t('common', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                    'confirm' => FHtml::t('common', 'Are you sure to delete ?'),
                    'method' => 'post',
                    ],
                    ]);} ?>
                    <?=  Html::a(FHtml::t('common', 'Cancel'), ['index'], ['class' => 'btn
                    btn-default']) ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php } ?>
