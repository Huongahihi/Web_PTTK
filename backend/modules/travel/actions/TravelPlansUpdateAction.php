<?php

namespace backend\modules\travel\actions;

use backend\actions\BaseAction;
use backend\actions\BrowseAction;
use backend\modules\travel\models\TravelPlans;
use common\components\FHtml;
use frontend\modules\travel\TravelHelper;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Console;
use yii\helpers\Json;
use yii\helpers\StringHelper;

/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "backend\modules\travel\models\TravelPlans".
*/
class TravelPlansUpdateAction extends BaseAction
{
    public function run()
    {
        $this->listname = 'travel_plans';
        $this->objectname = 'travel_plans';
        $paramArray = FHtml::decode($this->params);
        $listArray = FHtml::decode($this->listname);

        $day = FHtml::getRequestParam('day', 1);
        $itinerary_id = FHtml::getRequestParam('itineraryid', 'draft');
        $userid = FHtml::getRequestParam('userid', FHtml::currentUserId());

        $object_type = 'travel_plans';
        $attractions = FHtml::getRequestParam('attractions');
        $plans = FHtml::getRequestParam('plans');

        $sort_order_field = 'sort_order';
        $log = '';

        if (empty($attractions) || empty($object_type))
            return 'No attractions';

        if (is_array($plans))
            $arr = $plans;
        else if (is_string($plans))
            $arr = explode(',', $plans);

        if (is_array($attractions))
            $arrAttr = $attractions;
        else if (is_string($attractions))
            $arrAttr = explode(',', $attractions);

        $sort_orders = $object_type . ': Day ' . $day . ': ';
        $listModels = [];

        if ($day == 'attraction' || $day == '0') { // drag into attraction zone means remove from plan
            for ($i = 0; $i < count($arrAttr); $i++) {
                if (is_numeric($arrAttr[$i])) {
                    $model = FHtml::getModel($object_type, '', $arrAttr[$i], null, false);
                    if (isset($model)) {
                        $model->delete();
                        $sort_orders .= $arrAttr[$i];
                    }
                    $sort_orders .= $arrAttr[$i];
                }
            }
        } else {
            $oldModel = null;
            $errors = [];
            $transaction = FHtml::currentDb()->beginTransaction();
            try {
                $models = [];
                for ($i = 0; $i < count($arr); $i++) {

                    $attraction = null;
                    if (StringHelper::startsWith($arrAttr[$i], 'attraction:')) { // drag from Attractions zone
                        $attraction_id = str_replace('attraction:', '', $arrAttr[$i]);
                        $attraction = FHtml::getModel('travel_attractions', '', $attraction_id);

                        $model1 = TravelPlans::findOne(['user_itinerary_id' => $itinerary_id, 'attraction_id' => $attraction_id]);
                        if (isset($model1)) // already existed
                        {
                            throw new Exception(FHtml::t('common', 'Attraction ' . $attraction->name . ' exists in the plan.'));
                        }
                        $model = new TravelPlans();
                        $model->name = $attraction->name;
                        $model->day = $day;
                        $model->attraction_id = $attraction_id;
                        $model->user_itinerary_id = $itinerary_id;
                        $model->user_id = $userid;

                    } else {
                        if (empty($arr[$i]))
                            continue;
                        $model = FHtml::getModel($object_type, '', $arr[$i], null, false);

                        if (isset($model)) {
                            $model->user_itinerary_id = $itinerary_id;
                            $model->user_id = $userid;
                            $model->day = $day;
                        }
                    }

                    //update Previous Model
                    if (isset($oldModel)) {
                        $oldModel->next_plan_id = $model->id;
                        if ($oldModel->next_attraction_id != $model->attraction_id) { // if there is a change
                            $oldModel->next_attraction_id = $model->attraction_id;
                            TravelHelper::updateDistance($oldModel, $model);
                            $oldModel->save();
                        }

                        $result = TravelHelper::setPlans($oldModel, $model, $i);
                        if (!empty($result))
                            throw new Exception($result);
                    } else { // First Model
                        TravelHelper::setPlans($model);
                    }

                    $model->setSortOrder($i);
                    $model->save();

                    $models[] = $model;
                    $oldModel = $model;

                    $log .= $model->name . ': ' . $model->attraction_arrived . ' (' . $model->attraction_start . ') \n';
                    $result = TravelHelper::checkValidTime($model);
                    if (!empty($result))
                        throw new Exception($result);
                }

                // check Valid Opening time
//                $valid = TravelHelper::checkValidAll($itinerary_id, $day, null);
//                if (!empty($valid)) {
//                    throw new Exception($valid);
//                }

                $transaction->commit();

            } catch (Exception $e) {
                $transaction->rollback();
                return $e->getMessage();
            }
        }
        return '';
    }
}


