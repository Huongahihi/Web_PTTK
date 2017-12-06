<?php

namespace backend\modules\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\cms\models\CmsSlide;

/**
 * CmsSlide represents the model behind the search form about `backend\modules\cms\models\CmsSlide`.
 */
class CmsSlideSearch extends CmsSlide{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sort_order', 'is_active'], 'integer'],
            [['image', 'name', 'overview', 'transition_type', 'transition_speed', 'alignment', 'lang', 'url1_label', 'url1_link', 'url2_label', 'url2_link', 'url3_label', 'url3_link', 'application_id'], 'safe'],
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
        $query = CmsSlide::find();

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
            'name' => $this->name,
            'overview' => $this->overview,
            'transition_type' => $this->transition_type,
            'transition_speed' => $this->transition_speed,
            'alignment' => $this->alignment,
            'lang' => $this->lang,
            'url1_label' => $this->url1_label,
            'url1_link' => $this->url1_link,
            'url2_label' => $this->url2_label,
            'url2_link' => $this->url2_link,
            'url3_label' => $this->url3_label,
            'url3_link' => $this->url3_link,
            'sort_order' => $this->sort_order,
            'is_active' => $this->is_active,
            'application_id' => $this->application_id,
        ]);
        } else {
            $query->andFilterWhere([
            'id' => $this->id,
            'transition_type' => $this->transition_type,
            'transition_speed' => $this->transition_speed,
            'alignment' => $this->alignment,
            'lang' => $this->lang,
            'sort_order' => $this->sort_order,
            'is_active' => $this->is_active,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'overview', $this->overview])
            ->andFilterWhere(['like', 'url1_label', $this->url1_label])
            ->andFilterWhere(['like', 'url1_link', $this->url1_link])
            ->andFilterWhere(['like', 'url2_label', $this->url2_label])
            ->andFilterWhere(['like', 'url2_link', $this->url2_link])
            ->andFilterWhere(['like', 'url3_label', $this->url3_label])
            ->andFilterWhere(['like', 'url3_link', $this->url3_link]);
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
