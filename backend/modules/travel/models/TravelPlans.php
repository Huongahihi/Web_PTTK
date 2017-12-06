<?php

namespace backend\modules\travel\models;

use Yii;
use common\components\FHtml;
use common\components\FModel;
use common\models\BaseModel;
use frontend\models\ViewModel;
use yii\helpers\ArrayHelper;

/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "travel_plans".
 */
class TravelPlans extends TravelPlansBase //\yii\db\ActiveRecord
{
    const LOOKUP = [];

    const COLUMNS_UPLOAD = [];

    public $order_by = 'sort_order asc,created_date desc,';

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];
    const COLUMNS = [
        'api' => ['id', 'name', 'day', 'next_plan_id', 'attraction_id', 'attraction_start', 'attraction_arrived', 'free_time', 'attraction_duration', 'next_attraction_id', 'travel_by', 'travel_duration', 'travel_distance', 'note', 'sort_order', 'user_id', 'user_itinerary_id', 'is_locked', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id', ],
        'all' => ['id', 'name', 'day', 'next_plan_id', 'attraction_id', 'attraction_start', 'attraction_arrived', 'free_time', 'attraction_duration', 'next_attraction_id', 'travel_by', 'travel_duration', 'travel_distance', 'note', 'sort_order', 'user_id', 'user_itinerary_id', 'is_locked', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id',  'objectAttributes', 'objectFile', 'objectCategories'],
        '+' => ['next_plan', 'attraction', 'next_attraction', 'user', 'user_itinerary',   'objectAttributes', 'objectFile', 'objectCategories']
    ];

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
        
            [['id', 'name', 'day', 'next_plan_id', 'attraction_id', 'attraction_start', 'attraction_arrived', 'free_time', 'attraction_duration', 'next_attraction_id', 'travel_by', 'travel_duration', 'travel_distance', 'note', 'sort_order', 'user_id', 'user_itinerary_id', 'is_locked', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['name'], 'required'],
            [['day', 'sort_order', 'is_locked'], 'integer'],
            [['note'], 'string'],
            [['created_date', 'modified_date'], 'safe'],
            [['name', 'attraction_start', 'attraction_arrived', 'free_time', 'attraction_duration', 'travel_duration', 'travel_distance'], 'string', 'max' => 255],
            [['next_plan_id', 'attraction_id', 'next_attraction_id', 'travel_by', 'user_id', 'user_itinerary_id', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
        ];
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
                    'id' => FHtml::t('TravelPlans', 'ID'),
                    'name' => FHtml::t('TravelPlans', 'Name'),
                    'day' => FHtml::t('TravelPlans', 'Day'),
                    'next_plan_id' => FHtml::t('TravelPlans', 'Next Plan ID'),
                    'attraction_id' => FHtml::t('TravelPlans', 'Attraction ID'),
                    'attraction_start' => FHtml::t('TravelPlans', 'Attraction Start'),
                    'attraction_arrived' => FHtml::t('TravelPlans', 'Attraction Arrived'),
                    'free_time' => FHtml::t('TravelPlans', 'Free Time'),
                    'attraction_duration' => FHtml::t('TravelPlans', 'Attraction Duration'),
                    'next_attraction_id' => FHtml::t('TravelPlans', 'Next Attraction ID'),
                    'travel_by' => FHtml::t('TravelPlans', 'Travel By'),
                    'travel_duration' => FHtml::t('TravelPlans', 'Travel Duration'),
                    'travel_distance' => FHtml::t('TravelPlans', 'Travel Distance'),
                    'note' => FHtml::t('TravelPlans', 'Note'),
                    'sort_order' => FHtml::t('TravelPlans', 'Sort Order'),
                    'user_id' => FHtml::t('TravelPlans', 'User ID'),
                    'user_itinerary_id' => FHtml::t('TravelPlans', 'User Itinerary ID'),
                    'is_locked' => FHtml::t('TravelPlans', 'Is Locked'),
                    'created_date' => FHtml::t('TravelPlans', 'Created Date'),
                    'created_user' => FHtml::t('TravelPlans', 'Created User'),
                    'modified_date' => FHtml::t('TravelPlans', 'Modified Date'),
                    'modified_user' => FHtml::t('TravelPlans', 'Modified User'),
                    'application_id' => FHtml::t('TravelPlans', 'Application ID'),
                ];
    }



    // Lookup Object: next_plan\n
    public $next_plan;
    public function getNextPlan() {
        if (!isset($this->next_plan))
        $this->next_plan = FHtml::getModel('travel_plans', '', $this->next_plan_id, '', false);

        return $this->next_plan;
    }
    public function setNextPlan($value) {
        $this->next_plan = $value;
    }

    // Lookup Object: attraction\n
    public $attraction;
    public function getAttraction() {
        if (!isset($this->attraction))
        $this->attraction = FHtml::getModel('travel_attractions', '', $this->attraction_id, '', false);

        return $this->attraction;
    }
    public function setAttraction($value) {
        $this->attraction = $value;
    }

    // Lookup Object: next_attraction\n
    public $next_attraction;
    public function getNextAttraction() {
        if (!isset($this->next_attraction))
        $this->next_attraction = FHtml::getModel('travel_attractions', '', $this->next_attraction_id, '', false);

        return $this->next_attraction;
    }
    public function setNextAttraction($value) {
        $this->next_attraction = $value;
    }

    // Lookup Object: user\n
    public $user;
    public function getUser() {
        if (!isset($this->user))
        $this->user = FHtml::getModel('user', '', $this->user_id, '', false);

        return $this->user;
    }
    public function setUser($value) {
        $this->user = $value;
    }

    // Lookup Object: user_itinerary\n
    public $user_itinerary;
    public function getUserItinerary() {
        if (!isset($this->user_itinerary))
        $this->user_itinerary = FHtml::getModel('travel_itinerary', '', $this->user_itinerary_id, '', false);

        return $this->user_itinerary;
    }
    public function setUserItinerary($value) {
        $this->user_itinerary = $value;
    }


    public function prepareCustomFields() {
        parent::prepareCustomFields();

        $this->next_plan = self::getNextPlan();
        $this->attraction = self::getAttraction();
        $this->next_attraction = self::getNextAttraction();
        $this->user = self::getUser();
        $this->user_itinerary = self::getUserItinerary();
    }

    public function fields()
    {
        $fields = parent::fields();

        $columns = self::COLUMNS;
        if (is_string($this->columnsMode) && !empty($this->columnsMode) && key_exists($this->columnsMode, $columns)) {
            $fields1 = $columns[$this->columnsMode];
            if (!empty($fields1))
            $fields = $fields1;
        } else if (is_array($this->columnsMode))
            return $this->columnsMode;

        if (key_exists('+', $columns) && !empty($columns['+'])) {
            $fields = array_merge($fields, $columns['+']);
        }
        //unset($fields['xxx'], $fields['yyy'], $fields['zzz']);

        return $fields;
    }

    public static function getLookupArray($column) {
        if (key_exists($column, self::LOOKUP))
            return self::LOOKUP[$column];
        return [];
    }

    public static function getRelatedObjects() {
        return self::OBJECTS_RELATED;
    }

    public static function getMetaObjects() {
        return self::OBJECTS_META;
    }

    public static function tableSchema()
    {
        return FHtml::getTableSchema(self::tableName());
    }

    public static function Columns()
    {
        return self::tableSchema()->columns;
    }

    public static function ColumnsArray()
    {
        return ArrayHelper::getColumn(self::tableSchema()->columns, 'name');
    }


    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        $i18n = Yii::$app->i18n;
        $i18n->translations['TravelPlans*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/messages',
            'fileMap' => [
                'TravelPlans' => 'TravelPlans.php',
            ],
        ];
    }

    public function toViewModel() {
    $model = new ViewModel();
            FHtml::setFieldValue($model, ['id'], $this->id);
            FHtml::setFieldValue($model, ['name'], $this->name);
            FHtml::setFieldValue($model, ['day'], $this->day);
            FHtml::setFieldValue($model, ['next_plan_id'], $this->next_plan_id);
            FHtml::setFieldValue($model, ['attraction_id'], $this->attraction_id);
            FHtml::setFieldValue($model, ['attraction_start'], $this->attraction_start);
            FHtml::setFieldValue($model, ['attraction_arrived'], $this->attraction_arrived);
            FHtml::setFieldValue($model, ['free_time'], $this->free_time);
            FHtml::setFieldValue($model, ['attraction_duration'], $this->attraction_duration);
            FHtml::setFieldValue($model, ['next_attraction_id'], $this->next_attraction_id);
            FHtml::setFieldValue($model, ['travel_by'], $this->travel_by);
            FHtml::setFieldValue($model, ['travel_duration'], $this->travel_duration);
            FHtml::setFieldValue($model, ['travel_distance'], $this->travel_distance);
            FHtml::setFieldValue($model, ['note'], $this->note);
            FHtml::setFieldValue($model, ['sort_order'], $this->sort_order);
            FHtml::setFieldValue($model, ['user_id'], $this->user_id);
            FHtml::setFieldValue($model, ['user_itinerary_id'], $this->user_itinerary_id);
            FHtml::setFieldValue($model, ['is_locked'], $this->is_locked);
            FHtml::setFieldValue($model, ['created_date'], $this->created_date);
            FHtml::setFieldValue($model, ['created_user'], $this->created_user);
            FHtml::setFieldValue($model, ['modified_date'], $this->modified_date);
            FHtml::setFieldValue($model, ['modified_user'], $this->modified_user);
            FHtml::setFieldValue($model, ['application_id'], $this->application_id);
        return $model;
    }
}
