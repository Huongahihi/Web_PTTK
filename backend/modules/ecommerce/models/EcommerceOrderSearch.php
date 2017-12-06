<?php

namespace backend\modules\ecommerce\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\ecommerce\models\EcommerceOrder;

/**
 * EcommerceOrder represents the model behind the search form about `backend\modules\ecommerce\models\EcommerceOrder`.
 */
class EcommerceOrderSearch extends EcommerceOrder{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_active'], 'integer'],
            [['user_id', 'billing_name', 'billing_phone', 'billing_address', 'billing_email', 'billing_postcode', 'billing_city', 'billing_state', 'billing_country', 'shipping_address', 'shipping_time', 'shipping_note', 'order_date', 'order_detail', 'order_note', 'order_type', 'order_status', 'tax', 'promotion_code', 'payment_method', 'payment_status', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
            [['price_total', 'price_tax', 'price_discount', 'price_shipping', 'price_final'], 'number'],
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
        $query = EcommerceOrder::find();

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
            'user_id' => $this->user_id,
            'billing_name' => $this->billing_name,
            'billing_phone' => $this->billing_phone,
            'billing_address' => $this->billing_address,
            'billing_email' => $this->billing_email,
            'billing_postcode' => $this->billing_postcode,
            'billing_city' => $this->billing_city,
            'billing_state' => $this->billing_state,
            'billing_country' => $this->billing_country,
            'shipping_address' => $this->shipping_address,
            'shipping_time' => $this->shipping_time,
            'shipping_note' => $this->shipping_note,
            'order_date' => $this->order_date,
            'order_detail' => $this->order_detail,
            'order_note' => $this->order_note,
            'order_type' => $this->order_type,
            'order_status' => $this->order_status,
            'is_active' => $this->is_active,
            'price_total' => $this->price_total,
            'tax' => $this->tax,
            'price_tax' => $this->price_tax,
            'promotion_code' => $this->promotion_code,
            'price_discount' => $this->price_discount,
            'price_shipping' => $this->price_shipping,
            'price_final' => $this->price_final,
            'payment_method' => $this->payment_method,
            'payment_status' => $this->payment_status,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'modified_date' => $this->modified_date,
            'modified_user' => $this->modified_user,
            'application_id' => $this->application_id,
        ]);
        } else {
            $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'order_detail' => $this->order_detail,
            'order_note' => $this->order_note,
            'order_type' => $this->order_type,
            'order_status' => $this->order_status,
            'is_active' => $this->is_active,
            'price_total' => $this->price_total,
            'price_tax' => $this->price_tax,
            'price_discount' => $this->price_discount,
            'price_shipping' => $this->price_shipping,
            'price_final' => $this->price_final,
            'payment_method' => $this->payment_method,
            'payment_status' => $this->payment_status,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'modified_date' => $this->modified_date,
            'modified_user' => $this->modified_user,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'billing_name', $this->billing_name])
            ->andFilterWhere(['like', 'billing_phone', $this->billing_phone])
            ->andFilterWhere(['like', 'billing_address', $this->billing_address])
            ->andFilterWhere(['like', 'billing_email', $this->billing_email])
            ->andFilterWhere(['like', 'billing_postcode', $this->billing_postcode])
            ->andFilterWhere(['like', 'billing_city', $this->billing_city])
            ->andFilterWhere(['like', 'billing_state', $this->billing_state])
            ->andFilterWhere(['like', 'billing_country', $this->billing_country])
            ->andFilterWhere(['like', 'shipping_address', $this->shipping_address])
            ->andFilterWhere(['like', 'shipping_time', $this->shipping_time])
            ->andFilterWhere(['like', 'shipping_note', $this->shipping_note])
            ->andFilterWhere(['like', 'order_date', $this->order_date])
            ->andFilterWhere(['like', 'tax', $this->tax])
            ->andFilterWhere(['like', 'promotion_code', $this->promotion_code]);
        }

        $application_id = FHtml::getFieldValue($this, 'application_id');
        if (FHtml::isApplicationsEnabled($this->getTableName()) && !empty($application_id)) {
            $query->andFilterWhere(['application_id' => $application_id]);
        }

        if (empty(FHtml::getRequestParam('sort')))
            $query->orderby(FHtml::getOrderBy($this));

        return $dataProvider;
    }
}
