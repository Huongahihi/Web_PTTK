<?php
/**
 * Created by PhpStorm.
 * User: Quan
 * Date: 14/07/2017
 * Time: 16:22 CH
 */
use common\components\FHtml;
use backend\modules\cms\models\CmsContact;

$show_border = isset($show_border) ? $show_border : false;
$background_css = isset($background_css) ? $background_css : true;
$skype = isset($skype) ? $skype : FHtml::settingCompanyChat(false);
$email = isset($email) ? $email : FHtml::settingCompanyEmail(false);
$phone = isset($phone) ? $phone : FHtml::settingCompanyPhone();
$title = isset($title) ? $title : '';

// border: 1px solid #ddd
?>
<style type="text/css">
    .contact-info {
        border: <?php if($show_border) echo 1; else echo 0; ?>px solid #ddd;
        padding-left: 30px;
    <?= $background_css ?>;
       margin-bottom: 0px !important;
    }

    .contact-info p a {
        font-size: 12pt !important;
        font-weight: bold;
        margin-top: -5px;
    }

    .info-single i {
        border-radius: 50%;
        float: left;
        font-size: 20px;
        height: 40px;
        line-height: 38px;
        margin-bottom: 10px;
        margin-right: 15px;
        text-align: center;
        width: 40px;
    }
</style>
<?php if ($show_border) {
    echo "<div style='padding:20px; border: 1px dashed lightgray'>";
} ?>
    <div class="contact-info col-sm-12">
        <div class="row">
            <div class="row info-single">
                <i class="fa fa-skype " aria-hidden="true" style="color: #00AFF0;border: 1px solid #00AFF0;"></i>
                <p style="margin-top:10px;color: #00AFF0"><a style="display: inline-block; color: royalblue;"
                                                             href="skype:<?= $skype ?>?chat"><?= $skype ?></a>
                </p>
            </div>

            <div class="row info-single">
                <i class="fa fa-phone" aria-hidden="true" style="color: #43B51F;border: 1px solid #43B51F;"></i>
                <p style="margin-top:10px;color: #43B51F;"><a style="display: inline-block; color: forestgreen;"
                                                              href="skype:<?= $skype ?>?call"><?= $phone ?></a>
                </p>
            </div>

            <div class="row info-single">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <p style="margin-top:10px;color: #e09e25"><a style="display: inline-block; color: darkorange;"
                                                             href="mailto:<?= $email ?>"><?= $email ?></a>
                </p>
            </div>


        </div>
    </div>
<?php if ($show_border) {
    echo '</div>';
} ?>