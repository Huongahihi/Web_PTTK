<?php

namespace backend\modules\music\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\music\models\MusicArtist;

/**
 * MusicArtist represents the model behind the search form about `backend\modules\music\models\MusicArtist`.
 */
class MusicArtistSearch extends MusicArtist{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'count_views', 'count_likes', 'count_rates', 'rates', 'is_top', 'is_new', 'is_hot', 'is_active'], 'integer'],
            [['thumbnail', 'image', 'name', 'real_name', 'description', 'content', 'birth_date', 'location', 'lang', 'type', 'status', 'category_id', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
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
        $query = MusicArtist::find();

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
            'name' => $this->name,
            'real_name' => $this->real_name,
            'description' => $this->description,
            'content' => $this->content,
            'birth_date' => $this->birth_date,
            'location' => $this->location,
            'count_views' => $this->count_views,
            'count_likes' => $this->count_likes,
            'count_rates' => $this->count_rates,
            'rates' => $this->rates,
            'is_top' => $this->is_top,
            'is_new' => $this->is_new,
            'is_hot' => $this->is_hot,
            'is_active' => $this->is_active,
            'lang' => $this->lang,
            'type' => $this->type,
            'status' => $this->status,
            'category_id' => $this->category_id,
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
            'birth_date' => $this->birth_date,
            'count_views' => $this->count_views,
            'count_likes' => $this->count_likes,
            'count_rates' => $this->count_rates,
            'rates' => $this->rates,
            'is_top' => $this->is_top,
            'is_new' => $this->is_new,
            'is_hot' => $this->is_hot,
            'is_active' => $this->is_active,
            'lang' => $this->lang,
            'type' => $this->type,
            'status' => $this->status,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'modified_date' => $this->modified_date,
            'modified_user' => $this->modified_user,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'thumbnail', $this->thumbnail])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'real_name', $this->real_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'category_id', $this->category_id]);
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
