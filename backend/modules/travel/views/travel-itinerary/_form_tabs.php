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
use common\widgets\formfield\FormObjectFile;
use common\widgets\formfield\FormObjectAttributes;
use common\widgets\formfield\FormRelations;

$form_Type = $this->params['activeForm_type'];

$moduleName = 'TravelItinerary';
$moduleTitle = 'Travel Itinerary';
$moduleKey = 'travel-itinerary';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);
$form_layout = FHtml::LAYOUT_NEWLINE;
$form_label_CSS = 'text-default';

/* @var $this yii\web\View */
/* @var $model backend\modules\travel\models\TravelItinerary */
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
    'id' => 'travel-itinerary-form',
    'type' => $form_Type, //ActiveForm::TYPE_HORIZONTAL,ActiveForm::TYPE_VERTICAL,ActiveForm::TYPE_INLINE
    'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_MEDIUM, 'showErrors' => true],
    'staticOnly' => false, // check the Role here
    'readonly' => !$canEdit, // check the Role here
    'enableClientValidation' => false,
    'enableAjaxValidation' => false,
    'options' => [
//'class' => 'form-horizontal',
        'enctype' => 'multipart/form-data'
    ]
]);
?>


<div class="form">
    <div class="row">
        <div class="profile-sidebar col-md-3">
            <div class="portlet light">
                <?= FHtml::showImage($model->image, $modulePath, '100%', 0) ?> <br/><br/>
                <div class="margin-top-20">&nbsp;
                    <h4><b><?= $model->name ?></b></h4>
                </div>
                <div class="margin-top-20">
                </div>
                <div class="margin-top-20">
                    <?= FHtml::showLabel('travel_itinerary.status', 'travel_itinerary', 'status', $model->status) ?>
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
                            <a href="#tab_1_3" data-toggle="tab"><?= FHtml::t('common', 'Attributes') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_4" data-toggle="tab"><?= FHtml::t('common', 'Group') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_5" data-toggle="tab"><?= FHtml::t('common', 'User') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_6" data-toggle="tab"><?= FHtml::t('common', 'Start') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_7" data-toggle="tab"><?= FHtml::t('common', 'End') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_8" data-toggle="tab"><?= FHtml::t('common', 'Sort') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_9" data-toggle="tab"><?= FHtml::t('common', 'Is') ?></a>
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
                                        <?= //name: name, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull:
                                        $form->field($model, 'name')->textInput() ?>

                                        <?= //name: content, comment: , dbType: text, phpType: string, size: , allowNull: 1
                                        $form->field($model, 'content')->widget(FCKEditor::className(), ['options' => ['rows' => 5, 'disabled' => false], 'preset' => 'normal']) ?>

                                        <?= //name: days, comment: , dbType: int(10), phpType: integer, size: 10, allowNull: 1
                                        $form->field($model, 'days')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
                                        ?>

                                        <?= //name: city, comment: , dbType: varchar(100), phpType: string, size: 100, allowNull: 1
                                        //$form->field($model, 'city')->dropDownList(FHtml::getComboArray('travel_itinerary', 'travel_itinerary', 'city', true, 'id', 'name'), ['prompt' => ''])
                                        $form->field($model, 'city')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('travel_itinerary', 'travel_itinerary', 'city', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                                    </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_2">
                                    <div class="col-md-12">
                                        <?= //name: image, comment: , dbType: varchar(300), phpType: string, size: 300, allowNull: 1
                                        $form->field($model, 'image')->widget(\common\widgets\FFileInput::className(), ['pluginOptions' => ['model' => $model, 'maxFileSize' => FHtml::config('FILE_SIZE_MAX', 4000000), 'options' => ['accept' => 'image/*', 'multiple' => false], 'showPreview' => true, 'showCaption' => false, 'showRemove' => true, 'showUpload' => true, 'pluginOptions' => ['browseLabel' => '', 'removeLabel' => '', 'previewFileType' => 'any', 'uploadUrl' => Url::to([FHtml::config('UPLOAD_FOLDER', '/site/file-upload')])]]]) ?>

                                        <?= //name: image_size, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull: 1
                                        $form->field($model, 'image_size')->textInput() ?>

                                        <?= FormObjectFile::widget([
                                            'model' => $model, 'form' => $form,
                                            'canEdit' => $canEdit, 'moduleKey' => $moduleKey, 'modulePath' => 'object-file'
                                        ]) ?>
                                    </div>
                                </div>

                                <div class="tab-pane row" id="tab_1_4">
                                    <div class="col-md-12">
                                        <?= //name: status, comment: data:PLAN,TRAVEL,FINISHED, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
                                        //$form->field($model, 'status')->dropDownList(FHtml::getComboArray('travel_itinerary', 'travel_itinerary', 'status', true, 'id', 'name'), ['prompt' => ''])
                                        $form->field($model, 'status')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('travel_itinerary', 'travel_itinerary', 'status', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                                    </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_5">
                                    <div class="col-md-12">
                                        <?= //name: user_id, comment: lookup:@user;editor:select, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
                                        //$form->field($model, 'user_id')->dropDownList(FHtml::getComboArray('@user', 'user', 'user_id', true, 'id', 'name'), ['prompt' => ''])
                                        $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@user', 'user', 'user_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                                    </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_6">
                                    <div class="col-md-12">
                                        <?= //name: start_date, comment: , dbType: date, phpType: string, size: , allowNull: 1
                                        $form->field($model, 'start_date')->widget(\kartik\widgets\DatePicker::className(), ['pluginOptions' => ['format' => FHtml::config(FHtml::SETTINGS_DATE_FORMAT, 'dd M yyyy'), 'class' => 'form-control', 'autoclose' => true, 'todayHighlight' => true, 'todayBtn' => true]])
                                        ?>

                                    </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_7">
                                    <div class="col-md-12">
                                        <?= //name: end_date, comment: , dbType: date, phpType: string, size: , allowNull: 1
                                        $form->field($model, 'end_date')->widget(\kartik\widgets\DatePicker::className(), ['pluginOptions' => ['format' => FHtml::config(FHtml::SETTINGS_DATE_FORMAT, 'dd M yyyy'), 'class' => 'form-control', 'autoclose' => true, 'todayHighlight' => true, 'todayBtn' => true]])
                                        ?>

                                    </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_8">
                                    <div class="col-md-12">
                                    </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_9">
                                    <div class="col-md-12">
                                        <?= //name: is_top, comment: , dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
                                        //$form->field($model, 'is_top')->widget(\kartik\widgets\SwitchInput::className(), [])
                                        $form->field($model, 'is_top')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size' => 'md', 'threeState' => false]]) ?>

                                        <?= //name: is_system, comment: , dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
                                        //$form->field($model, 'is_system')->widget(\kartik\widgets\SwitchInput::className(), [])
                                        $form->field($model, 'is_system')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size' => 'md', 'threeState' => false]]) ?>

                                    </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_10">
                                    <div class="col-md-12">
                                    </div>
                                </div>

                                <!--<div class="tab-pane row" id="tab_1_p">
    <div class="col-md-12">
                                            </div>
</div>
-->                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <script language="javascript" type="text/javascript">
                function submitForm($saveType) {
                    $('#saveType').val($saveType);
                }
            </script>

            <?php if (Yii::$app->request->isAjax) { ?>

                <input type="hidden" id="saveType" name="saveType">

            <?php } else { ?>
                <input type="hidden" id="saveType" name="saveType">

                <div class="">
                    <?php if ($canEdit) {
                        echo Html::submitButton('<i class="fa fa-save"></i> ' . FHtml::t('common', 'Save'), ['class' => 'btn btn-primary']);
                        echo '  ' . Html::submitButton('<i class="fa fa-copy"></i> ' . FHtml::t('common', 'Save') . ' & ' . FHtml::t('common', 'Clone'), ['class' => 'btn btn-warning', 'onclick' => 'submitForm("clone")']);
                    } ?>
                    <?php if (!$model->isNewRecord && $canDelete) { ?>
                        <?= FHtml::a('<i class="fa fa-trash"></i> ' . FHtml::t('common', 'Delete'), ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger pull-right',
                            'data' => [
                                'confirm' => FHtml::t('common', 'Are you sure to delete ?'),
                                'method' => 'post',
                            ],
                        ]); ?>
                    <?php } ?>
                    <?= ' | ' . FHtml::a('<i class="fa fa-undo"></i> ' . FHtml::t('common', 'Cancel'), ['index'], ['class' => 'btn btn-default']) ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php \common\widgets\FActiveForm::end(); ?>




