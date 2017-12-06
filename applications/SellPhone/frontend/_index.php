<?php
/**
 * Created by PhpStorm.
 * User: BEHUONG
 * Date: 11/16/2017
 * Time: 5:07 PM
 */
    use frontend\assets\CustomAsset;
    use common\components\FHtml;
    use frontend\components\Url;
    /* @var $this yii\web\View */
    $asset = CustomAsset::register($this);
    $this->title = FHtml::t('common','Home') ;
    $baseUrl = $asset->baseUrl;
    $baseUrl .= '/applications/SellPhone/assets/';
?>
<section class="banner-wrap">
    <div class="owl-carousel owl-theme">
        <a href="http://www.shop.oppomobile.vn/smartphone/oppo-f3-plus">
            <div class="wrap-img">
                <img src="http://shop.oppomobile.vn/storage/app/uploads/public/597/aed/ceb/thumb_105_1920x700_0_0_auto.jpg" alt="">
            </div>
        </a>
    </div>
</section>
<section class='brick'>
    <h1>SELLPHONE- SẢN PHẨM TIN CẬY CHO KHÁCH HÀNG</h1>

    <div class='wrapper'>
        <div class='g g-wrapper-l'>
            <style>
                h1{
                    text-align: center;
                }
            </style>
            <div class='gi lap-one-half'>
                <div class='feature-product'>
                    <a target="_blank" href='http://oppomobile.vn/oppo-f3-plus'>
                        <img alt='ascdas' class='feature-product-image lazy' data-original='<?= $baseUrl ?>img/index1.png'>

                    </a>
                </div>
            </div>
            <div class='gi lap-one-half'>
                <div class='feature-product'>
                    <a target="_blank" href='http://oppomobile.vn/oppo-f5'>
                        <img alt='abc' class='feature-product-image lazy' data-original='<?= $baseUrl ?>img/index2.png'>

                    </a>
                </div>
            </div>
        </div>
    </div>
