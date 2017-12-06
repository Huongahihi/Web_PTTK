<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use \common\components\FHtml;
use common\components\Helper;
use common\widgets\FDetailView;
use yii\widgets\Pjax;

$moduleName = 'Promotion';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);
$currentAction = FHtml::currentAction();

$print = isset($print) ? $print : true;
$ajax = isset($ajax) ? $ajax : (FHtml::isListAction($currentAction) ? false : true);

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\Promotion */
?>
<?php if (!Yii::$app->request->isAjax) {
$this->title = 'Promotions';
$this->params['toolBarActions'] = array(
'linkButton'=>array(),
'button'=>array(),
'dropdown'=>array(),
);
$this->params['mainIcon'] = 'fa fa-list';
} ?>
<?php if ($ajax) Pjax::begin(['id' => 'crud-datatable'])  ?>

<?php if (Yii::$app->request->isAjax) { ?>
<div class="promotion-view">

       <?= FDetailView::widget([
    'model' => $model,
    'attributes' => [
                    'id',
                'code',
                'image',
                'banner',
                'name',
                'overview',
                'content',
                'link_url',
                'discount_type',
                'discount',
                'usage_limit',
                'usage_current',
                'apply_type',
                'sales_over',
                'products',
                'start_date',
                'end_date',
                'is_top',
                'is_active',
                'sort_order',
                'count_views',
                'count_shares',
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
                'code',
                'image',
                'banner',
                'name',
                'overview',
                'content',
                'link_url',
                'discount_type',
                'discount',
                'usage_limit',
                'usage_current',
                'apply_type',
                'sales_over',
                'products',
                'start_date',
                'end_date',
                'is_top',
                'is_active',
                'sort_order',
                'count_views',
                'count_shares',
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

