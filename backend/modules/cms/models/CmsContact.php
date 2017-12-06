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
 * This is the customized model class for table "cms_contact".
 */
class CmsContact extends CmsContactBase //\yii\db\ActiveRecord
{
    const LOOKUP = [        'type' => [
		['id' => CmsContact::TYPE_SALE, 'name' => 'sale'],
 	['id' => CmsContact::TYPE_TECH, 'name' => 'tech'],
 	['id' => CmsContact::TYPE_SUPPORT, 'name' => 'support'],
 	['id' => CmsContact::TYPE_PARTNER, 'name' => 'partner'],
 ],
];

    const COLUMNS_UPLOAD = ['avatar',];

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
        
            [['id', 'avatar', 'name', 'overview', 'phone', 'email', 'address', 'linkurl', 'live_chat', 'skype', 'facebook', 'map_url', 'city', 'country', 'lat', 'long', 'type', 'sort_order', 'is_online', 'is_top', 'is_active', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['id', 'name'], 'required'],
            [['id', 'lat', 'long', 'sort_order', 'is_online', 'is_top', 'is_active'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['avatar'], 'string', 'max' => 300],
            [['name', 'phone', 'email', 'address', 'linkurl', 'skype', 'facebook'], 'string', 'max' => 255],
            [['overview'], 'string', 'max' => 1000],
            [['live_chat', 'map_url'], 'string', 'max' => 2000],
            [['city', 'country', 'type', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
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
