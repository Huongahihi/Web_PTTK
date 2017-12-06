<?php
use common\components\FHtml;
use frontend\components\FEcommerce;
use common\components\FFrontend;

$step=\common\components\FHtml::currentAction();
$home_url = isset($home_url) ? $home_url : FFrontend::createUrl('store');
$clear_url = isset($clear_url) ? $home_url : FFrontend::createCartViewUrl(['action' => 'clear']);
if ($step == 'viewcart') {
    $next_url = isset($next_url) ? $next_url : 'bill';
    $previous_url = ''; //isset($previous_url) ? $previous_url : FHtml::createUrl('ecommerce\product');
    $next_label = 'Proceed to Checkout';
    $previous_label = 'Back';
} else if ($step == 'bill') {
    $next_url = isset($next_url) ? $next_url : 'checkout';
    $previous_url = isset($previous_url) ? $previous_url : FFrontend::createCartViewUrl();
    $next_label = 'Make Payment';
    $previous_label = 'Back';
} elseif  ($step == 'checkout') {
    $next_url = isset($next_url) ? $next_url : '';
    $previous_url = isset($previous_url) ? $previous_url : FFrontend::createCartBillUrl();
    $next_label = 'Complete';
    $previous_label = 'Back';
}
elseif  ($step == 'complete') {
    $next_url = isset($next_url) ? $next_url : '';
    $previous_url = isset($previous_url) ? $previous_url : '';
    $next_label = 'Complete';
    $previous_label = 'Back';
}

if (FEcommerce::isEmptyCart()) {
    $next_label = '';
    $next_url = '';
    $clear_url = '';
}

?>
<style>
    #btn-4{
        background-color: #7b1315;
        border: none;
        color: white;
    }
    @media only screen and (max-width: 479px) {
        #btn-1,#btn-2,#btn-3{
            margin-bottom: 10px;
        }
    }
    @media only screen and (max-width: 768px) {
        #btn-4{
            margin-top: 10px;
        }
    }
</style>

<div class="row " style=" border: 1px solid #eee;padding:15px; background-color: #f0f1f2; ">
    <div class="large-12 medium-12  columns" style="width:100%;clear:both">
        <a href="<?= $home_url ?>" id="btn-1" type="submit" name="order" value="Order" class="pull-left btn btn-primary btn-lg"><?= FHtml::t('common', 'Continue to browse')?></a>
        <?php if (!empty($next_url)) { ?>
            <a href="<?= $clear_url ?>" id="btn-2" type="submit" name="Complete" value="Complete" class="pull-left btn btn-danger btn-lg" style="margin-left:15px"><?= FHtml::t('common', 'Clear Cart')?></a>
        <?php } ?>
        <?php if (!empty($next_url)) { ?>
            <input style="margin-top: 0;" id="btn-4" type="submit" name="order" value="<?= FHtml::t('common', $next_label)?>" class="pull-right btn btn-success btn-lg">
        <?php } ?>
        <?php if (!empty($previous_url)) { ?>
            <div class="pull-right btn btn-default btn-lg" style="margin-right: 10px">
                <a href="<?= $previous_url ?>" type="submit" name="order" value="Order" class=""><?= FHtml::t('common', $previous_label)?></a>
            </div>
        <?php } ?>
    </div>
</div>


<?php $this->registerJs("
    if ($(window).width() < 768) {
            $('#btn-checkout').removeClass('pull-right');
    } else {
        
    }
"); ?>