</section><section class='brick slab-light'>
    <div class='wrapper'>
        <div class='g animated-items equalize'>
            <div class='gi item-animated first-item'>
                <div class='item-animated-view'>
                    <a class='js-animated-item' href='http://oppomobile.vn/oppo-f3-plus'>
                        <h2 class='item-animated-title'>OPPO F3 Plus</h2>
                        <div class='photo'>
                            <img alt='OPPO F3 Plus' class="lazy" data-original='<?= $baseUrl ?>img/oppo1.png'>
                        </div>
                        <p class='item-animated-price'>10,690,000 VNĐ</p>
                    </a>
                    <!-- Extra content for Mobile E-comerce -->
                    <div class="mobile-tablets-btn-set-ec">
                        <a class="btn-ec" href='http://www.shop.oppomobile.vn/smartphone/oppo-f3-plus'>
                            Mua Ngay
                        </a>
                        <a class="btn-ec" href='http://oppomobile.vn/oppo-f3-plus'>Chi tiết</a>
                    </div>
                    <!-- End of Mobile E-comerce -->
                </div>
                <div class='item-animated-content'>
                    <h2 class='item-animated-title'>OPPO F3 Plus</h2>
                    <p class='item-animated-price'>10,690,000 VNĐ</p>
                    <p class='subtitle'>Chuyên gia selfie camera selfie kép</p>
                    <p class='item-animated-description'>- Camera Selfie góc rộng gấp đôi  <br> - Cảm biến vân tay một chạm <br> - Pin 4000mAh & VOOC</p>
                    <!-- E-commerce April 2017 -->
                    <div class="detail-btns-ec">
                        <a class='button-transparent' href='http://www.shop.oppomobile.vn/smartphone/oppo-f3-plus'>
                            Mua Ngay
                        </a>
                        <a class='button-transparent' href='http://oppomobile.vn/oppo-f3-plus'>
                            Chi tiết
                        </a>
                        <!-- End of E-commerce 2017 -->
                    </div>
                </div>
            </div>
            <div class='gi item-animated second-item'>
                <div class='item-animated-view'>
                    <a class='js-animated-item' href='http://oppomobile.vn/oppo-f5'>
                        <h2 class='item-animated-title'>OPPO F5</h2>
                        <div class='photo'>
                            <img alt='OPPO F5' class="lazy" data-original='<?= $baseUrl ?>img/oppo2.1.png'>
                        </div>
                        <p class='item-animated-price'>6,990,000 VNĐ</p>
                    </a>
                    <!-- Extra content for Mobile E-comerce -->
                    <div class="mobile-tablets-btn-set-ec">
                        <a class="btn-ec" href='http://www.shop.oppomobile.vn/smartphone/oppo-f5'>
                            Mua Ngay
                        </a>
                        <a class="btn-ec" href='http://oppomobile.vn/oppo-f5'>Chi tiết</a>
                    </div>
                    <!-- End of Mobile E-comerce -->
                </div>
                <div class='item-animated-content'>
                    <h2 class='item-animated-title'>OPPO F5</h2>
                    <p class='item-animated-price'>6,990,000 VNĐ</p>
                    <p class='subtitle'>Bắt trọn vẻ đẹp chân thực</p>
                    <p class='item-animated-description'>- Màn hình tràn 6" FHD+ <br> - Camera selfie AI thông minh <br> - Mở khoá khuôn mặt </p>
                    <!-- E-commerce April 2017 -->
                    <div class="detail-btns-ec">
                        <a class='button-transparent' href='http://www.shop.oppomobile.vn/smartphone/oppo-f5'>
                            Mua Ngay
                        </a>
                        <a class='button-transparent' href='http://oppomobile.vn/oppo-f5'>
                            Chi tiết
                        </a>
                        <!-- End of E-commerce 2017 -->
                    </div>
                </div>
            </div>
            <div class='gi item-animated third-item'>
                <div class='item-animated-view'>
                    <a class='js-animated-item' href='http://oppomobile.vn/oppo-f3-lite'>
                        <h2 class='item-animated-title'>OPPO F3 Lite (A57)</h2>
                        <div class='photo'>
                            <img alt='OPPO F3 Lite (A57)' class="lazy" data-original='<?= $baseUrl ?>img/oppo3.1.jpg'>
                        </div>
                        <p class='item-animated-price'>5,490,000 VNĐ</p>
                    </a>
                    <!-- Extra content for Mobile E-comerce -->
                    <div class="mobile-tablets-btn-set-ec">
                        <a class="btn-ec" href='http://www.shop.oppomobile.vn/smartphone/oppo-f3-lite'>
                            Mua Ngay
                        </a>
                        <a class="btn-ec" href='http://oppomobile.vn/oppo-f3-lite'>Chi tiết</a>
                    </div>
                    <!-- End of Mobile E-comerce -->
                </div>
                <div class='item-animated-content'>
                    <h2 class='item-animated-title'>OPPO F3 Lite (A57)</h2>
                    <p class='item-animated-price'>5,490,000 VNĐ</p>
                    <p class='subtitle'>Chuyên gia selfie</p>
                    <p class='item-animated-description'>- Camera trước 16MP<br> - RAM 3GB | ROM 32GB<br> - Cảm biến vân tay 1 chạm</p>
                    <!-- E-commerce April 2017 -->
                    <div class="detail-btns-ec">
                        <a class='button-transparent' href='http://www.shop.oppomobile.vn/smartphone/oppo-f3-lite'>
                            Mua Ngay
                        </a>
                        <a class='button-transparent' href='http://oppomobile.vn/oppo-f3-lite'>
                            Chi tiết
                        </a>
                        <!-- End of E-commerce 2017 -->
                    </div>
                </div>
            </div>
            <div class='gi item-animated fourth-item'>
                <div class='item-animated-view'>
                    <a class='js-animated-item' href='http://oppomobile.vn/oppo-a71'>
                        <h2 class='item-animated-title'>OPPO A71</h2>
                        <div class='photo'>
                            <img alt='OPPO A71' class="lazy" data-original='<?= $baseUrl ?>img/oppo4.1.png'>
                        </div>
                        <p class='item-animated-price'>4,690,000 VNĐ</p>
                    </a>
                    <!-- Extra content for Mobile E-comerce -->
                    <div class="mobile-tablets-btn-set-ec">
                        <a class="btn-ec" href='http://www.shop.oppomobile.vn/smartphone/oppo-a71'>
                            Mua Ngay
                        </a>
                        <a class="btn-ec" href='http://oppomobile.vn/oppo-a71'>Chi tiết</a>
                    </div>
                    <!-- End of Mobile E-comerce -->
                </div>
                <div class='item-animated-content'>
                    <h2 class='item-animated-title'>OPPO A71</h2>
                    <p class='item-animated-price'>4,690,000 VNĐ</p>
                    <p class='subtitle'>Trải nghiệm mượt mà</p>
                    <p class='item-animated-description'>- RAM 3GB <br> - Chip 8 nhân mạnh mẽ <br> - Pin lớn 3200 mAh</p>
                    <!-- E-commerce April 2017 -->
                    <div class="detail-btns-ec">
                        <a class='button-transparent' href='http://www.shop.oppomobile.vn/smartphone/oppo-a71'>
                            Mua Ngay
                        </a>
                        <a class='button-transparent' href='http://oppomobile.vn/oppo-a71'>
                            Chi tiết
                        </a>
                        <!-- End of E-commerce 2017 -->
                    </div>
                </div>
            </div>
            <!--Extra Code for E-Commerce April 2017-->


            <script>
                $(document).ready(function(){
                    $('.mobile-tablets-btn-set-ec .btn-ec').click(function(e){
                        e.stopPropagation();
                    });
                });
            </script>
            <!--End of E-Commerce April 2017-->



            <div class='gi item-animated-view-more'>
                <div class='photo'>
                    <img alt='product 1' class="lazy" data-original='<?= $baseUrl ?>img/oppobest.jpg'>
                    <a class='button button-primary' href='/smartphones'>
                        <span>Tất cả điện thoại</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Mobile Content 2/2/2017 -->
