<?php
/**
 * Created by PhpStorm.
 * User: Quyen_Bui
 * Date: 7/12/2016
 * Time: 3:10 PM
 */

namespace common\components;

use backend\models\ObjectCategory;
use backend\modules\system\models\SettingsMenu;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use Yii;


class FFrontend extends FHtml
{
//    const LIST_URL = '/{name}-c{category_id}/list';
//    const VIEW_URL = '/{name}-p{id}-c{category_id}/view';
    const LIST_URL = '/{name}-c{category_id}';
    const VIEW_URL = '/{name}-p{id}-c{category_id}';
    const VIEWID_URL = '/{name}-p{id}';

    public $identityClass;

    public static function getFrontendMenu($controllerid = '', $action = '', $module = '') {
        if (empty($module))
            $module =  FHtml::currentApplicationId();
        if (empty($controllerid))
            $controllerid = FHtml::currentController();
        if (empty($action))
            $action = FHtml::currentAction();

        $result = null;

        if (FRONTEND_MENU_FROM_MODULE) {
            if (is_string(FRONTEND_MENU_FROM_MODULE) && !empty(FRONTEND_MENU_FROM_MODULE)) {
                $module = FHtml::settingApplicationDefaultModule(FRONTEND_MENU_FROM_MODULE);
            }

            $helper = FHtml::getApplicationHelper($module);
            if (isset($helper) && method_exists($helper, 'getFrontendMenu')) {
                $result = $helper::getFrontendMenu($controllerid, $action);
            }
            else {
                $object = FHtml::getModuleObject($module, FRONTEND);
                if (isset($object) && method_exists($object, 'getFrontendMenu'))
                    $result = $object::getFrontendMenu($controllerid, $action);
                else {
                    $result = \frontend\modules\cms\Cms::getFrontendMenu($controllerid, $action);
                }
            }
        }

        if (FRONTEND_MENU_FROM_DB) {
            $group = FRONTEND;
            $menu = null;
            //Get from database
            $menuList = FHtml::getModels('settings_menu', ['is_active' => 1, 'group' => $group], 'sort_order', -1, 1, true);
            $moduleMenu = [];

            if (isset($menuList) && !empty($menuList) && !is_string($menuList)) {
                $result1 = [];
                $result2 = [];
                $moduleList = [];
                $controller = $controllerid;
                foreach ($menuList as $menuItem) {
                    $child = null;
                    $type = '';
                    if ($menuItem->display_type == SettingsMenu::DISPLAY_TYPE_MEGA) {
                        $type = 'mega-v5';
                        $child = self::getCategoryItemMenu($menuItem->object_type, $menuItem->url . '/list', $menuItem->url . '/view', 4);
                    } else if ($menuItem->display_type == SettingsMenu::DISPLAY_TYPE_TREE) {
                        $type = 'tree';
                        $child = self::getCategoryMenu($controllerid, $action, $menuItem->object_type, $menuItem->url);
                    } else {
                        $type = 'single';
                    }


                    $moduleMenu[] = [
                        'name' => FHtml::t('common', $menuItem->name),
                        'url' => strpos($menuItem->url, 'http') === false ? FHtml::createUrl($menuItem->url) : $menuItem->url,
                        'active' => $controller == $menuItem->url,
                        'visible' => true || FHtml::isInRoles($menuItem->role),
                        'type' => $type,
                        'children' => $child,
                        'icon' => $menuItem->icon
                    ];
                }

            }

            if (is_array($moduleMenu) && !empty($moduleMenu)) {
                foreach ($moduleMenu as $menu_item) {
                    $result[] = $menu_item;
                }
            }
        }

        return $result;
    }

    public static function checkHiddenField($name, $array)
    {
        foreach ($array as $item) {
            if (strpos($item, '*') == 0) {
                if (strpos($name, trim($item, '*')) !== false) {
                    return true;
                }
            } else {
                if ($name == $item) {
                    return true;
                }
            }
        }

        return false;
    }

