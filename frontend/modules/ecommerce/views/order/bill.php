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

$controlName = '_bill_cart';
$title = FHtml::settingPageTitle('Billing Info');
$main_color = FHtml::currentApplicationMainColor();

?>
<div class="wrapper">
    <div class="content-md margin-bottom-30" style="padding-top:50px; padding-bottom:50px">
        <div class="container">
            <form class="shopping-cart" name="" action="<?= FHtml::createUrl('ecommerce/order/order') ?>"
                  method="post">
                <div class="wizard">
                    <?= $this->render('_step_cart', [
                        'main_color' => ''
                    ]) ?>
                    <section class="cart-info" style="padding: 20px;border: solid #eee 1px;" class="border"">

                    <?= $this->render($controlName, [
                        'title' => $title,
                        'main_color' => $main_color
                    ]) ?>

                    </section>
                </div>
                <br/><br/>
                <?= $this->render('_buttons') ?>
            </form>

        </div><!--/end container-->
    </div>
</div>
