<?php
/**
 * Created by PhpStorm.
 * User: Quan
 * Date: 02/08/2017
 * Time: 15:32 CH
 */
use common\components\FHtml;

$height = (!empty($height) || !isset($height)) ? $height : "30px";
$background_css = (!empty($background_css) || !isset($background_css)) ? $background_css : '#337ab7';
$font_size = (!empty($font_size) || !isset($font_size)) ? $font_size : "22px";
$color = (!empty($color) || !isset($color)) ? $color : 'white';
$url = (!empty($url) || !isset($url)) ? $url : "#";
$title = (!empty($title) || !isset($title)) ? $title : \common\components\FHtml::t('common', 'Contact us now') . ' ! <i class="fa fa-phone" aria-hidden="true"></i> : ' . FHtml::settingCompanyPhone() . ' - <i class="fa fa-comments" aria-hidden="true"></i> : ' . FHtml::settingCompanyChat() . ' - <i class="fa fa-envelope" aria-hidden="true"></i> : ' . FHtml::settingCompanyEmail();
$margin = (!empty($margin) || !isset($margin)) ? $margin : 'auto';
?>
<style>
    #fix-bottom {
        z-index: 999;
        text-align: center;
        position: fixed;
        height: <?= $height ?>;
        bottom: 0;
        width: 100%;
        background-color: <?= $background_css ?>;

    }
    #fix-bottom a{
        margin: <?= $margin ?>;
        font-size: <?= $font_size ?>;
        color: <?= $color ?>;
    }
</style>

<div id="fix-bottom" class="fixed-bottom">
    <div class="container" >
        <a href="<?= $url ?>">  <?= $title ?></a>
    </div>
</div>

