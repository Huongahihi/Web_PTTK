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
class CrmQuotationItem extends CrmQuotationItemBase //\yii\db\ActiveRecord
{
    const LOOKUP = [];

    const COLUMNS_UPLOAD = [];

    public $order_by = 'sort_order asc,created_date desc,';

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
        
            [['id', 'quotation_id', 'quotation_code', 'product_id', 'product_code', 'product_name', 'product_unit', 'product_quantity', 'product_price', 'total_price', 'sort_order', 'created_user', 'created_date', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['quotation_id', 'product_id', 'product_quantity', 'product_price', 'total_price', 'sort_order'], 'integer'],
            [['created_date'], 'safe'],
            [['quotation_code', 'product_code', 'product_name'], 'string', 'max' => 255],
            [['product_unit', 'created_user', 'application_id'], 'string', 'max' => 100],
        ];
    }




    public function prepareCustomFields() {
        parent::prepareCustomFields();

    }

    public static function getLookupArray($column) {
        if (key_exists($column, self::LOOKUP))
            return self::LOOKUP[$column];
        return [];
    }

    public static function getRelatedObjects() {
        return self::OBJECTS_RELATED;
    }

    public static function getMetaObjects() {
        return self::OBJECTS_META;
    }


}
