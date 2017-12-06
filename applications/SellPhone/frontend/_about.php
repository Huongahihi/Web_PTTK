<?php
/**
 * Created by PhpStorm.
 * User: tongd
 * Date: 6/18/2017
 * Time: 11:25 PM
 */

use backend\modules\cms\models\CmsAbout;
use common\components\FHtml;
use common\widgets\fheadline\FPageHeader;
use frontend\assets\CustomAsset;

/* @var $this yii\web\View */
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$baseUrl .= '/applications/SellPhone/assets/';
$this->title = FHtml::t('common', 'About');
$data_about = CmsAbout::findOne(['is_top' => 1]);
?>
<div class="main_about" style="background:url(<?= $baseUrl ?>img/1.jpg)">
	<div class="container">
		<div class="row">
			<div class="title">
				<div class="col-sm-12">
		<h2>Công ty cổ phần SELLPHONE Hà Nội</h2>
				</div>
				<div class="text">
					<div class="row">
						<div class="col-sm-4"></div>
						<img src="<?= $baseUrl?>img/thumbnail-259x300-A37.jpg_50_1492425457.jpg">
						<img src="<?= $baseUrl?>img/thumbnail_20-_20259x300_20-_20a57.jpg_57_149734319.jpg_57_1499050733.jpg">

						<h3>* Lịch sự hình thành</h3>
						<ul>
							<li>Cùng với sự phát triển không ngừng của công nghệ thông tin. Nhu cầu sử dụng smark phone ngày càng tăng cao</li>
							<li>Đội ngữ nhân sự trẻ trung. Các kỹ sư phần cứng và phần mềm đầy kinh nghiệm năng động và sáng tạo chúng tôi đã tạo nên được những sản phầm mang đẳng cấp công nghệ.</li>
							<li>Chất lượng hàng đầu. Nhu cầu khách hàng là trên hết vì vậy SELLPHONE đã ra đời.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>