    public static function displayTreeMenu($item)
    {
        echo '<ul class="dropdown-menu">';

        foreach ($item as $children) {

            echo '<li class="';
            echo isset($children['children']) ? 'dropdown-submenu ' : '';
            echo (isset($children['active']) AND $children['active']) ? 'active' : '';
            echo '">';

            echo '<a href="';
            echo isset($children['url']) ? $children['url'] : 'javascript:void(0);';
            echo '">';

            echo Html::decode($children['label']);

            echo '</a>';

            if (isset($children['children']) AND is_array($children['children']) AND count($children['children']) != 0) {
                self::displayTreeMenu($children['children']);
            }
            echo '</li>';
        }
        echo '</ul>';

    }

    public static function displayMegaMenuDefault($item)
    {
        $count = count($item);
        if (empty($count))
            return '';
        $size = floor(12 / $count);
        if (empty($count))
            return '';
        foreach ($item as $children) {
            echo '<div class="col-md-' . $size . ' equal-height-in">';
            echo '<ul class="list-unstyled equal-height-list">';

            echo '<li><h3>' . $children['label'] . '</h3></li>';
            if (isset($children['children']) AND is_array($children['children']) AND count($children['children']) != 0) {
                foreach ($children['children'] as $child) {
                    $active = (isset($child['active']) AND $child['active']) ? ' class="active"' : '';
                    echo '<li' . $active . '>';
                    echo '<a href = "' . $child['url'] . '" >';
                    echo '<i class="' . $child['icon'] . '" ></i >';
                    echo Html::decode($child['label']);
                    echo '</a >';
                    echo '</li>';
                }
            }
            echo '</ul>';
            echo '</div>';
        }
    }

    public static function displayMegaMenuV5($item)
    {
        $count = count($item);
        if (empty($count))
            return;
        $size = floor(12 / $count);
        if (empty($count))
            return '';
        foreach ($item as $children) {
            echo '<div class="col-md-' . $size . ' col-sm-6">';

            foreach ($children as $little_children) {

                echo '<h3 class="mega-menu-heading"><a href="' . $little_children['url'] . '">' . $little_children['label'] . '</a></h3>';

                echo '<ul class="list-unstyled style-list">';
                if (isset($little_children['children']) AND is_array($little_children['children']) AND count($little_children['children']) != 0) {
                    foreach ($little_children['children'] as $child) {
                        $active = (isset($child['active']) AND $child['active']) ? ' class="active"' : '';
                        echo '<li' . $active . '>';
                        echo '<a href = "' . $child['url'] . '" >';
                        echo Html::decode($child['label']);
                        echo '</a >';
                        echo '</li>';
                    }
                }
                echo '</ul>';
            }
            echo '</div>';
        }
    }

    public static function displayMegaMenuV8($item)
    {
        $count = count($item);
        if (empty($count))
            return '';

        $size = floor(12 / $count);
        if (empty($count))
            return '';
        foreach ($item as $children) {
            echo '<div class="col-md-' . $size . ' md-margin-bottom-30">';
            foreach ($children as $little_children) {
                echo '<h2><a href="' . $little_children['url'] . '">' . $little_children['label'] . '</a></h2>';
                echo '<ul class="dropdown-link-list">';
                if (isset($little_children['children']) AND is_array($little_children['children']) AND count($little_children['children']) != 0) {
                    foreach ($little_children['children'] as $child) {
                        $active = (isset($child['active']) AND $child['active']) ? ' class="active"' : '';
                        echo '<li' . $active . '>';
                        echo '<a href = "' . $child['url'] . '" >';
                        echo Html::decode($child['label']);
                        echo '</a >';
                        echo '</li>';
                    }
                }
                echo '</ul>';
            }
            echo '</div>';
        }
    }


