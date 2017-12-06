<?php

namespace backend\modules\travel\models;

/**
 * This is the ActiveQuery class for [[TravelItinerary]].
 *
 * @see TravelItinerary
 */
class TravelItineraryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TravelItinerary[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TravelItinerary|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
