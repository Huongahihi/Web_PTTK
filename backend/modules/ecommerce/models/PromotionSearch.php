<?php

namespace backend\modules\ecommerce\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\ecommerce\models\Promotion;

/**
 * Promotion represents the model behind the search form about `backend\modules\ecommerce\models\Promotion`.
 */
class PromotionSearch extends Promotion{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'discount', 'usage_limit', 'usage_current', 'sales_over', 'is_top', 'is_active', 'sort_order', 'count_views', 'count_shares'], 'integer'],
            [['code', 'image', 'banner', 'name', 'overview', 'content', 'link_url', 'discount_type', 'apply_type', 'products', 'start_date', 'end_date', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
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
        $query = Promotion::find();

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
            'banner' => $this->banner,
            'name' => $this->name,
            'overview' => $this->overview,
            'content' => $this->content,
            'link_url' => $this->link_url,
            'discount_type' => $this->discount_type,
            'discount' => $this->discount,
            'usage_limit' => $this->usage_limit,
            'usage_current' => $this->usage_current,
            'apply_type' => $this->apply_type,
            'sales_over' => $this->sales_over,
            'products' => $this->products,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'is_top' => $this->is_top,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
            'count_views' => $this->count_views,
            'count_shares' => $this->count_shares,
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
            'discount_type' => $this->discount_type,
            'discount' => $this->discount,
            'usage_limit' => $this->usage_limit,
            'usage_current' => $this->usage_current,
            'apply_type' => $this->apply_type,
            'sales_over' => $this->sales_over,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'is_top' => $this->is_top,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
            'count_views' => $this->count_views,
            'count_shares' => $this->count_shares,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'modified_date' => $this->modified_date,
            'modified_user' => $this->modified_user,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'banner', $this->banner])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'overview', $this->overview])
            ->andFilterWhere(['like', 'link_url', $this->link_url])
            ->andFilterWhere(['like', 'products', $this->products]);
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
