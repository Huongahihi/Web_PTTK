<?php
use frontend\assets\CustomAsset;
use common\components\FHtml;


/* @var $this yii\web\View */
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$this->title = 'Signup';

$application = FHtml::currentApplicationFolder();

$main_color = FHtml::currentApplicationMainColor();
$controlName = "../../../applications/$application/frontend/_signup.php";
?>
<?=  FHtml::render([$controlName, '_signup'], []) ?>
