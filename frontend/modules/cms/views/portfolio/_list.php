<?php
use frontend\assets\CustomAsset;
use frontend\components\Helper;
use common\components\FHtml;

$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;

?>

<?= \common\widgets\fheadline\FPageHeader::widget([
    'title' => $this->title, 'overview' => FHtml::showLabel('', $object_type, 'category_id', FHtml::getRequestParam('category_id')),
    'style' => FHtml::getBannerStyleCSS(null, $object_type)]) ?>

<!--=== Content Part ===-->
<div class="content container">
    <div class="row">
        <div class="col-md-12">
            <?= \common\widgets\fcategory\FCategory::widget([
                'object_type' => $object_type,
                'margin' => 0,
                'title' => '...',
                'show_headline' => false,
                'link_url' => 'portfolio/list',
                'color' => $main_color,
                'display_type' => 'ftag',
                'show_panel' => false
            ]); ?>


            <?= \common\widgets\fgrid\FGrid::widget([
                'title' => '', 'title_display_type' => FHtml::HEADLINE_TYPE_CENTER_V2,
                'color'=> $main_color,
                //'image_height' => -1,
                'data' => $data,
                'items' => $items,
                'columns_count' => 4,
                'display_type' => 'fmasonry',
                'items_filter' => [],
                //'background_css' => FHtml::WIDGET_BACKGROUND_PARRALAX,
                //'width_css' => FHtml::WIDGET_WIDTH_CONTAINER,
                'link_url' => 'portfolio/view',
                'show_viewmore' => true,
                'show_border' => false,
                'viewmore_url' => '',
                'object_type' => $object_type,
                'pagination' => null,
                'keyword' => $keyword,
                'show_price' => true,
                'show_rate' => true,
                'show_panel' => false,
                'field_overview' => ['overview']]); ?>

        </div>
    </div><!--/end row-->
</div><!--/end container-->
<!--=== End Content Part ===-->