<?php
/**
 * Created by PhpStorm.
 * User: Quan
 * Date: 18/05/2017
 * Time: 15:55 CH
 */
use frontend\assets\CustomAsset;
use common\components\FHtml;


/* @var $this yii\web\View */
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$this->title = 'About';

$application = FHtml::currentApplicationFolder();
$main_color = FHtml::currentApplicationMainColor();
$controlName = "@applications/$application/frontend/_about.php";
//echo '<pre>'; echo $controlName; die;
?>
<?=  FHtml::render([$controlName, '_about'], []) ?>

