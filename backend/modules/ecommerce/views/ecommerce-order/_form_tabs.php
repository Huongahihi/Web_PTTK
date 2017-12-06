<?php
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

$moduleName = 'EcommerceOrder';
$moduleTitle = 'Ecommerce Order';
$moduleKey = 'ecommerce-order';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);
$form_layout = FHtml::LAYOUT_NEWLINE;
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


<?php $form = FActiveForm::begin([
'id' => 'ecommerce-order-form',
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
                    <?= FHtml::showLabel('ecommerce_order.tax', 'ecommerce_order', 'tax', $model->tax) ?>
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
                        <li>
                            <a href="#tab_1_2" data-toggle="tab"><?= FHtml::t('common', 'Uploads')?></a>
                        </li>
                        <li>
                            <a href="#tab_1_3" data-toggle="tab"><?= FHtml::t('common', 'Attributes')?></a>
                        </li>
                        <li>
                            <a href="#tab_1_4" data-toggle="tab"><?= FHtml::t('common', 'Group')?></a>
                        </li><li>
                                <a href="#tab_1_5" data-toggle="tab"><?= FHtml::t('common', 'Billing')?></a>
                                </li>
                            <li>
                                <a href="#tab_1_6" data-toggle="tab"><?= FHtml::t('common', 'Shipping')?></a>
                                </li>
                            <li>
                                <a href="#tab_1_7" data-toggle="tab"><?= FHtml::t('common', 'Order')?></a>
                                </li>
                            <li>
                                <a href="#tab_1_8" data-toggle="tab"><?= FHtml::t('common', 'Payment')?></a>
                                </li>
                            <li>
                                <a href="#tab_1_9" data-toggle="tab"><?= FHtml::t('common', 'Application')?></a>
                                </li>
                             </ul>
                </div>
                <div class="body">
                    <div class="form">
                        <div class="form-body">
                            <div class="tab-content">
                                <div class="tab-pane active row" id="tab_1_1">
                                    <div class="col-md-12">
                                               <?=  //name: user_id, comment: lookup:@user, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'user_id')->dropDownList(FHtml::getComboArray('@user', 'user', 'user_id', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'user_id')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('@user', 'user', 'user_id', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                                    </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_2">
                                    <div class="col-md-12">
                                                                                <?= FormObjectFile::widget( [
                                        'model' => $model, 'form' => $form,
                                        'canEdit' => $canEdit, 'moduleKey' => $moduleKey, 'modulePath' => 'object-file'
                                        ]) ?>
                                    </div>
                                </div>

                                <div class="tab-pane row" id="tab_1_4">
                                    <div class="col-md-12">
                                                                            </div>
                                </div>
                                                                        <div class="tab-pane row" id="tab_1_5">
                                            <div class="col-md-12">
                                                       <?=  //name: billing_name, comment: group:Billing, dbType: varchar(255), phpType: string, size: 255, allowNull:  
        $form->field($model, 'billing_name')->textInput() ?>

       <?=  //name: billing_phone, comment: group:Billing, dbType: varchar(255), phpType: string, size: 255, allowNull:  
        $form->field($model, 'billing_phone')->textInput() ?>

       <?=  //name: billing_address, comment: group:Billing, dbType: varchar(1000), phpType: string, size: 1000, allowNull:  
        $form->field($model, 'billing_address')->textarea(['rows' => 3]) ?>

       <?=  //name: billing_email, comment: group:Billing, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'billing_email')->input('email') ?>

       <?=  //name: billing_postcode, comment: group:Billing, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'billing_postcode')->textInput() ?>

       <?=  //name: billing_city, comment: group:Billing, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'billing_city')->textInput() ?>

       <?=  //name: billing_state, comment: group:Billing, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'billing_state')->textInput() ?>

       <?=  //name: billing_country, comment: group:Billing, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'billing_country')->textInput() ?>

                                            </div>
                                        </div>
                                                                                <div class="tab-pane row" id="tab_1_6">
                                            <div class="col-md-12">
                                                       <?=  //name: shipping_address, comment: group:Shipping, dbType: varchar(2000), phpType: string, size: 2000, allowNull: 1 
        $form->field($model, 'shipping_address')->textarea(['rows' => 3]) ?>

       <?=  //name: shipping_time, comment: group:Shipping, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'shipping_time')->widget(\kartik\widgets\DatePicker::className(), ['pluginOptions' => ['format' => FHtml::config(FHtml::SETTINGS_DATE_FORMAT, 'dd M yyyy'), 'class' => 'form-control', 'autoclose' => true, 'todayHighlight' => true, 'todayBtn' => true ]])
 ?>

       <?=  //name: shipping_note, comment: group:Shipping, dbType: varchar(2000), phpType: string, size: 2000, allowNull: 1 
        $form->field($model, 'shipping_note')->textarea(['rows' => 3]) ?>

                                            </div>
                                        </div>
                                                                                <div class="tab-pane row" id="tab_1_7">
                                            <div class="col-md-12">
                                                       <?=  //name: order_date, comment: group:Order, dbType: varchar(200), phpType: string, size: 200, allowNull: 1 
        $form->field($model, 'order_date')->widget(\kartik\widgets\DatePicker::className(), ['pluginOptions' => ['format' => FHtml::config(FHtml::SETTINGS_DATE_FORMAT, 'dd M yyyy'), 'class' => 'form-control', 'autoclose' => true, 'todayHighlight' => true, 'todayBtn' => true ]])
 ?>

       <?=  //name: order_detail, comment: group:Order, dbType: text, phpType: string, size: , allowNull: 1 
        $form->field($model, 'order_detail')->textarea(['rows' => 3]) ?>

       <?=  //name: order_note, comment: group:Order, dbType: text, phpType: string, size: , allowNull: 1 
        $form->field($model, 'order_note')->textarea(['rows' => 3]) ?>

       <?=  //name: order_type, comment: group:Order;data:web,mobile,call,direct,agency, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'order_type')->dropDownList(FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'order_type', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'order_type')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'order_type', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: order_status, comment: group:Order;data:pending,approved,processing,finish,done,fail, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'order_status')->dropDownList(FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'order_status', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'order_status')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'order_status', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: is_active, comment: group:Order, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        //$form->field($model, 'is_active')->widget(\kartik\widgets\SwitchInput::className(), [])
$form->field($model, 'is_active')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size'=>'md', 'threeState'=>false]]) ?>

                                            </div>
                                        </div>
                                                                                <div class="tab-pane row" id="tab_1_8">
                                            <div class="col-md-12">
                                                       <?=  //name: price_total, comment: group:Payment, dbType: float(10,2), phpType: double, size: 10, allowNull: 1 
        $form->field($model, 'price_total')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: tax, comment: group:Payment, dbType: varchar(500), phpType: string, size: 500, allowNull: 1 
        //$form->field($model, 'tax')->dropDownList(FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'tax', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'tax')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'tax', true, 'id', 'name'), 'options'=>['multiple' => true], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: price_tax, comment: group:Payment, dbType: float(10,2), phpType: double, size: 10, allowNull: 1 
        $form->field($model, 'price_tax')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: promotion_code, comment: group:Payment, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'promotion_code')->textInput() ?>

       <?=  //name: price_discount, comment: group:Payment, dbType: float(10,0), phpType: double, size: 10, allowNull: 1 
        $form->field($model, 'price_discount')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: price_shipping, comment: group:Payment, dbType: float(10,2), phpType: double, size: 10, allowNull: 1 
        $form->field($model, 'price_shipping')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: price_final, comment: group:Payment, dbType: float, phpType: double, size: , allowNull: 1 
        $form->field($model, 'price_final')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: payment_method, comment: group:Payment;data:cash,point,credit,cod,bank, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'payment_method')->dropDownList(FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'payment_method', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'payment_method')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'payment_method', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: payment_status, comment: group:Payment;data:0:unpaid,1:paid, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'payment_status')->dropDownList(FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'payment_status', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'payment_status')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('ecommerce_order', 'ecommerce_order', 'payment_status', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                                            </div>
                                        </div>
                                                                                <div class="tab-pane row" id="tab_1_9">
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
                <?php if ($canEdit) { echo                 FHtml::submitButton('<i class="fa fa-save"></i> ' . FHtml::t('common', 'Save'), ['class' => 'btn btn-primary']);
                echo '  ' . FHtml::submitButton('<i class="fa fa-copy"></i> ' . FHtml::t('common', 'Save') . ' & ' . FFHtml::t('common', 'Clone'), ['class' => 'btn btn-warning', 'onclick' => 'submitForm("clone")']); } ?>
                <?php  if (!$model->isNewRecord && $canDelete) {?>
                <?=  FHtml::a('<i class="fa fa-trash"></i> ' . FHtml::t('common', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger pull-right',
                'data' => [
                'confirm' => FHtml::t('common', 'Are you sure to delete ?'),
                'method' => 'post',
                ],
                ]); ?>
                <?php }  ?>
                <?=  ' | ' . FHtml::a('<i class="fa fa-undo"></i> ' . FHtml::t('common', 'Cancel'), ['index'], ['class' => 'btn btn-default']) ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
   <?php FActiveForm::end(); ?>