<style>
    .item-animated-content .item-animated-price{
        white-space: nowrap;
    }
    .item-animated-content .item-animated-price{
        margin-bottom: 0.2em;
    }
    @media screen and (max-width: 480px){
        .item-animated-view-more .photo img{
            display:none !important;
        }
        .animated-items .item-animated{
            width: 50%;
        }
        .animated-items {
            width: 100%
        }
        .animated-items .item-animated.fourth-item,
        .animated-items .item-animated.third-item{
            display:inline-block;
        }
        .item-animated-view-more{
            width: 100%;
        }
    }
</style>
<script>
    $(document).ready(function(){
        setTimeout(function(){
            if($(window).width()<480){
                $('a.js-animated-item').unbind('click');
            }
        },200);
        /* Hover Effect */
        if($(window).width()>480){
            $('.gi.item-animated.first-item').mouseenter(function(){
                $('.g.animated-items.equalize').addClass('first-active');
                $(this).addClass('open');
                $('.gi.item-animated.first-item .item-animated-view,.gi.item-animated.first-item item-animated-content')
                    .css('width','229px');
            });
            $('.gi.item-animated.first-item').mouseleave(function(){
                $(this).removeClass('open');
                $('.g.animated-items.equalize').removeClass('first-active');
            });
            /*2nd Block */
            $('.gi.item-animated.second-item').mouseenter(function(){
                $('.g.animated-items.equalize').addClass('active');
                $(this).addClass('open');
                $('.gi.item-animated.second-item .item-animated-view,.gi.item-animated.second-item item-animated-content')
                    .css('width','229px');
            });
            $('.gi.item-animated.second-item').mouseleave(function(){
                $(this).removeClass('open');
                $('.g.animated-items.equalize').removeClass('active');
            });
            /*3rd Block */
            $('.gi.item-animated.third-item').mouseenter(function(){
                $('.g.animated-items.equalize').addClass('active');
                $(this).addClass('open');
                $('.gi.item-animated.third-item .item-animated-view,.gi.item-animated.third-item .item-animated-content')
                    .css('width','229px');
            });
            $('.gi.item-animated.third-item').mouseleave(function(){
                $(this).removeClass('open');
                $('.g.animated-items.equalize').removeClass('active');
            });
            /*4th Block */
            $('.gi.item-animated.fourth-item').mouseenter(function(){
                $('.g.animated-items.equalize').addClass('active');
                $(this).addClass('open');
                $('.gi.item-animated.fourth-item .item-animated-view,.gi.item-animated.fourth-item .item-animated-content')
                    .css('width','229px');
            });
            $('.gi.item-animated.fourth-item').mouseleave(function(){
                $(this).removeClass('open');
                $('.g.animated-items.equalize').removeClass('active');
            });
        }
    });
