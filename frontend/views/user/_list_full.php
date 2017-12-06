<?php
use frontend\assets\CustomAsset;
use frontend\components\Helper;
use common\components\FHtml;
use common\widgets\fcounter\FCounter;

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

                <?= \common\widgets\fboxlist\FAbout::widget([
                    'display_type' => '2',
                    'width_css' => FHtml::WIDGET_WIDTH_FULL,
                    'items' => $items_top,
                    'color' => $main_color]); ?>

                <?= \common\widgets\fgrid\FGrid::widget([
                    'title' => '', 'title_display_type' => FHtml::HEADLINE_TYPE_CENTER_V2,
                    'color' => $main_color,
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
                    'keyword' => FHtml::getRequestParam('keyword'),
                    'show_price' => true,
                    'show_rate' => true,
                    'show_panel' => false,
                    'field_overview' => ['overview']]); ?>


            </div>
        </div><!--/end row-->
    </div>
<?= FCounter::widget(['color' => $main_color,
    //'title' => Fhtml::t('common', 'Statistics'),
    //'display_type' => '1',
    'background_css' => Fhtml::WIDGET_BACKGROUND_PARRALAX1,
    'width_css' => FHtml::WIDGET_WIDTH_CONTAINER,
    'viewmore_url' => '']) ?>