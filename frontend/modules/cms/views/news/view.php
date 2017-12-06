<?php
/**
 * Created by PhpStorm.
 * User: Darkness
 * Date: 9/6/2016
 * Time: 4:43 PM
 */

/* @var $model \backend\models\News */
/* @var $this yii\web\View */
use common\components\FHtml;

$id = isset($id) ? $id : \common\components\FHtml::getRequestParam('id');
$category_id = isset($category_id) ? $category_id : FHtml::getRequestParam('category_id');
$application = FHtml::currentApplicationFolder();
$object_type = 'cms_blogs';
$model = \backend\modules\cms\models\CmsBlogs::findOne($id);
$title = FHtml::t('common', 'News');
$controlName = "@applications/$application/frontend/news/_view.php";
?>

<?= FHtml::render([$controlName, '_view'], [
    'model' => $model,
    'object_type' => 'cms_blogs',
    'id' => $id,
    'category_id' => $category_id,
    'title' => $title
]) ?>

