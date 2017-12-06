<?php
use frontend\assets\CustomAsset;
use common\components\FHtml;

use backend\modules\ecommerce\models\Product;
use frontend\components\Helper;
use backend\models\SaleOff;
use backend\models\News;
use backend\models\Testimonial;
use common\widgets\fheadline\FHeadline;
use common\widgets\fslider\FCMSSlide;
use common\widgets\fboxlist\FAbout;
use common\widgets\fboxlist\FBoxList;
use common\widgets\fgrid\FEmployee;
use common\widgets\fgrid\FTestimonial;
use common\widgets\fgrid\FPartner;
use common\widgets\JobContent;
use common\widgets\fgrid\FGrid;
use common\widgets\fquote\FQuote;
use common\widgets\flogin\FLogin;

use common\widgets\fgrid\FProduct;
use common\widgets\fcounter\FCounter;

use common\widgets\JobTeam;
use common\widgets\JobPartner;

/* @var $this yii\web\View */
$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
$this->title = 'About';



$main_color = FHtml::currentApplicationMainColor();
$controlName = FHtml::settingPageView('_index_trayolo');
?>

<?= $this->render($controlName, []) ?>



