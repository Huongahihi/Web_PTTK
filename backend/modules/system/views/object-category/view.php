<?php

use yii\helpers\Html;
use common\components\FHtml;


/* @var $this yii\web\View */
/* @var $model backend\models\ObjectCategory */

$folder = 'live/';
$controlName = '';
$currentRole = FHtml::getCurrentRole();

$moduleName = 'ObjectCategory';
$moduleTitle = 'Object Category';
$moduleKey = 'object-category';

$this->title = FHtml::t($moduleTitle);

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => 'index'];
$this->params['breadcrumbs'][] = FHtml::t('common', 'Detail');


if (FHtml::isInRole('', 'update', $currentRole))
{
    $controlName = $folder.'_view';
}
else
{
    $controlName = $folder.'_view';
}

?>
<div class="object-category-view">
    <?= $this->render($controlName, [
    'model' => $model, 'modulePath' => $moduleKey
    ]) ?>
</div>
