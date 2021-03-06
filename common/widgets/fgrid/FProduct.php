<?php
namespace common\widgets\fgrid;

use backend\modules\ecommerce\models\Product;
use common\components\FHtml;
use yii\helpers\ArrayHelper;

class FProduct extends FGrid
{
    public function run()
    {
        $this::prepareData();

        return parent::run();
    }

    protected function prepareData()
    {
        if (empty($this->object_type))
            $this->object_type = 'product';

        $this->image_folder = !empty($this->image_folder) ? $this->image_folder : 'product';

        $this->display_type = !empty($this->display_type) ? $this->display_type : 'fgrid1';

        $this->title = isset($this->title) ? $this->title : '';

        $this->overview = isset($this->overview) ? $this->overview : '';

        $this->title_display_type = isset($this->title_display_type) ? $this->title_display_type : FHtml::HEADLINE_TYPE_CENTER_V2;

        $this->item_layout = isset($this->item_layout) ? $this->item_layout : FHtml::LAYOUT_NO_LABEL;

        $this->link_url = isset($this->link_url) ? $this->link_url : 'ecommerce/product/view';

        //$this->viewmore_url = !isset($this->viewmore_url) ? $this->viewmore_url : 'ecommerce/product/list';

        $this->field_overview = isset($this->field_overview) ? $this->field_overview : 'overview';

        //$this->items_count = !empty($this->items_count) ? $this->items_count : 12;

        $this->columns_count = !empty($this->columns_count) ? $this->columns_count : 4;

        $this->background_css = !empty($this->background_css) ? $this->background_css : '';

        $this->width_css = !empty($this->width_css) ? $this->width_css : '';

        $this->show_price = isset($this->show_price) ? $this->show_price : true;
        $this->show_rate = isset($this->show_rate) ? $this->show_rate : true;

        if (!isset($this->items))
            $this->items = Product::find(ArrayHelper::merge($this->items_filter, ['is_active' => 1]))->limit($this->items_count)->orderBy('name ASC')->all();

        parent::prepareData(); // TODO: Change the autogenerated stub
    }
}

?>