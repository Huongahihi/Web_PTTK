<?php
/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "MusicSong".
*/

use yii\helpers\Url;
use common\components\FHtml;
use common\components\Helper;
use kartik\datecontrol\DateControl;
use kartik\grid\GridView;

$currentRole = FHtml::getCurrentRole();
$moduleName = 'MusicSong';
$moduleTitle = 'Music Song';
$moduleKey = 'music-song';
$object_type = 'music_song';

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
    /*[ //name: id, dbType: bigint(20), phpType: string, size: 20, allowNull:  
        'class'=>'kartik\grid\DataColumn',
        'format'=>'html',
        'attribute'=>'id',
        'visible' => FHtml::isVisibleInGrid($object_type, 'id', $form_type),
        'value' => function($model) { return '<b>' . FHtml::showContent($model-> id, FHtml::SHOW_NUMBER, 'music_song', 'id','bigint(20)','music-song') . '</b>' ; }, 
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'50px',
    ],*/
    [ //name: thumbnail, dbType: varchar(300), phpType: string, size: 300, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'thumbnail', $form_type),
        'format'=>'html',
        'attribute'=>'thumbnail',
        'visible' => FHtml::isVisibleInGrid($object_type, 'thumbnail', $form_type),
        'value' => function($model) { return FHtml::showImageThumbnail($model-> thumbnail, FHtml::config(FHtml::SETTINGS_THUMBNAIL_SIZE, 50), 'music-song'); }, 
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
    //[ //name: image, dbType: varchar(300), phpType: string, size: 300, allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'image', $form_type),
        //'format'=>'html',
        //'attribute'=>'image',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'image', $form_type),
        //'value' => function($model) { return FHtml::showImageThumbnail($model-> image, FHtml::config(FHtml::SETTINGS_THUMBNAIL_SIZE, 50), 'music-song'); }, 
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
    /*[ //name: song_file, dbType: varchar(300), phpType: string, size: 300, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'song_file', $form_type),
        'format'=>'raw',
        'attribute'=>'song_file',
        'visible' => FHtml::isVisibleInGrid($object_type, 'song_file', $form_type),
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
    ],*/
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
    /*[ //name: description, dbType: varchar(2000), phpType: string, size: 2000, allowNull: 1 
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
    ],*/
    //[ //name: content, dbType: text, phpType: string, size: , allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'content', $form_type),
        //'format'=>'raw',
        //'attribute'=>'content',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'content', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> content, '', 'music_song', 'content','text','music-song'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
    //],
    //[ //name: price, dbType: decimal(10,2), phpType: string, size: 10, allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'price', $form_type),
        //'format'=>'raw',//['decimal', 2],
        //'attribute'=>'price',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'price', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> price, FHtml::SHOW_DECIMAL, 'music_song', 'price','decimal(10,2)','music-song'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'width'=>'50px',
        //'editableOptions'=>[                       
                            //'size'=>'md',
                            //'inputType'=> '\kartik\money\MaskMoney', //\kartik\editable\Editable::INPUT_SPIN,
                            //'options'=>[
                                //'pluginOptions'=>[
                                    //'min'=>0, 'max' => 50000000000
                                //]
                            //]
                        //],
    //],
    [ //name: duration, dbType: varchar(8), phpType: string, size: 8, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'duration', $form_type),
        'format'=>'raw',
        'attribute'=>'duration',
        'visible' => FHtml::isVisibleInGrid($object_type, 'duration', $form_type),
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
    [ //name: release_date, dbType: date, phpType: string, size: , allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'release_date', $form_type),
        'format'=>'raw', // date 
        'attribute'=>'release_date',
        'visible' => FHtml::isVisibleInGrid($object_type, 'release_date', $form_type),
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
//    [ //name: artist_singer_id, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
//        'class' => FHtml::getColumnClass($object_type, 'artist_singer_id', $form_type),
//        'format'=>'raw',
//        'attribute'=>'artist_singer_id',
//        'visible' => FHtml::isVisibleInGrid($object_type, 'artist_singer_id', $form_type),
//        'value' => function($model) { return FHtml::showContent($model-> artist_singer_id, FHtml::SHOW_LOOKUP, '@music_artist', 'artist_singer_id','varchar(100)','music-song'); },
//        'hAlign'=>'left',
//        'vAlign'=>'middle',
//        'width'=>'80px',
//        'filterType' => GridView::FILTER_SELECT2,
//        'filterWidgetOptions'=>[
//                            'pluginOptions'=>['allowClear' => true],
//                            ],
//        'filterInputOptions'=>['placeholder'=>''],
//        'filter'=> FHtml::getComboArray('@music_artist', 'music_artist', 'artist_singer_id', true, 'id', 'name'),
//    ],
//    [ //name: artist_composer_id, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
//        'class' => FHtml::getColumnClass($object_type, 'artist_composer_id', $form_type),
//        'format'=>'raw',
//        'attribute'=>'artist_composer_id',
//        'visible' => FHtml::isVisibleInGrid($object_type, 'artist_composer_id', $form_type),
//        'value' => function($model) { return FHtml::showContent($model-> artist_composer_id, FHtml::SHOW_LOOKUP, '@music_artist', 'artist_composer_id','varchar(100)','music-song'); },
//        'hAlign'=>'left',
//        'vAlign'=>'middle',
//        'width'=>'80px',
//        'filterType' => GridView::FILTER_SELECT2,
//        'filterWidgetOptions'=>[
//                            'pluginOptions'=>['allowClear' => true],
//                            ],
//        'filterInputOptions'=>['placeholder'=>''],
//        'filter'=> FHtml::getComboArray('@music_artist', 'music_artist', 'artist_composer_id', true, 'id', 'name'),
//    ],
    //[ //name: album_id, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'album_id', $form_type),
        //'format'=>'raw',
        //'attribute'=>'album_id',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'album_id', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> album_id, FHtml::SHOW_LOOKUP, '@music_playlist', 'album_id','varchar(100)','music-song'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'80px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('@music_playlist', 'music_playlist', 'album_id', true, 'id', 'name'),
    //],
    [ //name: is_hot, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        'class'=>'kartik\grid\BooleanColumn',
        'format'=>'raw',
        'attribute'=>'is_hot',
        'visible' => FHtml::isVisibleInGrid($object_type, 'is_hot', $form_type),
        'value' => function($model) { return FHtml::showContent($model-> is_hot, FHtml::SHOW_BOOLEAN, 'music_song', 'is_hot','tinyint(1)','music-song'); }, 
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'20px',
    ],
    [ //name: is_top, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        'class'=>'kartik\grid\BooleanColumn',
        'format'=>'raw',
        'attribute'=>'is_top',
        'visible' => FHtml::isVisibleInGrid($object_type, 'is_top', $form_type),
        'value' => function($model) { return FHtml::showContent($model-> is_top, FHtml::SHOW_BOOLEAN, 'music_song', 'is_top','tinyint(1)','music-song'); }, 
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'20px',
    ],
    [ //name: is_active, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        'class'=>'kartik\grid\BooleanColumn',
        'format'=>'raw',
        'attribute'=>'is_active',
        'visible' => FHtml::isVisibleInGrid($object_type, 'is_active', $form_type),
        'value' => function($model) { return FHtml::showContent($model-> is_active, FHtml::SHOW_BOOLEAN, 'music_song', 'is_active','tinyint(1)','music-song'); }, 
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'20px',
    ],
    //[ //name: is_video, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        //'class'=>'kartik\grid\BooleanColumn',
        //'format'=>'raw',
        //'attribute'=>'is_video',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'is_video', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> is_video, FHtml::SHOW_BOOLEAN, 'music_song', 'is_video','tinyint(1)','music-song'); }, 
        //'hAlign'=>'center',
        //'vAlign'=>'middle',
        //'width'=>'20px',
    //],
    //[ //name: lang, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'lang', $form_type),
        //'format'=>'raw',
        //'attribute'=>'lang',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'lang', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> lang, FHtml::SHOW_LABEL, 'music_song', 'lang','varchar(100)','music-song'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'80px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('music_song', 'music_song', 'lang', true, 'id', 'name'),
    //],
    [ //name: type, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'type', $form_type),
        'format'=>'raw',
        'attribute'=>'type',
        'visible' => FHtml::isVisibleInGrid($object_type, 'type', $form_type),
        'value' => function($model) { return FHtml::showContent($model-> type, FHtml::SHOW_LABEL, 'music_song', 'type','varchar(100)','music-song'); }, 
        'hAlign'=>'left',
        'vAlign'=>'middle',
        'width'=>'80px',
        'filterType' => GridView::FILTER_SELECT2, 
        'filterWidgetOptions'=>[
                            'pluginOptions'=>['allowClear' => true],
                            ],
        'filterInputOptions'=>['placeholder'=>''],
        'filter'=> FHtml::getComboArray('music_song', 'music_song', 'type', true, 'id', 'name'),
    ],
    [ //name: status, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'status', $form_type),
        'format'=>'raw',
        'attribute'=>'status',
        'visible' => FHtml::isVisibleInGrid($object_type, 'status', $form_type),
        'value' => function($model) { return FHtml::showContent($model-> status, FHtml::SHOW_LABEL, 'music_song', 'status','varchar(100)','music-song'); }, 
        'hAlign'=>'left',
        'vAlign'=>'middle',
        'width'=>'80px',
        'filterType' => GridView::FILTER_SELECT2, 
        'filterWidgetOptions'=>[
                            'pluginOptions'=>['allowClear' => true],
                            ],
        'filterInputOptions'=>['placeholder'=>''],
        'filter'=> FHtml::getComboArray('music_song', 'music_song', 'status', true, 'id', 'name'),
    ],
    //[ //name: mood, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'mood', $form_type),
        //'format'=>'raw',
        //'attribute'=>'mood',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'mood', $form_type),
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('music_song', 'music_song', 'mood', true, 'id', 'name'),
        //'contentOptions'=>['class'=>'col-md-1 nowrap'],
        //'editableOptions'=> function ($model, $key, $index, $widget) {
                                    //$fields = FHtml::getComboArray('music_song', 'music_song', 'mood', true, 'id', 'name');
                                    //return [
                                    //'inputType' => 'dropDownList',
                                    //'displayValueConfig' => $fields,
                                    //'data' => $fields
                                    //];
                                    //},
    //],
    [ //name: category_id, dbType: varchar(500), phpType: string, size: 500, allowNull: 1 
        'class' => FHtml::getColumnClass($object_type, 'category_id', $form_type),
        'format'=>'raw',
        'attribute'=>'category_id',
        'visible' => FHtml::isVisibleInGrid($object_type, 'category_id', $form_type),
        'value' => function($model) { return FHtml::showContent($model-> category_id, FHtml::SHOW_LABEL, 'music', 'category_id','varchar(500)','music-song'); }, 
        'hAlign'=>'left',
        'vAlign'=>'middle',
        'width'=>'100px',
        'filterType' => GridView::FILTER_SELECT2, 
        'filterWidgetOptions'=>[
                            'pluginOptions'=>['allowClear' => true],
                            ],
        'filterInputOptions'=>['placeholder'=>''],
        'filter'=> FHtml::getComboArray('music', 'music', 'category_id', true, 'id', 'name'),
    ],
    //[ //name: count_views, dbType: bigint(20), phpType: string, size: 20, allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'format'=>'raw',
        //'attribute'=>'count_views',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'count_views', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> count_views, FHtml::SHOW_NUMBER, 'music_song', 'count_views','bigint(20)','music-song'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'width'=>'50px',
    //],
    //[ //name: count_likes, dbType: bigint(20), phpType: string, size: 20, allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'format'=>'raw',
        //'attribute'=>'count_likes',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'count_likes', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> count_likes, FHtml::SHOW_NUMBER, 'music_song', 'count_likes','bigint(20)','music-song'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'width'=>'50px',
    //],
    //[ //name: count_purchase, dbType: bigint(20), phpType: string, size: 20, allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'format'=>'raw',
        //'attribute'=>'count_purchase',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'count_purchase', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> count_purchase, FHtml::SHOW_NUMBER, 'music_song', 'count_purchase','bigint(20)','music-song'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'width'=>'50px',
    //],
    //[ //name: count_comments, dbType: int(10), phpType: integer, size: 10, allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'format'=>'raw',
        //'attribute'=>'count_comments',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'count_comments', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> count_comments, FHtml::SHOW_NUMBER, 'music_song', 'count_comments','int(10)','music-song'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'width'=>'50px',
    //],
    //[ //name: count_rates, dbType: bigint(20), phpType: string, size: 20, allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'format'=>'raw',
        //'attribute'=>'count_rates',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'count_rates', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> count_rates, FHtml::SHOW_NUMBER, 'music_song', 'count_rates','bigint(20)','music-song'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'width'=>'50px',
    //],
    //[ //name: rates, dbType: int(11), phpType: integer, size: 11, allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'rates', $form_type),
        //'format'=>'raw', //['decimal', 0],
        //'attribute'=>'rates',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'rates', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> rates, FHtml::SHOW_NUMBER, 'music_song', 'rates','int(11)','music-song'); }, 
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
        //'value' => function($model) { return FHtml::showContent($model-> created_user, FHtml::SHOW_LABEL, 'music_song', 'created_user','varchar(100)','music-song'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'80px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('music_song', 'music_song', 'created_user', true, 'id', 'name'),
    //],
    //[ //name: modified_date, dbType: date, phpType: string, size: , allowNull: 1 
        //'class' => FHtml::getColumnClass($object_type, 'modified_date', $form_type),
        //'format'=>'raw', // date 
        //'attribute'=>'modified_date',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'modified_date', $form_type),
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
        //'class' => FHtml::getColumnClass($object_type, 'modified_user', $form_type),
        //'format'=>'raw',
        //'attribute'=>'modified_user',
        //'visible' => FHtml::isVisibleInGrid($object_type, 'modified_user', $form_type),
        //'value' => function($model) { return FHtml::showContent($model-> modified_user, FHtml::SHOW_LABEL, 'music_song', 'modified_user','varchar(100)','music-song'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'width'=>'80px',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('music_song', 'music_song', 'modified_user', true, 'id', 'name'),
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