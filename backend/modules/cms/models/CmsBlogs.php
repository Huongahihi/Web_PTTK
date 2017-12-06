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
 * This is the customized model class for table "cms_blogs".
 */
class CmsBlogs extends CmsBlogsBase //\yii\db\ActiveRecord
{
    const LOOKUP = [];

    const COLUMNS_UPLOAD = ['thumbnail','image','banner',];

    public $order_by = 'is_active desc,is_top desc,is_hot desc,created_date desc,';

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
        
            [['id', 'thumbnail', 'image', 'banner', 'code', 'name', 'overview', 'content', 'type', 'status', 'category_id', 'is_active', 'lang', 'tags', 'linkurl', 'author', 'is_top', 'is_new', 'is_hot', 'count_views', 'count_comments', 'count_likes', 'count_rates', 'rates', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['name'], 'required'],
            [['content'], 'string'],
            [['is_active', 'is_top', 'is_new', 'is_hot', 'count_views', 'count_comments', 'count_likes', 'count_rates', 'rates'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['thumbnail', 'image', 'banner'], 'string', 'max' => 300],
            [['code', 'name', 'linkurl', 'author'], 'string', 'max' => 255],
            [['overview'], 'string', 'max' => 2000],
            [['type', 'status', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
            [['category_id'], 'string', 'max' => 500],
            [['lang'], 'string', 'max' => 50],
            [['tags'], 'string', 'max' => 1000],
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
