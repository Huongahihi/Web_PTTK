<?php

namespace backend\modules\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\cms\models\CmsPortfolio;

/**
 * CmsPortfolio represents the model behind the search form about `backend\modules\cms\models\CmsPortfolio`.
 */
class CmsPortfolioSearch extends CmsPortfolio{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'testimonial_id', 'product_id', 'sort_order', 'is_active', 'is_top'], 'integer'],
            [['image', 'banner', 'name', 'overview', 'content', 'tags', 'status', 'linkurl', 'product_category_id', 'lang', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
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
        $query = CmsPortfolio::find();

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
            'banner' => $this->banner,
            'name' => $this->name,
            'overview' => $this->overview,
            'content' => $this->content,
            'tags' => $this->tags,
            'status' => $this->status,
            'linkurl' => $this->linkurl,
            'testimonial_id' => $this->testimonial_id,
            'product_id' => $this->product_id,
            'product_category_id' => $this->product_category_id,
            'lang' => $this->lang,
            'sort_order' => $this->sort_order,
            'is_active' => $this->is_active,
            'is_top' => $this->is_top,
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
            'status' => $this->status,
            'testimonial_id' => $this->testimonial_id,
            'product_id' => $this->product_id,
            'lang' => $this->lang,
            'sort_order' => $this->sort_order,
            'is_active' => $this->is_active,
            'is_top' => $this->is_top,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'modified_date' => $this->modified_date,
            'modified_user' => $this->modified_user,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'banner', $this->banner])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'overview', $this->overview])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'linkurl', $this->linkurl])
            ->andFilterWhere(['like', 'product_category_id', $this->product_category_id]);
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
