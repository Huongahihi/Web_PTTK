<?php
/**
 * Created by PhpStorm.
 * User: tongd
 * Date: 6/19/2017
 * Time: 2:14 PM
 */
use backend\models\ObjectCategory;
use backend\models\ObjectFile;
use backend\modules\cms\models\CmsContact;
use common\components\FHtml;
use frontend\assets\CustomAsset;
use backend\modules\ecommerce\models\Product;

/* @var $this yii\web\View */
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$baseUrl .= '/applications/SellPhone/assets/';
$id = isset($id) ? $id : FHtml::getRequestParam('id');
$product = Product::findOne(['id' => $id]);
$product_other = isset($model_others) ? $model_others : Product::find()->select(['id', 'name', 'image', 'thumbnail', 'overview', 'category_id'])->where(['category_id' => $id])->limit(5)->all();
$object_catrgory =  Product::getModelCategories('product');
$recent_post =  Product::find()->orderBy(['created_date' => SORT_DESC])->limit(3)->all();
$categories  = isset($categoties) ? $categoties : ObjectCategory::getModelCategories('product');
$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>
<style>
    .row {
        margin-left: 0;
        margin-right: 0;
    }
    #header-slider-choose button.buynow {
        margin-top: 40px;
        height: 55px;
        border: none;
        font-size: 18px;
        background: #31b26f;
        text-transform: uppercase;
        outline: none;
    }
    .thumbnail {
        display: block;
        padding: 4px;
        margin-bottom: 20px;
        line-height: 1.42857143;
        background-color: #eaeaf2;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .col-md-5 {
        width: 50%;
    }
</style>
<div class="row">
    <div class="col-md-6">
        <div class="swiper-container swiper-container-horizontal">
            <div view-detail-images="panel" class="swiper-wrapper" style="transition-duration: 300ms; transform: translate3d(-505px, 0px, 0px);">
                <div view-detail-image="item" class="swiper-slide swiper-slide-prev" style="width: 505px;">
                    <img src="http://www.shop.oppomobile.vn/uploads/cms_productmedia/2017/April/17/99_1492368414-medium.png" alt="">
                </div>
                <div class="swiper-slide swiper-slide-active" style="width: 505px;">
                    <?= $product->showImage('1000px', '500px', '', 'img img-responsive') ?>
                    <h1 class="font_light"><?= $product->name ?></h1>
                    <p class="price" ><?= $product->price?></span> <?= $product->currency ?></p>
                    <p class="boxlast">
                        Giao hàng nhanh miễn phí, thanh toán khi nhận hàng
                    </p>
                    <p class="phone">Hoặc gọi <span class="font_bold red_color font_big">1800.577.776</span> để được tư vấn &amp; đặt hàng nhanh</p>
                </div>

            </div>
            <!-- Add Pagination -->
        </div>
    </div>
    <div class="col-md-5">
        <div class="thumbnail infophone">

            <p class="boxlast">
                <span class="oppo_icon oppo_icon-check_icon pull-left gap_ssmall_top gap_small_right"></span>
                <div class="row">
                    <div class="col-md-5">
                        <div class="carta">
            <p class="cart_tit1"><span class="step_number text-center pull-left oppo_bg color_white">1</span>
                <span class="right_angle pull-left gap_small_right"></span><span> Thông tin người nhận hàng</span>
            </p>
            <div class="form-group">
                <label for="namecustommer">Tên người nhận hàng</label>
                <input type="text" class="form-control" id="namecustommer" name="namecustommer" placeholder="Vd: Nguyễn văn A">
            </div>
            <div class="form-group">
                <label for="phonecustommer">Số điện thoại người nhận hàng</label>
                <input type="text" class="form-control" id="phonecustommer" name="phonecustommer" placeholder="OPPO sẽ liên hệ SĐT này khi giao hàng">
            </div>
            <div class="form-group">
                <label for="emailcustommer">Email người nhận hàng</label>
                <input type="text" class="form-control" id="isemail" name="isemail" placeholder="Vd: abc@oppomobile.vn" data-validation-length="3-12">
            </div>
            <div class="form-group">
                <label for="addresscustommer">Địa chỉ nhận hàng</label>
                <input type="text" class="form-control" id="addresscustommer" name="addresscustommer" placeholder="Số nhà, đường, phường/xã">
            </div>
            <p class="cart_tit1"><span class="step_number text-center pull-left oppo_bg color_white">2</span>
                <span class="right_angle pull-left gap_small_right"></span><span> Thanh toán bằng...</span>
            </p>
            <div class="phuongthucthanhtoan">
                <div class="radio_select boxradio">
                    <input id="radio-1" class="radio-custom" name="radio-group" type="radio" checked="" value="0">
                    <label for="radio-1" class="radio-custom-label"><span>Thanh toán tiền mặt or qua thẻ ATM (COD)</span><span class="titbottom">Bạn sẽ thanh toán cho nhân viên giao hàng ngay khi nhận</span>
                    </label>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-7">
        <div class="cartb">
            <div view-panel="cart"><div view-list="cart" class="media item-cart item-cart0" style="display: block;" stt="0" data-poid="13062" data-item="{&quot;fpoid&quot;:13062,&quot;fpid&quot;:2077,&quot;fproductcode&quot;:&quot;CPH1613&quot;,&quot;fquantity&quot;:1}">
                    <div class="form-group">
                        <label for="addresscustommer">Màu sắc lựa chọn</label>
                        <input type="text" class="form-control" id="addresscustommer" name="addresscustommer" placeholder="Trắng, Đen, Hồng, xanh.">
                    </div>
                    <div class="media-body">
                        <div class="row">
                            <input type="hidden" value="0" name="fpid" id="fpid">
                            <div class="col-md-9 price text-left">Thành tiền: <span view-data="price"><?= $product->price ?></span>USD
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input  type="submit" name="confirm" id="confirm"  onclick="confirm()" value= "Đặt hàng ngay " >
                    </div>

                </div></div>
        </div>
    </div>
