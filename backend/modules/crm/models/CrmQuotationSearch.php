<?php

namespace backend\modules\crm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\crm\models\CrmQuotation;

/**
 * CrmQuotation represents the model behind the search form about `backend\modules\crm\models\CrmQuotation`.
 */
class CrmQuotationSearch extends CrmQuotation{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'year'], 'integer'],
            [['name', 'request_date', 'client_name', 'client_description', 'client_requirement', 'expected_date', 'expired_date', 'completed_date', 'type', 'status', 'reason', 'note', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
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
        $query = CrmQuotation::find();

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
            'name' => $this->name,
            'request_date' => $this->request_date,
            'client_id' => $this->client_id,
            'client_name' => $this->client_name,
            'client_description' => $this->client_description,
            'client_requirement' => $this->client_requirement,
            'expected_date' => $this->expected_date,
            'expired_date' => $this->expired_date,
            'completed_date' => $this->completed_date,
            'type' => $this->type,
            'status' => $this->status,
            'reason' => $this->reason,
            'note' => $this->note,
            'year' => $this->year,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'modified_date' => $this->modified_date,
            'modified_user' => $this->modified_user,
            'application_id' => $this->application_id,
        ]);
        } else {
            $query->andFilterWhere([
            'id' => $this->id,
            'request_date' => $this->request_date,
            'client_id' => $this->client_id,
            'client_requirement' => $this->client_requirement,
            'expected_date' => $this->expected_date,
            'expired_date' => $this->expired_date,
            'completed_date' => $this->completed_date,
            'type' => $this->type,
            'status' => $this->status,
            'year' => $this->year,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'modified_date' => $this->modified_date,
            'modified_user' => $this->modified_user,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'client_name', $this->client_name])
            ->andFilterWhere(['like', 'client_description', $this->client_description])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'note', $this->note]);
        }

        if (empty(FHtml::getRequestParam('sort')))
            $query->orderby(FHtml::getOrderBy($this));

        return $dataProvider;
    }
}
