<?php
/**
 * Created by PhpStorm.
 * User: Darkness
 * Date: 9/6/2016
 * Time: 4:43 PM
 */
use frontend\assets\CustomAsset;
Use frontend\components\Helper;
use common\components\FHtml;
use yii\widgets\Pjax;

/* @var $product \backend\modules\ecommerce\models\Products */
/* @var $this yii\web\View */
/* @var $products array */
/* @var $page integer */
/* @var $category_id integer */
/* @var $title string */
/* @var $keyword string */
/* @var $total int */
/* @var $start_index int */

$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;

$user_id = !isset($user_id) ? FHtml::currentUserId() : $user_id;
$models = !isset($models) ? FHtml::getModels('app_user_feedback', ['user_id' => $user_id], 'created_date desc') : $models;
$id = isset($id) ? $id : FHtml::getRequestParam('id');
$feedback = isset($feedback) ? $feedback : (empty($id) ? null : FHtml::getModel('app_user_feedback', '', $id, null, false));
$comments = null;
if (!empty($id))
    $comments = isset($comments) ? $comments : FHtml::getModels('object_comment', ['object_id' => $id, 'object_type' => 'app_user_feedback'], 'created_date asc');
?>
<div class="col-md-12">
    <div class="col-md-4">
        <div class="" style="margin-bottom: 10px; padding:20px; background-color:white; width:100%;border:solid 1px lightgrey; float:left !important">
            <h3><?= FHtml::t('common', 'Messages') ?></h3> <br/>

            <?php if (!empty($models)) {
                foreach ($models as $model) {
                    if ($model->id == $id)
                        $style = 'border-right:4px solid lightgrey; padding-right:20px; margin-right:-20px; ';
                    else
                        $style = '';
                    ?>
                    <div class="" style="<?= $style ?> border-top:1px solid lightgrey; padding-top:20px; padding-bottom:20px">
                        <a data-pjax="true" href="<?= FHtml::createUrl('user/messages', ['id' => $model->id]) ?>">
                            <?= $model->comment ?>
                        </a>
                        <br/> <br/>
                        <?= FHtml::showLabel('', 'app_user_feedback', 'type', $model->type) ?>
                        <div class="pull-right" style="color:lightgrey; font-size: 90%"><?= FHtml::showDate($model->modified_date) ?></div>
                    </div>
                <?php }
            } else { ?>
                <div style="font-size: 100%; color:grey"><?= FHtml::t('common', 'No messages yet.') ?></div>
            <?php } ?>
        </div>
    </div>
    <div class="col-md-8" style="padding-left:30px">
        <?php if (isset($model))
        { ?>

            <div class="" style="margin-bottom: 10px; padding:20px; background-color:white; width:100%;border:solid 1px lightgrey; float:left !important">
                <?= $model->comment ?> <br/><br/>
                <div class="pull-right" style="color:lightgrey; font-size: 90%"><?= FHtml::showDate($model->created_date) ?></div>
            </div>
            <?php
        } ?><br/>
        <h3 style="color: grey"><?= FHtml::t('common', 'Comments') ?></h3>
        <?php if (!empty($comments)) {
            foreach ($comments as $model) {?>
                <div class="" style="margin-bottom: 10px; padding:20px; width:100%;border-bottom:solid 1px lightgrey; float:left !important">
                    <?= $model->comment ?>
                    <br/> <br/>
                    <div class="pull-right" style="color:lightgrey; font-size: 90%"><?= FHtml::showDate($model->created_date) ?></div>
                </div>
            <?php }
        } else { ?>
        <?php } ?>

        <?php if (!isset($model)) {
            FHtml::registerPlusJS('app_user_feedback', ['name', 'user_id', 'comment', 'created_date'], 'pjax-container', '{column}')
            ?>
            <h3><?= FHtml::t('common', 'Start new conversation with us now') ?></h3>
            <input type="hidden" name="user_id" id="user_id" value="<?= $user_id ?>" />
            <input type="hidden" name="created_date" id="created_date" value="<?= date('Y-m-d') ?>" />

            <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Message"></textarea> <br/>
            <button href="#" class="btn btn-success btn-md" onclick="plusAppUserFeedback()" ><?= FHtml::t('common', 'Send') ?></button>
            <?php
            FHtml::registerPlusJS('app_user_feedback', ['user_id', 'comment', 'created_date'], 'pjax-container', '{column}');

        } else {
            FHtml::registerPlusJS('object_comment', ['app_user_id', 'object_id', 'object_type', 'comment', 'created_date'], 'pjax-container', '{column}');

            ?>
            <input type="hidden" name="user_id" id="app_user_id" value="<?= $user_id ?>" />
            <input type="hidden" name="created_date" id="created_date" value="<?= date('Y-m-d') ?>" />
            <input type="hidden" name="object_id" id="object_id" value="<?= $feedback->id ?>" />
            <input type="hidden" name="object_type" id="object_type" value="app_user_feedback" />
            <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Reply"></textarea> <br/>
            <button href="#" class="btn btn-success btn-md" onclick="plusObjectComment()" ><?= FHtml::t('common', 'Send') ?></button>
        <?php } ?>
    </div>
</div>


