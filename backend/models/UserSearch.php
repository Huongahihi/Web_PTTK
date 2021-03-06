<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\models\User;

/**
 * User represents the model behind the search form about `backend\models\User`.
 */
class UserSearch extends User{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lat', 'long', 'rate_count', 'point', 'role', 'status', 'is_online', 'created_at', 'updated_at'], 'integer'],
            [['code', 'name', 'username', 'image', 'overview', 'content', 'auth_key', 'password_hash', 'password_reset_token', 'birth_date', 'birth_place', 'gender', 'identity_card', 'email', 'phone', 'skype', 'address', 'country', 'state', 'city', 'post_code', 'organization', 'department', 'position', 'start_date', 'end_date', 'card_number', 'card_name', 'card_exp', 'card_cvv', 'type', 'last_login', 'last_logout', 'application_id'], 'safe'],
            [['rate', 'balance'], 'number'],
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
        $query = User::find();

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
            'name' => $this->name,
            'username' => $this->username,
            'image' => $this->image,
            'overview' => $this->overview,
            'content' => $this->content,
            'auth_key' => $this->auth_key,
            'password_hash' => $this->password_hash,
            'password_reset_token' => $this->password_reset_token,
            'birth_date' => $this->birth_date,
            'birth_place' => $this->birth_place,
            'gender' => $this->gender,
            'identity_card' => $this->identity_card,
            'email' => $this->email,
            'phone' => $this->phone,
            'skype' => $this->skype,
            'address' => $this->address,
            'country' => $this->country,
            'state' => $this->state,
            'city' => $this->city,
            'post_code' => $this->post_code,
            'organization' => $this->organization,
            'department' => $this->department,
            'position' => $this->position,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'lat' => $this->lat,
            'long' => $this->long,
            'rate' => $this->rate,
            'rate_count' => $this->rate_count,
            'card_number' => $this->card_number,
            'card_name' => $this->card_name,
            'card_exp' => $this->card_exp,
            'card_cvv' => $this->card_cvv,
            'balance' => $this->balance,
            'point' => $this->point,
            'role' => $this->role,
            'type' => $this->type,
            'status' => $this->status,
            'is_online' => $this->is_online,
            'last_login' => $this->last_login,
            'last_logout' => $this->last_logout,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'application_id' => $this->application_id,
        ]);
        } else {
            $query->andFilterWhere([
            'id' => $this->id,
            'content' => $this->content,
            'auth_key' => $this->auth_key,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'country' => $this->country,
            'state' => $this->state,
            'city' => $this->city,
            'organization' => $this->organization,
            'department' => $this->department,
            'position' => $this->position,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'lat' => $this->lat,
            'long' => $this->long,
            'rate' => $this->rate,
            'rate_count' => $this->rate_count,
            'balance' => $this->balance,
            'point' => $this->point,
            'role' => $this->role,
            'type' => $this->type,
            'status' => $this->status,
            'is_online' => $this->is_online,
            'last_login' => $this->last_login,
            'last_logout' => $this->last_logout,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'application_id' => $this->application_id,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'overview', $this->overview])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'birth_place', $this->birth_place])
            ->andFilterWhere(['like', 'identity_card', $this->identity_card])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'post_code', $this->post_code])
            ->andFilterWhere(['like', 'card_number', $this->card_number])
            ->andFilterWhere(['like', 'card_name', $this->card_name])
            ->andFilterWhere(['like', 'card_exp', $this->card_exp])
            ->andFilterWhere(['like', 'card_cvv', $this->card_cvv]);
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
