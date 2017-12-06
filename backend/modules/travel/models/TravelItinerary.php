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
 * This is the customized model class for table "travel_itinerary".
 */
class TravelItinerary extends TravelItineraryBase //\yii\db\ActiveRecord
{
    const LOOKUP = [
        'status' => [['id' => TravelItinerary::STATUS_PLAN, 'name' => 'PLAN'], ['id' => TravelItinerary::STATUS_TRAVEL, 'name' => 'TRAVEL'], ['id' => TravelItinerary::STATUS_FINISHED, 'name' => 'FINISHED'], ],
        'created_user' => [['id' => TravelItinerary::CREATED_USER_PLAN, 'name' => 'PLAN'], ['id' => TravelItinerary::CREATED_USER_FINISHED, 'name' => 'FINISHED'], ],
    ];

    const COLUMNS_UPLOAD = ['image'];

    public $order_by = 'sort_order asc,is_top desc,created_date desc,';

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];
    const COLUMNS = [
        'api' => ['id', 'image', 'image_size', 'name', 'user_id', 'start_date', 'end_date', 'content', 'days', 'city', 'status', 'sort_order', 'is_top', 'is_system', 'created_user', 'created_date', 'modified_user', 'modified_date', 'application_id', ],
        'all' => ['id', 'image', 'image_size', 'name', 'user_id', 'start_date', 'end_date', 'content', 'days', 'city', 'status', 'sort_order', 'is_top', 'is_system', 'created_user', 'created_date', 'modified_user', 'modified_date', 'application_id',  'objectAttributes', 'objectFile', 'objectCategories'],
        '+' => ['user',   'objectAttributes', 'objectFile', 'objectCategories']
    ];

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
        
            [['id', 'image', 'image_size', 'name', 'user_id', 'start_date', 'end_date', 'content', 'days', 'city', 'status', 'sort_order', 'is_top', 'is_system', 'created_user', 'created_date', 'modified_user', 'modified_date', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['name'], 'required'],
            [['start_date', 'end_date', 'created_date', 'modified_date'], 'safe'],
            [['content'], 'string'],
            [['days', 'sort_order', 'is_top', 'is_system'], 'integer'],
            [['image'], 'string', 'max' => 300],
            [['image_size', 'name'], 'string', 'max' => 255],
            [['user_id', 'city', 'status', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
        ];
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
            'id' => FHtml::t('TravelItinerary', 'ID'),
            'image' => FHtml::t('TravelItinerary', 'Image'),
            'image_size' => FHtml::t('TravelItinerary', 'Image Size'),
            'name' => FHtml::t('TravelItinerary', 'Name'),
            'user_id' => FHtml::t('TravelItinerary', 'User ID'),
            'start_date' => FHtml::t('TravelItinerary', 'Start Date'),
            'end_date' => FHtml::t('TravelItinerary', 'End Date'),
            'content' => FHtml::t('TravelItinerary', 'Content'),
            'days' => FHtml::t('TravelItinerary', 'Days'),
            'city' => FHtml::t('TravelItinerary', 'City'),
            'status' => FHtml::t('TravelItinerary', 'Status'),
            'sort_order' => FHtml::t('TravelItinerary', 'Sort Order'),
            'is_top' => FHtml::t('TravelItinerary', 'Is Top'),
            'is_system' => FHtml::t('TravelItinerary', 'Is System'),
            'created_user' => FHtml::t('TravelItinerary', 'Created User'),
            'created_date' => FHtml::t('TravelItinerary', 'Created Date'),
            'modified_user' => FHtml::t('TravelItinerary', 'Modified User'),
            'modified_date' => FHtml::t('TravelItinerary', 'Modified Date'),
            'application_id' => FHtml::t('TravelItinerary', 'Application ID'),
        ];
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


    public function prepareCustomFields() {
        parent::prepareCustomFields();

        $this->user = self::getUser();
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
        $i18n->translations['TravelItinerary*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/messages',
            'fileMap' => [
                'TravelItinerary' => 'TravelItinerary.php',
            ],
        ];
    }

    public function toViewModel() {
    $model = new ViewModel();
            FHtml::setFieldValue($model, ['id'], $this->id);
            FHtml::setFieldValue($model, ['image'], $this->image);
            FHtml::setFieldValue($model, ['image_size'], $this->image_size);
            FHtml::setFieldValue($model, ['name'], $this->name);
            FHtml::setFieldValue($model, ['user_id'], $this->user_id);
            FHtml::setFieldValue($model, ['start_date'], $this->start_date);
            FHtml::setFieldValue($model, ['end_date'], $this->end_date);
            FHtml::setFieldValue($model, ['content'], $this->content);
            FHtml::setFieldValue($model, ['days'], $this->days);
            FHtml::setFieldValue($model, ['city'], $this->city);
            FHtml::setFieldValue($model, ['status'], $this->status);
            FHtml::setFieldValue($model, ['sort_order'], $this->sort_order);
            FHtml::setFieldValue($model, ['is_top'], $this->is_top);
            FHtml::setFieldValue($model, ['is_system'], $this->is_system);
            FHtml::setFieldValue($model, ['created_user'], $this->created_user);
            FHtml::setFieldValue($model, ['created_date'], $this->created_date);
            FHtml::setFieldValue($model, ['modified_user'], $this->modified_user);
            FHtml::setFieldValue($model, ['modified_date'], $this->modified_date);
            FHtml::setFieldValue($model, ['application_id'], $this->application_id);
        return $model;
    }
}
