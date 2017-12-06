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

$object_type = 'order';
$title = FHtml::t('common', 'Messages');
$user_id = FHtml::currentUserId();
$models = null;
if (!empty($user_id))
    $models = FHtml::getModels('app_user_feedback', ['user_id' => $user_id], 'created_date desc');

$id = FHtml::getRequestParam('id');
$feedback = empty($id) ? null : FHtml::getModel('app_user_feedback', '', $id, null, false);
$overview = $title;
$this->title = $title;
$comments = null;

if (!empty($id))
    $comments = FHtml::getModels('object_comment', ['object_id' => $id, 'object_type' => 'app_user_feedback'], 'created_date asc');
?>
<div class="hidden-print margin-bottom-50">
    <?= \common\widgets\fheadline\FPageHeader::widget([
        'title' => '', 'overview' => $overview,
        'style' => FHtml::getBannerStyleCSS(null, $object_type)]) ?>
    <?php Pjax::begin(['id' => 'pjax-container']) ?>
    <div class="row">
        <div class="margin-bottom-20">&nbsp;</div>

        <div class="container">
            <div class="row">
                <div class="" style="margin-bottom: 10px; padding:20px; background-color:white; width:100%;border:solid 1px lightgrey; float:left !important">
                    <?php if (!empty($models)) {
                        $i = 0;
                    foreach ($models as $model) {
                        if ($model->id == $id)
                            $style = 'border-right:4px solid lightgrey; padding-right:20px; margin-right:-20px; ';
                        else
                            $style = '';
                        $i = $i + 1;
                        if ($i < count($models))
                            $style1 = 'border-bottom:1px solid lightgrey; ';
                        else
                            $style1 = '';
                        ?>
                    <div class="col-md-12" style="<?= $style ?> <?= $style1 ?> padding-top:30px; padding-bottom:30px">
                        <div class="col-md-1 text-center">
                            <?= FHtml::showCurrentLogo() ?>
                        </div>
                        <div class="col-md-2">
                                <div style="color:cadetblue;padding-bottom: 5px; font-size:18px"><?= FHtml::settingCompanyName() ?></div>
                            <?= FHtml::showDate($model->created_date) ?>
                        </div>

                        <div class="col-md-6">
                            <div style="color:grey; margin-top:5px">
                             <?= $model->comment ?>
                            </div>
                        </div>
                        <div class="col-md-2" style="color:grey; margin-top:5px">
                            <?= FHtml::showLabel('', 'app_user_feedback', 'type', $model->type) ?>
                        </div>
                        <div class="col-md-1">
                            <a class="btn btn-success btn-sm" href="<?= FHtml::createUrl('user/messages', ['id' => $model->id]) ?>">
                                <?= FHtml::t('common', 'View more') ?>
                            </a>
                        </div>
                    </div>
                    <?php }
                } else {
                        if (empty($user_id))
                            echo FHtml::showErrorMessage(FHtml::t('common', 'You are not authorized to view this page. Please register or login and try again.'));
                        else
                            echo FHtml::showMessage(FHtml::t('common', 'No messages yet. Start new conversation with us here: '));

                    } ?>

                </div>

                <?php
                if (isset($user_id)) {
                    FHtml::registerPlusJS('app_user_feedback', ['name', 'user_id', 'comment', 'created_date'], 'pjax-container', '{column}')
                    ?>
                    <div class="col-md-12" style="color:cadetblue; padding-top:50px; font-size: 18px"><?= FHtml::t('common', 'Start new conversation with us:') ?> <br/>
                        <input type="hidden" name="user_id" id="user_id" value="<?= $user_id ?>" />
                        <input type="hidden" name="created_date" id="created_date" value="<?= date('Y-m-d') ?>" />

                        <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Message"></textarea> <br/>
                        <button href="#" class="btn btn-success btn-md" onclick="plusAppUserFeedback()" ><?= FHtml::t('common', 'Send') ?></button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php Pjax::end() ?>
</div>
<?php


?>


