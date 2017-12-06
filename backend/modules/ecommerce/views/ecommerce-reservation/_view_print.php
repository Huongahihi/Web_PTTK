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

$moduleName = 'EcommerceReservation';
$moduleTitle = 'Ecommerce Reservation';
$moduleKey = 'ecommerce-reservation';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);
$field_layout = FHtml::config(FHtml::SETTINGS_FIELD_LAYOUT, FHtml::LAYOUT_TABLE);
$form_label_CSS = 'text-default';

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\EcommerceReservation */
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
'id' => 'ecommerce-reservation-form',
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
        <div class="col-md-12 col-xs-12">
            <div class="portlet light">
                <?= $this->render(\Globals::VIEWS_PRINT_HEADER, ['form_type' => $moduleName, 'title' => FHtml::getFieldValue($model, ['name', 'title'])]) ?>                                <h3><?= FHtml::t('common', 'Common') ?></h3>
                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                       <?= FHtml::showModelField($model,'id', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'id', 'int(11)', '', '') ?>

       <?= FHtml::showModelField($model,'buyer_id', FHtml::SHOW_LOOKUP, $field_layout, $form_label_CSS, '@user', 'buyer_id', 'int(11)', '', '') ?>

       <?= FHtml::showModelField($model,'buyer_name', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'buyer_name', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'buyer_note', FHtml::SHOW_HTML, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'buyer_note', 'text', '', '') ?>

       <?= FHtml::showModelField($model,'buyer_confirm', FHtml::SHOW_ACTIVE, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'buyer_confirm', 'tinyint(1)', '', '') ?>

       <?= FHtml::showModelField($model,'buyer_visible', FHtml::SHOW_ACTIVE, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'buyer_visible', 'tinyint(1)', '', '') ?>

                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                <h3><?= FHtml::t('common', 'PROVIDER') ?></h3>
                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                       <?= FHtml::showModelField($model,'seller_id', FHtml::SHOW_LOOKUP, $field_layout, $form_label_CSS, '@user', 'seller_id', 'int(11)', '', '') ?>

       <?= FHtml::showModelField($model,'seller_name', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'seller_name', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'seller_note', FHtml::SHOW_HTML, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'seller_note', 'text', '', '') ?>

       <?= FHtml::showModelField($model,'seller_confirm', FHtml::SHOW_ACTIVE, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'seller_confirm', 'tinyint(1)', '', '') ?>

       <?= FHtml::showModelField($model,'seller_visible', FHtml::SHOW_ACTIVE, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'seller_visible', 'tinyint(1)', '', '') ?>

                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                <h3><?= FHtml::t('common', 'DEAL') ?></h3>
                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                       <?= FHtml::showModelField($model,'deal_id', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'deal_id', 'int(11)', '', '') ?>

       <?= FHtml::showModelField($model,'deal_name', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'deal_name', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'price', FHtml::SHOW_CURRENCY, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'price', 'float(10,2)', '', '') ?>

       <?= FHtml::showModelField($model,'time', FHtml::SHOW_DATE, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'time', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'payment_method', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'payment_method', 'varchar(100)', '', '') ?>

       <?= FHtml::showModelField($model,'payment_status', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'payment_status', 'varchar(100)', '', '') ?>

       <?= FHtml::showModelField($model,'status', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'status', 'varchar(100)', '', '') ?>

       <?= FHtml::showModelField($model,'is_active', FHtml::SHOW_ACTIVE, $field_layout, $form_label_CSS, 'ecommerce_reservation', 'is_active', 'tinyint(1)', '', '') ?>

                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                            </div>

        <?php if (Yii::$app->request->isAjax) { ?>

        <input type="hidden" id="saveType" name="saveType">

        <?php } else { ?>
        <p class="hidden-print">
            <a class="btn blue hidden-print " onclick="javascript:window.print();"> Print
                <i class="fa fa-print"></i>
            </a>
            <?php if (FHtml::isInRole('', 'update', $currentRole)) { Html::a('<i class="fa fa-pencil"></i> ' .  FHtml::t('common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']); } ?>
            <?php if (FHtml::isInRole('', 'delete', $currentRole)) {Html::a('<i class="fa fa-trash"></i> ' .  FHtml::t('common', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger pull-right',
            'data' => [
            'confirm' => FHtml::t('common', 'Are you sure to delete ?'),
            'method' => 'post',
            ],
            ]);} ?>
            <?=  Html::a('<i class="fa fa-undo"></i> ' . FHtml::t('common', 'Cancel'), ['index'], ['class' => 'btn btn-default']) ?>

        </p>
        <?php } ?>        </div>
    </div>
</div>
   <?php ActiveForm::end(); ?>




