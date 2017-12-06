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

$controlName = '_invoice';
$controlCheckout = '_checkout_cart';

$title = FHtml::settingPageTitle('View Cart');
$main_color = FHtml::currentApplicationMainColor();
?>

<div class="wrapper">
    <!--=== Header v5 ===-->
    <div class="content-md margin-bottom-30" style="padding-top:50px; padding-bottom:50px">
        <div class="container">
                <div class="wizard">
                    <?= FHtml::render('_step_cart', [
                        'main_color' => ''
                    ]) ?>

                    <div class="row">
                        <div class="col-md-8 col-xs-12">

                            <section class="cart-info" style="padding: 20px;border: solid #eee 1px" class="border"">
                            <?= FHtml::render($controlName, [
                                'title' => $title,
                                'main_color' => $main_color
                            ]) ?>
                            </section>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="hidden-print">
                                <?= FHtml::render('_checkout', [
                                    'title' => $title,
                                    'main_color' => $main_color
                                ]) ?>

                            </div>
                        </div>
                    </div>


                </div>

                <?= FHtml::render('_buttons') ?>
        </div><!--/end container-->
    </div>
</div>