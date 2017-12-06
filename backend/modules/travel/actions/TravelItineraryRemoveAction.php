<?php

namespace backend\modules\travel\actions;

use backend\actions\BaseAction;
use backend\actions\BrowseAction;
use backend\modules\travel\models\TravelItinerary;
use backend\modules\travel\models\TravelPlans;
use common\components\FHtml;
use yii\helpers\Json;

/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "backend\models\TravelItinerary".
 */
class TravelItineraryRemoveAction extends BaseAction
{
    public function run()
    {
        $userid = FHtml::getRequestParam('userid');
        $itineraryid = FHtml::getRequestParam('itineraryid');

        $itinerary = FHtml::getModel('travel_itinerary', '', $itineraryid, null, false);
        if (isset($itinerary)) {
            $itinerary->delete();
            return FHtml::t('common', 'Itinerary is removed');
        } else {
            return FHtml::t('common', 'Could not find Itinerary Id #' . $itineraryid);
        }
    }
}


