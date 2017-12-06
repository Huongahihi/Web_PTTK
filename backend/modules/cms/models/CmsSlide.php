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
 * This is the customized model class for table "cms_slide".
 */
class CmsSlide extends CmsSlideBase //\yii\db\ActiveRecord
{
    const LOOKUP = [];

    const COLUMNS_UPLOAD = ['image',];

    public $order_by = 'sort_order asc,is_active desc,';

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
        
            [['id', 'image', 'name', 'overview', 'transition_type', 'transition_speed', 'alignment', 'lang', 'url1_label', 'url1_link', 'url2_label', 'url2_link', 'url3_label', 'url3_link', 'sort_order', 'is_active', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['name'], 'required'],
            [['sort_order', 'is_active'], 'integer'],
            [['image'], 'string', 'max' => 300],
            [['name', 'url1_label', 'url1_link', 'url2_label', 'url2_link', 'url3_label', 'url3_link'], 'string', 'max' => 255],
            [['overview'], 'string', 'max' => 1000],
            [['transition_type', 'transition_speed', 'alignment'], 'string', 'max' => 50],
            [['lang'], 'string', 'max' => 20],
            [['application_id'], 'string', 'max' => 100],
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
