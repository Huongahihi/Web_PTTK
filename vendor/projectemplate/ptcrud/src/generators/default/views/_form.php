<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator projectemplate\ptcrud\generators\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}
$file_fields = array(
    'image',
    'icon',
    'logo',
    'avatar',
    'attachment',
);

$datetime_fields = array(
    'created_date',
    'modified_date'
);

$urlParams = $generator->generateUrlParams();


echo "<?php\n";
?>
use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\switchinput\SwitchInput;
use common\widgets\FActiveForm;
use common\components\FHtml;

<?php
$columnsNames= $generator->getColumnNames();
$check = array_intersect($file_fields, $columnsNames);
if(count($check)!=0){ ?>
use kartik\file\FileInput;
<?php } ?>

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<?= "<?php" ?> if (!Yii::$app->request->isAjax) {
$this->title = <?= $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => 'index'];
$this->params['breadcrumbs'][] = ($model->isNewRecord)?<?= $generator->generateString('Create') ?> : <?= $generator->generateString('Update') ?>;
$this->params['mainIcon'] = 'fa fa-list';
$this->params['toolBarActions'] = array(
'linkButton'=>array(),
'button'=>array(),
'dropdown'=>array(),
);
}<?= " ?>" ?>

<?= '<?php if (Yii::$app->request->isAjax) { ?>' . "\n" ?>

<?= "<?php " ?>$form = FActiveForm::begin(<?= "\n" ?>
        [
            'id' => '<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form',
            'type' => FActiveForm::TYPE_GRID,//ActiveForm::TYPE_HORIZONTAL,ActiveForm::TYPE_VERTICAL,ActiveForm::TYPE_INLINE
            'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_MEDIUM, 'showErrors' => true],
            'staticOnly' => false, // check the Role here
            'readonly' => false, // check the Role here
            'options' => [
                //'class' => 'form-horizontal',
            ]
        ]); ?>

<input type="hidden" id="saveType" name="saveType">

<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
    }
} ?>
<?= '   <?php ' ?> FActiveForm::end(); ?><?= "\n\n" ?>

<?= '<?php } else { ?>' . "\n" ?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-9">
            <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">
                <div class="<?= "<?=" ?> $this->params['portletStyle'] <?= "?>" ?>">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                        <span class="caption-subject bold uppercase">
                            <i class="<?= "<?php " ?> echo $this->params['mainIcon'] <?= "?>" ?>"></i>
                            <?= "<?= " ?><?= $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?><?= "?>" ?></span>
                            <span class="caption-helper"><?= "<?=" ?>($model->isNewRecord) ? Yii::t('common', 'title.create') : Yii::t('common', 'title.update')<?= "?>" ?></span>
                        </div>
                        <div class="tools">
                            <a href="#" class="collapse"></a>
                            <a href="#" class="fullscreen"></a>
                        </div>
                        <div class="actions">
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <?= "<?php " ?>$form = FActiveForm::begin([
                        'id' => '<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form',
                        'type' => FActiveForm::TYPE_GRID, //ActiveForm::TYPE_HORIZONTAL,ActiveForm::TYPE_VERTICAL,ActiveForm::TYPE_INLINE
                        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_MEDIUM, 'showErrors' => true],
                        'staticOnly' => false, // check the Role here
                        'readonly' => false, // check the Role here
                        'options' => [
                        //'class' => 'form-horizontal',
                        <?php if(count($check)!=0): ?>
                            <?= "'enctype' => 'multipart/form-data'\n" ?>
                        <?php endif; ?>
                        ]
                        ]);
                        <?= " ?>" ?><?= "\n\n" ?>

                        <div class="form">
                            <div class="form-body">
                                <?php
                                foreach ($generator->getColumnNames() as $attribute) {
                                    if (in_array($attribute, $safeAttributes)) {
                                        if(in_array($attribute, $file_fields)) { ?>
                                            <?= "<?= " ?>$form->field($model, '<?= $attribute ?>_file')->image();<?= "?>\n\n" ?>
                                        <?php } else {
                                            if(!in_array($attribute, $datetime_fields)){
                                                echo "       <?= " . $generator->generateActiveFieldAdvanced($attribute) . " ?>\n\n";
                                            }
                                        }
                                    }
                                } ?>
                            </div>
                            <hr/>
                            <div class="form-actions">
                                <?= "<?= " ?>FHtml::submitButton($model->isNewRecord ? FHtml::t('common', 'Create')
                                : FHtml::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' :
                                'btn btn-primary']) ?>
                                <?= "<?php " ?> if (!$model->isNewRecord) {<?= "?>\n" ?>
                                <?= "<?= " ?> FHtml::a(FHtml::t('common', 'Delete'), ['delete', <?= $urlParams ?>], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                'confirm' => FHtml::t('common', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                                ],
                                ]); ?>
                                <?= "<?= " ?> FHtml::a(FHtml::t('common', 'Cancel'), ['index'], ['class' => 'btn btn-default']) ?>
                                <?= "<?php } else { ?>\n" ?>
                                <?= "<?= " ?> FHtml::a(FHtml::t('common', 'Cancel'), ['index'], ['class' => 'btn btn-default']) ?>
                                <?= '<?php } ?>' ?>
                            </div>
                        </div>
                        <?= "   <?php " ?> FActiveForm::end(); ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row" style="background-color: white; padding: 20px;  margin-bottom: 30px;">
                <?= "<?= " ?>  FHtml::showModelPreview($model) <?= ' ?>' ?>
            </div>
            <?= "<?= " ?>  FHtml::showModelHistory($model) <?= ' ?>' ?>
        </div>
    </div>
</div>
<?= '<?php } ?>' ?>



