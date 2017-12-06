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
        <?php
        if (empty($attraction_id)) { ?>
            <a class="btn btn-sm btn-success" href="<?= FHtml::createUrl('travel/travel-attractions/search', ['save' => 'override', 'attraction_id' => $attraction_id]) ?>"> Override </a> |
            <a class="btn btn-sm btn-warning" href="<?= FHtml::createUrl('travel/travel-attractions/search', ['save' => 'new', 'attraction_id' => $attraction_id]) ?>"> Save new data only </a>
        <?php } ?>
        <table class="table table-condensed table-responsive table-bordered" style="width:100%;background-color: white">
            <?php
            $row = '';
            $row .= '<tr class="info">';
            $row .= '<th class="col-md-2">Attraction</th><th class="col-md-5">Current Info</th><th class="col-md-5">Search Result</th>';
            $row .= '</tr>';
            echo $row;

            foreach ($attractions as $attraction) {
                $places = FHtml::searchPlace($attraction->name);

                if ($save == 'override') {
                    if (!empty($places['address']))
                        $attraction->address = $places['address'];
                    if (!empty($places['tel']))
                        $attraction->tel = $places['tel'];
                    if (!empty($places['website']))
                        $attraction->website = $places['website'];
                    if (!empty($places['hours'])) {
                        $hour = explode('-', $places['hours']);
                        $attraction->open = reset($hour);
                        $attraction->close = end($hour);
                    }

                    $attraction->save();
                } else if ($save == 'new') {
                    if (!empty($places['address']) && empty($attraction->address))
                        $attraction->address = $places['address'];
                    if (!empty($places['tel']) && empty($attraction->tel))
                        $attraction->tel = $places['tel'];
                    if ($attraction->website == '-')
                        $attraction->website = '';
                    if (!empty($places['website'])  && empty($attraction->website))
                        $attraction->website = $places['website'];
                    if (!empty($places['hours'])) {
                        $hour = explode('-', $places['hours']);
                        if (empty($attraction->open))
                            $attraction->open = reset($hour);
                        if (empty($attraction->close))
                            $attraction->close = end($hour);
                    }

                    $attraction->save();
                }
                $url  = 'https://www.google.com.vn/search?q=' . str_replace(' ', '+', $attraction->name);

                $result = '';
                foreach ($places as $key => $value) {
                    $result .= '<span style="color: grey">' . $key . '</span>: ' . $value . '<br/>';
                }
                $result1 = '';
                $result1 .= '<span style="color: grey"> address</span>: ' . $attraction->address . '<br/>';
                $result1 .= '<span style="color: grey"> tel</span>: ' . $attraction->tel . '<br/>';
                $result1 .= '<span style="color: grey"> hours</span>: ' . $attraction->open . '-' . $attraction->close . '<br/>';
                $result1 .= '<span style="color: grey"> website</span>: ' . $attraction->website . '<br/>';

                $row = '';
                $row .= '<tr class="">';
                $row .= '<td style="">' . $attraction->name . ' ' . FHtml::createLink($url, [], BACKEND, '...', '_blank', '') . '<br/><br/>'
                        . FHtml::createLink('travel/travel-attractions/search', ['save' => 'override', 'attraction_id' => $attraction->id], BACKEND, 'Override', '_blank', 'btn btn-xs btn-success')
                        . FHtml::createLink('travel/travel-attractions/search', ['save' => 'new', 'attraction_id' => $attraction->id], BACKEND, 'New only', '_blank', 'btn btn-xs btn-warning')
                        . '</td><td class="" style="">' . $result1 . '</td>'
                        . '<td class="" style="background-color:white">' . $result . '</td>';
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
