<?php
/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "TravelPlans".
 */

use yii\helpers\Url;
use common\components\FHtml;
use common\components\Helper;
use kartik\datecontrol\DateControl;
use kartik\grid\GridView;

$currentRole = FHtml::getCurrentRole();
$moduleName = 'TravelPlans';
$moduleTitle = 'Travel Plans';
$moduleKey = 'travel-plans';
$form_type = FHtml::getRequestParam('form_type');

$isEditable = FHtml::isInRole('', 'update');

return [
    [
        'class' => 'common\widgets\grid\CheckboxColumn',
        'width' => '20px',
    ],
//    [
//        'class' => 'kartik\grid\SerialColumn',
//        'width' => '30px',
//    ],
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
    [ //name: user_itinerary_id, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
        'class' => 'kartik\grid\DataColumn',
        'format' => 'raw',
        'attribute' => 'user_itinerary_id',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'user_itinerary_id', $form_type, true),
        'value' => function ($model) {
            return FHtml::showContent($model->user_itinerary_id, FHtml::SHOW_LOOKUP, '@travel_itinerary', 'user_itinerary_id', 'varchar(100)', 'travel-plans');
        },
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'width' => '150px',
        'group' => true,
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => ''],
        'filter' => FHtml::getComboArray('@travel_itinerary', 'travel_itinerary', 'user_itinerary_id', true, 'id', 'name'),
    ],
    [ //name: day, dbType: int(11), phpType: integer, size: 11, allowNull: 1
        'class' => FHtml::getColumnClass($moduleName, 'day', $form_type, true),
        'format' => 'raw', //['decimal', 0],
        'attribute' => 'day',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'day', $form_type, true),
        'value' => function ($model) {
            return 'Day ' . FHtml::showContent($model->day, FHtml::SHOW_NUMBER, 'travel_plans', 'day', 'int(11)', 'travel-plans');
        },
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'width' => '50px',
        'group' => true,
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
    [ //name: id, dbType: bigint(20), phpType: string, size: 20, allowNull:  
        'class' => 'kartik\grid\DataColumn',
        'format' => 'html',
        'attribute' => 'id',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'id', $form_type, true),
        'value' => function ($model) {
            return '<b>' . FHtml::showContent($model->id, FHtml::SHOW_NUMBER, 'travel_plans', 'id', 'bigint(20)', 'travel-plans') . '</b>';
        },
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'width' => '50px',
    ],

    [ //name: name, dbType: varchar(255), phpType: string, size: 255, allowNull:  
        'class' => FHtml::getColumnClass($moduleName, 'name', $form_type, true),
        'format' => 'raw',
        'attribute' => 'name',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'name', $form_type, true),
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'contentOptions' => ['class' => 'col-md-2 nowrap'],
        'editableOptions' => [
            'size' => 'md',
            'inputType' => \kartik\editable\Editable::INPUT_TEXT,
            'widgetClass' => 'kartik\datecontrol\InputControl',
            'options' => [
                'options' => [
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]
            ]
        ],
    ],

//    [ //name: next_plan_id, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
//        'class'=>'kartik\grid\DataColumn',
//        'format'=>'raw',
//        'attribute'=>'next_plan_id',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'next_plan_id', $form_type, true),
//        'value' => function($model) { return FHtml::showContent($model-> next_plan_id, FHtml::SHOW_LOOKUP, '@travel_plans', 'next_plan_id','varchar(100)','travel-plans'); },
//        'hAlign'=>'left',
//        'vAlign'=>'middle',
//        'width'=>'80px',
//        'filterType' => GridView::FILTER_SELECT2,
//        'filterWidgetOptions'=>[
//                            'pluginOptions'=>['allowClear' => true],
//                            ],
//        'filterInputOptions'=>['placeholder'=>''],
//        'filter'=> FHtml::getComboArray('@travel_plans', 'travel_plans', 'next_plan_id', true, 'id', 'name'),
//    ],
    [ //name: attraction_id, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        'class' => 'kartik\grid\DataColumn',
        'format' => 'raw',
        'attribute' => 'attraction_id',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'attraction_id', $form_type, true),
        'value' => function ($model) {
            return FHtml::showContent($model->attraction_id, FHtml::SHOW_LOOKUP, '@travel_attractions', 'attraction_id', 'varchar(100)', 'travel-plans');
        },
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'width' => '200px',
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => ''],
        'filter' => FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'attraction_id', true, 'id', 'name'),
    ],
    [ //name: attraction_arrived, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
        'class' => FHtml::getColumnClass($moduleName, 'attraction_start', $form_type, true),
        'format' => 'raw',
        'attribute' => 'attraction_start',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'attraction_start', $form_type, true),
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'contentOptions' => ['class' => 'col-md-1 nowrap'],
        'editableOptions' => [
            'size' => 'md',
            'inputType' => \kartik\editable\Editable::INPUT_TEXT,
            'widgetClass' => 'kartik\datecontrol\InputControl',
            'options' => [
                'options' => [
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]
            ]
        ],
    ],
    [ //name: attraction_arrived, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'attraction_arrived', $form_type, true),
        'format' => 'raw',
        'attribute' => 'attraction_arrived',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'attraction_arrived', $form_type, true),
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'contentOptions' => ['class' => 'col-md-1 nowrap'],
        'editableOptions' => [
            'size' => 'md',
            'inputType' => \kartik\editable\Editable::INPUT_TEXT,
            'widgetClass' => 'kartik\datecontrol\InputControl',
            'options' => [
                'options' => [
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]
            ]
        ],
    ],
    [ //name: attraction_duration, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'attraction_duration', $form_type, true),
        'format' => 'raw',
        'attribute' => 'attraction_duration',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'attraction_duration', $form_type, true),
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'contentOptions' => ['class' => 'col-md-1 nowrap'],
        'editableOptions' => [
            'size' => 'md',
            'inputType' => \kartik\editable\Editable::INPUT_TEXT,
            'widgetClass' => 'kartik\datecontrol\InputControl',
            'options' => [
                'options' => [
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]
            ]
        ],
    ],
