<?php
/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "TravelAttractions".
 */

use yii\helpers\Url;
use common\components\FHtml;
use common\components\Helper;
use kartik\datecontrol\DateControl;
use kartik\grid\GridView;

$currentRole = FHtml::getCurrentRole();
$moduleName = 'TravelAttractions';
$moduleTitle = 'Travel Attractions';
$moduleKey = 'travel-attractions';
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
    [ //name: id, dbType: bigint(20), phpType: string, size: 20, allowNull:  
        'class' => 'kartik\grid\DataColumn',
        'format' => 'html',
        'attribute' => 'id',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'id', $form_type, true),
        'value' => function ($model) {
            return '<b>' . FHtml::showContent($model->id, FHtml::SHOW_NUMBER, 'travel_attractions', 'id', 'bigint(20)', 'travel-attractions') . '</b>';
        },
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'width' => '50px',
    ],
    //[ //name: thumbnail, dbType: varchar(300), phpType: string, size: 300, allowNull: 1 
    //'class' => FHtml::getColumnClass($moduleName, 'thumbnail', $form_type, true),
    //'format'=>'html',
    //'attribute'=>'thumbnail',
    //'visible' => FHtml::isVisibleInGrid($moduleName, 'thumbnail', $form_type, true),
    //'value' => function($model) { return FHtml::showImageThumbnail($model-> thumbnail, FHtml::config(FHtml::SETTINGS_THUMBNAIL_SIZE, 50), 'travel-attractions'); },
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
    [ //name: image, dbType: varchar(300), phpType: string, size: 300, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'image', $form_type, true),
        'format' => 'html',
        'attribute' => 'image',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'image', $form_type, true),
        'value' => function ($model) {
            return FHtml::showImageThumbnail($model->image, FHtml::config(FHtml::SETTINGS_THUMBNAIL_SIZE, 50), 'travel-attractions');
        },
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'width' => '50px',
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
    //[ //name: image_description, dbType: varchar(2000), phpType: string, size: 2000, allowNull: 1 
    //'class' => FHtml::getColumnClass($moduleName, 'image_description', $form_type, true),
    //'format'=>'html',
    //'attribute'=>'image_description',
    //'visible' => FHtml::isVisibleInGrid($moduleName, 'image_description', $form_type, true),
    //'value' => function($model) { return FHtml::showImageThumbnail($model-> image_description, FHtml::config(FHtml::SETTINGS_THUMBNAIL_SIZE, 50), 'travel-attractions'); },
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
    //[ //name: description, dbType: varchar(1000), phpType: string, size: 1000, allowNull: 1 
    //'class' => FHtml::getColumnClass($moduleName, 'description', $form_type, true),
    //'format'=>'raw',
    //'attribute'=>'description',
    //'visible' => FHtml::isVisibleInGrid($moduleName, 'description', $form_type, true),
    //'hAlign'=>'left',
    //'vAlign'=>'middle',
    //'contentOptions'=>['class'=>'col-md-2 nowrap'],
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
    //[ //name: content, dbType: text, phpType: string, size: , allowNull: 1 
    //'class' => FHtml::getColumnClass($moduleName, 'content', $form_type, true),
    //'format'=>'raw',
    //'attribute'=>'content',
    //'visible' => FHtml::isVisibleInGrid($moduleName, 'content', $form_type, true),
    //'value' => function($model) { return FHtml::showContent($model-> content, '', 'travel_attractions', 'content','text','travel-attractions'); },
    //'hAlign'=>'right',
    //'vAlign'=>'middle',
    //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
