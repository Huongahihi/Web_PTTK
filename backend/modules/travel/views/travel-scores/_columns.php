<?php
use yii\helpers\Url;
use common\components\FHtml;
use common\components\Helper;
use kartik\datecontrol\DateControl;
use kartik\grid\GridView;

$moduleName = 'TravelScores';
$currentRole = FHtml::getCurrentRole();

return [
    [
        'class' => 'common\widgets\grid\CheckboxColumn',
        'width' => '20px',
        'headerOptions' => ['class' => 'hidden-print'],
        'contentOptions' => ['class' => 'hidden-print'],
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => 'kartik\grid\ExpandRowColumn',
        'width' => '50px',
        'value' => function ($model, $key, $index, $column) {
            return GridView::ROW_COLLAPSED;
        },
        'detail' => function ($model, $key, $index, $column) {
            return Yii::$app->controller->renderPartial('_view_print', ['model' => $model]);
        },
        'headerOptions' => ['class' => 'hidden-print'],
        'contentOptions' => ['class' => 'hidden-print'],
        'expandOneOnly' => false
    ],
    //[ //name: id, dbType: bigint(20), phpType: string, size: 20, allowNull:  
    //'class'=>'kartik\grid\DataColumn',
    //'format'=>['raw'],
    //'attribute'=>'id',
    //'value' => function($model) { return FHtml::showContent($model-> id, '', 'travel_scores', 'id','bigint(20)','travel-scores'); },
    //'hAlign'=>'right',
    //'vAlign'=>'middle',
    //'width'=>'50px',
    //],
    [ //name: name, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'name',
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'contentOptions' => ['class' => 'col-xs-2 nowrap'],
    ],
    [ //name: attraction_id, dbType: int(11), phpType: integer, size: 11, allowNull:  
        'class' => 'kartik\grid\DataColumn',
        'format' => ['raw'],
        'attribute' => 'attraction_id',
        'value' => function ($model) {
            return FHtml::showContent($model->attraction_id, '', 'travel_scores', 'attraction_id', 'int(11)', 'travel-scores');
        },
        'hAlign' => 'right',
        'vAlign' => 'middle',
        'width' => '50px',
    ],
    [ //name: site_id, dbType: int(11), phpType: integer, size: 11, allowNull: 1 
        'class' => 'kartik\grid\DataColumn',
        'format' => ['raw'],
        'attribute' => 'site_id',
        'value' => function ($model) {
            return FHtml::showContent($model->site_id, '', 'travel_scores', 'site_id', 'int(11)', 'travel-scores');
        },
        'hAlign' => 'right',
        'vAlign' => 'middle',
        'width' => '50px',
    ],
    [ //name: is_active, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        'class' => 'kartik\grid\BooleanColumn',
        'attribute' => 'is_active',
        'value' => function ($model) {
            return FHtml::showContent($model->is_active, FHtml::SHOW_BOOLEAN, 'travel_scores', 'is_active', 'tinyint(1)', 'travel-scores');
        },
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'width' => '20px',
    ],
    [ //name: rank, dbType: int(11), phpType: integer, size: 11, allowNull: 1 
        'class' => 'kartik\grid\DataColumn',
        'format' => ['raw'],
        'attribute' => 'rank',
        'value' => function ($model) {
            return FHtml::showContent($model->rank, '', 'travel_scores', 'rank', 'int(11)', 'travel-scores');
        },
        'hAlign' => 'right',
        'vAlign' => 'middle',
        'width' => '50px',
    ],
    [ //name: weight, dbType: int(11), phpType: integer, size: 11, allowNull: 1 
        'class' => 'kartik\grid\DataColumn',
        'format' => ['raw'],
        'attribute' => 'weight',
        'value' => function ($model) {
            return FHtml::showContent($model->weight, '', 'travel_scores', 'weight', 'int(11)', 'travel-scores');
        },
        'hAlign' => 'right',
        'vAlign' => 'middle',
        'width' => '50px',
    ],
    [ //name: score, dbType: float, phpType: double, size: , allowNull: 1 
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'score',
        'value' => function ($model) {
            return FHtml::showContent($model->score, '', 'travel_scores', 'score', 'float', 'travel-scores');
        },
        'hAlign' => 'right',
        'vAlign' => 'middle',
        'contentOptions' => ['class' => 'col-xs-1 nowrap'],
    ],
    [ //name: created_date, dbType: datetime, phpType: string, size: , allowNull: 1 
        'class' => 'kartik\grid\DataColumn',
        'format' => 'date',
        'attribute' => 'created_date',
        'hAlign' => 'right',
        'vAlign' => 'middle',
        'contentOptions' => ['class' => 'col-xs-1 nowrap'],
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => $this->params['buttonsType'], // Dropdown or Buttons
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'width' => '80px',
        'urlCreator' => function ($action, $model) {
            return FHtml::createBackendActionUrl([$action, 'id' => $model->id]);
        },
        'headerOptions' => ['class' => 'hidden-print'],
        'contentOptions' => ['class' => 'hidden-print'],
        'visibleButtons' => [
            'update' => FHtml::isInRole('', 'update', $currentRole),
            'delete' => FHtml::isInRole('', 'delete', $currentRole),
        ],
        'viewOptions' => ['role' => 'modal-remote', 'title' => FHtml::t('common', 'title.view'), 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => $this->params['displayType'], 'title' => FHtml::t('common', 'title.update'), 'data-toggle' => 'tooltip'],
        'deleteOptions' => [
            'role' => 'modal-remote',
            'title' => FHtml::t('common', 'title.delete'),
            'data-confirm' => false,
            'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => FHtml::t('common', 'Confirmation'),
            'data-confirm-message' => FHtml::t('common', 'messege.confirmdelete')
        ],
    ],
];