//    [ //name: next_attraction_id, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
//        'class'=>'kartik\grid\DataColumn',
//        'format'=>'raw',
//        'attribute'=>'next_attraction_id',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'next_attraction_id', $form_type, true),
//        'value' => function($model) { return FHtml::showContent($model-> next_attraction_id, FHtml::SHOW_LOOKUP, '@travel_attractions', 'next_attraction_id','varchar(100)','travel-plans'); },
//        'hAlign'=>'left',
//        'vAlign'=>'middle',
//        'width'=>'80px',
//        'filterType' => GridView::FILTER_SELECT2,
//        'filterWidgetOptions'=>[
//                            'pluginOptions'=>['allowClear' => true],
//                            ],
//        'filterInputOptions'=>['placeholder'=>''],
//        'filter'=> FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'next_attraction_id', true, 'id', 'name'),
//    ],
//    [ //name: travel_by, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
//        'class' => FHtml::getColumnClass($moduleName, 'travel_by', $form_type, true),
//        'format'=>'raw',
//        'attribute'=>'travel_by',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'travel_by', $form_type, true),
//        'hAlign'=>'left',
//        'vAlign'=>'middle',
//        'filterType' => GridView::FILTER_SELECT2,
//        'filterWidgetOptions'=>[
//                            'pluginOptions'=>['allowClear' => true],
//                            ],
//        'filterInputOptions'=>['placeholder'=>''],
//        'filter'=> FHtml::getComboArray('travel_plans', 'travel_plans', 'travel_by', true, 'id', 'name'),
//        'contentOptions'=>['class'=>'col-md-1 nowrap'],
//        'editableOptions'=> function ($model, $key, $index, $widget) {
//                                    $fields = FHtml::getComboArray('travel_plans', 'travel_plans', 'travel_by', true, 'id', 'name');
//                                    return [
//                                    'inputType' => 'dropDownList',
//                                    'displayValueConfig' => $fields,
//                                    'data' => $fields
//                                    ];
//                                    },
//    ],
    [ //name: travel_duration, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
        'class' => FHtml::getColumnClass($moduleName, 'travel_duration', $form_type, true),
        'format' => 'raw',
        'attribute' => 'travel_duration',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'travel_duration', $form_type, true),
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'contentOptions' => ['class' => 'col-md-1 nowrap'],
        'editableOptions' => [
            'size' => 'md',
            'inputType' => \kartik\editable\Editable::INPUT_TEXT,
            'widgetClass' => 'kartik\datecontrol\InputControl',
            'options' => [
                'options' => [
                    'pluginOptions' => [
                        'autoclose' => true
                    ]
                ]
            ]
        ],
    ],
