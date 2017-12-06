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
 * This is the model class for table "crm_quotation_item".
 *

 * @property integer $id
 * @property integer $quotation_id
 * @property string $quotation_code
 * @property integer $product_id
 * @property string $product_code
 * @property string $product_name
 * @property string $product_unit
 * @property integer $product_quantity
 * @property integer $product_price
 * @property integer $total_price
 * @property integer $sort_order
 * @property string $created_user
 * @property string $created_date
 * @property string $application_id
 */
class CrmQuotationItemBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'crm_quotation_item';

    public static function tableName()
    {
        return 'crm_quotation_item';
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
                    'id' => FHtml::t('CrmQuotationItem', 'ID'),
                    'quotation_id' => FHtml::t('CrmQuotationItem', 'Quotation ID'),
                    'quotation_code' => FHtml::t('CrmQuotationItem', 'Quotation Code'),
                    'product_id' => FHtml::t('CrmQuotationItem', 'Product ID'),
                    'product_code' => FHtml::t('CrmQuotationItem', 'Product Code'),
                    'product_name' => FHtml::t('CrmQuotationItem', 'Product Name'),
                    'product_unit' => FHtml::t('CrmQuotationItem', 'Product Unit'),
                    'product_quantity' => FHtml::t('CrmQuotationItem', 'Product Quantity'),
                    'product_price' => FHtml::t('CrmQuotationItem', 'Product Price'),
                    'total_price' => FHtml::t('CrmQuotationItem', 'Total Price'),
                    'sort_order' => FHtml::t('CrmQuotationItem', 'Sort Order'),
                    'created_user' => FHtml::t('CrmQuotationItem', 'Created User'),
                    'created_date' => FHtml::t('CrmQuotationItem', 'Created Date'),
                    'application_id' => FHtml::t('CrmQuotationItem', 'Application ID'),
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
        $i18n->translations['CrmQuotationItem*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/crm/messages',
            'fileMap' => [
                'CrmQuotationItem' => 'CrmQuotationItem.php',
            ],
        ];
    }



}
