<?php

namespace backend\modules\travel\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;
use common\components\Helper;

use backend\modules\travel\models\TravelPlans;

/**
 * TravelPlansSearch represents the model behind the search form about `backend\modules\travel\models\TravelPlans`.
 */
class TravelPlansSearch extends TravelPlans
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'day', 'sort_order', 'is_locked'], 'integer'],
            [['name', 'next_plan_id', 'attraction_id', 'attraction_arrived', 'attraction_duration', 'next_attraction_id', 'travel_by', 'travel_duration', 'travel_distance', 'note', 'user_id', 'user_itinerary_id', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
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
        $query = TravelPlans::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //load Params and $_REQUEST
        FHtml::loadParams($this, $params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'day' => $this->day,
            'sort_order' => $this->sort_order,
            'is_locked' => $this->is_locked,
            'user_itinerary_id' => $this->user_itinerary_id,
            'attraction_id' => $this->attraction_id,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'next_plan_id', $this->next_plan_id])
            ->andFilterWhere(['like', 'attraction_arrived', $this->attraction_arrived])
            ->andFilterWhere(['like', 'attraction_duration', $this->attraction_duration])
            ->andFilterWhere(['like', 'next_attraction_id', $this->next_attraction_id])
            ->andFilterWhere(['like', 'travel_by', $this->travel_by])
            ->andFilterWhere(['like', 'travel_duration', $this->travel_duration])
            ->andFilterWhere(['like', 'travel_distance', $this->travel_distance])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'created_user', $this->created_user])
            ->andFilterWhere(['like', 'modified_user', $this->modified_user])
            ->andFilterWhere(['like', 'application_id', $this->application_id]);

        if (empty(FHtml::getRequestParam('sort')))
            $query->orderby('user_itinerary_id asc, day asc, sort_order asc');

        return $dataProvider;
    }
}
