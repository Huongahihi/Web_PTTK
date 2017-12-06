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
    'id' => 'travel-scores-form',
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


<?= //name: name, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull: 1
$form->field($model, 'name')->textInput() ?>

<?= //name: attraction_id, comment: lookup:@travel_attractions, dbType: int(11), phpType: integer, size: 11, allowNull:
//$form->field($model, 'attraction_id')->dropDownList(FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'attraction_id', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'attraction_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'attraction_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

<?= //name: site_id, comment: lookup:@travel_sites, dbType: int(11), phpType: integer, size: 11, allowNull: 1
//$form->field($model, 'site_id')->dropDownList(FHtml::getComboArray('@travel_sites', 'travel_sites', 'site_id', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'site_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@travel_sites', 'travel_sites', 'site_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

<?= //name: is_active, comment: , dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
//$form->field($model, 'is_active')->widget(\kartik\widgets\SwitchInput::className(), [])
$form->field($model, 'is_active')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size' => 'md', 'threeState' => false]]) ?>

<?= //name: rank, comment: , dbType: int(11), phpType: integer, size: 11, allowNull: 1
$form->field($model, 'rank')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
?>

<?= //name: weight, comment: , dbType: int(11), phpType: integer, size: 11, allowNull: 1
$form->field($model, 'weight')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
?>

<?= //name: score, comment: , dbType: float, phpType: double, size: , allowNull: 1
$form->field($model, 'score')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>


<?php \common\widgets\FActiveForm::end(); ?>



