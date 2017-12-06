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
<div class="row">

    <div class="small-12 columns product-list-container">
        <div>
            <ul id="products" class="grid-product__container grid-product__container--browse">
                <?php
                if (count($items) != 0) {
                    $count = 0;
                foreach ($items as $item) {
                    $linkurl = empty($item->linkurl) ? FHtml::createUrl($link_url, ['id' => $item->id, 'category_id' => $item->category_id , 'name' => FHtml::getFieldValue($item, ['name', 'title'])]) : $item->linkurl;
                    $count++;
                ?>
                    <li class="grid-product grid-product--browse">
                        <a class="grid-product__contents" href="<?= $linkurl ?>">
                            <?= FHtml::showImage(FHtml::getFieldValue($item,'image'),'product','','','grid-product__image',FHtml::getFieldValue($item,'overview')) ?>
                            <h4 class="grid-product__property grid-product__property--name grid-product__property--main"><?= FHtml::getFieldValue($item,'name') ?></h4>
                            <h5 class="grid-product__property grid-product__property--type hidden">tequila</h5>
<!--                            <h5 class="grid-product__property grid-product__property--volume"><span class="grid-product__property--volume__value">750ml</span></h5>-->
                            <h4 class="grid-product__property grid-product__property--price">
                                $<?= FHtml::getFieldValue($item,'price') ?>
                            </h4>

                        </a>
                        <div class="actions">
<!--                            <a class="button small expand add-to-cart actions__add-to-cart">Add to Cart</a>-->
                                <button class="button small expand add-to-cart actions__add-to-cart"  value="Add to cart"
                                        onclick="actionAdd(<?= $item->id ?>, 1, 'add')"><?= FHtml::t('common', 'Add to Cart') ?></button>
                        </div>
                    </li>

                    <?php

                    if ($count == $items_count && $items_count > 0)
                        break;
                    }
                    }
                    ?>
            </ul>
        </div>
    </div>


</div>

