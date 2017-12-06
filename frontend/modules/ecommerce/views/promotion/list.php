<?php
/**
 * Created by PhpStorm.
 * User: Darkness
 * Date: 9/6/2016
 * Time: 4:43 PM
 */
use frontend\assets\CustomAsset;
Use frontend\components\Helper;
use common\components\FHtml;

/* @var $product \backend\modules\ecommerce\models\Products */
/* @var $this yii\web\View */
/* @var $products array */
/* @var $page integer */
/* @var $category_id integer */
/* @var $title string */
/* @var $keyword string */
/* @var $total int */
/* @var $start_index int */

$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;

$object_type = FHtml::settingPageObject('promotion'); // table name or query name

$category_id = FHtml::currentCategoryId(); // get Category_ID on Url Params
$category = FHtml::currentCategory(); // get

$data = FHtml::getPageModelsList($object_type);

$this->title = FHtml::settingPageTitle('Promotions');
$controlName = FHtml::settingPageView('_list_full');
$main_color = FHtml::currentApplicationMainColor();

?>

<?= $this->render($controlName, [
    'object_type' => $object_type,
    'main_color' => $main_color,
    'items' => $data->getViewModels(),
    'pagination' => $data->pagination,
    'total' => $data->totalCount,
    'keyword' => FHtml::getRequestParam('keyword'),
    'data' => $data,
]) ?>



