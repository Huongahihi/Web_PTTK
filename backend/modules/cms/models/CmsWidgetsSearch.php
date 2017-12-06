<?php

namespace backend\modules\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\cms\models\CmsWidgets;

/**
 * CmsWidgets represents the model behind the search form about `backend\modules\cms\models\CmsWidgets`.
 */
class CmsWidgetsSearch extends CmsWidgets{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'columns_count', 'items_count', 'show_viewmore', 'show_headline', 'is_active', 'sort_order'], 'integer'],
            [['name', 'page_code', 'title', 'overview', 'content', 'display_type', 'width_css', 'background_css', 'color_bg', 'color', 'style', 'item_style', 'item_layout', 'viewmore_url', 'created_date', 'created_user', 'application_id'], 'safe'],
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
        $query = CmsWidgets::find();

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
            'name' => $this->name,
            'page_code' => $this->page_code,
            'title' => $this->title,
            'overview' => $this->overview,
            'content' => $this->content,
            'display_type' => $this->display_type,
            'columns_count' => $this->columns_count,
            'items_count' => $this->items_count,
            'width_css' => $this->width_css,
            'background_css' => $this->background_css,
            'color_bg' => $this->color_bg,
            'color' => $this->color,
            'style' => $this->style,
            'item_style' => $this->item_style,
            'item_layout' => $this->item_layout,
            'show_viewmore' => $this->show_viewmore,
            'show_headline' => $this->show_headline,
            'viewmore_url' => $this->viewmore_url,
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
            'columns_count' => $this->columns_count,
            'items_count' => $this->items_count,
            'show_viewmore' => $this->show_viewmore,
            'show_headline' => $this->show_headline,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'page_code', $this->page_code])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'overview', $this->overview])
            ->andFilterWhere(['like', 'display_type', $this->display_type])
            ->andFilterWhere(['like', 'width_css', $this->width_css])
            ->andFilterWhere(['like', 'background_css', $this->background_css])
            ->andFilterWhere(['like', 'color_bg', $this->color_bg])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'style', $this->style])
            ->andFilterWhere(['like', 'item_style', $this->item_style])
            ->andFilterWhere(['like', 'item_layout', $this->item_layout])
            ->andFilterWhere(['like', 'viewmore_url', $this->viewmore_url]);
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
