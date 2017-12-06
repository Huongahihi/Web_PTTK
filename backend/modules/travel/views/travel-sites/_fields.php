<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\widgets\Typeahead;
use common\components\FHtml;
use common\components\Helper;
use common\widgets\FCKEditor;
use kartik\money\MaskMoney;
use yii\widgets\MaskedInput;
use kartik\slider\Slider;
?>

<?php $form = \common\widgets\FActiveForm::begin([
'id' => 'travel-sites-form',
'type' => $form_Type, //ActiveForm::TYPE_HORIZONTAL,ActiveForm::TYPE_VERTICAL,ActiveForm::TYPE_INLINE
'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_MEDIUM, 'showErrors' => true],
'staticOnly' => false, // check the Role here
'readonly' => !$canEdit, // check the Role here
'options' => [
//'class' => 'form-horizontal',
'enctype' => 'multipart/form-data'
]
]);
 ?>


       <?=  //name: city, comment: lookup:travel, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'city')->dropDownList(FHtml::getComboArray('travel', 'travel', 'city', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'city')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('travel', 'travel', 'city', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: keywords, comment: lookup:travel, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'keywords')->dropDownList(FHtml::getComboArray('travel', 'travel', 'keywords', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'keywords')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('travel', 'travel', 'keywords', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: name, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull:  
        $form->field($model, 'name')->textInput() ?>

       <?=  //name: url, comment: , dbType: varchar(2000), phpType: string, size: 2000, allowNull: 1 
        $form->field($model, 'url')->textarea(['rows' => 3]) ?>

       <?=  //name: weight, comment: , dbType: int(23), phpType: integer, size: 23, allowNull: 1 
        $form->field($model, 'weight')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
 ?>

       <?=  //name: search_content, comment: group:Search;editor:html, dbType: text, phpType: string, size: , allowNull: 1 
        $form->field($model, 'search_content')->textarea(['rows' => 3]) ?>

       <?=  //name: search_element, comment: group:Search, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'search_element')->textInput() ?>

       <?=  //name: search_result, comment: group:Search, dbType: varchar(5000), phpType: string, size: 5000, allowNull: 1 
        $form->field($model, 'search_result')->widget(FCKEditor::className(), ['options' => ['rows' => 5, 'disabled' => false], 'preset' => 'normal'])  ?>

       <?=  //name: is_active, comment: , dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        //$form->field($model, 'is_active')->widget(\kartik\widgets\SwitchInput::className(), [])
$form->field($model, 'is_active')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size'=>'md', 'threeState'=>false]]) ?>


   <?php \common\widgets\FActiveForm::end(); ?>



