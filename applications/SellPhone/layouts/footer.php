<?php
use applications\mozaweb\Mozaweb;
use backend\models\ObjectCategory;
use frontend\assets\CustomAsset;
use common\components\FHtml;
use common\widgets\flogin\FLogin;

/* @var $this \yii\web\View */

//Get base url
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$baseUrl .= "/applications/SellPhone/assets/";
?>
<style>
    .main-footer
    {
        height: 300px;
    }
    .footer-sitemap li li a {
        margin: 10px 0;
        display: block;
        font-size: 14px;
        color: #7b7b7b;
    }
</style>
<footer class='main-footer'>
       <div class='footer-prominent-area'>
            <div class='wrapper g'>
                <div class='gi lap-one-third'>
                    <a class='footer-prominent-button primary' href='#'>
                        <span class='img'>
                            <img alt='' src='<?= $baseUrl ?>img/logo-3.png'>
                        </span>
                        <span class='text'>OPPO社区</span>
                    </a>
                </div>
                <div class='gi lap-one-third'>
                    <a class='footer-prominent-button secondary' href='#'>
                        <span class='img'>
                            <img alt='' src='<?= $baseUrl ?>img/logo-1.png'>
                        </span>
                        <span class='text'>ColorOs</span>
                    </a>
                </div>
                <div class='gi lap-one-third'>
                    <a class='footer-prominent-button tertiary' href='#'>
                        <span class='img'>
                            <img alt='' src='<?= $baseUrl ?>img/logo-2.png'>
                        </span>
                        <span class='text'>可可软件商店</span>
                    </a>
                </div>
            </div>
        </div>
    <div class='footer-sitemap'>
        <nav class='wrapper'>
            <ul class='g'>
                <li class='gi lap-one-fifth'>
                    <a class='m-item' href='/smartphones'>Sản Phẩm Nổi Bật</a>
                    <ul>
                        <li>
                            <a target="_blank" href='http://oppomobile.vn/oppo-f3-plus'>OPPO F3 Plus</a>
                        </li>
                        <li>
                            <a target="_blank" href='http://oppomobile.vn/oppo-f5'>OPPO F5</a>
                        </li>
                        <li>
                            <a target="_blank" href='http://oppomobile.vn/oppo-f3-lite'>OPPO F3 Lite (A57)</a>
                        </li>
                        <li>
                            <a target="_blank" href='http://oppomobile.vn/oppo-a71'>OPPO A71</a>
                        </li>

                    </ul>
                </li>
                <li class='gi lap-one-fifth'>
                    <a class='m-item' href='http://oppomobile.vn/dieu-khoan-mua-hang'>Mua hàng trực tuyến</a>
                    <ul>
                        <li>
                            <a href='http://oppomobile.vn/dieu-khoan-mua-hang'>Điều khoản mua hàng</a>
                        </li>
                        <li>
                            <a href='http://oppomobile.vn/chinh-sach-giao-hang'>Chính sách giao hàng</a>
                        </li>
                        <li>
                            <a href='http://oppomobile.vn/quy-dinh-bao-mat-thong-tin'>Chính sách bảo mật</a>
                        </li>

                    </ul>
                </li>
                <li class='gi lap-one-fifth'>
                    <a class='m-item' href='/support'>Hỗ Trợ</a>
                    <ul>
                        <li>
                            <a href='/support/customerservicecenter'>Trung tâm CSKH</a>
                        </li>
                        <li>
                            <a href='/support/checkwarranty'>Kiểm tra máy bảo hành</a>
                        </li>
                        <li>
                            <a href='/support/imeicheck'>Kiểm tra máy chính hãng</a>
                        </li>
                        <li>
                            <a href='/support/download'>Tải ROM</a>
                        </li>
                        <li>
                            <a href='http://www.oppomobile.vn/forum/faq/'>Hướng dẫn sử dụng</a>
                        </li>

                    </ul>
                </li>
                <li class='gi lap-one-fifth'>
                    <a class='m-item' href='/about'>Giới Thiệu</a>
                    <ul>
                        <li>
                            <a href='/about'>OPPO</a>
                        </li>
                        <li>
                            <a href='http://vieclam.oppomobile.vn/'>Việc làm</a>
                        </li>
                        <li>
                            <a href='/about/press'>Tin tức</a>
                        </li>


                    </ul>
                </li>
                <li class='gi lap-one-fifth'>
                    <a class='m-item' href='/support/contact'>Liên Hệ</a>
                    <ul>
                        <li>
                            <div class="foot-tel">
                                <p class="foot-wz-01 foot-tel-01">1800-577-776</p>
                                <p class="foot-wz-02">Tổng đài hỗ trợ miễn phí</p>
                                <p class="foot-wz-02">Từ T2-T6 : 8h-21h</p>
                                <p class="foot-wz-02">T7: 8h-17h30</p>
                                <p class="foot-wz-02">CN & ngày lễ: nghỉ</p>
                            </div>
                        </li>
                        <li>
                            <div class="foot-email">
                                <a href="mailto:service@oppomobile.vn" style="margin:0"><p class="foot-wz-01 foot-tel-01">service@oppomobile.vn</p></a>
                                <p class="foot-wz-02">Email hỗ trợ trực tuyến</p>
                            </div>
                            <style>
                                .foot-email {
                                    background: url("http://oppomobile.vn<?= $baseUrl ?>img/email.png") no-repeat scroll 0 10px;
                                }
                            </style>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <div class='footer-info'>
        <div class='wrapper'>
            <p>© 2005 - 2016 OPPO Việt Nam</p>
        </div>
    </div>
</footer>
<?= \common\widgets\fbutton\FButton::widget(['display_type'=>'phone']) ?>
<?= \common\widgets\fcontact\FContact::widget(['display_type'=>'contactfooter']) ?>