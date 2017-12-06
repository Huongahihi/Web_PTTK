<?php
/**
 * Created by PhpStorm.
 * User: tongd
 * Date: 2017-07-03
 * Time: 10:10
 */
use backend\modules\cms\models\CmsContact;
use common\widgets\fheadline\FPageHeader;
use frontend\assets\CustomAsset;
use common\components\FHtml;
use common\widgets\fcontact\FContact;

/* @var $model \frontend\models\ViewModel */
/* @var $this yii\web\View */

$asset = CustomAsset::register($this);
$baseUrl = $main_color = FHtml::currentApplicationMainColor();
$asset->baseUrl;
$model = new \frontend\models\ContactForm();
$data_contact = CmsContact::findAll();
$this->title = "Contact";
?>
<!--=== Page Header ===-->
<div class="container-fluid text-center store_top_wrapper">
    <h1 class="color_white">HỆ THỐNG CỬA HÀNG OPPO BRANDSHOP</h1>
    <div class="row benefit_wrapper">
        <div class="benefit_panel color_white">
            <div class="benefit_item">
                <span style="
                    display: inline-block;
                    line-height: 26px;
                    font-weight: 500;
                    margin-top: 8px;
                    font-size: 24px;
                ">103</span><span style="
                    display: inline-block;
                    line-height: 14px;
                    margin-bottom: 6px;
                    font-size: 11px;
                    width: 90%;
                ">Cửa hàng trên toàn quốc</span><i class="oppo_icon oppo_icon-store_icon" style="
                    display: inline-block;
                "></i>
            </div>
            <div class="benefit_item">
                <span style="
                    display: inline-block;
                    line-height: 26px;
                    font-weight: 500;
                    margin-top: 16px;
                    font-size: 24px;
                ">09-22h</span><span style="
                    display: inline-block;
                    line-height: 14px;
                    margin-bottom: 6px;
                    font-size: 11px;
                    width: 90%;
                ">Mở cửa hàng ngày</span><i class="oppo_icon oppo_icon-oclock_icon" style="
                    display: inline-block;
                "></i>
            </div>
            <div class="benefit_item">
                <span style="
                    display: inline-block;
                    line-height: 20px;
                    font-weight: 500;
                    margin-top: 20px;
                    font-size: 18px;
                    margin-bottom: 5px;">Tận tâm phục vụ</span><i class="oppo_icon oppo_icon-served_icon" style="
                    display: inline-block;
                "></i>
            </div>
            <div class="benefit_item">
                <span style="
                    display: inline-block;
                    line-height: 20px;
                    font-weight: 500;
                    margin-top: 20px;
                    font-size: 18px;
                    margin-bottom: 5px;">Và nhiều hơn nữa...</span><i class="oppo_icon oppo_icon-more_icon" style="
                    display: inline-block;
                "></i>
            </div>
        </div>
    </div>
    <!-- Search field -->
    <div class="row store_search_wrapper text-center color_white">
        <form action="">
            <label for="fsearch">Tìm cửa hàng</label>
            <input value="" class="gap_small_left" type="text" name="q" id="fsearch" placeholder="Nhập tên đường/thành phố/tỉnh/quận/huyện...">
            <button class="button color_white">TÌM</button>
        </form>
    </div>
    <div class="row store_quick_search color_white gap_medium_top small">
        <label for="fsearch">Tìm nhanh:</label>
        <a title="Tìm nhanh cửa hàng OPPO tại [TP. HCM]" href="/shop?q=hcm#fsearch">TP. HCM</a>,
        <a title="Tìm nhanh cửa hàng OPPO tại [Hà Nội]" href="/shop?q=Hà Nội#fsearch">Hà Nội</a>,
        <a title="Tìm nhanh cửa hàng OPPO tại [Đà Nẵng]" href="/shop?q=Đà Nẵng#fsearch">Đà Nẵng</a>,
        <a title="Tìm nhanh cửa hàng OPPO tại [Cần Thơ]" href="/shop?q=Cần Thơ#fsearch">Cần Thơ</a>
    </div>
</div>