//    [ //name: travel_distance, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
//        'class' => FHtml::getColumnClass($moduleName, 'travel_distance', $form_type, true),
//        'format'=>'raw',
//        'attribute'=>'travel_distance',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'travel_distance', $form_type, true),
//        'hAlign'=>'left',
//        'vAlign'=>'middle',
//        'contentOptions'=>['class'=>'col-md-1 nowrap'],
//        'editableOptions'=>[
//                            'size'=>'md',
//                            'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
//                            'widgetClass'=> 'kartik\datecontrol\InputControl',
//                            'options'=>[
//                                'options'=>[
//                                    'pluginOptions'=>[
//                                        'autoclose'=>true
//                                    ]
//                                ]
//                            ]
//                        ],
//    ],
//    [ //name: note, dbType: text, phpType: string, size: , allowNull: 1
//        'class' => FHtml::getColumnClass($moduleName, 'note', $form_type, true),
//        'format'=>'raw',
//        'attribute'=>'note',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'note', $form_type, true),
//        'value' => function($model) { return FHtml::showContent($model-> note, '', 'travel_plans', 'note','text','travel-plans'); },
//        'hAlign'=>'right',
//        'vAlign'=>'middle',
//        'contentOptions'=>['class'=>'col-md-1 nowrap'],
//    ],
    //[ //name: sort_order, dbType: int(11), phpType: integer, size: 11, allowNull: 1 
    //'class' => FHtml::getColumnClass($moduleName, 'sort_order', $form_type, true),
    //'format'=>'raw', //['decimal', 0],
    //'attribute'=>'sort_order',
    //'visible' => FHtml::isVisibleInGrid($moduleName, 'sort_order', $form_type, true),
    //'value' => function($model) { return FHtml::showContent($model-> sort_order, FHtml::SHOW_NUMBER, 'travel_plans', 'sort_order','int(11)','travel-plans'); },
    //'hAlign'=>'right',
    //'vAlign'=>'middle',
    //'width'=>'50px',
    //'editableOptions'=>[
    //'size'=>'md',
    //'inputType'=>\kartik\editable\Editable::INPUT_SPIN, //'\kartik\money\MaskMoney',
    //'options'=>[
    //'pluginOptions'=>[
    //'min'=>0, 'max' => 50000000000, 'precision' => 0,
    //]
    //]
    //],
    //],
//    [ //name: user_id, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
//        'class'=>'kartik\grid\DataColumn',
//        'format'=>'raw',
//        'attribute'=>'user_id',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'user_id', $form_type, true),
//        'value' => function($model) { return FHtml::showContent($model-> user_id, FHtml::SHOW_LOOKUP, '@user', 'user_id','varchar(100)','travel-plans'); },
//        'hAlign'=>'left',
//        'vAlign'=>'middle',
//        'width'=>'80px',
//        'filterType' => GridView::FILTER_SELECT2,
//        'filterWidgetOptions'=>[
//                            'pluginOptions'=>['allowClear' => true],
//                            ],
//        'filterInputOptions'=>['placeholder'=>''],
//        'filter'=> FHtml::getComboArray('@user', 'user', 'user_id', true, 'id', 'name'),
//    ],

    [ //name: is_locked, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        'class' => 'kartik\grid\BooleanColumn',
        'format' => 'raw',
        'attribute' => 'is_locked',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'is_locked', $form_type, true),
        'value' => function ($model) {
            return FHtml::showContent($model->is_locked, FHtml::SHOW_BOOLEAN, 'travel_plans', 'is_locked', 'tinyint(1)', 'travel-plans');
        },
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'width' => '20px',
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
    //[ //name: created_user, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
    //'class'=>'kartik\grid\DataColumn',
    //'format'=>'raw',
    //'attribute'=>'created_user',
    //'visible' => FHtml::isVisibleInGrid($moduleName, 'created_user', $form_type, true),
    //'value' => function($model) { return FHtml::showContent($model-> created_user, FHtml::SHOW_LABEL, 'travel_plans', 'created_user','varchar(100)','travel-plans'); },
    //'hAlign'=>'left',
    //'vAlign'=>'middle',
    //'width'=>'80px',
    //'filterType' => GridView::FILTER_SELECT2,
    //'filterWidgetOptions'=>[
    //'pluginOptions'=>['allowClear' => true],
    //],
    //'filterInputOptions'=>['placeholder'=>''],
    //'filter'=> FHtml::getComboArray('travel_plans', 'travel_plans', 'created_user', true, 'id', 'name'),
    //],
    //[ //name: modified_date, dbType: datetime, phpType: string, size: , allowNull: 1 
    //'class' => FHtml::getColumnClass($moduleName, 'modified_date', $form_type, true),
    //'format'=>'raw', // date
    //'attribute'=>'modified_date',
    //'visible' => FHtml::isVisibleInGrid($moduleName, 'modified_date', $form_type, true),
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
    //[ //name: modified_user, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
    //'class'=>'kartik\grid\DataColumn',
    //'format'=>'raw',
    //'attribute'=>'modified_user',
    //'visible' => FHtml::isVisibleInGrid($moduleName, 'modified_user', $form_type, true),
    //'value' => function($model) { return FHtml::showContent($model-> modified_user, FHtml::SHOW_LABEL, 'travel_plans', 'modified_user','varchar(100)','travel-plans'); },
    //'hAlign'=>'left',
    //'vAlign'=>'middle',
    //'width'=>'80px',
    //'filterType' => GridView::FILTER_SELECT2,
    //'filterWidgetOptions'=>[
    //'pluginOptions'=>['allowClear' => true],
    //],
    //'filterInputOptions'=>['placeholder'=>''],
    //'filter'=> FHtml::getComboArray('travel_plans', 'travel_plans', 'modified_user', true, 'id', 'name'),
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