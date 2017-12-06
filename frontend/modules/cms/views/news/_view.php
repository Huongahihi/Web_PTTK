<?php
use frontend\assets\CustomAsset;
use frontend\components\Helper;
use common\components\FHtml;
use common\widgets\fsocialshare\FSocialShare;

/* @var $model \frontend\models\ViewModel */
/* @var $this yii\web\View */
/* @var $category \backend\models\Category */

$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$baseUrl .= '';
$main_color = FHtml::currentApplicationMainColor();
$related_items = FHtml::getModels('cms_blogs', ['<>', 'id', $model->id], 'created_date desc', 5);
$this->title = $model->name;
FHtml::setPageMeta($model->name, $model->overview, FHtml::getFileURLForAPI($model->image, 'cms-blogs'));
?>

<!--=== Page Header ===-->
<?= \common\widgets\fheadline\FPageHeader::widget([
    'title' => $this->title, 'overview' => FHtml::showLabel('', $object_type, 'category_id', FHtml::getRequestParam('category_id')),
    'style' => FHtml::getBannerStyleCSS(null, $object_type)]) ?>
<!--=== End Page Header ===-->
<!--=== Blog Posts ===-->
<div class="">
    <div class="container" style="">
        <div class="row">
            <!-- Blog All Posts -->
            <div class="col-md-9" style="padding:20px">
                <div id="social_share" class="content" style="background-color: white; padding: 30px; padding-top:20px">
                    <div class="" style="color:#81C6B6 ; font-weight: bold; font-size:32pt"><?php echo FHtml::getFieldValue($model, ['name', 'title']) ?></div>

                    <?= FHtml::showImage(FHtml::getFieldValue($model, ['image']), 'cms-blogs', '100%') ?>
                    <p style="padding-top:30px">
                        <?= FHtml::getFieldValue($model, ['overview', 'description']) ?>
                    </p>
                    <div>
                        <?= FHtml::getFieldValue($model, ['content']) ?>
                    </div>
                    <br/>
                    <?= FHtml::showTags(FHtml::getFieldValue($model, ['tags']), 'news') ?>
                    <?= FSocialShare::widget(['container' => '#social_share', 'display_type' => '_float', 'title' => $this->title , 'items' => [
                        "facebook",  "twitter", "google-plus", "linkedin", "pinterest"
                    ] ]) ?>
                </div>
            </div>
            <!-- End Blog All Posts -->
            <!-- Blog Sidebar -->
            <div class="col-md-3" style="padding:20px">
                <?= \common\widgets\fsubscription\FSubscription::widget([]) ?>
                <div style="margin-top:20px; background-color: white; padding: 10px">
                    <h4 style="padding-bottom:20px"><?= FHtml::t('common', 'Related Blogs') ?></h4>
                <?php foreach ($related_items as $item) { ?>
                    <div class="row" style="margin-bottom:20px">
                        <a href="<?= FHtml::createUrl('cms/news', ['id' => $item->id]) ?>">
                        <div class="col-md-3">
                            <?= FHtml::showImage($item, 'cms-blogs', '100%') ?>
                        </div>
                        <div class="col-md-9" style="padding-top:10px; font-weight: bold; color: #81C6B6"><?= FHtml::getFieldValue($item, ['name', 'title']) ?></div>
                        </a>
                    </div>
                <?php } ?>
                </div>

            </div>
            <!-- End Blog Sidebar -->
        </div>
    </div>
</div>

<!--=== End Blog Posts ===-->