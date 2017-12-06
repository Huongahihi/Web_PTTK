<?php
/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "TravelAttractions".
*/

use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use common\components\CrudAsset;
use common\widgets\BulkButtonWidget;
use common\components\FHtml;
use common\components\Helper;
use backend\modules\ecommerce\models\Product;

set_time_limit(0);

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\travel\models\TravelAttractionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$moduleName = 'TravelAttractions';
$moduleTitle = 'Travel Attractions';
$moduleKey = 'travel-attractions';

$this->title = FHtml::t($moduleTitle);

$this->params['breadcrumbs'] = [];
$this->params['breadcrumbs'][] = $this->title;

$this->params['toolBarActions'] = array(
'linkButton'=>array(),
'button'=>array(),
'dropdown'=>array(),
);
$this->params['mainIcon'] = 'fa fa-list';

CrudAsset::register($this);

$currentRole = FHtml::getCurrentRole();
$gridControl = '';
$folder = ''; //manual edit files in 'live' folder only

//$t_offer = FHtml::loadJsonFromUrl('https://api.touristly.com/api/offers/' . FHtml::getRequestParam('offer_id', 3074));
//var_dump($t_offer); echo '<br/><br/>';

$attractions = FHtml::getModels('travel_attractions');
$type = FHtml::getRequestParam('type', 'attraction');

if ($type == 'attraction')
    $control = '_index_search';
else if ($type == 'offer')
    $control = '_index_search_offers';
else
    $control = '_index_search';

?>
<div class="hidden-print">
    <?= $this->render($folder . $control, [

    ]) ?>
</div>

