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

/* @var $product \backend\models\Products */
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

$object_type = 'cms_portfolio';
$title = FHtml::t('common', 'Portfolio');

$page_size = FHtml::getRequestParam('per-page', FHtml::getCurrentPageSize());
$page = FHtml::getRequestParam('page');
$keyword = FHtml::getRequestParam('keyword');

$category_id = FHtml::getRequestParam('category_id');
if(!empty($category_id)){
    $category = \backend\models\ObjectCategory::findOne($category_id);
}

$search_params = '1 = 1';
//if (strlen($category_id) != 0) {
//    $search_params .= " AND category_id = $category_id";
//}

if (strlen($keyword) != 0) {
    $search_params .= " AND ( name LIKE '%$keyword%' OR overview LIKE '%$keyword%' OR content LIKE '%$keyword%' )";
}

$data = FHtml::getModelsList($object_type, $search_params, [], $page_size, $page, false);

$this->title = $title;

$main_color = FHtml::currentApplicationMainColor();
$application = FHtml::currentApplicationFolder();
$controlName1 = "@applications/$application/frontend/portfolio/_list.php";

?>

<?= FHtml::render([$controlName1, '_list'], [
    'object_type' => $object_type,
    'main_color' => $main_color,
    'items' => $data->getViewModels(),
    'pagination' => $data->pagination,
    'total' => $data->totalCount,
    'keyword' => $keyword,
    'data' => $data,
]) ?>