    public static function displayMegaMenuV8Mix($item, $layout)
    {
        $icon = 'fa fa-volume-up';

        if ($layout == 'cii') {
            $size0 = 2;
            $size1 = 5;
            $size2 = 5;
        } elseif ($layout == 'cbi') {
            $size0 = 3;
            $size1 = 5;
            $size2 = 4;
        } else {
            $size0 = 4;
            $size1 = 4;
            $size2 = 4;
        }

        if (strpos($layout, 'c') !== false) {
            echo '<div class="col-md-' . $size0 . ' md-margin-bottom-30">';
            echo '<ul class="dropdown-link-list">';
            if (isset($item['left-content']) && count($item['left-content']) != 0) {
                $items = $item['left-content'];
                foreach ($items as $child) {
                    $active = (isset($child['active']) AND $child['active']) ? ' class="active"' : '';
                    echo '<li' . $active . '>';
                    echo '<a href = "' . $child['url'] . '" >';
                    echo Html::decode($child['label']);
                    echo '</a >';
                    echo '</li>';
                }
            }
            echo '</ul>';
            echo '</div>';
        }

        if ($layout == 'bii') {
            $first = $item['right-content'][0];
            echo '<div class="col-md-' . $size0 . ' md-margin-bottom-30">';
            echo '<div class="blog-grid">';
            if (isset($first)) {
                echo '<a href="' . $first['url'] . '">';
                echo '<img class="img-responsive" src="' . $first['image'] . '" alt="">';
                echo '</a>';
                echo '<h3 class="blog-grid-title-sm">';
                echo '<a href="' . $first['url'] . '">' . Html::decode($first['label']) . '</a>';
                echo '</h3>';
                if ($first['object_type'] == 'music_song') {
                    echo '<div class="blog-date-time">' . $first['release_date'] . '</div>';
                    echo strlen($first['singer']) != 0 ? '<h4>' . $first['singer'] . '</h4>' : '';
                }
            }
            echo '</div>';
            echo '</div>';
        }


        $array1 = array();
        $array2 = array();

        if (isset($item['right-content']) && count($item['right-content']) != 0) {
            $items2 = $item['right-content'];
            if ($layout == 'cbi') {
                $array1 = $items2[0];
                array_shift($items2);
                $array2 = $items2;
            } elseif ($layout == 'bii') {
                array_shift($items2);
                list($array1, $array2) = array_chunk($items2, ceil(count($items2) / 2));
            } else {
                list($array1, $array2) = array_chunk($items2, ceil(count($items2) / 2));
            }
        }


        if (count($array1) != 0) {
            echo '<div class="col-md-' . $size1 . ' md-margin-bottom-30">';
            if ($layout == 'cbi') {
                echo '<div class="blog-grid">';
                if (isset($array1)) {
                    echo '<a href="' . $array1['url'] . '">';
                    echo '<img class="img-responsive" src="' . $array1['image'] . '" alt="">';
                    echo '</a>';
                    echo '<h3 class="blog-grid-title-sm">';
                    echo '<a href="' . $array1['url'] . '">' . Html::decode($array1['label']) . '</a>';
                    echo '</h3>';

                }
                echo '</div>';
            } else {
                foreach ($array1 as $child1) {
                    echo '<div class="blog-thumb  margin-bottom-20">';
                    echo '<div class="blog-thumb-hover">';
                    echo '<img src="' . $child1['image'] . '" alt="">';
                    echo '<a class="hover-grad" href="' . $child1['url'] . '"><i class="' . $icon . '"></i></a>';
                    echo '</div>';
                    echo '<div class="blog-thumb-desc">';
                    echo '<h3><a href="' . $child1['url'] . '">' . Html::decode($child1['label']) . '</a></h3>';
                    echo ' <ul class="blog-thumb-info">';

                    echo '</ul>';
                    echo ' </div>';
                    echo '</div>';
                }
            }

            echo '</div>';
        }


        if (count($array2) != 0) {
            echo '<div class="col-md-' . $size2 . '">';
            foreach ($array2 as $child2) {
                echo '<div class="blog-thumb  margin-bottom-20">';
                echo '<div class="blog-thumb-hover">';
                echo '<img src="' . $child2['image'] . '" alt="">';
                echo '<a class="hover-grad" href="' . $child2['url'] . '"><i class="fa fa-volume-up"></i></a>';
                echo '</div>';
                echo '<div class="blog-thumb-desc">';
                echo '<h3><a href="' . $child2['url'] . '">' . Html::decode($child2['label']) . '</a></h3>';
                echo ' <ul class="blog-thumb-info">';

                echo '</ul>';
                echo ' </div>';
                echo '</div>';
            }
            echo '</div>';
        }

    }

