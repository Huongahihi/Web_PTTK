<?php

namespace backend\modules\cms\models;

use Yii;
use common\components\FHtml;
use common\components\FModel;
use common\models\BaseModel;
use frontend\models\ViewModel;
use yii\helpers\ArrayHelper;

/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "cms_portfolio".
 */
class CmsPortfolio extends CmsPortfolioBase //\yii\db\ActiveRecord
{
    const LOOKUP = [];

    const COLUMNS_UPLOAD = ['image','banner',];

    public $order_by = 'sort_order asc,is_active desc,is_top desc,created_date desc,';

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];

    public static function getLookupArray($column) {
        if (key_exists($column, self::LOOKUP))
            return self::LOOKUP[$column];
        return [];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
        
            [['id', 'image', 'banner', 'name', 'overview', 'content', 'status', 'linkurl', 'testimonial_id', 'product_id', 'product_category_id', 'lang', 'sort_order', 'is_active', 'is_top', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['name'], 'required'],
            [['content'], 'string'],
            [['testimonial_id', 'product_id', 'sort_order', 'is_active', 'is_top'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['image', 'banner'], 'string', 'max' => 300],
            [['name', 'linkurl'], 'string', 'max' => 255],
            [['overview', 'tags'], 'string', 'max' => 2000],
            [['status', 'lang'], 'string', 'max' => 50],
            [['product_category_id'], 'string', 'max' => 500],
            [['created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
        ];
    }

    // Lookup Object: testimonial\n
    public $testimonial;
    public function getTestimonial() {
        if (!isset($this->testimonial))
        $this->testimonial = FHtml::getModel('cms_testimonial', '', $this->testimonial_id, '', false);

        return $this->testimonial;
    }
    public function setTestimonial($value) {
        $this->testimonial = $value;
    }

    // Lookup Object: product\n
    public $product;
    public function getProduct() {
        if (!isset($this->product))
        $this->product = FHtml::getModel('product', '', $this->product_id, '', false);

        return $this->product;
    }
    public function setProduct($value) {
        $this->product = $value;
    }

    // Lookup Object: product_category\n
    public $product_category;
    public function getProductCategory() {
        if (!isset($this->product_category))
        $this->product_category = FHtml::getModel('object_category', '', $this->product_category_id, '', false);

        return $this->product_category;
    }
    public function setProductCategory($value) {
        $this->product_category = $value;
    }


    public function prepareCustomFields() {
        parent::prepareCustomFields();

        $this->testimonial = self::getTestimonial();
        $this->product = self::getProduct();
        $this->product_category = self::getProductCategory();
    }


    public static function getRelatedObjects() {
        return self::OBJECTS_RELATED;
    }

    public static function getMetaObjects() {
        return self::OBJECTS_META;
    }

    public function beforeValidate()
    {
        if (is_array($this->tags))
            $this->tags = FHtml::encode($this->tags);

        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }

    public function afterFind() {
        $this->tags = FHtml::decode($this->tags);
        return parent::afterFind();
    }
}