<?php

namespace backend\modules\travel\actions;

use backend\actions\BaseAction;
use backend\actions\BrowseAction;
use backend\modules\travel\models\TravelItinerary;
use backend\modules\travel\models\TravelPlans;
use backend\modules\travel\Travel;
use common\components\FHtml;
use frontend\modules\travel\TravelHelper;
use yii\console\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\StringHelper;

/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "backend\modules\travel\models\TravelPlans".
 */
class SavePlanAction extends BaseAction
{
    public function run()
    {
        $transaction = FHtml::currentDb()->beginTransaction();
        try {
            $id = FHtml::getRequestParam('id');
            $duration = FHtml::getRequestParam(['attraction_duration', 'duration']);
            $title = FHtml::getRequestParam(['name', 'title']);
            $start = FHtml::getRequestParam(['attraction_start', 'start']);
            $note = FHtml::getRequestParam('note');

            if (empty($id))
                return 'No Id';

            if (StringHelper::startsWith($id, 'itinerary_')) // itinerary
            {
                $id = str_replace('itinerary_', '', $id);
                $model = TravelItinerary::findOne($id);

                if (isset($model)) {
                    $model->name = $title;
                    $model->save();
                    $transaction->commit();

                    return '';
                }
                return 'Itinerary is null or empty.';
            } else {
                $model = FHtml::getModel('travel_plans', '', ['id' => $id]);

                if (isset($model)) {
                    if (!empty($start)) {
                        $attraction = $model->getAttraction();

                        //$model->is_locked = 1; -> Not automatically update
                        $model->attraction_start = $start; //TravelHelper::timeToNumeric($start);
                        $model->attraction_arrived = $start;
                        $result = TravelHelper::checkValidTime($model, $attraction);
                        if (!empty($result))
                            throw new \yii\base\Exception($result);
                    }

                    if (!empty($note))
                        $model->note = $note;

                    if (!empty($duration)) {
                        if (!is_numeric($duration))
                            $duration = TravelHelper::timeToNumeric($duration);
                        $model->attraction_duration = $duration;
                    }

                    if (!empty($title))
                        $model->name = $title;

                    $model->save();

                    $result = TravelHelper::checkValidAll($model->user_itinerary_id, $model->day, null, $model);
                    if (!empty($result))
                        throw new \yii\base\Exception($result);

                    $transaction->commit();

                    return '';
                }
            }
        } catch (\yii\base\Exception $e) {
            $transaction->rollback();
            return $e->getMessage();
        }

        return 'Can not save id: ' . $id . ' duration: ' . $duration . ' title: ' . $title . ' start: ' . $start . ' note: ' . $note;
    }
}


