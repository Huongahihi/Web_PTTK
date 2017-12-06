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

            <?= \common\widgets\fboxlist\FBoxList::widget([
                'display_type' => '7',
                'object_type' => 'cms_service',
                'title' => FHtml::t('common', 'Our Services'),
                'icon_size' => 'icon-md',
                'icon_bg_type' => 'color',
                'width_css' => FHtml::WIDGET_WIDTH_FULL,
                'items' => FHtml::getModels('cms_service', []),
                'color'=>$main_color]); ?>

            <?= \common\widgets\fboxlist\FAbout::widget([
                'display_type' => '2',
                'width_css' => FHtml::WIDGET_WIDTH_FULL,
                'color'=>$main_color]); ?>

            <?= \common\widgets\fgrid\FGrid::widget([
                'title' => '', 'title_display_type' => FHtml::HEADLINE_TYPE_CENTER_V2,
                'color'=> $main_color,
                //'image_height' => -1,
                'data' => $data,
                'items' => $items,
                'columns_count' => 4,
                'display_type' => 'fcollapsible',
                'items_filter' => [],
                //'background_css' => FHtml::WIDGET_BACKGROUND_PARRALAX,
                //'width_css' => FHtml::WIDGET_WIDTH_CONTAINER,
                'link_url' => 'about/view',
                'show_viewmore' => false,
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