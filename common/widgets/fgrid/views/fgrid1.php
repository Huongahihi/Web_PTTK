<?php
use backend\assets\CustomAsset;
use common\components\FHtml;

//$asset = CustomAsset::register($this);
//$baseUrl = $asset->baseUrl;
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$baseUrl .= '/frontend/themes';
$user = Yii::$app->user->identity;

/* @var $items array */
/* @var $alignment string */
/* @var $itemsCount integer */
/* @var $color string */

$item_side = 12 / $columns_count;
$image_height = '100%';
?>
<section class="blog-page page fix">
    <div class="row">    <!-- Easy Block -->
        <?php
        if (count($items) != 0) {
        $count = 0;
        foreach ($items as $item) {
        $linkurl = empty($item->linkurl) ? FHtml::createUrl($link_url, ['id' => $item->id, 'category_id' => $item->category_id , 'name' => FHtml::getFieldValue($item, ['name', 'title'])]) : $item->linkurl;
        $count++;
        /*Gallery*/
        ?>

        <div class="col-sm-6 col-md-4">
            <div class="single-blog">
                <div class="content fix">
                    <a class="image fix" href="<?= $linkurl ?>">

                        <?= FHtml::showImage(FHtml::getFieldValue($item, ['thumbnail', 'image']), FHtml::getImageFolder($item), '', '', '', strip_tags(FHtml::getFieldValue($item, 'overview'))); ?>
                        <?php
                        if ($item->is_hot == 1) {
                            echo "<div class='date'><h3 style='color: #fff !important;    
                                                                   font-size: 20px;
                                                                   line-height: 2;
                                                                   text-align: center;'>New</h3></div>";
                        }
                        ?>
                    </a>
                    <h2>
                        <a href="<?= $linkurl ?>"><?= FHtml::getFieldValue($item, 'name') ?></a>
                    </h2>
                    <div class="pro-price pull-left">
                        <a class="btn btn-success btn-xs"
                           href="<?= $linkurl ?>"><?= FHtml::t('common', 'Read more +') ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php

        if ($count % $columns_count == 0) {
        // $itemsCount number of items per row
        // space between rows
        ?>
    </div>
</section>
<div class="row high-rated">
    <?php
    }
    if ($count == $items_count && $items_count > 0)
        break;
    }
    }
    ?>
    <!-- End Easy Block -->
</div>



