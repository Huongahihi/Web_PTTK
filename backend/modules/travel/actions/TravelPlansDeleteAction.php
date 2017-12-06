<?php

namespace backend\modules\travel\actions;

use backend\actions\BaseAction;
use backend\actions\BrowseAction;
use backend\modules\travel\models\TravelPlans;
use common\components\FHtml;
use frontend\modules\travel\TravelHelper;
use yii\helpers\Json;
use yii\helpers\StringHelper;

/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "backend\modules\travel\models\TravelPlans".
 */
class TravelPlansDeleteAction extends BaseAction
{
    public function run()
    {
        $this->listname = 'travel_plans';
        $this->objectname = 'travel_plans';
        $paramArray = FHtml::decode($this->params);
        $listArray = FHtml::decode($this->listname);

        $day = FHtml::getRequestParam('day', 1);
        $object_type = 'travel_plans';
        $attractions = FHtml::getRequestParam('attractions');
        $plans = FHtml::getRequestParam('plans');

        $model = FHtml::getModel('travel_plans', '', $plans, [], false);
        $modelList = FHtml::getModels('travel_plans', ['day' => $day]);

        if (isset($model)) {
            $model->delete();
        }

        return $plans;

        $sort_order_field = 'sort_order';

        if (empty($attractions) || empty($object_type))
            return 'Empty data';

        if (is_array($plans))
            $arr = $plans;
        else if (is_string($plans))
            $arr = explode(',', $plans);

        if (is_array($attractions))
            $arrAttr = $attractions;
        else if (is_string($attractions))
            $arrAttr = explode(',', $attractions);

        $sort_orders = $object_type . ': Day ' . $day . ': ';

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
        } else { //1,4,4,2:14,6,5,7
            $oldModel = null;
            for ($i = 0; $i < count($arr); $i++) {
                if (StringHelper::startsWith($arrAttr[$i], 'attraction:')) { // drag from Attractions zone
                    $attraction_id = str_replace('attraction:', '', $arrAttr[$i]);
                    $model = new TravelPlans();
                    $model->name = FHtml::getModel('travel_attractions', '', $attraction_id)->name;
                    $model->day = $day;
                    $model->attraction_id = $attraction_id;
                    $model->setSortOrder($i);
                    $model->save();
                    $sort_orders .= $arrAttr[$i];
                } else {
                    $model = FHtml::getModel($object_type, '', $arr[$i], null, false);

                    if (isset($model)) {
                        $model->day = $day;
                        $model->setSortOrder($i);
                        $model->save();
                        $sort_orders .= $arrAttr[$i];
                    }
                }
                //update oldModel
                if (isset($oldModel)) {
                    $oldModel->next_plan_id = $model->id;
                    if ($oldModel->next_attraction_id != $model->attraction_id) { // if there is a change
                        $oldModel->next_attraction_id = $model->attraction_id;
                        TravelHelper::updateDistance($oldModel, $model);
                        $oldModel->save();
                    }

                }
                $oldModel = $model;
            }
        }
        return $sort_orders;
    }
}


