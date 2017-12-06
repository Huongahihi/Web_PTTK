<?php

namespace backend\modules\travel\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;
use common\components\Helper;

use backend\modules\travel\models\TravelSites;

/**
 * TravelSitesSearch represents the model behind the search form about `backend\modules\travel\models\TravelSites`.
 */
class TravelSitesSearch extends TravelSites
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'weight', 'is_active'], 'integer'],
            [['city', 'keywords', 'name', 'url', 'search_content', 'search_element', 'search_result', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
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
        $query = TravelSites::find();

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
                'city' => $this->city,
                'keywords' => $this->keywords,
                'name' => $this->name,
                'url' => $this->url,
                'weight' => $this->weight,
                'search_content' => $this->search_content,
                'search_element' => $this->search_element,
                'search_result' => $this->search_result,
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
                'city' => $this->city,
                'keywords' => $this->keywords,
                'weight' => $this->weight,
                'search_content' => $this->search_content,
                'is_active' => $this->is_active,
                'created_date' => $this->created_date,
                'created_user' => $this->created_user,
                'modified_date' => $this->modified_date,
                'modified_user' => $this->modified_user,
                'application_id' => $this->application_id,
            ]);

            $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'url', $this->url])
                ->andFilterWhere(['like', 'search_element', $this->search_element])
                ->andFilterWhere(['like', 'search_result', $this->search_result]);
        }

        if (empty(FHtml::getRequestParam('sort')))
            $query->orderby((new TravelSites())->getOrderBy());

        return $dataProvider;
    }
}
