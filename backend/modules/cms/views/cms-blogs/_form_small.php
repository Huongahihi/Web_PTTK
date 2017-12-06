<?php
/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "CmsBlogs".
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

$moduleName = 'CmsBlogs';
$moduleTitle = 'Cms Blogs';
$moduleKey = 'cms-blogs';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);
$currentAction = FHtml::currentAction();
$edit_type = isset($edit_type) ? $edit_type : (FHtml::isViewAction($currentAction) ? FHtml::EDIT_TYPE_VIEW : FHtml::EDIT_TYPE_DEFAULT);
$display_type = isset($display_type) ? $display_type : (FHtml::isViewAction($currentAction) ? FHtml::DISPLAY_TYPE_TABLE : FHtml::DISPLAY_TYPE_DEFAULT);

$ajax = isset($ajax) ? $ajax : (FHtml::isListAction($currentAction) ? false : true);

/* @var $this yii\web\View */
/* @var $model backend\modules\cms\models\CmsBlogs */
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
'id' => 'cms-blogs-form',
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
                'code' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'code')->textInput(), 'columnOptions' => ['colspan' => 1]],
'name' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'name')->textInput(), 'columnOptions' => ['colspan' => 1]],
'overview' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'overview')->textarea(['rows' => 3]), 'columnOptions' => ['colspan' => 1]],
'content' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'content')->html() , 'columnOptions' => ['colspan' => 1]],
'tags' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'tags')->textarea(['rows' => 3]), 'columnOptions' => ['colspan' => 1]],
'linkurl' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'linkurl')->textInput(), 'columnOptions' => ['colspan' => 1]],
'author' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'author')->textInput(), 'columnOptions' => ['colspan' => 1]],
'rates' => ['type' => FHtml::INPUT_RAW, 'value' => $form->fieldNoLabel($model, 'rates')->rate(), 'columnOptions' => ['colspan' => 1]],


                      ]]); ?>


        </div>
        <div class="col-md-1">
            <?=   FHtml::showActionsButton($model, $canEdit, $canDelete, '{save}')  ?>

        </div>

    </div>
   <?php FActiveForm::end(); ?>
