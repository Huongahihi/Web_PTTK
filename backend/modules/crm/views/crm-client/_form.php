<?php
/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "CrmClient".
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

$moduleName = 'CrmClient';
$moduleTitle = 'Crm Client';
$moduleKey = 'crm-client';

$currentRole = FHtml::getCurrentRole();
$currentAction = FHtml::currentAction();

$canEdit = FHtml::isInRole('', 'edit', $currentRole, FHtml::getFieldValue($model, ['user_id', 'created_user']));
$canDelete = FHtml::isInRole('', 'delete', $currentRole);
$edit_type = isset($edit_type) ? $edit_type : (FHtml::isViewAction($currentAction) ? FHtml::EDIT_TYPE_VIEW : FHtml::EDIT_TYPE_DEFAULT);
$display_type = isset($display_type) ? $display_type : (FHtml::isViewAction($currentAction) ? FHtml::DISPLAY_TYPE_TABLE : FHtml::DISPLAY_TYPE_DEFAULT);

$ajax = isset($ajax) ? $ajax : (FHtml::isListAction($currentAction) ? false : true);

/* @var $this yii\web\View */
/* @var $model backend\modules\crm\models\CrmClient */
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

<?php if ($ajax) Pjax::begin(['id' => 'crud-datatable'])  ?>

