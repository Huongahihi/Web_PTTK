<?php
use backend\assets\CustomAsset;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use common\components\PageToolbar;
use common\components\FHtml;

/* @var $content string */
/* @var $this \yii\web\View */
/* @var $user \common\models\User */

//Get base url
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$user = Yii::$app->user->identity;
$layout = FHtml::getRequestParam('layout');

if ($layout == 'no') {
    echo $content;
    die;
}

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <!--[if IE 8]>
    <html lang="<?= Yii::$app->language ?>" class="ie8 no-js"> <![endif]-->
    <!--[if IE 9]>
    <html lang="<?= Yii::$app->language ?>" class="ie9 no-js"> <![endif]-->
    <!--[if !IE]><!-->
    <html lang="<?= Yii::$app->language ?>">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head class="hidden-print">
        <?= $this->render('head.php') ?>
        <?= Html::csrfMetaTags() ?>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->beginBody() ?>

    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top hidden-print">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <div style="float:left; margin-top: -5px">
                    <?= FHtml::showCurrentLogo('', '30px') ?>
                </div>
                <div class="menu-toggler sidebar-toggler">
                    <span>

                    </span>
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
               data-target=".navbar-collapse">
                <span></span>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu pull-left nav navbar-nav" style="background-color: #eef1f5; padding:16px">
                <b><?= FHtml::t('common', $this->title) ?></b>&nbsp;
                <?= (FHtml::isRoleAdmin() && FHtml::isSystemAdminEnabled() && !FHtml::isInArray(FHtml::currentModule(), ['system', '']))
                    ? FHtml::createLink('system/object-type/update', ['id' => FHtml::currentObjectType()], BACKEND, '<span class="glyphicon glyphicon-cog text-default small"></span>', '_blank', '') : '' ?>
            </div>
            <div class="pull-left" style="width:100px; background-color: white"></div>

            <div class="top-menu" style="">

                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user">

                        <?= FHtml::showLangsMenu() ?>

                    </li>
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <?php if (isset($user)) { ?>
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               data-close-others="true">
                                <?= FHtml::showCurrentUserAvatar() ?>
                                <span
                                    class="username username-hide-mobile"><?php echo ucwords($user->username) ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo FHtml::createUrl('/user/update', ['id' => FHtml::currentUserId()]) ?>">
                                        <i class="icon-user"></i> <?= FHtml::t('common', 'Profile') ?> </a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="<?php echo FHtml::createUrl('/site/logout') ?>"
                                       data-method="post">
                                        <i class="icon-key"></i> <?= FHtml::t('common', 'Log Out') ?> </a>
                                </li>
                            </ul>
                        </li>

                    <?php } ?>
                    <!-- END USER LOGIN DROPDOWN -->

                </ul>

            </div>
            <!-- END TOP NAVIGATION MENU -->

            <div class="application-title text-center">
                <div class="" style="font-size: 18pt">
                    <b> <?= strtoupper(FHtml::settingCompanyName()) ?></b> - <?= FHtml::settingCompanyDescription() ?>
                    <?php if (APPLICATIONS_ENABLED && FHtml::isRoleAdmin()) { ?>
                        <a href="<?= FHtml::createUrl('system/application') ?>" style="color:white !important;"><span class="glyphicon glyphicon-triangle-right"></span></a>
                    <?php } ?>
                </div>

            </div>
        </div>

        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->

    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"></div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <?php if (isset($user)) { ?>
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper hidden-print">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <?php
                if (isset($user))
                    echo $this->render('menu.php')
                ?>
                <!-- END SIDEBAR -->
            </div>
        <?php } ?>

        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <?php
                if ($this->params['displayPageContentHeader'] == true) { ?>
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <!-- END THEME PANEL -->
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => ['class' => 'breadcrumb hidden-print']
                    ]) ?>
                    <div class="pt-toolbar">
                        <?php if (isset($this->params['toolBarActions'])): ?>
                            <?= PageToolbar::widget(['toolBarActions' => isset($this->params['toolBarActions']) ? $this->params['toolBarActions'] : []]); ?>
                        <?php endif ?>
                    </div>

                    <!-- END PAGE HEADER-->
                <?php } ?>

                <!-- BEGIN PAGE CONTENT INNER -->
                <?= $content ?>
                <!-- END PAGE CONTENT INNER -->
            </div>
            <!-- END PAGE CONTENT BODY -->
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->

    <!-- BEGIN FOOTER -->
    <div class="page-footer hidden-print">
        <div class="page-footer-inner"> 2010 - <?= date('Y') ?> &copy;

            <b><a href="<?= FHtml::settingCompanyWebsite() ?>"
                  title="<?= FHtml::settingCompanyName() ?>"
                  target="_blank"><?= FHtml::settingCompanyName() ?></a></b>
            &nbsp;&nbsp; <?= FHtml::settingCompanySlogan() ?>
            &nbsp;&nbsp; <?= FHtml::settingCompanyAddress() ?>
            &nbsp;&nbsp; <?= FHtml::settingCompanyEmail() ?>
            &nbsp;&nbsp; <?= FHtml::settingCompanyPhone() ?>
            &nbsp;&nbsp; <?= FHtml::settingCompanyChat() ?>.
        </div>
        <div class="pull-right"><?= FHtml::settingCompanyPowerby() ?></div>

        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->

    <style>
        <?php if (\common\components\FConfig::settingThemePortletStyle() == 'none' || empty(\common\components\FConfig::settingThemePortletStyle())) { ?>
        .page-content {
            background-color: #fff !important;
        }
        .portlet.light {
            border: none !important;
            padding: 0px !important;
            background-color: #fff !important;
        }
        .portlet.light.bordered {
            border: none !important;
        }
        .portlet {
            box-shadow: none !important;
        }
        <?php } ?>
    </style>
    <script>
        var GlobalsAssetsPath = '<?php echo Yii::getAlias('@web') . '/themes/metronic/assets/' ?>';
    </script>
    <?= $this->render('footer.php') ?>

    <?php $this->endBody() ?>
    </body>
    <!-- END BODY -->
    </html>
<?php $this->endPage() ?>