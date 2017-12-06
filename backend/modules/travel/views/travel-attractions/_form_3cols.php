<?php
/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "TravelAttractions".
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
use common\widgets\formfield\FormObjectFile;
use common\widgets\formfield\FormObjectAttributes;
use common\widgets\formfield\FormRelations;

$form_Type = $this->params['activeForm_type'];

$moduleName = 'TravelAttractions';
$moduleTitle = 'Travel Attractions';
$moduleKey = 'travel-attractions';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);

/* @var $this yii\web\View */
/* @var $model backend\modules\travel\models\TravelAttractions */
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


<?php $form = \common\widgets\FActiveForm::begin([
'id' => 'travel-attractions-form',
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
                                        <?= FHtml::showImage($model->image, $modulePath, '100%', 0)  ?> <br/><br/>
 <?= FHtml::showImage($model->thumbnail, $modulePath, '100%', 0)  ?>
<div class="margin-top-20">&nbsp;
                        <h4><b><?= $model->name  ?></b></h4>
                                                        <small class='text-default'><?= $model->description  ?></small>
                    </div>
                    <div class="margin-top-20">
                                            </div>
                    <div class="margin-top-20">
                        <?= FHtml::showLabel('travel_attractions', 'travel_attractions', 'type', $model->type) ?>
<?= FHtml::showLabel('travel_attractions', 'travel_attractions', 'status', $model->status) ?>
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
                         <div class="col-md-4 col-sm-4 col-xs-6"><?= FHtml::showField('Country', $model->country, FHtml::SHOW_NUMBER) ?> </div></div>
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
                                <a href="#tab_1_1" data-toggle="tab"><?= FHtml::t('common', 'Info')?></a>
                            </li>
                            <li>
                                <a href="#tab_1_2" data-toggle="tab"><?= FHtml::t('common', 'Uploads')?></a>
                            </li>
                            <li>
                                <a href="#tab_1_3" data-toggle="tab"><?= FHtml::t('common', 'Attributes')?></a>
                            </li>
                            <li>
                                <a href="#tab_1_4" data-toggle="tab"><?= FHtml::t('common', 'Tours')?></a>
                            </li>         
						</ul>
                    </div>
                    <div class="body">
                        <div class="form">
                            <div class="form-body">
                                <div class="tab-content">
                                    <div class="tab-pane active row" id="tab_1_1">
                                        <div class="col-md-12">
                                                   <?=  //name: name, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull:  
        $form->field($model, 'name')->textInput() ?>

       <?=  //name: content, comment: , dbType: text, phpType: string, size: , allowNull: 1 
        $form->field($model, 'content')->widget(FCKEditor::className(), ['options' => ['rows' => 5, 'disabled' => false], 'preset' => 'normal'])  ?>



                                        </div>
                                    </div>

                                    <div class="tab-pane row" id="tab_1_2">
                                        <div class="col-md-12">
                                                   <?=  //name: thumbnail, comment: , dbType: varchar(300), phpType: string, size: 300, allowNull: 1 
        $form->field($model, 'thumbnail')->widget(\common\widgets\FFileInput::className(), ['pluginOptions' => [ 'model' => $model, 'maxFileSize'=> FHtml::config('FILE_SIZE_MAX', 4000000), 'options' => ['accept' => 'image/*', 'multiple' => false], 'showPreview' => true, 'showCaption' => false, 'showRemove' => true,'showUpload' => true, 'pluginOptions' => ['browseLabel' => '', 'removeLabel' => '', 'previewFileType' => 'any', 'uploadUrl' => Url::to([FHtml::config('UPLOAD_FOLDER', '/site/file-upload')])] ]]) ?>

       <?=  //name: image, comment: , dbType: varchar(300), phpType: string, size: 300, allowNull: 1 
        $form->field($model, 'image')->widget(\common\widgets\FFileInput::className(), ['pluginOptions' => [ 'model' => $model, 'maxFileSize'=> FHtml::config('FILE_SIZE_MAX', 4000000), 'options' => ['accept' => 'image/*', 'multiple' => false], 'showPreview' => true, 'showCaption' => false, 'showRemove' => true,'showUpload' => true, 'pluginOptions' => ['browseLabel' => '', 'removeLabel' => '', 'previewFileType' => 'any', 'uploadUrl' => Url::to([FHtml::config('UPLOAD_FOLDER', '/site/file-upload')])] ]]) ?>

       <?=  //name: image_description, comment: , dbType: varchar(2000), phpType: string, size: 2000, allowNull: 1 
        $form->field($model, 'image_description')->textarea(['rows' => 3])->hint('Hint: Please input as format below <b>credit name:image link</b>') ?>


                                            <?= FormObjectFile::widget( [
                                            'model' => $model, 'form' => $form,
                                            'canEdit' => $canEdit, 'moduleKey' => $moduleKey, 'modulePath' => 'object-file'
                                            ]) ?>
                                        </div>
                                    </div>

                                    <div class="tab-pane row" id="tab_1_3">
                                        <div class="col-md-12">
                                            <?= FormObjectAttributes::widget( [
                                            'model' => $model, 'form' => $form,
                                            'canEdit' => $canEdit, 'moduleKey' => $moduleKey, 'modulePath' => $modulePath
                                            ]) ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane row" id="tab_1_4">
                                        <div class="col-md-12">
                                            <?= FormRelations::widget([
                                                'model' => $model, 'form' => $form,
                                                'field_name' => 'Product', 'object_type' => 'product', 'relation_type' => '',
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


                <div class="portlet light">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', 'TIPS')?></span>
                            </div>
                        </div>
                        <div class="">
                            <div class="tab-content">
                                <div class="tab-pane active row" id="tab_1_1">
                                    <div class="col-md-12">
        <?=  //name: description, comment: , dbType: varchar(1000), phpType: string, size: 1000, allowNull: 1
        $form->field($model, 'description')->textarea(['rows' => 3])->label('Openning hours') ?>

        <?=  //name: note, comment: editor:text;group:TIPS, dbType: text, phpType: string, size: , allowNull: 1
        $form->field($model, 'note')->textarea(['rows' => 3])->label('Admission')  ?>

       <?=  //name: score, comment: , dbType: int(10), phpType: integer, size: 10, allowNull: 1
       $form->field($model, 'score')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
       ?>

       <?=  //name: open, comment: editor:numeric, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
       $form->field($model, 'open')->textInput() ?>

       <?=  //name: close, comment: editor:numeric, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
       $form->field($model, 'close')->textInput() ?>

       <?=  //name: rate, comment: group:TIPS, dbType: int(10), phpType: integer, size: 10, allowNull: 1 
        $form->field($model, 'rate')->widget(\kartik\widgets\StarRating::className(), ['pluginOptions' => [ 'stars' => 5, 'min' => 0, 'max' => 5, 'step' => 1, 'showClear' => true, 'showCaption' => true, 'defaultCaption' => '{rating}', 'starCaptions' => [0 => '', 1 => 'Poor', 2 => 'OK', 3 => 'Good', 4 => 'Super', 5 => 'Extreme']]]) ?>

       <?=  //name: budget, comment: group:TIPS, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'budget')->textInput() ?>

       <?=  //name: default_duration, comment: group:TIPS, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'default_duration')->dropDownList(FHtml::getComboArray('travel_attractions', 'travel_attractions', 'default_duration', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'default_duration')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('travel_attractions', 'travel_attractions', 'default_duration', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="portlet light">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', 'CONTACT')?></span>
                            </div>
                        </div>
                        <div class="">
                            <div class="tab-content">
                                <div class="tab-pane active row" id="tab_1_1">
                                    <div class="col-md-12">
                                               <?=  //name: tel, comment: group:CONTACT, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'tel')->textInput() ?>

       <?=  //name: address, comment: group:CONTACT, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'address')->textInput() ?>

       <?=  //name: website, comment: group:CONTACT, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'website')->textInput() ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="portlet light">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', 'Location')?></span>
                            </div>
                        </div>
                        <div class="">
                            <div class="tab-content">
                                <div class="tab-pane active row" id="tab_1_1">
                                    <div class="col-md-12">
                                               <?=  //name: map, comment: group:Location, dbType: varchar(1000), phpType: string, size: 1000, allowNull: 1 
        $form->field($model, 'map')->textarea(['rows' => 3]) ?>

       <?=  //name: lat, comment: group:Location, dbType: float, phpType: double, size: , allowNull: 1 
        $form->field($model, 'lat')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: long, comment: group:Location, dbType: float, phpType: double, size: , allowNull: 1 
        $form->field($model, 'long')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: street, comment: group:Location, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'street')->textInput() ?>

       <?=  //name: city, comment: group:Location, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
          $form->field($model, 'city')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('city', 'travel', 'city', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: country, comment: group:Location, dbType: varchar(255), phpType: string, size: 255, allowNull: 1
       $form->field($model, 'country')->textInput() ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="portlet light">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase"><?= FHtml::t('common', 'GROUP')?></span>
                            </div>
                        </div>
                        <div class="">
                            <div class="tab-content">
                                <div class="tab-pane active row" id="tab_1_1">
                                    <div class="col-md-12">
        <?=  //name: category_id, comment: multiple:false;data:Adventure,Family,Leisure,Entertainment,Food,Historical,Outdoors,Museums,Art,Must_See, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
        //$form->field($model, 'category_id_array')->dropDownList(FHtml::getComboArray('travel_attractions', 'travel_attractions', 'category_id', true, 'id', 'name'), ['prompt' => ''])
        $form->field($model, 'category_id_array')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('travel_attractions', 'travel_attractions', 'category_id', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                                        <?=  //name: type, comment: group:GROUP;data:LOCATION,RESTAURANT,HOTEL, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
        //$form->field($model, 'type')->dropDownList(FHtml::getComboArray('travel_attractions', 'travel_attractions', 'type', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'type')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('travel_attractions', 'travel_attractions', 'type', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: status, comment: group:GROUP, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'status')->dropDownList(FHtml::getComboArray('travel_attractions', 'travel_attractions', 'status', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'status')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('travel_attractions', 'travel_attractions', 'status', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: is_active, comment: group:GROUP, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        //$form->field($model, 'is_active')->widget(\kartik\widgets\SwitchInput::className(), [])
$form->field($model, 'is_active')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size'=>'md', 'threeState'=>false]]) ?>

       <?=  //name: is_new, comment: group:GROUP, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        //$form->field($model, 'is_new')->widget(\kartik\widgets\SwitchInput::className(), [])
$form->field($model, 'is_new')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size'=>'md', 'threeState'=>false]]) ?>

       <?=  //name: is_hot, comment: group:GROUP, dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1 
        //$form->field($model, 'is_hot')->widget(\kartik\widgets\SwitchInput::className(), [])
$form->field($model, 'is_hot')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size'=>'md', 'threeState'=>false]]) ?>


                                    </div>
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
                    <?php if ($canEdit) { echo                     Html::submitButton('<i class="fa fa-save"></i> ' . FHtml::t('common', 'Save'), ['class' => 'btn btn-primary']);
                    echo '  ' . Html::submitButton('<i class="fa fa-copy"></i> ' . FHtml::t('common', 'Save') . ' & ' . FHtml::t('common', 'Clone'), ['class' => 'btn btn-warning', 'onclick' => 'submitForm("clone")']); } ?>
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
   <?php \common\widgets\FActiveForm::end(); ?>