    public static function getCategoryItemMenu($object_type, $list_url, $detail_url, $column_count = 4)
    {
        $categories = FHtml::getCategoriesList($object_type);
        $total = count($categories);

        $total_one_column = floor($total / $column_count);
        if ($total_one_column == 0)
            $total_one_column = 1;

        $result = array();

        /* @var $category \backend\models\Category */

        foreach ($categories as $category) {
            $children = array();
            $modelList = FHtml::getModelsList($object_type, ['category_id' => $category->id])->models;
            foreach ($modelList as $item) {

                $children[] = array(
                    'label' => $item->name,
                    'url' => FHtml::createUrl([$detail_url, 'id' => $item->id]),
                );
            }
            $result[] = array(
                'label' => $category->name,
                'url' => FHtml::createUrl([$list_url, 'category_id' => $category->id]),
                'children' => $children
            );

        }

        $new = array_chunk($result, $total_one_column);

        $result = array();

        foreach ($new as $key => $value) {
            if ($key < $column_count) {
                $result[$key] = $value;
            } else {
                $result[$key % $column_count] = array_merge($result[$key % $column_count], $value);
            }
        }

        return $result;
    }

    public static function getCategoryMenu($controller, $action, $object_type, $list_url)
    {
        $objects = FHtml::getCategoriesList($object_type);
        $result = array();
        foreach ($objects as $item) {
            $result[] = array(
                'label' => $item->name,
                'url' => FHtml::createUrl($list_url, ['category_id' => $item->id]),
            );
        }

        return $result;
    }

    public static function getArrayItemMenu($menuArrays = [])
    {
        foreach ($menuArrays as $label => $url) {
            $children = array();

            $result[] = array(
                'label' => FHtml::t('common', $label),
                'url' => FHtml::createUrl($url),
                'children' => null
            );

        }

        return $result;
    }

    public static function getModelsItemMenu($object_type, $linkurl = '', $params = [], $orderby = '', $name_field = 'name', $id_field = 'id')
    {
        $models = FHtml::getModels($object_type, $params, $orderby);
        $menuList = [];

        if (empty($models))
            return null;

        foreach ($models as $item) {
            $menuList = array_merge($menuList, [FHtml::getFieldValue($item, $name_field) => str_replace('{' . $id_field . '}', FHtml::getFieldValue($item, $id_field), $linkurl)]);
        }

        return self::getArrayItemMenu($menuList);
    }

    public static function getMegaContentV5($object_type = 'product', $controllerURL = 'product', $subItemsField = 'products', $column_count = 4)
    {
        /* @var $category \backend\models\ObjectCategory */
        $categories = FHtml::getCategoriesByType($object_type);

        $total = count($categories);

        $total_one_column = floor($total / $column_count);

        $result = array();
        foreach ($categories as $category) {

            $children = array();
            $items = FHtml::getFieldValue($category, $subItemsField);
            if (is_array($items)) {
                foreach ($items as $product) {
                    $children[] = array(
                        'label' => FHtml::getFieldValue($product, ['name', 'title']),
                        'url' => FHtml::createUrl(['/' . $controllerURL, 'id' => FHtml::getFieldValue($product, ['name', 'id'])]),
                    );
                }
            }
            $result[] = array(
                'label' => $category->name,
                'url' => FHtml::createUrl(['/' . $controllerURL, 'category_id' => $category->id]),
                'children' => $children
            );

        }

        if (empty($result))
            return $result;

        $new = array_chunk($result, $total_one_column);

        $result = array();

        foreach ($new as $key => $value) {
            if ($key < $column_count) {
                $result[$key] = $value;
            } else {
                $result[$key % $column_count] = array_merge($result[$key % $column_count], $value);
            }
        }

        return $result;
    }

