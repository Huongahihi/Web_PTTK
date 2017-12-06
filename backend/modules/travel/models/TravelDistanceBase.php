<?php

namespace backend\modules\travel\models;

use Yii;
use common\components\FHtml;
use common\components\FModel;
use common\models\BaseModel;
use frontend\models\ViewModel;

/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the model class for table "travel_distance".
 *
 * @property string $id
 * @property integer $from_id
 * @property double $from_lat
 * @property double $from_long
 * @property integer $to_id
 * @property double $to_lat
 * @property double $to_long
 * @property string $distance
 * @property string $time
 * @property string $transport
 */
class TravelDistanceBase extends BaseModel //\yii\db\ActiveRecord
{

// id, from_id, from_lat, from_long, to_id, to_lat, to_long, distance, time, transport
    const COLUMN_ID = 'id';
    const COLUMN_FROM_ID = 'from_id';
    const COLUMN_FROM_LAT = 'from_lat';
    const COLUMN_FROM_LONG = 'from_long';
    const COLUMN_TO_ID = 'to_id';
    const COLUMN_TO_LAT = 'to_lat';
    const COLUMN_TO_LONG = 'to_long';
    const COLUMN_DISTANCE = 'distance';
    const COLUMN_TIME = 'time';
    const COLUMN_TRANSPORT = 'transport';

    /**
     * @inheritdoc
     */
    public $tableName = 'travel_distance';

    public static function tableName()
    {
        return 'travel_distance';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['id', 'from_id', 'from_lat', 'from_long', 'to_id', 'to_lat', 'to_long', 'distance', 'time', 'transport'], 'filter', 'filter' => 'trim'],

            [['from_id', 'to_id'], 'required'],
            [['from_id', 'to_id'], 'integer'],
            [['from_lat', 'from_long', 'to_lat', 'to_long'], 'number'],
            [['distance', 'time', 'transport'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => FHtml::t('TravelDistance', 'ID'),
            'from_id' => FHtml::t('TravelDistance', 'From ID'),
            'from_lat' => FHtml::t('TravelDistance', 'From Lat'),
            'from_long' => FHtml::t('TravelDistance', 'From Long'),
            'to_id' => FHtml::t('TravelDistance', 'To ID'),
            'to_lat' => FHtml::t('TravelDistance', 'To Lat'),
            'to_long' => FHtml::t('TravelDistance', 'To Long'),
            'distance' => FHtml::t('TravelDistance', 'Distance'),
            'time' => FHtml::t('TravelDistance', 'Time'),
            'transport' => FHtml::t('TravelDistance', 'Transport'),
        ];
    }

    /**
     * @inheritdoc
     * @return TravelDistanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TravelDistanceQuery(get_called_class());
    }
}
