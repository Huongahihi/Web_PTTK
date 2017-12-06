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
 * This is the customized model class for table "travel_distance".
 */
class TravelDistance extends TravelDistanceBase //\yii\db\ActiveRecord
{
    const LOOKUP = [];

    const COLUMNS_UPLOAD = [];

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];
    const COLUMNS = [
        'api' => ['id', 'from_id', 'from_lat', 'from_long', 'to_id', 'to_lat', 'to_long', 'distance', 'time', 'transport',],
        'all' => ['id', 'from_id', 'from_lat', 'from_long', 'to_id', 'to_lat', 'to_long', 'distance', 'time', 'transport', 'objectAttributes', 'objectFile', 'objectCategories'],
        '+' => ['objectAttributes', 'objectFile', 'objectCategories']
    ];


    public function prepareCustomFields()
    {
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

    public static function getLookupArray($column)
    {
        if (key_exists($column, self::LOOKUP))
            return self::LOOKUP[$column];
    }

    public static function getRelatedObjects()
    {
        return self::OBJECTS_RELATED;
    }

    public static function getMetaObjects()
    {
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
        $i18n->translations['TravelDistance*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/messages',
            'fileMap' => [
                'TravelDistance' => 'TravelDistance.php',
            ],
        ];
    }

    public function toViewModel()
    {
        $model = new ViewModel();
        FHtml::setFieldValue($model, ['id'], $this->id);
        FHtml::setFieldValue($model, ['from_id'], $this->from_id);
        FHtml::setFieldValue($model, ['from_lat'], $this->from_lat);
        FHtml::setFieldValue($model, ['from_long'], $this->from_long);
        FHtml::setFieldValue($model, ['to_id'], $this->to_id);
        FHtml::setFieldValue($model, ['to_lat'], $this->to_lat);
        FHtml::setFieldValue($model, ['to_long'], $this->to_long);
        FHtml::setFieldValue($model, ['distance'], $this->distance);
        FHtml::setFieldValue($model, ['time'], $this->time);
        FHtml::setFieldValue($model, ['transport'], $this->transport);
        return $model;
    }
}
