<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\widgets\Typeahead;
use common\components\FHtml;

use common\widgets\FCKEditor;
use kartik\money\MaskMoney;
use yii\widgets\MaskedInput;
use kartik\slider\Slider;
?>

<?php $form = ActiveForm::begin([
'id' => 'ecommerce-order-form',
'type' => $form_Type, //ActiveForm::TYPE_HORIZONTAL,ActiveForm::TYPE_VERTICAL,ActiveForm::TYPE_INLINE
'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_MEDIUM, 'showErrors' => true],
'staticOnly' => !$canEdit, // check the Role here
'readonly' => !$canEdit, // check the Role here
'options' => [
//'class' => 'form-horizontal',
'enctype' => 'multipart/form-data'
]
]);
 ?>


       <?=  //name: user_id, comment: lookup:@user, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'user_id')->dropDownList(FHtml::getComboArray('@user', 'user', 'user_id', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'user_id')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('@user', 'user', 'user_id', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: billing_name, comment: group:Billing, dbType: varchar(255), phpType: string, size: 255, allowNull:  
        $form->field($model, 'billing_name')->textInput() ?>

       <?=  //name: billing_phone, comment: group:Billing, dbType: varchar(255), phpType: string, size: 255, allowNull:  
        $form->field($model, 'billing_phone')->textInput() ?>

       <?=  //name: billing_address, comment: group:Billing, dbType: varchar(1000), phpType: string, size: 1000, allowNull:  
        $form->field($model, 'billing_address')->textarea(['rows' => 3]) ?>

       <?=  //name: billing_email, comment: group:Billing, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'billing_email')->input('email') ?>

       <?=  //name: billing_postcode, comment: group:Billing, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'billing_postcode')->textInput() ?>

       <?=  //name: billing_city, comment: group:Billing, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'billing_city')->textInput() ?>

       <?=  //name: billing_state, comment: group:Billing, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'billing_state')->textInput() ?>

       <?=  //name: billing_country, comment: group:Billing, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'billing_country')->textInput() ?>

       <?=  //name: shipping_address, comment: group:Shipping, dbType: varchar(2000), phpType: string, size: 2000, allowNull: 1 
        $form->field($model, 'shipping_address')->textarea(['rows' => 3]) ?>

       <?=  //name: shipping_time, comment: group:Shipping, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'shipping_time')->widget(\kartik\widgets\DatePicker::className(), ['pluginOptions' => ['format' => FHtml::config(FHtml::SETTINGS_DATE_FORMAT, 'dd M yyyy'), 'class' => 'form-control', 'autoclose' => true, 'todayHighlight' => true, 'todayBtn' => true ]])
 ?>

       <?=  //name: shipping_note, comment: group:Shipping, dbType: varchar(2000), phpType: string, size: 2000, allowNull: 1 
        $form->field($model, 'shipping_note')->textarea(['rows' => 3]) ?>

       <?=  //name: order_date, comment: group:Order, dbType: varchar(200), phpType: string, size: 200, allowNull: 1 
        $form->field($model, 'order_date')->widget(\kartik\widgets\DatePicker::className(), ['pluginOptions' => ['format' => FHtml::config(FHtml::SETTINGS_DATE_FORMAT, 'dd M yyyy'), 'class' => 'form-control', 'autoclose' => true, 'todayHighlight' => true, 'todayBtn' => true ]])
 ?>

       <?=  //name: order_detail, comment: group:Order, dbType: text, phpType: string, size: , allowNull: 1 
        $form->field($model, 'order_detail')->textarea(['rows' => 3]) ?>

       <?=  //name: order_note, comment: group:Order, dbType: text, phpType: string, size: , allowNull: 1 
        $form->field($model, 'order_note')->textarea(['rows' => 3]) ?>

       <?=  //name: order_type, comment: group:Order;data:web,mobile,call,direct,agency, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'order_type')->dropDownList(FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'order_type', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'order_type')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'order_type', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: order_status, comment: group:Order;data:pending,approved,processing,finish,done,fail, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'order_status')->dropDownList(FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'order_status', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'order_status')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'order_status', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: is_active, comment: group:Order, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        //$form->field($model, 'is_active')->widget(\kartik\widgets\SwitchInput::className(), [])
$form->field($model, 'is_active')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size'=>'md', 'threeState'=>false]]) ?>

       <?=  //name: price_total, comment: group:Payment, dbType: float(10,2), phpType: double, size: 10, allowNull: 1 
        $form->field($model, 'price_total')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: tax, comment: group:Payment, dbType: varchar(500), phpType: string, size: 500, allowNull: 1 
        //$form->field($model, 'tax')->dropDownList(FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'tax', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'tax')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'tax', true, 'id', 'name'), 'options'=>['multiple' => true], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: price_tax, comment: group:Payment, dbType: float(10,2), phpType: double, size: 10, allowNull: 1 
        $form->field($model, 'price_tax')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: promotion_code, comment: group:Payment, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'promotion_code')->textInput() ?>

       <?=  //name: price_discount, comment: group:Payment, dbType: float(10,0), phpType: double, size: 10, allowNull: 1 
        $form->field($model, 'price_discount')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: price_shipping, comment: group:Payment, dbType: float(10,2), phpType: double, size: 10, allowNull: 1 
        $form->field($model, 'price_shipping')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: price_final, comment: group:Payment, dbType: float, phpType: double, size: , allowNull: 1 
        $form->field($model, 'price_final')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: payment_method, comment: group:Payment;data:cash,point,credit,cod,bank, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'payment_method')->dropDownList(FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'payment_method', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'payment_method')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'payment_method', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: payment_status, comment: group:Payment;data:0:unpaid,1:paid, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'payment_status')->dropDownList(FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'payment_status', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'payment_status')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'payment_status', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>


   <?php ActiveForm::end(); ?>



