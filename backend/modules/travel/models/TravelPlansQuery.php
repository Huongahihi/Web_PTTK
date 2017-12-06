<?php

namespace backend\modules\travel\models;

/**
 * This is the ActiveQuery class for [[TravelPlans]].
 *
 * @see TravelPlans
 */
class TravelPlansQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TravelPlans[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TravelPlans|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
