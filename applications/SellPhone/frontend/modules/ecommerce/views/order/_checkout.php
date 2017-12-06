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
//FEcommerce::clearCart();
?>
<style>
    <?= FHtml::settingWidgetStyle('BaseWidget_Cart', @"
    .online-contact {
        float: right;
        width: 100%;
        padding: 20px;
        background-color: #f7f7f7;
        border: 1px solid #508910;
    }
    
    "); ?>
</style>

<div class="row" style="padding-top:20px">
    <?php if (!FEcommerce::settingHidePrice()) { ?>
    <div class="col-md-12 md-margin-bottom-20 online-contact" style="border: 1px solid #508910; border-radius: 5px; padding: 15px; margin-bottom:20px; " >
          <h3><?= FHtml::t('common', 'Pay now') ?> <?= FHtml::showPrice($total_price) ?></h3>  <br/>
        <?= FHtml::showPayPalButton($description, $total_price, 'USD', PAYPAL_API_EMAIL) ?>
    </div>
    <?php }?>
    <div class="col-md-12 md-margin-bottom-20" style="padding: 20px;   border: 1px dashed lightgray" >

        <?= \common\widgets\fcontact\FContact::widget(['display_type'=>'contactshow', 'show_border' => true, 'title' => FHtml::t('common', 'Instant Support')]) ?>
    </div>
</div>
