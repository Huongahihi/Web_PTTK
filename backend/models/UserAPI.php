<?php

namespace backend\models;

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
 * This is the customized model class for table "user".
 */
class UserAPI extends User{
    //Customize fields to be displayed in API
    const COLUMNS_API = ['id', 'code', 'name', 'username', 'image', 'overview', 'content', 'birth_date', 'birth_place', 'gender', 'identity_card', 'email', 'phone', 'skype', 'address', 'country', 'state', 'city', 'post_code', 'organization', 'department', 'position', 'start_date', 'end_date', 'lat', 'long', 'rate', 'rate_count', 'card_number', 'card_name', 'card_exp', 'card_cvv', 'balance', 'point', 'role', 'type', 'status', 'is_online', 'last_login', 'last_logout', 'created_at', 'updated_at', ];

    public function fields()
    {
        $fields = $this::COLUMNS_API;

        return $fields;
    }

    public function rules()
    {
        //No Rules required for API object
        return [];
    }
}
