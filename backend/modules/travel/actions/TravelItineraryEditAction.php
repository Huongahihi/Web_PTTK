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
class TravelItineraryEditAction extends BaseAction
{
    public function run()
    {
        $userid = FHtml::getRequestParam('userid');
        $itineraryid = FHtml::getRequestParam('itineraryid');

        $itinerary = FHtml::getModel('travel_itinerary', '', $itineraryid, null, false);

        $itinerary2 = new TravelItinerary();
        $itinerary2->name = 'My Itinerary';
        $itinerary2->is_system = 0;
        $itinerary2->user_id = $userid;
        $itinerary2->days = $itinerary->days;
        $itinerary2->status = TravelItinerary::STATUS_PLAN;
        $itinerary2->city = $itinerary->city;
        $itinerary2->created_date = date('Y-m-d');
        $itinerary2->created_user = FHtml::currentUserId();
        $itinerary2->modified_date = date('Y-m-d');
        $itinerary2->modified_user = FHtml::currentUserId();

        $itinerary2->save();

        $plans = FHtml::getModels('travel_plans', ['user_itinerary_id' => $itineraryid]);
        foreach ($plans as $plan) {
            $newplan = clone $plan;
            $newplan->user_itinerary_id = $itinerary2->id;
            $newplan->isNewRecord = true;
            unset($newplan->id);
            $newplan->save();
        }

        return $itinerary2->id;
    }
}


