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
$list_product = $data['data'];
$total = $data['total'];
$type = isset($type) ? $type : FHtml::t('common', 'My Prepaid Voucher / Ticket');
$model = FEcommerce::getOrder();
if (!isset($model)) {
    Yii::$app->controller->redirect('ecommerce/order/viewcart');
    die;
}

$order_detail = FHtml::decode(FHtml::getFieldValue($model, ['order_detail', 'order_note']));
$order_items = FHtml::getModels('ecommerce_order_item', ['order_id' => $model->id ]);
$product_code = '';

foreach ($order_items as $order_item) {
    $product = $order_item->product;
    if (isset($product))
        $product_code .= $product->code . ', ';
}

$team_count = 0;
$order_date = FHtml::getFieldValue($model, ['order_date', 'created_date']);
$team_lead = '';
$order_code = FHtml::getFieldValue($model, ['id', 'code']);

if (!empty($order_detail) && is_array($order_detail)) {
    $team_count = count($order_detail);
    $team_lead = FHtml::getFieldValue($model, 'billing_name');
    foreach ($order_detail as $item) {
        if ($item['leader'] == 1)
            $team_lead = $item['firstname'] . ' ' . $item['lastname'];
    }
}

//var_dump($model->order_detail);

?>

<!--=== Content Part ===-->
<!--Invoice Header-->
<div class="row invoice-header">
    <div class="col-xs-6">
        <h1><?= FHtml::showCurrentLogo() ?></h1>
        <br/><br/>
    </div>
    <div class="col-xs-6 text-right">
        <h1><?= FHtml::t('common', $type) ?></h1>
        <br/><br/>
    </div>
</div>
<!--End Invoice Header-->

<!--Invoice Detials-->
<div class="row invoice-info" style="margin-bottom: 20px">
    <div class="col-xs-6">
        <div class="">
            <strong><?= FHtml::t('common', 'Client name') ?>:</strong> <?= FHtml::getFieldValue($model, 'billing_name') ?><br/>
            <strong><?= FHtml::t('common', 'Phone') ?>:</strong> <?= FHtml::getFieldValue($model, 'billing_phone') ?><br/>
            <strong><?= FHtml::t('common', 'Email') ?>:</strong> <?= FHtml::getFieldValue($model, 'billing_email') ?><br/>
            <strong><?= FHtml::t('common', 'Booking Date') ?>:</strong> <?= FHtml::showDate($order_date) ?><br/> <br/>

            <strong><?= FHtml::t('common', 'Lead Traveler') ?>:</strong> <?= $team_lead ?><br/>
            <strong><?= FHtml::t('common', 'Number of Travellers') ?>:</strong> <?= $team_count ?><br/>

        </div>
    </div>
    <div class="col-xs-6">
        <div class="tag-box tag-box-v3">
            <strong><?= FHtml::t('common', 'Booking Reference') ?>:</strong> <?= $order_code ?><br/>
            <strong><?= FHtml::t('common', 'Tour Codes') ?>:</strong> <?= $product_code ?><br/>
        </div>
    </div>
</div>
<!--End Invoice Detials-->

<!--Invoice Footer-->
<div class="row">
    <div class="col-xs-12">
        <?php
        if (!empty($order_items)) {
            foreach ($order_items as $order_item) {
                $product = Product::findOne(['id' => $order_item->product_id]);
                ?>
        <div class="tag-box tag-box-v3">
            <h3><b><?= $product->name ?></b></h3>
                <?= $product->content; ?>
        </div>

                <?php
            }
        }
        ?>
    </div>
</div>

<br/>
<!--Invoice Footer-->
<div class="row">
    <div class="col-xs-12">
        <div class="no-margin-bottom" style="color:grey">
            <address class="no-margin-bottom">
                <h4><?= FHtml::t('common', 'Important') ?></h4> <br>
                <?= FHtml::t('common', 'Your local contact: ') . FHtml::config('Tour Local Contact', FHtml::settingApplication(FHtml::SETTINGS_COMPANY_NAME) . ', ' . FHtml::settingApplication(FHtml::SETTINGS_COMPANY_PHONE)) ?><br/><br/>
                <?= FHtml::settingApplication('Tour Note', @"Please note: You must reconfirm directly with local contact at least 24 Hour(s) prior to your tour/activity date. <br/>
If you are not arriving within the specified timeframe, please contact local contact prior to your travels, or immediately
upon arrival at your destination. <br/>
Opening hours are between 08:00 and 20:00, Monday to Sunday. <br/>
Please be ready at least 10 minutes prior to departure time. <br/>
Due to the nature of this tour and the safety of all guests, the tour operator reserves the right
to refuse service to passengers who are intoxicated or show signs of intoxication. If, as a
result, your tour is canceled, you will not be entitled to a refund. <br/>
If you will not be arriving at your destination within the specified reconfirmation period, please
reconfirm with the local service provider prior to travel, or upon arrival at your destination. 
Please note that departure times and locations may vary slightly. <br/>
Minimum age is 18 years for the consumption of alcohol
", [], 'Travel', 'html') ?>
            </address>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div style="border-bottom: 1px solid lightgrey; padding-bottom: 100px; margin-bottom: 15px; margin-top: 30px">
            <h4><?= FHtml::t('common', 'Signature') ?></h4> <br>
        </div>
        <p>
            <?= FHtml::t('common', @'This voucher is not valid until signed by the Lead Traveler listed above, and presented at the
start of the tour, attraction or activity along with valid photo identification bearing the name of
the Lead Traveler') ?>
        </p>
        <div style="margin-bottom: 15px; margin-top: 30px">
            <h4><?= FHtml::t('common', 'Terms and Conditions') ?></h4> <br/>
            <p>
                <?= FHtml::t('common', @'Read our complete Terms & Conditions for information on cancellations, date changes and other
        modifications to this reservation by clicking this link: Terms and Conditions') ?>
            </p>
        </div>

    </div>
</div>


<!--End Invoice Footer-->
<!--=== End Content Part ===-->

