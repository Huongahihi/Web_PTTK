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
    'id' => 'travel-itinerary-form',
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


<?= //name: image, comment: , dbType: varchar(300), phpType: string, size: 300, allowNull: 1
$form->field($model, 'image')->widget(\common\widgets\FFileInput::className(), ['pluginOptions' => ['model' => $model, 'maxFileSize' => FHtml::config('FILE_SIZE_MAX', 4000000), 'options' => ['accept' => 'image/*', 'multiple' => false], 'showPreview' => true, 'showCaption' => false, 'showRemove' => true, 'showUpload' => true, 'pluginOptions' => ['browseLabel' => '', 'removeLabel' => '', 'previewFileType' => 'any', 'uploadUrl' => Url::to([FHtml::config('UPLOAD_FOLDER', '/site/file-upload')])]]]) ?>

<?= //name: name, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull:
$form->field($model, 'name')->textInput() ?>

<?= //name: user_id, comment: lookup:@user;editor:select, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
//$form->field($model, 'user_id')->dropDownList(FHtml::getComboArray('@user', 'user', 'user_id', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'user_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@user', 'user', 'user_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

<?= //name: start_date, comment: , dbType: date, phpType: string, size: , allowNull: 1
//$form->field($model, 'start_date')->widget(\kartik\widgets\DatePicker::className(), [])
$form->field($model, 'start_date')->input('date') ?>

<?= //name: end_date, comment: , dbType: date, phpType: string, size: , allowNull: 1
//$form->field($model, 'end_date')->widget(\kartik\widgets\DatePicker::className(), [])
$form->field($model, 'end_date')->input('date') ?>

<?= //name: content, comment: , dbType: text, phpType: string, size: , allowNull: 1
$form->field($model, 'content')->widget(FCKEditor::className(), ['options' => ['rows' => 5, 'disabled' => false], 'preset' => 'normal']) ?>

<?= //name: days, comment: , dbType: int(10), phpType: integer, size: 10, allowNull: 1
$form->field($model, 'days')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
?>

<?= //name: city, comment: , dbType: varchar(100), phpType: string, size: 100, allowNull: 1
//$form->field($model, 'city')->dropDownList(FHtml::getComboArray('travel_itinerary', 'travel_itinerary', 'city', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'city')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('travel_itinerary', 'travel_itinerary', 'city', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

<?= //name: status, comment: data:PLAN,TRAVEL,FINISHED, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
//$form->field($model, 'status')->dropDownList(FHtml::getComboArray('travel_itinerary', 'travel_itinerary', 'status', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'status')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('travel_itinerary', 'travel_itinerary', 'status', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

<?= //name: is_system, comment: , dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
//$form->field($model, 'is_system')->widget(\kartik\widgets\SwitchInput::className(), [])
$form->field($model, 'is_system')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size' => 'md', 'threeState' => false]]) ?>


<?php \common\widgets\FActiveForm::end(); ?>



