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
 * This is the customized model class for table "cms_page".
 */
class CmsPage extends CmsPageBase //\yii\db\ActiveRecord
{
    const LOOKUP = [];

    const COLUMNS_UPLOAD = ['image','page_image',];

    public $order_by = 'sort_order asc,is_active desc,created_date desc,';

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
        
            [['id', 'code', 'image', 'name', 'description', 'content', 'keywords', 'page_image', 'page_title', 'page_slug', 'page_description', 'page_content', 'page_width', 'page_background', 'body_css', 'body_style', 'page_style', 'page_script', 'views_count', 'is_active', 'sort_order', 'created_date', 'created_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['name'], 'required'],
            [['content', 'page_content', 'page_style', 'page_script'], 'string'],
            [['views_count', 'is_active', 'sort_order'], 'integer'],
            [['created_date'], 'safe'],
            [['code', 'name', 'page_title', 'page_slug', 'page_width', 'page_background', 'body_css', 'body_style'], 'string', 'max' => 255],
            [['image', 'page_image'], 'string', 'max' => 300],
            [['description', 'page_description'], 'string', 'max' => 2000],
            [['keywords'], 'string', 'max' => 500],
            [['created_user', 'application_id'], 'string', 'max' => 100],
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
