<?php

namespace backend\modules\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\cms\models\CmsBlogs;

/**
 * CmsBlogs represents the model behind the search form about `backend\modules\cms\models\CmsBlogs`.
 */
class CmsBlogsSearch extends CmsBlogs{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_active', 'is_top', 'is_new', 'is_hot', 'count_views', 'count_comments', 'count_likes', 'count_rates', 'rates'], 'integer'],
            [['thumbnail', 'image', 'banner', 'code', 'name', 'overview', 'content', 'type', 'status', 'category_id', 'lang', 'tags', 'linkurl', 'author', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
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
        $query = CmsBlogs::find();

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
            'banner' => $this->banner,
            'code' => $this->code,
            'name' => $this->name,
            'overview' => $this->overview,
            'content' => $this->content,
            'type' => $this->type,
            'status' => $this->status,
            'category_id' => $this->category_id,
            'is_active' => $this->is_active,
            'lang' => $this->lang,
            'tags' => $this->tags,
            'linkurl' => $this->linkurl,
            'author' => $this->author,
            'is_top' => $this->is_top,
            'is_new' => $this->is_new,
            'is_hot' => $this->is_hot,
            'count_views' => $this->count_views,
            'count_comments' => $this->count_comments,
            'count_likes' => $this->count_likes,
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
            'type' => $this->type,
            'status' => $this->status,
            'is_active' => $this->is_active,
            'lang' => $this->lang,
            'is_top' => $this->is_top,
            'is_new' => $this->is_new,
            'is_hot' => $this->is_hot,
            'count_views' => $this->count_views,
            'count_comments' => $this->count_comments,
            'count_likes' => $this->count_likes,
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
            ->andFilterWhere(['like', 'banner', $this->banner])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'overview', $this->overview])
            ->andFilterWhere(['like', 'category_id', $this->category_id])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'linkurl', $this->linkurl])
            ->andFilterWhere(['like', 'author', $this->author]);
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
