<?php

namespace backend\modules\travel\models;

use Yii;
use common\components\FHtml;
use common\components\FModel;
use common\models\BaseModel;
use frontend\models\ViewModel;

/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the model class for table "travel_plans".
 *
 * @property string $id
 * @property string $name
 * @property integer $day
 * @property string $next_plan_id
 * @property string $attraction_id
 * @property string $attraction_start
 * @property string $attraction_arrived
 * @property string $free_time
 * @property string $attraction_duration
 * @property string $next_attraction_id
 * @property string $travel_by
 * @property string $travel_duration
 * @property string $travel_distance
 * @property string $note
 * @property integer $sort_order
 * @property string $user_id
 * @property string $user_itinerary_id
 * @property integer $is_locked
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class TravelPlansBase extends BaseModel //\yii\db\ActiveRecord
{

// id, name, day, next_plan_id, attraction_id, attraction_start, attraction_arrived, free_time, attraction_duration, next_attraction_id, travel_by, travel_duration, travel_distance, note, sort_order, user_id, user_itinerary_id, is_locked, created_date, created_user, modified_date, modified_user, application_id
    const COLUMN_ID = 'id';
    const COLUMN_NAME = 'name';
    const COLUMN_DAY = 'day';
    const COLUMN_NEXT_PLAN_ID = 'next_plan_id';
    const COLUMN_ATTRACTION_ID = 'attraction_id';
    const COLUMN_ATTRACTION_START = 'attraction_start';
    const COLUMN_ATTRACTION_ARRIVED = 'attraction_arrived';
    const COLUMN_FREE_TIME = 'free_time';
    const COLUMN_ATTRACTION_DURATION = 'attraction_duration';
    const COLUMN_NEXT_ATTRACTION_ID = 'next_attraction_id';
    const COLUMN_TRAVEL_BY = 'travel_by';
    const COLUMN_TRAVEL_DURATION = 'travel_duration';
    const COLUMN_TRAVEL_DISTANCE = 'travel_distance';
    const COLUMN_NOTE = 'note';
    const COLUMN_SORT_ORDER = 'sort_order';
    const COLUMN_USER_ID = 'user_id';
    const COLUMN_USER_ITINERARY_ID = 'user_itinerary_id';
    const COLUMN_IS_LOCKED = 'is_locked';
    const COLUMN_CREATED_DATE = 'created_date';
    const COLUMN_CREATED_USER = 'created_user';
    const COLUMN_MODIFIED_DATE = 'modified_date';
    const COLUMN_MODIFIED_USER = 'modified_user';
    const COLUMN_APPLICATION_ID = 'application_id';

    /**
     * @inheritdoc
     */
    public $tableName = 'travel_plans';

    public static function tableName()
    {
        return 'travel_plans';
    }


    /**
     * @inheritdoc
     * @return TravelPlansQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TravelPlansQuery(get_called_class());
    }
}
