<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\widgets\Typeahead;
use common\components\FHtml;
use kartik\checkbox\CheckboxX;
use common\widgets\FCKEditor;
use kartik\money\MaskMoney;
use yii\widgets\MaskedInput;
use kartik\slider\Slider;


$form_Type = $this->params['activeForm_type'];
$moduleName = 'TravelScores';
$moduleTitle = 'Travel Scores';
$moduleKey = 'travel-scores';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);

/* @var $this yii\web\View */
/* @var $model backend\modules\travel\models\TravelScores */
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
<?php if (Yii::$app->request->isAjax) { ?>

    <?php $form = \common\widgets\FActiveForm::begin(
        ['id' => 'travel-scores-form',
            'type' => $form_Type, //ActiveForm::TYPE_HORIZONTAL,ActiveForm::TYPE_VERTICAL,ActiveForm::TYPE_INLINE
            'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_MEDIUM, 'showErrors' => true],
            'staticOnly' => false, // check the Role here
            'readonly' => false, // check the Role here
            'options' => [//'class' => 'form-horizontal',
//'enctype' => 'multipart/form-data'
            ]]); ?>

    <input type="hidden" id="saveType" name="saveType">

    <?= //name: id, comment: , dbType: bigint(20), phpType: string, size: 20, allowNull:
    //$form->field($model, 'id')->dropDownList(FHtml::getComboArray('travel_scores', 'travel_scores', 'id', true, 'id', 'name'), ['prompt' => ''])
    $form->field($model, 'id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('travel_scores', 'travel_scores', 'id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

    <?= //name: name, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull: 1
    $form->field($model, 'name')->textInput() ?>

    <?= //name: attraction_id, comment: lookup:@travel_attractions, dbType: int(11), phpType: integer, size: 11, allowNull:
    //$form->field($model, 'attraction_id')->dropDownList(FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'attraction_id', true, 'id', 'name'), ['prompt' => ''])
    $form->field($model, 'attraction_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'attraction_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

    <?= //name: site_id, comment: lookup:@travel_sites, dbType: int(11), phpType: integer, size: 11, allowNull: 1
    //$form->field($model, 'site_id')->dropDownList(FHtml::getComboArray('@travel_sites', 'travel_sites', 'site_id', true, 'id', 'name'), ['prompt' => ''])
    $form->field($model, 'site_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@travel_sites', 'travel_sites', 'site_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

    <?= //name: is_active, comment: , dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
    //$form->field($model, 'is_active')->widget(\kartik\widgets\SwitchInput::className(), [])
    $form->field($model, 'is_active')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size' => 'md', 'threeState' => false]]) ?>

    <?= //name: rank, comment: , dbType: int(11), phpType: integer, size: 11, allowNull: 1
    $form->field($model, 'rank')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
    ?>

    <?= //name: weight, comment: , dbType: int(11), phpType: integer, size: 11, allowNull: 1
    $form->field($model, 'weight')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
    ?>

    <?= //name: score, comment: , dbType: float, phpType: double, size: , allowNull: 1
    $form->field($model, 'score')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

    <?php \common\widgets\FActiveForm::end(); ?>


<?php } else { ?>

    <div class="travel-scores-form">
        <div class="<?= $this->params['portletStyle'] ?>">
            <div class="portlet-title">
                <div class="caption font-dark">
                <span class="caption-subject bold uppercase">
                    <i class="<?php echo $this->params['mainIcon'] ?>"></i>
                    <?= FHtml::t('common', $moduleTitle) ?></span>
                    <span
                            class="caption-helper"><?= ($model->isNewRecord) ? FHtml::t('common', 'title.create') : FHtml::t('common', 'title.update') ?></span>
                </div>
                <div class="tools">
                    <a href="#" class="fullscreen"></a>
                    <a href="#" class="collapse"></a>
                </div>
                <div class="actions">
                </div>
            </div>
            <div class="portlet-body form">
                <?php $form = \common\widgets\FActiveForm::begin([
                    'id' => 'travel-scores-form',
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
                    <div class="form-body">

                        <?= //name: id, comment: , dbType: bigint(20), phpType: string, size: 20, allowNull:
                        //$form->field($model, 'id')->dropDownList(FHtml::getComboArray('travel_scores', 'travel_scores', 'id', true, 'id', 'name'), ['prompt' => ''])
                        $form->field($model, 'id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('travel_scores', 'travel_scores', 'id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                        <?= //name: name, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull: 1
                        $form->field($model, 'name')->textInput() ?>

                        <?= //name: attraction_id, comment: lookup:@travel_attractions, dbType: int(11), phpType: integer, size: 11, allowNull:
                        //$form->field($model, 'attraction_id')->dropDownList(FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'attraction_id', true, 'id', 'name'), ['prompt' => ''])
                        $form->field($model, 'attraction_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'attraction_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                        <?= //name: site_id, comment: lookup:@travel_sites, dbType: int(11), phpType: integer, size: 11, allowNull: 1
                        //$form->field($model, 'site_id')->dropDownList(FHtml::getComboArray('@travel_sites', 'travel_sites', 'site_id', true, 'id', 'name'), ['prompt' => ''])
                        $form->field($model, 'site_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@travel_sites', 'travel_sites', 'site_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                        <?= //name: is_active, comment: , dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
                        //$form->field($model, 'is_active')->widget(\kartik\widgets\SwitchInput::className(), [])
                        $form->field($model, 'is_active')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size' => 'md', 'threeState' => false]]) ?>

                        <?= //name: rank, comment: , dbType: int(11), phpType: integer, size: 11, allowNull: 1
                        $form->field($model, 'rank')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
                        ?>

                        <?= //name: weight, comment: , dbType: int(11), phpType: integer, size: 11, allowNull: 1
                        $form->field($model, 'weight')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
                        ?>

                        <?= //name: score, comment: , dbType: float, phpType: double, size: , allowNull: 1
                        $form->field($model, 'score')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'decimal', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]]) ?>

                    </div>
                    <div class="form-actions">
                        <?php if ($canEdit) {
                            echo Html::submitButton($model->isNewRecord ? FHtml::t('common', 'Create')
                                : FHtml::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' :
                                'btn btn-primary']);
                        } ?>
                        <?php if (!$model->isNewRecord && $canDelete) { ?>
                            <?= Html::a(FHtml::t('common', 'Delete'), ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => FHtml::t('common', 'Are you sure to delete ?'),
                                    'method' => 'post',
                                ],
                            ]); ?>
                        <?php } else { ?>
                            <?= Html::a(FHtml::t('common', 'Cancel'), ['index'], ['class' => 'btn btn-default pull-right']) ?>
                        <?php } ?>                </div>
                </div>
                <?php \common\widgets\FActiveForm::end(); ?>
            </div>

        </div>
    </div>
<?php } ?>


