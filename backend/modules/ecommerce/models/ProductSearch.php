<?php

namespace backend\modules\ecommerce\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\components\FHtml;

use backend\modules\ecommerce\models\Product;

/**
 * Product represents the model behind the search form about `backend\modules\ecommerce\models\Product`.
 */
class ProductSearch extends Product{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_active', 'is_hot', 'is_top', 'discount', 'sort_order', 'count_views', 'count_comments', 'count_purchase', 'count_likes', 'count_rates', 'rates'], 'integer'],
            [['thumbnail', 'image', 'banner', 'code', 'name', 'overview', 'content', 'unit', 'currency', 'color', 'type', 'status', 'brand_id', 'category_id', 'promotion_id', 'quantity', 'tax', 'qrcode_image', 'barcode_image', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'safe'],
            [['cost', 'price'], 'number'],
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
        $query = Product::find();

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
            'cost' => $this->cost,
            'price' => $this->price,
            'unit' => $this->unit,
            'currency' => $this->currency,
            'color' => $this->color,
            'type' => $this->type,
            'status' => $this->status,
            'brand_id' => $this->brand_id,
            'category_id' => $this->category_id,
            'is_active' => $this->is_active,
            'is_hot' => $this->is_hot,
            'is_top' => $this->is_top,
            'promotion_id' => $this->promotion_id,
            'quantity' => $this->quantity,
            'discount' => $this->discount,
            'tax' => $this->tax,
            'sort_order' => $this->sort_order,
            'count_views' => $this->count_views,
            'count_comments' => $this->count_comments,
            'count_purchase' => $this->count_purchase,
            'count_likes' => $this->count_likes,
            'count_rates' => $this->count_rates,
            'rates' => $this->rates,
            'qrcode_image' => $this->qrcode_image,
            'barcode_image' => $this->barcode_image,
            'created_date' => $this->created_date,
            'created_user' => $this->created_user,
            'modified_date' => $this->modified_date,
            'modified_user' => $this->modified_user,
            'application_id' => $this->application_id,
        ]);
        } else {
            $query->andFilterWhere([
            'id' => $this->id,
            'code' => $this->code,
            'content' => $this->content,
            'cost' => $this->cost,
            'price' => $this->price,
            'unit' => $this->unit,
            'currency' => $this->currency,
            'color' => $this->color,
            'type' => $this->type,
            'status' => $this->status,
            'brand_id' => $this->brand_id,
            'is_active' => $this->is_active,
            'is_hot' => $this->is_hot,
            'is_top' => $this->is_top,
            'promotion_id' => $this->promotion_id,
            'discount' => $this->discount,
            'tax' => $this->tax,
            'sort_order' => $this->sort_order,
            'count_views' => $this->count_views,
            'count_comments' => $this->count_comments,
            'count_purchase' => $this->count_purchase,
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
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'overview', $this->overview])
            ->andFilterWhere(['like', 'category_id', $this->category_id])
            ->andFilterWhere(['like', 'quantity', $this->quantity])
            ->andFilterWhere(['like', 'qrcode_image', $this->qrcode_image])
            ->andFilterWhere(['like', 'barcode_image', $this->barcode_image]);
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