//    [ //name: note, dbType: text, phpType: string, size: , allowNull: 1
//        'class' => FHtml::getColumnClass($moduleName, 'note', $form_type, true),
//        'format'=>'raw',
//        'attribute'=>'note',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'note', $form_type, true),
//        'value' => function($model) { return FHtml::showContent($model-> note, '', 'travel_attractions', 'note','text','travel-attractions'); },
//        'hAlign'=>'right',
//        'vAlign'=>'middle',
//        'contentOptions'=>['class'=>'col-md-1 nowrap'],
//    ],
    [ //name: tel, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'tel', $form_type, true),
        'format' => 'raw',
        'attribute' => 'tel',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'tel', $form_type, true),
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
    [ //name: address, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'address', $form_type, true),
        'format' => 'raw',
        'attribute' => 'address',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'address', $form_type, true),
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
//    [ //name: website, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
//        'class' => FHtml::getColumnClass($moduleName, 'website', $form_type, true),
//        'format'=>'raw',
//        'attribute'=>'website',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'website', $form_type, true),
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
//    [ //name: map, dbType: varchar(1000), phpType: string, size: 1000, allowNull: 1
//        'class' => FHtml::getColumnClass($moduleName, 'map', $form_type, true),
//        'format'=>'raw',
//        'attribute'=>'map',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'map', $form_type, true),
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
//    [ //name: rate, dbType: int(10), phpType: integer, size: 10, allowNull: 1
//        'class' => FHtml::getColumnClass($moduleName, 'rate', $form_type, true),
//        'format'=>'raw', //['decimal', 0],
//        'attribute'=>'rate',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'rate', $form_type, true),
//        'value' => function($model) { return FHtml::showContent($model-> rate, FHtml::SHOW_NUMBER, 'travel_attractions', 'rate','int(10)','travel-attractions'); },
//        'hAlign'=>'right',
//        'vAlign'=>'middle',
//        'width'=>'50px',
//        'editableOptions'=>[
//                            'size'=>'md',
//                            'inputType'=>\kartik\editable\Editable::INPUT_SPIN, //'\kartik\money\MaskMoney',
//                            'options'=>[
//                                'pluginOptions'=>[
//                                    'min'=>0, 'max' => 50000000000, 'precision' => 0,
//                                ]
//                            ]
//                        ],
//    ],
    [ //name: budget, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'budget', $form_type, true),
        'format' => 'raw',
        'attribute' => 'budget',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'budget', $form_type, true),
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
    [ //name: default_duration, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        'class' => FHtml::getColumnClass($moduleName, 'default_duration', $form_type, true),
        'format' => 'raw',
        'attribute' => 'default_duration',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'default_duration', $form_type, true),
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => ''],
        'filter' => FHtml::getComboArray('travel_attractions', 'travel_attractions', 'default_duration', true, 'id', 'name'),
        'contentOptions' => ['class' => 'col-md-1 nowrap'],
        'editableOptions' => function ($model, $key, $index, $widget) {
            $fields = FHtml::getComboArray('travel_attractions', 'travel_attractions', 'default_duration', true, 'id', 'name');
            return [
                'inputType' => 'dropDownList',
                'displayValueConfig' => $fields,
                'data' => $fields
            ];
        },
    ],
    //[ //name: sort_order, dbType: int(11), phpType: integer, size: 11, allowNull: 1 
    //'class' => FHtml::getColumnClass($moduleName, 'sort_order', $form_type, true),
    //'format'=>'raw', //['decimal', 0],
    //'attribute'=>'sort_order',
    //'visible' => FHtml::isVisibleInGrid($moduleName, 'sort_order', $form_type, true),
    //'value' => function($model) { return FHtml::showContent($model-> sort_order, FHtml::SHOW_NUMBER, 'travel_attractions', 'sort_order','int(11)','travel-attractions'); },
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
    //[ //name: lat, dbType: float, phpType: double, size: , allowNull: 1 
    //'class' => FHtml::getColumnClass($moduleName, 'lat', $form_type, true),
    //'format'=>'raw',
    //'attribute'=>'lat',
    //'visible' => FHtml::isVisibleInGrid($moduleName, 'lat', $form_type, true),
    //'value' => function($model) { return FHtml::showContent($model-> lat, '', 'travel_attractions', 'lat','float','travel-attractions'); },
    //'hAlign'=>'right',
    //'vAlign'=>'middle',
    //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    //[ //name: long, dbType: float, phpType: double, size: , allowNull: 1 
    //'class' => FHtml::getColumnClass($moduleName, 'long', $form_type, true),
    //'format'=>'raw',
    //'attribute'=>'long',
    //'visible' => FHtml::isVisibleInGrid($moduleName, 'long', $form_type, true),
    //'value' => function($model) { return FHtml::showContent($model-> long, '', 'travel_attractions', 'long','float','travel-attractions'); },
    //'hAlign'=>'right',
    //'vAlign'=>'middle',
    //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    [ //name: open, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
        'class' => FHtml::getColumnClass($moduleName, 'score', $form_type, true),
        'format' => 'raw',
        'attribute' => 'score',
        //'value' => function($model) { return $model->score . ' ' . FHtml::createLink('travel/travel-scores', ['attraction_id' => $model->id]); },
        'visible' => FHtml::isVisibleInGrid($moduleName, 'score', $form_type, true),
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
    [ //name: open, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
        'class' => FHtml::getColumnClass($moduleName, 'open', $form_type, true),
        'format' => 'raw',
        'attribute' => 'open',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'open', $form_type, true),
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
    [ //name: close, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
        'class' => FHtml::getColumnClass($moduleName, 'close', $form_type, true),
        'format' => 'raw',
        'attribute' => 'close',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'close', $form_type, true),
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
    //[ //name: street, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
    //'class' => FHtml::getColumnClass($moduleName, 'street', $form_type, true),
    //'format'=>'raw',
    //'attribute'=>'street',
    //'visible' => FHtml::isVisibleInGrid($moduleName, 'street', $form_type, true),
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
    [ //name: city, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
        'class' => FHtml::getColumnClass($moduleName, 'city', $form_type, true),
        'format' => 'raw',
        'attribute' => 'city',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'city', $form_type, true),
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'contentOptions' => ['class' => 'col-md-1 nowrap'],
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => ''],
        'filter' => FHtml::getComboArray('city', 'travel', 'city', true, 'id', 'name'),
        'editableOptions' => function ($model, $key, $index, $widget) {
            $fields = FHtml::getComboArray('city', 'travel', 'city', true, 'id', 'name');
            return [
                'inputType' => 'dropDownList',
                'displayValueConfig' => $fields,
                'data' => $fields
            ];
        },

    ],
    //[ //name: country, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
    //'class' => FHtml::getColumnClass($moduleName, 'country', $form_type, true),
    //'format'=>'raw',
    //'attribute'=>'country',
    //'visible' => FHtml::isVisibleInGrid($moduleName, 'country', $form_type, true),
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
//    [ //name: category_id, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
//        'class'=>'kartik\grid\DataColumn',
//        'format'=>'raw',
//        'attribute'=>'category_id',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'category_id', $form_type, true),
//        'value' => function($model) { return FHtml::showContent($model-> category_id, FHtml::SHOW_LABEL, 'travel_attractions', 'category_id','varchar(100)','travel-attractions'); },
//        'hAlign'=>'left',
//        'vAlign'=>'middle',
//        'width'=>'100px',
//        'filterType' => GridView::FILTER_SELECT2,
//        'filterWidgetOptions'=>[
//                            'pluginOptions'=>['allowClear' => true],
//                            ],
//        'filterInputOptions'=>['placeholder'=>''],
//        'filter'=> FHtml::getComboArray('travel_attractions', 'travel_attractions', 'category_id', true, 'id', 'name'),
//    ],
    [ //name: type, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        'class' => 'kartik\grid\DataColumn',
        'format' => 'raw',
        'attribute' => 'type',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'type', $form_type, true),
        'value' => function ($model) {
            return FHtml::showContent($model->type, FHtml::SHOW_LABEL, 'travel_attractions', 'type', 'varchar(100)', 'travel-attractions');
        },
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'width' => '80px',
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => ''],
        'filter' => FHtml::getComboArray('travel_attractions', 'travel_attractions', 'type', true, 'id', 'name'),
    ],
