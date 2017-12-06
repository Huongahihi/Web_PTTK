<?php
use frontend\assets\CustomAsset;
use yii\helpers\Html;
use common\components\FHtml;
use yii\widgets\Pjax;

/* @var $content string */
/* @var $this \yii\web\View */
/* @var $user \common\models\User */

//Get base url
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$user = FHtml::currentUserIdentity();
$footer = FHtml::getRequestParam('footer') == 'no' ? '' : FHtml::settingWebsiteFooterView('footer.php');
$header = FHtml::getRequestParam('header') == 'no' ? '' : FHtml::settingWebsiteHeaderView('header.php');
$main_color = \common\components\FHtml::currentApplicationMainColor();
$page_width = \common\components\FHtml::settingWebsiteWidth('90%');
$fonts = \common\components\FHtml::settingWebsiteFonts('\'Helvetica Neue\',Helvetica,Arial,sans-serif');
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
<head class="hidden-print">
    <?= FHtml::getPageSEO('', $this->title, '', '') ?>
    <?= $this->render('head.php') ?>
    <?= Html::csrfMetaTags() ?>
    <?= FHtml::settingWebsitePageHeader() ?>
</head>
<body>

<?= FHtml::settingWebsitePageStyle() ?>

<?php $this->beginBody() ?>
    <!--=== Header ===-->
    <div class="header">
        <?= (empty($header) ? '' : $this->render($header)) ?>
    </div>
    <!--=== End Header ===-->
    <!--=== Content ===-->
        <?= $content ?>
    <!--=== End Content ===-->
    <!--=== Footer Version 3 ===-->
    <div class="main-footer">
        <?= (empty($footer) ? '' : $this->render($footer)) ?>
    </div>
    <!--=== End Footer Version 3 ===-->

<?= $this->render('foot.php') ?>

<?= \common\components\FHtml::settingPageStyleSheet(); ?>

<?= \common\components\FHtml::settingPageScript(); ?>

<?php $this->endBody() ?>

<?= FHtml::settingWebsitePageFooter('') ?>
<?php FHtml::showPageWidthScript(); ?>

</body><!-- Google Tag Manager -->
</html>
<?php $this->endPage() ?>
<style>
    .box-heading {
        font-size: 14px;
        font-weight: 400;
        min-height: 25px;
    }
    .button, .button-light, .button-transparent {

        font-size: 16px;
        line-height: 1;
        cursor: pointer;
        margin: 0;
    }
</style>

