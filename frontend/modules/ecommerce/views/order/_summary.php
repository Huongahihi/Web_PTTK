<?php
use common\components\FHtml;
use frontend\components\FEcommerce;
use backend\modules\ecommerce\models\Product;
use yii\widgets\Pjax;

$asset = \frontend\assets\CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$total = 0;
$price = 0;
$total_price = 0;
$list_product = array();
$data = !isset($data) ? FEcommerce::getCartData() : $data;
$price = $data['price'];
$list_product = $data['data'];
$total = $data['total'];
$discount_text = $data['discount_text'];
$total_price = $data['total_price'];
$vat = $data['vat'];
$shipping = $data['shipping'];
$shipping_enabled = FEcommerce::settingShippingEnabled();
$promotion_code = FEcommerce::getPromotionCode();

?>

<div class="pull-right" style="width: 100%;">
    <div class="row margin-bottom-10 text-right">
        <div class="large-6 medium-6  columns"><?= FHtml::t('common', 'Total Price')?>:</div>
        <div class="large-6 medium-6  columns"><?= FHtml::showCurrency($price) ?></div>
    </div>
    <?php if (!empty($promotion_code)) { ?>
        <div class="row margin-bottom-10 text-right">
            <div class="large-6 medium-6  columns"><?= FHtml::t('common', 'VAT')?>:</div>
            <div class="large-6 medium-6  columns"><?= FHtml::showPercentage($vat) ?></div>
        </div>
    <?php } ?>
    <div class="row margin-bottom-10 text-right">
        <div class="large-6 medium-6  columns"><?= FHtml::t('common', 'Discount')?>:</div>
        <div class="large-6 medium-6  columns"><?= $discount_text ?></div>
    </div>
    <?php if (FEcommerce::settingShippingEnabled()) { ?>
    <div class="row margin-bottom-10 text-right">
        <div class="large-6 medium-6  columns"><?= FHtml::t('common', 'VAT')?>:</div>
        <div class="large-6 medium-6  columns"><?= FHtml::showPercentage($vat) ?></div>
    </div>
    <?php } ?>

    <?php if (FEcommerce::settingShippingEnabled()) { ?>
    <div class="row margin-bottom-10 text-right" style="padding-bottom:10px;">
        <div class="large-6 medium-6  columns"><?= FHtml::t('common', 'Shipping')?>:</div>
        <div class="large-6 medium-6  columns"><?= FHtml::showCurrency($shipping, '') ?>&nbsp;</div>
    </div>
    <?php } ?>
    <div class="row margin-bottom-10 text-right" style="font-size:18px; font-weight: bold">
        <div class="large-6 medium-6  columns"><?= FHtml::t('common', 'Payment')?>:</div>
        <div class="large-6 medium-6  columns product-price-total " style="font-size:18px"><?= FHtml::showCurrency($total_price) ?></div>
    </div>
</div>



