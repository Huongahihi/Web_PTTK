<?php
use applications\mozaweb\Mozaweb;
use applications\SellPhone\SellPhone;
use frontend\assets\CustomAsset;
use common\components\FHtml;
use frontend\components\Helper;


/* @var $this \yii\web\View */
/* @var $user \common\models\User */

//Get base url
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$baseUrl .=  "/applications/SellPhone/assets/";
$user = FHtml::currentUserIdentity();

$data_menu = SellPhone::getFrontendMenu();
//echo "<pre>";
//print_r($data_menu);
//die;
$action = FHtml::currentAction();
$current_url = FHtml::currentUrlPath();
if (empty($current_url))
    $current_url = 'index.php';
?>

<!-- =================header================================ -->
<header>
    <div id="menu-top">
        <div class="container">
            <h4>SELLPHONE</h4>
        </div>
    </div>
    <div class="menu-top-2">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="logo" title="Về trang chủ oppomobile.vn" href="/"><img src="/templates/current/images/store/oppo/oppo_logo.png" alt="oppo"></a>
                    </div>
                    <style>
                        .fs-search{
                            float: left;
                            font-size: small;
                            margin-top: 10px;
                        }
                        .ficon f-cart {
                            display: inline-block;
                            background-repeat: no-repeat;
                            background-image: url(<?= $baseUrl ?>img/cart.png);
                        }
                        .navbar-right
                        {
                            float: left;
                        }
                    </style>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <div class="fs-search">
                                <form action="" method="get" autocomplete="off">
                                    <input class="fs-stxt" type="text" name="" placeholder="Nhập tên điện thoại cần tìm..." autocomplete="off" maxlength="50">
                                    <button type="submit" class="search-button"><i class="ficon f-search"></i></button>
                                    <div class="fs-sresult">
                                        <div class="fs-sremain">
                                            <ul></ul>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php foreach ($data_menu as $value): ?>
                            <?php if ($value['type'] != 'tree') { ?>
                            <li class="<?= \yii\helpers\StringHelper::endsWith($value['url'], $current_url) ? 'active' : '' ?>"><a href="<?= $value['url'] ?>">
                                    <?= $value['name'] ?></a></li>
                            <?php } else { ?>
                            <li class="<?= \yii\helpers\StringHelper::endsWith($value['url'], $current_url) ? 'active' : '' ?>">
                                <a href="<?= $value['url'] ?>"><?= $value['name'] ?> </a>
                                <?php } ?>
                                <?php if ($value['type'] == 'tree'): ?>
                                <ul class="dropdown-menu oppo_bg">
                                    <?php foreach ($value['children'] as $child): ?>
                                    <li class="oppo_hover transit"><a class="color_white" target="_blank" href="<?= $child['url'] ?>"><?= $child['name'] ?></a></li>
                                 <?php endforeach; ?>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <li><a data-pjax="0"
                                   href="<?= FHtml::createUrl('site/login') ?>"><?= FHtml::t('common', 'Log in') ?></a>
                            </li> </li>
                            <?= FHtml::showLangsMenu(true) ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</header>

