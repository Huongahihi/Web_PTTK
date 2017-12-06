<?php
use frontend\assets\CustomAsset;
use frontend\components\Helper;
use common\components\FHtml;

/* @var $model \frontend\models\ViewModel */
/* @var $this yii\web\View */
/* @var $category \backend\models\Category */

$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$main_color = FHtml::currentApplicationMainColor();
$this->title = $model->name;
?>

<!--=== Page Header ===-->
<?= \common\widgets\fheadline\FPageHeader::widget([
    'title' => $title, 'overview' => $model->name,
    'style' => FHtml::getBannerStyleCSS(null, $object_type)]) ?>
<!--=== End Page Header ===-->

<!--=== Blog Posts ===-->
<div class="bg-color-light">
    <div class="container content">
        <div class="row">
            <!-- Blog All Posts -->
            <div class="col-md-12">
                <div class="col-md-9">
                    <?= \common\widgets\fview\FView::widget([
                        'object_type' => 'product',
                        //'style' => 'background:black',
                        'link_url' => 'ecommerce/product/list',
                        'model' => $model,
                        //'items' => $items,
                        'color' => $main_color
                    ]); ?>
                </div>
                <!-- End Blog All Posts -->
                <!-- Blog Sidebar -->
                <div class="col-md-3">
                    <?= $this->render('../cart/' . FHtml::settingApplication('CART Control', '_cart_product', [], 'Ecommerce'), ['model' => $model]) ?>
                </div>
            </div>
            <!-- End Blog Sidebar -->
        </div>
    </div>
</div>
<!--=== End Blog Posts ===-->