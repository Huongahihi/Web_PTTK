<?php

namespace backend\modules\travel\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\travel\models\TravelItinerary;

/**
 * TravelItinerary represents the model behind the search form about `backend\modules\travel\models\TravelItinerary`.
 */
class TravelItinerarySearch extends TravelItinerary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'days', 'sort_order', 'is_top', 'is_system'], 'integer'],
            [['image', 'image_size', 'name', 'user_id', 'start_date', 'end_date', 'content', 'city', 'status', 'created_user', 'created_date', 'modified_user', 'modified_date', 'application_id'], 'safe'],
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
        $query = TravelItinerary::find();

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
            'image' => $this->image,
            'image_size' => $this->image_size,
            'name' => $this->name,
            'user_id' => $this->user_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'content' => $this->content,
            'days' => $this->days,
            'city' => $this->city,
            'status' => $this->status,
            'sort_order' => $this->sort_order,
            'is_top' => $this->is_top,
            'is_system' => $this->is_system,
            'created_user' => $this->created_user,
            'created_date' => $this->created_date,
            'modified_user' => $this->modified_user,
            'modified_date' => $this->modified_date,
            'application_id' => $this->application_id,
        ]);
        } else {
            $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'content' => $this->content,
            'days' => $this->days,
            'city' => $this->city,
            'status' => $this->status,
            'sort_order' => $this->sort_order,
            'is_top' => $this->is_top,
            'is_system' => $this->is_system,
            'created_user' => $this->created_user,
            'created_date' => $this->created_date,
            'modified_user' => $this->modified_user,
            'modified_date' => $this->modified_date,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'image_size', $this->image_size])
            ->andFilterWhere(['like', 'name', $this->name]);
        }

        if (empty(FHtml::getRequestParam('sort')))
            $query->orderby((new TravelItinerary())->getOrderBy());

        return $dataProvider;
    }
}
