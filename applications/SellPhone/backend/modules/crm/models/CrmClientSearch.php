<?php

namespace backend\modules\crm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\crm\models\CrmClient;

/**
 * CrmClient represents the model behind the search form about `backend\modules\crm\models\CrmClient`.
 */
class CrmClientSearch extends CrmClient{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_active'], 'integer'],
            [['image', 'code', 'name', 'description', 'content', 'start_date', 'contact_name', 'contact_title', 'mobile', 'website', 'address', 'address2', 'phone', 'email', 'fax', 'company', 'business_license', 'tax_code', 'payment_info', 'payment_term', 'zip_code', 'city', 'country', 'region', 'note', 'tags', 'type', 'status', 'sale_user', 'ip_address', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
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
        $query = CrmClient::find();

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
            'contact_title' => $this->contact_title,
            'mobile' => $this->mobile,
            'website' => $this->website,
            'address' => $this->address,
            'address2' => $this->address2,
            'phone' => $this->phone,
            'email' => $this->email,
            'fax' => $this->fax,
            'company' => $this->company,
            'business_license' => $this->business_license,
            'tax_code' => $this->tax_code,
            'payment_info' => $this->payment_info,
            'payment_term' => $this->payment_term,
            'zip_code' => $this->zip_code,
            'city' => $this->city,
            'country' => $this->country,
            'region' => $this->region,
            'note' => $this->note,
            'tags' => $this->tags,
            'is_active' => $this->is_active,
            'type' => $this->type,
            'status' => $this->status,
            'sale_user' => $this->sale_user,
            'ip_address' => $this->ip_address,
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
            'start_date' => $this->start_date,
            'contact_title' => $this->contact_title,
            'region' => $this->region,
            'note' => $this->note,
            'is_active' => $this->is_active,
            'type' => $this->type,
            'status' => $this->status,
            'sale_user' => $this->sale_user,
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
            ->andFilterWhere(['like', 'contact_name', $this->contact_name])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'address2', $this->address2])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'business_license', $this->business_license])
            ->andFilterWhere(['like', 'tax_code', $this->tax_code])
            ->andFilterWhere(['like', 'payment_info', $this->payment_info])
            ->andFilterWhere(['like', 'payment_term', $this->payment_term])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'ip_address', $this->ip_address]);
        }

        if (empty(FHtml::getRequestParam('sort')))
            $query->orderby(FHtml::getOrderBy($this));

        return $dataProvider;
    }
}