<div class="container gap_big_bottom">
    <div class="row store_list_wrapper text-center">
        <h2 class="bd_bottom">Hệ thống <span class="oppo_color">103</span> cửa hàng OPPO Brandshop trên toàn quốc</h2>


    </div>

    <!-- Store list -->
    <div class="row store_list_below gap_big_top">
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Quang Trung - HCM5" data-address="312 Quang Trung, Phường 10, TP.Hồ Chí Minh" data-name="OPPO Brandshop Quang Trung - HCM5" data-benefit="Wifi Miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="Brandshop4.jpg">
                    OPPO Brandshop Quang Trung - HCM5
                </a>


            </h5>
            <p class="store_address text-muted">
                312 Quang Trung, Phường 10, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=312 Quang Trung, Phường 10, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 312 Quang Trung, Phường 10, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop - HCM" data-address="294 Đường Ba Tháng Hai, Phường 12, Quận 10, TP.Hồ Chí Minh" data-name="OPPO Brandshop - HCM" data-benefit="Wifi Miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="Brandshop-HCM.jpg|Brandshop-HCM2.png">
                    OPPO Brandshop - HCM
                </a>


            </h5>
            <p class="store_address text-muted">
                294 Đường Ba Tháng Hai, Phường 12, Quận 10, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=294 Đường Ba Tháng Hai, Phường 12, Quận 10, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 294 Đường Ba Tháng Hai, Phường 12, Quận 10, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Logistic HCM2" data-address="01 Đồng Nai, Quận 10, TP.Hồ Chí Minh" data-name="OPPO Logistic HCM2" data-benefit="||||" data-openhour="09h30 - 18h00@" data-image="">
                    OPPO Logistic HCM2
                </a>


            </h5>
            <p class="store_address text-muted">
                01 Đồng Nai, Quận 10, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800.577.776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=01 Đồng Nai, Quận 10, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 01 Đồng Nai, Quận 10, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop HCM4" data-address="Tầng 1, Toà nhà VIVO City 1058 Nguyễn Văn Linh, P.Tân Phong, Quận 7, TP.Hồ Chí Minh" data-name="OPPO Brandshop HCM4" data-benefit="Wifi Miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop HCM4
                </a>


            </h5>
            <p class="store_address text-muted">
                Tầng 1, Toà nhà VIVO City 1058 Nguyễn Văn Linh, P.Tân Phong, Quận 7, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Tầng 1, Toà nhà VIVO City 1058 Nguyễn Văn Linh, P.Tân Phong, Quận 7, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Tầng 1, Toà nhà VIVO City 1058 Nguyễn Văn Linh, P.Tân Phong, Quận 7, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Thới Hòa (HCM)" data-address="E11/9M đường Thới Hòa, ấp 5, xã Vĩnh Lộc A, Huyện Bình Chánh, TP.Hồ Chí Minh" data-name="OPPO Brandshop Thới Hòa (HCM)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Thới Hòa (HCM)
                </a>


            </h5>
            <p class="store_address text-muted">
                E11/9M đường Thới Hòa, ấp 5, xã Vĩnh Lộc A, Huyện Bình Chánh, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=E11/9M đường Thới Hòa, ấp 5, xã Vĩnh Lộc A, Huyện Bình Chánh, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng E11/9M đường Thới Hòa, ấp 5, xã Vĩnh Lộc A, Huyện Bình Chánh, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Nguyễn Sơn" data-address="113 Nguyễn Sơn, Phú Thạnh, Tân Phú, Hồ Chí Minh, Quận Tân Phú, TP.Hồ Chí Minh" data-name="OPPO Brandshop Nguyễn Sơn" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Nguyễn Sơn
                </a>


            </h5>
            <p class="store_address text-muted">
                113 Nguyễn Sơn, Phú Thạnh, Tân Phú, Hồ Chí Minh, Quận Tân Phú, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=113 Nguyễn Sơn, Phú Thạnh, Tân Phú, Hồ Chí Minh, Quận Tân Phú, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 113 Nguyễn Sơn, Phú Thạnh, Tân Phú, Hồ Chí Minh, Quận Tân Phú, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Nguyễn Cửu Phú (HCM)" data-address="1525 đường Nguyễn Cửu Phú, ấp 1, xã Tân Kiên, huyện Bình Chánh, TP. HCM, TP.Hồ Chí Minh" data-name="OPPO Brandshop Nguyễn Cửu Phú (HCM)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Nguyễn Cửu Phú (HCM)
                </a>


            </h5>
            <p class="store_address text-muted">
                1525 đường Nguyễn Cửu Phú, ấp 1, xã Tân Kiên, huyện Bình Chánh, TP. HCM, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=1525 đường Nguyễn Cửu Phú, ấp 1, xã Tân Kiên, huyện Bình Chánh, TP. HCM, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 1525 đường Nguyễn Cửu Phú, ấp 1, xã Tân Kiên, huyện Bình Chánh, TP. HCM, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO BRANDSHOP CRESENTMALL (HCM4)" data-address="3F-22 Cresentmall, 101 Tôn Dật Tiên, P. Tân Phú, Quận 7, TP.Hồ Chí Minh" data-name="OPPO BRANDSHOP CRESENTMALL (HCM4)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO BRANDSHOP CRESENTMALL (HCM4)
                </a>


            </h5>
            <p class="store_address text-muted">
                3F-22 Cresentmall, 101 Tôn Dật Tiên, P. Tân Phú, Quận 7, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=3F-22 Cresentmall, 101 Tôn Dật Tiên, P. Tân Phú, Quận 7, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 3F-22 Cresentmall, 101 Tôn Dật Tiên, P. Tân Phú, Quận 7, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Lê Văn Việt (HCM)" data-address="141 Lê Văn Việt, Phường Hiệp Phú, Quận 9, TP.Hồ Chí Minh" data-name="OPPO Brandshop Lê Văn Việt (HCM)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Lê Văn Việt (HCM)
                </a>


            </h5>
            <p class="store_address text-muted">
                141 Lê Văn Việt, Phường Hiệp Phú, Quận 9, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=141 Lê Văn Việt, Phường Hiệp Phú, Quận 9, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 141 Lê Văn Việt, Phường Hiệp Phú, Quận 9, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Tấn Lộc (HCM)" data-address="Số 1390, Tỉnh Lộ 8, Ấp 12, Xã Tân Thạnh Đông, Huyện Củ Chi, TP. Hồ Chí Minh, Huyện Củ Chi, TP.Hồ Chí Minh" data-name="OPPO Brandshop Tấn Lộc (HCM)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Tấn Lộc (HCM)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 1390, Tỉnh Lộ 8, Ấp 12, Xã Tân Thạnh Đông, Huyện Củ Chi, TP. Hồ Chí Minh, Huyện Củ Chi, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 1390, Tỉnh Lộ 8, Ấp 12, Xã Tân Thạnh Đông, Huyện Củ Chi, TP. Hồ Chí Minh, Huyện Củ Chi, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 1390, Tỉnh Lộ 8, Ấp 12, Xã Tân Thạnh Đông, Huyện Củ Chi, TP. Hồ Chí Minh, Huyện Củ Chi, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Nguyễn Ảnh Thủ (HCM)" data-address="223M/1 Nguyễn Ảnh Thủ, Khu Phố 1, Phường Trung Mỹ Tây, Quận 12, TP.Hồ Chí Minh" data-name="OPPO Brandshop Nguyễn Ảnh Thủ (HCM)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Nguyễn Ảnh Thủ (HCM)
                </a>


            </h5>
            <p class="store_address text-muted">
                223M/1 Nguyễn Ảnh Thủ, Khu Phố 1, Phường Trung Mỹ Tây, Quận 12, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=223M/1 Nguyễn Ảnh Thủ, Khu Phố 1, Phường Trung Mỹ Tây, Quận 12, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 223M/1 Nguyễn Ảnh Thủ, Khu Phố 1, Phường Trung Mỹ Tây, Quận 12, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Phan Văn Hớn (HCM)" data-address="4/1 Phan Văn Hớn, Phường Tân Thới Nhất, Quận 12, TP. Hồ Chí Minh, Quận 12, TP.Hồ Chí Minh" data-name="OPPO Brandshop Phan Văn Hớn (HCM)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Phan Văn Hớn (HCM)
                </a>


            </h5>
            <p class="store_address text-muted">
                4/1 Phan Văn Hớn, Phường Tân Thới Nhất, Quận 12, TP. Hồ Chí Minh, Quận 12, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=4/1 Phan Văn Hớn, Phường Tân Thới Nhất, Quận 12, TP. Hồ Chí Minh, Quận 12, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 4/1 Phan Văn Hớn, Phường Tân Thới Nhất, Quận 12, TP. Hồ Chí Minh, Quận 12, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO BrandShop Lê Văn Khương (HCM)" data-address="33/3A - 33/3A2 Lê Văn Khương, Phường Thới An, Quận 12, Thành phố Hồ Chí Minh, Việt Nam, Quận 12, TP.Hồ Chí Minh" data-name="OPPO BrandShop Lê Văn Khương (HCM)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO BrandShop Lê Văn Khương (HCM)
                </a>


            </h5>
            <p class="store_address text-muted">
                33/3A - 33/3A2 Lê Văn Khương, Phường Thới An, Quận 12, Thành phố Hồ Chí Minh, Việt Nam, Quận 12, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=33/3A - 33/3A2 Lê Văn Khương, Phường Thới An, Quận 12, Thành phố Hồ Chí Minh, Việt Nam, Quận 12, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 33/3A - 33/3A2 Lê Văn Khương, Phường Thới An, Quận 12, Thành phố Hồ Chí Minh, Việt Nam, Quận 12, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Quang Trung (HCM)" data-address="312 Quang Trung, Phường 10, Quận Gò Vấp, TP.Hồ Chí Minh" data-name="OPPO Brandshop Quang Trung (HCM)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Quang Trung (HCM)
                </a>


            </h5>
            <p class="store_address text-muted">
                312 Quang Trung, Phường 10, Quận Gò Vấp, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=312 Quang Trung, Phường 10, Quận Gò Vấp, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 312 Quang Trung, Phường 10, Quận Gò Vấp, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop SC Vivo City" data-address="Tầng 1, Tòa nhà Vivo City 1058 Nguyễn Văn Linh, P. Tân Phong, Quận 7, TP.Hồ Chí Minh" data-name="OPPO Brandshop SC Vivo City" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop SC Vivo City
                </a>


            </h5>
            <p class="store_address text-muted">
                Tầng 1, Tòa nhà Vivo City 1058 Nguyễn Văn Linh, P. Tân Phong, Quận 7, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Tầng 1, Tòa nhà Vivo City 1058 Nguyễn Văn Linh, P. Tân Phong, Quận 7, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Tầng 1, Tòa nhà Vivo City 1058 Nguyễn Văn Linh, P. Tân Phong, Quận 7, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Ba tháng Hai" data-address="249 đường Ba Tháng hai, phường 12, Quận 10, TP.Hồ Chí Minh" data-name="OPPO Brandshop Ba tháng Hai" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Ba tháng Hai
                </a>


            </h5>
            <p class="store_address text-muted">
                249 đường Ba Tháng hai, phường 12, Quận 10, TP.Hồ Chí Minh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=249 đường Ba Tháng hai, phường 12, Quận 10, TP.Hồ Chí Minh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 249 đường Ba Tháng hai, phường 12, Quận 10, TP.Hồ Chí Minh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Logistic Hà Nội" data-address=", Huyện Gia Lâm, Hà Nội" data-name="OPPO Logistic Hà Nội" data-benefit="||||" data-openhour="@" data-image="">
                    OPPO Logistic Hà Nội
                </a>


            </h5>
            <p class="store_address text-muted">
                , Huyện Gia Lâm, Hà Nội
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800.577.776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=, Huyện Gia Lâm, Hà Nội" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng , Huyện Gia Lâm, Hà Nội">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Tuấn Hương (Q.Long Biên)" data-address="Số 258, đường Ngô Gia Tự, phường Đức Giang, Quận Long Biên, Hà Nội" data-name="OPPO Brandshop Tuấn Hương (Q.Long Biên)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Tuấn Hương (Q.Long Biên)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 258, đường Ngô Gia Tự, phường Đức Giang, Quận Long Biên, Hà Nội
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1880-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 258, đường Ngô Gia Tự, phường Đức Giang, Quận Long Biên, Hà Nội" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 258, đường Ngô Gia Tự, phường Đức Giang, Quận Long Biên, Hà Nội">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Tấn Phát - Đăk Lăk - Krông Pắk" data-address="246 Giải Phóng, Thị Trấn Phước An, Huyện Krông Păk, Tỉnh Đăk Lăk, Huyện Krông Pắk, Đắc Lắk" data-name="OPPO Brandshop Tấn Phát - Đăk Lăk - Krông Pắk" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Tấn Phát - Đăk Lăk - Krông Pắk
                </a>


            </h5>
            <p class="store_address text-muted">
                246 Giải Phóng, Thị Trấn Phước An, Huyện Krông Păk, Tỉnh Đăk Lăk, Huyện Krông Pắk, Đắc Lắk
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=246 Giải Phóng, Thị Trấn Phước An, Huyện Krông Păk, Tỉnh Đăk Lăk, Huyện Krông Pắk, Đắc Lắk" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 246 Giải Phóng, Thị Trấn Phước An, Huyện Krông Păk, Tỉnh Đăk Lăk, Huyện Krông Pắk, Đắc Lắk">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Lê Nam (Đăk Lăk)" data-address="Số 45 Nguyễn Văn Cừ, Phường Tân Lập, TP. Buôn Ma Thuột, Đắc Lắk" data-name="OPPO Brandshop Lê Nam (Đăk Lăk)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Lê Nam (Đăk Lăk)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 45 Nguyễn Văn Cừ, Phường Tân Lập, TP. Buôn Ma Thuột, Đắc Lắk
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 45 Nguyễn Văn Cừ, Phường Tân Lập, TP. Buôn Ma Thuột, Đắc Lắk" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 45 Nguyễn Văn Cừ, Phường Tân Lập, TP. Buôn Ma Thuột, Đắc Lắk">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Mỹ Thiện - Đồng Nai" data-address="215C Phạm Văn Thuận , Phường Tân Tiến, Tp.Biên Hoà, Đồng Nai" data-name="OPPO Brandshop Mỹ Thiện - Đồng Nai" data-benefit="Wifi Miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="Brandshop-DN1.jpg|Brandshop-DN2.jpg|Brandshop-DN3.png">
                    OPPO Brandshop Mỹ Thiện - Đồng Nai
                </a>


            </h5>
            <p class="store_address text-muted">
                215C Phạm Văn Thuận , Phường Tân Tiến, Tp.Biên Hoà, Đồng Nai
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=215C Phạm Văn Thuận , Phường Tân Tiến, Tp.Biên Hoà, Đồng Nai" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 215C Phạm Văn Thuận , Phường Tân Tiến, Tp.Biên Hoà, Đồng Nai">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Mỹ Thiện 2 (Đồng Nai)" data-address="157 Đường Phùng Hưng, Ấp Long Đức 1, Xã Tam Phước, TP.Biên Hòa, Tỉnh Đồng Nai, Tp.Biên Hoà, Đồng Nai" data-name="OPPO Brandshop Mỹ Thiện 2 (Đồng Nai)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Mỹ Thiện 2 (Đồng Nai)
                </a>


            </h5>
            <p class="store_address text-muted">
                157 Đường Phùng Hưng, Ấp Long Đức 1, Xã Tam Phước, TP.Biên Hòa, Tỉnh Đồng Nai, Tp.Biên Hoà, Đồng Nai
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=157 Đường Phùng Hưng, Ấp Long Đức 1, Xã Tam Phước, TP.Biên Hòa, Tỉnh Đồng Nai, Tp.Biên Hoà, Đồng Nai" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 157 Đường Phùng Hưng, Ấp Long Đức 1, Xã Tam Phước, TP.Biên Hòa, Tỉnh Đồng Nai, Tp.Biên Hoà, Đồng Nai">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Hiệp Phước (Đồng Nai)" data-address="Ấp 3, Xã Hiệp Phước, Huyện Nhơn Trạch, Tỉnh Đồng Nai, Huyện Nhơn Trạch, Đồng Nai" data-name="OPPO Brandshop Hiệp Phước (Đồng Nai)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Hiệp Phước (Đồng Nai)
                </a>


            </h5>
            <p class="store_address text-muted">
                Ấp 3, Xã Hiệp Phước, Huyện Nhơn Trạch, Tỉnh Đồng Nai, Huyện Nhơn Trạch, Đồng Nai
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Ấp 3, Xã Hiệp Phước, Huyện Nhơn Trạch, Tỉnh Đồng Nai, Huyện Nhơn Trạch, Đồng Nai" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Ấp 3, Xã Hiệp Phước, Huyện Nhơn Trạch, Tỉnh Đồng Nai, Huyện Nhơn Trạch, Đồng Nai">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop - Mỹ Thiện (Đồng Nai)" data-address="215C Phạm Văn Thuận , Phường Tân Tiến, Tp.Biên Hoà, Đồng Nai" data-name="OPPO Brandshop - Mỹ Thiện (Đồng Nai)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop - Mỹ Thiện (Đồng Nai)
                </a>


            </h5>
            <p class="store_address text-muted">
                215C Phạm Văn Thuận , Phường Tân Tiến, Tp.Biên Hoà, Đồng Nai
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=215C Phạm Văn Thuận , Phường Tân Tiến, Tp.Biên Hoà, Đồng Nai" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 215C Phạm Văn Thuận , Phường Tân Tiến, Tp.Biên Hoà, Đồng Nai">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO BRANDSHOP KHỞI LONG (ĐÀ NẴNG)" data-address="606 Tôn Đức Thắng, Phường Hòa Khánh Nam, Quận Liên Chiểu, TP Đà Nẵng, Quận Liên Chiểu, Đà Nẵng" data-name="OPPO BRANDSHOP KHỞI LONG (ĐÀ NẴNG)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO BRANDSHOP KHỞI LONG (ĐÀ NẴNG)
                </a>


            </h5>
            <p class="store_address text-muted">
                606 Tôn Đức Thắng, Phường Hòa Khánh Nam, Quận Liên Chiểu, TP Đà Nẵng, Quận Liên Chiểu, Đà Nẵng
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=606 Tôn Đức Thắng, Phường Hòa Khánh Nam, Quận Liên Chiểu, TP Đà Nẵng, Quận Liên Chiểu, Đà Nẵng" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 606 Tôn Đức Thắng, Phường Hòa Khánh Nam, Quận Liên Chiểu, TP Đà Nẵng, Quận Liên Chiểu, Đà Nẵng">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop MOBILE 1 (Đà Nẵng)" data-address="245 Trưng Nữ Vương, Phường Hòa Thuận Đông, Quận Hải Châu, TP. Đà Nẵng, Quận Hải Châu, Đà Nẵng" data-name="OPPO Brandshop MOBILE 1 (Đà Nẵng)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop MOBILE 1 (Đà Nẵng)
                </a>


            </h5>
            <p class="store_address text-muted">
                245 Trưng Nữ Vương, Phường Hòa Thuận Đông, Quận Hải Châu, TP. Đà Nẵng, Quận Hải Châu, Đà Nẵng
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=245 Trưng Nữ Vương, Phường Hòa Thuận Đông, Quận Hải Châu, TP. Đà Nẵng, Quận Hải Châu, Đà Nẵng" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 245 Trưng Nữ Vương, Phường Hòa Thuận Đông, Quận Hải Châu, TP. Đà Nẵng, Quận Hải Châu, Đà Nẵng">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop PM Sông Đốc ( Cà Mau )" data-address="Số 12-14 Trưng Nhị,Phường 2, Huyện Trần Văn Thời, Cà Mau" data-name="OPPO Brandshop PM Sông Đốc ( Cà Mau )" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop PM Sông Đốc ( Cà Mau )
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 12-14 Trưng Nhị,Phường 2, Huyện Trần Văn Thời, Cà Mau
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 12-14 Trưng Nhị,Phường 2, Huyện Trần Văn Thời, Cà Mau" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 12-14 Trưng Nhị,Phường 2, Huyện Trần Văn Thời, Cà Mau">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop PM Nguyễn Tất Thành ( Cà Mau )" data-address="Số 12-14 Trưng Nhị,Phường 2, Tp.Cà Mau, Cà Mau" data-name="OPPO Brandshop PM Nguyễn Tất Thành ( Cà Mau )" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop PM Nguyễn Tất Thành ( Cà Mau )
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 12-14 Trưng Nhị,Phường 2, Tp.Cà Mau, Cà Mau
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 12-14 Trưng Nhị,Phường 2, Tp.Cà Mau, Cà Mau" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 12-14 Trưng Nhị,Phường 2, Tp.Cà Mau, Cà Mau">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop PM Cái Nước ( Cà Mau )" data-address="Số 12-14 Trưng Nhị,Phường 2, Huyện Cái Nước, Cà Mau" data-name="OPPO Brandshop PM Cái Nước ( Cà Mau )" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop PM Cái Nước ( Cà Mau )
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 12-14 Trưng Nhị,Phường 2, Huyện Cái Nước, Cà Mau
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 12-14 Trưng Nhị,Phường 2, Huyện Cái Nước, Cà Mau" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 12-14 Trưng Nhị,Phường 2, Huyện Cái Nước, Cà Mau">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop PM Trần Hưng Đạo ( Cà Mau )" data-address="Số 12-14 Trưng Nhị,Phường 2, Tp.Cà Mau, Cà Mau" data-name="OPPO Brandshop PM Trần Hưng Đạo ( Cà Mau )" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop PM Trần Hưng Đạo ( Cà Mau )
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 12-14 Trưng Nhị,Phường 2, Tp.Cà Mau, Cà Mau
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 12-14 Trưng Nhị,Phường 2, Tp.Cà Mau, Cà Mau" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 12-14 Trưng Nhị,Phường 2, Tp.Cà Mau, Cà Mau">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Châu Đốc - An Giang" data-address="53 Lê Lợi, Châu Phú B, TP. Châu Đốc, An Giang" data-name="OPPO Brandshop Châu Đốc - An Giang" data-benefit="Wifi miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="demo.jpg">
                    OPPO Brandshop Châu Đốc - An Giang
                </a>


            </h5>
            <p class="store_address text-muted">
                53 Lê Lợi, Châu Phú B, TP. Châu Đốc, An Giang
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=53 Lê Lợi, Châu Phú B, TP. Châu Đốc, An Giang" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 53 Lê Lợi, Châu Phú B, TP. Châu Đốc, An Giang">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Châu Đốc (An Giang)" data-address="Số 53, Đường Lê Lợi, Khóm Châu Long 2, P.Châu Phú B, TP. Châu Đốc, An Giang" data-name="OPPO Brandshop Châu Đốc (An Giang)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Châu Đốc (An Giang)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 53, Đường Lê Lợi, Khóm Châu Long 2, P.Châu Phú B, TP. Châu Đốc, An Giang
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 53, Đường Lê Lợi, Khóm Châu Long 2, P.Châu Phú B, TP. Châu Đốc, An Giang" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 53, Đường Lê Lợi, Khóm Châu Long 2, P.Châu Phú B, TP. Châu Đốc, An Giang">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Vương Quốc Di Động (Hải Phòng)" data-address="Số 551, Đường Hà Nội, Phường Quán Toan, Quận Hồng Bàng, Hải Phòng" data-name="OPPO Brandshop Vương Quốc Di Động (Hải Phòng)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Vương Quốc Di Động (Hải Phòng)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 551, Đường Hà Nội, Phường Quán Toan, Quận Hồng Bàng, Hải Phòng
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 551, Đường Hà Nội, Phường Quán Toan, Quận Hồng Bàng, Hải Phòng" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 551, Đường Hà Nội, Phường Quán Toan, Quận Hồng Bàng, Hải Phòng">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Quỳnh Anh - Bà Rịa Vũng Tàu" data-address="Tổ 9, Ấp Phước Lộc, Xã Phước Hưng, Huyện Long Điền, Bà Rịa - Vũng Tàu" data-name="OPPO Brandshop Quỳnh Anh - Bà Rịa Vũng Tàu" data-benefit="Wifi Miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Quỳnh Anh - Bà Rịa Vũng Tàu
                </a>


            </h5>
            <p class="store_address text-muted">
                Tổ 9, Ấp Phước Lộc, Xã Phước Hưng, Huyện Long Điền, Bà Rịa - Vũng Tàu
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Tổ 9, Ấp Phước Lộc, Xã Phước Hưng, Huyện Long Điền, Bà Rịa - Vũng Tàu" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Tổ 9, Ấp Phước Lộc, Xã Phước Hưng, Huyện Long Điền, Bà Rịa - Vũng Tàu">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Mẫn (BR-VT)" data-address="278 - 280 Trương Công Định, Phường 3, TP. Vũng Tàu, Tỉnh Bà Rịa - Vũng Tàu, Tp.Vũng Tàu, Bà Rịa - Vũng Tàu" data-name="OPPO Brandshop Mẫn (BR-VT)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Mẫn (BR-VT)
                </a>


            </h5>
            <p class="store_address text-muted">
                278 - 280 Trương Công Định, Phường 3, TP. Vũng Tàu, Tỉnh Bà Rịa - Vũng Tàu, Tp.Vũng Tàu, Bà Rịa - Vũng Tàu
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=278 - 280 Trương Công Định, Phường 3, TP. Vũng Tàu, Tỉnh Bà Rịa - Vũng Tàu, Tp.Vũng Tàu, Bà Rịa - Vũng Tàu" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 278 - 280 Trương Công Định, Phường 3, TP. Vũng Tàu, Tỉnh Bà Rịa - Vũng Tàu, Tp.Vũng Tàu, Bà Rịa - Vũng Tàu">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop - Quỳnh Anh (BR-VT)" data-address="Tổ 9, Ấp Phước Lộc, Xã Phước Hưng, Huyện Long Điền, Bà Rịa - Vũng Tàu" data-name="OPPO Brandshop - Quỳnh Anh (BR-VT)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop - Quỳnh Anh (BR-VT)
                </a>


            </h5>
            <p class="store_address text-muted">
                Tổ 9, Ấp Phước Lộc, Xã Phước Hưng, Huyện Long Điền, Bà Rịa - Vũng Tàu
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Tổ 9, Ấp Phước Lộc, Xã Phước Hưng, Huyện Long Điền, Bà Rịa - Vũng Tàu" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Tổ 9, Ấp Phước Lộc, Xã Phước Hưng, Huyện Long Điền, Bà Rịa - Vũng Tàu">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Quốc Tế Di Động - Bắc Giang - Việt Yên" data-address="Số 372 Thân Nhân Trung, Thị Trấn Bích Động, Huyện Việt Yên, Bắc Giang" data-name="OPPO Brandshop Quốc Tế Di Động - Bắc Giang - Việt Yên" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour=" 08h30 - 22h00@" data-image="">
                    OPPO Brandshop Quốc Tế Di Động - Bắc Giang - Việt Yên
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 372 Thân Nhân Trung, Thị Trấn Bích Động, Huyện Việt Yên, Bắc Giang
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 372 Thân Nhân Trung, Thị Trấn Bích Động, Huyện Việt Yên, Bắc Giang" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 372 Thân Nhân Trung, Thị Trấn Bích Động, Huyện Việt Yên, Bắc Giang">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Trần Phú ( Bạc Liêu )" data-address="Số 382+58/5 đường Trần Phú, Khóm 5 , Phường 7, Tp.Bạc Liêu, Bạc Liêu" data-name="OPPO Brandshop Trần Phú ( Bạc Liêu )" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Trần Phú ( Bạc Liêu )
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 382+58/5 đường Trần Phú, Khóm 5 , Phường 7, Tp.Bạc Liêu, Bạc Liêu
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 382+58/5 đường Trần Phú, Khóm 5 , Phường 7, Tp.Bạc Liêu, Bạc Liêu" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 382+58/5 đường Trần Phú, Khóm 5 , Phường 7, Tp.Bạc Liêu, Bạc Liêu">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Đông Yên - Bắc Ninh -Yên Phong" data-address="Ngã 3 Đông Yên - Đông Phong - Yên Phong - Bắc Ninh, Bắc Ninh" data-name="OPPO Brandshop Đông Yên - Bắc Ninh -Yên Phong" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Đông Yên - Bắc Ninh -Yên Phong
                </a>


            </h5>
            <p class="store_address text-muted">
                Ngã 3 Đông Yên - Đông Phong - Yên Phong - Bắc Ninh, Bắc Ninh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Ngã 3 Đông Yên - Đông Phong - Yên Phong - Bắc Ninh, Bắc Ninh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Ngã 3 Đông Yên - Đông Phong - Yên Phong - Bắc Ninh, Bắc Ninh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Thành Tỵ 2 - Bình Định" data-address="160A Trần Phú,TX An Nhơn, Huyện An Nhơn, Bình Định" data-name="OPPO Brandshop Thành Tỵ 2 - Bình Định" data-benefit="Wifi Miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="OPPO_Demo3.jpg">
                    OPPO Brandshop Thành Tỵ 2 - Bình Định
                </a>


            </h5>
            <p class="store_address text-muted">
                160A Trần Phú,TX An Nhơn, Huyện An Nhơn, Bình Định
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=160A Trần Phú,TX An Nhơn, Huyện An Nhơn, Bình Định" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 160A Trần Phú,TX An Nhơn, Huyện An Nhơn, Bình Định">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Thành Tỵ 2 (Bình Định)" data-address="160A Trần Phú,TX An Nhơn , Huyện An Nhơn, Bình Định" data-name="OPPO Brandshop Thành Tỵ 2 (Bình Định)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Thành Tỵ 2 (Bình Định)
                </a>


            </h5>
            <p class="store_address text-muted">
                160A Trần Phú,TX An Nhơn , Huyện An Nhơn, Bình Định
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=160A Trần Phú,TX An Nhơn , Huyện An Nhơn, Bình Định" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 160A Trần Phú,TX An Nhơn , Huyện An Nhơn, Bình Định">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Nguyễn Hồ - Bình Dương" data-address="1A1/19 KDC 434 - Khu Phố Bình Đáng - Phường Bình Hòa, Thị xã Thuận An, Bình Dương" data-name="OPPO Brandshop Nguyễn Hồ - Bình Dương" data-benefit="Wifi Miễn Phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="Brandshop-NH-BD3.png|Brandshop-NH-BD2.png">
                    OPPO Brandshop Nguyễn Hồ - Bình Dương
                </a>


            </h5>
            <p class="store_address text-muted">
                1A1/19 KDC 434 - Khu Phố Bình Đáng - Phường Bình Hòa, Thị xã Thuận An, Bình Dương
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=1A1/19 KDC 434 - Khu Phố Bình Đáng - Phường Bình Hòa, Thị xã Thuận An, Bình Dương" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 1A1/19 KDC 434 - Khu Phố Bình Đáng - Phường Bình Hòa, Thị xã Thuận An, Bình Dương">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Năm Lệ III" data-address="Tổ 2, Ấp 1, Xã Hội Nghĩa, Thị xã Tân Uyên, Bình Dương" data-name="OPPO Brandshop Năm Lệ III" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Năm Lệ III
                </a>


            </h5>
            <p class="store_address text-muted">
                Tổ 2, Ấp 1, Xã Hội Nghĩa, Thị xã Tân Uyên, Bình Dương
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Tổ 2, Ấp 1, Xã Hội Nghĩa, Thị xã Tân Uyên, Bình Dương" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Tổ 2, Ấp 1, Xã Hội Nghĩa, Thị xã Tân Uyên, Bình Dương">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Tuấn Anh Phát (Bình Dương)" data-address="Số 214 - Ấp Lồ Ô - Xã An Tây, Thị xã Bến Cát, Bình Dương" data-name="OPPO Brandshop Tuấn Anh Phát (Bình Dương)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Tuấn Anh Phát (Bình Dương)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 214 - Ấp Lồ Ô - Xã An Tây, Thị xã Bến Cát, Bình Dương
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 214 - Ấp Lồ Ô - Xã An Tây, Thị xã Bến Cát, Bình Dương" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 214 - Ấp Lồ Ô - Xã An Tây, Thị xã Bến Cát, Bình Dương">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Khang Hy (Bình Dương)" data-address="Ki ốt 1-2-3 - 242/1A KP Thạnh Hòa B,P.An Thạnh, TX.Thuận An,T.Bình Dương, Thị xã Thuận An, Bình Dương" data-name="OPPO Brandshop Khang Hy (Bình Dương)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Khang Hy (Bình Dương)
                </a>


            </h5>
            <p class="store_address text-muted">
                Ki ốt 1-2-3 - 242/1A KP Thạnh Hòa B,P.An Thạnh, TX.Thuận An,T.Bình Dương, Thị xã Thuận An, Bình Dương
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Ki ốt 1-2-3 - 242/1A KP Thạnh Hòa B,P.An Thạnh, TX.Thuận An,T.Bình Dương, Thị xã Thuận An, Bình Dương" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Ki ốt 1-2-3 - 242/1A KP Thạnh Hòa B,P.An Thạnh, TX.Thuận An,T.Bình Dương, Thị xã Thuận An, Bình Dương">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Nguyễn Hồ (Bình Dương)" data-address="1A1/19 KDC 434 - Khu Phố Bình Đáng - Phường Bình Hòa, Thị xã Thuận An, Bình Dương" data-name="OPPO Brandshop Nguyễn Hồ (Bình Dương)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Nguyễn Hồ (Bình Dương)
                </a>


            </h5>
            <p class="store_address text-muted">
                1A1/19 KDC 434 - Khu Phố Bình Đáng - Phường Bình Hòa, Thị xã Thuận An, Bình Dương
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=1A1/19 KDC 434 - Khu Phố Bình Đáng - Phường Bình Hòa, Thị xã Thuận An, Bình Dương" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 1A1/19 KDC 434 - Khu Phố Bình Đáng - Phường Bình Hòa, Thị xã Thuận An, Bình Dương">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Thành Đạt - Bình Phước" data-address="Số 205, đường Nguyễn Huệ, Phường An Lộc, Thị xã Bình Long, Bình Phước" data-name="OPPO Brandshop Thành Đạt - Bình Phước" data-benefit="Wifi Miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="Brandshop3.jpg">
                    OPPO Brandshop Thành Đạt - Bình Phước
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 205, đường Nguyễn Huệ, Phường An Lộc, Thị xã Bình Long, Bình Phước
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 205, đường Nguyễn Huệ, Phường An Lộc, Thị xã Bình Long, Bình Phước" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 205, đường Nguyễn Huệ, Phường An Lộc, Thị xã Bình Long, Bình Phước">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Thành Đạt (Bình Phước)" data-address="Số 203, Đường Nguyễn Huệ, Phường An Lộc, Thị xã Bình Long, Bình Phước" data-name="OPPO Brandshop Thành Đạt (Bình Phước)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Thành Đạt (Bình Phước)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 203, Đường Nguyễn Huệ, Phường An Lộc, Thị xã Bình Long, Bình Phước
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 203, Đường Nguyễn Huệ, Phường An Lộc, Thị xã Bình Long, Bình Phước" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 203, Đường Nguyễn Huệ, Phường An Lộc, Thị xã Bình Long, Bình Phước">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Dương Nga (Bình Thuận)" data-address="Khu phố 3, TT. Võ Xu, H. Đức Linh, Tỉnh Bình Thuận, Huyện Đức Linh, Bình Thuận" data-name="OPPO Brandshop Dương Nga (Bình Thuận)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Dương Nga (Bình Thuận)
                </a>


            </h5>
            <p class="store_address text-muted">
                Khu phố 3, TT. Võ Xu, H. Đức Linh, Tỉnh Bình Thuận, Huyện Đức Linh, Bình Thuận
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Khu phố 3, TT. Võ Xu, H. Đức Linh, Tỉnh Bình Thuận, Huyện Đức Linh, Bình Thuận" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Khu phố 3, TT. Võ Xu, H. Đức Linh, Tỉnh Bình Thuận, Huyện Đức Linh, Bình Thuận">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Thùy Trang (Bình Thuận)" data-address="Số 100, đường Lê Lợi , Khu phố 3 , Phường Phước Hội, Thị xã La Gi, Bình Thuận" data-name="OPPO Brandshop Thùy Trang (Bình Thuận)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Thùy Trang (Bình Thuận)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 100, đường Lê Lợi , Khu phố 3 , Phường Phước Hội, Thị xã La Gi, Bình Thuận
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 100, đường Lê Lợi , Khu phố 3 , Phường Phước Hội, Thị xã La Gi, Bình Thuận" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 100, đường Lê Lợi , Khu phố 3 , Phường Phước Hội, Thị xã La Gi, Bình Thuận">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Hữu Phước- Đăk Nông - Đăk R'Lấp" data-address="03 Đường Nguyễn Tất Thành, Thị Trấn Kiến Đức, Huyện Đăk R'Lấp, Đắc Nông" data-name="OPPO Brandshop Hữu Phước- Đăk Nông - Đăk R'Lấp" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Hữu Phước- Đăk Nông - Đăk R'Lấp
                </a>


            </h5>
            <p class="store_address text-muted">
                03 Đường Nguyễn Tất Thành, Thị Trấn Kiến Đức, Huyện Đăk R'Lấp, Đắc Nông
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=03 Đường Nguyễn Tất Thành, Thị Trấn Kiến Đức, Huyện Đăk R'Lấp, Đắc Nông" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 03 Đường Nguyễn Tất Thành, Thị Trấn Kiến Đức, Huyện Đăk R'Lấp, Đắc Nông">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Anh Chương - Gia Lai" data-address="135 đường Trần Phú, TP. Pleiku, Gia Lai" data-name="OPPO Brandshop Anh Chương - Gia Lai" data-benefit="Wifi miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="Brandshop-GL1.jpg|Brandshop-GL2.jpg">
                    OPPO Brandshop Anh Chương - Gia Lai
                </a>


            </h5>
            <p class="store_address text-muted">
                135 đường Trần Phú, TP. Pleiku, Gia Lai
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=135 đường Trần Phú, TP. Pleiku, Gia Lai" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 135 đường Trần Phú, TP. Pleiku, Gia Lai">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Gia Hưng 2 (Đức Cơ - Gia Lai)" data-address="Lô số 05, Chợ Đức Cơ, Thị Trấn Chư Ty, Huyện Đức Cơ, Tỉnh Gia Lai, Huyện Đức Cơ, Gia Lai" data-name="OPPO Brandshop Gia Hưng 2 (Đức Cơ - Gia Lai)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Gia Hưng 2 (Đức Cơ - Gia Lai)
                </a>


            </h5>
            <p class="store_address text-muted">
                Lô số 05, Chợ Đức Cơ, Thị Trấn Chư Ty, Huyện Đức Cơ, Tỉnh Gia Lai, Huyện Đức Cơ, Gia Lai
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Lô số 05, Chợ Đức Cơ, Thị Trấn Chư Ty, Huyện Đức Cơ, Tỉnh Gia Lai, Huyện Đức Cơ, Gia Lai" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Lô số 05, Chợ Đức Cơ, Thị Trấn Chư Ty, Huyện Đức Cơ, Tỉnh Gia Lai, Huyện Đức Cơ, Gia Lai">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Anh Chương (Gia Lai)" data-address="36/7-36/9 Trần Phú,phường Tây Sơn, TP. Pleiku, Gia Lai" data-name="OPPO Brandshop Anh Chương (Gia Lai)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Anh Chương (Gia Lai)
                </a>


            </h5>
            <p class="store_address text-muted">
                36/7-36/9 Trần Phú,phường Tây Sơn, TP. Pleiku, Gia Lai
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=36/7-36/9 Trần Phú,phường Tây Sơn, TP. Pleiku, Gia Lai" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 36/7-36/9 Trần Phú,phường Tây Sơn, TP. Pleiku, Gia Lai">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO BRANDSHOP HỢP VÂN SƠN (Hà Nam)" data-address="PHỐ CÀ, XÃ THANH NGUYÊN, HUYỆN THANH LIÊM, TỈNH HÀ NAM, Huyện Thanh Liêm, Hà Nam" data-name="OPPO BRANDSHOP HỢP VÂN SƠN (Hà Nam)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO BRANDSHOP HỢP VÂN SƠN (Hà Nam)
                </a>


            </h5>
            <p class="store_address text-muted">
                PHỐ CÀ, XÃ THANH NGUYÊN, HUYỆN THANH LIÊM, TỈNH HÀ NAM, Huyện Thanh Liêm, Hà Nam
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=PHỐ CÀ, XÃ THANH NGUYÊN, HUYỆN THANH LIÊM, TỈNH HÀ NAM, Huyện Thanh Liêm, Hà Nam" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng PHỐ CÀ, XÃ THANH NGUYÊN, HUYỆN THANH LIÊM, TỈNH HÀ NAM, Huyện Thanh Liêm, Hà Nam">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Hồng Lĩnh (Hà Tĩnh)" data-address="số nhà 06 - Đường Nguyễn Ái Quốc - Phường Bắc Hồng , Thị xã Hồng Lĩnh, Hà Tĩnh" data-name="OPPO Brandshop Hồng Lĩnh (Hà Tĩnh)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Hồng Lĩnh (Hà Tĩnh)
                </a>


            </h5>
            <p class="store_address text-muted">
                số nhà 06 - Đường Nguyễn Ái Quốc - Phường Bắc Hồng , Thị xã Hồng Lĩnh, Hà Tĩnh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=số nhà 06 - Đường Nguyễn Ái Quốc - Phường Bắc Hồng , Thị xã Hồng Lĩnh, Hà Tĩnh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng số nhà 06 - Đường Nguyễn Ái Quốc - Phường Bắc Hồng , Thị xã Hồng Lĩnh, Hà Tĩnh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Anh Đào - Hải Dương" data-address="Km 01 Nguyễn Lương Bằng, Phường Phạm Ngũ Lão, Tp.Hải Dương, Hải Dương" data-name="OPPO Brandshop Anh Đào - Hải Dương" data-benefit="Wifi Miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="OPPO_Demo4.jpg">
                    OPPO Brandshop Anh Đào - Hải Dương
                </a>


            </h5>
            <p class="store_address text-muted">
                Km 01 Nguyễn Lương Bằng, Phường Phạm Ngũ Lão, Tp.Hải Dương, Hải Dương
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Km 01 Nguyễn Lương Bằng, Phường Phạm Ngũ Lão, Tp.Hải Dương, Hải Dương" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Km 01 Nguyễn Lương Bằng, Phường Phạm Ngũ Lão, Tp.Hải Dương, Hải Dương">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Anh Đào (Hải Dương)" data-address="Km 01 Nguyễn Lương Bằng, Phường Phạm Ngũ Lão, Tp.Hải Dương, Hải Dương" data-name="OPPO Brandshop Anh Đào (Hải Dương)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Anh Đào (Hải Dương)
                </a>


            </h5>
            <p class="store_address text-muted">
                Km 01 Nguyễn Lương Bằng, Phường Phạm Ngũ Lão, Tp.Hải Dương, Hải Dương
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Km 01 Nguyễn Lương Bằng, Phường Phạm Ngũ Lão, Tp.Hải Dương, Hải Dương" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Km 01 Nguyễn Lương Bằng, Phường Phạm Ngũ Lão, Tp.Hải Dương, Hải Dương">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Khánh Hòa ( Ninh Hòa - Khánh Hòa)" data-address="số 300 Trần Quý Cáp, phường Ninh Hiệp, Huyện Ninh Hòa, Khánh Hoà" data-name="OPPO Brandshop Khánh Hòa ( Ninh Hòa - Khánh Hòa)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Khánh Hòa ( Ninh Hòa - Khánh Hòa)
                </a>


            </h5>
            <p class="store_address text-muted">
                số 300 Trần Quý Cáp, phường Ninh Hiệp, Huyện Ninh Hòa, Khánh Hoà
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=số 300 Trần Quý Cáp, phường Ninh Hiệp, Huyện Ninh Hòa, Khánh Hoà" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng số 300 Trần Quý Cáp, phường Ninh Hiệp, Huyện Ninh Hòa, Khánh Hoà">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO BrandShop Gia Khương - Kiên Giang" data-address="124-126 Đường Nguyễn Trung Trực, Phường Vĩnh Bảo, Tp.Rạch Giá, Kiên Giang" data-name="OPPO BrandShop Gia Khương - Kiên Giang" data-benefit="Wifi miễn phí|Nước uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00 @" data-image="1.jpg|2.png|3.png">
                    OPPO BrandShop Gia Khương - Kiên Giang
                </a>


            </h5>
            <p class="store_address text-muted">
                124-126 Đường Nguyễn Trung Trực, Phường Vĩnh Bảo, Tp.Rạch Giá, Kiên Giang
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=124-126 Đường Nguyễn Trung Trực, Phường Vĩnh Bảo, Tp.Rạch Giá, Kiên Giang" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 124-126 Đường Nguyễn Trung Trực, Phường Vĩnh Bảo, Tp.Rạch Giá, Kiên Giang">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Hiệp Tú Cần ( Kiên Giang)" data-address="Số 221, Khu Phố 2, Thị Trấn Thứ Mười Một, Huyện An Minh, Kiên Giang" data-name="OPPO Brandshop Hiệp Tú Cần ( Kiên Giang)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Hiệp Tú Cần ( Kiên Giang)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 221, Khu Phố 2, Thị Trấn Thứ Mười Một, Huyện An Minh, Kiên Giang
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 221, Khu Phố 2, Thị Trấn Thứ Mười Một, Huyện An Minh, Kiên Giang" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 221, Khu Phố 2, Thị Trấn Thứ Mười Một, Huyện An Minh, Kiên Giang">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Phạm Tuân ( Kiên Giang)" data-address="Số 150, Tổ 12, Khu Phố Tri Tôn, Thị Trấn Hòn Đất, Huyện Hòn Đất, Kiên Giang" data-name="OPPO Brandshop Phạm Tuân ( Kiên Giang)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Phạm Tuân ( Kiên Giang)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 150, Tổ 12, Khu Phố Tri Tôn, Thị Trấn Hòn Đất, Huyện Hòn Đất, Kiên Giang
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 150, Tổ 12, Khu Phố Tri Tôn, Thị Trấn Hòn Đất, Huyện Hòn Đất, Kiên Giang" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 150, Tổ 12, Khu Phố Tri Tôn, Thị Trấn Hòn Đất, Huyện Hòn Đất, Kiên Giang">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Gia Khương ( Kiên Giang)" data-address="124-126 Đường Nguyễn Trung Trực, Phường Vĩnh Bảo, Tp.Rạch Giá, Kiên Giang" data-name="OPPO Brandshop Gia Khương ( Kiên Giang)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Gia Khương ( Kiên Giang)
                </a>


            </h5>
            <p class="store_address text-muted">
                124-126 Đường Nguyễn Trung Trực, Phường Vĩnh Bảo, Tp.Rạch Giá, Kiên Giang
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=124-126 Đường Nguyễn Trung Trực, Phường Vĩnh Bảo, Tp.Rạch Giá, Kiên Giang" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 124-126 Đường Nguyễn Trung Trực, Phường Vĩnh Bảo, Tp.Rạch Giá, Kiên Giang">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Bảo Lộc - Lâm Đồng" data-address="579A Trần Phú, Phường B'Lao, Tp.Bảo Lộc, Lâm Đồng" data-name="OPPO Brandshop Bảo Lộc - Lâm Đồng" data-benefit="Wifi Miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="@" data-image="Brandshop5.jpg">
                    OPPO Brandshop Bảo Lộc - Lâm Đồng
                </a>


            </h5>
            <p class="store_address text-muted">
                579A Trần Phú, Phường B'Lao, Tp.Bảo Lộc, Lâm Đồng
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=579A Trần Phú, Phường B'Lao, Tp.Bảo Lộc, Lâm Đồng" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 579A Trần Phú, Phường B'Lao, Tp.Bảo Lộc, Lâm Đồng">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Lộc Châu (Lâm Đồng)" data-address="579A Trần Phú, Phường B'lao, Tp.Bảo Lộc, Lâm Đồng" data-name="OPPO Brandshop Lộc Châu (Lâm Đồng)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Lộc Châu (Lâm Đồng)
                </a>


            </h5>
            <p class="store_address text-muted">
                579A Trần Phú, Phường B'lao, Tp.Bảo Lộc, Lâm Đồng
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=579A Trần Phú, Phường B'lao, Tp.Bảo Lộc, Lâm Đồng" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 579A Trần Phú, Phường B'lao, Tp.Bảo Lộc, Lâm Đồng">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Công Chính (Lào Cai)" data-address="Tổ 04, Thị trấn Khánh Yên, huyện Văn Bàn, tỉnh Lào Cai, Huyện Văn Bàn, Lào Cai" data-name="OPPO Brandshop Công Chính (Lào Cai)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Công Chính (Lào Cai)
                </a>


            </h5>
            <p class="store_address text-muted">
                Tổ 04, Thị trấn Khánh Yên, huyện Văn Bàn, tỉnh Lào Cai, Huyện Văn Bàn, Lào Cai
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Tổ 04, Thị trấn Khánh Yên, huyện Văn Bàn, tỉnh Lào Cai, Huyện Văn Bàn, Lào Cai" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Tổ 04, Thị trấn Khánh Yên, huyện Văn Bàn, tỉnh Lào Cai, Huyện Văn Bàn, Lào Cai">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Lào Cai" data-address="Sn 353, Hoàng Liên, phường Cốc Lếu, Tp.Lào Cai, Lào Cai" data-name="OPPO Brandshop Lào Cai" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Lào Cai
                </a>


            </h5>
            <p class="store_address text-muted">
                Sn 353, Hoàng Liên, phường Cốc Lếu, Tp.Lào Cai, Lào Cai
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Sn 353, Hoàng Liên, phường Cốc Lếu, Tp.Lào Cai, Lào Cai" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Sn 353, Hoàng Liên, phường Cốc Lếu, Tp.Lào Cai, Lào Cai">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Tài Lộc - Long An" data-address="136 -138 Nguyễn Hữu Thọ - Khu Phố 3, Huyện Bến Lức, Long An" data-name="OPPO Brandshop Tài Lộc - Long An" data-benefit="Wifi Miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="OPPO_Demo2.jpg">
                    OPPO Brandshop Tài Lộc - Long An
                </a>


            </h5>
            <p class="store_address text-muted">
                136 -138 Nguyễn Hữu Thọ - Khu Phố 3, Huyện Bến Lức, Long An
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=136 -138 Nguyễn Hữu Thọ - Khu Phố 3, Huyện Bến Lức, Long An" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 136 -138 Nguyễn Hữu Thọ - Khu Phố 3, Huyện Bến Lức, Long An">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Đức Hòa (Long An)" data-address="Số 16 - Tổ 6 - Ấp Bình Tả 2 - Xã Đức Hòa Hạ, Huyện Đức Hòa, Long An" data-name="OPPO Brandshop Đức Hòa (Long An)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="1OPPO.png">
                    OPPO Brandshop Đức Hòa (Long An)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 16 - Tổ 6 - Ấp Bình Tả 2 - Xã Đức Hòa Hạ, Huyện Đức Hòa, Long An
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 16 - Tổ 6 - Ấp Bình Tả 2 - Xã Đức Hòa Hạ, Huyện Đức Hòa, Long An" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 16 - Tổ 6 - Ấp Bình Tả 2 - Xã Đức Hòa Hạ, Huyện Đức Hòa, Long An">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Tài Lộc (Long An)" data-address="136-138 Nguyễn Hữu Thọ - Khu Phố 3, Huyện Bến Lức, Long An" data-name="OPPO Brandshop Tài Lộc (Long An)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Tài Lộc (Long An)
                </a>


            </h5>
            <p class="store_address text-muted">
                136-138 Nguyễn Hữu Thọ - Khu Phố 3, Huyện Bến Lức, Long An
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=136-138 Nguyễn Hữu Thọ - Khu Phố 3, Huyện Bến Lức, Long An" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 136-138 Nguyễn Hữu Thọ - Khu Phố 3, Huyện Bến Lức, Long An">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Đoàn Kết Plaza - Nam Định" data-address="353 Trần Hưng Đạo, Nam Định" data-name="OPPO Brandshop Đoàn Kết Plaza - Nam Định" data-benefit="Wifi Miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="Brandshop2.jpg">
                    OPPO Brandshop Đoàn Kết Plaza - Nam Định
                </a>


            </h5>
            <p class="store_address text-muted">
                353 Trần Hưng Đạo, Nam Định
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=353 Trần Hưng Đạo, Nam Định" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 353 Trần Hưng Đạo, Nam Định">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Đoàn Kết Plaza (Nam Định)" data-address="Số 353 Trần Hưng Đạo, Tp.Nam Định, Nam Định" data-name="OPPO Brandshop Đoàn Kết Plaza (Nam Định)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Đoàn Kết Plaza (Nam Định)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 353 Trần Hưng Đạo, Tp.Nam Định, Nam Định
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 353 Trần Hưng Đạo, Tp.Nam Định, Nam Định" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 353 Trần Hưng Đạo, Tp.Nam Định, Nam Định">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Huỳnh Đức - Nghệ An" data-address="103 Nguyễn Thị Minh Khai, Tp.Vinh, Nghệ An" data-name="OPPO Brandshop Huỳnh Đức - Nghệ An" data-benefit="Wifi miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour=" 08h30 - 22h00@" data-image="Brandshop-NA1.png|Brandshop-NA2.png">
                    OPPO Brandshop Huỳnh Đức - Nghệ An
                </a>


            </h5>
            <p class="store_address text-muted">
                103 Nguyễn Thị Minh Khai, Tp.Vinh, Nghệ An
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=103 Nguyễn Thị Minh Khai, Tp.Vinh, Nghệ An" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 103 Nguyễn Thị Minh Khai, Tp.Vinh, Nghệ An">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Huỳnh Đức (Minh Khai - Nghệ An)" data-address="103 - Nguyễn Thị Minh Khai, Tp.Vinh, Nghệ An" data-name="OPPO Brandshop Huỳnh Đức (Minh Khai - Nghệ An)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Huỳnh Đức (Minh Khai - Nghệ An)
                </a>


            </h5>
            <p class="store_address text-muted">
                103 - Nguyễn Thị Minh Khai, Tp.Vinh, Nghệ An
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=103 - Nguyễn Thị Minh Khai, Tp.Vinh, Nghệ An" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 103 - Nguyễn Thị Minh Khai, Tp.Vinh, Nghệ An">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO BRANDSHOP THÚY HÙNG (Phú Thọ)" data-address="Ngã ba cầu Bưởi, thị trấn Hùng Sơn, Huyện Lâm Thao, Phú Thọ" data-name="OPPO BRANDSHOP THÚY HÙNG (Phú Thọ)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO BRANDSHOP THÚY HÙNG (Phú Thọ)
                </a>


            </h5>
            <p class="store_address text-muted">
                Ngã ba cầu Bưởi, thị trấn Hùng Sơn, Huyện Lâm Thao, Phú Thọ
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Ngã ba cầu Bưởi, thị trấn Hùng Sơn, Huyện Lâm Thao, Phú Thọ" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Ngã ba cầu Bưởi, thị trấn Hùng Sơn, Huyện Lâm Thao, Phú Thọ">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Phú Yên ( Phú Yên)" data-address="191 Nguyễn Huệ, phường 5, Huyện Tây Hòa, Phú Yên" data-name="OPPO Brandshop Phú Yên ( Phú Yên)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Phú Yên ( Phú Yên)
                </a>


            </h5>
            <p class="store_address text-muted">
                191 Nguyễn Huệ, phường 5, Huyện Tây Hòa, Phú Yên
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=191 Nguyễn Huệ, phường 5, Huyện Tây Hòa, Phú Yên" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 191 Nguyễn Huệ, phường 5, Huyện Tây Hòa, Phú Yên">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Toàn Cầu - Quảng Bình" data-address="137 Trần Hưng Đạo, Phường Đồng Phú, Tp.Đồng Hới, Quảng Bình" data-name="OPPO Brandshop Toàn Cầu - Quảng Bình" data-benefit="Wifi miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="Brandshop-TC-QB1.jpeg">
                    OPPO Brandshop Toàn Cầu - Quảng Bình
                </a>


            </h5>
            <p class="store_address text-muted">
                137 Trần Hưng Đạo, Phường Đồng Phú, Tp.Đồng Hới, Quảng Bình
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=137 Trần Hưng Đạo, Phường Đồng Phú, Tp.Đồng Hới, Quảng Bình" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 137 Trần Hưng Đạo, Phường Đồng Phú, Tp.Đồng Hới, Quảng Bình">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Toàn Cầu (Quảng Bình)" data-address="137 Trần Hưng Đạo- Phường Đồng Phú, Tp.Đồng Hới, Quảng Bình" data-name="OPPO Brandshop Toàn Cầu (Quảng Bình)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Toàn Cầu (Quảng Bình)
                </a>


            </h5>
            <p class="store_address text-muted">
                137 Trần Hưng Đạo- Phường Đồng Phú, Tp.Đồng Hới, Quảng Bình
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=137 Trần Hưng Đạo- Phường Đồng Phú, Tp.Đồng Hới, Quảng Bình" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 137 Trần Hưng Đạo- Phường Đồng Phú, Tp.Đồng Hới, Quảng Bình">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop MOBILE 1 (QUẢNG NAM)" data-address="Số 47, đường Tiểu La, Thị Trấn Hà Lam, Huyện Thăng Bình, Tỉnh Quảng Nam, Huyện Thăng Bình, Quảng Nam" data-name="OPPO Brandshop MOBILE 1 (QUẢNG NAM)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop MOBILE 1 (QUẢNG NAM)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 47, đường Tiểu La, Thị Trấn Hà Lam, Huyện Thăng Bình, Tỉnh Quảng Nam, Huyện Thăng Bình, Quảng Nam
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 47, đường Tiểu La, Thị Trấn Hà Lam, Huyện Thăng Bình, Tỉnh Quảng Nam, Huyện Thăng Bình, Quảng Nam" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 47, đường Tiểu La, Thị Trấn Hà Lam, Huyện Thăng Bình, Tỉnh Quảng Nam, Huyện Thăng Bình, Quảng Nam">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Duy Lợi ( Uông Bí )" data-address="SN 507, Quang Trung, Tổ 43, Khu12, Phường Quang Trung, TP Uông Bí, QN, Thị xã Uông Bí, Quảng Ninh" data-name="OPPO Brandshop Duy Lợi ( Uông Bí )" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Duy Lợi ( Uông Bí )
                </a>


            </h5>
            <p class="store_address text-muted">
                SN 507, Quang Trung, Tổ 43, Khu12, Phường Quang Trung, TP Uông Bí, QN, Thị xã Uông Bí, Quảng Ninh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=SN 507, Quang Trung, Tổ 43, Khu12, Phường Quang Trung, TP Uông Bí, QN, Thị xã Uông Bí, Quảng Ninh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng SN 507, Quang Trung, Tổ 43, Khu12, Phường Quang Trung, TP Uông Bí, QN, Thị xã Uông Bí, Quảng Ninh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Xinh Tươi (Quảng Ninh)" data-address="377 Trần Phú, Thị xã Cẩm Phả, Quảng Ninh" data-name="OPPO Brandshop Xinh Tươi (Quảng Ninh)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Xinh Tươi (Quảng Ninh)
                </a>


            </h5>
            <p class="store_address text-muted">
                377 Trần Phú, Thị xã Cẩm Phả, Quảng Ninh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=377 Trần Phú, Thị xã Cẩm Phả, Quảng Ninh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 377 Trần Phú, Thị xã Cẩm Phả, Quảng Ninh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Duy Lợi ( Mạo Khê ) (Quảng Ninh)" data-address="Số nhà 27, Khu Hoàng Hoa Thám, Phường Mạo Khê, Thị Xã Đông Triều, Tỉnh Quảng Ninh, Thị xã Đông Triều, Quảng Ninh" data-name="OPPO Brandshop Duy Lợi ( Mạo Khê ) (Quảng Ninh)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Duy Lợi ( Mạo Khê ) (Quảng Ninh)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số nhà 27, Khu Hoàng Hoa Thám, Phường Mạo Khê, Thị Xã Đông Triều, Tỉnh Quảng Ninh, Thị xã Đông Triều, Quảng Ninh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số nhà 27, Khu Hoàng Hoa Thám, Phường Mạo Khê, Thị Xã Đông Triều, Tỉnh Quảng Ninh, Thị xã Đông Triều, Quảng Ninh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số nhà 27, Khu Hoàng Hoa Thám, Phường Mạo Khê, Thị Xã Đông Triều, Tỉnh Quảng Ninh, Thị xã Đông Triều, Quảng Ninh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Quốc Anh - Quảng Ninh - Vân Đồn" data-address="Số nhà 74, khu 4, thị trấn Cái Rồng, huyện Vân Đồn, tỉnh Quảng Ninh, Huyện Vân Đồn, Quảng Ninh" data-name="OPPO Brandshop Quốc Anh - Quảng Ninh - Vân Đồn" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Quốc Anh - Quảng Ninh - Vân Đồn
                </a>


            </h5>
            <p class="store_address text-muted">
                Số nhà 74, khu 4, thị trấn Cái Rồng, huyện Vân Đồn, tỉnh Quảng Ninh, Huyện Vân Đồn, Quảng Ninh
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số nhà 74, khu 4, thị trấn Cái Rồng, huyện Vân Đồn, tỉnh Quảng Ninh, Huyện Vân Đồn, Quảng Ninh" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số nhà 74, khu 4, thị trấn Cái Rồng, huyện Vân Đồn, tỉnh Quảng Ninh, Huyện Vân Đồn, Quảng Ninh">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Tín Nghĩa Mobile (Sơn La)" data-address="Thửa Đất Số 1, Tiểu Khu 7, Thị Trấn Mộc Châu, Huyện Mộc Châu, Sơn La" data-name="OPPO Brandshop Tín Nghĩa Mobile (Sơn La)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Tín Nghĩa Mobile (Sơn La)
                </a>


            </h5>
            <p class="store_address text-muted">
                Thửa Đất Số 1, Tiểu Khu 7, Thị Trấn Mộc Châu, Huyện Mộc Châu, Sơn La
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Thửa Đất Số 1, Tiểu Khu 7, Thị Trấn Mộc Châu, Huyện Mộc Châu, Sơn La" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Thửa Đất Số 1, Tiểu Khu 7, Thị Trấn Mộc Châu, Huyện Mộc Châu, Sơn La">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Thái Việt" data-address="Số 313 đường Lý Bôn, phường Bồ Xuyên, Tp.Thái Bình, Thái Bình" data-name="OPPO Brandshop Thái Việt" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Thái Việt
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 313 đường Lý Bôn, phường Bồ Xuyên, Tp.Thái Bình, Thái Bình
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 313 đường Lý Bôn, phường Bồ Xuyên, Tp.Thái Bình, Thái Bình" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 313 đường Lý Bôn, phường Bồ Xuyên, Tp.Thái Bình, Thái Bình">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Smartphone Đại Từ ( Thái Nguyên )" data-address="Tổ dân phố Đình, thị trấn Hùng Sơn, huyện Đại Từ, tỉnh Thái Nguyên, Huyện Đại Từ, Thái Nguyên" data-name="OPPO Brandshop Smartphone Đại Từ ( Thái Nguyên )" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Smartphone Đại Từ ( Thái Nguyên )
                </a>


            </h5>
            <p class="store_address text-muted">
                Tổ dân phố Đình, thị trấn Hùng Sơn, huyện Đại Từ, tỉnh Thái Nguyên, Huyện Đại Từ, Thái Nguyên
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Tổ dân phố Đình, thị trấn Hùng Sơn, huyện Đại Từ, tỉnh Thái Nguyên, Huyện Đại Từ, Thái Nguyên" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Tổ dân phố Đình, thị trấn Hùng Sơn, huyện Đại Từ, tỉnh Thái Nguyên, Huyện Đại Từ, Thái Nguyên">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Smartphone Yên Bình ( Thái Nguyên )" data-address="Tổ dân phố An Bình, phường Đồng Tiến, Huyện Phổ Yên, Thái Nguyên" data-name="OPPO Brandshop Smartphone Yên Bình ( Thái Nguyên )" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Smartphone Yên Bình ( Thái Nguyên )
                </a>


            </h5>
            <p class="store_address text-muted">
                Tổ dân phố An Bình, phường Đồng Tiến, Huyện Phổ Yên, Thái Nguyên
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Tổ dân phố An Bình, phường Đồng Tiến, Huyện Phổ Yên, Thái Nguyên" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Tổ dân phố An Bình, phường Đồng Tiến, Huyện Phổ Yên, Thái Nguyên">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop - Thanh Hóa" data-address="303 Trần Phú, phường Ba Đình, TP. Thanh Hóa, Thanh Hoá" data-name="OPPO Brandshop - Thanh Hóa" data-benefit="Wifi miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="demo-1.jpg">
                    OPPO Brandshop - Thanh Hóa
                </a>


            </h5>
            <p class="store_address text-muted">
                303 Trần Phú, phường Ba Đình, TP. Thanh Hóa, Thanh Hoá
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=303 Trần Phú, phường Ba Đình, TP. Thanh Hóa, Thanh Hoá" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 303 Trần Phú, phường Ba Đình, TP. Thanh Hóa, Thanh Hoá">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Tĩnh Gia ( Thanh Hóa)" data-address="Tiểu khu 6, thị trấn Tĩnh Gia, Huyện Tĩnh Gia, Thanh Hoá" data-name="OPPO Brandshop Tĩnh Gia ( Thanh Hóa)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Tĩnh Gia ( Thanh Hóa)
                </a>


            </h5>
            <p class="store_address text-muted">
                Tiểu khu 6, thị trấn Tĩnh Gia, Huyện Tĩnh Gia, Thanh Hoá
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Tiểu khu 6, thị trấn Tĩnh Gia, Huyện Tĩnh Gia, Thanh Hoá" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Tiểu khu 6, thị trấn Tĩnh Gia, Huyện Tĩnh Gia, Thanh Hoá">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Lam Sơn ( Thọ Xuân- Thanh Hóa)" data-address="Thửa đất 94, khu 3, thị trấn Lam Sơn, Huyện Thọ Xuân, Thanh Hoá" data-name="OPPO Brandshop Lam Sơn ( Thọ Xuân- Thanh Hóa)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Lam Sơn ( Thọ Xuân- Thanh Hóa)
                </a>


            </h5>
            <p class="store_address text-muted">
                Thửa đất 94, khu 3, thị trấn Lam Sơn, Huyện Thọ Xuân, Thanh Hoá
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Thửa đất 94, khu 3, thị trấn Lam Sơn, Huyện Thọ Xuân, Thanh Hoá" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Thửa đất 94, khu 3, thị trấn Lam Sơn, Huyện Thọ Xuân, Thanh Hoá">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop ( Thanh Hóa)" data-address="303 Trần Phú, phường Ba Đình, TP. Thanh Hóa, Thanh Hoá" data-name="OPPO Brandshop ( Thanh Hóa)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop ( Thanh Hóa)
                </a>


            </h5>
            <p class="store_address text-muted">
                303 Trần Phú, phường Ba Đình, TP. Thanh Hóa, Thanh Hoá
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=303 Trần Phú, phường Ba Đình, TP. Thanh Hóa, Thanh Hoá" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 303 Trần Phú, phường Ba Đình, TP. Thanh Hóa, Thanh Hoá">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Trọng Anh" data-address="Phố Lê Lai, Huyện Ngọc Lặc, Thanh Hoá" data-name="OPPO Brandshop Trọng Anh" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Trọng Anh
                </a>


            </h5>
            <p class="store_address text-muted">
                Phố Lê Lai, Huyện Ngọc Lặc, Thanh Hoá
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Phố Lê Lai, Huyện Ngọc Lặc, Thanh Hoá" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Phố Lê Lai, Huyện Ngọc Lặc, Thanh Hoá">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Đức Sài Gòn- Huế" data-address="235 Bà Triệu, TP. Huế, Thừa Thiên Huế" data-name="OPPO Brandshop Đức Sài Gòn- Huế" data-benefit="Wifi Miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="Brandshop1.jpg">
                    OPPO Brandshop Đức Sài Gòn- Huế
                </a>


            </h5>
            <p class="store_address text-muted">
                235 Bà Triệu, TP. Huế, Thừa Thiên Huế
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=235 Bà Triệu, TP. Huế, Thừa Thiên Huế" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 235 Bà Triệu, TP. Huế, Thừa Thiên Huế">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Quốc Cường (Huế)" data-address="1191 Nguyễn Tất Thành, Phường Phú Bài, Thị Xã Hương Thủy, Thừa Thiên Huế, Thừa Thiên Huế" data-name="OPPO Brandshop Quốc Cường (Huế)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Quốc Cường (Huế)
                </a>


            </h5>
            <p class="store_address text-muted">
                1191 Nguyễn Tất Thành, Phường Phú Bài, Thị Xã Hương Thủy, Thừa Thiên Huế, Thừa Thiên Huế
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=1191 Nguyễn Tất Thành, Phường Phú Bài, Thị Xã Hương Thủy, Thừa Thiên Huế, Thừa Thiên Huế" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 1191 Nguyễn Tất Thành, Phường Phú Bài, Thị Xã Hương Thủy, Thừa Thiên Huế, Thừa Thiên Huế">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Đức Sài Gòn (Huế)" data-address="235 Bà Triệu- Phường Xuân Phú, TP. Huế, Thừa Thiên Huế" data-name="OPPO Brandshop Đức Sài Gòn (Huế)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Đức Sài Gòn (Huế)
                </a>


            </h5>
            <p class="store_address text-muted">
                235 Bà Triệu- Phường Xuân Phú, TP. Huế, Thừa Thiên Huế
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=235 Bà Triệu- Phường Xuân Phú, TP. Huế, Thừa Thiên Huế" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 235 Bà Triệu- Phường Xuân Phú, TP. Huế, Thừa Thiên Huế">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Phương Linh (Tiền Giang)" data-address="147, đường Nguyễn Huệ, khu phố 5, phường 2, thị xã Gò Công, tỉnh Tiền Giang, Thị xã Gò Công, Tiền Giang" data-name="OPPO Brandshop Phương Linh (Tiền Giang)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Phương Linh (Tiền Giang)
                </a>


            </h5>
            <p class="store_address text-muted">
                147, đường Nguyễn Huệ, khu phố 5, phường 2, thị xã Gò Công, tỉnh Tiền Giang, Thị xã Gò Công, Tiền Giang
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=147, đường Nguyễn Huệ, khu phố 5, phường 2, thị xã Gò Công, tỉnh Tiền Giang, Thị xã Gò Công, Tiền Giang" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 147, đường Nguyễn Huệ, khu phố 5, phường 2, thị xã Gò Công, tỉnh Tiền Giang, Thị xã Gò Công, Tiền Giang">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Trương Văn Tân (Tiền Giang)" data-address="số 28, ấp Rẫy, thị trấn Tân Hiệp, Huyện Châu Thành, Tỉnh Tiền Giang, Huyện Châu Thành, Tiền Giang" data-name="OPPO Brandshop Trương Văn Tân (Tiền Giang)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Trương Văn Tân (Tiền Giang)
                </a>


            </h5>
            <p class="store_address text-muted">
                số 28, ấp Rẫy, thị trấn Tân Hiệp, Huyện Châu Thành, Tỉnh Tiền Giang, Huyện Châu Thành, Tiền Giang
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=số 28, ấp Rẫy, thị trấn Tân Hiệp, Huyện Châu Thành, Tỉnh Tiền Giang, Huyện Châu Thành, Tiền Giang" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng số 28, ấp Rẫy, thị trấn Tân Hiệp, Huyện Châu Thành, Tỉnh Tiền Giang, Huyện Châu Thành, Tiền Giang">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Minh Sơn - Tiền Giang - Tân Phước" data-address="Tổ 2 , Khu 1 , Thị Trấn Mỹ Phước, Huyện Tân Phước, Tiền Giang" data-name="OPPO Brandshop Minh Sơn - Tiền Giang - Tân Phước" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Minh Sơn - Tiền Giang - Tân Phước
                </a>


            </h5>
            <p class="store_address text-muted">
                Tổ 2 , Khu 1 , Thị Trấn Mỹ Phước, Huyện Tân Phước, Tiền Giang
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Tổ 2 , Khu 1 , Thị Trấn Mỹ Phước, Huyện Tân Phước, Tiền Giang" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Tổ 2 , Khu 1 , Thị Trấn Mỹ Phước, Huyện Tân Phước, Tiền Giang">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Hằng Hải - Tuyên Quang" data-address="129, Đường Bình Thuận, P.Tân Quang, TP. Tuyên Quang, Tuyên Quang" data-name="OPPO Brandshop Hằng Hải - Tuyên Quang" data-benefit="Wifi Miễn phí|Thức uống miễn phí|Tư vấn &amp; Cài đặt miễn phí||" data-openhour="08h30 - 22h00@" data-image="OPPO_Demo.jpg">
                    OPPO Brandshop Hằng Hải - Tuyên Quang
                </a>


            </h5>
            <p class="store_address text-muted">
                129, Đường Bình Thuận, P.Tân Quang, TP. Tuyên Quang, Tuyên Quang
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=129, Đường Bình Thuận, P.Tân Quang, TP. Tuyên Quang, Tuyên Quang" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 129, Đường Bình Thuận, P.Tân Quang, TP. Tuyên Quang, Tuyên Quang">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Hằng Hải ( Tuyên Quang )" data-address="Số 129, đường Bình Thuận, Phường Tân Quang, TP. Tuyên Quang, Tuyên Quang" data-name="OPPO Brandshop Hằng Hải ( Tuyên Quang )" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Hằng Hải ( Tuyên Quang )
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 129, đường Bình Thuận, Phường Tân Quang, TP. Tuyên Quang, Tuyên Quang
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 129, đường Bình Thuận, Phường Tân Quang, TP. Tuyên Quang, Tuyên Quang" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 129, đường Bình Thuận, Phường Tân Quang, TP. Tuyên Quang, Tuyên Quang">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Tân Viễn Tin (Vĩnh Long)" data-address="Số 4098, Tổ 21, Khóm 5, Phường Cái Vồn, Thị xã Bình Minh, Vĩnh Long" data-name="OPPO Brandshop Tân Viễn Tin (Vĩnh Long)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Tân Viễn Tin (Vĩnh Long)
                </a>


            </h5>
            <p class="store_address text-muted">
                Số 4098, Tổ 21, Khóm 5, Phường Cái Vồn, Thị xã Bình Minh, Vĩnh Long
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=Số 4098, Tổ 21, Khóm 5, Phường Cái Vồn, Thị xã Bình Minh, Vĩnh Long" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng Số 4098, Tổ 21, Khóm 5, Phường Cái Vồn, Thị xã Bình Minh, Vĩnh Long">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Hồng Ngọc (Vĩnh Phúc)" data-address="139B Tôn Đức Thắng, Khai Quang, Vĩnh Yên, Vĩnh Phúc, TP. Vĩnh Yên, Vĩnh Phúc" data-name="OPPO Brandshop Hồng Ngọc (Vĩnh Phúc)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Hồng Ngọc (Vĩnh Phúc)
                </a>


            </h5>
            <p class="store_address text-muted">
                139B Tôn Đức Thắng, Khai Quang, Vĩnh Yên, Vĩnh Phúc, TP. Vĩnh Yên, Vĩnh Phúc
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=139B Tôn Đức Thắng, Khai Quang, Vĩnh Yên, Vĩnh Phúc, TP. Vĩnh Yên, Vĩnh Phúc" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 139B Tôn Đức Thắng, Khai Quang, Vĩnh Yên, Vĩnh Phúc, TP. Vĩnh Yên, Vĩnh Phúc">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>
        <div class="col-sm-4 col-md-3 store_item">
            <h5 class="oppo_store_name">
                <a class="show gap_small_bottom store_name_op" data-toggle="modal" href="javascript:void(0)" title="Xem chi tiết hơn về cửa hàng OPPO Brandshop Trung Tuấn (Vĩnh Phúc)" data-address="322 Đường Hùng Vương, Phường Tích Sơn, Thành Phố Vĩnh Yên, Tỉnh Vĩnh Phúc, TP. Vĩnh Yên, Vĩnh Phúc" data-name="OPPO Brandshop Trung Tuấn (Vĩnh Phúc)" data-benefit="Cài đặt Game, ứng dụng, hướng dẫn sử dụng miễn phí|Hỗ trợ gửi trả bảo hành|Vệ sinh máy miễn phí|Sạc pin miễn phí|Wifi miễn phí" data-openhour="08h30 - 22h00@" data-image="">
                    OPPO Brandshop Trung Tuấn (Vĩnh Phúc)
                </a>


            </h5>
            <p class="store_address text-muted">
                322 Đường Hùng Vương, Phường Tích Sơn, Thành Phố Vĩnh Yên, Tỉnh Vĩnh Phúc, TP. Vĩnh Yên, Vĩnh Phúc
            </p>
            <p class="vas_store_phone text-muted">
                <small class="glyphicon glyphicon-earphone"></small>
                1800-577-776
            </p>
            <p class="direct_me">
                <a class="direction_me" href="https://maps.google.com?saddr=Current+Location&amp;daddr=322 Đường Hùng Vương, Phường Tích Sơn, Thành Phố Vĩnh Yên, Tỉnh Vĩnh Phúc, TP. Vĩnh Yên, Vĩnh Phúc" target="_blank" title="Bấm để xem đường đi từ vị trí của bạn đến cửa hàng 322 Đường Hùng Vương, Phường Tích Sơn, Thành Phố Vĩnh Yên, Tỉnh Vĩnh Phúc, TP. Vĩnh Yên, Vĩnh Phúc">
                    <span class="glyphicon glyphicon-map-marker text-muted"></span>
                    Chỉ đường cho tôi</a>
            </p>
        </div>



    </div>
