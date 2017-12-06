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

$controlName = FHtml::settingApplication( '_view_normal');
$id = \common\components\FHtml::getRequestParam('id');
$object_type = 'cms_employee';
$model = FHtml::getModel($object_type, '', $id)->toViewModel();
$title = FHtml::t('common', 'Team');

?>

<?= $this->render($controlName, [
    'model' => $model,
    'object_type' => $object_type,
    'title' => $this->title
]) ?>

