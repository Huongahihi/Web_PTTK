<?php

namespace backend\modules\travel\controllers;

use common\components\FHtml;
use yii\base\Exception;
use yii\db\Query;
use yii\helpers\Json;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use backend\controllers\ApiController;

class ApiTravelController extends ApiController
{
    public function actions()
    {
        return array_merge([
            'travel-plans-update' => ['class' => 'backend\modules\travel\actions\TravelPlansUpdateAction', 'checkAccess' => [$this, 'checkAccess']],
            'travel-plans-delete' => ['class' => 'backend\modules\travel\actions\TravelPlansDeleteAction', 'checkAccess' => [$this, 'checkAccess']],
            'travel-plans-lock' => ['class' => 'backend\modules\travel\actions\TravelPlansLockAction', 'checkAccess' => [$this, 'checkAccess']],

            'travel-itinerary-edit' => ['class' => 'backend\modules\travel\actions\TravelItineraryEditAction', 'checkAccess' => [$this, 'checkAccess']],
            'travel-itinerary-remove' => ['class' => 'backend\modules\travel\actions\TravelItineraryRemoveAction', 'checkAccess' => [$this, 'checkAccess']],

            'travel-itinerary-add-day' => ['class' => 'backend\modules\travel\actions\TravelItineraryAddDayAction', 'checkAccess' => [$this, 'checkAccess']],
            'travel-itinerary-remove-day' => ['class' => 'backend\modules\travel\actions\TravelItineraryRemoveDayAction', 'checkAccess' => [$this, 'checkAccess']],
            'travel-scores-check' => ['class' => 'backend\modules\travel\actions\TravelScoresCheckAction', 'checkAccess' => [$this, 'checkAccess']],

            'save-plan' => ['class' => 'backend\modules\travel\actions\SavePlanAction', 'checkAccess' => [$this, 'checkAccess']],
        ], parent::actions());
    }
}