    public static function getMegaContentV8($controller, $action, $object_type = 'product', $controllerURL = 'category', $column_count = 4)
    {
        $pathInfo = Yii::$app->request->pathInfo;

        if (strlen($pathInfo) != 0) {
            $pathInfo_array = explode('/', Yii::$app->request->pathInfo);
            $controller = $pathInfo_array[0];
            $action = $pathInfo_array[1];
        }

        $params_id = FHtml::getRequestParam('id');
        /* @var $category \backend\models\ObjectCategory */
        $queryParams = empty($object_type) ? '' : ' AND object_type = "' . $object_type . '""';
        $categories = ObjectCategory::find()->where('parent_id = 0 AND is_active = 1' . $queryParams)->all();

        $objects = ObjectCategory::find()->where('is_active = 1' . $queryParams)->all();

        $total = count($categories);
        if ($total <= $column_count) {
            $total_one_column = 1;
        } else {
            $total_one_column = floor($total / $column_count - 1);
        }

        $result = array();
        foreach ($categories as $category) {

            $result[] = array(
                'label' => $category->name,
                'url' => FHtml::createUrl(['/' . $controllerURL, 'id' => $category->id]),
                'active' => $controller == \Globals::TABLE_CATEGORIES && $action == 'view' && $params_id == $category->id,
                'children' => self::getChildrenOfCategory($category, $objects, $controller, $action, $params_id),
            );
        }

        $new = array_chunk($result, $total_one_column);

        $result = array();

        foreach ($new as $key => $value) {
            if ($key < $column_count) {
                $result[$key] = $value;
            } else {
                $result[$key % $column_count] = array_merge($result[$key % $column_count], $value);
            }
        }

        return $result;
    }

    public static function getMegaContentV8Mix($type = 'cii', $object_type = 'product', $controllerURL = 'product', $condition = '') //$type = cii, cbi, bii c: category, b:big item, i: normal item
    {
        $left_content = array();
        if (strpos($type, 'c') !== false) {
            $main_categories = ObjectCategory::find()->where('parent_id = 0 AND is_active = 1')->all();
            foreach ($main_categories as $category) {
                $left_content[] = array(
                    'label' => $category->name,
                    'url' => FHtml::createUrl(['/' . $controllerURL, 'category_id' => $category->id]),
                );
            }
        }

        $right_content = array();
        $items = [];

        if ($condition == 'top') {
            $items = FHtml::getModels($object_type, ['is_top = 1'], 'count_view DESC');
        }

        foreach ($items as $song) {
            $right_content[] = array(
                'label' => $song->name,
                'url' => FHtml::createUrl(['/' . $controllerURL, 'id' => $song->id]),
                'image' => FHtml::getImageUrl(FHtml::getFieldValue($song, ['thumbnail', 'image']), $object_type, FRONTEND),
                'created_date' => FHtml::getFieldValue($song, ['created_date', 'release_date']),
                'description' => FHtml::getFieldValue($song, ['overview', 'description']),
                'object_type' => $object_type
            );
        }

        $result = array(
            'left-content' => $left_content,
            'right-content' => $right_content
        );
        return $result;

    }

    public static function getTreeContentByCategory($controller, $action)
    {
        $pathInfo = Yii::$app->request->pathInfo;

        if (strlen($pathInfo) != 0) {
            $pathInfo_array = explode('/', Yii::$app->request->pathInfo);
            $controller = $pathInfo_array[0];
            $action = $pathInfo_array[1];
        }

        $params_id = FHtml::getRequestParam('id');

        $objects = ObjectCategory::find()->where('is_active = 1')->all();
        /* @var $item \backend\models\ObjectCategory */

        $result = array();
        foreach ($objects as $item) {
            if ($item->parent_id == 0) {

                $menu_item = array(
                    'label' => $item->name,
                    'active' => $controller == \Globals::TABLE_CATEGORIES && $action == 'view' && $params_id == $item->id,
                    'url' => FHtml::createUrl(['/category/view', 'id' => $item->id]),
                );
                $check = self::getChildrenOfCategory($item, $objects, $controller, $action, $params_id);

                if (count($check) != 0) {
                    $menu_item['children'] = $check;
                }

                $result[] = $menu_item;
            }
        }

        return $result;
    }

