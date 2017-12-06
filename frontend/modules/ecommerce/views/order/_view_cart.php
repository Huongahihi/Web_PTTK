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
$data = FEcommerce::getCartData();
$price = $data['price'];
$list_product = $data['data'];
$total = $data['total'];
$discount = $data['discount'];
$total_price = $data['total_price'];
$vat = $data['vat'];
$shipping = $data['shipping'];

?>


<?php
if (!empty($list_product)) {
    ?>
    <div id="cart-detail" class="row store-detail-view" style="display: block">
        <div class="store-cart">
            <div class="row">
                <div class="large-12 column">
                    <div class="row">
                        <div class="large-12 medium-12  columns">
                            <table class="shipment-table">
                                <tbody>
                                <tr class="shipment-table__header">
                                    <td colspan="5">
                                        <a href="/store/cart/supplier_hours/96">
                                            <h4 class="heading-cart heading-cart--shipments">
                                                G &amp; I Wine &amp; Spirits&ensp;
                                                <span class="label label--supplier-closed">Closed For Delivery</span></h4>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="shipment-table__subheader__cell">
                                        <div class="table__subheader__cell__two-col">
                                            <div class="shipment-table__delivery-expectation"><span class="delivery-expectation"><!-- react-text: 45 -->Next available delivery: <!-- /react-text --><!-- react-text: 46 -->Today after 10:00 AM<!-- /react-text --></span></div><span class="delivery-summary__cost">Free Delivery</span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="shipment-table__subheader__cell delivery-cost-prompt hidden"></td>
                                </tr>

                                <?php foreach ($list_product as $row) : ?>
                                <tr class="shipment-table__item" id="item_<?= $row['id'] ?>">
                                    <td class="shipment-table__item__property shipment-table__item__property--image__container">
                                        <a class="item__link">
                                            <?= \common\components\FHtml::showImage($row['image'], PRODUCT_DIR, '100%', '', 'shipment-table__item__property--image', $row['name'], false) ?>
                                        </a>
                                    </td>
                                    <td class="shipment-table__item__property shipment-table__item__property--main">
                                        <a  class="item__link">
                                            <p class="shipment-table__item__remove-warning hidden">Item will be removed from cart.</p>
                                            <span class="shipment-table__item__property--name"><?= $row['name'] ?></span>
                                            <br>
                                            <span class="shipment-table__item__property--volume"><?= $row['overview'] ?></span>
                                            <br>
                                            <span class="shipment-table__item__property--price--mobile"><?= FHtml::showCurrency($row['price']) ?></span>
                                        </a>
                                    </td>
                                    <td class="shipment-table__item__property shipment-table__item__property--price"><span><?= FHtml::showCurrency($row['price']) ?></span></td>
                                    <td class="shipment-table__item__property shipment-table__item__property--quantity" style="width: 300px">

                                        <br>
                                        <a class="shipment-table__item__remove grey-link" onclick="actionRemove(<?= $row['id'] ?>,'<?= FHtml::createUrl('ecommerce/cart/remove') ?>')">Remove</a>

                                        <button type='button' id="minus_<?= $row['id'] ?>"
                                                class="quantity-button"
                                                name='subtract'
                                                onclick="actionMinus(<?= $row['id'] ?>,1,'minus','<?= FHtml::createUrl('ecommerce/cart/cart') ?>')"
                                                value='-'
                                                style="width: 25px;padding: 5px;margin:0 5px">-
                                        </button>
                                        <input style="width: 25px;display: inline-block" type='text' class="quantity-field" name='qty1'
                                               value="<?= $row['quantity'] ?>" id='input_<?= $row['id'] ?>'
                                               onkeyup="checkinputNumber(<?= $row['id'] ?>,'<?= FHtml::createUrl('ecommerce/cart/changequantity') ?>')"/>
                                        <button type='button' id="plus_<?= $row['id'] ?>"
                                                class="quantity-button"
                                                name='add'
                                                onclick="actionPlus(<?= $row['id'] ?>,1,'add','<?= FHtml::createUrl('ecommerce/cart/cart') ?>')"
                                                value='+'
                                                style="width: 25px;padding: 5px;margin: 0 5px">+
                                        </button>
                                    </td>
                                    <td class="shipment-table__item__property shipment-table__item__property--total-price" id="price_<?= $row['id'] ?>"><?= FHtml::showCurrency($row['price'] * $row['quantity']); ?></td>
                                    <td class="shipment-table__item__property shipment-table__item__property--quantity-spinner" colspan="3">
                                        <div class="number-spinner number-spinner--vertical"><button class="button grey number-spinner__button">+</button><span class="number-spinner__value">1</span><button class="button grey number-spinner__button">-</button></div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                                <tr class="hidden">
                                    <td colspan="5" class="cart-placement__container">
                                        <h4 class="heading-cart cart-placement__header--minimum">
                                            <!-- react-text: 315 -->Easy Extras at
                                            <!-- /react-text -->
                                            <!-- react-text: 316 -->G &amp; I Wine &amp; Spirits
                                            <!-- /react-text -->
                                        </h4>
                                        <ul class="grid-product__container grid-product__container--cart grid-product__container--cart--minimum"></ul><a class="cart-placement__show-more--minimum" href="#">More</a></td>
                                </tr>
                                </tbody>
                            </table>
<!--                            <div class="cart__bottom-cta small-12 medium-6 medium-push-6 columns">-->
<!--                                <p class="cart__bottom-cta__prompt">-->
<!--                                    Subtotal ( 1 item ):-->
<!--                                    <span class="cart__bottom-cta__prompt__subtotal">$45.99</span>-->
<!--                                </p>-->
<!--                                <a id="button-checkout" class="button expand cart__bottom-cta__button" href="/store/checkout">Proceed to Checkout</a>-->
<!--                            </div>-->
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <?= $this->render('_summary_full', ['data' => $data]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    $message = FHtml::t('common', 'Empty Shopping Cart');
    echo "<h1 style='padding-top:20px'> $message </h1>";
}
?>







