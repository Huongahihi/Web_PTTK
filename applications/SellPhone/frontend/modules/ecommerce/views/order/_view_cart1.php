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
    <div class="table-responsive">
        <br/>
        <table class="table table-responsive table-striped">
            <thead>
            <tr>
                <th class="col-xs-3"><?= FHtml::t('common', 'Item') ?></th>
                <th class="col-xs-6"><?= FHtml::t('common', 'Item') ?></th>
                <th style="text-align:right !important;" class="col-xs-1"><?= FHtml::t('common', 'Unit Price') ?></th>
                <th class="col-xs-1" style="text-align: center"><?= FHtml::t('common', 'Quantity') ?></th>
                <th style="text-align:right !important;" class="col-xs-1"><?= FHtml::t('common', 'Sub Total') ?></th>
                <th style="text-align:center !important;" class="col-xs-1"></th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($list_product as $row) {
                ?>
                <tr id="item_<?= $row['id'] ?>">
                    <td class="product-in-table" style="vertical-align: middle;">
                        <?= \common\components\FHtml::showImage(FHtml::getFieldValue($row, 'image'), PRODUCT_DIR, '100%', 0, 'img-responsive full-width', $row['name'], false) ?>

                    </td>
                    <td class="product-in-table" style="vertical-align: middle;">
                            <h3><?= $row['name'] ?></h3>
                    </td>
                    <td class="product-price"
                        style="text-align:right !important; line-height: 20"><?= FHtml::showCurrency($row['price']) ?></td>
                    <td style="vertical-align: middle; text-align: center">
                        <button type='button' id="minus_<?= $row['id'] ?>"
                                class="quantity-button"
                                name='subtract'
                                onclick="actionMinus(<?= $row['id'] ?>,1,'minus','<?= FHtml::createUrl('ecommerce/cart/cart') ?>')"
                                value='-'
                                style="width: 25px">-
                        </button>
                        <input style="width: 25px" type='text' class="quantity-field" name='qty1'
                               value="<?= $row['quantity'] ?>" id='input_<?= $row['id'] ?>'
                               onkeyup="checkinputNumber(<?= $row['id'] ?>,'<?= FHtml::createUrl('ecommerce/cart/changequantity') ?>')"/>
                        <button type='button' id="plus_<?= $row['id'] ?>"
                                class="quantity-button"
                                name='add'
                                onclick="actionPlus(<?= $row['id'] ?>,1,'add','<?= FHtml::createUrl('ecommerce/cart/cart') ?>')"
                                value='+'
                                style="width: 25px;">+
                        </button>
                    </td>
                    <td class="product-price-total" style="text-align:right !important; vertical-align: middle;" id="price_<?= $row['id'] ?>">
                        <?= FHtml::showCurrency($row['price'] * $row['quantity']); ?>
                    </td>
                    <td style="vertical-align: middle;">
                        <button type="button" class="close"
                                onclick="actionRemove(<?= $row['id'] ?>,'<?= FHtml::createUrl('ecommerce/cart/remove') ?>')">
                            <span class="glyphicon glyphicon-remove-circle"
                                  style="color:darkred; font-size: 18px"></span><span class="sr-only">Close</span>
                        </button>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
    <?= FHtml::render('_summary_full', ['data' => $data]) ?>

    <?php
} else {
    $message = FHtml::t('common', 'Empty Shopping Cart');
    echo "<h1 style='padding-top:20px'> $message </h1>";
}
?>



