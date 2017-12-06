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
use yii\widgets\Pjax;

$controlName = '_view_cart';
$title = FHtml::settingPageTitle('View Cart');
$main_color = FHtml::currentApplicationMainColor();
?>

<?php Pjax::begin(['id' => 'pjax-container']) ?>

<div class="wrapper">
    <div class="content-md margin-bottom-30" style="padding-top:50px; padding-bottom:50px">
        <div class="container">
            <form class="shopping-cart" action="<?= \common\components\FFrontend::createCartBillUrl() ?>" method="post">
                <div class="wizard" style="">
                    <?= FHtml::render('_step_cart', [
                        'main_color' =>''
                    ]) ?>
                    <section class="cart-info" style="padding: 20px;border: solid #eee 1px" class="border">
                    <?= FHtml::render($controlName, [
                        'title' => $title,
                        'main_color' => $main_color
                    ]) ?>
                    <?= FHtml::render('_buttons') ?>
                    </section>

                </div>
            </form>
        </div><!--/end container-->
    </div>
</div>
<?php Pjax::end() ?>

<script>
    function actionRemove(id, url) {
        var data = {
            id: id
        };
        quantity = parseInt($('#input_' + id).val());
        $.ajax({
            url: url,
            type: "post",
            dateType: "text",
            data: data,
            success: function (res) {
                if (res == 'success') {
                    $.notify({
                        icon: 'fa fa-check-square-o',
                        message: "Remove from cart success"
                    }, {
                        delay: 1000,
                        type: "success"
                    });
                    setTimeout(function () {
                        location.reload();
                    },100);
                } else {
                    $.notify({
                        icon: 'fa fa-check-square-o',
                        message: "Remove from cart failed"
                    }, {
                        delay: 1000,
                        type: "danger"
                    });
                }
            },
            error: function () {
                $.notify({
                    icon: 'fa fa-check-square-o',
                    message: "Remove from cart failed"
                }, {
                    delay: 1000,
                    type: "danger"
                });
            }
        })
        ;
    }

    function actionPlus(id, sl, action, url) {
        plus = "#plus_" + id;
        input = "#input_" + id;
        quantity = parseInt($(input).val());
        $(input).val(quantity + 1);
        var data = {
            id: id,
            sl: sl,
            action: action
        };
        $.ajax({
            url: url,
            type: "post",
            dateType: "text",
            data: data,
            success: function (result) {
            }
        });
    }

    function actionMinus(id, sl, action, url) {
        minus = "#minus_" + id;
        input = "#input_" + id;
        quantity = parseInt($(input).val());
        if (quantity > 1) {
            $(input).val(quantity - 1);
            var data = {
                id: id,
                sl: sl,
                action: action
            };
            $.ajax({
                url: url,
                type: "post",
                dateType: "text",
                data: data,
                success: function (result) {
                }
            });
        }
    }
</script>
