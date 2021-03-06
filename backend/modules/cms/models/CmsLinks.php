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
 * This is the customized model class for table "cms_links".
 */
class CmsLinks extends CmsLinksBase //\yii\db\ActiveRecord
{
    const LOOKUP = [];

    const COLUMNS_UPLOAD = ['image',];

    public $order_by = 'sort_order asc,created_date desc,';

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
        
            [['id', 'image', 'link_url', 'title', 'category_id', 'content', 'type', 'sort_order', 'created_user', 'created_date', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['link_url', 'title'], 'required'],
            [['category_id', 'sort_order'], 'integer'],
            [['content'], 'string'],
            [['created_date'], 'safe'],
            [['image'], 'string', 'max' => 300],
            [['link_url', 'title'], 'string', 'max' => 255],
            [['type', 'created_user', 'application_id'], 'string', 'max' => 100],
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
