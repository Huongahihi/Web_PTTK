<?php

namespace backend\modules\travel\actions;

use backend\actions\BaseAction;
use backend\actions\BrowseAction;
use backend\modules\travel\models\TravelScores;
use common\components\FHtml;
use frontend\modules\travel\TravelHelper;
use yii\helpers\Json;


/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "backend\modules\travel\models\TravelScores".
 */
class TravelScoresCheckAction extends BaseAction
{
    public function run()
    {
        $attraction_id = FHtml::getRequestParam('attraction_id');
        $site_id = FHtml::getRequestParam('site_id');
        $model = TravelScores::findOne(['attraction_id' => $attraction_id, 'site_id' => $site_id]);
        if (!isset($model)) {
            $model = new TravelScores();
            $model->name = '';
            $model->attraction_id = $attraction_id;
            $model->site_id = $site_id;
            $model->is_active = 1;
            $model->weight = FHtml::getFieldValue($model->getSite(), 'weight');
            $model->score = $model->weight;
            $model->save();
        } else {
            $model->delete();
        }

        TravelHelper::calculatePoints($model->getAttraction());

        return '';
    }
}


