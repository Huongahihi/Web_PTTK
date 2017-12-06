<?php
/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "EcommerceOrder".
*/
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use common\widgets\FActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\widgets\Typeahead;
use common\components\FHtml;
use kartik\checkbox\CheckboxX;
use common\widgets\FCKEditor;
use yii\widgets\MaskedInput;
use kartik\money\MaskMoney;
use kartik\slider\Slider;
use common\widgets\formfield\FormObjectFile;
use common\widgets\formfield\FormObjectAttributes;
use common\widgets\formfield\FormRelations;
use common\widgets\FFormTable;
use yii\widgets\Pjax;

$form_Type = $this->params['activeForm_type'];

$moduleName = 'EcommerceOrder';
$moduleTitle = 'Ecommerce Order';
$moduleKey = 'ecommerce-order';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);
$currentAction = FHtml::currentAction();
$edit_type = isset($edit_type) ? $edit_type : (FHtml::isViewAction($currentAction) ? FHtml::EDIT_TYPE_VIEW : FHtml::EDIT_TYPE_DEFAULT);
$display_type = isset($display_type) ? $display_type : (FHtml::isViewAction($currentAction) ? FHtml::DISPLAY_TYPE_TABLE : FHtml::DISPLAY_TYPE_DEFAULT);

$ajax = isset($ajax) ? $ajax : (FHtml::isListAction($currentAction) ? false : true);

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\EcommerceOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if (!Yii::$app->request->isAjax) {
$this->title = FHtml::t($moduleTitle);
$this->params['mainIcon'] = 'fa fa-list';
$this->params['toolBarActions'] = array(
'linkButton'=>array(),
'button'=>array(),
'dropdown'=>array(),
);
} ?>

<?php $form = FActiveForm::begin([
'id' => 'ecommerce-order-form',
'type' => $form_Type, //ActiveForm::TYPE_HORIZONTAL,ActiveForm::TYPE_VERTICAL,ActiveForm::TYPE_INLINE
'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_MEDIUM, 'showErrors' => true],
'staticOnly' => false, // check the Role here
'readonly' => !$canEdit, // check the Role here
'edit_type' => $edit_type,
'display_type' => $display_type,
'enableClientValidation' => true,
'enableAjaxValidation' => false,
'options' => [
//'class' => 'form-horizontal',
'enctype' => 'multipart/form-data'
]
]);
 ?>


    <div class="row">

        <div class="col-md-11">

                       <?php echo FFormTable::widget(['model' => $model, 'form' => $form, 'columns' => 1, 'attributes' => [ 
                'user_id' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'user_id')->select(FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'user_id', true, 'id', 'name')), 'columnOptions' => ['colspan' => 1]],
'billing_name' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'billing_name')->textInput(), 'columnOptions' => ['colspan' => 1]],
'billing_phone' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'billing_phone')->textInput(), 'columnOptions' => ['colspan' => 1]],
'billing_address' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'billing_address')->textarea(['rows' => 3]), 'columnOptions' => ['colspan' => 1]],
'billing_email' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'billing_email')->emailInput(), 'columnOptions' => ['colspan' => 1]],
'billing_postcode' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'billing_postcode')->textInput(), 'columnOptions' => ['colspan' => 1]],
'billing_city' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'billing_city')->textInput(), 'columnOptions' => ['colspan' => 1]],
'billing_state' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'billing_state')->textInput(), 'columnOptions' => ['colspan' => 1]],
'billing_country' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'billing_country')->textInput(), 'columnOptions' => ['colspan' => 1]],


                      ]]); ?>


        </div>
        <div class="col-md-1">
            <?=   FHtml::showActionsButton($model, $canEdit, $canDelete, '{save}')  ?>

        </div>

    </div>
   <?php FActiveForm::end(); ?>
