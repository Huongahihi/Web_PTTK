<?php

namespace backend\modules\ecommerce\models;

/**
 * This is the ActiveQuery class for [[EcommerceReservation]].
 *
 * @see EcommerceReservation
 */
class EcommerceReservationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EcommerceReservation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EcommerceReservation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
