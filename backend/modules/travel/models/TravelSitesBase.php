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
 * This is the model class for table "travel_sites".
 *
 * @property integer $id
 * @property string $city
 * @property string $keywords
 * @property string $name
 * @property string $url
 * @property integer $weight
 * @property string $search_content
 * @property string $search_element
 * @property string $search_result
 * @property integer $is_active
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class TravelSitesBase extends BaseModel //\yii\db\ActiveRecord
{

// id, city, keywords, name, url, weight, search_content, search_element, search_result, is_active, created_date, created_user, modified_date, modified_user, application_id
    const COLUMN_ID = 'id';
    const COLUMN_CITY = 'city';
    const COLUMN_KEYWORDS = 'keywords';
    const COLUMN_NAME = 'name';
    const COLUMN_URL = 'url';
    const COLUMN_WEIGHT = 'weight';
    const COLUMN_SEARCH_CONTENT = 'search_content';
    const COLUMN_SEARCH_ELEMENT = 'search_element';
    const COLUMN_SEARCH_RESULT = 'search_result';
    const COLUMN_IS_ACTIVE = 'is_active';
    const COLUMN_CREATED_DATE = 'created_date';
    const COLUMN_CREATED_USER = 'created_user';
    const COLUMN_MODIFIED_DATE = 'modified_date';
    const COLUMN_MODIFIED_USER = 'modified_user';
    const COLUMN_APPLICATION_ID = 'application_id';

    /**
     * @inheritdoc
     */
    public $tableName = 'travel_sites';

    public static function tableName()
    {
        return 'travel_sites';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['weight'], 'integer'],
            [['search_content'], 'string'],
            [['created_date', 'modified_date'], 'safe'],
            [['is_active'], 'integer'],
            [['city', 'keywords', 'application_id'], 'string', 'max' => 100],
            [['name', 'search_element'], 'string', 'max' => 255],
            [['url'], 'string', 'max' => 2000],
            [['search_result'], 'string', 'max' => 10000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => FHtml::t('TravelSites', 'ID'),
            'city' => FHtml::t('TravelSites', 'City'),
            'keywords' => FHtml::t('TravelSites', 'Keywords'),
            'name' => FHtml::t('TravelSites', 'Name'),
            'url' => FHtml::t('TravelSites', 'Url'),
            'weight' => FHtml::t('TravelSites', 'Weight'),
            'search_content' => FHtml::t('TravelSites', 'Search Content'),
            'search_element' => FHtml::t('TravelSites', 'Search Element'),
            'search_result' => FHtml::t('TravelSites', 'Search Result'),
            'is_active' => FHtml::t('TravelSites', 'Is Active'),
            'created_date' => FHtml::t('TravelSites', 'Created Date'),
            'created_user' => FHtml::t('TravelSites', 'Created User'),
            'modified_date' => FHtml::t('TravelSites', 'Modified Date'),
            'modified_user' => FHtml::t('TravelSites', 'Modified User'),
            'application_id' => FHtml::t('TravelSites', 'Application ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return TravelSitesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TravelSitesQuery(get_called_class());
    }
}
