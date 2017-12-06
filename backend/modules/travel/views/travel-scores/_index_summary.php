<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use common\components\CrudAsset;
use common\widgets\BulkButtonWidget;
use common\components\FHtml;
use common\components\Helper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\travel\models\TravelScoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$moduleName = 'TravelScores';
$moduleTitle = 'Travel Scores';
$moduleKey = 'travel-scores';

$this->title = FHtml::t($moduleTitle);

$this->params['toolBarActions'] = array(
    'linkButton' => array(),
    'button' => array(),
    'dropdown' => array(),
);
$this->params['mainIcon'] = 'fa fa-list';

CrudAsset::register($this);

$currentRole = FHtml::getCurrentRole();
$gridControl = '';
$folder = ''; //manual edit files in 'live' folder only

if (FHtml::isInRole('', 'update', $currentRole) && FHtml::settingAdminInlineEdit() == true) {
    $gridControl = $folder . '_columns.php';
} else {
    $gridControl = $folder . '_columns.php';
}
$city = FHtml::getRequestParam('city', 'Kuala Lumpur');
$keyword = FHtml::getRequestParam('keyword', 'Attractions');
if ($keyword == 'Attractions')
    $keyword = 'LOCATION';
else if ($keyword == 'Food')
    $keyword = 'RESTAURANT';
else
    $keyword = '';

$attractions = FHtml::getModels('travel_attractions', ['city' => $city, 'type' => $keyword], 'score desc');
$sites = FHtml::getModels('travel_sites', ['city' => $city], 'weight desc');
//\frontend\modules\travel\TravelHelper::calculatePointsAll($attractions);

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
        <ul class="nav nav-tabs">
            <li class="<?= ($keyword == 'LOCATION') ? 'active' : '' ?>">
                <a href="<?= FHtml::createUrl('travel/travel-scores', ['city' => $city, 'keyword' => 'Attractions']) ?>"><?= FHtml::t('common', 'Attractions')?></a>
            </li>
            <li class="<?= ($keyword == 'RESTAURANT') ? 'active' : '' ?>">
                <a href="<?= FHtml::createUrl('travel/travel-scores', ['city' => $city, 'keyword' => 'Food']) ?>"><?= FHtml::t('common', 'Food')?></a>
            </li>
        </ul>

        <table class="table table-condensed table-responsive table-bordered" style="width:100%">
            <?php
            $row = '';
            $row .= '<tr class="info">';
            $row .= '<th style="width:100px"></th><th class="text-center" style="width:50px">Scores</th>';

            foreach ($sites as $site) {
                $row .= '<th class="text-center" style="width:20px;">' . $site->name . '</th>';
            }
            $row .= '</tr>';
            $i = 0;
            foreach ($attractions as $attraction) {
                $i = $i + 1;
                $name = $attraction->name;
                $score_total = 0;
                if ($i < 11)
                    $name = '<b>' . $name . '</b>';
                $row .= '<tr class="">';
                $row .= '<td class="active" style="background-color: white">' . $name . '</td>';
                $row1 = '';
                foreach ($sites as $site) {
                    $score = FHtml::getModels('travel_scores', ['attraction_id' => $attraction->id, 'site_id' => $site->id]);
                    if (!isset($score) || empty($score)) {
                        $row1 .= '<td class="warning text-center" style="background-color: white;color:lightgrey"><a style="background-color: white;color:lightgrey" href="#" onclick="checkSiteScore(\'' . $attraction->id . '\',\'' . $site->id . '\')" > + </a> </td>';
                    }
                    else {
                        $row1 .= '<td class="success text-center"><a href="#" onclick="checkSiteScore(\'' . $attraction->id . '\',\'' . $site->id . '\')" >' . ($score[0]->score + ' ') . '</a> </td>';
                        $score_total =  $score_total + $score[0]->score;
                    }
                }
                $attraction->score = $score_total;

                $attraction->save();
                $row .= '<td class="danger text-center"><b>' . $attraction->score . '</b></td>';
                $row .= $row1;

                $row .= '</div>';
            }

            $attractions = FHtml::getModels('travel_attractions', ['city' => $city, 'type' => $keyword], 'score desc');
            $i = 1;
            foreach ($attractions as $attraction) {
                $attraction->sort_order = $i;
                $attraction->save();
                $i = $i + 1;
            }
            echo $row;
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
                $.pjax.reload({container: '#pjax-container', timeout: 20000, async: false});
            },
            complete: function (data) {
            }
        });
    }
</script>
