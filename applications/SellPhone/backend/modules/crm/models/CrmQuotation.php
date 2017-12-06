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
class CrmQuotation extends CrmQuotationBase //\yii\db\ActiveRecord
{
    const LOOKUP = [];

    const COLUMNS_UPLOAD = [];

    public $order_by = 'created_date desc,';

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
        
            [['id', 'name', 'request_date', 'client_id', 'client_name', 'client_description', 'client_requirement', 'expected_date', 'expired_date', 'completed_date', 'type', 'status', 'reason', 'note', 'year', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['request_date', 'expected_date', 'expired_date', 'completed_date', 'created_date', 'modified_date'], 'safe'],
            [['client_id', 'year'], 'integer'],
            [['client_requirement'], 'string'],
            [['name', 'client_name'], 'string', 'max' => 255],
            [['client_description'], 'string', 'max' => 2000],
            [['type', 'status', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
            [['reason', 'note'], 'string', 'max' => 4000],
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
