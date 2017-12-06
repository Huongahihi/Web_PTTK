<?php
/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "CmsPage".
*/

use yii\helpers\Url;
use common\components\FHtml;
use common\components\Helper;
use kartik\datecontrol\DateControl;
use kartik\grid\GridView;

$currentRole = FHtml::getCurrentRole();
$moduleName = 'CmsPage';
$moduleTitle = 'Cms Page';
$moduleKey = 'cms-page';
$object_type = 'cms_page';

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
    [ //name: id, dbType: bigint(20), phpType: string, size: 20, allowNull:  
        'class'=>'kartik\grid\DataColumn',
        'format'=>'html',
        'attribute'=>'id',
        'visible' => FHtml::isVisibleInGrid($object_type, 'id', $form_type),
        'value' => function($model) { return '<b>' . FHtml::showContent($model-> id, FHtml::SHOW_NUMBER, 'cms_page', 'id','bigint(20)','cms-page') . '</b>' ; }, 
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'50px',
    ],
    [ //name: code, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
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
    [ //name: image, dbType: varchar(300), phpType: string, size: 300, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'image', $form_type),
        'format'=>'html',
        'attribute'=>'image',
        'visible' => FHtml::isVisibleInGrid($object_type, 'image', $form_type),
        'value' => function($model) { return FHtml::showImageThumbnail($model-> image, FHtml::config(FHtml::SETTINGS_THUMBNAIL_SIZE, 50), 'cms-page'); }, 
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
    [ //name: description, dbType: varchar(2000), phpType: string, size: 2000, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'description', $form_type),
        'format'=>'raw',
        'attribute'=>'description',
        'visible' => FHtml::isVisibleInGrid($object_type, 'description', $form_type),
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
    //[ //name: content, dbType: text, phpType: string, size: , allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'content', $form_type),
        //'format'=>'raw',
        //'attribute'=>'content',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'content', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> content, '', 'cms_page', 'content','text','cms-page'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    [ //name: keywords, dbType: varchar(500), phpType: string, size: 500, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'keywords', $form_type),
        'format'=>'raw',
        'attribute'=>'keywords',
        'visible' => FHtml::isVisibleInGrid($object_type, 'keywords', $form_type),
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
    //[ //name: page_image, dbType: varchar(300), phpType: string, size: 300, allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'page_image', $form_type),
        //'format'=>'html',
        //'attribute'=>'page_image',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'page_image', $form_type),
        //'value' => function($model) { return FHtml::showImageThumbnail($model-> page_image, FHtml::config(FHtml::SETTINGS_THUMBNAIL_SIZE, 50), 'cms-page'); }, 
        //'hAlign'=>'center',
        //'vAlign'=>'middle',
        //'width'=>'50px',
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
    [ //name: page_title, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'page_title', $form_type),
        'format'=>'raw',
        'attribute'=>'page_title',
        'visible' => FHtml::isVisibleInGrid($object_type, 'page_title', $form_type),
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
    [ //name: page_slug, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'page_slug', $form_type),
        'format'=>'raw',
        'attribute'=>'page_slug',
        'visible' => FHtml::isVisibleInGrid($object_type, 'page_slug', $form_type),
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
    [ //name: page_description, dbType: varchar(2000), phpType: string, size: 2000, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'page_description', $form_type),
        'format'=>'raw',
        'attribute'=>'page_description',
        'visible' => FHtml::isVisibleInGrid($object_type, 'page_description', $form_type),
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
    //[ //name: page_content, dbType: text, phpType: string, size: , allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'page_content', $form_type),
        //'format'=>'raw',
        //'attribute'=>'page_content',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'page_content', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> page_content, '', 'cms_page', 'page_content','text','cms-page'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    //[ //name: page_width, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'page_width', $form_type),
        //'format'=>'raw',
        //'attribute'=>'page_width',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'page_width', $form_type),
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
    //[ //name: page_background, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'page_background', $form_type),
        //'format'=>'raw',
        //'attribute'=>'page_background',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'page_background', $form_type),
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
    //[ //name: body_css, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'body_css', $form_type),
        //'format'=>'raw',
        //'attribute'=>'body_css',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'body_css', $form_type),
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
    //[ //name: body_style, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'body_style', $form_type),
        //'format'=>'raw',
        //'attribute'=>'body_style',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'body_style', $form_type),
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
    //[ //name: page_style, dbType: text, phpType: string, size: , allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'page_style', $form_type),
        //'format'=>'raw',
        //'attribute'=>'page_style',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'page_style', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> page_style, '', 'cms_page', 'page_style','text','cms-page'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    //[ //name: page_script, dbType: text, phpType: string, size: , allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'page_script', $form_type),
        //'format'=>'raw',
        //'attribute'=>'page_script',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'page_script', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> page_script, '', 'cms_page', 'page_script','text','cms-page'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    //[ //name: views_count, dbType: int(11), phpType: integer, size: 11, allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'format'=>'raw',
        //'attribute'=>'views_count',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'views_count', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> views_count, FHtml::SHOW_NUMBER, 'cms_page', 'views_count','int(11)','cms-page'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'width'=>'50px',
    //],
    [ //name: is_active, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        'class'=>'kartik\grid\BooleanColumn',
        'format'=>'raw',
        'attribute'=>'is_active',
        'visible' => FHtml::isVisibleInGrid($object_type, 'is_active', $form_type),
        'value' => function($model) { return FHtml::showContent($model-> is_active, FHtml::SHOW_BOOLEAN, 'cms_page', 'is_active','tinyint(1)','cms-page'); }, 
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'20px',
    ],
    //[ //name: sort_order, dbType: int(11), phpType: integer, size: 11, allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'sort_order', $form_type),
        //'format'=>'raw', //['decimal', 0],
        //'attribute'=>'sort_order',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'sort_order', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> sort_order, FHtml::SHOW_NUMBER, 'cms_page', 'sort_order','int(11)','cms-page'); }, 
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
    //[ //name: created_date, dbType: date, phpType: string, size: , allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'created_date', $form_type),
        //'format'=>'raw', // date 
        //'attribute'=>'created_date',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'created_date', $form_type),
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
        //'class' => FHtml::getColumnClass($object_type, 'created_user', $form_type),
        //'format'=>'raw',
        //'attribute'=>'created_user',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'created_user', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> created_user, FHtml::SHOW_LABEL, 'cms_page', 'created_user','varchar(100)','cms-page'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'80px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('cms_page', 'cms_page', 'created_user', true, 'id', 'name'),
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