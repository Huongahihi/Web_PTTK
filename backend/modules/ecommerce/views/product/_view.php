<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use \common\components\FHtml;
use common\components\Helper;
use common\widgets\FDetailView;
use yii\widgets\Pjax;

$moduleName = 'Product';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);
$currentAction = FHtml::currentAction();
$print = isset($print) ? $print : true;
$ajax = isset($ajax) ? $ajax : (FHtml::isListAction($currentAction) ? false : true);

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\Product */
?>
<?php if (!Yii::$app->request->isAjax) {
$this->title = 'Products';
$this->params['toolBarActions'] = array(
'linkButton'=>array(),
'button'=>array(),
'dropdown'=>array(),
);
$this->params['mainIcon'] = 'fa fa-list';
} ?>
<?php if ($ajax) Pjax::begin(['id' => 'crud-datatable'])  ?>

<?php if (Yii::$app->request->isAjax) { ?>
<div class="product-view">

       <?= FDetailView::widget([
    'model' => $model,
    'attributes' => [
                    'id',
                'thumbnail',
                'image',
                'banner',
                'code',
                'name',
                'overview',
                'content',
                'cost',
                'price',
                'unit',
                'currency',
                'color',
                'type',
                'status',
                'brand_id',
                'category_id',
                'is_active',
                'is_hot',
                'is_top',
                'promotion_id',
                'quantity',
                'discount',
                'tax',
                'sort_order',
                'count_views',
                'count_comments',
                'count_purchase',
                'count_likes',
                'count_rates',
                'rates',
                'qrcode_image',
                'barcode_image',
                'created_date',
                'created_user',
                'modified_date',
                'modified_user',
                'application_id',
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
                'thumbnail',
                'image',
                'banner',
                'code',
                'name',
                'overview',
                'content',
                'cost',
                'price',
                'unit',
                'currency',
                'color',
                'type',
                'status',
                'brand_id',
                'category_id',
                'is_active',
                'is_hot',
                'is_top',
                'promotion_id',
                'quantity',
                'discount',
                'tax',
                'sort_order',
                'count_views',
                'count_comments',
                'count_purchase',
                'count_likes',
                'count_rates',
                'rates',
                'qrcode_image',
                'barcode_image',
                'created_date',
                'created_user',
                'modified_date',
                'modified_user',
                'application_id',
                ],
                ]) ?>

            </div>

        </div>

<?php } ?><?php if ($ajax) Pjax::end()  ?>

