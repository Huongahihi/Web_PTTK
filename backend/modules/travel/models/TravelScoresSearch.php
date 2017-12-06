<?php

namespace backend\modules\travel\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;
use common\components\Helper;

use backend\modules\travel\models\TravelScores;

/**
 * TravelScoresSearch represents the model behind the search form about `backend\modules\travel\models\TravelScores`.
 */
class TravelScoresSearch extends TravelScores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'attraction_id', 'site_id', 'is_active', 'rank', 'weight'], 'integer'],
            [['name', 'created_date'], 'safe'],
            [['score'], 'number'],
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
        $query = TravelScores::find();

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
            'attraction_id' => $this->attraction_id,
            'site_id' => $this->site_id,
            'is_active' => $this->is_active,
            'rank' => $this->rank,
            'weight' => $this->weight,
            'score' => $this->score,
            'created_date' => $this->created_date,
        ]);
        } else {
        $query->andFilterWhere([
            'id' => $this->id,
            'attraction_id' => $this->attraction_id,
            'site_id' => $this->site_id,
            'is_active' => $this->is_active,
            'rank' => $this->rank,
            'weight' => $this->weight,
            'score' => $this->score,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        }

        if (empty(FHtml::getRequestParam('sort')))
            $query->orderby((new TravelScores())->getOrderBy());

        return $dataProvider;
    }
}
