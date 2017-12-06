<?php
use frontend\assets\CustomAsset;
use frontend\components\Helper;
use common\components\FHtml;
use common\widgets\fcounter\FCounter;
use frontend\modules\cms\Cms;

$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$object_type = isset($object_type) ? $object_type : '';
$data = isset($data) ? $data : null;
$items = isset($items) ? $items : Cms::getAbouts([]);

$main_color = isset($main_color) ? $main_color : '';
$items_top = isset($items_top) ? $items_top :null;
$keyword = isset($keyword) ? $keyword : '';
$baseUrl = $asset->baseUrl;
$baseUrl_2 = $asset->baseUrl . '/backend';

if (!empty($items))
    $about = $items[0];

//echo '<pre>'; print_r($about); die;
$this->title = FHtml::t('common', 'About');
?>

<?= \common\widgets\fheadline\FPageHeader::widget([
    'title' => $this->title, 'overview' => FHtml::showLabel('', $object_type, 'category_id', FHtml::getRequestParam('category_id')),
    'style' => FHtml::getBannerStyleCSS(null, $object_type)]) ?>

<!--=== Content Part ===-->

<div class="content container">
    <div class="row">
        <div class="col-md-12">

            <div class="section"">
            <div class="container">

                <div class="row">
                    <div class="col-sm-4">
                        <?= FHtml::showImage(FHtml::getFieldValue($about, 'image'), 'cms-about', '', '', 'img-responsive') ?>
                    </div>
                    <div class="col-sm-8" style="padding-left:50px">
                        <h2><?= FHtml::getFieldValue($about, 'name') ?></h2>
                        <div>
                            <?= FHtml::getFieldValue($about, 'content') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </div><!--/end row-->
</div>
<div class="content container">
    <div class="row">
        <div class="col-md-12">

            <div class="section"">
            <div class="container">
                <?= \common\widgets\fboxlist\FService::widget([
                    'title' => FHtml::t('common', 'Our Services'),
                    'display_type' => 'serviceslist4' ,
                    'icon_size' => 'icon-md',
                    'width_css' => FHtml::WIDGET_WIDTH_FULL,
                    'color'=>$main_color]); ?>

            </div>
        </div>


    </div>
</div><!--/end row-->
</div>