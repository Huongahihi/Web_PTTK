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
class BookAPI extends Book{
    public function fields()
    {
        //Customize fields to be displayed in API
        $fields = ['id', 'image', 'title', 'author', 'publisher', 'description', 'attachment', 'type', 'category_id', 'view_count', 'like_count', 'is_feature', 'is_active', ];

        return $fields;
    }

    public function rules()
    {
        //No Rules required for API object
        return [];
    }
}