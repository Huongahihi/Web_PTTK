<?php

use frontend\assets\CustomAsset;
use common\components\FHtml;


/* @var $this yii\web\View */
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$this->title = FHtml::t('common', 'Login');

$application = FHtml::currentApplicationFolder();
$controlName = "@applications/$application/frontend/_login.php";
$message = isset($message) ? $message : '';
?>
<?=  FHtml::render([$controlName, '@frontend/views/site/_login.php'], ['message' => $message]) ?>
