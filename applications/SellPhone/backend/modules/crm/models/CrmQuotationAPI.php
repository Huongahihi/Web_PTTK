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
 * This is the customized model class for table "crm_quotation".
 */
class CrmQuotationAPI extends CrmQuotation{
    public function fields()
    {
        //Customize fields to be displayed in API
        $fields = ['id', 'name', 'request_date', 'client_id', 'client_name', 'client_description', 'client_requirement', 'expected_date', 'expired_date', 'completed_date', 'type', 'status', 'reason', 'note', 'year', ];

        return $fields;
    }

    public function rules()
    {
        //No Rules required for API object
        return [];
    }
}
