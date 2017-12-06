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

$moduleName = 'CmsPortfolio';
$moduleTitle = 'Cms Portfolio';
$moduleKey = 'cms-portfolio';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);
$field_layout = FHtml::config(FHtml::SETTINGS_FIELD_LAYOUT, FHtml::LAYOUT_TABLE);
$form_label_CSS = 'text-default';

/* @var $this yii\web\View */
/* @var $model backend\modules\cms\models\CmsPortfolio */
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
'id' => 'cms-portfolio-form',
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
                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                       <?= FHtml::showModelField($model,'testimonial_id', FHtml::SHOW_LOOKUP, $field_layout, $form_label_CSS, '@cms_testimonial', 'testimonial_id', 'int(11)', '', '') ?>

       <?= FHtml::showModelField($model,'id', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'cms_portfolio', 'id', 'int(11)', '', '') ?>

       <?= FHtml::showModelField($model,'image', FHtml::SHOW_IMAGE, $field_layout, $form_label_CSS, 'cms_portfolio') ?>

       <?= FHtml::showModelField($model,'banner', FHtml::SHOW_IMAGE, $field_layout, $form_label_CSS, 'cms_portfolio') ?>

       <?= FHtml::showModelField($model,'name', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'cms_portfolio') ?>

       <?= FHtml::showModelField($model,'overview', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'cms_portfolio') ?>

       <?= FHtml::showModelField($model,'content', FHtml::SHOW_HTML, $field_layout, $form_label_CSS, 'cms_portfolio', 'content', 'text', '', '') ?>

       <?= FHtml::showModelField($model,'tags', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'cms_portfolio') ?>

       <?= FHtml::showModelField($model,'status', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'cms_portfolio') ?>

       <?= FHtml::showModelField($model,'linkurl', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'cms_portfolio') ?>

       <?= FHtml::showModelField($model,'lang', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'cms_portfolio') ?>

                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                <h3><?= FHtml::t('common', 'Product') ?></h3>
                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                       <?= FHtml::showModelField($model,'product_id', FHtml::SHOW_LOOKUP, $field_layout, $form_label_CSS, '@product', 'product_id', 'int(11)', '', '') ?>

       <?= FHtml::showModelField($model,'product_category_id', FHtml::SHOW_LOOKUP, $field_layout, $form_label_CSS, '@object_category') ?>

                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                <h3><?= FHtml::t('common', 'Is') ?></h3>
                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                       <?= FHtml::showModelField($model,'is_active', FHtml::SHOW_ACTIVE, $field_layout, $form_label_CSS, 'cms_portfolio', 'is_active', 'tinyint(1)', '', '') ?>

       <?= FHtml::showModelField($model,'is_top', FHtml::SHOW_ACTIVE, $field_layout, $form_label_CSS, 'cms_portfolio', 'is_top', 'tinyint(1)', '', '') ?>

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




