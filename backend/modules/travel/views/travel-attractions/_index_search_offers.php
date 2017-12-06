<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use common\components\CrudAsset;
use common\widgets\BulkButtonWidget;
use common\components\FHtml;
use common\components\Helper;
use yii\widgets\Pjax;
use backend\modules\travel\models\TravelAttractions;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\travel\models\TravelScoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$moduleName = 'TravelScores';
$moduleTitle = 'Travel Scores';
$moduleKey = 'travel-scores';

$this->title = FHtml::t($moduleTitle);

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

if (FHtml::isInRole('', 'update', $currentRole) && FHtml::settingAdminInlineEdit() == true)
{
    $gridControl = $folder.'_columns.php';
}
else
{
    $gridControl = $folder.'_columns.php';
}
$city = FHtml::getRequestParam('city', 'Kuala Lumpur');
$cityList = [];
$cityList[] = $city;

$keyword = FHtml::getRequestParam('keywords', 'Attractions');
if ($keyword == 'Attractions')
    $kw = 'LOCATION';
else  if ($keyword == 'Food')
    $kw = 'RESTAURANT';
else
    $kw = '';

$save = FHtml::getRequestParam('save', '');
$attraction_id = FHtml::getRequestParam('attraction_id');
if (empty($attraction_id))
    $attractions = FHtml::getModels('travel_attractions', ['city' => $city], 'name asc');
else
    $attractions = FHtml::getModels('travel_attractions', ['id' => $attraction_id], 'name asc');


$offerList = \frontend\modules\travel\TravelHelper::searchOffers($cityList);
?>
<?php Pjax::begin(['id' => 'pjax-container']) ?>
<?php

?>
<div class="row">
    <div class="col-md-2">
    <div class="portlet light">
        <?php echo FHtml::buildTabs('city', 'nav', 'city'); ?>
    </div>
    </div>
    <div class="col-md-10">

        <table class="table table-condensed table-responsive table-bordered" style="width:100%;background-color: white">
            <?php
            $row = '';
            $row .= '<tr class="info">';
            $row .= '<th class="col-md-5">Attraction</th><th class="col-md-5">Current Info</th><th class="col-md-2">Search Result</th>';
            $row .= '</tr>';
            echo $row;

            foreach ($offerList as $item) {


                $row = '';
                $row .= '<tr class="">';
                $row .= '<td style="">' . $item->name . '<br/><br/>'
                        . '</td><td class="" style="">' . $item->overview . '</td>'
                        . '<td class="" style="background-color:white">' . $item->price . '</td>';
                $row .= '</tr>';
                echo $row;
            }

            ?>
        </table>

    </div>
</div>
<script>
    $.hideLoading();
</script>
<?php Pjax::end() ?>


<script>
    function checkSiteScore($attraction_id, $site_id) {
        $.showLoading({allowHide: true});
        $.ajax({
            url: '<?= FHtml::createUrl('travel/api-travel/travel-scores-check', []) ?>?attraction_id=' + $attraction_id + '&site_id=' + $site_id,
            type: 'post',
            success: function (data) {
                if (data !== '')
                    alert(data);
                $.pjax.reload({container:'#pjax-container',timeout: 20000, async:false});
            },
            complete: function (data) {
            }
        });
    }
</script>