</script>
<!-- End of Mobile content -->
<aside class='brick-m related-content'>
    <div class='wrapper'>
        <div class='g g-wrapper-l'>
            <section class='gi one-whole lap-one-third'>
                <h2 class='h-delta'>
                    <srtrong class='highlight'>Khám phá OPPO</srtrong>
                </h2>
                <h3 class='h-epsilon'>Tìm hiểu quá trình phát triển của OPPO</h3>
                <div class='video'>
                    <!--<img alt='' class='video-bg' src='http://dummyimage.com/354x228/cccccc/000000'>-->
                    <!--<span class='icon icon-play'></span>-->
<!--                    <iframe id="video-frame" width="354" height="288" src="https://www.youtube.com/embed/SH4uNO66MbM" frameborder="0" allowfullscreen></iframe>-->
<!--                    <ul class="video-buttons">-->
<!--                        <li class="video-active">-->
<!--                            <button type="button" data-url="https://www.youtube.com/embed/SH4uNO66MbM?controls=0&amp;showinfo=0"></button></li>-->
<!---->
<!--                        <li class="">-->
<!--                            <button type="button" data-url="https://www.youtube.com/embed/0ugJwAnxfs8?controls=0&amp;showinfo=0"></button></li>-->
<!---->
<!--                        <li class="">-->
<!--                            <button type="button" data-url="https://www.youtube.com/embed/jBsIXljWjPw?controls=0&amp;showinfo=0"></button></li>-->
<!---->
<!--                        <li class="">-->
<!--                            <button type="button" data-url="https://www.youtube.com/embed/JqupLupSCQA?controls=0&amp;showinfo=0"></button></li>-->
<!---->
<!--                        <li class="">-->
<!--                            <button type="button" data-url="https://www.youtube.com/embed/m6-ZimZejnE?controls=0&amp;showinfo=0"></button></li>-->

                </div>

            </section>
            <section class='gi one-whole lap-one-third'>
                <h2 class='h-delta'>
                    <srtrong class='highlight'>
                        OPPO Tin tức mới nhất</srtrong>
                </h2>
                <h3 class='h-epsilon'>Những sự kiện đang diễn ra của OPPO</h3>
                <article class='news'>
                    <a rel="nofollow" href="http://oppomobile.vn/about/press/oppo-f1-plus-chinh-thuc-ban-ra-tai-viet-nam1" target="_blank">
                        <img alt='' class='news-photo' src='<?= $baseUrl ?>img/news-icon.png'>

                        <div class='news-text'>
                            <p>OPPO F1 PLUS CHÍNH THỨC BÁN RA TẠI VIỆT NAM</p>
                        </div>
                    </a>
                </article>
                <article class='news'>
                    <a rel="nofollow" href="http://oppomobile.vn/about/press/chuyen-gia-selfie--oppo-f1s-chinh-thuc-ra-mat-dat-hang-truoc-cung-qua-tang-gia-tri" target="_blank">
                        <img alt='' class='news-photo' src='<?= $baseUrl ?>img/news-icon.png'>

                        <div class='news-text'>
                            <p>CHUYÊN GIA SELFIE – OPPO F1s CHÍNH THỨC RA MẮT. ĐẶT HÀNG TRƯỚC CÙNG QUÀ TẶNG GIÁ TRỊ.</p>
                        </div>
                    </a>
                </article>
                <article class='news'>
                    <a rel="nofollow" href="http://oppomobile.vn/about/press/chuyen-gia-selfie--oppo-f1s-xac-lap-ky-luc-pre-order-voi-hon-30000-luot-dat-hang1" target="_blank">
                        <img alt='' class='news-photo' src='<?= $baseUrl ?>img/news-icon.png'>

                        <div class='news-text'>
                            <p>CHUYÊN GIA SELFIE – OPPO F1s XÁC LẬP KỶ LỤC PRE-ORDER VỚI HƠN 30,000 LƯỢT ĐẶT HÀNG</p>
                        </div>
                    </a>
                </article>

            </section>
            <section class='gi one-whole lap-one-third' id="lap-center">
                <div class="fb-page" data-href="https://www.facebook.com/oppomobilevietnam/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/oppomobilevietnam/"><a href="https://www.facebook.com/oppomobilevietnam/">OPPO Vietnam</a></blockquote></div></div>
            </section>
        </div>
    </div>
