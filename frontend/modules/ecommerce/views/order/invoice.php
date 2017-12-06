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

$controlName = FHtml::settingPageView('_invoice');
$title = FHtml::settingPageTitle('Invoice');
$main_color = FHtml::currentApplicationMainColor();

?>
<div class="wrapper">
    <div class="content-md margin-bottom-30" style="padding-top:50px; padding-bottom:50px">
        <div class="container">
            <form class="shopping-cart" name="" action="#"
                  method="post">
                <div class="wizard">
                   <section>
                        <?= FHtml::render($controlName, [
                            'title' => $title,
                            'main_color' => $main_color
                        ]) ?>

                    </section>

                </div>
                <br/><br/>
                <?= FHtml::render('_buttons') ?>
            </form>
        </div><!--/end container-->
    </div>
</div>
