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
 * This is the customized model class for table "travel_sites".
 */
class TravelSites extends TravelSitesBase //\yii\db\ActiveRecord
{
    const LOOKUP = [];

    const COLUMNS_UPLOAD = [];

    public $order_by = 'is_active desc,created_date desc,';

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];
    const COLUMNS = [
        'api' => ['id', 'city', 'keywords', 'name', 'url', 'weight', 'search_content', 'search_element', 'search_result', 'is_active', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id',],
        'all' => ['id', 'city', 'keywords', 'name', 'url', 'weight', 'search_content', 'search_element', 'search_result', 'is_active', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id', 'objectAttributes', 'objectFile', 'objectCategories'],
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
        return [];
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
        $i18n->translations['TravelSites*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/messages',
            'fileMap' => [
                'TravelSites' => 'TravelSites.php',
            ],
        ];
    }

    public function toViewModel()
    {
        $model = new ViewModel();
        FHtml::setFieldValue($model, ['id'], $this->id);
        FHtml::setFieldValue($model, ['city'], $this->city);
        FHtml::setFieldValue($model, ['keywords'], $this->keywords);
        FHtml::setFieldValue($model, ['name'], $this->name);
        FHtml::setFieldValue($model, ['url'], $this->url);
        FHtml::setFieldValue($model, ['weight'], $this->weight);
        FHtml::setFieldValue($model, ['search_content'], $this->search_content);
        FHtml::setFieldValue($model, ['search_element'], $this->search_element);
        FHtml::setFieldValue($model, ['search_result'], $this->search_result);
        FHtml::setFieldValue($model, ['is_active'], $this->is_active);
        FHtml::setFieldValue($model, ['created_date'], $this->created_date);
        FHtml::setFieldValue($model, ['created_user'], $this->created_user);
        FHtml::setFieldValue($model, ['modified_date'], $this->modified_date);
        FHtml::setFieldValue($model, ['modified_user'], $this->modified_user);
        FHtml::setFieldValue($model, ['application_id'], $this->application_id);
        return $model;
    }
}
