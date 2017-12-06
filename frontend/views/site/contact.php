<?php

use frontend\assets\CustomAsset;
use common\components\FHtml;


/* @var $this yii\web\View */
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$this->title = FHtml::t('common', 'Contact');

$application = FHtml::currentApplicationFolder();
$controlName = "@applications/$application/frontend/_contact.php";

?>
<?=  FHtml::render([$controlName, '@frontend/views/site/_contact.php'], []) ?>