</div>
<!-- Hotline guideline -->
<div class="container gap_big_bottom gap_big_top text-center hotline_wrapper">
    <span class="store store-guide_street text-center full_width show"></span>
    <p class="lead gap_medium_bottom">Bạn không rõ đường đi? Gọi ngay</p>
    <p class="oppo_bg hotline_show color_white pgap_medium_left">
        <span class="store store-phone_icon pull-left"></span>
        <span class="hotline_number">1800.577.776</span>
        &nbsp;
        <small>Miễn cước</small>
    </p>
    <p class="small text-muted gap_small_top">Để được hướng dẫn đường đi bất cứ lúc nào</p>
</div>
<!-- Modal popup -->

<div id="modal_popup" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>

            </div>
            <div class="modal-body">
                <div class="row lead text-center">
                    <div class="col-md-12 oppo_color" id="p_shop_name"></div>
                </div>
                <div class="row" style="background: #F4F4F4;">
                    <!-- Left column -->
                    <div class="col-sm-3 col-md-4 store_info_wrapper">
                        <p><strong>Địa chỉ</strong></p>
                        <p class="text-muted" id="p_shop_address">

                        </p>
                        <p class="gap_big_top gap_big_bottom">
                            <a href="" target="_blank" id="p_shop_direct">Chỉ đường cho tôi
                                <small class="glyphicon glyphicon-menu-right"></small>
                            </a>
                        </p>
                        <div id="p_shop_oh_wrapper">
                            <p><strong>Giờ mở cửa</strong></p>
                            <p class="text-muted small" id="p_shop_openhours">

                            </p>
                        </div>
                        <ul class="show gap_big_top list-unstyled small text-muted" id="p_shop_benefit">

                        </ul>
                    </div>
                    <!-- right column -->
                    <div class="col-sm-9 col-md-8 oppo-hsl">
                        <!-- Slider -->
                        <div id="myCarousel" class="carousel slideoppo shop-carousel" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators" id="cr_indicator">

                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox" id="cr_item_wrapper">

                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!-- End Slider -->
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!--========================================FOOTER START=======================================-->

