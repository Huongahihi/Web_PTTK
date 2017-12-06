<?php

use yii\helpers\Url;
use common\components\FHtml;
use common\components\Helper;
use kartik\datecontrol\DateControl;
use kartik\grid\GridView;

$currentRole = FHtml::getCurrentRole();
$moduleName = 'CmsBlogs';
$moduleTitle = 'Cms Blogs';
$moduleKey = 'cms-blogs';
$object_type = 'cms_blogs';

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
    [ //name: id, dbType: bigint(20), phpType: string, size: 20, allowNull:
        'class'=>'kartik\grid\DataColumn',
        'format'=>'html',
        'attribute'=>'id',
        'visible' => FHtml::isVisibleInGrid($object_type, 'id', $form_type),
        'value' => function($model) { return '<b>' . FHtml::showContent($model-> id, FHtml::SHOW_NUMBER, 'cms_blogs', 'id','bigint(20)','cms-blogs') . '</b>' ; },
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'50px',
    ],
    [ //name: thumbnail, dbType: varchar(300), phpType: string, size: 300, allowNull: 1
        'class' => FHtml::getColumnClass($object_type, 'thumbnail', $form_type),
        'format'=>'html',
        'attribute'=>'thumbnail',
        'visible' => FHtml::isVisibleInGrid($object_type, 'thumbnail', $form_type),
        'value' => function($model) { return FHtml::showImageThumbnail($model-> thumbnail, FHtml::config(FHtml::SETTINGS_THUMBNAIL_SIZE, 50), 'cms-blogs'); },
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
        [ //name: name, dbType: varchar(255), phpType: string, size: 255, allowNull:
        'class' => FHtml::getColumnClass($object_type, 'author', $form_type),
        'format'=>'raw',
        'attribute'=>'author',
        'visible' => FHtml::isVisibleInGrid($object_type, 'author', $form_type),
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
    ], [ //name: name, dbType: varchar(255), phpType: string, size: 255, allowNull:
        'class' => FHtml::getColumnClass($object_type, 'overview', $form_type),
        'format'=>'raw',
        'attribute'=>'overview',
        'visible' => FHtml::isVisibleInGrid($object_type, 'overview', $form_type),
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
    [ //name: category_id, dbType: varchar(500), phpType: string, size: 500, allowNull: 1
        'class' => FHtml::getColumnClass($object_type, 'category_id', $form_type),
        'format'=>'raw',
        'attribute'=>'category_id',
        'visible' => FHtml::isVisibleInGrid($object_type, 'category_id', $form_type),
        'value' => function($model) { return FHtml::showContent($model-> category_id, FHtml::SHOW_LABEL, 'cms_blogs', 'category_id','varchar(500)','cms-blogs'); },
        'hAlign'=>'left',
        'vAlign'=>'middle',
        'contentOptions'=>['class'=>'col-md-2 nowrap'],
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions'=>[
            'pluginOptions'=>['allowClear' => true],
        ],
        'filterInputOptions'=>['placeholder'=>''],
        'filter'=> FHtml::getComboArray('cms_blogs', 'cms_blogs', 'category_id', true, 'id', 'name'),
    ],
    [ //name: created_date, dbType: date, phpType: string, size: , allowNull: 1
    'class' => FHtml::getColumnClass($object_type, 'created_date', $form_type),
    'format'=>'raw', // date
    'attribute'=>'created_date',
    'visible' => FHtml::isVisibleInGrid($object_type, 'created_date', $form_type),
    'hAlign'=>'right',
    'vAlign'=>'middle',
    'width'=>'50px',
    'editableOptions'=>[
    'size'=>'md',
    'inputType'=>\kartik\editable\Editable::INPUT_WIDGET,
    'widgetClass'=> 'kartik\datecontrol\DateControl',
    'options'=>[
    'type'=>\kartik\datecontrol\DateControl::FORMAT_DATE,
    'displayFormat'=> FHtml::config(FHtml::SETTINGS_DATE_FORMAT, 'Y.m.d'),
    'saveFormat'=>'php:Y-m-d',
    'options'=>[
    'pluginOptions'=>[
    'autoclose'=>true
    ]
    ]
    ]
    ],
    ],
    [ //name: is_active, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
        'class'=>'kartik\grid\BooleanColumn',
        'format'=>'raw',
        'attribute'=>'is_active',
        'visible' => FHtml::isVisibleInGrid($object_type, 'is_active', $form_type),
        'value' => function($model) { return FHtml::showContent($model-> is_active, FHtml::SHOW_BOOLEAN, 'cms_blogs', 'is_active','tinyint(1)','cms-blogs'); },
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'20px',
    ],
    [ //name: is_hot, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
        'class'=>'kartik\grid\BooleanColumn',
        'format'=>'raw',
        'attribute'=>'is_hot',
        'visible' => FHtml::isVisibleInGrid($object_type, 'is_hot', $form_type),
        'value' => function($model) { return FHtml::showContent($model-> is_hot, FHtml::SHOW_BOOLEAN, 'cms_blogs', 'is_hot','tinyint(1)','cms-blogs'); },
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