<?php
use frontend\assets\CustomAsset;
use frontend\components\Helper;
use common\components\FHtml;
use common\widgets\fcontact\FContact;

/* @var $model \frontend\models\ViewModel */
/* @var $this yii\web\View */
/* @var $category \backend\models\Category */

$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$main_color = FHtml::currentApplicationMainColor();
$overview = FHtml::t('common', 'Get in touch');
$model = new \frontend\models\ContactForm();
$data_contact = CmsContact::findAll();

?>

<!--=== Page Header ===-->
<?= \common\widgets\fheadline\FPageHeader::widget([
    'title' => FHtml::t('common', 'Contact'), 'overview' => $overview,
    'style' => FHtml::getBannerStyleCSS(null, 'contact')]) ?>
<!--=== End Page Header ===-->

<!--=== Contact ===-->
<div class="bg-color-light">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php if (!empty($message)) {
                    FHtml::showMessage($message . '<hr/>');
                }
                ?>

                <h1 style="color:cadetblue"><?= FHtml::t('common', 'Send us a Message') ?> </h1>
                <?= FContact::widget([
                    'model' => $model
                ]); ?>
                <hr/>

            </div>

            <div class="col-md-5">
                <?php foreach ($data_contact as $item): ?>
                    <div class="contact-info col-sm-12">
                        <div class="row">
                            <h4><span style="color: maroon"><?= FHtml::getFieldValue($item, 'name') ?></span></h4>
                            <div class="row info-single">
                                <i class="fa fa-map-marker"></i>
                                <p style="margin-top:10px"><?= FHtml::getFieldValue($item, 'address') ?></p>
                            </div>
                            <div class="row info-single">
                                <i class="fa fa-phone"></i>
                                <p style="margin-top:10px"><?= FHtml::getFieldValue($item, 'phone') ?></p>
                            </div>
                            <div class="row info-single">
                                <i class="fa fa-globe"></i>
                                <p style="margin-top:10px">Skype: <?= FHtml::getFieldValue($item, 'skype') ?>; <a href="mailto:<?= FHtml::getFieldValue($item, 'email') ?>"><?= FHtml::getFieldValue($item, 'email') ?></a></p>

                            </div>
                            <p><?= FHtml::getFieldValue($item, 'overview') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!--=== Contact ===-->