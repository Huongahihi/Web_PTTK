
<?php
/**
 * Created by PhpStorm.
 * User: Darkness
 * Date: 9/6/2016
 * Time: 4:43 PM
 */

/* @var $model \backend\modules\cms\models\CmsService */
/* @var $this yii\web\View */
use common\components\FHtml;

$id = FHtml::getRequestParam('id');
$category_id = FHtml::getRequestParam('category_id');
$application = FHtml::currentApplicationFolder();
$object_type = 'cms_service';
$model = \backend\modules\cms\models\CmsService::findOne($id);
$title = FHtml::t('common', 'Services');
$controlName = "@applications/$application/frontend/service/_view.php";
?>

<?= FHtml::render([$controlName, '_view'], [
    'model' => $model,
    'object_type' => $object_type,
    'id' => $id,
    'category_id' => $category_id,
    'title' => $title
]) ?>


