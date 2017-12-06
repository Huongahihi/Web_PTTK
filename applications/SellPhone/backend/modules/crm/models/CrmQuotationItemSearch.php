<?php

namespace backend\modules\crm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\crm\models\CrmQuotationItem;

/**
 * CrmQuotationItem represents the model behind the search form about `backend\modules\crm\models\CrmQuotationItem`.
 */
class CrmQuotationItemSearch extends CrmQuotationItem{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'quotation_id', 'product_id', 'product_quantity', 'product_price', 'total_price', 'sort_order'], 'integer'],
            [['quotation_code', 'product_code', 'product_name', 'product_unit', 'created_user', 'created_date', 'application_id'], 'safe'],
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
        $query = CrmQuotationItem::find();

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
            'quotation_id' => $this->quotation_id,
            'quotation_code' => $this->quotation_code,
            'product_id' => $this->product_id,
            'product_code' => $this->product_code,
            'product_name' => $this->product_name,
            'product_unit' => $this->product_unit,
            'product_quantity' => $this->product_quantity,
            'product_price' => $this->product_price,
            'total_price' => $this->total_price,
            'sort_order' => $this->sort_order,
            'created_user' => $this->created_user,
            'created_date' => $this->created_date,
            'application_id' => $this->application_id,
        ]);
        } else {
            $query->andFilterWhere([
            'id' => $this->id,
            'quotation_id' => $this->quotation_id,
            'product_id' => $this->product_id,
            'product_unit' => $this->product_unit,
            'product_quantity' => $this->product_quantity,
            'product_price' => $this->product_price,
            'total_price' => $this->total_price,
            'sort_order' => $this->sort_order,
            'created_user' => $this->created_user,
            'created_date' => $this->created_date,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'quotation_code', $this->quotation_code])
            ->andFilterWhere(['like', 'product_code', $this->product_code])
            ->andFilterWhere(['like', 'product_name', $this->product_name]);
        }

        if (empty(FHtml::getRequestParam('sort')))
            $query->orderby(FHtml::getOrderBy($this));

        return $dataProvider;
    }
}
