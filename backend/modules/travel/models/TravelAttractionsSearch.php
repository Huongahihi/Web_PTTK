<?php

namespace backend\modules\travel\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;
use common\components\Helper;

use backend\modules\travel\models\TravelAttractions;

/**
 * TravelAttractionsSearch represents the model behind the search form about `backend\modules\travel\models\TravelAttractions`.
 */
class TravelAttractionsSearch extends TravelAttractions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rate', 'score', 'sort_order', 'is_active', 'is_new', 'is_hot'], 'integer'],
            [['thumbnail', 'image', 'image_description', 'name', 'description', 'content', 'note', 'tel', 'address', 'website', 'map', 'budget', 'default_duration', 'open', 'close', 'street', 'city', 'country', 'category_id', 'type', 'status', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
            [['lat', 'long'], 'number'],
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
        $query = TravelAttractions::find();

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
                'thumbnail' => $this->thumbnail,
                'image' => $this->image,
                'image_description' => $this->image_description,
                'name' => $this->name,
                'description' => $this->description,
                'content' => $this->content,
                'note' => $this->note,
                'tel' => $this->tel,
                'address' => $this->address,
                'website' => $this->website,
                'map' => $this->map,
                'rate' => $this->rate,
                'score' => $this->score,
                'budget' => $this->budget,
                'default_duration' => $this->default_duration,
                'sort_order' => $this->sort_order,
                'lat' => $this->lat,
                'long' => $this->long,
                'open' => $this->open,
                'close' => $this->close,
                'street' => $this->street,
                'city' => $this->city,
                'country' => $this->country,
                'category_id' => $this->category_id,
                'type' => $this->type,
                'status' => $this->status,
                'is_active' => $this->is_active,
                'is_new' => $this->is_new,
                'is_hot' => $this->is_hot,
                'created_date' => $this->created_date,
                'created_user' => $this->created_user,
                'modified_date' => $this->modified_date,
                'modified_user' => $this->modified_user,
                'application_id' => $this->application_id,
            ]);
        } else {
            $query->andFilterWhere([
                'id' => $this->id,
                'content' => $this->content,
                'note' => $this->note,
                'rate' => $this->rate,
                'score' => $this->score,
                'default_duration' => $this->default_duration,
                'sort_order' => $this->sort_order,
                'lat' => $this->lat,
                'long' => $this->long,
                'category_id' => $this->category_id,
                'type' => $this->type,
                'status' => $this->status,
                'is_active' => $this->is_active,
                'is_new' => $this->is_new,
                'is_hot' => $this->is_hot,
                'created_date' => $this->created_date,
                'created_user' => $this->created_user,
                'modified_date' => $this->modified_date,
                'modified_user' => $this->modified_user,
                'application_id' => $this->application_id,
            ]);

            $query->andFilterWhere(['like', 'thumbnail', $this->thumbnail])
                ->andFilterWhere(['like', 'image', $this->image])
                ->andFilterWhere(['like', 'image_description', $this->image_description])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'tel', $this->tel])
                ->andFilterWhere(['like', 'address', $this->address])
                ->andFilterWhere(['like', 'website', $this->website])
                ->andFilterWhere(['like', 'map', $this->map])
                ->andFilterWhere(['like', 'budget', $this->budget])
                ->andFilterWhere(['like', 'open', $this->open])
                ->andFilterWhere(['like', 'close', $this->close])
                ->andFilterWhere(['like', 'street', $this->street])
                ->andFilterWhere(['like', 'city', $this->city])
                ->andFilterWhere(['like', 'country', $this->country]);
        }

        if (empty(FHtml::getRequestParam('sort')))
            $query->orderby((new TravelAttractions())->getOrderBy());

        return $dataProvider;
    }
}
