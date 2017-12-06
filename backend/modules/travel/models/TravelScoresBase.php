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
 * This is the model class for table "travel_scores".
 *

 * @property string $id
 * @property string $name
 * @property integer $attraction_id
 * @property integer $site_id
 * @property integer $is_active
 * @property integer $rank
 * @property integer $weight
 * @property double $score
 * @property string $created_date
 */
class TravelScoresBase extends BaseModel //\yii\db\ActiveRecord
{

// id, name, attraction_id, site_id, is_active, rank, weight, score, created_date
    const COLUMN_ID = 'id';
    const COLUMN_NAME = 'name';
    const COLUMN_ATTRACTION_ID = 'attraction_id';
    const COLUMN_SITE_ID = 'site_id';
    const COLUMN_IS_ACTIVE = 'is_active';
    const COLUMN_RANK = 'rank';
    const COLUMN_WEIGHT = 'weight';
    const COLUMN_SCORE = 'score';
    const COLUMN_CREATED_DATE = 'created_date';

    /**
    * @inheritdoc
    */
    public $tableName = 'travel_scores';

    public static function tableName()
    {
        return 'travel_scores';
    }



    /**
     * @inheritdoc
     * @return TravelScoresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TravelScoresQuery(get_called_class());
    }
}
