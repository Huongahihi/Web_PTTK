<?php
use common\components\FHtml;
use backend\assets\CustomAsset;
use PayPal\Api\Address;
use PayPal\Api\Amount;
use PayPal\Api\CreditCard;
use PayPal\Api\Details;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api;

/* @var $this yii\web\View */

$this->params['breadcrumbs'][] = $this->title;
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$baseUrl .= '/assets/';
?>
<style type="text/css">
  .col-sm-8{
    padding-left: 10px;
    width: 100px;
    height: 100px;

  }
   .col-sm-9{
    padding-left: 200px;
     width: 100px;
    height: 100px;
   }
    .col-sm-10{
      padding-left: 390px;
       width: 100px;
      height: 100px;
    }

</style>
<div class="container">
  <h2>Trang chủ quản lý hệ thống bán điện thoại online của PhoneShop</h2>
  <div class="col-sm-8">
    <img src="<?= $baseUrl ?>img/Dienthoai1.png">
  </div>
  <div class="col-sm-9">
    <img src="<?= $baseUrl ?>img/Dienthoai6.png">
  </div>
  <div class="col-sm-10">
    <img src="<?= $baseUrl ?>img/Dienthoai3.png">
  </div>
  <br>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<h3>I. Backend system</h2>
<p>Quản trị hệ thống thao tác với người dùng. Backend là phần quan trọng để thao tác với database và lưu trữ thông tin của khách hàng "clien".</p>
<h4> Quy trình hoạt động</h3>
<p> Người quản trị backend có nhiệm vụ thao tác nhập liệu các database. Trong backend system có folder <strong> MODEL</strong> chứa các hàm phương thức nghiệp vụ "rule" để lưu trữ các trường database. Hệ thống database sau khi được lưu trữ sẽ đi đến <strong> CONTROLLER</strong> chứa các hàm điều hướng, xử lý các yêu cầu từ người quản trị. Cuối cùng backend system đi ra <strong>VIEW</strong> hiện thị thông tin tương tác với người quản trị</p>

<h3>II. Fontend system</h3>
<p> Developer fontend có nhiệm vụ thiết kế dao diện fontend sao cho giao diện thân thiện, dễ sử dụng và phù hợp với nội đung. Fontend là phần quan trọng để thao tác với backend và hiện thị thông tin cho khách hàng</p>
<h4> Quy trình hoạt động</h4>
<p> Cơ bản giống backend. Tuy nhiên, dao diện "theme" được thay đổi liên tục theo từng project nên framwork yii được cải tiến thông qua <strong> APPLIATION</strong> để thao tác với từng project 1 cách dễ dàng. Application chứa các folder chứa các fiel quan trong để thay đổi view ra bên ngoài.</p>

<h3>II. Database</h3>
<p>Nội dung quyết định sự hình thành nên website chuyên nghiệp. Database chứa các trường dữ liệu để backend thao tác và nhập liệu</p>
<h4> Quy tình hoạt động</h4>
<p> Cần phải phân tích hệ thống thông tin về dự án để tạo nên các bảng cần thiết. Databse cần thao tác với các <strong>API</strong>< nên bắt buộc phải có 1 số bảng cần thiết và các <strong>MODULE</strong> cần thiết của hệ thống</p>
</div>