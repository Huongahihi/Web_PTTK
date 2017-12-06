<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use \common\components\FHtml;
use common\components\Helper;
use common\widgets\FDetailView;
use yii\widgets\Pjax;

$moduleName = 'CrmClient';

$currentRole = FHtml::getCurrentRole();
$currentAction = FHtml::currentAction();

$canEdit = FHtml::isInRole('', 'edit', $currentRole, FHtml::getFieldValue($model, ['user_id', 'created_user']));
$canDelete = FHtml::isInRole('', 'delete', $currentRole);

$print = isset($print) ? $print : true;
$ajax = isset($ajax) ? $ajax : (FHtml::isListAction($currentAction) ? false : true);

/* @var $this yii\web\View */
/* @var $model backend\modules\crm\models\CrmClient */
?>
<?php if (!Yii::$app->request->isAjax) {
$this->title = 'Crm Clients';
$this->params['toolBarActions'] = array(
'linkButton'=>array(),
'button'=>array(),
'dropdown'=>array(),
);
$this->params['mainIcon'] = 'fa fa-list';
} ?>
<?php if ($ajax) Pjax::begin(['id' => 'crud-datatable'])  ?>

<?php if (Yii::$app->request->isAjax) { ?>
<div class="crm-client-view">

       <?= FDetailView::widget([
    'model' => $model,
    'attributes' => [
                    'id',
                'image',
                'code',
                'name',
                'description',
                'content',
                'start_date',
                'contact_name',
                'contact_title',
                'mobile',
                'website',
                'address',
                'address2',
                'phone',
                'email',
                'fax',
                'company',
                'business_license',
                'tax_code',
                'payment_info',
                'payment_term',
                'zip_code',
                'city',
                'country',
                'region',
                'note',
                'tags',
                'is_active',
                'type',
                'status',
                'sale_user',
                'ip_address',
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
                'image',
                'code',
                'name',
                'description',
                'content',
                'start_date',
                'contact_name',
                'contact_title',
                'mobile',
                'website',
                'address',
                'address2',
                'phone',
                'email',
                'fax',
                'company',
                'business_license',
                'tax_code',
                'payment_info',
                'payment_term',
                'zip_code',
                'city',
                'country',
                'region',
                'note',
                'tags',
                'is_active',
                'type',
                'status',
                'sale_user',
                'ip_address',
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

