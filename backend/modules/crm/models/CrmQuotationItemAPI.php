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
 * This is the customized model class for table "crm_quotation_item".
 */
class CrmQuotationItemAPI extends CrmQuotationItem{
    public function fields()
    {
        //Customize fields to be displayed in API
        $fields = ['id', 'quotation_id', 'quotation_code', 'product_id', 'product_code', 'product_name', 'product_unit', 'product_quantity', 'product_price', 'total_price', ];

        return $fields;
    }

    public function rules()
    {
        //No Rules required for API object
        return [];
    }
}
