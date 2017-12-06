<?php
use frontend\assets\CustomAsset;
use frontend\components\Helper;
use common\components\FHtml;

$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
if (\frontend\components\FEcommerce::isCartEnabled())
{?>

<div class="round-border" style="background-color: white;width:100%; border:solid 1px lightgrey;padding:20px; margin-top: 34px;">
    <button class="btn btn-success" style="width:100%" value="Add to cart" onclick="actionAdd(<?= $model->id?>,1,'add','<?= FHtml::createUrl('ecommerce/cart/cart') ?>')"  >Add to cart</button>
</div>

<?php
}?>