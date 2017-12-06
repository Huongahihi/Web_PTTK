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
$discount = $data['discount'];
$total_price = $data['total_price'];
$vat = $data['vat'];
$shipping = $data['shipping'];
?>


<div class="row" style="padding:50px">
    <?= FHtml::showCurrentLogo() ?>
    <h1><?= FHtml::t('common', 'We received your order and will proceed in 24 hours. Many thanks for your business.') ?></h1>
</div>



