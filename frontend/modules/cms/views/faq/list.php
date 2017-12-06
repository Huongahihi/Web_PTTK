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

$object_type = 'cms_faq';
$title = FHtml::t('common', 'FAQs');

$page_size = FHtml::getRequestParam('per-page', FHtml::getCurrentPageSize());
$page = FHtml::getRequestParam('page');
$keyword = FHtml::getRequestParam('keyword');

$category_id = FHtml::getRequestParam('category_id');
if(!empty($category_id)){
    $category = \backend\models\ObjectCategory::findOne($category_id);
}

$search_params = '1 = 1';
if (strlen($category_id) != 0) {
    $search_params .= " AND category_id = $category_id";
}

if (strlen($keyword) != 0) {
    $search_params .= " AND ( name LIKE '%$keyword%' OR content LIKE '%$keyword%' )";
}

$data = FHtml::getModelsList($object_type, $search_params, [], $page_size, $page, false);
$items_top = FHtml::getModels($object_type, ['is_top' => 1]);

$this->title = $title;

$controlName = FHtml::settingApplication('_list_full');
$main_color = FHtml::currentApplicationMainColor();

?>

<?= $this->render($controlName, [
    'object_type' => $object_type,
    'main_color' => $main_color,
    'items' => $data->getViewModels(),
    'pagination' => $data->pagination,
    'total' => $data->totalCount,
    'items_top' => $items_top,
    'keyword' => $keyword,
    'data' => $data,
]) ?>



