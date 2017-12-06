<?php

namespace backend\modules\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\cms\models\CmsContact;

/**
 * CmsContact represents the model behind the search form about `backend\modules\cms\models\CmsContact`.
 */
class CmsContactSearch extends CmsContact{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lat', 'long', 'sort_order', 'is_online', 'is_top', 'is_active'], 'integer'],
            [['avatar', 'name', 'overview', 'phone', 'email', 'address', 'linkurl', 'live_chat', 'skype', 'facebook', 'map_url', 'city', 'country', 'type', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
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
        $query = CmsContact::find();

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
            'avatar' => $this->avatar,
            'name' => $this->name,
            'overview' => $this->overview,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'linkurl' => $this->linkurl,
            'live_chat' => $this->live_chat,
            'skype' => $this->skype,
            'facebook' => $this->facebook,
            'map_url' => $this->map_url,
            'city' => $this->city,
            'country' => $this->country,
            'lat' => $this->lat,
            'long' => $this->long,
            'type' => $this->type,
            'sort_order' => $this->sort_order,
            'is_online' => $this->is_online,
            'is_top' => $this->is_top,
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
            'country' => $this->country,
            'lat' => $this->lat,
            'long' => $this->long,
            'type' => $this->type,
            'sort_order' => $this->sort_order,
            'is_online' => $this->is_online,
            'is_top' => $this->is_top,
            'is_active' => $this->is_active,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'modified_date' => $this->modified_date,
            'modified_user' => $this->modified_user,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'overview', $this->overview])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'linkurl', $this->linkurl])
            ->andFilterWhere(['like', 'live_chat', $this->live_chat])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'map_url', $this->map_url]);
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
