<?php
namespace common\widgets\fgrid;

use backend\modules\cms\models\CmsBlogs;
use common\components\FHtml;
use yii\helpers\ArrayHelper;

class FBlog extends FGrid
{
    public function run()
    {
        $this::prepareData();

        return parent::run();
    }

    protected function prepareData()
    {
        if (empty($this->object_type))
            $this->object_type = 'cms_blogs';

        $this->image_folder = !empty($this->image_folder) ? $this->image_folder : 'cms-blogs';

        $this->display_type = !empty($this->display_type) ? $this->display_type : FHtml::generateRandomInArray(['fgrid1', 'fgrid2', 'fmasonry']);

        $this->title = !empty($this->title) ? $this->title : '';

        $this->overview = !empty($this->overview) ? $this->overview : '';

        $this->title_display_type = !empty($this->title_display_type) ? $this->title_display_type : FHtml::HEADLINE_TYPE_CENTER_V2;

        $this->item_layout = !empty($this->item_layout) ? $this->item_layout : FHtml::LAYOUT_NO_LABEL;

        $this->link_url = !empty($this->link_url) ? $this->link_url : 'news';

        $this->viewmore_url = !empty($this->viewmore_url) ? $this->viewmore_url : 'news';

        $this->field_overview = !empty($this->field_overview) ? $this->field_overview : 'overview';

        //$this->items_count = !empty($this->items_count) ? $this->items_count : 12;

        $this->columns_count = !empty($this->columns_count) ? $this->columns_count : 4;

        $this->background_css = !empty($this->background_css) ? $this->background_css : '';

        $this->width_css = !empty($this->width_css) ? $this->width_css : '';

        if (!isset($this->items))
            $this->items = CmsBlogs::find()->where(ArrayHelper::merge($this->items_filter, ['is_active' => 1]))->limit($this->items_count)->orderBy('name ASC')->all();

        parent::prepareData(); // TODO: Change the autogenerated stub
    }
}

?>