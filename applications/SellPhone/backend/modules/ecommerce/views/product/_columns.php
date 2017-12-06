<?php
/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "Product".
*/

use yii\helpers\Url;
use common\components\FHtml;
use common\components\Helper;
use kartik\datecontrol\DateControl;
use kartik\grid\GridView;

$currentRole = FHtml::getCurrentRole();
$moduleName = 'Product';
$moduleTitle = 'Product';
$moduleKey = 'product';
$object_type = 'product';

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
    [ //name: id, dbType: bigint(11), phpType: string, size: 11, allowNull:  
        'class'=>'kartik\grid\DataColumn',
        'format'=>'html',
        'attribute'=>'id',
        'visible' => FHtml::isVisibleInGrid($object_type, 'id', $form_type),
        'value' => function($model) { return $model->id; return '<b>' . FHtml::showContent($model-> id, FHtml::SHOW_NUMBER, 'product', 'id','bigint(11)','product') . '</b>' ; },
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'50px',
    ],
    [ //name: thumbnail, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'image', $form_type),
        'format'=>'html',
        'attribute'=>'image',
        'visible' => FHtml::isVisibleInGrid($object_type, 'image', $form_type),
        'value' => function($model) { return FHtml::showImageThumbnail($model-> image, FHtml::config(FHtml::SETTINGS_THUMBNAIL_SIZE, 50), 'product'); },
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'50px',
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
    [ //name: code, dbType: varchar(45), phpType: string, size: 45, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'code', $form_type),
        'format'=>'raw',
        'attribute'=>'code',
        'visible' => FHtml::isVisibleInGrid($object_type, 'code', $form_type),
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
    [ //name: name, dbType: varchar(255), phpType: string, size: 255, allowNull:  
        'class' => FHtml::getColumnClass($object_type, 'name', $form_type),
        'format'=>'raw',
        'attribute'=>'name',
        'visible' => FHtml::isVisibleInGrid($object_type, 'name', $form_type),
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
    [ //name: price, dbType: decimal(15,2), phpType: string, size: 15, allowNull: 1
        'class' => FHtml::getColumnClass($object_type, 'price', $form_type),
        'format'=>'raw',//['decimal', 2],
        'attribute'=>'price',
        'visible' => FHtml::isVisibleInGrid($object_type, 'price', $form_type),
        'value' => function($model) { return FHtml::showContent($model-> price, FHtml::SHOW_DECIMAL, 'product', 'price','decimal(15,2)','product'); },
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'width'=>'50px',
        'editableOptions'=>[
            'size'=>'md',
            'inputType'=> '\kartik\money\MaskMoney', //\kartik\editable\Editable::INPUT_SPIN,
            'options'=>[
                'pluginOptions'=>[
                    'min'=>0, 'max' => 50000000000
                ]
            ]
        ],
    ],
    [ //name: discount, dbType: int(10), phpType: integer, size: 10, allowNull: 1
    'class' => FHtml::getColumnClass($object_type, 'discount', $form_type),
    'format'=>'raw', //['decimal', 0],
    'attribute'=>'discount',
    'visible' => FHtml::isVisibleInGrid($object_type, 'discount', $form_type),
    'value' => function($model) { return FHtml::showContent($model-> discount, FHtml::SHOW_NUMBER, 'product', 'discount','int(10)','product'); },
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
    [ //name: promotion_id, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
    'class' => FHtml::getColumnClass($object_type, 'promotion_id', $form_type),
    'format'=>'raw',
    'attribute'=>'promotion_id',
    'visible' => FHtml::isVisibleInGrid($object_type, 'promotion_id', $form_type),
    'value' => function($model) { return FHtml::showContent($model-> promotion_id, FHtml::SHOW_LOOKUP, '@promotion', 'promotion_id','varchar(100)','product'); },
    'hAlign'=>'left',
    'vAlign'=>'middle',
    'width'=>'80px',
    'filterType' => GridView::FILTER_SELECT2,
    'filterWidgetOptions'=>[
    'pluginOptions'=>['allowClear' => true],
    ],
    'filterInputOptions'=>['placeholder'=>''],
    'filter'=> FHtml::getComboArray('@promotion', 'promotion', 'promotion_id', true, 'id', 'name'),
    ],
    [ //name: category_id, dbType: varchar(500), phpType: string, size: 500, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'category_id', $form_type),
        'format'=>'raw',
        'attribute'=>'category_id',
        'visible' => FHtml::isVisibleInGrid($object_type, 'category_id', $form_type),
        'value' => function($model) { return FHtml::showContent($model-> category_id, FHtml::SHOW_LABEL, 'product', 'category_id','varchar(500)','product'); }, 
        'hAlign'=>'left',
        'vAlign'=>'middle',
        'width'=>'100px',
        'filterType' => GridView::FILTER_SELECT2, 
        'filterWidgetOptions'=>[
                            'pluginOptions'=>['allowClear' => true],
                            ],
        'filterInputOptions'=>['placeholder'=>''],
        'filter'=> FHtml::getComboArray('product', 'product', 'category_id', true, 'id', 'name'),
    ],
    [ //name: is_active, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        'class'=>'kartik\grid\BooleanColumn',
        'format'=>'raw',
        'attribute'=>'is_active',
        'visible' => FHtml::isVisibleInGrid($object_type, 'is_active', $form_type),
        'value' => function($model) { return FHtml::showContent($model-> is_active, FHtml::SHOW_BOOLEAN, 'product', 'is_active','tinyint(1)','product'); }, 
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'20px',
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