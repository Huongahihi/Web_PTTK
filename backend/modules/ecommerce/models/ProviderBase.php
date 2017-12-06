<?php

namespace backend\modules\ecommerce\models;

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
 * This is the model class for table "provider".
 *

 * @property integer $id
 * @property string $image
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $content
 * @property string $start_date
 * @property string $contact_name
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $website
 * @property string $city
 * @property string $country
 * @property double $lat
 * @property double $long
 * @property integer $rate
 * @property string $type
 * @property string $status
 * @property integer $is_top
 * @property integer $is_active
 * @property integer $sort_order
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class ProviderBase extends BaseModel //\yii\db\ActiveRecord
{
    const TYPE_AUTHOR = 'Author';
    const TYPE_PARTNER = 'Partner';
    const TYPE_DISTRIBUTOR = 'Distributor';
    const TYPE_MANUFACTURER = 'Manufacturer';
    const STATUS_NEW = 'New';
    const STATUS_VIP = 'VIP';
    const STATUS_PARTNER = 'Partner';
    const STATUS_NORMAL = 'Normal';
    const STATUS_CLOSED = 'Closed';

    /**
    * @inheritdoc
    */
    public $tableName = 'provider';

    public static function tableName()
    {
        return 'provider';
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
                    'id' => FHtml::t('Provider', 'ID'),
                    'image' => FHtml::t('Provider', 'Image'),
                    'code' => FHtml::t('Provider', 'Code'),
                    'name' => FHtml::t('Provider', 'Name'),
                    'description' => FHtml::t('Provider', 'Description'),
                    'content' => FHtml::t('Provider', 'Content'),
                    'start_date' => FHtml::t('Provider', 'Start Date'),
                    'contact_name' => FHtml::t('Provider', 'Contact Name'),
                    'phone' => FHtml::t('Provider', 'Phone'),
                    'email' => FHtml::t('Provider', 'Email'),
                    'address' => FHtml::t('Provider', 'Address'),
                    'website' => FHtml::t('Provider', 'Website'),
                    'city' => FHtml::t('Provider', 'City'),
                    'country' => FHtml::t('Provider', 'Country'),
                    'lat' => FHtml::t('Provider', 'Lat'),
                    'long' => FHtml::t('Provider', 'Long'),
                    'rate' => FHtml::t('Provider', 'Rate'),
                    'type' => FHtml::t('Provider', 'Type'),
                    'status' => FHtml::t('Provider', 'Status'),
                    'is_top' => FHtml::t('Provider', 'Is Top'),
                    'is_active' => FHtml::t('Provider', 'Is Active'),
                    'sort_order' => FHtml::t('Provider', 'Sort Order'),
                    'created_date' => FHtml::t('Provider', 'Created Date'),
                    'created_user' => FHtml::t('Provider', 'Created User'),
                    'modified_date' => FHtml::t('Provider', 'Modified Date'),
                    'modified_user' => FHtml::t('Provider', 'Modified User'),
                    'application_id' => FHtml::t('Provider', 'Application ID'),
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
        $i18n->translations['Provider*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/ecommerce/messages',
            'fileMap' => [
                'Provider' => 'Provider.php',
            ],
        ];
    }



}
