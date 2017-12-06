<?php
use backend\modules\ecommerce\models\Product;
use frontend\assets\CustomAsset;
use frontend\components\Helper;
use common\components\FHtml;

$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$id = isset($id) ? $id : FHtml::getRequestParam('id');
$product = isset($model) ? $model : Product::findOne(['id' => $id]);
?>

<?php $widget = \common\widgets\BaseWidget::begin(['id' => 'Cart']) ?>
<div class="row">
    <div class="col-md-5">
        <!--  -->

        <div class="row" style="display: none;" id="notify">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">

                </div>
            </div>
        </div>
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
            <a class="btn btn-default btn-select hastt" data="city" id="city">
                <input type="hidden" class="btn-select-input" id="tinhthanh" name="tinhthanh" value="3">
                <span class="btn-select-value">TP. Hồ Chí Minh</span>
                <span class="btn-select-arrow glyphicon glyphicon-chevron-down"></span>
                <ul style="height: 200px; overflow: scroll; display: none;">
                    <li data="81">Cà Mau</li>
                    <li data="101">Hải Phòng</li>
                    <li data="102">Bà Rịa - Vũng Tàu</li>
                    <li data="103">Bắc Giang</li>
                    <li data="104">Bắc Kạn</li>
                    <li data="105">Bạc Liêu</li>
                    <li data="107">Bến Tre</li>
                    <li data="108">Bình Định</li>
                    <li data="111">Bình Thuận</li>
                    <li data="112">Cao Bằng</li>
                    <li data="113">Đắk Nông</li>
                    <li data="114">Điện Biên</li>
                    <li data="115">Đồng Tháp</li>
                    <li data="116">Gia Lai</li>
                    <li data="118">Hà Nam</li>
                    <li data="120">Hà Tĩnh</li>
                    <li data="121">Hải Dương</li>
                    <li data="122">Hậu Giang</li>
                    <li data="123">Hòa Bình</li>
                    <li data="124">Hưng Yên</li>
                    <li data="125">Khánh Hoà</li>
                    <li data="126">Kiên Giang</li>
                    <li data="127">Kon Tum</li>
                    <li data="128">Lai Châu</li>
                    <li data="129">Lâm Đồng</li>
                    <li data="131">Lào Cai</li>
                    <li data="132">Long An</li>
                    <li data="133">Nam Định</li>
                    <li data="134">Nghệ An</li>
                    <li data="135">Ninh Bình</li>
                    <li data="136">Ninh Thuận</li>
                    <li data="137">Phú Thọ</li>
                    <li data="138">Phú Yên</li>
                    <li data="139">Quảng Bình</li>
                    <li data="140">Quảng Nam</li>
                    <li data="142">Quảng Ninh</li>
                    <li data="143">Quảng Trị</li>
                    <li data="144">Sóc Trăng</li>
                    <li data="145">Sơn La</li>
                    <li data="146">Tây Ninh</li>
                    <li data="147">Thái Bình</li>
                    <li data="148">Thái Nguyên</li>
                    <li data="149">Thanh Hoá</li>
                    <li data="150">Thừa Thiên Huế</li>
                    <li data="151">Tiền Giang</li>
                    <li data="152">Trà Vinh</li>
                    <li data="153">Tuyên Quang</li>
                    <li data="154">Vĩnh Long</li>
                    <li data="155">Vĩnh Phúc</li>
                    <li data="156">Yên Bái</li>
                    <li data="6">Đắk Lắk</li>
                    <li data="130">Lạng Sơn</li>
                    <li data="7">Cần Thơ</li>
                    <li data="141">Quảng Ngãi</li>
                    <li data="110">Bình Phước</li>
                    <li data="82">An Giang</li>
                    <li data="106">Bắc Ninh</li>
                    <li data="117">Hà Giang</li>
                    <li data="109">Bình Dương</li>
                    <li data="8">Đồng Nai</li>
                    <li data="9">Đà Nẵng</li>
                    <li data="5">Hà Nội</li>
                    <li data="3" class="selected">TP. Hồ Chí Minh</li>
                </ul>
            </a>
            <a class="btn btn-default btn-select hastt" id="district">
                <input type="hidden" class="btn-select-input" id="quan" name="quanhuyen" value="">
                <span class="btn-select-value">Quận/huyện</span>
                <span class="btn-select-arrow glyphicon glyphicon-chevron-down"></span>
                <ul style="height: 200px; overflow: scroll; display: none;">
                    <li data="907" parent="103" style="display: none;">Huyện Tân Yên</li>
                    <li data="908" parent="110" style="display: none;">Huyện Bù Gia Mập</li>
                    <li data="909" parent="107" style="display: none;">Huyện Thạnh Phú</li>
                    <li data="202" parent="81" style="display: none;">Huyện Ngọc Hiển</li>
                    <li data="203" parent="81" style="display: none;">Huyện Năm căn</li>
                    <li data="204" parent="81" style="display: none;">Huyện U Minh</li>
                    <li data="205" parent="81" style="display: none;">Huyện Đầm Dơi</li>
                    <li data="206" parent="81" style="display: none;">Huyện Thới Bình</li>
                    <li data="207" parent="81" style="display: none;">Huyện Phú Tân</li>
                    <li data="208" parent="81" style="display: none;">Huyện Trần Văn Thời</li>
                    <li data="210" parent="81" style="display: none;">Tp.Cà Mau</li>
                    <li data="211" parent="81" style="display: none;">Huyện Cái Nước</li>
                    <li data="212" parent="82" style="display: none;">Huyện Châu Thành</li>
                    <li data="213" parent="82" style="display: none;">Huyện Chợ Mới</li>
                    <li data="214" parent="82" style="display: none;">Huyện Tri Tôn</li>
                    <li data="215" parent="82" style="display: none;">Huyện Tịnh Biên</li>
                    <li data="216" parent="82" style="display: none;">Huyện Thoại Sơn</li>
                    <li data="217" parent="82" style="display: none;">Huyện Phú Tân</li>
                    <li data="218" parent="82" style="display: none;">Huyện An Phú</li>
                    <li data="219" parent="82" style="display: none;">TP. Châu Đốc</li>
                    <li data="220" parent="82" style="display: none;">TP. Long Xuyên</li>
                    <li data="221" parent="82" style="display: none;">Huyện Châu Phú</li>
                    <li data="222" parent="82" style="display: none;">Thị xã Tân Châu</li>
                    <li data="223" parent="101" style="display: none;">Huyện An Dương</li>
                    <li data="224" parent="101" style="display: none;">Huyện An Lão</li>
                    <li data="225" parent="101" style="display: none;">Huyện Bạch Long Vĩ</li>
                    <li data="226" parent="101" style="display: none;">Huyện Cát Hải</li>
                    <li data="227" parent="101" style="display: none;">Quận Dương Kinh</li>
                    <li data="228" parent="101" style="display: none;">Quận Đồ Sơn</li>
                    <li data="229" parent="101" style="display: none;">Quận Hải An</li>
                    <li data="230" parent="101" style="display: none;">Quận Hồng Bàng</li>
                    <li data="231" parent="101" style="display: none;">Quận Kiến An</li>
                    <li data="232" parent="101" style="display: none;">Huyện Kiến Thụy</li>
                    <li data="233" parent="101" style="display: none;">Quận Lê Chân</li>
                    <li data="234" parent="101" style="display: none;">Quận Ngô Quyền</li>
                    <li data="235" parent="101" style="display: none;">Huyện Thủy Nguyên</li>
                    <li data="236" parent="101" style="display: none;">Huyện Tiên Lãng</li>
                    <li data="237" parent="101" style="display: none;">Huyện Vĩnh Bảo</li>
                    <li data="238" parent="102" style="display: none;">Tp.Bà Rịa</li>
                    <li data="239" parent="102" style="display: none;">Huyện Châu Đức</li>
                    <li data="240" parent="102" style="display: none;">Huyện Côn Đảo</li>
                    <li data="241" parent="102" style="display: none;">Huyện Đất Đỏ</li>
                    <li data="242" parent="102" style="display: none;">Huyện Long Điền</li>
                    <li data="243" parent="102" style="display: none;">Huyện Tân Thành</li>
                    <li data="244" parent="102" style="display: none;">Tp.Vũng Tàu</li>
                    <li data="245" parent="102" style="display: none;">Huyện Xuyên Mộc</li>
                    <li data="246" parent="103" style="display: none;">Tp.Bắc Giang</li>
                    <li data="247" parent="103" style="display: none;">Huyện Hiệp Hòa</li>
                    <li data="248" parent="103" style="display: none;">Huyện Lạng Giang</li>
                    <li data="249" parent="103" style="display: none;">Huyện Lục Nam</li>
                    <li data="250" parent="103" style="display: none;">Huyện Lục Ngạn</li>
                    <li data="251" parent="103" style="display: none;">Huyện Sơn Động</li>
                    <li data="252" parent="103" style="display: none;">Huyện Việt Yên</li>
                    <li data="253" parent="103" style="display: none;">Huyện Yên Dũng</li>
                    <li data="254" parent="103" style="display: none;">Huyện Yên Thế</li>
                    <li data="255" parent="104" style="display: none;">Huyện Ba Bể</li>
                    <li data="256" parent="104" style="display: none;">Thị xã Bắc Kạn</li>
                    <li data="257" parent="104" style="display: none;">Huyện Bạch Thông</li>
                    <li data="258" parent="104" style="display: none;">Huyện Chợ Đồn</li>
                    <li data="259" parent="104" style="display: none;">Huyện Chợ Mới</li>
                    <li data="260" parent="104" style="display: none;">Huyện Na Rì</li>
                    <li data="261" parent="104" style="display: none;">Huyện Ngân Sơn</li>
                    <li data="262" parent="104" style="display: none;">Huyện Pác Nặm</li>
                    <li data="263" parent="105" style="display: none;">Tp.Bạc Liêu</li>
                    <li data="264" parent="105" style="display: none;">Huyện Đông Hải</li>
                    <li data="265" parent="105" style="display: none;">Thị xã Giá Rai</li>
                    <li data="266" parent="105" style="display: none;">Huyện Hòa Bình</li>
                    <li data="267" parent="105" style="display: none;">Huyện Hồng Dân</li>
                    <li data="268" parent="105" style="display: none;">Huyện Phước Long</li>
                    <li data="269" parent="105" style="display: none;">Huyện Vĩnh Lợi</li>
                    <li data="270" parent="106" style="display: none;">Tp.Bắc Ninh</li>
                    <li data="271" parent="106" style="display: none;">Huyện Gia Bình</li>
                    <li data="272" parent="106" style="display: none;">Huyện Lương Tài</li>
                    <li data="273" parent="106" style="display: none;">Huyện Quế Võ</li>
                    <li data="274" parent="106" style="display: none;">Huyện Thuận Thành</li>
                    <li data="275" parent="106" style="display: none;">Huyện Tiên Du</li>
                    <li data="276" parent="106" style="display: none;">Thị xã Từ Sơn</li>
                    <li data="277" parent="106" style="display: none;">Huyện Yên Phong</li>
                    <li data="278" parent="107" style="display: none;">Huyện Bình Đại</li>
                    <li data="279" parent="107" style="display: none;">Huyện Châu Thành</li>
                    <li data="280" parent="107" style="display: none;">Huyện Chợ Lách</li>
                    <li data="281" parent="107" style="display: none;">Huyện Mỏ Cày Bắc</li>
                    <li data="282" parent="107" style="display: none;">Huyện Mỏ Cày Nam</li>
                    <li data="283" parent="107" style="display: none;">Huyện Bình Đại</li>
                    <li data="284" parent="107" style="display: none;">Huyện Ba Tri</li>
                    <li data="285" parent="107" style="display: none;">Tp.Bến Tre</li>
                    <li data="286" parent="107" style="display: none;">Huyện Giồng Trôm</li>
                    <li data="287" parent="108" style="display: none;">Huyện An Lão</li>
                    <li data="288" parent="108" style="display: none;">Huyện An Nhơn</li>
                    <li data="289" parent="108" style="display: none;">Huyện Hoài Ân</li>
                    <li data="290" parent="108" style="display: none;">Huyện Hoài Nhơn</li>
                    <li data="291" parent="108" style="display: none;">Huyện Phù Cát</li>
                    <li data="292" parent="108" style="display: none;">Huyện Phù Mỹ</li>
                    <li data="293" parent="108" style="display: none;">Tp.Qui Nhơn</li>
                    <li data="294" parent="108" style="display: none;">Huyện Tây Sơn</li>
                    <li data="295" parent="108" style="display: none;">Huyện Tuy Phước</li>
                    <li data="296" parent="108" style="display: none;">Huyện Vân Canh</li>
                    <li data="297" parent="108" style="display: none;">Huyện Vĩnh Thạnh</li>
                    <li data="298" parent="109" style="display: none;">TP. Thủ Dầu Một</li>
                    <li data="299" parent="109" style="display: none;">Thị xã Bến Cát</li>
                    <li data="300" parent="109" style="display: none;">Huyện Dầu Tiếng</li>
                    <li data="301" parent="109" style="display: none;">Thị xã Dĩ An</li>
                    <li data="302" parent="109" style="display: none;">Huyện Phú Giáo</li>
                    <li data="303" parent="109" style="display: none;">Thị xã Tân Uyên</li>
                    <li data="304" parent="109" style="display: none;">Thị xã Thuận An</li>
                    <li data="305" parent="110" style="display: none;">Thị xã Bình Long</li>
                    <li data="306" parent="110" style="display: none;">Huyện Bù Đăng</li>
                    <li data="307" parent="110" style="display: none;">Huyện Bù Đốp</li>
                    <li data="308" parent="110" style="display: none;">Huyện Chơn Thành</li>
                    <li data="309" parent="110" style="display: none;">Huyện Đồng Phú</li>
                    <li data="310" parent="110" style="display: none;">Thị xã Đồng Xoài</li>
                    <li data="311" parent="110" style="display: none;">Huyện Lộc Ninh</li>
                    <li data="312" parent="110" style="display: none;">Thị xã Phước Long</li>
                    <li data="313" parent="111" style="display: none;">Huyện Bắc Bình</li>
                    <li data="314" parent="111" style="display: none;">Huyện Đức Linh</li>
                    <li data="315" parent="111" style="display: none;">Huyện Hàm Tân</li>
                    <li data="316" parent="111" style="display: none;">Huyện Hàm Thuận Bắc</li>
                    <li data="317" parent="111" style="display: none;">Huyện Hàm Thuận Nam</li>
                    <li data="318" parent="111" style="display: none;">Thị xã La Gi</li>
                    <li data="319" parent="111" style="display: none;">TP. Phan Thiết</li>
                    <li data="320" parent="111" style="display: none;">Huyện Phú Quý</li>
                    <li data="321" parent="111" style="display: none;">Huyện Tánh Linh</li>
                    <li data="322" parent="111" style="display: none;">Huyện Tuy Phong</li>
                    <li data="323" parent="112" style="display: none;">Huyện Bảo Lạc</li>
                    <li data="324" parent="112" style="display: none;">Huyện Bảo Lâm</li>
                    <li data="325" parent="112" style="display: none;">Thành phố Cao Bằng</li>
                    <li data="326" parent="112" style="display: none;">Huyện Hà Quảng</li>
                    <li data="327" parent="112" style="display: none;">Huyện Hạ Lang</li>
                    <li data="328" parent="112" style="display: none;">Huyện Hòa An</li>
                    <li data="329" parent="112" style="display: none;">Huyện Nguyên Bình</li>
                    <li data="330" parent="112" style="display: none;">Huyện Phục Hòa</li>
                    <li data="331" parent="112" style="display: none;">Huyện Quảng Uyên</li>
                    <li data="332" parent="112" style="display: none;">Huyện Thạch An</li>
                    <li data="333" parent="112" style="display: none;">Huyện Thông Nông</li>
                    <li data="334" parent="112" style="display: none;">Huyện Trà Lĩnh</li>
                    <li data="335" parent="112" style="display: none;">Huyện Trùng Khánh</li>
                    <li data="336" parent="113" style="display: none;">Huyện Đăk Glong</li>
                    <li data="337" parent="113" style="display: none;">Huyện Đăk Mil</li>
                    <li data="338" parent="113" style="display: none;">Huyện Đăk R'Lấp</li>
                    <li data="339" parent="113" style="display: none;">Huyện Đăk Song</li>
                    <li data="340" parent="113" style="display: none;">Thị xã Gia Nghĩa</li>
                    <li data="341" parent="113" style="display: none;">Huyện Krông Nô</li>
                    <li data="342" parent="113" style="display: none;">Huyện Tuy Đức</li>
                    <li data="343" parent="113" style="display: none;">Huyện Cư Jút</li>
                    <li data="344" parent="114" style="display: none;">Huyện Điện Biên</li>
                    <li data="345" parent="114" style="display: none;">Huyện Điện Biên Đông</li>
                    <li data="346" parent="114" style="display: none;">Tp.Điện Biên Phủ</li>
                    <li data="347" parent="114" style="display: none;">Huyện Mường Chà</li>
                    <li data="348" parent="114" style="display: none;">Thị xã Mường Lay</li>
                    <li data="349" parent="114" style="display: none;">Huyện Mường Nhé</li>
                    <li data="350" parent="114" style="display: none;">Huyện Tủa Chùa</li>
                    <li data="351" parent="114" style="display: none;">Huyện Tuần Giáo</li>
                    <li data="352" parent="114" style="display: none;">Huyện Mường Ảng</li>
                    <li data="353" parent="115" style="display: none;">Cao Lãnh</li>
                    <li data="354" parent="115" style="display: none;">Hồng Ngự</li>
                    <li data="355" parent="115" style="display: none;">Thị xã Hồng Ngự</li>
                    <li data="356" parent="115" style="display: none;">Lai Vung</li>
                    <li data="357" parent="115" style="display: none;">Lấp Vò</li>
                    <li data="358" parent="115" style="display: none;">Thị xã Sa Đéc</li>
                    <li data="359" parent="115" style="display: none;">Tam Nông</li>
                    <li data="360" parent="115" style="display: none;">Tân Hồng</li>
                    <li data="361" parent="115" style="display: none;">Thanh Bình</li>
                    <li data="362" parent="115" style="display: none;">Tháp Mười</li>
                    <li data="363" parent="115" style="display: none;">Tp Cao Lãnh</li>
                    <li data="364" parent="115" style="display: none;">Châu Thành</li>
                    <li data="365" parent="116" style="display: none;">Thị xã An Khê</li>
                    <li data="366" parent="116" style="display: none;">Thị xã Ayun Pa</li>
                    <li data="367" parent="116" style="display: none;">Huyện Chư Păh</li>
                    <li data="368" parent="116" style="display: none;">Huyện Chư Prông</li>
                    <li data="369" parent="116" style="display: none;">Huyện Chư Sê</li>
                    <li data="370" parent="116" style="display: none;">Huyện Đăk Đoa</li>
                    <li data="371" parent="116" style="display: none;">Huyện Đức Cơ</li>
                    <li data="372" parent="116" style="display: none;">Huyện Ia Grai</li>
                    <li data="373" parent="116" style="display: none;">Huyện Ia Pa</li>
                    <li data="374" parent="116" style="display: none;">Huyện KBang</li>
                    <li data="375" parent="116" style="display: none;">Huyện Kông Chro</li>
                    <li data="376" parent="116" style="display: none;">Huyện Krông Pa</li>
                    <li data="377" parent="116" style="display: none;">Huyện Mang Yang</li>
                    <li data="378" parent="116" style="display: none;">Huyện Phú Thiện</li>
                    <li data="379" parent="116" style="display: none;">TP. Pleiku</li>
                    <li data="380" parent="116" style="display: none;">Huyện Đắk Pơ</li>
                    <li data="381" parent="117" style="display: none;">Huyện Bắc Mê</li>
                    <li data="382" parent="117" style="display: none;">Huyện Bắc Quang</li>
                    <li data="383" parent="117" style="display: none;">Huyện Đồng Văn</li>
                    <li data="384" parent="117" style="display: none;">Tp.Hà Giang</li>
                    <li data="385" parent="117" style="display: none;">Huyện Hoàng Su Phì</li>
                    <li data="386" parent="117" style="display: none;">Huyện Mèo Vạc</li>
                    <li data="387" parent="117" style="display: none;">Huyện Quản Bạ</li>
                    <li data="388" parent="117" style="display: none;">Huyện Quang Bình</li>
                    <li data="389" parent="117" style="display: none;">Huyện Vị Xuyên</li>
                    <li data="390" parent="117" style="display: none;">Huyện Xín Mần</li>
                    <li data="391" parent="117" style="display: none;">Huyện Yên Minh</li>
                    <li data="392" parent="118" style="display: none;">Huyện Bình Lục</li>
                    <li data="393" parent="118" style="display: none;">Huyện Duy Tiên</li>
                    <li data="394" parent="118" style="display: none;">Huyện Kim Bảng</li>
                    <li data="395" parent="118" style="display: none;">Huyện Lý Nhân</li>
                    <li data="396" parent="118" style="display: none;">Tp.Phủ Lý</li>
                    <li data="397" parent="118" style="display: none;">Huyện Thanh Liêm</li>
                    <li data="398" parent="120" style="display: none;">Huyện Cẩm Xuyên</li>
                    <li data="399" parent="120" style="display: none;">Huyện Can Lộc</li>
                    <li data="400" parent="120" style="display: none;">Huyện Đức Thọ</li>
                    <li data="401" parent="120" style="display: none;">Thị xã Hồng Lĩnh</li>
                    <li data="402" parent="120" style="display: none;">Huyện Hương Khê</li>
                    <li data="403" parent="120" style="display: none;">Huyện Hương Sơn</li>
                    <li data="404" parent="120" style="display: none;">Huyện Kỳ Anh</li>
                    <li data="405" parent="120" style="display: none;">Huyện Lộc Hà</li>
                    <li data="406" parent="120" style="display: none;">Huyện Nghi Xuân</li>
                    <li data="407" parent="120" style="display: none;">Huyện Thạch Hà</li>
                    <li data="408" parent="120" style="display: none;">Huyện Vũ Quang</li>
                    <li data="409" parent="120" style="display: none;">Tp.Hà Tĩnh</li>
                    <li data="410" parent="121" style="display: none;">Huyện Bình Giang</li>
                    <li data="411" parent="121" style="display: none;">Huyện Cẩm Giàng</li>
                    <li data="412" parent="121" style="display: none;">Thị xã Chí Linh</li>
                    <li data="413" parent="121" style="display: none;">Huyện Gia Lộc</li>
                    <li data="414" parent="121" style="display: none;">Tp.Hải Dương</li>
                    <li data="415" parent="121" style="display: none;">Huyện Kim Thành</li>
                    <li data="416" parent="121" style="display: none;">Huyện Kinh Môn</li>
                    <li data="417" parent="121" style="display: none;">Huyện Nam Sách</li>
                    <li data="418" parent="121" style="display: none;">Huyện Ninh Giang</li>
                    <li data="419" parent="121" style="display: none;">Huyện Thanh Hà</li>
                    <li data="420" parent="121" style="display: none;">Huyện Thanh Miện</li>
                    <li data="421" parent="121" style="display: none;">Huyện Tứ Kỳ</li>
                    <li data="422" parent="122" style="display: none;">Châu Thành</li>
                    <li data="423" parent="122" style="display: none;">Châu Thành A</li>
                    <li data="424" parent="122" style="display: none;">Long Mỹ</li>
                    <li data="425" parent="122" style="display: none;">Thị xã Ngã Bảy</li>
                    <li data="426" parent="122" style="display: none;">Phụng Hiệp</li>
                    <li data="427" parent="122" style="display: none;">Thành phố Vị Thanh</li>
                    <li data="428" parent="122" style="display: none;">Vị Thủy</li>
                    <li data="429" parent="123" style="display: none;">Huyện Cao Phong</li>
                    <li data="430" parent="123" style="display: none;">Huyện Đà Bắc</li>
                    <li data="431" parent="123" style="display: none;">Tp.Hoà Bình</li>
                    <li data="432" parent="123" style="display: none;">Huyện Kim Bôi</li>
                    <li data="433" parent="123" style="display: none;">Huyện Kỳ Sơn</li>
                    <li data="434" parent="123" style="display: none;">Huyện Lạc Sơn</li>
                    <li data="435" parent="123" style="display: none;">Huyện Lạc Thủy</li>
                    <li data="436" parent="123" style="display: none;">Huyện Lương Sơn</li>
                    <li data="437" parent="123" style="display: none;">Huyện Mai Châu</li>
                    <li data="438" parent="123" style="display: none;">Huyện Yên Thủy</li>
                    <li data="439" parent="123" style="display: none;">Huyện Tân Lạc</li>
                    <li data="440" parent="124" style="display: none;">Huyện Ân Thi</li>
                    <li data="441" parent="124" style="display: none;">Tp.Hưng Yên</li>
                    <li data="442" parent="124" style="display: none;">Huyện Khoái Châu</li>
                    <li data="443" parent="124" style="display: none;">Huyện Kim Động</li>
                    <li data="444" parent="124" style="display: none;">Huyện Mỹ Hào</li>
                    <li data="445" parent="124" style="display: none;">Huyện Phù Cừ</li>
                    <li data="446" parent="124" style="display: none;">Huyện Tiên Lữ</li>
                    <li data="447" parent="124" style="display: none;">Huyện Văn Giang</li>
                    <li data="448" parent="124" style="display: none;">Huyện Văn Lâm</li>
                    <li data="449" parent="124" style="display: none;">Huyện Yên Mỹ</li>
                    <li data="450" parent="125" style="display: none;">Thị xã Cam Ranh</li>
                    <li data="451" parent="125" style="display: none;">Huyện Diên Khánh</li>
                    <li data="452" parent="125" style="display: none;">Tp.Nha Trang</li>
                    <li data="453" parent="125" style="display: none;">Huyện Trường Sa</li>
                    <li data="454" parent="125" style="display: none;">Huyện Vạn Ninh</li>
                    <li data="455" parent="125" style="display: none;">Huyện Khánh Vĩnh</li>
                    <li data="456" parent="125" style="display: none;">Huyện Khánh Sơn</li>
                    <li data="457" parent="125" style="display: none;">Huyện Cam Lâm</li>
                    <li data="458" parent="125" style="display: none;">Huyện Ninh Hòa</li>
                    <li data="459" parent="126" style="display: none;">Thị xã Hà Tiên</li>
                    <li data="460" parent="126" style="display: none;">Huyện Hòn Đất</li>
                    <li data="461" parent="126" style="display: none;">Huyện Giồng Riềng</li>
                    <li data="462" parent="126" style="display: none;">Huyện An Biên</li>
                    <li data="463" parent="126" style="display: none;">Huyện Gò Quao</li>
                    <li data="464" parent="126" style="display: none;">Huyện Tân Hiệp</li>
                    <li data="465" parent="126" style="display: none;">Huyện Vĩnh Thuận</li>
                    <li data="466" parent="126" style="display: none;">Huyện Kiên Lương</li>
                    <li data="467" parent="126" style="display: none;">Huyện An Minh</li>
                    <li data="468" parent="126" style="display: none;">Huyện Châu Thành</li>
                    <li data="469" parent="126" style="display: none;">Huyện Kiên Hải</li>
                    <li data="470" parent="126" style="display: none;">Huyện Phú Quốc</li>
                    <li data="471" parent="126" style="display: none;">Tp.Rạch Giá</li>
                    <li data="472" parent="126" style="display: none;">Huyện U Minh Thượng</li>
                    <li data="473" parent="126" style="display: none;">Huyện Giang Thành</li>
                    <li data="474" parent="127" style="display: none;">TP. KonTum</li>
                    <li data="475" parent="127" style="display: none;">Huyện Đăk Glei</li>
                    <li data="476" parent="127" style="display: none;">Huyện Ngọc Hồi</li>
                    <li data="477" parent="127" style="display: none;">Huyện Đăk Tô</li>
                    <li data="478" parent="127" style="display: none;">Huyện Sa Thầy</li>
                    <li data="479" parent="127" style="display: none;">Huyện Kon Plông</li>
                    <li data="480" parent="127" style="display: none;">Huyện Đăk Hà</li>
                    <li data="481" parent="127" style="display: none;">Huyện Kon Rộy</li>
                    <li data="482" parent="127" style="display: none;">Huyện Tu Mơ Rông</li>
                    <li data="483" parent="128" style="display: none;">Thị xã Lai Châu</li>
                    <li data="484" parent="128" style="display: none;">Huyện Mường Tè</li>
                    <li data="485" parent="128" style="display: none;">Huyện Sìn Hồ</li>
                    <li data="486" parent="128" style="display: none;">Huyện Tân Uyên</li>
                    <li data="487" parent="128" style="display: none;">Huyện Tân Uyên</li>
                    <li data="488" parent="128" style="display: none;">Huyện Phong Thổ</li>
                    <li data="489" parent="128" style="display: none;">Huyện Tam Đường</li>
                    <li data="490" parent="128" style="display: none;">Huyện Than Uyên</li>
                    <li data="491" parent="129" style="display: none;">Huyện Bảo Lâm</li>
                    <li data="492" parent="129" style="display: none;">Tp.Bảo Lộc</li>
                    <li data="493" parent="129" style="display: none;">Huyện Cát Tiên</li>
                    <li data="494" parent="129" style="display: none;">Huyện Đạ Huoai</li>
                    <li data="495" parent="129" style="display: none;">Tp.Đà Lạt</li>
                    <li data="496" parent="129" style="display: none;">Huyện Đam Rông</li>
                    <li data="497" parent="129" style="display: none;">Huyện Di Linh</li>
                    <li data="498" parent="129" style="display: none;">Huyện Đức Trọng</li>
                    <li data="499" parent="129" style="display: none;">Huyện Lạc Dương</li>
                    <li data="500" parent="129" style="display: none;">Huyện Lâm Hà</li>
                    <li data="501" parent="129" style="display: none;">Huyện Đạ Tẻh</li>
                    <li data="502" parent="129" style="display: none;">Huyện Đơn Dương</li>
                    <li data="503" parent="130" style="display: none;">Huyện Bình Gia</li>
                    <li data="504" parent="130" style="display: none;">Huyện Cao Lộc</li>
                    <li data="505" parent="130" style="display: none;">Huyện Chi Lăng</li>
                    <li data="506" parent="130" style="display: none;">Huyện Đình Lập</li>
                    <li data="507" parent="130" style="display: none;">Huyện Hữu Lũng</li>
                    <li data="508" parent="130" style="display: none;">Tp.Lạng Sơn</li>
                    <li data="509" parent="130" style="display: none;">Huyện Lộc Bình</li>
                    <li data="510" parent="130" style="display: none;">Huyện Tràng Định</li>
                    <li data="511" parent="130" style="display: none;">Huyện Văn Quan</li>
                    <li data="512" parent="130" style="display: none;">Huyện Bắc Sơn</li>
                    <li data="513" parent="130" style="display: none;">Huyện Văn Lãng</li>
                    <li data="514" parent="131" style="display: none;">Huyện Bảo Thắng</li>
                    <li data="515" parent="131" style="display: none;">Huyện Bát Xát</li>
                    <li data="516" parent="131" style="display: none;">Tp.Lào Cai</li>
                    <li data="517" parent="131" style="display: none;">Huyện Si Ma Cai</li>
                    <li data="518" parent="131" style="display: none;">Huyện Văn Bàn</li>
                    <li data="519" parent="131" style="display: none;">Huyện Bắc Hà</li>
                    <li data="520" parent="131" style="display: none;">Huyện Sa Pa</li>
                    <li data="521" parent="131" style="display: none;">Huyện Bảo Yên</li>
                    <li data="522" parent="131" style="display: none;">Huyện Mường Khương</li>
                    <li data="523" parent="132" style="display: none;">Huyện Bến Lức</li>
                    <li data="524" parent="132" style="display: none;">Huyện Cần Đước</li>
                    <li data="525" parent="132" style="display: none;">Huyện Cần Giuộc</li>
                    <li data="526" parent="132" style="display: none;">Huyện Đức Hòa</li>
                    <li data="527" parent="132" style="display: none;">Huyện Đức Huệ</li>
                    <li data="528" parent="132" style="display: none;">Tp.Tân An</li>
                    <li data="529" parent="132" style="display: none;">Huyện Tân Hưng</li>
                    <li data="530" parent="132" style="display: none;">Huyện Tân Trụ</li>
                    <li data="531" parent="132" style="display: none;">Huyện Thạnh Hóa</li>
                    <li data="532" parent="132" style="display: none;">Huyện Vĩnh Hưng</li>
                    <li data="533" parent="132" style="display: none;">Huyện Châu Thành</li>
                    <li data="534" parent="132" style="display: none;">Huyện Thủ Thừa</li>
                    <li data="535" parent="132" style="display: none;">Huyện Tân Thạnh</li>
                    <li data="536" parent="132" style="display: none;">Huyện Mộc Hóa</li>
                    <li data="537" parent="133" style="display: none;">Huyện Giao Thủy</li>
                    <li data="538" parent="133" style="display: none;">Huyện Hải Hậu</li>
                    <li data="539" parent="133" style="display: none;">Huyện Mỹ Lộc</li>
                    <li data="540" parent="133" style="display: none;">Tp.Nam Định</li>
                    <li data="541" parent="133" style="display: none;">Huyện Nam Trực</li>
                    <li data="542" parent="133" style="display: none;">Huyện Nghĩa Hưng</li>
                    <li data="543" parent="133" style="display: none;">Huyện Xuân Trường</li>
                    <li data="544" parent="133" style="display: none;">Huyện Ý Yên</li>
                    <li data="545" parent="133" style="display: none;">Huyện Trực Ninh</li>
                    <li data="546" parent="133" style="display: none;">Huyện Vụ Bản</li>
                    <li data="547" parent="134" style="display: none;">Thị xã Cửa Lò</li>
                    <li data="548" parent="134" style="display: none;">Huyện Diễn Châu</li>
                    <li data="549" parent="134" style="display: none;">Huyện Đô Lương</li>
                    <li data="550" parent="134" style="display: none;">Huyện Hưng Nguyên</li>
                    <li data="551" parent="134" style="display: none;">Huyện Kỳ Sơn</li>
                    <li data="552" parent="134" style="display: none;">Huyện Nam Đàn</li>
                    <li data="553" parent="134" style="display: none;">Huyện Nghi Lộc</li>
                    <li data="554" parent="134" style="display: none;">Huyện Nghĩa Đàn</li>
                    <li data="555" parent="134" style="display: none;">Huyện Quế Phong</li>
                    <li data="556" parent="134" style="display: none;">Huyện Quỳ Châu</li>
                    <li data="557" parent="134" style="display: none;">Huyện Quỳ Hợp</li>
                    <li data="558" parent="134" style="display: none;">Huyện Quỳnh Lưu</li>
                    <li data="559" parent="134" style="display: none;">Huyện Tân Kỳ</li>
                    <li data="560" parent="134" style="display: none;">Thị xã Thái Hòa</li>
                    <li data="561" parent="134" style="display: none;">Huyện Thanh Chương</li>
                    <li data="562" parent="134" style="display: none;">Huyện Tương Dương</li>
                    <li data="563" parent="134" style="display: none;">Tp.Vinh</li>
                    <li data="564" parent="134" style="display: none;">Huyện Yên Thành</li>
                    <li data="565" parent="134" style="display: none;">Huyện Anh Sơn</li>
                    <li data="566" parent="134" style="display: none;">Huyện Con Cuông</li>
                    <li data="567" parent="135" style="display: none;">Huyện Gia Viễn</li>
                    <li data="568" parent="135" style="display: none;">Huyện Hoa Lư</li>
                    <li data="569" parent="135" style="display: none;">Huyện Kim Sơn</li>
                    <li data="570" parent="135" style="display: none;">Huyện Nho Quan</li>
                    <li data="571" parent="135" style="display: none;">Tp.Ninh Bình</li>
                    <li data="572" parent="135" style="display: none;">Thị xã Tam Điệp</li>
                    <li data="573" parent="135" style="display: none;">Huyện Yên Mô</li>
                    <li data="574" parent="135" style="display: none;">Huyện Yên Khánh</li>
                    <li data="575" parent="136" style="display: none;">Huyện Bác Ái</li>
                    <li data="576" parent="136" style="display: none;">Huyện Ninh Hải</li>
                    <li data="577" parent="136" style="display: none;">Huyện Ninh Phước</li>
                    <li data="578" parent="136" style="display: none;">Huyện Ninh Sơn</li>
                    <li data="579" parent="136" style="display: none;">Tp.Phan Rang-Tháp Chàm</li>
                    <li data="580" parent="136" style="display: none;">Huyện Thuận Bắc</li>
                    <li data="581" parent="137" style="display: none;">Huyện Cẩm Khê</li>
                    <li data="582" parent="137" style="display: none;">Huyện Đoan Hùng</li>
                    <li data="583" parent="137" style="display: none;">Huyện Hạ Hòa</li>
                    <li data="584" parent="137" style="display: none;">Huyện Lâm Thao</li>
                    <li data="585" parent="137" style="display: none;">Huyện Phù Ninh</li>
                    <li data="586" parent="137" style="display: none;">Thị xã Phú Thọ</li>
                    <li data="587" parent="137" style="display: none;">Huyện Tam Nông</li>
                    <li data="588" parent="137" style="display: none;">Huyện Tân Sơn</li>
                    <li data="589" parent="137" style="display: none;">Huyện Thanh Ba</li>
                    <li data="590" parent="137" style="display: none;">Huyện Thanh Sơn</li>
                    <li data="591" parent="137" style="display: none;">Huyện Thanh Thủy</li>
                    <li data="592" parent="137" style="display: none;">Tp.Việt Trì</li>
                    <li data="593" parent="137" style="display: none;">Huyện Yên Lập</li>
                    <li data="594" parent="138" style="display: none;">Huyện Đông Hòa</li>
                    <li data="595" parent="138" style="display: none;">Huyện Phú Hòa</li>
                    <li data="596" parent="138" style="display: none;">Huyện Sơn Hòa</li>
                    <li data="597" parent="138" style="display: none;">Thị xã Sông Cầu</li>
                    <li data="598" parent="138" style="display: none;">Huyện Sông Hinh</li>
                    <li data="599" parent="138" style="display: none;">Huyện Tây Hòa</li>
                    <li data="600" parent="138" style="display: none;">Huyện Tuy An</li>
                    <li data="601" parent="138" style="display: none;">Tp.Tuy Hòa</li>
                    <li data="602" parent="138" style="display: none;">Huyện Đồng Xuân</li>
                    <li data="603" parent="139" style="display: none;">Huyện Bố Trạch</li>
                    <li data="604" parent="139" style="display: none;">Tp.Đồng Hới</li>
                    <li data="605" parent="139" style="display: none;">Huyện Lệ Thủy</li>
                    <li data="606" parent="139" style="display: none;">Huyện Minh Hóa</li>
                    <li data="607" parent="139" style="display: none;">Huyện Quảng Ninh</li>
                    <li data="608" parent="139" style="display: none;">Huyện Quảng Trạch</li>
                    <li data="609" parent="139" style="display: none;">Huyện Tuyên Hóa</li>
                    <li data="610" parent="140" style="display: none;">Huyện Bắc Trà My</li>
                    <li data="611" parent="140" style="display: none;">Huyện Đại Lộc</li>
                    <li data="612" parent="140" style="display: none;">Huyện Điện Bàn</li>
                    <li data="613" parent="140" style="display: none;">Huyện Duy Xuyên</li>
                    <li data="614" parent="140" style="display: none;">Huyện Hiệp Đức</li>
                    <li data="615" parent="140" style="display: none;">Tp.Hội An</li>
                    <li data="616" parent="140" style="display: none;">Huyện Nông Sơn</li>
                    <li data="617" parent="140" style="display: none;">Huyện Núi Thành</li>
                    <li data="618" parent="140" style="display: none;">Huyện Phước Sơn</li>
                    <li data="619" parent="140" style="display: none;">Huyện Quế Sơn</li>
                    <li data="620" parent="140" style="display: none;">Tp.Tam Kỳ</li>
                    <li data="621" parent="140" style="display: none;">Huyện Thăng Bình</li>
                    <li data="622" parent="140" style="display: none;">Huyện Tiên Phước</li>
                    <li data="623" parent="140" style="display: none;">Huyện Nam Giang</li>
                    <li data="624" parent="140" style="display: none;">Huyện Nam Trà My</li>
                    <li data="625" parent="140" style="display: none;">Huyện Đông Giang</li>
                    <li data="626" parent="140" style="display: none;">Huyện Phú Ninh</li>
                    <li data="627" parent="140" style="display: none;">Huyện Tây Giang</li>
                    <li data="628" parent="141" style="display: none;">Huyện Ba Tơ</li>
                    <li data="629" parent="141" style="display: none;">Huyện Đức Phổ</li>
                    <li data="630" parent="141" style="display: none;">Huyện Lý Sơn</li>
                    <li data="631" parent="141" style="display: none;">Huyện Minh Long</li>
                    <li data="632" parent="141" style="display: none;">Huyện Mộ Đức</li>
                    <li data="633" parent="141" style="display: none;">Huyện Nghĩa Hành</li>
                    <li data="634" parent="141" style="display: none;">TP. Quảng Ngãi</li>
                    <li data="635" parent="141" style="display: none;">Huyện Sơn Hà</li>
                    <li data="636" parent="141" style="display: none;">Huyện Sơn Tây</li>
                    <li data="637" parent="141" style="display: none;">Huyện Trà Bồng</li>
                    <li data="638" parent="141" style="display: none;">Huyện Tư Nghĩa</li>
                    <li data="639" parent="141" style="display: none;">Huyện Sơn Tịnh</li>
                    <li data="640" parent="141" style="display: none;">Huyện Bình Sơn</li>
                    <li data="641" parent="141" style="display: none;">Huyện Tây Trà</li>
                    <li data="642" parent="142" style="display: none;">Huyện Ba Chẽ</li>
                    <li data="643" parent="142" style="display: none;">Huyện Bình Liêu</li>
                    <li data="644" parent="142" style="display: none;">Thị xã Cẩm Phả</li>
                    <li data="645" parent="142" style="display: none;">Huyện Cô Tô</li>
                    <li data="646" parent="142" style="display: none;">Huyện Đầm Hà</li>
                    <li data="647" parent="142" style="display: none;">TP. Hạ Long</li>
                    <li data="648" parent="142" style="display: none;">Huyện Hoành Bồ</li>
                    <li data="649" parent="142" style="display: none;">TP. Móng Cái</li>
                    <li data="650" parent="142" style="display: none;">Huyện Tiên Yên</li>
                    <li data="651" parent="142" style="display: none;">Thị xã Uông Bí</li>
                    <li data="652" parent="142" style="display: none;">Huyện Vân Đồn</li>
                    <li data="653" parent="142" style="display: none;">Huyện Yên Hưng</li>
                    <li data="654" parent="142" style="display: none;">Thị xã Đông Triều</li>
                    <li data="655" parent="142" style="display: none;">Huyện Hải Hà</li>
                    <li data="656" parent="142" style="display: none;">Huyện Quảng Hà</li>
                    <li data="657" parent="143" style="display: none;">Huyện Cam Lộ</li>
                    <li data="658" parent="143" style="display: none;">Huyện Đa Krông</li>
                    <li data="659" parent="143" style="display: none;">TP. Đông Hà</li>
                    <li data="660" parent="143" style="display: none;">Huyện Gio Linh</li>
                    <li data="661" parent="143" style="display: none;">Thị xã Quảng Trị</li>
                    <li data="662" parent="143" style="display: none;">Huyện Triệu Phong</li>
                    <li data="663" parent="143" style="display: none;">Huyện Vĩnh Linh</li>
                    <li data="664" parent="143" style="display: none;">Huyện Hướng Hóa</li>
                    <li data="665" parent="143" style="display: none;">Huyện Hải Lăng</li>
                    <li data="666" parent="143" style="display: none;">Huyện Cồn Cỏ</li>
                    <li data="667" parent="144" style="display: none;">Huyện Châu Thành</li>
                    <li data="668" parent="144" style="display: none;">Huyện Cù Lao Dung</li>
                    <li data="669" parent="144" style="display: none;">Huyện Kế Sách</li>
                    <li data="670" parent="144" style="display: none;">Huyện Mỹ Tú</li>
                    <li data="671" parent="144" style="display: none;">Huyện Mỹ Xuyên</li>
                    <li data="672" parent="144" style="display: none;">Huyện Ngã Năm</li>
                    <li data="673" parent="144" style="display: none;">TP. Sóc Trăng</li>
                    <li data="674" parent="144" style="display: none;">Huyện Thạnh Trị</li>
                    <li data="675" parent="144" style="display: none;">Huyện Vĩnh Châu</li>
                    <li data="676" parent="144" style="display: none;">Thị xã Long Phú</li>
                    <li data="677" parent="145" style="display: none;">Huyện Bắc Yên</li>
                    <li data="678" parent="145" style="display: none;">Huyện Mường La</li>
                    <li data="679" parent="145" style="display: none;">Huyện Phù Yên</li>
                    <li data="680" parent="145" style="display: none;">Huyện Quỳnh Nhai</li>
                    <li data="681" parent="145" style="display: none;">TP. Sơn La</li>
                    <li data="682" parent="145" style="display: none;">Huyện Sông Mã</li>
                    <li data="683" parent="145" style="display: none;">Huyện Sốp Cộp</li>
                    <li data="684" parent="145" style="display: none;">Huyện Thuận Châu</li>
                    <li data="685" parent="145" style="display: none;">Huyện Mộc Châu</li>
                    <li data="686" parent="145" style="display: none;">Huyện Mai Sơn</li>
                    <li data="687" parent="145" style="display: none;">Huyện Yên Châu</li>
                    <li data="688" parent="146" style="display: none;">Huyện Dương Minh Châu</li>
                    <li data="689" parent="146" style="display: none;">Huyện Gò Dầu</li>
                    <li data="690" parent="146" style="display: none;">Huyện Tân Biên</li>
                    <li data="691" parent="146" style="display: none;">Huyện Tân Châu</li>
                    <li data="692" parent="146" style="display: none;">Thành phố Tây Ninh</li>
                    <li data="693" parent="146" style="display: none;">Huyện Trảng Bàng</li>
                    <li data="694" parent="146" style="display: none;">Huyện Hòa Thành</li>
                    <li data="695" parent="146" style="display: none;">Huyện Bến Cầu</li>
                    <li data="696" parent="146" style="display: none;">Huyện Châu Thành</li>
                    <li data="697" parent="147" style="display: none;">Tp.Thái Bình</li>
                    <li data="698" parent="147" style="display: none;">Huyện Thái Thụy</li>
                    <li data="699" parent="147" style="display: none;">Huyện Tiền Hải</li>
                    <li data="700" parent="147" style="display: none;">Huyện Vũ Thư</li>
                    <li data="701" parent="147" style="display: none;">Huyện Đông Hưng</li>
                    <li data="702" parent="147" style="display: none;">Huyện Quỳnh Phụ</li>
                    <li data="703" parent="147" style="display: none;">Huyện Hưng Hà</li>
                    <li data="704" parent="147" style="display: none;">Huyện Kiến Xương</li>
                    <li data="705" parent="148" style="display: none;">Huyện Đại Từ</li>
                    <li data="706" parent="148" style="display: none;">Huyện Định Hóa</li>
                    <li data="707" parent="148" style="display: none;">Huyện Đồng Hỷ</li>
                    <li data="708" parent="148" style="display: none;">Huyện Phổ Yên</li>
                    <li data="709" parent="148" style="display: none;">Huyện Phú Bình</li>
                    <li data="710" parent="148" style="display: none;">Huyện Phú Lương</li>
                    <li data="711" parent="148" style="display: none;">Thành phố Sông Công</li>
                    <li data="712" parent="148" style="display: none;">TP. Thái Nguyên</li>
                    <li data="713" parent="148" style="display: none;">Huyện Võ Nhai</li>
                    <li data="714" parent="149" style="display: none;">Huyện Bá Thước</li>
                    <li data="715" parent="149" style="display: none;">Thị xã Bỉm Sơn</li>
                    <li data="716" parent="149" style="display: none;">Huyện Cẩm Thủy</li>
                    <li data="717" parent="149" style="display: none;">Huyện Đông Sơn</li>
                    <li data="718" parent="149" style="display: none;">Huyện Hà Trung</li>
                    <li data="719" parent="149" style="display: none;">Huyện Hậu Lộc</li>
                    <li data="720" parent="149" style="display: none;">Huyện Mường Lát</li>
                    <li data="721" parent="149" style="display: none;">Huyện Nga Sơn</li>
                    <li data="722" parent="149" style="display: none;">Huyện Như Xuân</li>
                    <li data="723" parent="149" style="display: none;">Huyện Nông Cống</li>
                    <li data="724" parent="149" style="display: none;">Huyện Quảng Xương</li>
                    <li data="725" parent="149" style="display: none;">Thị xã Sầm Sơn</li>
                    <li data="726" parent="149" style="display: none;">Huyện Thạch Thành</li>
                    <li data="727" parent="149" style="display: none;">TP. Thanh Hóa</li>
                    <li data="728" parent="149" style="display: none;">Huyện Thiệu Hóa</li>
                    <li data="729" parent="149" style="display: none;">Huyện Thọ Xuân</li>
                    <li data="730" parent="149" style="display: none;">Huyện Thường Xuân</li>
                    <li data="731" parent="149" style="display: none;">Huyện Triệu Sơn</li>
                    <li data="732" parent="149" style="display: none;">Huyện Vĩnh Lộc</li>
                    <li data="733" parent="149" style="display: none;">Huyện Yên Định</li>
                    <li data="734" parent="149" style="display: none;">Huyện Ngọc Lặc</li>
                    <li data="735" parent="149" style="display: none;">Huyện Lang Chánh</li>
                    <li data="736" parent="149" style="display: none;">Huyện Như Thanh</li>
                    <li data="737" parent="149" style="display: none;">Huyện Quan Sơn</li>
                    <li data="738" parent="149" style="display: none;">Huyện Hoằng Hóa</li>
                    <li data="739" parent="149" style="display: none;">Huyện Quan Hóa</li>
                    <li data="740" parent="149" style="display: none;">Huyện Tĩnh Gia</li>
                    <li data="741" parent="150" style="display: none;">TP. Huế</li>
                    <li data="742" parent="150" style="display: none;">Thị xã Hương Thủy</li>
                    <li data="743" parent="150" style="display: none;">Huyện Hương Trà</li>
                    <li data="744" parent="150" style="display: none;">Huyện Nam Đông</li>
                    <li data="745" parent="150" style="display: none;">Huyện Phú Vang</li>
                    <li data="746" parent="150" style="display: none;">Huyện Phong Điền</li>
                    <li data="747" parent="150" style="display: none;">Huyện A Lưới</li>
                    <li data="748" parent="150" style="display: none;">Huyện Phú Lộc</li>
                    <li data="749" parent="150" style="display: none;">Huyện Quảng Điền</li>
                    <li data="750" parent="151" style="display: none;">Huyện Cái Bè</li>
                    <li data="751" parent="151" style="display: none;">Thị xã Cai Lậy</li>
                    <li data="752" parent="151" style="display: none;">Huyện Chợ Gạo</li>
                    <li data="753" parent="151" style="display: none;">Thị xã Gò Công</li>
                    <li data="754" parent="151" style="display: none;">Huyện Gò Công Tây</li>
                    <li data="755" parent="151" style="display: none;">Tp.Mỹ Tho</li>
                    <li data="756" parent="151" style="display: none;">Huyện Tân Phú Đông</li>
                    <li data="757" parent="151" style="display: none;">Huyện Tân Phước</li>
                    <li data="758" parent="151" style="display: none;">Huyện Châu Thành</li>
                    <li data="759" parent="151" style="display: none;">Huyện Gò Công Đông</li>
                    <li data="760" parent="152" style="display: none;">Huyện Càng Long</li>
                    <li data="761" parent="152" style="display: none;">Huyện Châu Thành</li>
                    <li data="762" parent="152" style="display: none;">Huyện Duyên Hải</li>
                    <li data="763" parent="152" style="display: none;">Huyện Tiểu Cần</li>
                    <li data="764" parent="152" style="display: none;">Huyện Trà Cú</li>
                    <li data="765" parent="152" style="display: none;">TP. Trà Vinh</li>
                    <li data="766" parent="152" style="display: none;">Huyện Cầu Ngang</li>
                    <li data="767" parent="152" style="display: none;">Huyện Cầu Kè</li>
                    <li data="768" parent="153" style="display: none;">Huyện Chiêm Hóa</li>
                    <li data="769" parent="153" style="display: none;">Huyện Sơn Dương</li>
                    <li data="770" parent="153" style="display: none;">TP. Tuyên Quang</li>
                    <li data="771" parent="153" style="display: none;">Huyện Yên Sơn</li>
                    <li data="772" parent="153" style="display: none;">Huyện Hàm Yên</li>
                    <li data="773" parent="153" style="display: none;">Huyện Na Hang</li>
                    <li data="774" parent="154" style="display: none;">Huyện Bình Minh</li>
                    <li data="775" parent="154" style="display: none;">Huyện Long Hồ</li>
                    <li data="776" parent="154" style="display: none;">Huyện Tam Bình</li>
                    <li data="777" parent="154" style="display: none;">Huyện Trà Ôn</li>
                    <li data="778" parent="154" style="display: none;">TP. Vĩnh Long</li>
                    <li data="779" parent="154" style="display: none;">Huyện Vũng Liêm</li>
                    <li data="780" parent="154" style="display: none;">Huyện Bình Tân</li>
                    <li data="781" parent="154" style="display: none;">Huyện Mang Thít</li>
                    <li data="782" parent="155" style="display: none;">Huyện Lập Thạch</li>
                    <li data="783" parent="155" style="display: none;">Thị xã Phúc Yên</li>
                    <li data="784" parent="155" style="display: none;">Huyện Tam Đảo</li>
                    <li data="785" parent="155" style="display: none;">TP. Vĩnh Yên</li>
                    <li data="786" parent="155" style="display: none;">Huyện Yên Lạc</li>
                    <li data="787" parent="155" style="display: none;">Huyện Bình Xuyên</li>
                    <li data="788" parent="155" style="display: none;">Huyện Tam Dương</li>
                    <li data="789" parent="155" style="display: none;">Huyện Vĩnh Tường</li>
                    <li data="790" parent="156" style="display: none;">Huyện Lục Yên</li>
                    <li data="791" parent="156" style="display: none;">Huyện Mù Căng Chải</li>
                    <li data="792" parent="156" style="display: none;">Thị xã Nghĩa Lộ</li>
                    <li data="793" parent="156" style="display: none;">Huyện Trạm Tấu</li>
                    <li data="794" parent="156" style="display: none;">Huyện Trấn Yên</li>
                    <li data="795" parent="156" style="display: none;">Huyện Văn Yên</li>
                    <li data="796" parent="156" style="display: none;">TP. Yên Bái</li>
                    <li data="797" parent="156" style="display: none;">Huyện Yên Bình</li>
                    <li data="798" parent="156" style="display: none;">Huyện Văn Chấn</li>
                    <li data="799" parent="3">Quận 2</li>
                    <li data="800" parent="3">Quận 3</li>
                    <li data="801" parent="3">Quận 4</li>
                    <li data="802" parent="3">Quận 5</li>
                    <li data="803" parent="3">Quận 6</li>
                    <li data="804" parent="3">Quận 7</li>
                    <li data="805" parent="3">Quận 8</li>
                    <li data="806" parent="3">Quận 9</li>
                    <li data="807" parent="3">Quận 10</li>
                    <li data="808" parent="3">Quận 11</li>
                    <li data="809" parent="3">Quận 12</li>
                    <li data="810" parent="3">Quận Thủ Đức</li>
                    <li data="811" parent="3">Quận Gò Vấp</li>
                    <li data="812" parent="3">Quận Tân Bình</li>
                    <li data="813" parent="3">Quận Bình Tân</li>
                    <li data="814" parent="3">Huyện Hóc Môn</li>
                    <li data="815" parent="3">Quận Tân Phú</li>
                    <li data="816" parent="3">Huyện Củ Chi</li>
                    <li data="817" parent="3">Huyện Nhà Bè</li>
                    <li data="818" parent="3">Huyện Bình Chánh</li>
                    <li data="819" parent="3">Quận Bình Thạnh</li>
                    <li data="820" parent="3">Quận Phú Nhuận</li>
                    <li data="821" parent="3">Huyện Cần Giờ</li>
                    <li data="822" parent="3">Quận 1</li>
                    <li data="823" parent="5" style="display: none;">Quận Đống Đa</li>
                    <li data="824" parent="5" style="display: none;">Quận Ba Đình</li>
                    <li data="825" parent="5" style="display: none;">Quận Cầu Giấy</li>
                    <li data="826" parent="5" style="display: none;">Quận Hai Bà Trưng</li>
                    <li data="827" parent="5" style="display: none;">Quận Hoàn Kiếm</li>
                    <li data="828" parent="5" style="display: none;">Quận Hoàng Mai</li>
                    <li data="829" parent="5" style="display: none;">Quận Long Biên</li>
                    <li data="830" parent="5" style="display: none;">Quận Tây Hồ</li>
                    <li data="831" parent="5" style="display: none;">Quận Thanh Xuân</li>
                    <li data="832" parent="5" style="display: none;">Huyện Đông Anh</li>
                    <li data="833" parent="5" style="display: none;">Huyện Gia Lâm</li>
                    <li data="835" parent="5" style="display: none;">Huyện Thanh Trì</li>
                    <li data="900" parent="154" style="display: none;">Thị xã Bình Minh</li>
                    <li data="838" parent="5" style="display: none;">Huyện Chương Mỹ</li>
                    <li data="839" parent="5" style="display: none;">Huyện Đan Phượng</li>
                    <li data="840" parent="5" style="display: none;">Quận Hà Đông</li>
                    <li data="841" parent="5" style="display: none;">Huyện Hoài Đức</li>
                    <li data="842" parent="5" style="display: none;">Huyện Mê Linh</li>
                    <li data="899" parent="109" style="display: none;">Huyện Bàu Bàng</li>
                    <li data="897" parent="110" style="display: none;">Huyện Hớn Quản</li>
                    <li data="896" parent="110" style="display: none;">Huyện Hớn Quản</li>
                    <li data="851" parent="5" style="display: none;">Huyện Ứng Hòa</li>
                    <li data="852" parent="6" style="display: none;">Phường Thắng Lợi</li>
                    <li data="853" parent="6" style="display: none;">TP. Buôn Ma Thuột</li>
                    <li data="854" parent="6" style="display: none;">Huyện Buôn Đôn</li>
                    <li data="855" parent="6" style="display: none;">Thị xã Buôn Hồ</li>
                    <li data="856" parent="6" style="display: none;">Huyện Cư Kuin</li>
                    <li data="857" parent="6" style="display: none;">Huyện Cư M'gar</li>
                    <li data="858" parent="6" style="display: none;">Huyện Ea H'leo</li>
                    <li data="859" parent="6" style="display: none;">Huyện Ea Kar</li>
                    <li data="860" parent="6" style="display: none;">Huyện Ea Súp</li>
                    <li data="861" parent="6" style="display: none;">Huyện Krông Ana</li>
                    <li data="862" parent="6" style="display: none;">Huyện Krông Bông</li>
                    <li data="863" parent="6" style="display: none;">Huyện Krông Búk</li>
                    <li data="864" parent="6" style="display: none;">Huyện Krông Năng</li>
                    <li data="865" parent="6" style="display: none;">Huyện Krông Pắk</li>
                    <li data="866" parent="6" style="display: none;">Huyện Lăk</li>
                    <li data="867" parent="6" style="display: none;">Huyện M'Đrăk</li>
                    <li data="868" parent="7" style="display: none;">Huyện Thốt Nốt</li>
                    <li data="869" parent="7" style="display: none;">Quận Ninh Kiều</li>
                    <li data="870" parent="7" style="display: none;">Quận Bình Thủy</li>
                    <li data="871" parent="7" style="display: none;">Quận Cái Răng</li>
                    <li data="872" parent="7" style="display: none;">Quận Ô môn</li>
                    <li data="873" parent="7" style="display: none;">Huyện Phong Điền</li>
                    <li data="874" parent="7" style="display: none;">Huyện Cờ Đỏ</li>
                    <li data="875" parent="7" style="display: none;">Huyện Vĩnh Thạnh</li>
                    <li data="876" parent="7" style="display: none;">Huyện Thới Lai</li>
                    <li data="877" parent="8" style="display: none;">Huyện Xuân Lộc</li>
                    <li data="878" parent="8" style="display: none;">Thị xã Long Khánh</li>
                    <li data="879" parent="8" style="display: none;">Huyện Nhơn Trạch</li>
                    <li data="880" parent="8" style="display: none;">Huyện Tân Phú</li>
                    <li data="881" parent="8" style="display: none;">Huyện Định Quán</li>
                    <li data="882" parent="8" style="display: none;">Huyện Cẩm Mỹ</li>
                    <li data="883" parent="8" style="display: none;">Huyện Thống Nhất</li>
                    <li data="884" parent="8" style="display: none;">Huyện Trảng Bom</li>
                    <li data="885" parent="8" style="display: none;">Huyện Vĩnh Cửu</li>
                    <li data="886" parent="8" style="display: none;">Tp.Biên Hoà</li>
                    <li data="887" parent="8" style="display: none;">Huyện Long Thành</li>
                    <li data="888" parent="9" style="display: none;">Quận Thanh Khê</li>
                    <li data="889" parent="9" style="display: none;">Quận Cẩm Lệ</li>
                    <li data="890" parent="9" style="display: none;">Quận Hải Châu</li>
                    <li data="891" parent="9" style="display: none;">Huyện Hoà Vang</li>
                    <li data="892" parent="9" style="display: none;">Huyện đảo Hoàng Sa</li>
                    <li data="893" parent="9" style="display: none;">Quận Liên Chiểu</li>
                    <li data="894" parent="9" style="display: none;">Quận Ngũ Hành Sơn</li>
                    <li data="895" parent="9" style="display: none;">Quận Sơn Trà</li>
                    <li data="901" parent="5" style="display: none;">Huyện Sóc Sơn</li>
                    <li data="910" parent="116" style="display: none;">Huyện Chư Pưh</li>
                    <li data="905" parent="5" style="display: none;">Huyện Ba Vì</li>
                    <li data="911" parent="5" style="display: none;">Huyện Bắc Từ Liêm</li>
                    <li data="912" parent="5" style="display: none;">Huyện Mỹ Đức</li>
                    <li data="913" parent="5" style="display: none;">Huyện Nam Từ Liêm</li>
                    <li data="914" parent="5" style="display: none;">Huyện Phúc Thọ</li>
                    <li data="915" parent="5" style="display: none;">Huyện Phú Xuyên</li>
                    <li data="916" parent="5" style="display: none;">Huyện Quốc Oai</li>
                    <li data="917" parent="5" style="display: none;">Huyện Thanh Oai</li>
                    <li data="918" parent="5" style="display: none;">Huyện Thường Tín</li>
                    <li data="919" parent="5" style="display: none;">Huyện Thạch Thất</li>
                    <li data="920" parent="144" style="display: none;">Huyện Trần Đề</li>
                    <li data="921" parent="153" style="display: none;">Huyện Lâm Bình</li>
                    <li data="922" parent="155" style="display: none;">Huyện Sông Lô</li>
                    <li data="923" parent="109" style="display: none;">Huyện Bắc Tân Uyên</li>
                    <li data="924" parent="108" style="display: none;">Quy Nhơn</li>
                    <li data="926" parent="136" style="display: none;">Thuận Nam</li>
                    <li data="928" parent="110" style="display: none;">Huyện Phú Riềng</li>
                </ul>
            </a>

            <p class="cart_tit1"><span class="step_number text-center pull-left oppo_bg color_white">2</span>
                <span class="right_angle pull-left gap_small_right"></span><span> Thanh toán bằng...</span>
            </p>
            <div class="phuongthucthanhtoan">
                <div class="radio_select boxradio">
                    <input id="radio-1" class="radio-custom" name="radio-group" type="radio" checked="" value="0">
                    <label for="radio-1" class="radio-custom-label"><span>Thanh toán tiền mặt (COD)</span><span class="titbottom">Bạn sẽ thanh toán cho nhân viên giao hàng ngay khi nhận</span>
                    </label>


                </div>
                <div class="boxradio notcheck tum">
                    <input id="radio-2" class="radio-custom" name="radio-group" type="radio" value="2">
                    <label for="radio-2" class="radio-custom-label"><span>Thanh toán trực tuyến qua thẻ</span><span class="titbottom">Thẻ Visa, Master, JCB</span>
                    </label>
                </div>

                <div class="boxradio notcheck tum">
                    <input id="radio-3" class="radio-custom" name="radio-group" type="radio" value="1">
                    <label for="radio-3" class="radio-custom-label"><span>Thanh toán trực tuyến qua thẻ ATM nội địa</span><span class="titbottom">Thẻ ATM có internet banking</span>
                    </label>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-7">
        <div class="cartb">
            <p class="cart_tit1"><span class="step_number text-center pull-left oppo_bg color_white">3</span>
                <span class="right_angle pull-left gap_small_right"></span><span> Giỏ hàng của bạn</span>
            </p>
            <div view-panel="cart"><div view-list="cart" class="media item-cart item-cart0" style="display: block;" stt="0" data-poid="13062" data-item="{&quot;fpoid&quot;:13062,&quot;fpid&quot;:2077,&quot;fproductcode&quot;:&quot;CPH1613&quot;,&quot;fquantity&quot;:1}">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="http://www.shop.oppomobile.vn/uploads/cms_productmedia/2017/April/17/99_1492368414-medium.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">OPPO F3 Plus</h4>
                        <div class="row">
                            <input type="hidden" value="0" name="fpid" id="fpid">
                            <div class="col-md-5">
                                <p class="titchin">Màu sắc</p>
                                <a class="btn btn-default btn-select mausac mausac112">
                                    <input type="hidden" class="btn-select-input" name="mausac[]" value="">
                                    <span class="btn-select-value">Vàng</span>
                                    <span class="btn-select-arrow glyphicon glyphicon-chevron-down"></span>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <p class="titchin">Dung lượng</p>
                                <a class="btn btn-default btn-select mausac dungluong112">
                                    <input type="hidden" class="btn-select-input" name="dungluong[]" value="">
                                    <span class="btn-select-value">64 GB</span>
                                    <span class="btn-select-arrow glyphicon glyphicon-chevron-down"></span>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <p class="titchin">Số lượng</p>
                                <div mini-action="group" class="input-group">
                                    <span mini-action="down" class="input-group-addon"><i class="glyphicon glyphicon-minus"></i></span>
                                    <input disabled="disabled" mini-action="result" type="text" class="form-control numberp" value="1" name="fquantity[]">
                                    <span mini-action="up" class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                                </div>
                            </div>
                            <div class="col-md-9 price text-left">Thành tiền: <span view-data="price">10,690,000</span>VND
                            </div>

                            <div class="col-md-3 text-right">
                                <a action-remove="cart" for-item="item-cart0">
                                    <img style="margin-right: 5px;" src="http://www.shop.oppomobile.vn/templates/current/images/store/oppo/desktop/delecart.png" alt=""> <span class="titchin">Xóa</span>
                                    <input data-id="fpoid" type="hidden" name="fpoid[]" value="13062">
                                    <input data-id="fpid" type="hidden" name="fpid[]" value="2077">
                                    <input data-price="fprice" type="hidden" name="fprice[]" value="10690000">
                                    <input data-price="ftotalprice" type="hidden" name="ftotalprice[]" value="10690000">
                                </a>
                            </div>
                            <div class="col-md-12 coupon" style="display: block;">
                                <div class="row" id="customfield">
                                    <div class="col-md-1">
                                        <img src="http://www.shop.oppomobile.vn/templates/current/images/store/oppo/desktop/infothia.png" alt="">
                                    </div>
                                    <div class="col-md-11" id="contentkm"><ul>
                                            <li>
                                                <div id="js_f2" class="_3058 _ui9 _hh7 _s1- _52mr _43by _3oh-" data-tooltip-content="9:50" data-hover="tooltip" data-tooltip-position="right">
                                                    <div class="_aok"><span class="_3oh- _58nk">Chương trình giá ưu đãi áp dụng đến 25/10<br>Mua OPPO F3 Plus, bạn nhận được quà tặng:<br>1.&nbsp;Tai nghe Bluetooth<br>2. Dán màn hình kèm máy <br>3. Ốp lưng trong suốt kèm máy</span></div>
                                                </div>
                                            </li>
                                        </ul></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></div>
        </div>
        <div class="line"></div>
        <div class="inforcart_order">
            <p class="show"><a title="Ghi chú cho đơn hàng">Ghi chú cho đơn hàng</a></p> <i class="fa fa-angle-up"></i>
            <div class="form-group">
                <textarea id="order_note" name="fnote" class="form-control" rows="3" placeholder="Vd: Giao trước 4h"></textarea>
            </div>
            <div class="infor_salary">

                <div class="row">
                    <div class="col-md-6 col-md-offset-6">
                        <p><span><span view-total-temp="price">10,690,000</span><span>VND</span></span><span>Giá trị hàng hóa:</span></p>

                        <p><span>Miễn phí</span><span>Vận chuyển</span> </p>
                        <p><span><span view-total="price">10,690,000</span><span>VND</span></span><span>Thành tiền:</span> </p>
                        <p class="clearfix"></p>
                        <input type="hidden" name="totalpaymenttemp" value="10690000">
                        <input type="hidden" name="totalpayment" value="10690000">
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12" style="padding-left: 50%">
                    <p id="notifyerr" style="display: none;color: red;">Bạn cần chấp nhận điều khoản.</p>
                    <input type="checkbox" name="iagree" id="iagree" value="0"> Tôi đã đọc và đồng ý, <a href="http://oppomobile.vn/dieu-khoan-mua-hang" target="_blank">điều khoản
                    </a>
                </div>
                <div class="col-md-6 text-left gap_medium_top">
                    <a class="text-muted" data-dismiss="modal" href="#">
                        <small class="glyphicon glyphicon-menu-left"></small>
                        Trở về
                    </a>
                </div>
                <div class="col-md-6">
                    <input type="submit" name="buynow" id="buynow" value="Đặt hàng ngay" class="order-now">
                </div>
            </div>
        </div>
    </div>
</div>

<?php \common\widgets\BaseWidget::end(); ?>