</div>
        </div>

    </div>
</div>
<section id="tabinfo" class="oppo-active-content">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">ĐẶC ĐIỂM SẢN PHẨM</a></li>
        <li role="presentation" class=""><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Ảnh chụp
                thực tế sản phẩm</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Thông số
                kỹ thuật</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Khách hàng
                đánh giá</a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="oppo-content tab-pane active" id="home">
            <div class="oppo-ppcon">
                <div class="ppcon">
                    <div class="phone-main-content">
                        <div class="wrapper">
                            <h1 class="center" style="text-align: justify;"> SẢN PHẨM:</h1>
                            <div>
                                <div>
                                    <h2>1. Màn hình – Tràn viền thời thượng (thu hút khách hàng)</h2>
                                </div>
                                <div>F5 sử dụng thiết kế màn hình tràn viền mới nhất hiện nay, cho cảm giác cao cấp, thời thượng. Ngoài ra thiết kế màn hình tràn viền còn có thể tăng khả năng hiển thị lên mức tối đa. <br />So với các điện thoại có màn hình 6 inch thì kích thước F5 nhỏ gọn hơn, cảm giác cầm tay tốt hơn. So với các điện thoại có màn hình 5.5 inch, kích cỡ giống nhau, nhưng màn hình lớn hơn. <br />Thiết kế full màn hình giúp bạn tiện lợi và thoải mái hơn khi xem phim và chơi game.Điện thoại có màn hình lớn nhất định phải đi cùng độ phân giải FHD. </div>
                                <div>Như vậy khi bạn xem phim FHD hay chơi game, hình ảnh sẽ sắc nét hơn, mắt cũng sẽ đỡ mỏi hơn.<br /><br /><br /></div>
                                <div><img style="display: block; margin: 0 auto;" src="http://www.shop.oppomobile.vn/uploads/web/900/Hinh-Upload/F5/man-hinh-tran-vien.jpg" alt="" width="800" height="559" /></div>
                                <div>
                                    <ul>
                                        <li style="border: none;"><strong style="text-align: left;">Camera sau:</strong></li>
                                    </ul>
                                </div>
                                <div>Bất kể là chụp trong nhà hay ở những nơi có điều kiện thiếu sáng, ngược sáng, kỹ thuật ưu tiên lấy sáng gương mặt đều có thể chụp được những hình ảnh sáng và rõ nét, không bị xuất hiện tình trạng gương mặt bị đen hay tối.</div>
                                <div>Ví dụ khi chúng ta chụp ảnh hoàng hôn trên biển, tia sáng yếu nhưng khung cảnh lại rất đẹp, lúc này F5 hoàn tòan có thể chụp ảnh được bức ảnh bạn đẹp rực rỡ dưới ánh hoàng hôn. Vừa chụp được ánh hoàng hôn đẹp dịu dàng vừa làm nổi bật nhân vật chính.</div>
                                <div>
                                    <h2>2.  Tiện ích – Nhận diện thông minh:</h2>
                                    <strong style="float: left; width: 100%; text-align: left;">*Mở khóa bằng nhận diện gương mặt thông minh:</strong></div>
                                <div> </div>
                                <div>Kỹ thuật mở khóa bằng nhận diện gương mặt mà F5 sử dụng được dùng trong lĩnh vực ngân hàng, tính bảo mật cao.. Chúng ta có thể dùng hình ảnh hoặc video để mở khóa trên một số sản phẩm khác, nhưng F5 thì không. Chỉ có gương mặt của bạn mới có thể mở khóa.</div>
                                <div>Mở khóa bằng nhận diện gương mặt không những nhanh chóng mà còn tiện lợi. Khi tay ướt bạn có thể dùng gương mặt để mở khóa, vô cùng tiện lợi. Kết hợp cả 2 tính năng mở khóa vân tay và nhận diện bằng gương mặt giờ đây bạn có thể mở khóa nhanh chóng mọi lúc mọi nơi.</div>
                                <div><img style="display: block; margin: 0 auto;" src="http://www.shop.oppomobile.vn/uploads/web/900/Hinh-Upload/F5/khoa-nhan-dien-khuon-mat.jpg" alt="" width="800" height="508" /></div>
                                <h2>3.  Cấu hình – Vận hành mượt mà:</h2>
                                <div>RAM là thông số quan trọng nhất khi chọn mua điện thoại. Hầu hết điện thoại sau 1 một thời gian dùng sẽ bị lag, điều này liên quan lớn với dung lượng RAM. Có phải sau khi bạn mở cùng lúc nhiều ứng dụng, phát hiện thấy điện thoại bị lag? Điều này chứng tỏ RAM của bạn không đủ dùng. Điện thoại không thể cùng lúc xử lý nhiều tác vụ.</div>
                                <div>Với F5, bạn có thể mở cùng lúc 7-8 ứng dụng mà không hề bị lag. Đó là vì F5 có Ram 4GB. Có thể mở cùng lúc nhiều ứng dụng mà vẫn vận hành mượt mà.</div>
                                <div>Trong tầm giá này, nhất định phải chọn điện thoại có RAM 4GB. Điện thoại có RAM 4GB so với điện thoại RAM 3GB đều có thể mở cùng lúc nhiều APP, nhưng RAM 4GB sẽ cho trải nghiệm mượt mà hơn. </div>
                                <div>F5 có tần số CPU cao nhất trong cùng phân khúc giá – 2.5GHz, tần số CPU càng cao chơi game càng mượt.</div>
                                <div>F5 có pin lớn 3200 mAh, có thể dùng bình thường trong vòng 12h từ 9h sáng đến 9h tối. Sáng dậy ra khỏi nhà không cần mang sạc, vô cùng thuận tiện.</div>
                                <div><img style="display: block; margin: 0 auto;" src="http://www.shop.oppomobile.vn/uploads/web/900/Hinh-Upload/F5/tinh-nang-choi-game800.jpg" alt="" width="800" height="800" /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="oppo-read-more oppo-open-read-more"><span>Xem thêm</span><span class="glyphicon glyphicon-chevron-down"></span></div>
            <div class="oppo-read-more oppo-close-read-more"><span>Thu gọn</span><span class="glyphicon glyphicon-chevron-up"></span></div>
        </div>
        <div role="tabpanel" class="tab-pane " id="profile">
            <div class="container">
                <div class="row">
                    <div style="display:none;">Array
                        (
                        [0] => http://www.shop.oppomobile.vn/uploads/productreal/IMG_0285.jpg
                        [1] => http://www.shop.oppomobile.vn/uploads/productreal/F5k.jpg
                        [2] => http://www.shop.oppomobile.vn/uploads/productreal/F53.jpg
                        [3] => http://www.shop.oppomobile.vn/uploads/productreal/F522-1.jpg
                        [4] => http://www.shop.oppomobile.vn/uploads/productreal/F54.jpg
                        [5] => http://www.shop.oppomobile.vn/uploads/productreal/IMG_0378.jpg
                        [6] => http://www.shop.oppomobile.vn/uploads/productreal/Theme điện thoại trắng.jpg
                        [7] => http://www.shop.oppomobile.vn/uploads/productreal/IMG_0220.jpg
                        )
                        1</div>
                    <div class="col-md-7">
                        <p>Ảnh chụp sản phẩm khi sử dụng ngoài đời thực</p>
                        <div class="row fiximg">
                            <div class="col-md-6 fimg">
                                <div class="thumbnail">
                                    <a data-fancybox="gallery" href="http://www.shop.oppomobile.vn/uploads/productreal/IMG_0285.jpg">
                                        <img src="http://www.shop.oppomobile.vn/uploads/productreal/IMG_0285.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 fimg">
                                <div class="thumbnail">
                                    <a data-fancybox="gallery" href="http://www.shop.oppomobile.vn/uploads/productreal/F5k.jpg">
                                        <img src="http://www.shop.oppomobile.vn/uploads/productreal/F5k.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 fimg">
                                <div class="thumbnail">
                                    <a data-fancybox="gallery" href="http://www.shop.oppomobile.vn/uploads/productreal/F53.jpg">
                                        <img src="http://www.shop.oppomobile.vn/uploads/productreal/F53.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 fimg">
                                <div class="thumbnail">
                                    <a data-fancybox="gallery" href="http://www.shop.oppomobile.vn/uploads/productreal/F522-1.jpg">
                                        <img src="http://www.shop.oppomobile.vn/uploads/productreal/F522-1.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 fimg" style="display: none;">
                                <div class="thumbnail">
                                    <a data-fancybox="gallery" href="http://www.shop.oppomobile.vn/uploads/productreal/IMG_0378.jpg">
                                        <img src="http://www.shop.oppomobile.vn/uploads/productreal/IMG_0378.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 fimg" style="display: none;">
                                <div class="thumbnail">
                                    <a data-fancybox="gallery" href="http://www.shop.oppomobile.vn/uploads/productreal/Theme điện thoại trắng.jpg">
                                        <img src="http://www.shop.oppomobile.vn/uploads/productreal/Theme điện thoại trắng.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 fimg" style="display: none;">
                                <div class="thumbnail">
                                    <a data-fancybox="gallery" href="http://www.shop.oppomobile.vn/uploads/productreal/IMG_0220.jpg">
                                        <img src="http://www.shop.oppomobile.vn/uploads/productreal/IMG_0220.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <p class="viewall img"><a data-fancybox="gallery" href="http://www.shop.oppomobile.vn/uploads/productreal/F54.jpg">Xem thêm</a></p>

                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="col-md-12">
                            <p class="votvo">OPPO F5 - Chế độ Game Mode cùng Monstar</p>
                            <div class="thumbnail videoy">
                                <iframe width="100%" height="185" src="https://www.youtube.com/embed/fukidO8AgTY" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="col-md-12">
                            <p class="votvo">OPPO F5 - Màn hình tràn FHD+</p>
                            <div class="thumbnail videoy">
                                <iframe width="100%" height="185" src="https://www.youtube.com/embed/aVC8LUyIT14" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div role="tabpanel" class="tab-pane " id="messages">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <table width="614">
                            <tbody>
                            <tr>
                                <td width="260">Thông số cơ bản</td>
                                <td width="354">F5</td>
                            </tr>
                            <tr>
                                <td>Màu sắc</td>
                                <td>Vàng, Đen, Đỏ (phiên bản 6GB)</td>
                            </tr>
                            <tr>
                                <td>Camera trước</td>
                                <td>20MP, công nghệ selfie A.I Beauty</td>
                            </tr>
                            <tr>
                                <td>Camera sau </td>
                                <td>16MP</td>
                            </tr>
                            <tr>
                                <td>CPU</td>
                                <td>8 nhân</td>
                            </tr>
                            <tr>
                                <td>Pin</td>
                                <td width="354">3200mAh (TYP)</td>
                            </tr>
                            <tr>
                                <td>Màn hình</td>
                                <td width="354">6.0 inch Full Screen</td>
                            </tr>
                            <tr>
                                <td>Độ phân giải</td>
                                <td width="354">2160x1080 FHD+</td>
                            </tr>
                            <tr>
                                <td>Bộ nhớ trong</td>
                                <td width="354">F5: 4GB RAM + 32GB ROM</td>
                            </tr>
                            <tr>
                                <td>Hỗ trợ thẻ nhớ tối đa</td>
                                <td>256GB (khe cắm riêng)</td>
                            </tr>
                            <tr>
                                <td>Thẻ SIM</td>
                                <td>Dual nano-SIM</td>
                            </tr>
                            <tr>
                                <td>Hệ điều hành</td>
                                <td>ColorOS 3.2, nền tảng Android 7.1</td>
                            </tr>
                            <tr>
                                <td>Kích thước</td>
                                <td>156.5 x 76 x 7.5 mm</td>
                            </tr>
                            <tr>
                                <td>Trọng lượng</td>
                                <td>Khoảng 152g (Bao gồm pin)</td>
                            </tr>
                            <tr>
                                <td>Băng tần</td>
                                <td width="354">2G/3G/4G</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="thumbnail digital">
                            <div class="box">
                                <span class="show full_width center oppo_icon oppo_icon-tech_support_icon"></span>
                                <p class="font_bold gap_medium_top">Thắc mắc về kỹ thuật?</p>
                                <p>Gọi ngay hotline <span class="red_color">1800.577.776</span> <br /> để được giải đáp và tư vấn tận tình<br /> từ chính các chuyên gia của OPPO</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="settings">
            <div class="container">
                <div class="box-binhluan">
                    <div class="fb-comments margin_auto show text-center" data-href="http://oppomobile.vn/oppo-f5"  data-width="728" data-numposts="10"></div>
                </div>
            </div>

        </div>
    </div>