//    [ //name: status, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
//        'class'=>'kartik\grid\DataColumn',
//        'format'=>'raw',
//        'attribute'=>'status',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'status', $form_type, true),
//        'value' => function($model) { return FHtml::showContent($model-> status, FHtml::SHOW_LABEL, 'travel_attractions', 'status','varchar(100)','travel-attractions'); },
//        'hAlign'=>'left',
//        'vAlign'=>'middle',
//        'width'=>'80px',
//        'filterType' => GridView::FILTER_SELECT2,
//        'filterWidgetOptions'=>[
//                            'pluginOptions'=>['allowClear' => true],
//                            ],
//        'filterInputOptions'=>['placeholder'=>''],
//        'filter'=> FHtml::getComboArray('travel_attractions', 'travel_attractions', 'status', true, 'id', 'name'),
//    ],
    [ //name: is_active, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        'class' => 'kartik\grid\BooleanColumn',
        'format' => 'raw',
        'attribute' => 'is_active',
        'visible' => FHtml::isVisibleInGrid($moduleName, 'is_active', $form_type, true),
        'value' => function ($model) {
            return FHtml::showContent($model->is_active, FHtml::SHOW_BOOLEAN, 'travel_attractions', 'is_active', 'tinyint(1)', 'travel-attractions');
        },
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'width' => '20px',
    ],
