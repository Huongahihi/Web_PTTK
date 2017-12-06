<?php

namespace backend\modules\ecommerce\models;

use Yii;

/**
 * This is the model class for table "product_smartphone".
 *
 * @property integer $id
 * @property integer $screen_size
 * @property integer $RAM
 * @property string $OS
 */
class ProductSmartphone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_smartphone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'screen_size', 'RAM', 'OS'], 'required'],
            [['product_id', 'screen_size', 'RAM'], 'integer'],
            [['OS'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'screen_size' => 'Screen Size',
            'RAM' => 'Ram',
            'OS' => 'Os',
        ];
    }
}
