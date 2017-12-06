<?php

namespace backend\modules\book\models;

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
 * This is the customized model class for table "book".
 */
class Book extends BookBase //\yii\db\ActiveRecord
{
    const LOOKUP = [];

    const COLUMNS_UPLOAD = ['image','attachment',];

    public $order_by = 'is_active desc,created_date desc,';

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
        
            [['id', 'image', 'title', 'author', 'publisher', 'description', 'attachment', 'type', 'category_id', 'view_count', 'like_count', 'is_feature', 'is_active', 'created_date', 'modified_date'], 'filter', 'filter' => 'trim'],
                
            [['title', 'is_active'], 'required'],
            [['description'], 'string'],
            [['category_id', 'view_count', 'like_count', 'is_feature', 'is_active'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['image', 'title', 'author', 'publisher', 'attachment'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 20],
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
