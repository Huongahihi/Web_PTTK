<?php

namespace backend\modules\travel\models;

/**
 * This is the ActiveQuery class for [[TravelSites]].
 *
 * @see TravelSites
 */
class TravelSitesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TravelSites[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TravelSites|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
