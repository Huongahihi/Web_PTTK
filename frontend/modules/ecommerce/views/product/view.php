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

$object_type = FHtml::settingPageObject('product'); // table name or query name
$model = FHtml::getPageViewModel($object_type);

$title = FHtml::settingPageTitle('Product');
$main_color = FHtml::currentApplicationMainColor();
$application = FHtml::currentApplicationFolder();
$controlName1 = "@applications/$application/frontend/products/_view.php";
$id = isset($id) ? $id : FHtml::getRequestParam('id');

$category_id = isset($category_id) ? $category_id : FHtml::getRequestParam('category_id');
$model_others = isset($model_others) ? $model_others : null;

?>

<?= FHtml::render([$controlName1, '_view'], [
    'model' => $model,
    'id' => $id,
    'category_id' => $category_id,
    'model_others' => $model_others,
    'object_type' => $object_type,
    'title' => $title,
    'main_color' => $main_color
]) ?>

    <script type="text/javascript">
        //plus
        function actionAdd(id, sl, action) {
            var url = '<?= FHtml::createUrl('ecommerce/cart/cart')  ?>';
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
                success: function (res) {
                    if (res == 'success') {
                        $.notify({
                            icon: 'fa fa-check-square-o',
                            message: "Add to cart success"
                        }, {
                            delay: 1000,
                            type: "success"
                        });
                        setTimeout(function () {
                            location.reload();
                        },1500);
                    } else {
                        $.notify({
                            icon: 'fa fa-check-square-o',
                            message: "Add to cart failed"
                        }, {
                            delay: 1000,
                            type: "danger"
                        });
                    }
                },
                error: function () {
                    $.notify({
                        icon: 'fa fa-check-square-o',
                        message: "Add to cart failed"
                    }, {
                        delay: 1000,
                        type: "danger"
                    });
                }
            });
        }
    </script>

