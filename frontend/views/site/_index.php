<?php
use frontend\assets\CustomAsset;
use common\components\FHtml;

use backend\models\Product;
use frontend\components\Helper;
use backend\models\SaleOff;
use backend\models\News;
use backend\models\Testimonial;
use common\widgets\fheadline\FHeadline;
use common\widgets\fslider\FCMSSlide;
use common\widgets\fboxlist\FAbout;
use common\widgets\fboxlist\FBoxList;
use common\widgets\fgrid\FEmployee;
use common\widgets\fgrid\FTestimonial;
use common\widgets\fgrid\FPartner;
use common\widgets\JobContent;
use common\widgets\fgrid\FGrid;
use common\widgets\fquote\FQuote;
use common\widgets\flogin\FLogin;

use common\widgets\fgrid\FProduct;
use common\widgets\fcounter\FCounter;

use common\widgets\JobTeam;
use common\widgets\JobPartner;

/* @var $this yii\web\View */
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;

$main_color = FHtml::currentApplicationMainColor();

?>

    <?= FCMSSlide::widget([
    ]); ?>

    <div class="container content">
    <?= FAbout::widget([
        //'display_type' => '1',
        'width_css' => FHtml::WIDGET_WIDTH_FULL,
        'color'=>$main_color]); ?>

    <?= \common\widgets\fboxlist\FService::widget([
        'title' => FHtml::t('common', 'Our Services'),
        'icon_size' => 'icon-md',
        'width_css' => FHtml::WIDGET_WIDTH_FULL,
        'color'=>$main_color]); ?>

    <?= FProduct::widget([
        'title' => 'Popular Products', 'title_display_type' => FHtml::HEADLINE_TYPE_CENTER_V2,
        'color'=> $main_color,
        'image_height' => 150,
        'items_filter' => ['is_top' => 1],
        'items_count' => 12,
        'display_type' => 'fgrid2',
        //'background_css' => FHtml::WIDGET_BACKGROUND_PARRALAX,
        //'width_css' => FHtml::WIDGET_WIDTH_CONTAINER,
        'show_viewmore' => true,
        'field_type' => 'type',
        'field_type_colors' => [1 => 'red', 0 => 'green'],
        'viewmore_url' => 'product',
        'field_overview' => ['overview']]); ?>
    </div>

    <?= FEmployee::widget([
        'color' => $main_color,
        'items_filter' => ['is_top' => 1],
        'title' => Fhtml::t('common', 'Our Team'),
        'overview' => FHtml::t('common', 'Dedicated, Trusftul, Experienced'),
        'background_css' => FHtml::WIDGET_BACKGROUND_PARRALAX,
        'field_overview' => 'position',
        'display_type' => 'fgridpeople1',
        'columns_count' => 6,
        'show_viewmore' => false,
            'viewmore_url' => ''
        ]) ?>

    <?= FPartner::widget(['color' => $main_color,
        'items_filter' => ['is_top' => 1],
        'title' => Fhtml::t('common', 'Our Partners'),
        //'background_css' => FHtml::WIDGET_BACKGROUND_DARK,
        'viewmore_url' => '']) ?>


    <?= FCounter::widget(['color' => $main_color,
        'title' => Fhtml::t('common', 'Statistics'),
        //'display_type' => '1',
        //'background_css' => 'parallax-counter-v2 parallaxBg1',
        'width_css' => FHtml::WIDGET_WIDTH_CONTAINER,
        'viewmore_url' => '']) ?>

    <?= FTestimonial::widget(['color' => $main_color,
        'title' => Fhtml::t('common', 'Testimonials'),
        'items_filter' => ['is_top' => 1],
        'display_type' => 'ftestimonial',
        //'background_css' => FHtml::WIDGET_BACKGROUND_DARK,
        'viewmore_url' => '']) ?>

<?= FQuote::widget(['color' => $main_color,
    'background_css' => FHtml::WIDGET_BACKGROUND_DARK,
    'viewmore_url' => '']) ?>