</section>
<section id="why-choose-oppo">
    <div class="container">
        <div class="row">
            <p class="title">Tại sao nên mua sản phẩm tại website <span>oppomobile.vn</span> ?</p>
            <div class="col-sm-6">
                <div class="media">
                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object" src="http://www.shop.oppomobile.vn/templates/current/images/store/oppo/desktop/anh1.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4>100% hàng chính hãng từ OPPO</h4>
                        <p class="sort-des">
                            Bạn được mua sản phẩm từ chính nhà sản xuất OPPO
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="media">
                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object" src="http://www.shop.oppomobile.vn/templates/current/images/store/oppo/desktop/anh2.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4>Bảo hành 12 tháng trên toàn quốc</h4>
                        <p class="sort-des">
                            Được đổi trả trong vòng 30 ngày (nếu xảy ra lỗi do nhà sản xuất) và được bảo hành 12 tháng tại tất cả trung tâm bảo hành của <span class="oppo_color">OPPO</span> trên toàn quốc <a target="_blank" href="http://oppomobile.vn/support/customerservicecenter">Xem danh sách</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="media">
                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object" src="http://www.shop.oppomobile.vn/templates/current/images/store/oppo/desktop/anh3.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4>Giao hàng nhanh đến tận cửa nhà bạn</h4>
                        <p class="sort-des">
                            Bạn chỉ việc đặt hàng và ung dung chờ <span class="oppo_color">OPPO</span> giao sản phẩm đến tận cửa nhà mình.
                            Ngoài ra bạn không phải lo lắng khi mang nhiều tiền bên người
                            vì có thể thanh toán khi nhận hàng.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="media">
                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object" src="http://www.shop.oppomobile.vn/templates/current/images/store/oppo/desktop/anh4.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4>Trở thành thành viên của đại gia đình OPPO</h4>
                        <p class="sort-des">
                            Gia nhập vào cộng đồng hàng triệu người sử dụng sản phẩm OPPO &amp; tận hưởng
                            chính sách CSKH đặc biệt từ OPPO. <a target="_blank" href="http://oppomobile.vn/forum/">Tìm hiểu thêm</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Popup template -->
