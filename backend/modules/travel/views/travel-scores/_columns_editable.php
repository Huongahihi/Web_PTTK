<?php
/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "TravelScores".
 */

use yii\helpers\Url;
use common\components\FHtml;
use common\components\Helper;
use kartik\datecontrol\DateControl;
use kartik\grid\GridView;

$currentRole = FHtml::getCurrentRole();
$moduleName = 'TravelScores';
$moduleTitle = 'Travel Scores';
$moduleKey = 'travel-scores';
$form_type = FHtml::getRequestParam('form_type');

$isEditable = FHtml::isInRole('', 'update');

return [
    [
        'class' => 'common\widgets\grid\CheckboxColumn',
        'width' => '20px',
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
            return Yii::$app->controller->renderPartial('_view_preview', ['model' => $model]);
        },
        'headerOptions' => ['class' => 'kartik-sheet-style'],
        'expandOneOnly' => false
    ],
//    [ //name: id, dbType: bigint(20), phpType: string, size: 20, allowNull:
//        'class'=>'kartik\grid\DataColumn',
//        'format'=>'html',
//        'attribute'=>'id',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'id', $form_type, true),
//        'value' => function($model) { return '<b>' . FHtml::showContent($model-> id, FHtml::SHOW_NUMBER, 'travel_scores', 'id','bigint(20)','travel-scores') . '</b>' ; },
//        'hAlign'=>'center',
//        'vAlign'=>'middle',
//        'width'=>'50px',
//    ],

    [ //name: attraction_id, dbType: int(11), phpType: integer, size: 11, allowNull:  
        'class' => 'kartik\grid\DataColumn',
        'format' => 'raw',
        'attribute' => 'attraction_id',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'attraction_id', $form_type, true),
        'value' => function ($model) {
            return FHtml::showContent($model->attraction_id, FHtml::SHOW_LOOKUP, '@travel_attractions', 'attraction_id', 'int(11)', 'travel-scores');
        },
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'group' => true, 'groupedRow' => true,
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => ''],
        'filter' => FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'attraction_id', true, 'id', 'name'),
        'contentOptions' => ['class' => 'col-md-1 nowrap'],
        'editableOptions' => function ($model, $key, $index, $widget) {
            $fields = FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'attraction_id', true, 'id', 'name');
            return [
                'inputType' => 'dropDownList',
                'displayValueConfig' => $fields,
                'data' => $fields
            ];
        },
    ],
    [ //name: site_id, dbType: int(11), phpType: integer, size: 11, allowNull: 1 
        'class' => 'kartik\grid\DataColumn',
        'format' => 'raw',
        'attribute' => 'site_id',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'site_id', $form_type, true),
        'value' => function ($model) {
            return FHtml::showContent($model->site_id, FHtml::SHOW_LOOKUP, '@travel_sites', 'site_id', 'int(11)', 'travel-scores');
        },
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => ''],
        'filter' => FHtml::getComboArray('@travel_sites', 'travel_sites', 'site_id', true, 'id', 'name'),
        'contentOptions' => ['class' => 'col-md-1 nowrap'],
        'editableOptions' => function ($model, $key, $index, $widget) {
            $fields = FHtml::getComboArray('@travel_sites', 'travel_sites', 'site_id', true, 'id', 'name');
            return [
                'inputType' => 'dropDownList',
                'displayValueConfig' => $fields,
                'data' => $fields
            ];
        },
    ],
    [ //name: name, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
        'class' => 'kartik\grid\DataColumn',
        'format' => 'raw',
        'attribute' => 'name',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'name', $form_type, true),
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'contentOptions' => ['class' => 'col-md-5 nowrap'],

    ],
    [ //name: is_active, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        'class' => 'kartik\grid\BooleanColumn',
        'format' => 'raw',
        'attribute' => 'is_active',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'is_active', $form_type, true),
        'value' => function ($model) {
            return FHtml::showContent($model->is_active, FHtml::SHOW_BOOLEAN, 'travel_scores', 'is_active', 'tinyint(1)', 'travel-scores');
        },
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'width' => '20px',
    ],
    [ //name: rank, dbType: int(11), phpType: integer, size: 11, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'rank', $form_type, true),
        'format' => 'raw', //['decimal', 0],
        'attribute' => 'rank',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'rank', $form_type, true),
        'value' => function ($model) {
            return FHtml::showContent($model->rank, FHtml::SHOW_NUMBER, 'travel_scores', 'rank', 'int(11)', 'travel-scores');
        },
        'hAlign' => 'right',
        'vAlign' => 'middle',
        'width' => '50px',
        'editableOptions' => [
            'size' => 'md',
            'inputType' => \kartik\editable\Editable::INPUT_SPIN, //'\kartik\money\MaskMoney',
            'options' => [
                'pluginOptions' => [
                    'min' => 0, 'max' => 50000000000, 'precision' => 0,
                ]
            ]
        ],
    ],
    [ //name: weight, dbType: int(11), phpType: integer, size: 11, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'weight', $form_type, true),
        'format' => 'raw', //['decimal', 0],
        'attribute' => 'weight',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'weight', $form_type, true),
        'value' => function ($model) {
            return FHtml::showContent($model->weight, FHtml::SHOW_NUMBER, 'travel_scores', 'weight', 'int(11)', 'travel-scores');
        },
        'hAlign' => 'right',
        'vAlign' => 'middle',
        'width' => '50px',
        'editableOptions' => [
            'size' => 'md',
            'inputType' => \kartik\editable\Editable::INPUT_SPIN, //'\kartik\money\MaskMoney',
            'options' => [
                'pluginOptions' => [
                    'min' => 0, 'max' => 50000000000, 'precision' => 0,
                ]
            ]
        ],
    ],
    [ //name: score, dbType: float, phpType: double, size: , allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'score', $form_type, true),
        'format' => 'raw',
        'attribute' => 'score',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'score', $form_type, true),
        'value' => function ($model) {
            return FHtml::showContent($model->score, '', 'travel_scores', 'score', 'float', 'travel-scores');
        },
        'hAlign' => 'right',
        'vAlign' => 'middle',
        'contentOptions' => ['class' => 'col-md-1 nowrap'],
    ],
    //[ //name: created_date, dbType: datetime, phpType: string, size: , allowNull: 1 
    //'class' => FHtml::getColumnClass($moduleName, 'created_date', $form_type, true),
    //'format'=>'raw', // date
    //'attribute'=>'created_date',
    //'visible' => FHtml::isVisibleInGrid($moduleName, 'created_date', $form_type, true),
    //'hAlign'=>'right',
    //'vAlign'=>'middle',
    //'width'=>'50px',
    //'editableOptions'=>[
    //'size'=>'md',
    //'inputType'=>\kartik\editable\Editable::INPUT_WIDGET,
    //'widgetClass'=> 'kartik\datecontrol\DateControl',
    //'options'=>[
    //'type'=>\kartik\datecontrol\DateControl::FORMAT_DATE,
    //'displayFormat'=> FHtml::config(FHtml::SETTINGS_DATE_FORMAT, 'Y.m.d'),
    //'saveFormat'=>'php:Y-m-d',
    //'options'=>[
    //'pluginOptions'=>[
    //'autoclose'=>true
    //]
    //]
    //]
    //],
    //],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => $this->params['buttonsType'], // Dropdown or Buttons
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'width' => '80px',
        'urlCreator' => function ($action, $model) {
            return FHtml::createBackendActionUrl([$action, 'id' => $model->id]);
        },
        'visibleButtons' => [
            'update' => FHtml::isInRole('', 'update', $currentRole),
            'delete' => FHtml::isInRole('', 'delete', $currentRole),
        ],
        'viewOptions' => ['role' => $this->params['displayType'], 'title' => FHtml::t('common', 'title.view'), 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => $this->params['editType'], 'title' => FHtml::t('common', 'title.update'), 'data-toggle' => 'tooltip'],
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