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
 * This is the customized model class for table "cms_faq".
 */
class CmsFaq extends CmsFaqBase //\yii\db\ActiveRecord
{
    const LOOKUP = [        'type' => [
		['id' => CmsFaq::TYPE_COMMON, 'name' => 'COMMON'],
 	['id' => CmsFaq::TYPE_PURCHASE, 'name' => 'PURCHASE'],
 	['id' => CmsFaq::TYPE_SUPPORT, 'name' => 'SUPPORT'],
 ],
];

    const COLUMNS_UPLOAD = [];

    public $order_by = 'sort_order asc,is_active desc,is_top desc,created_date desc,';

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
        
            [['id', 'name', 'content', 'type', 'sort_order', 'lang', 'is_active', 'is_top', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['name'], 'required'],
            [['content'], 'string'],
            [['sort_order', 'is_active', 'is_top'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['type', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
            [['lang'], 'string', 'max' => 50],
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