<div id="videoPopup575" class="modal fade popup_video" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <button type="button" class="close_video_popup fancybox-close" data-dismiss="modal">&times;</button>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">




            <div id="videoPopupSlider0" class="carousel slide" data-ride="carousel" data-interval="false">



                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                    <div class="item active">
                        <iframe width="100%" height="500px" src="https://www.youtube.com/embed/MccsfDsad14" frameborder="0" allowfullscreen class="youtube-iframe"></iframe>
                    </div>
                </div>
                <!-- Indicators -->
                <ol class="carousel-indicators">

                    <li data-target="#videoPopupSlider0" data-slide-to="0" class="active">
                        <img src="http://img.youtube.com/vi/MccsfDsad14/3.jpg" />
                    </li>

                </ol>
            </div>


        </div>
    </div>
</div>
<!-- Popup template -->
<div id="videoPopup569" class="modal fade popup_video" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <button type="button" class="close_video_popup fancybox-close" data-dismiss="modal">&times;</button>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">




            <div id="videoPopupSlider6" class="carousel slide" data-ride="carousel" data-interval="false">



                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                    <div class="item active">
                        <iframe width="100%" height="500px" src="https://www.youtube.com/embed/MccsfDsad14" frameborder="0" allowfullscreen class="youtube-iframe"></iframe>
                    </div>
                </div>
                <!-- Indicators -->
                <ol class="carousel-indicators">

                    <li data-target="#videoPopupSlider6" data-slide-to="0" class="active">
                        <img src="http://img.youtube.com/vi/MccsfDsad14/3.jpg" />
                    </li>

                </ol>
            </div>


        </div>
    </div>
</div>
<script>
    function confirm() {
        $.ajax({
            url: '<?= FHtml::createUrl('', []) ?>',
            type: 'submit',
            success: function (data) {
                    alert('Bạn đã đặt hành thành công');
                    reloadPage();
            }
        });
    }

    function reloadPage() {
        location.reload();
    }
</script>