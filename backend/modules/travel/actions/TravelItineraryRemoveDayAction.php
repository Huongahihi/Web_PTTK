<?php

namespace backend\modules\travel\actions;

use backend\actions\BaseAction;
use backend\actions\BrowseAction;
use backend\modules\travel\models\TravelItinerary;
use backend\modules\travel\models\TravelPlans;
use common\components\FHtml;
use yii\base\Exception;
use yii\helpers\Json;

/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "backend\models\TravelItinerary".
*/
class TravelItineraryRemoveDayAction extends BaseAction
{
    public function run()
    {
        $day = FHtml::getRequestParam('day');
        $itineraryid = FHtml::getRequestParam('itineraryid');
        $transaction = FHtml::currentDb()->beginTransaction();

        try {

            $plans = FHtml::getModels('travel_plans', ['user_itinerary_id' => $itineraryid]);
            $itinerary = FHtml::getModel('travel_itinerary', '', $itineraryid, null, false);

            $itinerary->days = $itinerary->days > 0 ? ($itinerary->days - 1) : 0;
            $itinerary->name = $itinerary->days > 0 ? ($itinerary->days . ' days in ' . $itinerary->city) : ('A trip in ' . $itinerary->city);
            $itinerary->save();

            foreach ($plans as $plan) {
                if ($plan->day == $day || $plan->day == 0) {
                    $plan->delete();
                } else if ($plan->day > $day) {
                    if ($plan->day == 1) {
                        $plan->delete();
                    } else {
                        $plan->day = $plan->day - 1;
                        $plan->save();
                    }
                }
            }

            $transaction->commit();

        } catch (Exception $e) {
            $transaction->rollback();
            return 'Could not delete day ' . $day;
        }

        return '';
    }
}


