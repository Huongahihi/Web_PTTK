<?php

namespace backend\modules\ecommerce\models;

/**
 * This is the ActiveQuery class for [[EcommerceOrder]].
 *
 * @see EcommerceOrder
 */
class EcommerceOrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EcommerceOrder[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EcommerceOrder|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
