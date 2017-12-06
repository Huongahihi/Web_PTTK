<?php

namespace backend\modules\crm\models;

use Yii;
use common\components\FHtml;
use common\components\FModel;
use common\models\BaseModel;
use frontend\models\ViewModel;
use yii\helpers\ArrayHelper;

/**
 * Developed by Hung Ho (Steve): hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "crm_client".
 */
class CrmClientAPI extends CrmClient{
    public function fields()
    {
        //Customize fields to be displayed in API
        $fields = ['id', 'image', 'code', 'name', 'description', 'content', 'start_date', 'contact_name', 'contact_title', 'mobile', 'website', 'address', 'address2', 'phone', 'email', 'fax', 'company', 'business_license', 'tax_code', 'payment_info', 'payment_term', 'zip_code', 'city', 'country', 'region', 'note', 'tags', 'is_active', 'type', 'status', 'sale_user', 'ip_address', ];

        return $fields;
    }

    public function rules()
    {
        //No Rules required for API object
        return [];
    }
}
