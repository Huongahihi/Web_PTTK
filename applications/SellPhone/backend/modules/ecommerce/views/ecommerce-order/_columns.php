<?php
/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "EcommerceOrder".
*/

use yii\helpers\Url;
use common\components\FHtml;
use common\components\Helper;
use kartik\datecontrol\DateControl;
use kartik\grid\GridView;

$currentRole = FHtml::getCurrentRole();
$moduleName = 'EcommerceOrder';
$moduleTitle = 'Ecommerce Order';
$moduleKey = 'ecommerce-order';
$form_type = FHtml::getRequestParam('form_type');

$isEditable = FHtml::isInRole('', 'update');

return [
    [
        'class' => 'common\widgets\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class'=>'kartik\grid\ExpandRowColumn',
        'width'=>'30px',
        'value'=>function ($model, $key, $index, $column) {
        return GridView::ROW_COLLAPSED;
        },
        'detail'=>function ($model, $key, $index, $column) {
             return Yii::$app->controller->renderPartial('_view', ['model'=>$model, 'print' => false]);
        },
        'headerOptions'=>['class'=>'kartik-sheet-style'],
        'expandOneOnly'=>false
    ],
    [ //name: id, dbType: int(11), phpType: integer, size: 11, allowNull:
        'class'=>'kartik\grid\DataColumn',
        'format'=>'html',
        'attribute'=>'id',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'id', $form_type, true),
        'value' => function($model) { return '<b>' . FHtml::showContent($model-> id, FHtml::SHOW_NUMBER, 'ecommerce_order', 'id','int(11)','ecommerce-order') . '</b>' ; },
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'50px',
    ],
    [ //name: billing_name, dbType: varchar(255), phpType: string, size: 255, allowNull:
        'class' => FHtml::getColumnClass($moduleName, 'user_id', $form_type, true),
        'format'=>'raw',
        'attribute'=>'user_id',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'user_id', $form_type, true),
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
    [ //name: billing_name, dbType: varchar(255), phpType: string, size: 255, allowNull:  
        'class' => FHtml::getColumnClass($moduleName, 'billing_name', $form_type, true),
        'format'=>'raw',
        'attribute'=>'billing_name',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'billing_name', $form_type, true),
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
    [ //name: billing_phone, dbType: varchar(255), phpType: string, size: 255, allowNull:  
        'class' => FHtml::getColumnClass($moduleName, 'billing_phone', $form_type, true),
        'format'=>'raw',
        'attribute'=>'billing_phone',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'billing_phone', $form_type, true),
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
    [ //name: billing_address, dbType: varchar(1000), phpType: string, size: 1000, allowNull:  
        'class' => FHtml::getColumnClass($moduleName, 'billing_address', $form_type, true),
        'format'=>'raw',
        'attribute'=>'billing_address',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'billing_address', $form_type, true),
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
    [ //name: billing_email, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'billing_email', $form_type, true),
        'format'=>'raw',
        'attribute'=>'billing_email',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'billing_email', $form_type, true),
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
    [ //name: order_note, dbType: text, phpType: string, size: , allowNull: 1
    'class' => FHtml::getColumnClass($moduleName, 'order_note', $form_type, true),
    'format'=>'raw',
    'attribute'=>'order_note',
    'visible' => FHtml::isVisibleInGrid($moduleName, 'order_note', $form_type, true),
    'value' => function($model) { return FHtml::showContent($model-> order_note, '', 'ecommerce_order', 'order_note','text','ecommerce-order'); },
    'hAlign'=>'right',
    'vAlign'=>'middle',
    'contentOptions'=>['class'=>'col-md-1 nowrap'],
    ],
    [ //name: order_date, dbType: varchar(200), phpType: string, size: 200, allowNull: 1
    'class' => FHtml::getColumnClass($moduleName, 'order_date', $form_type, true),
    'format'=>'raw',
    'attribute'=>'order_date',
    'visible' => FHtml::isVisibleInGrid($moduleName, 'order_date', $form_type, true),
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
    [ //name: price_final, dbType: float, phpType: double, size: , allowNull: 1
    'class' => FHtml::getColumnClass($moduleName, 'price_final', $form_type, true),
    'format'=>'raw',
    'attribute'=>'price_final',
    'visible' => FHtml::isVisibleInGrid($moduleName, 'price_final', $form_type, true),
    'value' => function($model) { return FHtml::showContent($model-> price_final, '', 'ecommerce_order', 'price_final','float','ecommerce-order'); },
    'hAlign'=>'right',
    'vAlign'=>'middle',
    'contentOptions'=>['class'=>'col-md-1 nowrap'],
    ],
    [ //name: payment_method, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
    'class' => FHtml::getColumnClass($moduleName, 'payment_method', $form_type, true),
    'format'=>'raw',
    'attribute'=>'payment_method',
    'visible' => FHtml::isVisibleInGrid($moduleName, 'payment_method', $form_type, true),
    'hAlign'=>'left',
    'vAlign'=>'middle',
    'filterType' => GridView::FILTER_SELECT2,
    'filterWidgetOptions'=>[
    'pluginOptions'=>['allowClear' => true],
    ],
    'filterInputOptions'=>['placeholder'=>''],
    'filter'=> FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'payment_method', true, 'id', 'name'),
    'contentOptions'=>['class'=>'col-md-1 nowrap'],
    'editableOptions'=> function ($model, $key, $index, $widget) {
    $fields = FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'payment_method', true, 'id', 'name');
    return [
    'inputType' => 'dropDownList',
    'displayValueConfig' => $fields,
    'data' => $fields
    ];
    },
    ],
    [ //name: order_status, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
    'class' => FHtml::getColumnClass($moduleName, 'order_status', $form_type, true),
    'format'=>'raw',
    'attribute'=>'order_status',
    'visible' => FHtml::isVisibleInGrid($moduleName, 'order_status', $form_type, true),
    'value' => function($model) { return FHtml::showContent($model-> order_status, FHtml::SHOW_LABEL, 'ecommerce_order', 'order_status','varchar(100)','ecommerce-order'); },
    'hAlign'=>'left',
    'vAlign'=>'middle',
    'width'=>'80px',
    'filterType' => GridView::FILTER_SELECT2,
    'filterWidgetOptions'=>[
    'pluginOptions'=>['allowClear' => true],
    ],
    'filterInputOptions'=>['placeholder'=>''],
    'filter'=> FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'order_status', true, 'id', 'name'),
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => $this->params['buttonsType'], // Dropdown or Buttons
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'80px',
        'urlCreator' => function($action, $model) {
            return FHtml::createBackendActionUrl([$action, 'id' => FHtml::getFieldValue($model, ['id', 'product_id'])]);
        },
        'visibleButtons' =>[
            'update' => FHtml::isInRole('', 'update', $currentRole),
            'delete' => FHtml::isInRole('', 'delete', $currentRole),
        ],
        'viewOptions'=>['role'=>$this->params['editType'],'title'=>FHtml::t('common', 'title.view'),'data-toggle'=>'tooltip'],
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