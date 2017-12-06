<?php
/**
 * Created by PhpStorm.
 * User: Quan
 * Date: 22/06/2017
 * Time: 14:56 CH
 */
use backend\models\ObjectCategory;
use backend\modules\ecommerce\models\Product;
use common\widgets\fcategory\FCategory;
use frontend\assets\CustomAsset;
use common\components\FHtml;
use frontend\components\Helper;
use yii\widgets\LinkPager;


/* @var $this yii\web\View */
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$baseUrl .= '/applications/SellPhone/assets/';
//$product = Product::find()->select(['name', 'overview', 'image', 'created_date'])->all();

$category_id = isset($category_id) ? $category_id : FHtml::getRequestParam('category_id');
if (is_numeric($category_id) && isset($category_id))
    $dataProvider = Product::getDataProvider(['category_id' => $category_id], 'created_date', '');
else
    $dataProvider = Product::getDataProvider([], 'created_date', '');

$categoties = isset($categoties) ? $categoties : Product::getModelCategories('product');

$pagination = $dataProvider->pagination;

$product = $dataProvider->models;
$product_other= Product::findAll();
//FHtml::showPre($product);

?>
<style type="text/css">
	h2{
		text-align: center;
	}
	.fs-itit {
    position: relative;
    margin: 0 0;
    text-transform: uppercase;
}
.fsicte {
	width: 1680px;
    background: #fff;
    position: relative;
    overflow: hidden;
}

</style>
 <div class='brick-m' style="background-color: #efebe7;">
    <section class='row wrapper'>
		<div class="fs-itit">
        	<h2 class='h-alpha'>Điện thoại OPPO</h2>
        </div>
        <div class='grid-box equalize'>
        	<div class="fsicte">
            <?php foreach ($product as $item): $top = FHtml::getFieldValue($item, 'category_id');
            $link_url= $item->createViewUrl('product');?>
                <?php if ($top == 35) { ?>
                    <div class='box'>
                <a class='box-photo' href='http://oppomobile.vn/oppo-f3-plus'>
                    <?= $item->showImage('1000px', '500px', '', 'img img-responsive') ?>
                </a>
                <h2 class='box-heading'>
                    <a href='http://oppomobile.vn/oppo-f3-plus'><?= $item->name ?></a>
                </h2>
                <h5 class='box-heading'>
                    <a href='http://oppomobile.vn/oppo-f3-plus'><?= $item->price ?> USD</a>
                </h5>
                <a class='button button-s' href='<?= $link_url ?>'>Chi Tiết</a>
                <!-- Ecomerce link -->
                <a class='button button-s' href="<?= $link_url ?>">Mua Ngay</a>
            </div>
            <?php }?>
            <?php endforeach; ?>

			</div>
        </div>
    </section>
    <section class='row wrapper'>
        <h2 class='h-alpha'>Điện thoại IPHONE</h2>
        <div class='grid-box equalize'>
        	<div class="fsicte">
            <?php foreach ($product as $item):  $top = FHtml::getFieldValue($item, 'category_id');
            $link_url= $item->createViewUrl('product');?>
            <?php if ($top == 34) { ?>
            <div class='box'>
                <a class='box-photo' href='http://oppomobile.vn/oppo-f3-plus'>
                    <?= $item->showImage('1000px', '500px', '', 'img img-responsive') ?>
                </a>
                <h2 class='box-heading'>
                    <a href='http://oppomobile.vn/oppo-f3-plus'><?= $item->name ?></a>
                </h2>
                <h5 class='box-heading'>
                    <a href='http://oppomobile.vn/oppo-f3-plus'><?= $item->price ?> USD</a>
                </h5>
                <a class='button button-s' href='<?= $link_url ?>'>Chi Tiết</a>
                <!-- Ecomerce link -->
                <a class='button button-s' href="<?= $link_url ?>">Mua Ngay</a>
            </div>
            <?php }?>
            <?php endforeach; ?>
        </div>
        </div>
    </section>
    <section class='row wrapper'>
        <h2 class='h-alpha'>Điện thoại SAMSUNG</h2>
        <div class='grid-box equalize'>
        	<div class="fsicte">
            <?php foreach ($product as $item):  $top = FHtml::getFieldValue($item, 'category_id');
            $link_url= $item->createViewUrl('product');?>
            <?php if ($top == 36) { ?>
            <div class='box'>
                <a class='box-photo' href='http://oppomobile.vn/oppo-f3-plus'>
                    <?= $item->showImage('1000px', '500px', '', 'img img-responsive') ?>
                </a>
                <h2 class='box-heading'>
                    <a href='http://oppomobile.vn/oppo-f3-plus'><?= $item->name ?></a>
                </h2>
                <h5 class='box-heading'>
                    <a href='http://oppomobile.vn/oppo-f3-plus'><?= $item->price ?> USD</a>
                </h5>
                <a class='button button-s' href='<?= $link_url ?>'>Chi Tiết</a>
                <!-- Ecomerce link -->
                <a class='button button-s' href="<?= $link_url ?>">Mua Ngay</a>
            </div>
            <?php }?>
            <?php endforeach; ?>
        </div>
    </div>
    </section>
</div>

