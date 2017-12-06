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

$moduleName = 'TravelAttractions';
$moduleTitle = 'Travel Attractions';
$moduleKey = 'travel-attractions';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);
$field_layout = FHtml::config(FHtml::SETTINGS_FIELD_LAYOUT, FHtml::LAYOUT_TABLE);
$form_label_CSS = 'text-default';

/* @var $this yii\web\View */
/* @var $model backend\modules\travel\models\TravelAttractions */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if (!Yii::$app->request->isAjax) {
    $this->title = FHtml::t($moduleTitle);
    $this->params['mainIcon'] = 'fa fa-list';
    $this->params['toolBarActions'] = array(
        'linkButton' => array(),
        'button' => array(),
        'dropdown' => array(),
    );
} ?>


<?php $form = \common\widgets\FActiveForm::begin([
    'id' => 'travel-attractions-form',
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
                <?= FHtml::showImage($model->image, $modulePath, '100%', 0) ?> <br/><br/>
                <?= FHtml::showImage($model->thumbnail, $modulePath, '100%', 0) ?>
                <div class="margin-top-20">
                    <h4><b><?= $model->name ?></b></h4>
                    <small class='text-default'><?= $model->description ?></small>
                </div>
                <div class="margin-top-20">
                </div>
                <div class="margin-top-20">
                    <?= FHtml::showLabel('travel-attractions.type', 'travel-attractions', 'type', $model->type) ?>
                    <?= FHtml::showLabel('travel-attractions.status', 'travel-attractions', 'status', $model->status) ?>
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
                        <span
                            class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', $moduleTitle) ?></span>
                    </div>
                    <div class="tools pull-right">
                        <a href="#" class="fullscreen"></a>
                        <a href="#" class="collapse"></a>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab"><?= FHtml::t('common', 'Info') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_2" data-toggle="tab"><?= FHtml::t('common', 'Uploads') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_4" data-toggle="tab"><?= FHtml::t('common', 'TIPS') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_5" data-toggle="tab"><?= FHtml::t('common', 'CONTACT') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_6" data-toggle="tab"><?= FHtml::t('common', 'Location') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_7" data-toggle="tab"><?= FHtml::t('common', 'Sort') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_8" data-toggle="tab"><?= FHtml::t('common', 'Category') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_9" data-toggle="tab"><?= FHtml::t('common', 'GROUP') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_10" data-toggle="tab"><?= FHtml::t('common', 'Application') ?></a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="form">
                        <div class="form-body">
                            <div class="tab-content">
                                <div class="tab-pane active row" id="tab_1_1">
                                    <div class="col-md-12">
                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                                               <?= FHtml::showModelField($model, 'name', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'travel_attractions', 'name', 'varchar(255)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'description', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'travel_attractions', 'description', 'varchar(1000)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'content', FHtml::SHOW_HTML, $field_layout, $form_label_CSS, 'travel_attractions', 'content', 'text', '', '') ?>

                                        <?= FHtml::showModelField($model, 'score', FHtml::SHOW_NUMBER, $field_layout, $form_label_CSS, 'travel_attractions', 'score', 'int(10)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'open', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'travel_attractions', 'open', 'varchar(255)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'close', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'travel_attractions', 'close', 'varchar(255)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'country', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'travel_attractions', 'country', 'varchar(255)', '', '') ?>

                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                    </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_2">
                                    <div class="col-md-12">
                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                                               <?= FHtml::showModelField($model, 'thumbnail', FHtml::SHOW_IMAGE, $field_layout, $form_label_CSS, 'travel_attractions', 'thumbnail', 'varchar(300)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'image', FHtml::SHOW_IMAGE, $field_layout, $form_label_CSS, 'travel_attractions', 'image', 'varchar(300)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'image_description', FHtml::SHOW_IMAGE, $field_layout, $form_label_CSS, 'travel_attractions', 'image_description', 'varchar(2000)', '', '') ?>

                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                    </div>
                                </div>
                                <!--<div class="tab-pane row" id="tab_1_3">
                                    <div class="col-md-12">
                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                                                                                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                    </div>
                                </div>
                                -->
                                <div class="tab-pane row" id="tab_1_4">
                                    <div class="col-md-12">
                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                                                       <?= FHtml::showModelField($model, 'note', FHtml::SHOW_HTML, $field_layout, $form_label_CSS, 'travel_attractions', 'note', 'text', '', '') ?>

                                        <?= FHtml::showModelField($model, 'rate', FHtml::SHOW_RATE, $field_layout, $form_label_CSS, 'travel_attractions', 'rate', 'int(10)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'budget', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'travel_attractions', 'budget', 'varchar(255)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'default_duration', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'travel_attractions', 'default_duration', 'varchar(100)', '', '') ?>

                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                            </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_5">
                                    <div class="col-md-12">
                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                                                       <?= FHtml::showModelField($model, 'tel', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'travel_attractions', 'tel', 'varchar(255)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'address', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'travel_attractions', 'address', 'varchar(255)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'website', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'travel_attractions', 'website', 'varchar(255)', '', '') ?>

                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                            </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_6">
                                    <div class="col-md-12">
                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                                                       <?= FHtml::showModelField($model, 'map', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'travel_attractions', 'map', 'varchar(1000)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'lat', FHtml::SHOW_DECIMAL, $field_layout, $form_label_CSS, 'travel_attractions', 'lat', 'float', '', '') ?>

                                        <?= FHtml::showModelField($model, 'long', FHtml::SHOW_DECIMAL, $field_layout, $form_label_CSS, 'travel_attractions', 'long', 'float', '', '') ?>

                                        <?= FHtml::showModelField($model, 'street', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'travel_attractions', 'street', 'varchar(255)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'city', FHtml::SHOW_TEXT, $field_layout, $form_label_CSS, 'travel_attractions', 'city', 'varchar(255)', '', '') ?>

                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                            </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_7">
                                    <div class="col-md-12">
                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                                                                                                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                            </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_8">
                                    <div class="col-md-12">
                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                                                       <?= FHtml::showModelField($model, 'category_id', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'travel_attractions', 'category_id', 'varchar(100)', '', '') ?>

                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                            </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_9">
                                    <div class="col-md-12">
                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                                                       <?= FHtml::showModelField($model, 'type', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'travel_attractions', 'type', 'varchar(100)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'status', FHtml::SHOW_LABEL, $field_layout, $form_label_CSS, 'travel_attractions', 'status', 'varchar(100)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'is_active', FHtml::SHOW_ACTIVE, $field_layout, $form_label_CSS, 'travel_attractions', 'is_active', 'tinyint(1)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'is_new', FHtml::SHOW_ACTIVE, $field_layout, $form_label_CSS, 'travel_attractions', 'is_new', 'tinyint(1)', '', '') ?>

                                        <?= FHtml::showModelField($model, 'is_hot', FHtml::SHOW_ACTIVE, $field_layout, $form_label_CSS, 'travel_attractions', 'is_hot', 'tinyint(1)', '', '') ?>

                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                            </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_10">
                                    <div class="col-md-12">
                                        <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '<table class="table table-bordered">' : '' ?>                                                                                                <?= ($field_layout == FHtml::LAYOUT_TABLE) ? '</table>' : '' ?>                                            </div>
                                </div>
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
                    <?php if (FHtml::isInRole('', 'update', $currentRole)) {
                        FHtml::a('<i class="fa fa-pencil"></i> ' . FHtml::t('common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
                    } ?>
                    <?php if (FHtml::isInRole('', 'delete', $currentRole)) {
                        FHtml::a('<i class="fa fa-trash"></i> ' . FHtml::t('common', 'Delete'), ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger pull-right',
                            'data' => [
                                'confirm' => FHtml::t('common', 'Are you sure to delete ?'),
                                'method' => 'post',
                            ],
                        ]);
                    } ?>
                    <?= FHtml::a('<i class="fa fa-undo"></i> ' . FHtml::t('common', 'Cancel'), ['index'], ['class' => 'btn btn-default']) ?>

                </p>
            <?php } ?>
        </div>
    </div>
</div>
<?php \common\widgets\FActiveForm::end(); ?>




