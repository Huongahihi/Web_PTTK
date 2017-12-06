<?php

namespace frontend\modules\ecommerce;
use backend\modules\ecommerce\models\EcommerceOrder;
use backend\modules\ecommerce\models\Product;
use backend\modules\ecommerce\models\Promotion;
use backend\modules\ecommerce\models\Provider;
use common\components\FHtml;
use frontend\components\Helper;
use Yii;
/**
 * ecommerce module definition class
 */
class Ecommerce extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\ecommerce\controllers';

    public static function getModuleName() {
        return 'ecommerce';
    }
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }


    public static function getFrontendMenu($controller = '', $action = '', $module = 'ecommerce')
    {
        return array(
            array(
                'type' => 'single',
                'active' => $controller == 'site' && $action == 'index',
                'name' => Yii::t('common', 'Home'),
                'url' => FHtml::createUrl('/'),
            ),
            array(
                'type' => 'tree',
                'active' => $controller == 'ecommerce' && $action == 'index',
                'name' => Yii::t('common', 'Products'),
                'url' => '#',
                'children' => Helper::getModelsItemMenu('products', 'ecommerce/product/view?id={id}', ['is_top' => 1], 'name asc')
            ),
            array(
                'type' => 'tree',
                'active' => $controller == 'news' && $action == 'index',
                'name' => Yii::t('common', 'News & Promotions'),
                'url' => FHtml::createUrl('cms/news'),
                //'children' => Helper::getModelsItemMenu('travel_itinerary', 'travel/travel/plan?itineraryid={id}', ['is_system' => 1, 'is_top' => 1], 'city asc')
            ),
            array(
                'type' => 'tree',
                'active' => $controller == 'about' && $action == 'index',
                'name' => Yii::t('common', 'About'),
                'url' => FHtml::createUrl('/about'),
            ),
            array(
                'type' => 'tree',
                'active' => $controller == 'contact' && $action == 'index',
                'name' => Yii::t('common', 'Contact Us'),
                'url' => FHtml::createUrl('/contact'),
            ),
        );
    }

    public static function getProducts($params = [], $order_by = null, $limit = -1, $page = 1) {
        return Product::findAll($params, $order_by, $limit, $page, true);
    }

    public static function getProviders($params = [], $order_by = null, $limit = -1, $page = 1) {
        return Provider::findAll($params, $order_by, $limit, $page, true);
    }

    public static function getPromotions($params = [], $order_by = null, $limit = -1, $page = 1) {
        return Promotion::findAll($params, $order_by, $limit, $page, true);
    }

    public static function getOrders($params = [], $order_by = null, $limit = -1, $page = 1) {
        return EcommerceOrder::findAll($params, $order_by, $limit, $page, true);
    }

    public static function getProductsProvider($params = [], $order_by = null, $limit = -1, $page = 1) {
        return Product::getDataProvider($params, $order_by, $limit, $page);
    }

    public static function getProvidersProvider($params = [], $order_by = null, $limit = -1, $page = 1) {
        return Provider::getDataProvider($params, $order_by, $limit, $page);
    }

    public static function getPromotionsProvider($params = [], $order_by = null, $limit = -1, $page = 1) {
        return Promotion::getDataProvider($params, $order_by, $limit, $page);
    }

    public static function getOrdersProvider($params = [], $order_by = null, $limit = -1, $page = 1) {
        return EcommerceOrder::getDataProvider($params, $order_by, $limit, $page);
    }
}
