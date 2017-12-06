<?php
/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "TravelSites".
*/

use yii\helpers\Url;
use common\components\FHtml;
use common\components\Helper;
use kartik\datecontrol\DateControl;
use kartik\grid\GridView;

$currentRole = FHtml::getCurrentRole();
$moduleName = 'TravelSites';
$moduleTitle = 'Travel Sites';
$moduleKey = 'travel-sites';
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
        'class'=>'kartik\grid\ExpandRowColumn',
        'width'=>'50px',
        'value'=>function ($model, $key, $index, $column) {
        return GridView::ROW_COLLAPSED;
        },
        'detail'=>function ($model, $key, $index, $column) {
        return Yii::$app->controller->renderPartial('_view_preview', ['model'=>$model]);
        },
        'headerOptions'=>['class'=>'kartik-sheet-style'],
        'expandOneOnly'=>false
    ],
//    [ //name: id, dbType: int(11), phpType: integer, size: 11, allowNull:
//        'class'=>'kartik\grid\DataColumn',
//        'format'=>'html',
//        'attribute'=>'id',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'id', $form_type, true),
//        'value' => function($model) { return '<b>' . FHtml::showContent($model-> id, FHtml::SHOW_NUMBER, 'travel_sites', 'id','int(11)','travel-sites') . '</b>' ; },
//        'hAlign'=>'center',
//        'vAlign'=>'middle',
//        'width'=>'50px',
//    ],
    [ //name: city, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
        'class' => FHtml::getColumnClass($moduleName, 'city', $form_type, true),
        'format'=>'raw',
        'attribute'=>'city',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'city', $form_type, true),
        'hAlign'=>'left',
        'vAlign'=>'middle',
        //'group' => true,
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions'=>[
                            'pluginOptions'=>['allowClear' => true],
                            ],
        'filterInputOptions'=>['placeholder'=>''],
        'filter'=> FHtml::getComboArray('travel', 'travel', 'city', true, 'id', 'name'),
        'contentOptions'=>['class'=>'col-md-1 nowrap'],
        'editableOptions'=> function ($model, $key, $index, $widget) {
                                    $fields = FHtml::getComboArray('travel', 'travel', 'city', true, 'id', 'name');
                                    return [
                                    'inputType' => 'dropDownList',
                                    'displayValueConfig' => $fields,
                                    'data' => $fields
                                    ];
                                    },
    ],
    [ //name: keywords, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
        'class' => FHtml::getColumnClass($moduleName, 'keywords', $form_type, true),
        'format'=>'raw',
        'attribute'=>'keywords',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'keywords', $form_type, true),
        'hAlign'=>'left',
        'vAlign'=>'middle',
        //'group' => true, 'groupedRow'=>false,
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions'=>[
                            'pluginOptions'=>['allowClear' => true],
                            ],
        'filterInputOptions'=>['placeholder'=>''],
        'filter'=> FHtml::getComboArray('travel', 'travel', 'keywords', true, 'id', 'name'),
        'contentOptions'=>['class'=>'col-md-1 nowrap'],
        'editableOptions'=> function ($model, $key, $index, $widget) {
                                    $fields = FHtml::getComboArray('travel', 'travel', 'keywords', true, 'id', 'name');
                                    return [
                                    'inputType' => 'dropDownList',
                                    'displayValueConfig' => $fields,
                                    'data' => $fields
                                    ];
                                    },
    ],
    [ //name: name, dbType: varchar(255), phpType: string, size: 255, allowNull:  
        'class' => FHtml::getColumnClass($moduleName, 'name', $form_type, true),
        'format'=>'raw',
        'attribute'=>'name',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'name', $form_type, true),
        'hAlign'=>'left',
        'vAlign'=>'middle',
        'contentOptions'=>['class'=>'col-md-2 nowrap'],
        'editableOptions'=>[                       
                            'size'=>'md',
                            'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                            'widgetClass'=> 'kartik\datecontrol\InputControl',
                            'options'=>[
                                'options'=>[
                                    'pluginOptions'=>[
                                        'autoclose'=>true
                                    ]
                                ]
                            ]
                        ],
    ],
    [ //name: url, dbType: varchar(2000), phpType: string, size: 2000, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'url', $form_type, true),
        'format'=>'raw',
        'attribute'=>'url',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'url', $form_type, true),
        'hAlign'=>'left',
        'vAlign'=>'middle',
        'contentOptions'=>['class'=>'col-md-2 nowrap'],
        'editableOptions'=>[                       
                            'size'=>'md',
                            'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                            'widgetClass'=> 'kartik\datecontrol\InputControl',
                            'options'=>[
                                'options'=>[
                                    'pluginOptions'=>[
                                        'autoclose'=>true
                                    ]
                                ]
                            ]
                        ],
    ],
    [ //name: weight, dbType: int(23), phpType: integer, size: 23, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'weight', $form_type, true),
        'format'=>'raw', //['decimal', 0],
        'attribute'=>'weight',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'weight', $form_type, true),
        'value' => function($model) { return FHtml::showContent($model-> weight, FHtml::SHOW_NUMBER, 'travel_sites', 'weight','int(23)','travel-sites'); }, 
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'width'=>'50px',
        'editableOptions'=>[                       
                            'size'=>'md',
                            'inputType'=>\kartik\editable\Editable::INPUT_SPIN, //'\kartik\money\MaskMoney',
                            'options'=>[
                                'pluginOptions'=>[
                                    'min'=>0, 'max' => 50000000000, 'precision' => 0, 
                                ]
                            ]
                        ],
    ],
    //[ //name: search_content, dbType: text, phpType: string, size: , allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'search_content', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'search_content',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'search_content', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> search_content, '', 'travel_sites', 'search_content','text','travel-sites'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    [ //name: search_element, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
        'class' => FHtml::getColumnClass($moduleName, 'search_element', $form_type, true),
        'format'=>'raw',
        'attribute'=>'search_element',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'search_element', $form_type, true),
        'hAlign'=>'left',
        'vAlign'=>'middle',
        'contentOptions'=>['class'=>'col-md-1 nowrap'],
        'editableOptions'=>[
                            'size'=>'md',
                            'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                            'widgetClass'=> 'kartik\datecontrol\InputControl',
                            'options'=>[
                                'options'=>[
                                    'pluginOptions'=>[
                                        'autoclose'=>true
                                    ]
                                ]
                            ]
                        ],
    ],