</aside>
<div id="fb-root"></div>
<!--<script>(function (d, s, id) {-->
<!--        var js, fjs = d.getElementsByTagName(s)[0];-->
<!--        if (d.getElementById(id))-->
<!--            return;-->
<!--        js = d.createElement(s);-->
<!--        js.id = id;-->
<!--        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=621103667984671";-->
<!--        fjs.parentNode.insertBefore(js, fjs);-->
<!--    }(document, 'script', 'facebook-jssdk'));</script>-->

<script type="text/javascript">

    $(function () {
        $("#video-frame").attr("src", $("#video-frame").attr("data-src"));
        var $videoButton = $(".video-buttons");
        $videoButton.find("li").eq(0).addClass("video-active");
        $videoButton.delegate("button", "click", function () {

            $videoButton.find("li").removeClass("video-active");
            $("#video-frame").attr("src", $(this).attr("data-url"));

            $(this).parent().addClass("video-active");


        });


    });
</script>
<!-- mobile content -->
<style>
    @media screen and (max-width: 480px){
        #lap-center{
            text-align:center;
        }
    }
</style>
<!-- end of mobile content -->
<section class='brick-m slab-light'>
    <div class='list-access-icon'>
        <div class='wrapper g'>
            <div class='access-icon gi lap-one-quarter'>
                <a href='/support'>
                    <img class='lazy' alt='oppo icon'  data-original='<?= $baseUrl ?>img/content/access-icon/access-icon1.png'>
                    <div class='content'>
                        <h3 class='heading'>Hỗ trợ</h3>
                        <div class='badge-icon xl'>
                            <span class='icon icon-support'></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class='access-icon gi lap-one-quarter'>
                <a href='/forum'>
                    <img class='lazy' alt='oppo icon' data-original='<?= $baseUrl ?>img/content/access-icon/access-icon2.jpg'>
                    <div class='content'>
                        <h3 class='heading'>Diễn Đàn</h3>
                        <div class='badge-icon xl'>
                            <span class='icon icon-community'></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class='access-icon gi lap-one-quarter'>
                <a href='/support/customerservicecenter'>
                    <img class='lazy' alt='oppo icon' data-original='<?= $baseUrl ?>img/content/access-icon/access-icon3.png'>
                    <div class='content'>
                        <h3 class='heading'>TTCSKH</h3>
                        <div class='badge-icon xl'>
                            <span class='icon icon-kiosk'></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class='access-icon gi lap-one-quarter'>
                <a href='#'>
                    <img class='lazy' alt='oppo icon' data-original='<?= $baseUrl ?>img/content/access-icon/access-icon4.png'>
                    <div class='content'>
                        <h3 class='heading'>Sự kiện</h3>
                        <div class='badge-icon xl'>
                            <span class='icon icon-radio'></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<style>
    /* line 22, /Volumes/Datos/redradix/oppo/source/assets/stylesheets/components/_access-icon.scss */
    .access-icon a:hover .icon-support {
        background-position: -628px -92px;
    }
    /* line 25, /Volumes/Datos/redradix/oppo/source/assets/stylesheets/components/_access-icon.scss */
    .access-icon a:hover .icon-community {
        background-position: -628px -139px;
    }
</style>
<!-- mbox chat -->
<style type="text/css">
    #lhc_need_help_container {
        display:none;
    }
</style>
<!--<script type="text/javascript">-->
<!--    var LHCChatOptions = {};-->
<!--    LHCChatOptions.opt = {widget_height:500,widget_width:350,popup_height:520,popup_width:500/*,domain:'www.oppomobile.vn'*/};-->
<!--    (function() {-->
<!--        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;-->
<!--        var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';-->
<!--        var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';-->
<!--        po.src = '//livechat.oppomobile.vn/index.php/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true/(theme)/1/(survey)/1?r='+referrer+'&l='+location;-->
<!--        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);-->
<!--    })();-->
<!--</script>-->

