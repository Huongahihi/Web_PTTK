<?php

namespace backend\modules\ecommerce\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\ecommerce\models\EcommerceOrderItem;

/**
 * EcommerceOrderItem represents the model behind the search form about `backend\modules\ecommerce\models\EcommerceOrderItem`.
 */
class EcommerceOrderItemSearch extends EcommerceOrderItem{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_id', 'product_id', 'quantity'], 'integer'],
            [['name', 'note'], 'safe'],
            [['price', 'total'], 'number'],
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
        $query = EcommerceOrderItem::find();

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
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'name' => $this->name,
            'note' => $this->note,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'total' => $this->total,
        ]);
        } else {
            $query->andFilterWhere([
            'id' => $this->id,
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'note', $this->note]);
        }

        if (empty(FHtml::getRequestParam('sort')))
            $query->orderby((new EcommerceOrderItem())->getOrderBy());

        return $dataProvider;
    }
}
