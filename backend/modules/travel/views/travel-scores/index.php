<?php
/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "TravelScores".
 */

use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use common\components\CrudAsset;
use common\widgets\BulkButtonWidget;
use common\components\FHtml;
use common\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\travel\models\TravelScoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$moduleName = 'TravelScores';
$moduleTitle = 'Travel Scores';
$moduleKey = 'travel-scores';

$this->title = FHtml::t($moduleTitle);

$this->params['breadcrumbs'] = [];
$this->params['breadcrumbs'][] = $this->title;

$this->params['toolBarActions'] = array(
    'linkButton' => array(),
    'button' => array(),
    'dropdown' => array(),
);
$this->params['mainIcon'] = 'fa fa-list';
$city = FHtml::getRequestParam('city', 'Kuala Lumpur');
$keyword = FHtml::getRequestParam('keywords', 'Attractions');
$attraction_id = FHtml::getRequestParam('attraction_id', '');

if (empty($attraction_id))
    $controlName = '_index_summary';
else
    $controlName = '_index';

CrudAsset::register($this);

$currentRole = FHtml::getCurrentRole();
$gridControl = '';
$folder = ''; //manual edit files in 'live' folder only

?>
<div class="hidden-print">
    <?= $this->render($folder . $controlName, [
        'dataProvider' => $dataProvider,
        'searchModel' => $searchModel,
    ]) ?>
</div>


