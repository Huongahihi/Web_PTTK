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
                <th class="col-xs-8"></th>
                <th class="col-xs-1"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($list_product as $row) {
                ?>
                <tr id="item_<?= $row['id'] ?>">
                    <td class="product-in-table">
                        <?= \common\components\FHtml::showImage(FHtml::getFieldValue($row, 'image'), PRODUCT_DIR, '100%', 0, 'img-responsive full-width', $row['name'], false) ?>

                    </td>
                    <td class="product-in-table">
                            <h3><?= $row['name'] ?></h3>
                            <div style="padding-top: 15px; font-size: 80%; color:lightgray"><?= $row['overview'] ?></div>
                    </td>
                    <td>
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



