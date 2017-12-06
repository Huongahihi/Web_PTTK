<?php
/**
 * Created by PhpStorm.
 * User: Darkness
 * Date: 9/6/2016
 * Time: 4:43 PM
 */

/* @var $model \frontend\models\ViewModel */
/* @var $this yii\web\View */


use common\components\FHtml;

$controlName = '_complete_travel'; //FHtml::settingPageView('_complete');
$title = FHtml::settingPageTitle('Complete');
$main_color = FHtml::currentApplicationMainColor();

?>
<div class="wrapper">
    <div class="content-md margin-bottom-30" style="padding-top:50px; padding-bottom:50px">
        <div class="container">
            <h3 class="hidden-print">
                <?= FHtml::showMessage(FHtml::settingPageView('THANK YOU MESSAGE', 'Order Confirmation. Please Download your Tour Vouchers Below. We Look Forward to see you at Trayolo Again', [], 'Ecommerce')) ?>
            </h3>
            <br/>
            <div class="wizard">
                <section class="cart-info" style="padding: 20px;border: dotted #eee 4px" class="border">
                <?= FHtml::render($controlName, [
                    'title' => $title,
                    'main_color' => $main_color
                ]) ?>

                </section>
                <button class="btn-u sm-margin-bottom-10 hidden-print" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print
                </button>
            </div>
            <br/><br/>
            <?= FHtml::render('_buttons') ?>
        </div><!--/end container-->
    </div>
</div>
