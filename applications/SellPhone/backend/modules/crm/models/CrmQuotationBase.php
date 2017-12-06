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
 * This is the model class for table "crm_quotation".
 *

 * @property string $id
 * @property string $name
 * @property string $request_date
 * @property integer $client_id
 * @property string $client_name
 * @property string $client_description
 * @property string $client_requirement
 * @property string $expected_date
 * @property string $expired_date
 * @property string $completed_date
 * @property string $type
 * @property string $status
 * @property string $reason
 * @property string $note
 * @property integer $year
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class CrmQuotationBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'crm_quotation';

    public static function tableName()
    {
        return 'crm_quotation';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return FHtml::currentDb();
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
                    'id' => FHtml::t('CrmQuotation', 'ID'),
                    'name' => FHtml::t('CrmQuotation', 'Name'),
                    'request_date' => FHtml::t('CrmQuotation', 'Request Date'),
                    'client_id' => FHtml::t('CrmQuotation', 'Client ID'),
                    'client_name' => FHtml::t('CrmQuotation', 'Client Name'),
                    'client_description' => FHtml::t('CrmQuotation', 'Client Description'),
                    'client_requirement' => FHtml::t('CrmQuotation', 'Client Requirement'),
                    'expected_date' => FHtml::t('CrmQuotation', 'Expected Date'),
                    'expired_date' => FHtml::t('CrmQuotation', 'Expired Date'),
                    'completed_date' => FHtml::t('CrmQuotation', 'Completed Date'),
                    'type' => FHtml::t('CrmQuotation', 'Type'),
                    'status' => FHtml::t('CrmQuotation', 'Status'),
                    'reason' => FHtml::t('CrmQuotation', 'Reason'),
                    'note' => FHtml::t('CrmQuotation', 'Note'),
                    'year' => FHtml::t('CrmQuotation', 'Year'),
                    'created_date' => FHtml::t('CrmQuotation', 'Created Date'),
                    'created_user' => FHtml::t('CrmQuotation', 'Created User'),
                    'modified_date' => FHtml::t('CrmQuotation', 'Modified Date'),
                    'modified_user' => FHtml::t('CrmQuotation', 'Modified User'),
                    'application_id' => FHtml::t('CrmQuotation', 'Application ID'),
                ];
    }

    public static function tableSchema()
    {
        return FHtml::getTableSchema(self::tableName());
    }

    public static function Columns()
    {
        return self::tableSchema()->columns;
    }

    public static function ColumnsArray()
    {
        return ArrayHelper::getColumn(self::tableSchema()->columns, 'name');
    }

    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        $i18n = Yii::$app->i18n;
        $i18n->translations['CrmQuotation*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/crm/messages',
            'fileMap' => [
                'CrmQuotation' => 'CrmQuotation.php',
            ],
        ];
    }



}
