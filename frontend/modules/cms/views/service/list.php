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

/* @var $product \backend\modules\cms\models\CmsService */
/* @var $this yii\web\View */
/* @var $products array */
/* @var $page integer */
/* @var $category_id integer */
/* @var $title string */
/* @var $keyword string */
/* @var $total int */
/* @var $start_index int */

$asset = CustomAsset::register($this);

$object_type = FHtml::settingPageObject('service'); // table name or query name

$category_id = isset($category_id) ? $category_id : FHtml::currentCategoryId(); // get Category_ID on Url Params
$category = isset($category) ? $category : FHtml::currentCategory($category_id); // get
$data = isset($data) ? $data : FHtml::getPageModelsList($object_type);
//$models = isset($models) ? $models : $data->getViewModels();
$keyword = isset($keyword) ? $keyword : FHtml::getRequestParam('keyword');

$this->title = FHtml::settingPageTitle('Service') . ' - ' . FHtml::getFieldValue($category, 'name');
$main_color = FHtml::currentApplicationMainColor();
$application = FHtml::currentApplicationFolder();
$controlName1 = "@applications/$application/frontend/service/_list.php";

?>

<?= FHtml::render([$controlName1, '_list'], [
    'object_type' => $object_type,
    'category_id' => $category_id,
    'category' => $category,
    'main_color' => $main_color,
//    'items' => $models,
//    'pagination' => $data->pagination,
//    'total' => $data->totalCount,
    'keyword' => FHtml::getRequestParam('keyword'),
//    'data' => $data,
]) ?>



