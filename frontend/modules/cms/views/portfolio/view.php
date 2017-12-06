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

$id = \common\components\FHtml::getRequestParam('id');
$object_type = 'cms_portfolio';
$model = FHtml::getModel($object_type, '', $id)->toViewModel();
$title = FHtml::t('common', 'Portfolio');
$application = FHtml::currentApplicationFolder();
$controlName1 = "@applications/$application/frontend/portfolio/_view.php";
?>

<?= FHtml::render([$controlName1, '_view'], [
    'model' => $model,
    'object_type' => $object_type,
    'title' => $this->title
]) ?>

