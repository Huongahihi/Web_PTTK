<?php
use common\components\FHtml;
use kartik\form\ActiveForm;
use yii\bootstrap\Html;
use yii\captcha\Captcha;
use backend\assets\CustomAsset;
//$baseUrl = \common\components\FHtml::getBaseUrl($this);
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$baseUrl .= '/frontend/themes';
if (!isset($model))
    $model = new \frontend\models\ContactForm();
?>
<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'title') ?>

<?= $form->field($model, 'content')->textarea(['rows' => 3])->label(FHtml::t('common', 'Message')) ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
</div>

<?php ActiveForm::end(); ?>


