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
$moduleName = 'TravelPlans';
$moduleTitle = 'Travel Plans';
$moduleKey = 'travel-plans';

$currentRole = FHtml::getCurrentRole();
$canEdit = FHtml::isInRole('', FHtml::currentAction(), $currentRole);
$canDelete = FHtml::isInRole('', 'delete', $currentRole);

/* @var $this yii\web\View */
/* @var $model backend\modules\travel\models\TravelPlans */
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
        ['id' => 'travel-plans-form',
            'type' => $form_Type, //ActiveForm::TYPE_HORIZONTAL,ActiveForm::TYPE_VERTICAL,ActiveForm::TYPE_INLINE
            'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_MEDIUM, 'showErrors' => true],
            'staticOnly' => false, // check the Role here
            'readonly' => false, // check the Role here
            'options' => [//'class' => 'form-horizontal',
//'enctype' => 'multipart/form-data'
            ]]); ?>

    <input type="hidden" id="saveType" name="saveType">

    <?= //name: id, comment: , dbType: bigint(20), phpType: string, size: 20, allowNull:
    //$form->field($model, 'id')->dropDownList(FHtml::getComboArray('travel_plans', 'travel_plans', 'id', true, 'id', 'name'), ['prompt' => ''])
    $form->field($model, 'id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('travel_plans', 'travel_plans', 'id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

    <?= //name: name, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull:
    $form->field($model, 'name')->textInput() ?>

    <?= //name: day, comment: , dbType: int(11), phpType: integer, size: 11, allowNull: 1
    $form->field($model, 'day')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
    ?>

    <?= //name: next_plan_id, comment: editor:select;lookup:@travel_plans, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
    //$form->field($model, 'next_plan_id')->dropDownList(FHtml::getComboArray('@travel_plans', 'travel_plans', 'next_plan_id', true, 'id', 'name'), ['prompt' => ''])
    $form->field($model, 'next_plan_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@travel_plans', 'travel_plans', 'next_plan_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

    <?= //name: attraction_id, comment: editor:select;lookup:@travel_attractions, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
    //$form->field($model, 'attraction_id')->dropDownList(FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'attraction_id', true, 'id', 'name'), ['prompt' => ''])
    $form->field($model, 'attraction_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'attraction_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

    <?= //name: attraction_arrived, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull: 1
    $form->field($model, 'attraction_arrived')->textInput() ?>

    <?= //name: attraction_duration, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull: 1
    $form->field($model, 'attraction_duration')->textInput() ?>

    <?= //name: next_attraction_id, comment: editor:select;lookup:@travel_attractions, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
    //$form->field($model, 'next_attraction_id')->dropDownList(FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'next_attraction_id', true, 'id', 'name'), ['prompt' => ''])
    $form->field($model, 'next_attraction_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'next_attraction_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

    <?= //name: travel_by, comment: , dbType: varchar(100), phpType: string, size: 100, allowNull: 1
    //$form->field($model, 'travel_by')->dropDownList(FHtml::getComboArray('travel_plans', 'travel_plans', 'travel_by', true, 'id', 'name'), ['prompt' => ''])
    $form->field($model, 'travel_by')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('travel_plans', 'travel_plans', 'travel_by', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

    <?= //name: travel_duration, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull: 1
    $form->field($model, 'travel_duration')->textInput() ?>

    <?= //name: travel_distance, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull: 1
    $form->field($model, 'travel_distance')->textInput() ?>

    <?= //name: note, comment: , dbType: text, phpType: string, size: , allowNull: 1
    $form->field($model, 'note')->widget(FCKEditor::className(), ['options' => ['rows' => 5, 'disabled' => false], 'preset' => 'normal']) ?>

    <?= //name: sort_order, comment: , dbType: int(11), phpType: integer, size: 11, allowNull: 1
    $form->field($model, 'sort_order')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
    ?>

    <?= //name: user_id, comment: lookup:@user;editor:select, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
    //$form->field($model, 'user_id')->dropDownList(FHtml::getComboArray('@user', 'user', 'user_id', true, 'id', 'name'), ['prompt' => ''])
    $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@user', 'user', 'user_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

    <?= //name: user_itinerary_id, comment: lookup:@travel_itinerary;editor:select, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
    //$form->field($model, 'user_itinerary_id')->dropDownList(FHtml::getComboArray('@travel_itinerary', 'travel_itinerary', 'user_itinerary_id', true, 'id', 'name'), ['prompt' => ''])
    $form->field($model, 'user_itinerary_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@travel_itinerary', 'travel_itinerary', 'user_itinerary_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

    <?= //name: is_locked, comment: , dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
    //$form->field($model, 'is_locked')->widget(\kartik\widgets\SwitchInput::className(), [])
    $form->field($model, 'is_locked')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size' => 'md', 'threeState' => false]]) ?>

    <?php \common\widgets\FActiveForm::end(); ?>


<?php } else { ?>

    <div class="travel-plans-form">
        <div class="<?= $this->params['portletStyle'] ?>">
            <div class="portlet-title">
                <div class="caption font-dark">
                <span class="caption-subject bold uppercase">
                    <i class="<?php echo $this->params['mainIcon'] ?>"></i>
                    <?= FHtml::t('common', $moduleTitle) ?></span>
                    <span class="caption-helper"><?= ($model->isNewRecord) ? FHtml::t('common', 'title.create') : FHtml::t('common', 'title.update') ?></span>
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
                    'id' => 'travel-plans-form',
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
                        //$form->field($model, 'id')->dropDownList(FHtml::getComboArray('travel_plans', 'travel_plans', 'id', true, 'id', 'name'), ['prompt' => ''])
                        $form->field($model, 'id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('travel_plans', 'travel_plans', 'id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                        <?= //name: name, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull:
                        $form->field($model, 'name')->textInput() ?>

                        <?= //name: day, comment: , dbType: int(11), phpType: integer, size: 11, allowNull: 1
                        $form->field($model, 'day')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
                        ?>

                        <?= //name: next_plan_id, comment: editor:select;lookup:@travel_plans, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
                        //$form->field($model, 'next_plan_id')->dropDownList(FHtml::getComboArray('@travel_plans', 'travel_plans', 'next_plan_id', true, 'id', 'name'), ['prompt' => ''])
                        $form->field($model, 'next_plan_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@travel_plans', 'travel_plans', 'next_plan_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                        <?= //name: attraction_id, comment: editor:select;lookup:@travel_attractions, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
                        //$form->field($model, 'attraction_id')->dropDownList(FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'attraction_id', true, 'id', 'name'), ['prompt' => ''])
                        $form->field($model, 'attraction_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'attraction_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                        <?= //name: attraction_arrived, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull: 1
                        $form->field($model, 'attraction_arrived')->textInput() ?>

                        <?= //name: attraction_duration, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull: 1
                        $form->field($model, 'attraction_duration')->textInput() ?>

                        <?= //name: next_attraction_id, comment: editor:select;lookup:@travel_attractions, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
                        //$form->field($model, 'next_attraction_id')->dropDownList(FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'next_attraction_id', true, 'id', 'name'), ['prompt' => ''])
                        $form->field($model, 'next_attraction_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@travel_attractions', 'travel_attractions', 'next_attraction_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                        <?= //name: travel_by, comment: , dbType: varchar(100), phpType: string, size: 100, allowNull: 1
                        //$form->field($model, 'travel_by')->dropDownList(FHtml::getComboArray('travel_plans', 'travel_plans', 'travel_by', true, 'id', 'name'), ['prompt' => ''])
                        $form->field($model, 'travel_by')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('travel_plans', 'travel_plans', 'travel_by', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                        <?= //name: travel_duration, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull: 1
                        $form->field($model, 'travel_duration')->textInput() ?>

                        <?= //name: travel_distance, comment: , dbType: varchar(255), phpType: string, size: 255, allowNull: 1
                        $form->field($model, 'travel_distance')->textInput() ?>

                        <?= //name: note, comment: , dbType: text, phpType: string, size: , allowNull: 1
                        $form->field($model, 'note')->widget(FCKEditor::className(), ['options' => ['rows' => 5, 'disabled' => false], 'preset' => 'normal']) ?>

                        <?= //name: sort_order, comment: , dbType: int(11), phpType: integer, size: 11, allowNull: 1
                        $form->field($model, 'sort_order')->widget(\yii\widgets\MaskedInput::className(), ['clientOptions' => ['alias' => 'numeric', 'groupSeparator' => ',', 'autoGroup' => true, 'removeMaskOnSubmit' => true]])
                        ?>

                        <?= //name: user_id, comment: lookup:@user;editor:select, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
                        //$form->field($model, 'user_id')->dropDownList(FHtml::getComboArray('@user', 'user', 'user_id', true, 'id', 'name'), ['prompt' => ''])
                        $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@user', 'user', 'user_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                        <?= //name: user_itinerary_id, comment: lookup:@travel_itinerary;editor:select, dbType: varchar(100), phpType: string, size: 100, allowNull: 1
                        //$form->field($model, 'user_itinerary_id')->dropDownList(FHtml::getComboArray('@travel_itinerary', 'travel_itinerary', 'user_itinerary_id', true, 'id', 'name'), ['prompt' => ''])
                        $form->field($model, 'user_itinerary_id')->widget(\kartik\widgets\Select2::className(), ['data' => FHtml::getComboArray('@travel_itinerary', 'travel_itinerary', 'user_itinerary_id', true, 'id', 'name'), 'options' => ['multiple' => false], 'pluginOptions' => ['allowClear' => true, 'tags' => true]]) ?>

                        <?= //name: is_locked, comment: , dbType: tinyint(1), phpType: integer, size: 1, allowNull: 1
                        //$form->field($model, 'is_locked')->widget(\kartik\widgets\SwitchInput::className(), [])
                        $form->field($model, 'is_locked')->widget(\kartik\checkbox\CheckboxX::className(), ['pluginOptions' => ['theme' => 'krajee-flatblue', 'size' => 'md', 'threeState' => false]]) ?>

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


