<?php

namespace backend\modules\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\cms\models\CmsPage;

/**
 * CmsPage represents the model behind the search form about `backend\modules\cms\models\CmsPage`.
 */
class CmsPageSearch extends CmsPage{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'views_count', 'is_active', 'sort_order'], 'integer'],
            [['code', 'image', 'name', 'description', 'content', 'keywords', 'page_image', 'page_title', 'page_slug', 'page_description', 'page_content', 'page_width', 'page_background', 'body_css', 'body_style', 'page_style', 'page_script', 'created_date', 'created_user', 'application_id'], 'safe'],
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
        $query = CmsPage::find();

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
            'code' => $this->code,
            'image' => $this->image,
            'name' => $this->name,
            'description' => $this->description,
            'content' => $this->content,
            'keywords' => $this->keywords,
            'page_image' => $this->page_image,
            'page_title' => $this->page_title,
            'page_slug' => $this->page_slug,
            'page_description' => $this->page_description,
            'page_content' => $this->page_content,
            'page_width' => $this->page_width,
            'page_background' => $this->page_background,
            'body_css' => $this->body_css,
            'body_style' => $this->body_style,
            'page_style' => $this->page_style,
            'page_script' => $this->page_script,
            'views_count' => $this->views_count,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'application_id' => $this->application_id,
        ]);
        } else {
            $query->andFilterWhere([
            'id' => $this->id,
            'content' => $this->content,
            'page_content' => $this->page_content,
            'page_style' => $this->page_style,
            'page_script' => $this->page_script,
            'views_count' => $this->views_count,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'page_image', $this->page_image])
            ->andFilterWhere(['like', 'page_title', $this->page_title])
            ->andFilterWhere(['like', 'page_slug', $this->page_slug])
            ->andFilterWhere(['like', 'page_description', $this->page_description])
            ->andFilterWhere(['like', 'page_width', $this->page_width])
            ->andFilterWhere(['like', 'page_background', $this->page_background])
            ->andFilterWhere(['like', 'body_css', $this->body_css])
            ->andFilterWhere(['like', 'body_style', $this->body_style]);
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
