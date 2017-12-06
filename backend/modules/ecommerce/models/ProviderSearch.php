<?php

namespace backend\modules\ecommerce\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\ecommerce\models\Provider;

/**
 * Provider represents the model behind the search form about `backend\modules\ecommerce\models\Provider`.
 */
class ProviderSearch extends Provider{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rate', 'is_top', 'is_active', 'sort_order'], 'integer'],
            [['image', 'code', 'name', 'description', 'content', 'start_date', 'contact_name', 'phone', 'email', 'address', 'website', 'city', 'country', 'type', 'status', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
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
        $query = Provider::find();

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
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'content' => $this->content,
            'start_date' => $this->start_date,
            'contact_name' => $this->contact_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'website' => $this->website,
            'city' => $this->city,
            'country' => $this->country,
            'lat' => $this->lat,
            'long' => $this->long,
            'rate' => $this->rate,
            'type' => $this->type,
            'status' => $this->status,
            'is_top' => $this->is_top,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
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
            'city' => $this->city,
            'country' => $this->country,
            'lat' => $this->lat,
            'long' => $this->long,
            'rate' => $this->rate,
            'type' => $this->type,
            'status' => $this->status,
            'is_top' => $this->is_top,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'modified_date' => $this->modified_date,
            'modified_user' => $this->modified_user,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'start_date', $this->start_date])
            ->andFilterWhere(['like', 'contact_name', $this->contact_name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'website', $this->website]);
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
