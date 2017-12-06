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
 * This is the customized model class for table "provider".
 */
class Provider extends ProviderBase //\yii\db\ActiveRecord
{
    const LOOKUP = [        'type' => [
		['id' => Provider::TYPE_AUTHOR, 'name' => 'Author'],
 	['id' => Provider::TYPE_PARTNER, 'name' => 'Partner'],
 	['id' => Provider::TYPE_DISTRIBUTOR, 'name' => 'Distributor'],
 	['id' => Provider::TYPE_MANUFACTURER, 'name' => 'Manufacturer'],
 ],
        'status' => [
		['id' => Provider::STATUS_NEW, 'name' => 'New'],
 	['id' => Provider::STATUS_VIP, 'name' => 'VIP'],
 	['id' => Provider::STATUS_PARTNER, 'name' => 'Partner'],
 	['id' => Provider::STATUS_NORMAL, 'name' => 'Normal'],
 	['id' => Provider::STATUS_CLOSED, 'name' => 'Closed'],
 ],
];

    const COLUMNS_UPLOAD = ['image',];

    public $order_by = 'sort_order asc,is_top desc,is_active desc,created_date desc,';

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];

    public static function getLookupArray($column) {
        if (key_exists($column, self::LOOKUP))
            return self::LOOKUP[$column];
        return [];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
        
            [['id', 'image', 'code', 'name', 'description', 'content', 'start_date', 'contact_name', 'phone', 'email', 'address', 'website', 'city', 'country', 'lat', 'long', 'rate', 'type', 'status', 'is_top', 'is_active', 'sort_order', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['name'], 'required'],
            [['content'], 'string'],
            [['lat', 'long'], 'number'],
            [['rate', 'is_top', 'is_active', 'sort_order'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['image'], 'string', 'max' => 300],
            [['code', 'name', 'start_date', 'contact_name', 'phone', 'email', 'website'], 'string', 'max' => 255],
            [['description', 'address'], 'string', 'max' => 2000],
            [['city', 'country', 'type', 'status', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
        ];
    }




    public function prepareCustomFields() {
        parent::prepareCustomFields();

    }


    public static function getRelatedObjects() {
        return self::OBJECTS_RELATED;
    }

    public static function getMetaObjects() {
        return self::OBJECTS_META;
    }
}
