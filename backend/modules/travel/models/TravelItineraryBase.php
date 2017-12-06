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
 * This is the model class for table "travel_itinerary".
 *
 * @property string $id
 * @property string $image
 * @property string $image_size
 * @property string $name
 * @property string $user_id
 * @property string $start_date
 * @property string $end_date
 * @property string $content
 * @property integer $days
 * @property string $city
 * @property string $status
 * @property integer $sort_order
 * @property integer $is_top
 * @property integer $is_system
 * @property string $created_user
 * @property string $created_date
 * @property string $modified_user
 * @property string $modified_date
 * @property string $application_id
 */
class TravelItineraryBase extends BaseModel //\yii\db\ActiveRecord
{
    const STATUS_PLAN = 'PLAN';
    const STATUS_TRAVEL = 'TRAVEL';
    const STATUS_FINISHED = 'FINISHED';
    const CREATED_USER_PLAN = 'PLAN';
    const CREATED_USER_FINISHED = 'FINISHED';

// id, image, image_size, name, user_id, start_date, end_date, content, days, city, status, sort_order, is_top, is_system, created_user, created_date, modified_user, modified_date, application_id
    const COLUMN_ID = 'id';
    const COLUMN_IMAGE = 'image';
    const COLUMN_IMAGE_SIZE = 'image_size';
    const COLUMN_NAME = 'name';
    const COLUMN_USER_ID = 'user_id';
    const COLUMN_START_DATE = 'start_date';
    const COLUMN_END_DATE = 'end_date';
    const COLUMN_CONTENT = 'content';
    const COLUMN_DAYS = 'days';
    const COLUMN_CITY = 'city';
    const COLUMN_STATUS = 'status';
    const COLUMN_SORT_ORDER = 'sort_order';
    const COLUMN_IS_TOP = 'is_top';
    const COLUMN_IS_SYSTEM = 'is_system';
    const COLUMN_CREATED_USER = 'created_user';
    const COLUMN_CREATED_DATE = 'created_date';
    const COLUMN_MODIFIED_USER = 'modified_user';
    const COLUMN_MODIFIED_DATE = 'modified_date';
    const COLUMN_APPLICATION_ID = 'application_id';

    /**
     * @inheritdoc
     */
    public $tableName = 'travel_itinerary';

    public static function tableName()
    {
        return 'travel_itinerary';
    }


    /**
     * @inheritdoc
     * @return TravelItineraryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TravelItineraryQuery(get_called_class());
    }
}