//    [ //name: search_result, dbType: varchar(10000), phpType: string, size: 10000, allowNull: 1
//        'class' => FHtml::getColumnClass($moduleName, 'search_result', $form_type, true),
//        'format'=>'raw',
//        'attribute'=>'search_result',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'search_result', $form_type, true),
//        'hAlign'=>'left',
//        'vAlign'=>'middle',
//        'contentOptions'=>['class'=>'col-md-2 nowrap'],
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
    [ //name: is_active, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        'class'=>'kartik\grid\BooleanColumn',
        'format'=>'raw',
        'attribute'=>'is_active',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'is_active', $form_type, true),
        'value' => function($model) { return FHtml::showContent($model-> is_active, FHtml::SHOW_BOOLEAN, 'travel_sites', 'is_active','tinyint(1)','travel-sites'); }, 
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'20px',
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
        //'value' => function($model) { return FHtml::showContent($model-> created_user, FHtml::SHOW_LABEL, 'travel_sites', 'created_user','varchar(100)','travel-sites'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'80px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('travel_sites', 'travel_sites', 'created_user', true, 'id', 'name'),
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
        //'value' => function($model) { return FHtml::showContent($model-> modified_user, FHtml::SHOW_LABEL, 'travel_sites', 'modified_user','varchar(100)','travel-sites'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'80px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('travel_sites', 'travel_sites', 'modified_user', true, 'id', 'name'),
    //],
    [ //name: is_system, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
        'class'=>'kartik\grid\DataColumn',
        'label' => '',
        'format'=>'raw',
        'attribute'=>'',
        'visible' => true,
        'value' => function($model) { return '' //'<a class="btn btn-edit" target="_blank" href="' . FHtml::createUrl('travel/travel-plans', ['user_itinerary_id' => $model->id], BACKEND) . '"> Plans ' . '</a>'
        . '<a class="btn btn-xs btn-edit btn-success" data-pjax=0 href="' . FHtml::createUrl('travel/travel-sites/search', ['id' => $model->id], BACKEND) . '"> SEARCH ' . '</a>'
       // . '<a class="btn btn-xs btn-edit btn-default" data-pjax=0 target="_blank" href="' . $model->url . '"> OPEN ' . '</a>'
        . '<a class="btn btn-xs btn-edit btn-default" data-pjax=0 target="_blank" href="' . FHtml::createUrl('travel/travel-sites/view', ['id' => $model->id, 'layout' => 'no', 'view' => 'sites'], BACKEND) . '"> PREVIEW ' . '</a>'

            ; },
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'70px',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => $this->params['buttonsType'], // Dropdown or Buttons
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'80px',
        'urlCreator' => function($action, $model) {
            return FHtml::createBackendActionUrl([$action, 'id' => $model->id]);
        },
        'visibleButtons' =>[
            'update' => FHtml::isInRole('', 'update', $currentRole),
            'delete' => FHtml::isInRole('', 'delete', $currentRole),
        ],
        'viewOptions'=>['role'=>$this->params['displayType'],'title'=>FHtml::t('common', 'title.view'),'data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>$this->params['editType'],'title'=>FHtml::t('common', 'title.update'), 'data-toggle'=>'tooltip'],
        'deleteOptions'=>[
            'role'=>'modal-remote',
            'title'=>FHtml::t('common', 'title.delete'),
            'data-confirm'=>false,
            'data-method'=>false,// for overide yii data api
            'data-request-method'=>'post',
            'data-toggle'=>'tooltip',
            'data-confirm-title'=>FHtml::t('common', 'Confirmation'),
            'data-confirm-message'=>FHtml::t('common', 'messege.confirmdelete')
        ],
    ],
];