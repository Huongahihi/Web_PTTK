<?php

namespace backend\modules\music\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\music\models\MusicSong;

/**
 * MusicSong represents the model behind the search form about `backend\modules\music\models\MusicSong`.
 */
class MusicSongSearch extends MusicSong{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_hot', 'is_top', 'is_active', 'is_video', 'count_views', 'count_likes', 'count_purchase', 'count_comments', 'count_rates', 'rates'], 'integer'],
            [['thumbnail', 'image', 'song_file', 'name', 'description', 'content', 'duration', 'release_date', 'artist_singer_id', 'artist_composer_id', 'album_id', 'lang', 'type', 'status', 'mood', 'category_id', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
            [['price'], 'number'],
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
        $query = MusicSong::find();

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
            'song_file' => $this->song_file,
            'name' => $this->name,
            'description' => $this->description,
            'content' => $this->content,
            'price' => $this->price,
            'duration' => $this->duration,
            'release_date' => $this->release_date,
            'artist_singer_id' => $this->artist_singer_id,
            'artist_composer_id' => $this->artist_composer_id,
            'album_id' => $this->album_id,
            'is_hot' => $this->is_hot,
            'is_top' => $this->is_top,
            'is_active' => $this->is_active,
            'is_video' => $this->is_video,
            'lang' => $this->lang,
            'type' => $this->type,
            'status' => $this->status,
            'mood' => $this->mood,
            'category_id' => $this->category_id,
            'count_views' => $this->count_views,
            'count_likes' => $this->count_likes,
            'count_purchase' => $this->count_purchase,
            'count_comments' => $this->count_comments,
            'count_rates' => $this->count_rates,
            'rates' => $this->rates,
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
            'price' => $this->price,
            'duration' => $this->duration,
            'release_date' => $this->release_date,
            'artist_singer_id' => $this->artist_singer_id,
            'artist_composer_id' => $this->artist_composer_id,
            'album_id' => $this->album_id,
            'is_hot' => $this->is_hot,
            'is_top' => $this->is_top,
            'is_active' => $this->is_active,
            'is_video' => $this->is_video,
            'lang' => $this->lang,
            'type' => $this->type,
            'status' => $this->status,
            'mood' => $this->mood,
            'count_views' => $this->count_views,
            'count_likes' => $this->count_likes,
            'count_purchase' => $this->count_purchase,
            'count_comments' => $this->count_comments,
            'count_rates' => $this->count_rates,
            'rates' => $this->rates,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'modified_date' => $this->modified_date,
            'modified_user' => $this->modified_user,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'thumbnail', $this->thumbnail])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'song_file', $this->song_file])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
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
