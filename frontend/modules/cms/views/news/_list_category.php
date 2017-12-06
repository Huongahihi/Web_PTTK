<?php
use frontend\assets\CustomAsset;
use frontend\components\Helper;
use common\components\FHtml;

$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$category = isset($category) ? $category : null;
$keyword = isset($keyword) ? $keyword : FHtml::getRequestParam(['keyword', 'tag']);

$category_id = isset($category) ? FHtml::getFieldValue($category, 'id') : (isset($category_id) ? $category_id : FHtml::getRequestParam('catetory_id'));
if (isset($category)) {
    $searchParams = ['category_id' => $category_id];
    $categoryName = $category->name;
}
else {
    $searchParams = ['tag' => $keyword];
    $categoryName = $keyword;
}

$this->title = FHtml::t('common', 'News');

$order_by = FHtml::getRequestParam('order', 'featured');
?>
<?= \common\widgets\fheadline\FPageHeader::widget([
    'title' => $this->title, 'overview' => $categoryName,
    'style' => FHtml::getBannerStyleCSS(null, $object_type)]) ?>

<div class="content container">
    <div class="row">

        <div class="col-md-12">
            <div class="col-md-10">
                <div class="hieuung">
                <div class="container">

                    <?= \common\widgets\fgrid\FBlog::widget([
                        'title' => '', 'title_display_type' => FHtml::HEADLINE_TYPE_CENTER_V2,
                        'color' => $main_color,
                        //'image_height' => -1,
                        'data' => $data,
                        'items' => $items,
                        'columns_count' => 2,
                        'display_type' => 'flist',
                        'items_filter' => [],
                        'link_url' => '/news/{name}/{id}/view',
                        //'background_css' => FHtml::WIDGET_BACKGROUND_PARRALAX,
                        //'width_css' => FHtml::WIDGET_WIDTH_CONTAINER,
                        //'link_url' => 'product/view',
                        'show_viewmore' => true,
                        'show_border' => false,
                        'viewmore_url' => '#',
                        'object_type' => $object_type,
                        'pagination' => $pagination,
                        'keyword' => $keyword,
                        'show_price' => true,
                        'show_rate' => true,
                        'show_panel' => false,
                        'field_overview' => ['overview']]); ?>
                </div>
            </div>
            </div>
            <div class="col-md-2">
                <?= \common\widgets\fcategory\FCategory::widget([
                    'object_type' => $object_type,
                    'margin' => 0,
                    'title' => '...',
                    'show_headline' => false,
                    'link_url' => 'news/{name}/{category_id}/list',
                    'style' => 'padding-top:50px',
                    'item_style' => 'padding-bottom:15px; border-bottom:1px dashed lightgrey; margin-bottom:15px',
                    'color' => $main_color,
                    'display_type' => 'ful',
                    'show_panel' => false
                ]); ?>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END CONTENT -->

<!-- End: bottom -->
<a class="back-to-top">TOP</a>
</div>
<!-- /#page -->