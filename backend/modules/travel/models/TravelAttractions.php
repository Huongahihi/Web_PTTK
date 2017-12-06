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
 * This is the customized model class for table "travel_attractions".
 */
class TravelAttractions extends TravelAttractionsBase //\yii\db\ActiveRecord
{
    const LOOKUP = [        'category_id' => [['id' => TravelAttractions::CATEGORY_ID_ADVENTURE, 'name' => 'Adventure'], ['id' => TravelAttractions::CATEGORY_ID_FAMILY, 'name' => 'Family'], ['id' => TravelAttractions::CATEGORY_ID_LEISURE, 'name' => 'Leisure'], ['id' => TravelAttractions::CATEGORY_ID_ENTERTAINMENT, 'name' => 'Entertainment'], ['id' => TravelAttractions::CATEGORY_ID_FOOD, 'name' => 'Food'], ['id' => TravelAttractions::CATEGORY_ID_HISTORICAL, 'name' => 'Historical'], ['id' => TravelAttractions::CATEGORY_ID_OUTDOORS, 'name' => 'Outdoors'], ['id' => TravelAttractions::CATEGORY_ID_MUSEUMS, 'name' => 'Museums'], ['id' => TravelAttractions::CATEGORY_ID_ART, 'name' => 'Art'], ['id' => TravelAttractions::CATEGORY_ID_MUST_SEE, 'name' => 'Must_See'], ],
        'type' => [['id' => TravelAttractions::TYPE_LOCATION, 'name' => 'LOCATION'], ['id' => TravelAttractions::TYPE_RESTAURANT, 'name' => 'RESTAURANT'], ['id' => TravelAttractions::TYPE_HOTEL, 'name' => 'HOTEL'], ],
];

    const COLUMNS_UPLOAD = ['thumbnail','image'];

    public $order_by = 'sort_order asc,is_active desc,is_hot desc,created_date desc,';

    const OBJECTS_RELATED = ['product'];
    const OBJECTS_META = [];
    const COLUMNS = [
        'api' => ['id', 'thumbnail', 'image', 'image_description', 'name', 'description', 'content', 'note', 'tel', 'address', 'website', 'map', 'rate', 'score', 'budget', 'default_duration', 'sort_order', 'lat', 'long', 'open', 'close', 'street', 'city', 'country', 'category_id', 'type', 'status', 'is_active', 'is_new', 'is_hot', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id', ],
        'all' => ['id', 'thumbnail', 'image', 'image_description', 'name', 'description', 'content', 'note', 'tel', 'address', 'website', 'map', 'rate', 'score', 'budget', 'default_duration', 'sort_order', 'lat', 'long', 'open', 'close', 'street', 'city', 'country', 'category_id', 'type', 'status', 'is_active', 'is_new', 'is_hot', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id',  'objectAttributes', 'objectFile', 'objectCategories'],
        '+' => [  'objectAttributes', 'objectFile', 'objectCategories']
    ];


    // Related Object: music_song
    public $product;

    public function getProduct() {
        if (!isset($this->product))
            $this->product = FHtml::getRelatedModels($this->getTableName(), $this->id, 'product', '');

        return $this->product;
    }

    public function setProduct($value) {
        $this->product = $value;
    }

    public function prepareCustomFields() {
        parent::prepareCustomFields();

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
        $i18n->translations['TravelAttractions*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/messages',
            'fileMap' => [
                'TravelAttractions' => 'TravelAttractions.php',
            ],
        ];
    }

    public function toViewModel() {
    $model = new ViewModel();
            FHtml::setFieldValue($model, ['id'], $this->id);
            FHtml::setFieldValue($model, ['thumbnail'], $this->thumbnail);
            FHtml::setFieldValue($model, ['image'], $this->image);
            FHtml::setFieldValue($model, ['image_description'], $this->image_description);
            FHtml::setFieldValue($model, ['name'], $this->name);
            FHtml::setFieldValue($model, ['description'], $this->description);
            FHtml::setFieldValue($model, ['content'], $this->content);
            FHtml::setFieldValue($model, ['note'], $this->note);
            FHtml::setFieldValue($model, ['tel'], $this->tel);
            FHtml::setFieldValue($model, ['address'], $this->address);
            FHtml::setFieldValue($model, ['website'], $this->website);
            FHtml::setFieldValue($model, ['map'], $this->map);
            FHtml::setFieldValue($model, ['rate'], $this->rate);
            FHtml::setFieldValue($model, ['score'], $this->score);
            FHtml::setFieldValue($model, ['budget'], $this->budget);
            FHtml::setFieldValue($model, ['default_duration'], $this->default_duration);
            FHtml::setFieldValue($model, ['sort_order'], $this->sort_order);
            FHtml::setFieldValue($model, ['lat'], $this->lat);
            FHtml::setFieldValue($model, ['long'], $this->long);
            FHtml::setFieldValue($model, ['open'], $this->open);
            FHtml::setFieldValue($model, ['close'], $this->close);
            FHtml::setFieldValue($model, ['street'], $this->street);
            FHtml::setFieldValue($model, ['city'], $this->city);
            FHtml::setFieldValue($model, ['country'], $this->country);
            FHtml::setFieldValue($model, ['category_id'], $this->category_id);
            FHtml::setFieldValue($model, ['type'], $this->type);
            FHtml::setFieldValue($model, ['status'], $this->status);
            FHtml::setFieldValue($model, ['is_active'], $this->is_active);
            FHtml::setFieldValue($model, ['is_new'], $this->is_new);
            FHtml::setFieldValue($model, ['is_hot'], $this->is_hot);
            FHtml::setFieldValue($model, ['created_date'], $this->created_date);
            FHtml::setFieldValue($model, ['created_user'], $this->created_user);
            FHtml::setFieldValue($model, ['modified_date'], $this->modified_date);
            FHtml::setFieldValue($model, ['modified_user'], $this->modified_user);
            FHtml::setFieldValue($model, ['application_id'], $this->application_id);
        return $model;
    }
}
