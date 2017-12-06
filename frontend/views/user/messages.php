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

$title = FHtml::t('common', 'Messages');
$overview = $title;
$this->title = $title;
$object_type = 'app_user_feedback';

$user_id = FHtml::currentUserId();
$models = FHtml::getModels($object_type, ['user_id' => $user_id], 'created_date desc');
$id = FHtml::getRequestParam('id');
$feedback = empty($id) ? null : FHtml::getModel($object_type, '', $id, null, false);
$comments = null;
if (!empty($id))
    $comments = FHtml::getModels('object_comment', ['object_id' => $id, 'object_type' => $object_type], 'created_date asc');
?>

<div class="hidden-print margin-bottom-50">
    <?= \common\widgets\fheadline\FPageHeader::widget([
        'title' => '', 'overview' => $overview,
        'style' => FHtml::getBannerStyleCSS(null, $object_type)]) ?>
    <?php Pjax::begin(['id' => 'pjax-container']) ?>
    <div class="row">
        <div class="margin-bottom-20">&nbsp;</div>

        <div class="container">
            <?= $this->render('_messages1', ['user_id' => $user_id, 'models' => $models, 'id' => $id, 'model' => $feedback, 'comments' => $comments]) ?>
        </div>
    </div>
    <?php Pjax::end() ?>
</div>
<?php


?>


