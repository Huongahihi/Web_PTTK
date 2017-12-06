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
            <div class="col-md-9">
                <div class="">
                    <?= \common\widgets\fgrid\FBlog::widget([
                        'title' => '', 'title_display_type' => FHtml::HEADLINE_TYPE_CENTER_V2,
                        'color' => $main_color,
                        //'image_height' => -1,
                        'data' => $data,
                        'items' => $items,
                        'columns_count' => 3,
                        'display_type' => 'flist',
                        'items_filter' => [],
                        //'background_css' => FHtml::WIDGET_BACKGROUND_PARRALAX,
                        //'width_css' => FHtml::WIDGET_WIDTH_CONTAINER,
                        //'link_url' => 'ecommerce/product/view',
                        'show_viewmore' => false,
                        'show_border' => false,
                        'viewmore_url' => '',
                        'object_type' => $object_type,
                        'pagination' => $pagination,
                        'keyword' => FHtml::getRequestParam('keyword'),
                        'show_price' => true,
                        'show_rate' => true,
                        'show_panel' => false,
                        'field_overview' => ['overview']]); ?>

                </div>

            </div>
            <div class="col-md-3 filter-by-block md-margin-bottom-60">
                <?= \common\widgets\fcategory\FCategory::widget([
                    'object_type' => $object_type,
                    'margin' => 0,
                    'link_url' => 'news/list',
                    'color' => $main_color,
                    'display_type' => 'ftag',
                    'show_panel' => false
                ]); ?>

                <div class="margin-bottom-30"></div>

                <?= \common\widgets\fgrid\FProduct::widget([
                    'title' => FHtml::t('common', 'Most Purchases'),
                    'object_type' => $object_type,
                    'items_filter' => ['is_hot' => true],
                    'margin' => 0,
                    'title_display_type' => 'headline-v2 bg-color-light',
                    //'link_url' => 'ecommerce/product/list',
                    'color' => $main_color,
                    'items_count' => 5,
                    'display_type' => 'flistsimple1',
                    'show_panel' => false
                ]); ?>

            </div>


        </div>
    </div><!--/end row-->
</div><!--/end container-->
<!--=== End Content Part ===-->