<?php $form = FActiveForm::begin([
'id' => 'crm-client-form',
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


<div class="form">
    <div class="row">

        <div class="col-md-9">
            <div class="portlet light">
                <div class="visible-print">
                    <?= (FHtml::isViewAction($currentAction)) ?  FHtml::showPrintHeader($moduleName) : ''  ?>
                </div>
                <div class="portlet-title tabbable-line hidden-print">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">
                            <?= FHtml::t('common', $moduleTitle) ?> : <?= FHtml::showObjectConfigLink($model, FHtml::FIELDS_NAME) ?>                        </span>
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
                                                </ul>
                </div>
                <div class="portlet-body form">
                    <div class="form">
                        <div class="form-body">
                            <div class="tab-content">
                                <div class="tab-pane active row" id="tab_1_1">
                                    <div class="col-md-12">
                                               <?php echo FFormTable::widget(['model' => $model, 'form' => $form, 'columns' => 1, 'attributes' => [ 
                                        'code' => ['value' => $form->fieldNoLabel($model, 'code')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'name' => ['value' => $form->fieldNoLabel($model, 'name')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'description' => ['value' => $form->fieldNoLabel($model, 'description')->textarea(['rows' => 3]), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'content' => ['value' => $form->fieldNoLabel($model, 'content')->html() , 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'start_date' => ['value' => $form->fieldNoLabel($model, 'start_date')->date(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'mobile' => ['value' => $form->fieldNoLabel($model, 'mobile')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'website' => ['value' => $form->fieldNoLabel($model, 'website')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'address' => ['value' => $form->fieldNoLabel($model, 'address')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'address2' => ['value' => $form->fieldNoLabel($model, 'address2')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'phone' => ['value' => $form->fieldNoLabel($model, 'phone')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'email' => ['value' => $form->fieldNoLabel($model, 'email')->emailInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'fax' => ['value' => $form->fieldNoLabel($model, 'fax')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'company' => ['value' => $form->fieldNoLabel($model, 'company')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'business_license' => ['value' => $form->fieldNoLabel($model, 'business_license')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'tax_code' => ['value' => $form->fieldNoLabel($model, 'tax_code')->selectMany(FHtml::getComboArray('crm_client', 'crm_client', 'tax_code', true, 'id', 'name')), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'note' => ['value' => $form->fieldNoLabel($model, 'note')->html() , 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'tags' => ['value' => $form->fieldNoLabel($model, 'tags')->html(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'sale_user' => ['value' => $form->fieldNoLabel($model, 'sale_user')->select(FHtml::getComboArray('crm_client', 'crm_client', 'sale_user', true, 'id', 'name')), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'ip_address' => ['value' => $form->fieldNoLabel($model, 'ip_address')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],


                                              ]]); ?>


                                        <!--
                                        
                                        -->


                                               <?php echo FFormTable::widget(['model' => $model, 'title' => FHtml::t('common', 'Group'), 'form' => $form, 'columns' => 2, 'attributes' => [ 

                                            'type' => ['value' => $form->fieldNoLabel($model, 'type')->select(FHtml::getComboArray('crm_client', 'crm_client', 'type', true, 'id', 'name')), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'status' => ['value' => $form->fieldNoLabel($model, 'status')->select(FHtml::getComboArray('crm_client', 'crm_client', 'status', true, 'id', 'name')), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],

                                                'is_active' => ['value' => $form->fieldNoLabel($model, 'is_active')->checkbox() , 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],

                                              ]]); ?>



                                                                                           <?php echo FFormTable::widget(['model' => $model, 'title' => FHtml::t('common', 'contact'), 'form' => $form, 'columns' => 2, 'attributes' => [ 

                                            'contact_name' => ['value' => $form->fieldNoLabel($model, 'contact_name')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'contact_title' => ['value' => $form->fieldNoLabel($model, 'contact_title')->select(FHtml::getComboArray('crm_client', 'crm_client', 'contact_title', true, 'id', 'name')), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],


                                                  ]]); ?>

                                                   <?php echo FFormTable::widget(['model' => $model, 'title' => FHtml::t('common', 'payment'), 'form' => $form, 'columns' => 2, 'attributes' => [ 

                                            'payment_info' => ['value' => $form->fieldNoLabel($model, 'payment_info')->textarea(['rows' => 3]), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'payment_term' => ['value' => $form->fieldNoLabel($model, 'payment_term')->textarea(['rows' => 3]), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],


                                                  ]]); ?>

                                                   <?php echo FFormTable::widget(['model' => $model, 'title' => FHtml::t('common', 'LOCATION'), 'form' => $form, 'columns' => 2, 'attributes' => [ 

                                            'zip_code' => ['value' => $form->fieldNoLabel($model, 'zip_code')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'city' => ['value' => $form->fieldNoLabel($model, 'city')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'country' => ['value' => $form->fieldNoLabel($model, 'country')->textInput(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],
'region' => ['value' => $form->fieldNoLabel($model, 'region')->select(FHtml::getComboArray('crm_client', 'crm_client', 'region', true, 'id', 'name')), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],


                                                  ]]); ?>


                                    </div>
                                </div>

                                <div class="tab-pane row" id="tab_1_2">
                                    <div class="col-md-12">
                                               <?php echo FFormTable::widget(['model' => $model, 'title' => '', 'form' => $form, 'columns' => 1, 'attributes' => [ 

                                        'image' => ['value' => $form->fieldNoLabel($model, 'image')->image(), 'columnOptions' => ['colspan' => 1], 'type' => FHtml::INPUT_RAW],

                                              ]]); ?>

                                        <hr/>
                                               <?php echo FormObjectFile::widget(['model' => $model, 'form' => $form, 'canEdit' => $canEdit, 'moduleKey' => $moduleKey, 'modulePath' => $modulePath]); 
                                            ?>


                                    </div>
                                </div>
                                <div class="tab-pane row" id="tab_1_3">
                                    <div class="col-md-12">
                                               <?php echo FormObjectAttributes::widget(['model' => $model, 'form' => $form, 'canEdit' => $canEdit, 'moduleKey' => $moduleKey, 'modulePath' => $modulePath]); 
                                            ?>



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

            
            <?php            $type = FHtml::getFieldValue($model, 'type');
            if (isset($modelMeta) && !empty($type))
                echo FHtml::render('..\\' . $moduleKey . '-' . $type . '\\_form.php', '', ['model' => $modelMeta, 'display_actions' => false, 'canEdit' => $canEdit, 'canDelete' => $canDelete]);
              ?>
            <?= (FHtml::isViewAction($currentAction)) ?  FHtml::showViewButtons($model, $canEdit, $canDelete) : FHtml::showActionsButton($model, $canEdit, $canDelete)  ?>

        </div>
        <div class="profile-sidebar col-md-3 col-xs-12 hidden-print">
            <div class="portlet light">
                <?= FHtml::showModelPreview($model) ?>
            </div>
        </div>
    </div>
</div>
   <?php FActiveForm::end(); ?>
<?php if ($ajax) Pjax::end()  ?>
