<?php

namespace backend\modules\travel\models;

/**
 * This is the ActiveQuery class for [[TravelScores]].
 *
 * @see TravelScores
 */
class TravelScoresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TravelScores[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TravelScores|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
