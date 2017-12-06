<?php
/**
 * Created by PhpStorm.
 * User: tongd
 * Date: 6/19/2017
 * Time: 12:43 AM
 */
use backend\modules\cms\models\CmsBlogs;
use common\components\FHtml;
use frontend\assets\CustomAsset;
use yii\widgets\LinkPager;


/* @var $this yii\web\View */
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$baseUrl .= '/applications/SellPhone/assets/';
$this->title = 'Blogs';
$blog= CmsBlogs::find()->select(['image', 'name' ,'overview'])->all();
?>
<!--=== Page Header ===-->
<?= \common\widgets\fheadline\FPageHeader::widget([
    'title' => $this->title, 'overview' => '', 'display_type' => 'pageheader_blank']) ?>
<!--=== End Page Header ===-->
<style type="text/css">
    .main{
        text-align: center;

    }
</style>
<div class="content" style="background-color: #e8e8ec;">
   <?php foreach($blog as $item): ?>
    <div class="main">
        <?= $item->showImage('150px', '90px', '', 'img img-responsive') ?>

        <h1><?= $item->name ?></h1>
    </div>
<?php endforeach; ?>
</div>

