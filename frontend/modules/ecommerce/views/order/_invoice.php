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
$data = FEcommerce::getCartData();
$price = $data['price'];
$total_price = $data['total_price'];

$list_product = $data['data'];
$total = $data['total'];
$type = isset($type) ? $type : FHtml::t('common', 'Invoice');

$model = FEcommerce::getOrder();
if (empty($model)) {
    header("Location: /");
    die;
}
?>
<!--=== Content Part ===-->
<!--Invoice Header-->
<?= FHtml::showCurrentMessages() ?>
<div class="row invoice-header" style="border-bottom: 1px solid lightgray;">
    <div class="col-xs-6">
        <h2><?= FHtml::settingApplication(FHtml::SETTINGS_COMPANY_NAME) ?></h2> <br>
        <?=
        FHtml::showArrayAsTable(
            [
                'phone' => FHtml::settingCompanyPhone(),
                'email' => FHtml::settingCompanyEmail(false),
                'website' => FHtml::settingCompanyWebsite(),
                'address' => FHtml::settingCompanyAddress()
            ], 'line'
        )
        ?>
    </div>
    <div class="col-xs-6 text-right">
        <h2><?= FHtml::t('common', $type) ?></h2>
        <br/>
        PO: <?= FHtml::getFieldValue($model, 'id') ?> <br/>
        Date: <?= FHtml::showDate() ?>
    </div>
</div>
<!--End Invoice Header-->

<!--Invoice Detials-->
<div class="row invoice-info" style="padding-top:30px">
    <div class="col-xs-8" style="line-height: 200%">
        <h4 style="color:darkblue"><?= FHtml::t('common', 'Bill to') ?></h4>
        <strong><?= FHtml::t('common', 'Full name') ?>:</strong> <?= FHtml::getFieldValue($model, 'billing_name') ?>
        <br/>
        <strong><?= FHtml::t('common', 'Phone') ?>:</strong> <?= FHtml::getFieldValue($model, 'billing_phone') ?><br/>
        <strong><?= FHtml::t('common', 'Email') ?>:</strong> <?= FHtml::getFieldValue($model, 'billing_email') ?><br/>
        <strong><?= FHtml::t('common', 'Address') ?>:</strong> <?= FHtml::getFieldValue($model, 'billing_address') ?>
        <br/>
    </div>
    <div class="col-xs-4 tag-box tag-box-v3 no-margin-bottom text-right" style="">


    </div>
</div>
<br/><br/>
<!--End Invoice Detials-->

<!--Invoice Table-->
<div class="panel panel-default margin-bottom-40">
    <table class="table table-striped invoice-table table-borderd">
        <thead>
        <tr>
            <th>#</th>
            <th class="col-xs-2 text-left"></th>
            <th class="col-xs-7"><?= FHtml::t('common', 'Item') ?></th>
            <th class="col-xs-1 text-right"><?= FHtml::t('common', 'Unit Cost') ?></th>
            <th class="col-xs-1 text-center"><?= FHtml::t('common', 'Qty') ?></th>
            <th class="col-xs-1 text-right"><?= FHtml::t('common', 'Total') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        foreach ($list_product as $row) {
            $i = $i + 1;
            $total_price += $row['price'] * $row['quantity'];
            ?>
            <tr id="item_<?= $row['id'] ?>">
                <td><?= $i ?></td>
                <td> <?= \common\components\FHtml::showImage($row['image'], PRODUCT_DIR, '100%', 0, 'img-responsive full-width', $row['name'], false) ?>
                </td>
                <td class="product-in-table">
                    <strong style="font-size: 120%"><?= $row['name'] ?></strong> <br/>
                    <div style="font-size:80%; color:lightgray"><?= $row['overview'] ?></div>
                </td>
                <td class="product-price text-right"><?= FHtml::showCurrency($row['price']) ?></td>
                <td class="product-price text-center">
                    <?= FHtml::showNumber($row['quantity']) ?>
                </td>
                <td class="product-price text-right" id="price_<?= $row['id'] ?>">
                    <b><?= FHtml::showCurrency($row['price'] * $row['quantity']); ?></b>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
<!--End Invoice Table-->
<br/>
<!--Invoice Footer-->
<div class="row">
    <div class="col-xs-6">

    </div>
    <div class="col-xs-6 text-right" style="padding-left:20px;">
        <?= $this->render('_summary', ['data' => $data]) ?>
        <div style="padding:10px">&nbsp;</div>
        <button class="btn-u btn btn-default sm-margin-bottom-10 hidden-print" onclick="javascript:window.print();"><i
                    class="fa fa-print"></i> PRINT
        </button>

    </div>
</div>

<!--End Invoice Footer-->
<!--=== End Content Part ===-->