    public static function getChildrenOfCategory($item, $objects, $controller, $action, $params_id)
    {
        $result = array();
        $value = $item->id;
        $keys = array_values(array_filter($objects, function ($arrayValue) use ($value) {
            return isset($arrayValue['parent_id']) && $arrayValue['parent_id'] == $value;
        }));
        foreach ($keys as $child) {
            $menu_item = array(
                'label' => $child->name,
                'active' => $controller == \Globals::TABLE_CATEGORIES && $action == 'view' && $params_id == $child->id,
                'url' => FHtml::createUrl(['/category/view', 'id' => $child->id]),
            );
            $check = self::getChildrenOfCategory($child, $objects, $controller, $action, $params_id);

            if (count($check) != 0) {
                $menu_item['children'] = $check;
            }

            $result[] = $menu_item;
        }
        return $result;
    }

    public static function getModelsChildrenMenu($object_type, $linkurl = '', $params = [], $orderby = '', $limit = 20)
    {
        $models = FHtml::getModels($object_type, $params, $orderby, $limit);

        $menu_children = array();
        foreach ($models as $model){
            $menu_children[] = [
                'name' => FHtml::getFieldValue($model, ['name', 'title']),
                'url' => FHtml::createUrl($linkurl, $params)
            ];
        }
        return $menu_children;
    }

    public static function getCategoriesChildrenMenu($object_type, $linkurl = '', $params = [], $orderby = '')
    {
        if (empty($linkurl))
            $linkurl = $object_type . self::LIST_URL;

        if (empty($params))
            $params = ['object_type' => $object_type, 'is_active' => 1];

        $models = ArrayHelper::map(ObjectCategory::findAll($params), 'id', 'name');
        $menu_children = array();
        foreach ($models as $key=>$value){
            $menu_children[$key] = [
                'name' => $value,
                'url' => FHtml::createUrl($linkurl, ['category_id' => $key, 'name' => $value])
            ];
        }
        return $menu_children;
    }

    public static function createViewUrl($controller, $model = null, $params = [] , $type ='') {
        if($type == ''){
            if (empty($model))
                return $controller . self::VIEW_URL;
            $name = FHtml::getFieldValue($model, ['slug', 'name', 'title']);
            $id = FHtml::getFieldValue($model, ['id']);
            $category_id = FHtml::getFieldValue($model, ['category_id']);
            return FHtml::createUrl($controller . self::VIEW_URL, array_merge(['id' => $id, 'name' => $name, 'category_id' => $category_id], $params));
        }
        else{
            if (empty($model))
                return $controller . self::VIEWID_URL;
            $name = FHtml::getFieldValue($model, ['slug', 'name', 'title']);
            $id = FHtml::getFieldValue($model, ['id']);
            return FHtml::createUrl($controller . self::VIEWID_URL, array_merge(['id' => $id, 'name' => $name], $params));
        }

    }

    public static function createListUrl($controller, $model = null, $params = []) {
        if (empty($model))
            return $controller . self::LIST_URL;

        $name = FHtml::getFieldValue($model, ['slug', 'name', 'title']);
        $category_id = FHtml::getFieldValue($model, ['category_id', 'id']);
        return FHtml::createUrl($controller . self::LIST_URL, array_merge(['category_id' => $category_id, 'name' => $name], $params));
    }

    public static function createHomeUrl($params = []) {
        return FHtml::createUrl('/home', $params);
    }

    public static function createAboutUrl($params = []) {
        return FHtml::createUrl('/about', $params);
    }

    public static function createServiceUrl($params = []) {
        return FHtml::createUrl('/service', $params);
    }

    public static function createFAQUrl($params = []) {
        return FHtml::createUrl('/faq', $params);
    }

    public static function createBlogsUrl($params = []) {
        return FHtml::createUrl('/blog', $params);
    }

    public static function createProductUrl($params = []) {
        return FHtml::createUrl('/product', $params);
    }

    public static function createContactUrl($params = []) {
        return FHtml::createUrl('/contact', $params);
    }

    public static function createLoginUrl($params = []) {
        return FHtml::createUrl('/login', $params);
    }

    public static function createCartViewUrl($params = []) {
        return FHtml::createUrl('/ecommerce/order/viewcart', $params);
    }

    public static function createCartBillUrl($params = []) {
        return FHtml::createUrl('/ecommerce/order/bill', $params);
    }
}