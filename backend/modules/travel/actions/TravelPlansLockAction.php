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
class TravelPlansLockAction extends BaseAction
{
    public function run()
    {
        $this->listname = 'travel_plans';
        $this->objectname = 'travel_plans';

        $model = FHtml::getModel('travel_plans', '', $this->objectid, [], false);

        if (isset($model)) {
            $model->is_locked = $model->is_locked == 1 ? 0 : 1;
            $model->save();
            return '';
        }

        return 'No success';
    }
}


