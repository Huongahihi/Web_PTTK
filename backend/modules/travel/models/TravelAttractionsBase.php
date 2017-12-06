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
 * This is the model class for table "travel_attractions".
 *

 * @property string $id
 * @property string $thumbnail
 * @property string $image
 * @property string $image_description
 * @property string $name
 * @property string $description
 * @property string $content
 * @property string $note
 * @property string $tel
 * @property string $address
 * @property string $website
 * @property string $map
 * @property integer $rate
 * @property integer $score
 * @property string $budget
 * @property string $default_duration
 * @property integer $sort_order
 * @property double $lat
 * @property double $long
 * @property string $open
 * @property string $close
 * @property string $street
 * @property string $city
 * @property string $country
 * @property string $category_id
 * @property string $type
 * @property string $status
 * @property integer $is_active
 * @property integer $is_new
 * @property integer $is_hot
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class TravelAttractionsBase extends BaseModel //\yii\db\ActiveRecord
{
    const CATEGORY_ID_ADVENTURE = 'Adventure';
    const CATEGORY_ID_FAMILY = 'Family';
    const CATEGORY_ID_LEISURE = 'Leisure';
    const CATEGORY_ID_ENTERTAINMENT = 'Entertainment';
    const CATEGORY_ID_FOOD = 'Food';
    const CATEGORY_ID_HISTORICAL = 'Historical';
    const CATEGORY_ID_OUTDOORS = 'Outdoors';
    const CATEGORY_ID_MUSEUMS = 'Museums';
    const CATEGORY_ID_ART = 'Art';
    const CATEGORY_ID_MUST_SEE = 'Must_See';
    const TYPE_LOCATION = 'LOCATION';
    const TYPE_RESTAURANT = 'RESTAURANT';
    const TYPE_HOTEL = 'HOTEL';

// id, thumbnail, image, image_description, name, description, content, note, tel, address, website, map, rate, score, budget, default_duration, sort_order, lat, long, open, close, street, city, country, category_id, type, status, is_active, is_new, is_hot, created_date, created_user, modified_date, modified_user, application_id
    const COLUMN_ID = 'id';
    const COLUMN_THUMBNAIL = 'thumbnail';
    const COLUMN_IMAGE = 'image';
    const COLUMN_IMAGE_DESCRIPTION = 'image_description';
    const COLUMN_NAME = 'name';
    const COLUMN_DESCRIPTION = 'description';
    const COLUMN_CONTENT = 'content';
    const COLUMN_NOTE = 'note';
    const COLUMN_TEL = 'tel';
    const COLUMN_ADDRESS = 'address';
    const COLUMN_WEBSITE = 'website';
    const COLUMN_MAP = 'map';
    const COLUMN_RATE = 'rate';
    const COLUMN_SCORE = 'score';
    const COLUMN_BUDGET = 'budget';
    const COLUMN_DEFAULT_DURATION = 'default_duration';
    const COLUMN_SORT_ORDER = 'sort_order';
    const COLUMN_LAT = 'lat';
    const COLUMN_LONG = 'long';
    const COLUMN_OPEN = 'open';
    const COLUMN_CLOSE = 'close';
    const COLUMN_STREET = 'street';
    const COLUMN_CITY = 'city';
    const COLUMN_COUNTRY = 'country';
    const COLUMN_CATEGORY_ID = 'category_id';
    const COLUMN_TYPE = 'type';
    const COLUMN_STATUS = 'status';
    const COLUMN_IS_ACTIVE = 'is_active';
    const COLUMN_IS_NEW = 'is_new';
    const COLUMN_IS_HOT = 'is_hot';
    const COLUMN_CREATED_DATE = 'created_date';
    const COLUMN_CREATED_USER = 'created_user';
    const COLUMN_MODIFIED_DATE = 'modified_date';
    const COLUMN_MODIFIED_USER = 'modified_user';
    const COLUMN_APPLICATION_ID = 'application_id';

    /**
    * @inheritdoc
    */
    public $tableName = 'travel_attractions';

    public static function tableName()
    {
        return 'travel_attractions';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['id', 'thumbnail', 'image', 'image_description', 'name', 'description', 'content', 'note', 'tel', 'address', 'website', 'map', 'rate', 'score', 'budget', 'default_duration', 'sort_order', 'lat', 'long', 'open', 'close', 'street', 'city', 'country', 'category_id', 'type', 'status', 'is_active', 'is_new', 'is_hot', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],
        
            [['name'], 'required'],
            [['content', 'note'], 'string'],
            [['rate', 'score', 'sort_order', 'is_active', 'is_new', 'is_hot'], 'integer'],
            [['lat', 'long'], 'number'],
            [['created_date', 'modified_date'], 'safe'],
            [['thumbnail', 'image'], 'string', 'max' => 300],
            [['image_description'], 'string', 'max' => 2000],
            [['name', 'tel', 'address', 'website', 'budget', 'open', 'close', 'street', 'city', 'country'], 'string', 'max' => 255],
            [['description', 'map'], 'string', 'max' => 1000],
            [['default_duration', 'category_id', 'type', 'status', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => FHtml::t('TravelAttractions', 'ID'),
            'thumbnail' => FHtml::t('TravelAttractions', 'Thumbnail'),
            'image' => FHtml::t('TravelAttractions', 'Image'),
            'image_description' => FHtml::t('TravelAttractions', 'Image Description'),
            'name' => FHtml::t('TravelAttractions', 'Name'),
            'description' => FHtml::t('TravelAttractions', 'Description'),
            'content' => FHtml::t('TravelAttractions', 'Content'),
            'note' => FHtml::t('TravelAttractions', 'Note'),
            'tel' => FHtml::t('TravelAttractions', 'Tel'),
            'address' => FHtml::t('TravelAttractions', 'Address'),
            'website' => FHtml::t('TravelAttractions', 'Website'),
            'map' => FHtml::t('TravelAttractions', 'Map'),
            'rate' => FHtml::t('TravelAttractions', 'Rate'),
            'score' => FHtml::t('TravelAttractions', 'Score'),
            'budget' => FHtml::t('TravelAttractions', 'Budget'),
            'default_duration' => FHtml::t('TravelAttractions', 'Default Duration'),
            'sort_order' => FHtml::t('TravelAttractions', 'Sort Order'),
            'lat' => FHtml::t('TravelAttractions', 'Lat'),
            'long' => FHtml::t('TravelAttractions', 'Long'),
            'open' => FHtml::t('TravelAttractions', 'Open'),
            'close' => FHtml::t('TravelAttractions', 'Close'),
            'street' => FHtml::t('TravelAttractions', 'Street'),
            'city' => FHtml::t('TravelAttractions', 'City'),
            'country' => FHtml::t('TravelAttractions', 'Country'),
            'category_id' => FHtml::t('TravelAttractions', 'Category ID'),
            'type' => FHtml::t('TravelAttractions', 'Type'),
            'status' => FHtml::t('TravelAttractions', 'Status'),
            'is_active' => FHtml::t('TravelAttractions', 'Is Active'),
            'is_new' => FHtml::t('TravelAttractions', 'Is New'),
            'is_hot' => FHtml::t('TravelAttractions', 'Is Hot'),
            'created_date' => FHtml::t('TravelAttractions', 'Created Date'),
            'created_user' => FHtml::t('TravelAttractions', 'Created User'),
            'modified_date' => FHtml::t('TravelAttractions', 'Modified Date'),
            'modified_user' => FHtml::t('TravelAttractions', 'Modified User'),
            'application_id' => FHtml::t('TravelAttractions', 'Application ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return TravelAttractionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TravelAttractionsQuery(get_called_class());
    }
}
