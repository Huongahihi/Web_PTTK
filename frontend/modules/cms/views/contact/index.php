<?php
/**
 * Created by PhpStorm.
 * User: tongd
 * Date: 2017-07-03
 * Time: 10:10
 */
use frontend\assets\CustomAsset;
use common\components\FHtml;


/* @var $this yii\web\View */
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$this->title = 'About';

$application = FHtml::currentApplicationFolder();
$main_color = FHtml::currentApplicationMainColor();
$controlName = "@applications/$application/frontend/_contact.php";
//echo '<pre>'; echo $controlName; die;
?>
<?=  FHtml::render([$controlName, '_contact'], []) ?>