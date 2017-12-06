<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\widgets\Typeahead;
use common\components\FHtml;
use kartik\checkbox\CheckboxX;
use common\widgets\FCKEditor;
use yii\widgets\MaskedInput;
use kartik\money\MaskMoney;
use kartik\slider\Slider;

$form_Type = $this->params['activeForm_type'];

$moduleName = 'CrmQuotation';
$moduleTitle = 'Crm Quotation';
$moduleKey = 'crm-quotation';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole($moduleName, 'update', $currentRole);
$canDelete = FHtml::isInRole($moduleName, 'delete', $currentRole);
$field_layout = FHtml::config(FHtml::SETTINGS_FIELD_LAYOUT, FHtml::LAYOUT_TABLE);
$form_label_CSS = 'text-default';

/* @var $this yii\web\View */
/* @var $model backend\modules\crm\models\CrmQuotation */
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


<?php $form = ActiveForm::begin([
'id' => 'crm-quotation-form',
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


<div class="form">
    <div class="row">
        <div class="col-xs-12 col-xs-12">
            <div class="portlet light">
                <?= $this->render(\Globals::VIEWS_PRINT_HEADER, ['form_type' => $moduleName, 'title' => FHtml::getFieldValue($model, ['name', 'title'])]) ?>                                <h3><?= FHtml::t('common', 'Common') ?></h3>
                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                       <?= FHtml::showModelField($model,'request_date', FHtml::SHOW_DATE, $field_layout, $form_label_CSS, 'crm_quotation', 'request_date', 'date', '', '') ?>

       <?= FHtml::showModelField($model,'expected_date', FHtml::SHOW_DATE, $field_layout, $form_label_CSS, 'crm_quotation', 'expected_date', 'date', '', '') ?>

       <?= FHtml::showModelField($model,'expired_date', FHtml::SHOW_DATE, $field_layout, $form_label_CSS, 'crm_quotation', 'expired_date', 'date', '', '') ?>

       <?= FHtml::showModelField($model,'completed_date', FHtml::SHOW_DATE, $field_layout, $form_label_CSS, 'crm_quotation', 'completed_date', 'date', '', '') ?>

       <?= FHtml::showModelField($model,'id', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'crm_quotation', 'id', 'bigint(20)', '', '') ?>

       <?= FHtml::showModelField($model,'name', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'crm_quotation') ?>

       <?= FHtml::showModelField($model,'type', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'crm_quotation') ?>

       <?= FHtml::showModelField($model,'status', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'crm_quotation') ?>

       <?= FHtml::showModelField($model,'reason', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'crm_quotation') ?>

       <?= FHtml::showModelField($model,'note', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'crm_quotation') ?>

       <?= FHtml::showModelField($model,'year', FHtml::SHOW_NUMBER, $field_layout, $form_label_CSS, 'crm_quotation', 'year', 'int(11)', '', '') ?>

                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                <h3><?= FHtml::t('common', 'Client') ?></h3>
                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                       <?= FHtml::showModelField($model,'client_id', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'crm_quotation', 'client_id', 'int(11)', '', '') ?>

       <?= FHtml::showModelField($model,'client_name', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'crm_quotation') ?>

       <?= FHtml::showModelField($model,'client_description', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'crm_quotation') ?>

       <?= FHtml::showModelField($model,'client_requirement', FHtml::SHOW_HTML, $field_layout, $form_label_CSS, 'crm_quotation', 'client_requirement', 'text', '', '') ?>

                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                            </div>

        <?php if (Yii::$app->request->isAjax) { ?>

        <input type="hidden" id="saveType" name="saveType">

        <?php } else { ?>
        <p class="hidden-print">
            <a class="btn blue hidden-print " onclick="javascript:window.print();"> Print
                <i class="fa fa-print"></i>
            </a>
            <?php if (FHtml::isInRole($moduleName, 'update', $currentRole)) { Html::a('<i class="fa fa-pencil"></i> ' .  FHtml::t('common', 'button.update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']); } ?>
            <?php if (FHtml::isInRole($moduleName, 'delete', $currentRole)) {Html::a('<i class="fa fa-trash"></i> ' .  FHtml::t('common', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger pull-right',
            'data' => [
            'confirm' => FHtml::t('common', 'message.confirmdelete'),
            'method' => 'post',
            ],
            ]);} ?>
            <?=  Html::a('<i class="fa fa-undo"></i> ' . FHtml::t('common', 'Cancel'), ['index'], ['class' => 'btn btn-default']) ?>

        </p>
        <?php } ?>        </div>
    </div>
</div>
   <?php ActiveForm::end(); ?>




