<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use \common\components\FHtml;
use common\components\Helper;
use common\widgets\FDetailView;
use yii\widgets\Pjax;

$moduleName = 'TravelAttractions';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);
$currentAction = FHtml::currentAction();

$print = isset($print) ? $print : true;
$ajax = isset($ajax) ? $ajax : (FHtml::isListAction($currentAction) ? false : true);

/* @var $this yii\web\View */
/* @var $model backend\modules\travel\models\TravelAttractions */
?>
<?php if (!Yii::$app->request->isAjax) {
$this->title = 'Travel Attractions';
$this->params['toolBarActions'] = array(
'linkButton'=>array(),
'button'=>array(),
'dropdown'=>array(),
);
$this->params['mainIcon'] = 'fa fa-list';
} ?>
<?php if ($ajax) Pjax::begin(['id' => 'crud-datatable'])  ?>

<?php if (Yii::$app->request->isAjax) { ?>
<div class="travel-attractions-view">

       <?= FDetailView::widget([
    'model' => $model,
    'attributes' => [
                    'id',
                'thumbnail',
                'image',
                'image_description',
                'name',
                'description',
                'content',
                'note',
                'tel',
                'address',
                'website',
                'map',
                'rate',
                'score',
                'budget',
                'default_duration',
                'sort_order',
                'lat',
                'long',
                'open',
                'close',
                'street',
                'city',
                'country',
                'category_id',
                'type',
                'status',
                'is_active',
                'is_new',
                'is_hot',
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
                'image_description',
                'name',
                'description',
                'content',
                'note',
                'tel',
                'address',
                'website',
                'map',
                'rate',
                'score',
                'budget',
                'default_duration',
                'sort_order',
                'lat',
                'long',
                'open',
                'close',
                'street',
                'city',
                'country',
                'category_id',
                'type',
                'status',
                'is_active',
                'is_new',
                'is_hot',
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

