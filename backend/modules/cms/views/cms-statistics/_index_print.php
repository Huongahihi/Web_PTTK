<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use common\components\CrudAsset;
use common\widgets\BulkButtonWidget;
use common\components\FHtml;
use common\components\Helper;
use common\widgets\FGridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\cms\models\CmsStatisticsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$moduleName = 'CmsStatistics';
$moduleTitle = 'Cms Statistics';
$moduleKey = 'cms-statistics';
$moduleModel = 'cms_statistics';

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
<div class="cms-statistics-index visible-print">
    <div class="row">
        <div class="col-md-12">
            <div id="ajaxCrudDatatable" class="">
                <?=FGridView::widget([
                'id'=>'crud-datatable-print',
                'dataProvider' => $dataProvider,
                'filterModel' => null,
                'object_type' => $moduleModel,
                'pjax' => false,
                'display_type' => 'print',
                'toolbar' => null,
                'columns' => require(__DIR__.'/'.$gridControl),
                'layout' => "{toolbar}\n{items}",
                ])?>
            </div>
        </div>
    </div>
</div>


