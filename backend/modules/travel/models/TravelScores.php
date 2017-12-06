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
 * This is the customized model class for table "travel_scores".
 */
class TravelScores extends TravelScoresBase //\yii\db\ActiveRecord
{
    const LOOKUP = [];

    const COLUMNS_UPLOAD = [];

    public $order_by = 'attraction_id asc';

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];
    const COLUMNS = [
        'api' => ['id', 'name', 'attraction_id', 'site_id', 'is_active', 'rank', 'weight', 'score', 'created_date', ],
        'all' => ['id', 'name', 'attraction_id', 'site_id', 'is_active', 'rank', 'weight', 'score', 'created_date',  'objectAttributes', 'objectFile', 'objectCategories'],
        '+' => ['attraction', 'site',   'objectAttributes', 'objectFile', 'objectCategories']
    ];

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
        
            [['id', 'name', 'attraction_id', 'site_id', 'is_active', 'rank', 'weight', 'score', 'created_date'], 'filter', 'filter' => 'trim'],
            [['attraction_id'], 'required'],
            [['attraction_id', 'site_id', 'is_active', 'rank', 'weight'], 'integer'],
            [['score'], 'number'],
            [['created_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
                    'id' => FHtml::t('TravelScores', 'ID'),
                    'name' => FHtml::t('TravelScores', 'Name'),
                    'attraction_id' => FHtml::t('TravelScores', 'Attraction ID'),
                    'site_id' => FHtml::t('TravelScores', 'Site ID'),
                    'is_active' => FHtml::t('TravelScores', 'Is Active'),
                    'rank' => FHtml::t('TravelScores', 'Rank'),
                    'weight' => FHtml::t('TravelScores', 'Weight'),
                    'score' => FHtml::t('TravelScores', 'Score'),
                    'created_date' => FHtml::t('TravelScores', 'Created Date'),
                ];
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

    // Lookup Object: site\n
    public $site;
    public function getSite() {
        if (!isset($this->site))
        $this->site = FHtml::getModel('travel_sites', '', $this->site_id, '', false);

        return $this->site;
    }
    public function setSite($value) {
        $this->site = $value;
    }


    public function prepareCustomFields() {
        parent::prepareCustomFields();

        $this->attraction = self::getAttraction();
        $this->site = self::getSite();
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
        $i18n->translations['TravelScores*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/messages',
            'fileMap' => [
                'TravelScores' => 'TravelScores.php',
            ],
        ];
    }

    public function toViewModel() {
    $model = new ViewModel();
            FHtml::setFieldValue($model, ['id'], $this->id);
            FHtml::setFieldValue($model, ['name'], $this->name);
            FHtml::setFieldValue($model, ['attraction_id'], $this->attraction_id);
            FHtml::setFieldValue($model, ['site_id'], $this->site_id);
            FHtml::setFieldValue($model, ['is_active'], $this->is_active);
            FHtml::setFieldValue($model, ['rank'], $this->rank);
            FHtml::setFieldValue($model, ['weight'], $this->weight);
            FHtml::setFieldValue($model, ['score'], $this->score);
            FHtml::setFieldValue($model, ['created_date'], $this->created_date);
        return $model;
    }
}