//    [ //name: is_new, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
//        'class'=>'kartik\grid\BooleanColumn',
//        'format'=>'raw',
//        'attribute'=>'is_new',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'is_new', $form_type, true),
//        'value' => function($model) { return FHtml::showContent($model-> is_new, FHtml::SHOW_BOOLEAN, 'travel_attractions', 'is_new','tinyint(1)','travel-attractions'); },
//        'hAlign'=>'center',
//        'vAlign'=>'middle',
//        'width'=>'20px',
//    ],
//    [ //name: is_hot, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
//        'class'=>'kartik\grid\BooleanColumn',
//        'format'=>'raw',
//        'attribute'=>'is_hot',
//        'visible' => FHtml::isVisibleInGrid($moduleName, 'is_hot', $form_type, true),
//        'value' => function($model) { return FHtml::showContent($model-> is_hot, FHtml::SHOW_BOOLEAN, 'travel_attractions', 'is_hot','tinyint(1)','travel-attractions'); },
//        'hAlign'=>'center',
//        'vAlign'=>'middle',
//        'width'=>'20px',
//    ],
    //[ //name: created_date, dbType: date, phpType: string, size: , allowNull: 1 
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
    //'value' => function($model) { return FHtml::showContent($model-> created_user, FHtml::SHOW_LABEL, 'travel_attractions', 'created_user','varchar(100)','travel-attractions'); },
    //'hAlign'=>'left',
    //'vAlign'=>'middle',
    //'width'=>'80px',
    //'filterType' => GridView::FILTER_SELECT2,
    //'filterWidgetOptions'=>[
    //'pluginOptions'=>['allowClear' => true],
    //],
    //'filterInputOptions'=>['placeholder'=>''],
    //'filter'=> FHtml::getComboArray('travel_attractions', 'travel_attractions', 'created_user', true, 'id', 'name'),
    //],
    //[ //name: modified_date, dbType: date, phpType: string, size: , allowNull: 1 
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
    //'value' => function($model) { return FHtml::showContent($model-> modified_user, FHtml::SHOW_LABEL, 'travel_attractions', 'modified_user','varchar(100)','travel-attractions'); },
    //'hAlign'=>'left',
    //'vAlign'=>'middle',
    //'width'=>'80px',
    //'filterType' => GridView::FILTER_SELECT2,
    //'filterWidgetOptions'=>[
    //'pluginOptions'=>['allowClear' => true],
    //],
    //'filterInputOptions'=>['placeholder'=>''],
    //'filter'=> FHtml::getComboArray('travel_attractions', 'travel_attractions', 'modified_user', true, 'id', 'name'),
    //],
    [ //name: is_system, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
        'class' => 'kartik\grid\DataColumn',
        'label' => '',
        'format' => 'raw',
        'attribute' => '',
        'visible' => true,
        'value' => function ($model) {
            return '' //'<a class="btn btn-edit" target="_blank" href="' . FHtml::createUrl('travel/travel-plans', ['user_itinerary_id' => $model->id], BACKEND) . '"> Plans ' . '</a>'
            . '<a class="btn btn-xs btn-edit btn-warning" data-pjax=0 target="_blank" href="' . FHtml::createUrl('travel/travel-attractions/search', ['attraction_id' => $model->id]) . '"> SEARCH ' . '</a>'
            . '<a class="btn btn-xs btn-edit btn-default" data-pjax=0 target="_blank" href="' . FHtml::createUrl('travel/travel-scores', ['attraction_id' => $model->id]) . '"> SCORES ' . '</a>';
        },
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'width' => '80px',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
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