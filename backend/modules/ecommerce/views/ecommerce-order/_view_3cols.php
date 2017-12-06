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
        <?= $this->render(\Globals::VIEWS_PRINT_HEADER, ['title' => '',]) ?>
        <div class="profile-sidebar col-md-3 hidden-print">
            <div class="portlet light">
                                                                <div class="margin-top-20">
                                                                            </div>
                <div class="margin-top-20">
                                    </div>
                <div class="margin-top-20">
                    <?= FHtml::showLabel('ecommerce-order.tax', 'ecommerce-order', 'tax', $model->tax) ?>
                </div>

                <!--
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="icon-settings"></i> Edit Detail </a>
                        </li>
                    </ul>
                </div>-->
            </div>
            <!-- END MENU -->
            <div class="portlet light">
                <div class="row list-separated profile-stat">
                    </div>
                <div>
                    <div class="row list-separated profile-stat">
                        <div class="col-md-6">
                            <?= FHtml::showField('Created', FHtml::getFieldValue($model, 'created_date'), FHtml::SHOW_DATE) ?>                            </div>
                        <div class="col-md-6">
                            <?= FHtml::showField(' ', $model->created_user, FHtml::SHOW_USER) ?>                            </div>
                    </div>
                    <div class="row list-separated profile-stat">
                        <div class="col-md-6">
                            <?= FHtml::showField('Modified', $model->modified_date, FHtml::SHOW_DATE) ?>                            </div>
                        <div class="col-md-6">
                            <?= FHtml::showField(' ', $model->modified_user, FHtml::SHOW_USER) ?>                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="portlet light">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', $moduleTitle) ?></span>
                    </div>
                    <div class="tools pull-right">
                        <a href="#" class="fullscreen"></a>
                        <a href="#" class="collapse"></a>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab"><?= FHtml::t('common', 'Info')?></a>
                        </li>
                                                </ul>
                </div>
                <div class="body">
                    <div class="form">
                        <div class="form-body">
                            <div class="tab-content">
                                <div class="tab-pane active row" id="tab_1_1">
                                    <div class="col-md-12">
                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                                               <?= FHtml::showModelField($model,'user_id', FHtml::SHOW_LOOKUP, $field_layout, $form_label_CSS, '@user', 'user_id', 'varchar(100)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_name', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_name', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_phone', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_phone', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_address', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_address', 'varchar(1000)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_email', FHtml::SHOW_EMAIL, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_email', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_postcode', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_postcode', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_city', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_city', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_state', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_state', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'billing_country', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'billing_country', 'varchar(255)', '', '') ?>

                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>
                                    </div>
                                </div>
                                <!--<div class="tab-pane row" id="tab_1_2">
                                    <div class="col-md-12">
                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                                                                                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>
                                    </div>
                                </div>
                                -->                                <!--<div class="tab-pane row" id="tab_1_3">
                                    <div class="col-md-12">
                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                                                                                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>
                                    </div>
                                </div>
                                -->                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!--            <div class="portlet light">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', 'Grouping')?></span>
                    </div>
                </div>
                <div class="">
                    <div class="tab-content">
                        <div class="tab-pane active row" id="tab_1_1">
                            <div class="col-md-12">
                                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                                                                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                            </div>
                        </div>
                    </div>
                </div>
            </div>
            -->
            <!--
            <div class="portlet light">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', 'Pricing')?></span>
                    </div>
                </div>
                <div class="">
                    <div class="tab-content">
                        <div class="tab-pane active row" id="tab_1_1">
                            <div class="col-md-12">
                                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>
                                                                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            -->
                            <div class="portlet light">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', 'Shipping')?></span>
                        </div>
                    </div>
                    <div class="">
                        <div class="tab-content">
                            <div class="tab-pane active row" id="tab_1_1">
                                <div class="col-md-12">
                                    <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>
                                           <?= FHtml::showModelField($model,'shipping_address', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'shipping_address', 'varchar(2000)', '', '') ?>

       <?= FHtml::showModelField($model,'shipping_time', FHtml::SHOW_DATE, $field_layout, $form_label_CSS, 'ecommerce_order', 'shipping_time', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'shipping_note', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'shipping_note', 'varchar(2000)', '', '') ?>

                                    <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                <div class="portlet light">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', 'Order')?></span>
                        </div>
                    </div>
                    <div class="">
                        <div class="tab-content">
                            <div class="tab-pane active row" id="tab_1_1">
                                <div class="col-md-12">
                                    <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>
                                           <?= FHtml::showModelField($model,'order_date', FHtml::SHOW_DATE, $field_layout, $form_label_CSS, 'ecommerce_order', 'order_date', 'varchar(200)', '', '') ?>

       <?= FHtml::showModelField($model,'order_detail', FHtml::SHOW_HTML, $field_layout, $form_label_CSS, 'ecommerce_order', 'order_detail', 'text', '', '') ?>

       <?= FHtml::showModelField($model,'order_note', FHtml::SHOW_HTML, $field_layout, $form_label_CSS, 'ecommerce_order', 'order_note', 'text', '', '') ?>

       <?= FHtml::showModelField($model,'order_type', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_order', 'order_type', 'varchar(100)', '', '') ?>

       <?= FHtml::showModelField($model,'order_status', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_order', 'order_status', 'varchar(100)', '', '') ?>

       <?= FHtml::showModelField($model,'is_active', FHtml::SHOW_ACTIVE, $field_layout, $form_label_CSS, 'ecommerce_order', 'is_active', 'tinyint(1)', '', '') ?>

                                    <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                <div class="portlet light">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', 'Payment')?></span>
                        </div>
                    </div>
                    <div class="">
                        <div class="tab-content">
                            <div class="tab-pane active row" id="tab_1_1">
                                <div class="col-md-12">
                                    <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>
                                           <?= FHtml::showModelField($model,'price_total', FHtml::SHOW_CURRENCY, $field_layout, $form_label_CSS, 'ecommerce_order', 'price_total', 'float(10,2)', '', '') ?>

       <?= FHtml::showModelField($model,'tax', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_order', 'tax', 'varchar(500)', '', '') ?>

       <?= FHtml::showModelField($model,'price_tax', FHtml::SHOW_CURRENCY, $field_layout, $form_label_CSS, 'ecommerce_order', 'price_tax', 'float(10,2)', '', '') ?>

       <?= FHtml::showModelField($model,'promotion_code', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'ecommerce_order', 'promotion_code', 'varchar(255)', '', '') ?>

       <?= FHtml::showModelField($model,'price_discount', FHtml::SHOW_CURRENCY, $field_layout, $form_label_CSS, 'ecommerce_order', 'price_discount', 'float(10,0)', '', '') ?>

       <?= FHtml::showModelField($model,'price_shipping', FHtml::SHOW_CURRENCY, $field_layout, $form_label_CSS, 'ecommerce_order', 'price_shipping', 'float(10,2)', '', '') ?>

       <?= FHtml::showModelField($model,'price_final', FHtml::SHOW_DECIMAL, $field_layout, $form_label_CSS, 'ecommerce_order', 'price_final', 'float', '', '') ?>

       <?= FHtml::showModelField($model,'payment_method', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_order', 'payment_method', 'varchar(100)', '', '') ?>

       <?= FHtml::showModelField($model,'payment_status', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'ecommerce_order', 'payment_status', 'varchar(100)', '', '') ?>

                                    <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

            <?php if (Yii::$app->request->isAjax) { ?>

            <input type="hidden" id="saveType" name="saveType">

            <?php } else { ?>
            <p class="hidden-print">
                <a class="btn blue hidden-print " onclick="javascript:window.print();"> Print
                    <i class="fa fa-print"></i>
                </a>
                <?php if ($canEdit) { echo Html::a('<i class="fa fa-pencil"></i> ' .  FHtml::t('common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-warning']); } ?>
                <?php if ($canDelete) { echo Html::a('<i class="fa fa-trash"></i> ' .  FHtml::t('common', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger pull-right',
                'data' => [
                'confirm' => FHtml::t('common', 'Are you sure to delete ?'),
                'method' => 'post',
                ],
                ]);} ?>
                <?=  Html::a('<i class="fa fa-undo"></i> ' . FHtml::t('common', 'Cancel'), ['index'], ['class' => 'btn btn-default']) ?>

            </p>
            <?php } ?>
        </div>
    </div>
</div>
   <?php ActiveForm::end(); ?>




