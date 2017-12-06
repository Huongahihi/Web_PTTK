<?php

namespace backend\modules\ecommerce\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\ecommerce\models\EcommerceReservation;

/**
 * EcommerceReservation represents the model behind the search form about `backend\modules\ecommerce\models\EcommerceReservation`.
 */
class EcommerceReservationSearch extends EcommerceReservation{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'buyer_id', 'buyer_confirm', 'buyer_visible', 'seller_id', 'seller_confirm', 'seller_visible', 'deal_id', 'is_active'], 'integer'],
            [['buyer_name', 'buyer_note', 'seller_name', 'seller_note', 'deal_name', 'time', 'payment_method', 'payment_status', 'status', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = EcommerceReservation::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $searchExact = FHtml::getRequestParam('SearchExact', false);

        //load Params and $_REQUEST
        FHtml::loadParams($this, $params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if ($searchExact) {
            $query->andFilterWhere([
            'id' => $this->id,
            'buyer_id' => $this->buyer_id,
            'buyer_name' => $this->buyer_name,
            'buyer_note' => $this->buyer_note,
            'buyer_confirm' => $this->buyer_confirm,
            'buyer_visible' => $this->buyer_visible,
            'seller_id' => $this->seller_id,
            'seller_name' => $this->seller_name,
            'seller_note' => $this->seller_note,
            'seller_confirm' => $this->seller_confirm,
            'seller_visible' => $this->seller_visible,
            'deal_id' => $this->deal_id,
            'deal_name' => $this->deal_name,
            'price' => $this->price,
            'time' => $this->time,
            'payment_method' => $this->payment_method,
            'payment_status' => $this->payment_status,
            'status' => $this->status,
            'is_active' => $this->is_active,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'modified_date' => $this->modified_date,
            'modified_user' => $this->modified_user,
            'application_id' => $this->application_id,
        ]);
        } else {
            $query->andFilterWhere([
            'id' => $this->id,
            'buyer_id' => $this->buyer_id,
            'buyer_note' => $this->buyer_note,
            'buyer_confirm' => $this->buyer_confirm,
            'buyer_visible' => $this->buyer_visible,
            'seller_id' => $this->seller_id,
            'seller_note' => $this->seller_note,
            'seller_confirm' => $this->seller_confirm,
            'seller_visible' => $this->seller_visible,
            'deal_id' => $this->deal_id,
            'price' => $this->price,
            'payment_method' => $this->payment_method,
            'payment_status' => $this->payment_status,
            'status' => $this->status,
            'is_active' => $this->is_active,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'modified_date' => $this->modified_date,
            'modified_user' => $this->modified_user,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'buyer_name', $this->buyer_name])
            ->andFilterWhere(['like', 'seller_name', $this->seller_name])
            ->andFilterWhere(['like', 'deal_name', $this->deal_name])
            ->andFilterWhere(['like', 'time', $this->time]);
        }

        if (empty(FHtml::getRequestParam('sort')))
            $query->orderby((new EcommerceReservation())->getOrderBy());

        return $dataProvider;
    }
}
