<?php
use yii\helpers\Url;
use common\components\FHtml;

use kartik\datecontrol\DateControl;
use kartik\grid\GridView;

$moduleName = 'EcommerceReservation';
$currentRole = FHtml::getCurrentRole();

return [
    [
        'class' => 'common\widgets\grid\CheckboxColumn',
        'width' => '20px',
        'headerOptions'=>['class'=>'hidden-print'],
        'contentOptions'=>['class'=>'hidden-print'],
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'kartik\grid\ExpandRowColumn',
        'width'=>'50px',
        'value'=>function ($model, $key, $index, $column) {
            return GridView::ROW_COLLAPSED;
        },
        'detail'=>function ($model, $key, $index, $column) {
            return Yii::$app->controller->renderPartial('_view_print', ['model'=>$model]);
        },
        'headerOptions'=>['class'=>'hidden-print'],
        'contentOptions'=>['class'=>'hidden-print'],
        'expandOneOnly'=>true
    ],
    //[ //name: id, dbType: int(11), phpType: integer, size: 11, allowNull:  
        //'class'=>'kartik\grid\DataColumn',
        //'format'=>['raw'],
        //'attribute'=>'id',
        //'value' => function($model) { return FHtml::showContent($model-> id, '', 'ecommerce_reservation', 'id','int(11)','ecommerce-reservation'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'width'=>'50px',
    //],
    [ //name: buyer_id, dbType: int(11), phpType: integer, size: 11, allowNull:  
        'class'=>'kartik\grid\DataColumn',
        'format'=>['raw'],
        'attribute'=>'buyer_id',
        'value' => function($model) { return FHtml::showContent($model-> buyer_id, '', 'ecommerce_reservation', 'buyer_id','int(11)','ecommerce-reservation'); }, 
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'width'=>'50px',
    ],
    [ //name: buyer_name, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class'=>'kartik\grid\DataColumn',
        'attribute'=>'buyer_name',
        'hAlign'=>'left',
        'vAlign'=>'middle',
        'contentOptions'=>['class'=>'col-xs-2 nowrap'],
    ],
    [ //name: buyer_note, dbType: text, phpType: string, size: , allowNull: 1 
        'class'=>'kartik\grid\DataColumn',
        'attribute'=>'buyer_note',
        'value' => function($model) { return FHtml::showContent($model-> buyer_note, '', 'ecommerce_reservation', 'buyer_note','text','ecommerce-reservation'); }, 
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'contentOptions'=>['class'=>'col-xs-1 nowrap'],
    ],
    [ //name: buyer_confirm, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        'class'=>'kartik\grid\DataColumn',
        'attribute'=>'buyer_confirm',
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'contentOptions'=>['class'=>'col-xs-1 nowrap'],
    ],
    [ //name: buyer_visible, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        'class'=>'kartik\grid\DataColumn',
        'attribute'=>'buyer_visible',
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'contentOptions'=>['class'=>'col-xs-1 nowrap'],
    ],
    [ //name: seller_id, dbType: int(11), phpType: integer, size: 11, allowNull:  
        'class'=>'kartik\grid\DataColumn',
        'format'=>['raw'],
        'attribute'=>'seller_id',
        'value' => function($model) { return FHtml::showContent($model-> seller_id, '', 'ecommerce_reservation', 'seller_id','int(11)','ecommerce-reservation'); }, 
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'width'=>'50px',
    ],
    [ //name: seller_name, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        'class'=>'kartik\grid\DataColumn',
        'attribute'=>'seller_name',
        'hAlign'=>'left',
        'vAlign'=>'middle',
        'contentOptions'=>['class'=>'col-xs-2 nowrap'],
    ],
    [ //name: seller_note, dbType: text, phpType: string, size: , allowNull: 1 
        'class'=>'kartik\grid\DataColumn',
        'attribute'=>'seller_note',
        'value' => function($model) { return FHtml::showContent($model-> seller_note, '', 'ecommerce_reservation', 'seller_note','text','ecommerce-reservation'); }, 
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'contentOptions'=>['class'=>'col-xs-1 nowrap'],
    ],
    [ //name: seller_confirm, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        'class'=>'kartik\grid\DataColumn',
        'attribute'=>'seller_confirm',
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'contentOptions'=>['class'=>'col-xs-1 nowrap'],
    ],
    [ //name: seller_visible, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        'class'=>'kartik\grid\DataColumn',
        'attribute'=>'seller_visible',
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'contentOptions'=>['class'=>'col-xs-1 nowrap'],
    ],
    [ //name: deal_id, dbType: int(11), phpType: integer, size: 11, allowNull: 1 
        'class'=>'kartik\grid\DataColumn',
        'format'=>['raw'],
        'attribute'=>'deal_id',
        'value' => function($model) { return FHtml::showContent($model-> deal_id, '', 'ecommerce_reservation', 'deal_id','int(11)','ecommerce-reservation'); }, 
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'width'=>'50px',
    ],
    //[ //name: deal_name, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'attribute'=>'deal_name',
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-xs-2 nowrap'],
    //],
    //[ //name: price, dbType: float(10,2), phpType: double, size: 10, allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'attribute'=>'price',
        //'value' => function($model) { return FHtml::showContent($model-> price, '', 'ecommerce_reservation', 'price','float(10,2)','ecommerce-reservation'); }, 
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-xs-1 nowrap'],
    //],
    //[ //name: time, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'attribute'=>'time',
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-xs-2 nowrap'],
    //],
    //[ //name: payment_method, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'attribute'=>'payment_method',
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-xs-1 nowrap'],
    //],
    //[ //name: payment_status, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'format'=>'raw',
        //'attribute'=>'payment_status',
        //'value' => function($model) { return FHtml::showContent($model-> payment_status, FHtml::SHOW_LABEL, 'ecommerce_reservation', 'payment_status','varchar(100)','ecommerce-reservation'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('ecommerce_reservation.payment_status', 'ecommerce_reservation', 'payment_status', true, 'id', 'name'),
        //'contentOptions'=>['class'=>'col-xs-1 nowrap'],
    //],
    //[ //name: status, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'format'=>'raw',
        //'attribute'=>'status',
        //'value' => function($model) { return FHtml::showContent($model-> status, FHtml::SHOW_LABEL, 'ecommerce_reservation', 'status','varchar(100)','ecommerce-reservation'); }, 
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'filterType' => GridView::FILTER_SELECT2, 
        //'filterWidgetOptions'=>[
                            //'pluginOptions'=>['allowClear' => true],
                            //],
        //'filterInputOptions'=>['placeholder'=>''],
        //'filter'=> FHtml::getComboArray('ecommerce_reservation.status', 'ecommerce_reservation', 'status', true, 'id', 'name'),
        //'contentOptions'=>['class'=>'col-xs-1 nowrap'],
    //],
    //[ //name: is_active, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        //'class'=>'kartik\grid\BooleanColumn',
        //'attribute'=>'is_active',
        //'value' => function($model) { return FHtml::showContent($model-> is_active, FHtml::SHOW_BOOLEAN, 'ecommerce_reservation', 'is_active','tinyint(1)','ecommerce-reservation'); }, 
        //'hAlign'=>'center',
        //'vAlign'=>'middle',
        //'width'=>'20px',
    //],
    //[ //name: created_date, dbType: datetime, phpType: string, size: , allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'format'=>'date',
        //'attribute'=>'created_date',
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-xs-1 nowrap'],
    //],
    //[ //name: created_user, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'attribute'=>'created_user',
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-xs-1 nowrap'],
    //],
    //[ //name: modified_date, dbType: datetime, phpType: string, size: , allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'format'=>'date',
        //'attribute'=>'modified_date',
        //'hAlign'=>'right',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-xs-1 nowrap'],
    //],
    //[ //name: modified_user, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //'class'=>'kartik\grid\DataColumn',
        //'attribute'=>'modified_user',
        //'hAlign'=>'left',
        //'vAlign'=>'middle',
        //'contentOptions'=>['class'=>'col-xs-1 nowrap'],
    //],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false, // Dropdown or Buttons
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'width'=>'80px',
        'urlCreator' => function($action, $model) {
            return Url::to([$action, 'id' => $model->id]);
        },
        'headerOptions'=>['class'=>'hidden-print'],
        'contentOptions'=>['class'=>'hidden-print'],
        'visibleButtons' =>[
            'update' => FHtml::isInRole('', 'update', $currentRole),
            'delete' => FHtml::isInRole('', 'delete', $currentRole),
        ],
        'viewOptions'=>['role'=>'modal-remote','title'=>FHtml::t('common', 'title.view'),'data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>$this->params['displayType'],'title'=>FHtml::t('common', 'title.update'), 'data-toggle'=>'tooltip'],
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