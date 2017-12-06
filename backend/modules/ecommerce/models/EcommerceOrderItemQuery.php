<?php

namespace backend\modules\ecommerce\models;

/**
 * This is the ActiveQuery class for [[EcommerceOrderItem]].
 *
 * @see EcommerceOrderItem
 */
class EcommerceOrderItemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EcommerceOrderItem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EcommerceOrderItem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
