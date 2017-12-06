<?php

namespace backend\modules\cms\models;

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
 * This is the model class for table "cms_contact".
 *

 * @property integer $id
 * @property string $avatar
 * @property string $name
 * @property string $overview
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $linkurl
 * @property string $live_chat
 * @property string $skype
 * @property string $facebook
 * @property string $map_url
 * @property string $city
 * @property string $country
 * @property integer $lat
 * @property integer $long
 * @property string $type
 * @property integer $sort_order
 * @property integer $is_online
 * @property integer $is_top
 * @property integer $is_active
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class CmsContactBase extends BaseModel //\yii\db\ActiveRecord
{
    const TYPE_SALE = 'sale';
    const TYPE_TECH = 'tech';
    const TYPE_SUPPORT = 'support';
    const TYPE_PARTNER = 'partner';

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_contact';

    public static function tableName()
    {
        return 'cms_contact';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return FHtml::currentDb();
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
                    'id' => FHtml::t('CmsContact', 'ID'),
                    'avatar' => FHtml::t('CmsContact', 'Avatar'),
                    'name' => FHtml::t('CmsContact', 'Name'),
                    'overview' => FHtml::t('CmsContact', 'Overview'),
                    'phone' => FHtml::t('CmsContact', 'Phone'),
                    'email' => FHtml::t('CmsContact', 'Email'),
                    'address' => FHtml::t('CmsContact', 'Address'),
                    'linkurl' => FHtml::t('CmsContact', 'Linkurl'),
                    'live_chat' => FHtml::t('CmsContact', 'Live Chat'),
                    'skype' => FHtml::t('CmsContact', 'Skype'),
                    'facebook' => FHtml::t('CmsContact', 'Facebook'),
                    'map_url' => FHtml::t('CmsContact', 'Map Url'),
                    'city' => FHtml::t('CmsContact', 'City'),
                    'country' => FHtml::t('CmsContact', 'Country'),
                    'lat' => FHtml::t('CmsContact', 'Lat'),
                    'long' => FHtml::t('CmsContact', 'Long'),
                    'type' => FHtml::t('CmsContact', 'Type'),
                    'sort_order' => FHtml::t('CmsContact', 'Sort Order'),
                    'is_online' => FHtml::t('CmsContact', 'Is Online'),
                    'is_top' => FHtml::t('CmsContact', 'Is Top'),
                    'is_active' => FHtml::t('CmsContact', 'Is Active'),
                    'created_date' => FHtml::t('CmsContact', 'Created Date'),
                    'created_user' => FHtml::t('CmsContact', 'Created User'),
                    'modified_date' => FHtml::t('CmsContact', 'Modified Date'),
                    'modified_user' => FHtml::t('CmsContact', 'Modified User'),
                    'application_id' => FHtml::t('CmsContact', 'Application ID'),
                ];
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
        $i18n->translations['CmsContact*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsContact' => 'CmsContact.php',
            ],
        ];
    }



}
