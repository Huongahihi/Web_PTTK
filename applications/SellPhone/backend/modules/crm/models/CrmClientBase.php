<?php

namespace backend\modules\crm\models;

use Yii;
use common\components\FHtml;
use common\components\FModel;
use common\models\BaseModel;
use frontend\models\ViewModel;
use yii\helpers\ArrayHelper;


/**
* Developed by Hung Ho (Steve): hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the model class for table "crm_client".
 *

 * @property string $id
 * @property string $image
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $content
 * @property string $start_date
 * @property string $contact_name
 * @property string $contact_title
 * @property string $mobile
 * @property string $website
 * @property string $address
 * @property string $address2
 * @property string $phone
 * @property string $email
 * @property string $fax
 * @property string $company
 * @property string $business_license
 * @property string $tax_code
 * @property string $payment_info
 * @property string $payment_term
 * @property string $zip_code
 * @property string $city
 * @property string $country
 * @property string $region
 * @property string $note
 * @property string $tags
 * @property integer $is_active
 * @property string $type
 * @property string $status
 * @property string $sale_user
 * @property string $ip_address
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class CrmClientBase extends BaseModel //\yii\db\ActiveRecord
{
    const REGION_US = 'US';
    const REGION_EU = 'EU';
    const REGION_JP_KR = 'JP-KR';
    const REGION_ARAB = 'ARAB';
    const REGION_ASIAN = 'ASIAN';
    const REGION_AFRICA = 'AFRICA';
    const REGION_INDIA = 'INDIA';

    /**
    * @inheritdoc
    */
    public $tableName = 'crm_client';

    public static function tableName()
    {
        return 'crm_client';
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
                    'id' => FHtml::t('CrmClient', 'ID'),
                    'image' => FHtml::t('CrmClient', 'Image'),
                    'code' => FHtml::t('CrmClient', 'Code'),
                    'name' => FHtml::t('CrmClient', 'Name'),
                    'description' => FHtml::t('CrmClient', 'Description'),
                    'content' => FHtml::t('CrmClient', 'Content'),
                    'start_date' => FHtml::t('CrmClient', 'Start Date'),
                    'contact_name' => FHtml::t('CrmClient', 'Contact Name'),
                    'contact_title' => FHtml::t('CrmClient', 'Contact Title'),
                    'mobile' => FHtml::t('CrmClient', 'Mobile'),
                    'website' => FHtml::t('CrmClient', 'Website'),
                    'address' => FHtml::t('CrmClient', 'Address'),
                    'address2' => FHtml::t('CrmClient', 'Address2'),
                    'phone' => FHtml::t('CrmClient', 'Phone'),
                    'email' => FHtml::t('CrmClient', 'Email'),
                    'fax' => FHtml::t('CrmClient', 'Fax'),
                    'company' => FHtml::t('CrmClient', 'Company'),
                    'business_license' => FHtml::t('CrmClient', 'Business License'),
                    'tax_code' => FHtml::t('CrmClient', 'Tax Code'),
                    'payment_info' => FHtml::t('CrmClient', 'Payment Info'),
                    'payment_term' => FHtml::t('CrmClient', 'Payment Term'),
                    'zip_code' => FHtml::t('CrmClient', 'Zip Code'),
                    'city' => FHtml::t('CrmClient', 'City'),
                    'country' => FHtml::t('CrmClient', 'Country'),
                    'region' => FHtml::t('CrmClient', 'Region'),
                    'note' => FHtml::t('CrmClient', 'Note'),
                    'tags' => FHtml::t('CrmClient', 'Tags'),
                    'is_active' => FHtml::t('CrmClient', 'Is Active'),
                    'type' => FHtml::t('CrmClient', 'Type'),
                    'status' => FHtml::t('CrmClient', 'Status'),
                    'sale_user' => FHtml::t('CrmClient', 'Sale User'),
                    'ip_address' => FHtml::t('CrmClient', 'Ip Address'),
                    'created_date' => FHtml::t('CrmClient', 'Created Date'),
                    'created_user' => FHtml::t('CrmClient', 'Created User'),
                    'modified_date' => FHtml::t('CrmClient', 'Modified Date'),
                    'modified_user' => FHtml::t('CrmClient', 'Modified User'),
                    'application_id' => FHtml::t('CrmClient', 'Application ID'),
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
        $i18n->translations['CrmClient*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/crm/messages',
            'fileMap' => [
                'CrmClient' => 'CrmClient.php',
            ],
        ];
    }



}
