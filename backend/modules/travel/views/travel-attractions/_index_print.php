<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use common\components\CrudAsset;
use common\widgets\BulkButtonWidget;
use common\components\FHtml;
use common\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\travel\models\TravelAttractionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$moduleName = 'TravelAttractions';
$moduleTitle = 'Travel Attractions';
$moduleKey = 'travel-attractions';

$this->title = FHtml::t($moduleTitle);

$this->params['toolBarActions'] = array(
'linkButton'=>array(),
'button'=>array(),
'dropdown'=>array(),
);
$this->params['mainIcon'] = 'fa fa-list';

CrudAsset::register($this);

$currentRole = FHtml::getCurrentRole();
$gridControl = '';
$folder = ''; //manual edit files in 'live' folder only

if (FHtml::isInRole('', 'update', $currentRole) && FHtml::settingAdminInlineEdit() == true)
{
    $gridControl = $folder.'_columns.php';
}
else
{
    $gridControl = $folder.'_columns.php';
}

?>
<div class="travel-attractions-index">
    <div class="row">
        <div class="col-md-12">
            <?= $this->render(\Globals::VIEWS_PRINT_HEADER, ['form_type' => $moduleName, 'title' => FHtml::t('common', 'List')]) ?>
            <div id="ajaxCrudDatatable" class="<?php if (!$this->params['displayPortlet']) echo 'portlet light'; ?>">
                <?=\common\widgets\FGridView::widget([
                'id'=>'',
                //'floatHeader' => true, // enable this will keep header when scroll but disable resizeable column feature
                'dataProvider' => $dataProvider,
                'filterModel' => null,
                'pjax' => false,
                    'display_type' => 'print',
                'pager' => [
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last',
                ],
                'floatHeader'=>false,
                'hover' => false,
                'filterPosition'=>'',
                'toolbar' => null,
                'columns' => require(__DIR__.'/'.$gridControl),
                'striped' => false,
                'condensed' => true,
                'responsive' => false,
                'bordered'=> true,
                'showPageSummary'=> false,
                'layout' => "{toolbar}\n{items}\n{summary}\n{pager}",
                'panel' => false,
                'sorter' => false
                ])?>
            </div>
        </div>
    </div>
</div>


