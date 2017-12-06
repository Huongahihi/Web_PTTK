<?php
use frontend\assets\CustomAsset;
use common\components\FHtml;


/* @var $this yii\web\View */
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$this->title = 'Store';



$application = FHtml::currentApplicationFolder();
$main_color = FHtml::currentApplicationMainColor();
$controlName = "../../../applications/$application/frontend/_store.php";
?>

<?=  FHtml::render([$controlName, '_store'], []) ?>



