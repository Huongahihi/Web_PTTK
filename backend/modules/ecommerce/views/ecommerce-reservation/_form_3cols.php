<?php
/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "EcommerceReservation".
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

$form_Type = $this->params['activeForm_type'];

$moduleName = 'EcommerceReservation';
$moduleTitle = 'Ecommerce Reservation';
$moduleKey = 'ecommerce-reservation';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);

/* @var $this yii\web\View */
/* @var $model backend\modules\ecommerce\models\EcommerceReservation */
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


<?php $form = FActiveForm::begin([
    'id' => 'ecommerce-reservation-form',
    'type' => $form_Type, //ActiveForm::TYPE_HORIZONTAL,ActiveForm::TYPE_VERTICAL,ActiveForm::TYPE_INLINE
    'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_MEDIUM, 'showErrors' => true],
    'staticOnly' => false, // check the Role here
    'readonly' => !$canEdit, // check the Role here
    'enableClientValidation' => true,
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
                <div class="margin-top-20">&nbsp;
                </div>
                <div class="margin-top-20">
                </div>
                <div class="margin-top-20">
                    <?= FHtml::showLabel('ecommerce_reservation', 'ecommerce_reservation', 'status', $model->status) ?>
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
                            <?= FHtml::showField('Created', FHtml::getFieldValue($model, 'created_date'), FHtml::SHOW_DATE) ?>                                </div>
                        <div class="col-md-6">
                            <?= FHtml::showField(' ', $model->created_user, FHtml::SHOW_USER) ?>                                </div>
                    </div>
                    <div class="row list-separated profile-stat">
                        <div class="col-md-6">
                            <?= FHtml::showField('Modified', $model->modified_date, FHtml::SHOW_DATE) ?>                                </div>
                        <div class="col-md-6">
                            <?= FHtml::showField(' ', $model->modified_user, FHtml::SHOW_USER) ?>                                </div>
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
                            <a href="#tab_1_1" data-toggle="tab"><?= FHtml::t('common', 'Info') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_2" data-toggle="tab"><?= FHtml::t('common', 'Uploads') ?></a>
                        </li>
                        <li>
                            <a href="#tab_1_3" data-toggle="tab"><?= FHtml::t('common', 'Attributes') ?></a>
                        </li>
                    </ul>
                </div>
                <div class="portlet-body form">
                    <div class="form">
                        <div class="form-body">
                            <div class="tab-content">
                                <div class="tab-pane active row" id="tab_1_1">
                                    <div class="col-md-12">
                                        <?= //name: buyer_id, comment: group:BUYER;lookup:@user;, dbType: int(11), phpType: integer, size: 11, allowNull:
                                        //$form->field($model, 'buyer_id')->dropDownList(FHtml::getComboArray('@user', 'user', 'buyer_id', true, 'id', 'name'), ['prompt' => ''])
                                        $form->field($model, 'buyer_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@user', 'user', 'buyer_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                                        <?= //name: buyer_name, comment: group:BUYER;, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
                                        $form->field($model, 'buyer_name')->textInput() ?>

                                        <?= //name: buyer_note, comment: group:BUYER;, dbType: text, phpType: string, size: , allowNull: 1
                                        $form->field($model, 'buyer_note')->textarea(['rows' => 3]) ?>

                                        <?= //name: buyer_confirm, comment: group:BUYER;, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
                                        //$form->field($model, 'buyer_confirm')->widget(\kartik\widgets\SwitchInput::className(), [])
                                        $form->field($model, 'buyer_confirm')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size' => 'md', 'threeState' => false]]) ?>

                                        <?= //name: buyer_visible, comment: group:BUYER;, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
                                        //$form->field($model, 'buyer_visible')->widget(\kartik\widgets\SwitchInput::className(), [])
                                        $form->field($model, 'buyer_visible')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size' => 'md', 'threeState' => false]]) ?>

                                    </div>
                                </div>

                                <div class="tab-pane row" id="tab_1_2">
                                    <div class="col-md-12">

                                        <?= FormObjectFile::widget([
                                            'model' => $model, 'form' => $form,
                                            'canEdit' => $canEdit, 'moduleKey' => $moduleKey, 'modulePath' => 'object-file'
                                        ]) ?>
                                    </div>
                                </div>

                                <div class="tab-pane row" id="tab_1_3">
                                    <div class="col-md-12">
                                        <?= FormObjectAttributes::widget([
                                            'model' => $model, 'form' => $form,
                                            'canEdit' => $canEdit, 'moduleKey' => $moduleKey, 'modulePath' => $modulePath
                                        ]) ?>
                                    </div>
                                </div>

                                <!--<div class="tab-pane row" id="tab_1_p">
                                    <div class="col-md-12">
                                                                                </div>
                                </div>
                                -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!--                <div class="portlet light">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', 'Grouping') ?></span>
                        </div>
                        <div class="tools pull-right">
                            <a href="#" class="fullscreen"></a>
                            <a href="#" class="collapse"></a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="tab-content">
                            <div class="tab-pane active row" id="tab_1_1">
                                <div class="col-md-12">
                                                                    </div>
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
                            <span class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', 'Pricing') ?></span>
                        </div>
                        <div class="tools pull-right">
                            <a href="#" class="fullscreen"></a>
                            <a href="#" class="collapse"></a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="tab-content">
                            <div class="tab-pane active row" id="tab_1_1">
                                <div class="col-md-12">
                                    
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
                        <span class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', 'PROVIDER') ?></span>
                    </div>
                    <div class="tools pull-right">
                        <a href="#" class="fullscreen"></a>
                        <a href="#" class="collapse"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="tab-content">
                        <div class="tab-pane active row" id="tab_1_1">
                            <div class="col-md-12">
                                <?= //name: seller_id, comment: group:PROVIDER;lookup:@user, dbType: int(11), phpType: integer, size: 11, allowNull:
                                //$form->field($model, 'seller_id')->dropDownList(FHtml::getComboArray('@user', 'user', 'seller_id', true, 'id', 'name'), ['prompt' => ''])
                                $form->field($model, 'seller_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@user', 'user', 'seller_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                                <?= //name: seller_name, comment: group:PROVIDER;, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
                                $form->field($model, 'seller_name')->textInput() ?>

                                <?= //name: seller_note, comment: group:PROVIDER;, dbType: text, phpType: string, size: , allowNull: 1
                                $form->field($model, 'seller_note')->textarea(['rows' => 3]) ?>

                                <?= //name: seller_confirm, comment: group:PROVIDER;, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
                                //$form->field($model, 'seller_confirm')->widget(\kartik\widgets\SwitchInput::className(), [])
                                $form->field($model, 'seller_confirm')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size' => 'md', 'threeState' => false]]) ?>

                                <?= //name: seller_visible, comment: group:PROVIDER;, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
                                //$form->field($model, 'seller_visible')->widget(\kartik\widgets\SwitchInput::className(), [])
                                $form->field($model, 'seller_visible')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size' => 'md', 'threeState' => false]]) ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="portlet light">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', 'DEAL') ?></span>
                    </div>
                    <div class="tools pull-right">
                        <a href="#" class="fullscreen"></a>
                        <a href="#" class="collapse"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="tab-content">
                        <div class="tab-pane active row" id="tab_1_1">
                            <div class="col-md-12">
                                <?= //name: deal_id, comment: group:DEAL;, dbType: int(11), phpType: integer, size: 11, allowNull: 1
                                //$form->field($model, 'deal_id')->dropDownList(FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'deal_id', true, 'id', 'name'), ['prompt' => ''])
                                $form->field($model, 'deal_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'deal_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                                <?= //name: deal_name, comment: group:DEAL;, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
                                $form->field($model, 'deal_name')->textInput() ?>

                                <?= //name: price, comment: group:DEAL;, dbType: float(10,2), phpType: double, size: 10, allowNull: 1
                                $form->field($model, 'price')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

                                <?= //name: time, comment: group:DEAL;, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
                                $form->field($model, 'time')->widget(\kartik\widgets\DatePicker::className(), ['pluginOptions' => ['format' => FHtml::config(FHtml::SETTINGS_DATE_FORMAT, 'dd M yyyy'), 'class' => 'form-control', 'autoclose' => true, 'todayHighlight' => true, 'todayBtn' => true]])
                                ?>

                                <?= //name: payment_method, comment: group:DEAL;data:point,credit,cash,paypal,cod, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
                                //$form->field($model, 'payment_method')->dropDownList(FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'payment_method', true, 'id', 'name'), ['prompt' => ''])
                                $form->field($model, 'payment_method')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'payment_method', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                                <?= //name: payment_status, comment: group:DEAL;data:0:Unpaid,1:Paid, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
                                //$form->field($model, 'payment_status')->dropDownList(FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'payment_status', true, 'id', 'name'), ['prompt' => ''])
                                $form->field($model, 'payment_status')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'payment_status', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                                <?= //name: status, comment: group:DEAL;data:pending,approved,rejected,processing,finish,fail, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
                                //$form->field($model, 'status')->dropDownList(FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'status', true, 'id', 'name'), ['prompt' => ''])
                                $form->field($model, 'status')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('ecommerce_reservation', 'ecommerce_reservation', 'status', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                                <?= //name: is_active, comment: group:DEAL;, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
                                //$form->field($model, 'is_active')->widget(\kartik\widgets\SwitchInput::className(), [])
                                $form->field($model, 'is_active')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size' => 'md', 'threeState' => false]]) ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php $type = FHtml::getFieldValue($model, 'type');
            if (isset($modelMeta) && !empty($type))
                echo FHtml::render('..\\' . $moduleKey . '-' . $type . '\\_form.php', '', ['model' => $modelMeta, 'display_actions' => false, 'canEdit' => $canEdit, 'canDelete' => $canDelete]);
            ?>
            <?php $display_actions = !isset($display_actions) ? true : false;
            if ($display_actions)
                echo $this->render('_detail_actions', ['model' => $model, 'canEdit' => $canEdit, 'canDelete' => $canDelete]);
            ?>
        </div>
    </div>
</div>
<?php FActiveForm::end(); ?>
