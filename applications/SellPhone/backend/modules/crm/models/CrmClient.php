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
 * This is the customized model class for table "crm_client".
 */
class CrmClient extends CrmClientBase //\yii\db\ActiveRecord
{
    const LOOKUP = [        'region' => [
		['id' => CrmClient::REGION_US, 'name' => 'US'],
 	['id' => CrmClient::REGION_EU, 'name' => 'EU'],
 	['id' => CrmClient::REGION_JP_KR, 'name' => 'JP-KR'],
 	['id' => CrmClient::REGION_ARAB, 'name' => 'ARAB'],
 	['id' => CrmClient::REGION_ASIAN, 'name' => 'ASIAN'],
 	['id' => CrmClient::REGION_AFRICA, 'name' => 'AFRICA'],
 	['id' => CrmClient::REGION_INDIA, 'name' => 'INDIA'],
 ],
];

    const COLUMNS_UPLOAD = ['image',];

    public $order_by = 'is_active desc,created_date desc,';

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
        
            [['id', 'image', 'code', 'name', 'description', 'content', 'start_date', 'contact_name', 'contact_title', 'mobile', 'website', 'address', 'address2', 'phone', 'email', 'fax', 'company', 'business_license', 'tax_code', 'payment_info', 'payment_term', 'zip_code', 'city', 'country', 'region', 'note', 'tags', 'is_active', 'type', 'status', 'sale_user', 'ip_address', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['name'], 'required'],
            [['content', 'note'], 'string'],
            [['is_active'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['image'], 'string', 'max' => 300],
            [['code', 'name', 'contact_name', 'mobile', 'website', 'address', 'address2', 'phone', 'email', 'fax', 'company', 'business_license', 'tax_code', 'zip_code', 'city', 'country', 'ip_address'], 'string', 'max' => 255],
            [['description', 'payment_info', 'payment_term'], 'string', 'max' => 2000],
            [['start_date'], 'string', 'max' => 18],
            [['contact_title', 'region', 'type', 'status', 'sale_user', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
            [['tags'], 'string', 'max' => 4000],
        ];
    }




    public function prepareCustomFields() {
        parent::prepareCustomFields();

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


}
