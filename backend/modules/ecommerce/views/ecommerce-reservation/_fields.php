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
'id' => 'ecommerce-reservation-form',
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


       <?=  //name: buyer_id, comment: group:BUYER;lookup:@user;, dbType: int(11), phpType: integer, size: 11, allowNull:
        //$form->field($model, 'buyer_id')->dropDownList(FHtml::getComboArray('@user', 'user', 'buyer_id', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'buyer_id')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('@user', 'user', 'buyer_id', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: buyer_name, comment: group:BUYER;, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'buyer_name')->textInput() ?>

       <?=  //name: buyer_note, comment: group:BUYER;, dbType: text, phpType: string, size: , allowNull: 1 
        $form->field($model, 'buyer_note')->textarea(['rows' => 3]) ?>

       <?=  //name: buyer_confirm, comment: group:BUYER;, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        //$form->field($model, 'buyer_confirm')->widget(\kartik\widgets\SwitchInput::className(), [])
$form->field($model, 'buyer_confirm')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size'=>'md', 'threeState'=>false]]) ?>

       <?=  //name: buyer_visible, comment: group:BUYER;, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        //$form->field($model, 'buyer_visible')->widget(\kartik\widgets\SwitchInput::className(), [])
$form->field($model, 'buyer_visible')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size'=>'md', 'threeState'=>false]]) ?>

       <?=  //name: seller_id, comment: group:PROVIDER;lookup:@user, dbType: int(11), phpType: integer, size: 11, allowNull:
        //$form->field($model, 'seller_id')->dropDownList(FHtml::getComboArray('@user', 'user', 'seller_id', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'seller_id')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('@user', 'user', 'seller_id', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: seller_name, comment: group:PROVIDER;, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'seller_name')->textInput() ?>

       <?=  //name: seller_note, comment: group:PROVIDER;, dbType: text, phpType: string, size: , allowNull: 1 
        $form->field($model, 'seller_note')->textarea(['rows' => 3]) ?>

       <?=  //name: seller_confirm, comment: group:PROVIDER;, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        //$form->field($model, 'seller_confirm')->widget(\kartik\widgets\SwitchInput::className(), [])
$form->field($model, 'seller_confirm')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size'=>'md', 'threeState'=>false]]) ?>

       <?=  //name: seller_visible, comment: group:PROVIDER;, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        //$form->field($model, 'seller_visible')->widget(\kartik\widgets\SwitchInput::className(), [])
$form->field($model, 'seller_visible')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size'=>'md', 'threeState'=>false]]) ?>

       <?=  //name: deal_id, comment: group:DEAL;, dbType: int(11), phpType: integer, size: 11, allowNull: 1 
        //$form->field($model, 'deal_id')->dropDownList(FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'deal_id', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'deal_id')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'deal_id', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: deal_name, comment: group:DEAL;, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'deal_name')->textInput() ?>

       <?=  //name: price, comment: group:DEAL;, dbType: float(10,2), phpType: double, size: 10, allowNull: 1 
        $form->field($model, 'price')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: time, comment: group:DEAL;, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'time')->widget(\kartik\widgets\DatePicker::className(), ['pluginOptions' => ['format' => FHtml::config(FHtml::SETTINGS_DATE_FORMAT, 'dd M yyyy'), 'class' => 'form-control', 'autoclose' => true, 'todayHighlight' => true, 'todayBtn' => true ]])
 ?>

       <?=  //name: payment_method, comment: group:DEAL;data:point,credit,cash,paypal,cod, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'payment_method')->dropDownList(FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'payment_method', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'payment_method')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'payment_method', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: payment_status, comment: group:DEAL;data:0:Unpaid,1:Paid, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'payment_status')->dropDownList(FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'payment_status', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'payment_status')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'payment_status', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: status, comment: group:DEAL;data:pending,approved,rejected,processing,finish,fail, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'status')->dropDownList(FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'status', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'status')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'status', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: is_active, comment: group:DEAL;, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        //$form->field($model, 'is_active')->widget(\kartik\widgets\SwitchInput::className(), [])
$form->field($model, 'is_active')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size'=>'md', 'threeState'=>false]]) ?>


   <?php ActiveForm::end(); ?>



