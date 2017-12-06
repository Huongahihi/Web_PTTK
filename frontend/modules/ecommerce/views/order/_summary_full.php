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
$promotion = FEcommerce::getPromotion();
$promotion_code = FEcommerce::getPromotionCode();

$message = ''; $color = '';
if (isset($promotion) && is_object($promotion))
{
    $message = 'Voucher Code [' . $promotion_code . '] Applied.';
    $color = 'green';
} else if (!empty($promotion_code)) {
    $message = FHtml::t('common', 'Invalid or Expired Coupon');
    $color = 'red';
} else {
    $message = '';
    $color = 'grey';
}

?>
<div class="large-12 medium-12  columns">
    <div class="row">
        <div class="large-9 medium-9  columns">
            <p style="margin-bottom: 0"><?= FHtml::t('common', 'Promotion Code')?></p>
            <input style="width: 50%; display: inline-block;" class="form-control margin-bottom-10" id="code" name="code" type="text" value="<?= $promotion_code ?>">
            <button type="button"
                    onclick="checkcode($('#code').val(), '<?= FHtml::createUrl('ecommerce/order/checkcode') ?>')"
                    class="btn-u btn-u-sea-shop" style="margin-left: 5px;
                                                        padding: 8px;
                                                        border: 0;
                                                        border-radius: 5px;
                                                        background: #5CB85C;"><?= FHtml::t('common', 'Apply')?>
            </button>
            <p class="notify_error" style="color: <?= $color ?>"><?= $message ?></p>
        </div>
        <div class="large-3 medium-3  columns">
            <?= $this->render('_summary', ['data' => $data]) ?>
        </div>
    </div>

</div>



<script>
    function checkcode(id, url) {
        var data = {
            code: id
        };
        $.ajax({
            url: url,
            type: "post",
            dataType: "text",
            data: data,
            success: function (result) {
                if (result !== '') {
                    alert(result, 'Voucher Code Invalid');
                } else {
                    alert('Congratulations. Please enjoy your tour', 'Voucher Code Success');
                    refreshPage();
                }
            }
        })
        ;
    }
</script>

