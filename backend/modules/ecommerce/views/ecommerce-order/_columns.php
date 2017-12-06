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
/*
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],*/
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
    [ //name: user_id, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'user_id', $form_type, true),
        'format'=>'raw',
        'attribute'=>'user_id',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'user_id', $form_type, true),
        'value' => function($model) { return FHtml::showContent($model-> user_id, FHtml::SHOW_LABEL, 'ecommerce_order', 'user_id','varchar(100)','ecommerce-order'); }, 
        'hAlign'=>'left',
        'vAlign'=>'middle',
        'width'=>'80px',
        'filterType' => GridView::FILTER_SELECT2, 
        'filterWidgetOptions'=>[
                            'pluginOptions'=>['allowClear' => true],
                            ],
        'filterInputOptions'=>['placeholder'=>''],
        'filter'=> FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'user_id', true, 'id', 'name'),
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
    [ //name: billing_postcode, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'billing_postcode', $form_type, true),
        'format'=>'raw',
        'attribute'=>'billing_postcode',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'billing_postcode', $form_type, true),
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
    [ //name: billing_city, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'billing_city', $form_type, true),
        'format'=>'raw',
        'attribute'=>'billing_city',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'billing_city', $form_type, true),
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
    [ //name: billing_state, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'billing_state', $form_type, true),
        'format'=>'raw',
        'attribute'=>'billing_state',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'billing_state', $form_type, true),
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
    [ //name: billing_country, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'billing_country', $form_type, true),
        'format'=>'raw',
        'attribute'=>'billing_country',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'billing_country', $form_type, true),
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
    [ //name: shipping_name, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'shipping_name', $form_type, true),
        'format'=>'raw',
        'attribute'=>'shipping_name',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'shipping_name', $form_type, true),
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
    [ //name: shipping_phone, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'shipping_phone', $form_type, true),
        'format'=>'raw',
        'attribute'=>'shipping_phone',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'shipping_phone', $form_type, true),
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
    //[ //name: shipping_address, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'shipping_address', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'shipping_address',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'shipping_address', $form_type, true),
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
        //'editableOptions'=>[                       
                            //'size'=>'md',
                            //'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                            //'widgetClass'=> 'kartik\datecontrol\InputControl',
                            //'options'=>[
                                //'options'=>[
                                    //'pluginOptions'=>[
                                        //'autoclose'=>true
                                    //]
                                //]
                            //]
                        //],
    //],
    //[ //name: shipping_email, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'shipping_email', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'shipping_email',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'shipping_email', $form_type, true),
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
        //'editableOptions'=>[                       
                            //'size'=>'md',
                            //'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                            //'widgetClass'=> 'kartik\datecontrol\InputControl',
                            //'options'=>[
                                //'options'=>[
                                    //'pluginOptions'=>[
                                        //'autoclose'=>true
                                    //]
                                //]
                            //]
                        //],
    //],
    //[ //name: shipping_postcode, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'shipping_postcode', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'shipping_postcode',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'shipping_postcode', $form_type, true),
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
        //'editableOptions'=>[                       
                            //'size'=>'md',
                            //'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                            //'widgetClass'=> 'kartik\datecontrol\InputControl',
                            //'options'=>[
                                //'options'=>[
                                    //'pluginOptions'=>[
                                        //'autoclose'=>true
                                    //]
                                //]
                            //]
                        //],
    //],
    //[ //name: shipping_city, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'shipping_city', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'shipping_city',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'shipping_city', $form_type, true),
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
        //'editableOptions'=>[                       
                            //'size'=>'md',
                            //'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                            //'widgetClass'=> 'kartik\datecontrol\InputControl',
                            //'options'=>[
                                //'options'=>[
                                    //'pluginOptions'=>[
                                        //'autoclose'=>true
                                    //]
                                //]
                            //]
                        //],
    //],
    //[ //name: shipping_state, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'shipping_state', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'shipping_state',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'shipping_state', $form_type, true),
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
        //'editableOptions'=>[                       
                            //'size'=>'md',
                            //'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                            //'widgetClass'=> 'kartik\datecontrol\InputControl',
                            //'options'=>[
                                //'options'=>[
                                    //'pluginOptions'=>[
                                        //'autoclose'=>true
                                    //]
                                //]
                            //]
                        //],
    //],
    //[ //name: shipping_country, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'shipping_country', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'shipping_country',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'shipping_country', $form_type, true),
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
        //'editableOptions'=>[                       
                            //'size'=>'md',
                            //'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                            //'widgetClass'=> 'kartik\datecontrol\InputControl',
                            //'options'=>[
                                //'options'=>[
                                    //'pluginOptions'=>[
                                        //'autoclose'=>true
                                    //]
                                //]
                            //]
                        //],
    //],
    //[ //name: shipping_method, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'shipping_method', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'shipping_method',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'shipping_method', $form_type, true),
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'shipping_method', true, 'id', 'name'),
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
        //'editableOptions'=> function ($model, $key, $index, $widget) {
                                    //$fields = FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'shipping_method', true, 'id', 'name');
                                    //return [
                                    //'inputType' => 'dropDownList',
                                    //'displayValueConfig' => $fields,
                                    //'data' => $fields
                                    //];
                                    //},
    //],
    //[ //name: order_date, dbType: varchar(200), phpType: string, size: 200, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'order_date', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'order_date',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'order_date', $form_type, true),
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
        //'editableOptions'=>[                       
                            //'size'=>'md',
                            //'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                            //'widgetClass'=> 'kartik\datecontrol\InputControl',
                            //'options'=>[
                                //'options'=>[
                                    //'pluginOptions'=>[
                                        //'autoclose'=>true
                                    //]
                                //]
                            //]
                        //],
    //],
    //[ //name: order_detail, dbType: text, phpType: string, size: , allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'order_detail', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'order_detail',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'order_detail', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> order_detail, '', 'ecommerce_order', 'order_detail','text','ecommerce-order'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    //[ //name: order_note, dbType: text, phpType: string, size: , allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'order_note', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'order_note',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'order_note', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> order_note, '', 'ecommerce_order', 'order_note','text','ecommerce-order'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    //[ //name: promotion_code, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'promotion_code', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'promotion_code',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'promotion_code', $form_type, true),
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
        //'editableOptions'=>[                       
                            //'size'=>'md',
                            //'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                            //'widgetClass'=> 'kartik\datecontrol\InputControl',
                            //'options'=>[
                                //'options'=>[
                                    //'pluginOptions'=>[
                                        //'autoclose'=>true
                                    //]
                                //]
                            //]
                        //],
    //],
    //[ //name: tax, dbType: varchar(500), phpType: string, size: 500, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'tax', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'tax',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'tax', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> tax, FHtml::SHOW_LABEL, 'ecommerce_order', 'tax','varchar(500)','ecommerce-order'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'100px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'tax', true, 'id', 'name'),
    //],
    //[ //name: order_type, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'order_type', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'order_type',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'order_type', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> order_type, FHtml::SHOW_LABEL, 'ecommerce_order', 'order_type','varchar(100)','ecommerce-order'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'80px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'order_type', true, 'id', 'name'),
    //],
    //[ //name: order_status, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'order_status', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'order_status',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'order_status', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> order_status, FHtml::SHOW_LABEL, 'ecommerce_order', 'order_status','varchar(100)','ecommerce-order'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'80px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'order_status', true, 'id', 'name'),
    //],
    //[ //name: is_active, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        //'class'=>'kartik\grid\BooleanColumn',
        //'format'=>'raw',
        //'attribute'=>'is_active',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'is_active', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> is_active, FHtml::SHOW_BOOLEAN, 'ecommerce_order', 'is_active','tinyint(1)','ecommerce-order'); }, 
        //'hAlign'=>'center',
        //'vAlign'=>'middle',
        //'width'=>'20px',
    //],
    //[ //name: price_total, dbType: float(10,2), phpType: double, size: 10, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'price_total', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'price_total',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'price_total', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> price_total, '', 'ecommerce_order', 'price_total','float(10,2)','ecommerce-order'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    //[ //name: price_shipping, dbType: float(10,2), phpType: double, size: 10, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'price_shipping', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'price_shipping',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'price_shipping', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> price_shipping, '', 'ecommerce_order', 'price_shipping','float(10,2)','ecommerce-order'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    //[ //name: price_tax, dbType: float(10,2), phpType: double, size: 10, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'price_tax', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'price_tax',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'price_tax', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> price_tax, '', 'ecommerce_order', 'price_tax','float(10,2)','ecommerce-order'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    //[ //name: price_discount, dbType: float(10,0), phpType: double, size: 10, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'price_discount', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'price_discount',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'price_discount', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> price_discount, '', 'ecommerce_order', 'price_discount','float(10,0)','ecommerce-order'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    //[ //name: price_final, dbType: float, phpType: double, size: , allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'price_final', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'price_final',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'price_final', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> price_final, '', 'ecommerce_order', 'price_final','float','ecommerce-order'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    //[ //name: payment_method, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'payment_method', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'payment_method',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'payment_method', $form_type, true),
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'payment_method', true, 'id', 'name'),
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
        //'editableOptions'=> function ($model, $key, $index, $widget) {
                                    //$fields = FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'payment_method', true, 'id', 'name');
                                    //return [
                                    //'inputType' => 'dropDownList',
                                    //'displayValueConfig' => $fields,
                                    //'data' => $fields
                                    //];
                                    //},
    //],
    //[ //name: payment_status, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'payment_status', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'payment_status',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'payment_status', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> payment_status, FHtml::SHOW_LABEL, 'ecommerce_order', 'payment_status','varchar(100)','ecommerce-order'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'80px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'payment_status', true, 'id', 'name'),
    //],
    //[ //name: delivery_time, dbType: varchar(12), phpType: string, size: 12, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'delivery_time', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'delivery_time',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'delivery_time', $form_type, true),
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
        //'editableOptions'=>[                       
                            //'size'=>'md',
                            //'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
                            //'widgetClass'=> 'kartik\datecontrol\InputControl',
                            //'options'=>[
                                //'options'=>[
                                    //'pluginOptions'=>[
                                        //'autoclose'=>true
                                    //]
                                //]
                            //]
                        //],
    //],
    //[ //name: delivery_status, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'delivery_status', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'delivery_status',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'delivery_status', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> delivery_status, FHtml::SHOW_LABEL, 'ecommerce_order', 'delivery_status','varchar(100)','ecommerce-order'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'80px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'delivery_status', true, 'id', 'name'),
    //],
    //[ //name: delivery_type, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'delivery_type', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'delivery_type',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'delivery_type', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> delivery_type, FHtml::SHOW_LABEL, 'ecommerce_order', 'delivery_type','varchar(100)','ecommerce-order'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'80px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'delivery_type', true, 'id', 'name'),
    //],
    //[ //name: delivery_note, dbType: text, phpType: string, size: , allowNull: 1 
        //'class' => FHtml::getColumnClass($moduleName, 'delivery_note', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'delivery_note',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'delivery_note', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> delivery_note, '', 'ecommerce_order', 'delivery_note','text','ecommerce-order'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
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
        //'class' => FHtml::getColumnClass($moduleName, 'created_user', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'created_user',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'created_user', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> created_user, FHtml::SHOW_LABEL, 'ecommerce_order', 'created_user','varchar(100)','ecommerce-order'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'80px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'created_user', true, 'id', 'name'),
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
        //'class' => FHtml::getColumnClass($moduleName, 'modified_user', $form_type, true),
        //'format'=>'raw',
        //'attribute'=>'modified_user',
        //'visible' => FHtml::isVisibleInGrid($moduleName, 'modified_user', $form_type, true),
        //'value' => function($model) { return FHtml::showContent($model-> modified_user, FHtml::SHOW_LABEL, 'ecommerce_order', 'modified_user','varchar(100)','ecommerce-order'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'80px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'modified_user', true, 'id', 'name'),
    //],
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