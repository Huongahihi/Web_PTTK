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

$moduleName = 'EcommerceOrder';
$moduleTitle = 'Ecommerce Order';
$moduleKey = 'ecommerce-order';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);
$field_layout = FHtml::config(FHtml::SETTINGS_FIELD_LAYOUT, FHtml::LAYOUT_TABLE);
$form_label_CSS = 'text-default';

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


<?php $form = ActiveForm::begin([
'id' => 'ecommerce-order-form',
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
                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                       <?= FHtml::showModelField($model,'id', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_order', 'id', 'int(11)', '', '') ?>

       <?= FHtml::showModelField($model,'user_id', FHtml::SHOW_LOOKUP, $field_layout, $form_label_CSS, '@user', 'user_id', 'varchar(100)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_name', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_name', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_phone', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_phone', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_address', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_address', 'varchar(1000)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_email', FHtml::SHOW_EMAIL, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_email', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_postcode', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_postcode', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_city', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_city', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_state', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_state', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_country', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_country', 'varchar(255)', '', '') ?>

                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                <h3><?= FHtml::t('common', 'Shipping') ?></h3>
                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                       <?= FHtml::showModelField($model,'shipping_address', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'shipping_address', 'varchar(2000)', '', '') ?>

       <?= FHtml::showModelField($model,'shipping_time', FHtml::SHOW_DATE, $field_layout, $form_label_CSS, 'ecommerce_order', 'shipping_time', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'shipping_note', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'shipping_note', 'varchar(2000)', '', '') ?>

                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                <h3><?= FHtml::t('common', 'Order') ?></h3>
                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                       <?= FHtml::showModelField($model,'order_date', FHtml::SHOW_DATE, $field_layout, $form_label_CSS, 'ecommerce_order', 'order_date', 'varchar(200)', '', '') ?>

       <?= FHtml::showModelField($model,'order_detail', FHtml::SHOW_HTML, $field_layout, $form_label_CSS, 'ecommerce_order', 'order_detail', 'text', '', '') ?>

       <?= FHtml::showModelField($model,'order_note', FHtml::SHOW_HTML, $field_layout, $form_label_CSS, 'ecommerce_order', 'order_note', 'text', '', '') ?>

       <?= FHtml::showModelField($model,'order_type', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_order', 'order_type', 'varchar(100)', '', '') ?>

       <?= FHtml::showModelField($model,'order_status', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_order', 'order_status', 'varchar(100)', '', '') ?>

       <?= FHtml::showModelField($model,'is_active', FHtml::SHOW_ACTIVE, $field_layout, $form_label_CSS, 'ecommerce_order', 'is_active', 'tinyint(1)', '', '') ?>

                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                <h3><?= FHtml::t('common', 'Payment') ?></h3>
                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                       <?= FHtml::showModelField($model,'price_total', FHtml::SHOW_CURRENCY, $field_layout, $form_label_CSS, 'ecommerce_order', 'price_total', 'float(10,2)', '', '') ?>

       <?= FHtml::showModelField($model,'tax', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_order', 'tax', 'varchar(500)', '', '') ?>

       <?= FHtml::showModelField($model,'price_tax', FHtml::SHOW_CURRENCY, $field_layout, $form_label_CSS, 'ecommerce_order', 'price_tax', 'float(10,2)', '', '') ?>

       <?= FHtml::showModelField($model,'promotion_code', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'promotion_code', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'price_discount', FHtml::SHOW_CURRENCY, $field_layout, $form_label_CSS, 'ecommerce_order', 'price_discount', 'float(10,0)', '', '') ?>

       <?= FHtml::showModelField($model,'price_shipping', FHtml::SHOW_CURRENCY, $field_layout, $form_label_CSS, 'ecommerce_order', 'price_shipping', 'float(10,2)', '', '') ?>

       <?= FHtml::showModelField($model,'price_final', FHtml::SHOW_DECIMAL, $field_layout, $form_label_CSS, 'ecommerce_order', 'price_final', 'float', '', '') ?>

       <?= FHtml::showModelField($model,'payment_method', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_order', 'payment_method', 'varchar(100)', '', '') ?>

       <?= FHtml::showModelField($model,'payment_status', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_order', 'payment_status', 'varchar(100)', '', '') ?>

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




