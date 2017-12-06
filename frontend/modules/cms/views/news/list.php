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

$object_type = 'cms_blogs';
$title = FHtml::t('common', 'News');
$this->title = $title;

$page_size = FHtml::getRequestParam('per-page', 6);
$page = FHtml::getRequestParam('page');
$keyword = isset($keyword) ? $keyword : FHtml::getRequestParam(['keyword', 'tag']);

$category_id = isset($category_id) ? $category_id : FHtml::getRequestParam('category_id');

$category  = null;
if(!empty($category_id)){
    $category = \backend\models\ObjectCategory::findOne($category_id);
}

$search_params = [];
if (strlen($category_id) != 0) {
    $search_params = array_merge($search_params, ['category_id' => $category_id]);
}

if (strlen($keyword) != 0) {
    $search_params = "(tags LIKE '%$keyword%')";
}
$order_by = FHtml::getRequestParam('order', 'featured');
if ($order_by == 'featured')
    $order_by = [];
else if ($order_by == 'recent')
    $order_by = 'created_date desc';
else if ($order_by == 'top')
    $order_by = 'count_views desc';

$this->title = $title;
$controlName1 = '';
$application = FHtml::currentApplicationFolder();

if (empty($category_id) && empty($keyword)) {
    $controlName = '_list_full';
    $page_size = 6;
    $controlName1 = "@applications/$application/frontend/news/_list_full.php";
}
else {
    $controlName1 = "@applications/$application/frontend/news/_list_category.php";
    $controlName = '_list_category';
    $page_size = 9;
}

$controlName1 = "@applications/$application/frontend/news/_list_category.php";
$controlName = '_list_category';
$page_size = 9;

$data = FHtml::getModelsList($object_type, $search_params, $order_by, $page_size, $page, false);
$main_color = FHtml::currentApplicationMainColor();

?>

<?= FHtml::render([$controlName1, $controlName], [
    'object_type' => $object_type,
    'main_color' => $main_color,
    'items' => $data->getViewModels(),
    'pagination' => $data->pagination,
    'total' => $data->totalCount,
    'category' => $category,
    'category_id' => $category_id,
    'keyword' => $keyword,
    'data' => $data,
]) ?>



