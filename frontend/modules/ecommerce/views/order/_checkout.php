<?php
use common\components\FHtml;
use frontend\components\FEcommerce;
use backend\modules\ecommerce\models\Product;

$asset = \frontend\assets\CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$total = 0;
$price = 0;
$total_price = 0;
$data = FEcommerce::getCartData();
$total_price = $data['total_price'];
$description = $data['description'];
FEcommerce::clearCart();
?>


<div class="row" style="margin-top: 30px">
    <div class="col-md-12 md-margin-bottom-50" style="text-align: right;">
        <b><?= FHtml::t('common', 'Pay with Paypal') ?></b> <br/>
        <?= FHtml::showPayPalButton($description, $total_price, 'USD', 'hung.hoxuan@gmail.com') ?>
    </div>
</div>
