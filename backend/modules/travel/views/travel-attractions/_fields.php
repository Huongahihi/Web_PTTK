<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\widgets\Typeahead;
use common\components\FHtml;
use common\components\Helper;
use common\widgets\FCKEditor;
use kartik\money\MaskMoney;
use yii\widgets\MaskedInput;
use kartik\slider\Slider;
?>

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


       <?=  //name: thumbnail, comment: , dbType: varchar(300), phpType: string, size: 300, allowNull: 1 
        $form->field($model, 'thumbnail')->widget(\common\widgets\FFileInput::className(), ['pluginOptions' => [ 'model' => $model, 'maxFileSize'=> FHtml::config('FILE_SIZE_MAX', 4000000), 'options' => ['accept' => 'image/*', 'multiple' => false], 'showPreview' => true, 'showCaption' => false, 'showRemove' => true,'showUpload' => true, 'pluginOptions' => ['browseLabel' => '', 'removeLabel' => '', 'previewFileType' => 'any', 'uploadUrl' => Url::to([FHtml::config('UPLOAD_FOLDER', '/site/file-upload')])] ]]) ?>

       <?=  //name: image, comment: , dbType: varchar(300), phpType: string, size: 300, allowNull: 1 
        $form->field($model, 'image')->widget(\common\widgets\FFileInput::className(), ['pluginOptions' => [ 'model' => $model, 'maxFileSize'=> FHtml::config('FILE_SIZE_MAX', 4000000), 'options' => ['accept' => 'image/*', 'multiple' => false], 'showPreview' => true, 'showCaption' => false, 'showRemove' => true,'showUpload' => true, 'pluginOptions' => ['browseLabel' => '', 'removeLabel' => '', 'previewFileType' => 'any', 'uploadUrl' => Url::to([FHtml::config('UPLOAD_FOLDER', '/site/file-upload')])] ]]) ?>

       <?=  //name: image_description, comment: , dbType: varchar(2000), phpType: string, size: 2000, allowNull: 1 
        $form->field($model, 'image_description')->textarea(['rows' => 3]) ?>

       <?=  //name: name, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull:  
        $form->field($model, 'name')->textInput() ?>

       <?=  //name: description, comment: , dbType: varchar(1000), phpType: string, size: 1000, allowNull: 1 
        $form->field($model, 'description')->textarea(['rows' => 3]) ?>

       <?=  //name: content, comment: , dbType: text, phpType: string, size: , allowNull: 1 
        $form->field($model, 'content')->widget(FCKEditor::className(), ['options' => ['rows' => 5, 'disabled' => false], 'preset' => 'normal'])  ?>

       <?=  //name: note, comment: editor:text;group:TIPS, dbType: text, phpType: string, size: , allowNull: 1 
        $form->field($model, 'note')->widget(FCKEditor::className(), ['options' => ['rows' => 5, 'disabled' => false], 'preset' => 'normal'])  ?>

       <?=  //name: tel, comment: group:CONTACT, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'tel')->textInput() ?>

       <?=  //name: address, comment: group:CONTACT, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'address')->textInput() ?>

       <?=  //name: website, comment: group:CONTACT, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'website')->textInput() ?>

       <?=  //name: map, comment: group:Location, dbType: varchar(1000), phpType: string, size: 1000, allowNull: 1 
        $form->field($model, 'map')->textarea(['rows' => 3]) ?>

       <?=  //name: rate, comment: group:TIPS, dbType: int(10), phpType: integer, size: 10, allowNull: 1 
        $form->field($model, 'rate')->widget(\kartik\widgets\StarRating::className(), ['pluginOptions' => [ 'stars' => 5, 'min' => 0, 'max' => 5, 'step' => 1, 'showClear' => true, 'showCaption' => true, 'defaultCaption' => '{rating}', 'starCaptions' => [0 => '', 1 => 'Poor', 2 => 'OK', 3 => 'Good', 4 => 'Super', 5 => 'Extreme']]]) ?>

       <?=  //name: score, comment: , dbType: int(10), phpType: integer, size: 10, allowNull: 1 
        $form->field($model, 'score')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
 ?>

       <?=  //name: budget, comment: group:TIPS, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'budget')->textInput() ?>

       <?=  //name: default_duration, comment: group:TIPS, dbType: varchar(100), phpType: string, size: 100, allowNull: 1 
        //$form->field($model, 'default_duration')->dropDownList(FHtml::getComboArray('travel_attractions', 'travel_attractions', 'default_duration', true, 'id', 'name'), ['prompt' => ''])
$form->field($model, 'default_duration')->widget(\kartik\widgets\Select2::className(),['data' => FHtml::getComboArray('travel_attractions', 'travel_attractions', 'default_duration', true, 'id', 'name'), 'options'=>['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

       <?=  //name: sort_order, comment: , dbType: int(11), phpType: integer, size: 11, allowNull: 1 
        $form->field($model, 'sort_order')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
 ?>

       <?=  //name: lat, comment: group:Location, dbType: float, phpType: double, size: , allowNull: 1 
        $form->field($model, 'lat')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: long, comment: group:Location, dbType: float, phpType: double, size: , allowNull: 1 
        $form->field($model, 'long')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' =>  'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

       <?=  //name: open, comment: editor:numeric, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'open')->textInput() ?>

       <?=  //name: close, comment: editor:numeric, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'close')->textInput() ?>

       <?=  //name: street, comment: group:Location, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'street')->textInput() ?>

       <?=  //name: city, comment: group:Location, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'city')->textInput() ?>

       <?=  //name: country, comment: group:Location, dbType: varchar(255), phpType: string, size: 255, allowNull: 1 
        $form->field($model, 'country')->textInput() ?>

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


   <?php \common\widgets\FActiveForm::end(); ?>



