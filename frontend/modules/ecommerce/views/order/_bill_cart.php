<?php
use common\components\FHtml;
use frontend\components\FEcommerce;
use backend\modules\ecommerce\models\Product;

$asset = \frontend\assets\CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$total = 0;
$price = 0;
$total_price = 0;
$data = FEcommerce::getCart();
$list_member = FEcommerce::getMember();
$adult = 0;
$child = 0;

foreach ($list_member as $member) {
    if ($member['adult'] > 0) {
        $adult = (int)$member['adult'];
    }
    if ($member['child'] > 0) {
        $child = (int)$member['child'];
    }
}
$list_product = array();
foreach ($data as $cart) {
    /* @var Product $product */
    $total += $cart['sl'];
    $product = Product::find()->where('id=' . $cart['id'])->one();
    $price += $cart['sl'] * $product->price;
    $list_product[] = array(
        'id' => $cart['id'],
        'thumnail' => $product->thumbnail,
        'image' => $product->image,
        'quantity' => $cart['sl'],
        'price' => $product->price,
        'name' => $product->name,
        'overview' => $product->overview
    );
}
?>
<style>
    input {
        margin: 10px;
    }
</style>
<div class="row">
    <div class="col-md-8 md-margin-bottom-40">
        <h2 class="title-type"><?= FHtml::t('common', 'Client Information') ?></h2>
        <div class="billing-info-inputs checkbox-list">
            <div class="row">
                <div class="col-sm-6">
                    <input id="firstname" type="text" placeholder="First Name" name="firstname"
                           class="form-control ">
                    <input id="email" type="text" placeholder="Email" name="email"
                           class="form-control ">
                </div>
                <div class="col-sm-6">
                    <input id="lastname" type="text" placeholder="Last Name" name="lastname"
                           class="form-control ">
                    <input id="phone" type="tel" placeholder="Phone" name="phone"
                           class="form-control ">
                </div>
            </div>
            <input id="billingAddress" type="text" placeholder="Address" name="address"
                   class="form-control ">
            <input id="billingAddress2" type="text" placeholder="Country" name="country"
                   class="form-control ">
            <div class="row">
                <div class="col-sm-6">
                    <input id="city" type="text" placeholder="City" name="city"
                           class="form-control ">
                </div>
                <div class="col-sm-6">
                    <input id="zip" type="text" placeholder="Zip/Postal Code" name="zip"
                           class="form-control ">
                </div>
                <div class="col-sm-12">
                    <div class="form-group" style="padding-left: 10px; margin-bottom: 0;">
                        <label for="order_noted">Note:</label>
                        <textarea name="order_noted" class="form-control" rows="5" id="order_noted"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">

    </div>
</div>
