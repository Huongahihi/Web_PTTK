<?php

namespace frontend\modules\cms;

use backend\modules\cms\models\CmsAbout;
use backend\modules\cms\models\CmsAlbum;
use backend\modules\cms\models\CmsArticle;
use backend\modules\cms\models\CmsBlogs;
use backend\modules\cms\models\CmsEmployee;
use backend\modules\cms\models\CmsPortfolio;
use backend\modules\cms\models\CmsService;
use backend\modules\cms\models\CmsSlide;
use backend\modules\cms\models\CmsTestimonial;
use Yii;
use frontend\components\Helper;
use common\components\FHtml;

/**
 * cms module definition class
 */
class Cms extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\cms\controllers';

    public static function getModuleName() {
        return 'cms';
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public static function getFrontendMenu($controller, $action)
    {
        return array(

            array(
                'type' => 'single',
                'active' => $controller == 'site' && $action == 'index',
                'name' => Yii::t('common', 'Home'),
                'url' => Yii::$app->urlManager->createUrl(['/']),
            ),

            array(
                'type' => 'tree',
                'active' => $controller == 'site' && $action == 'index',
                'name' => Yii::t('common', 'About'),
                'url' => Yii::$app->urlManager->createUrl(['/about']),
                'children' => Helper::getArrayItemMenu(['About' => 'about', 'Service' => 'service', 'Team' => 'team', 'Faq' => 'faq'])
            ),

            array(
                'type' => 'mega-v5',
                'active' => $controller == 'product',
                'name' => Yii::t('common', 'Products'),
                'url' => Yii::$app->urlManager->createUrl(['/ecommerce/product']),
                'children' => Helper::getCategoryItemMenu(FHtml::TABLE_PRODUCT, '/ecommerce/product/list', '/ecommerce/product/view', 4),
            ),

            array(
                'type' => 'tree',
                'active' => $controller == 'news',
                'name' => Yii::t('common', 'Blogs'),
                'url' => Yii::$app->urlManager->createUrl(['/news']),
                'children' => Helper::getCategoryMenu($controller, $action, FHtml::TABLE_BLOGS, '/news'),
            ),
            array(
                'type' => 'single',
                'active' => false,
                'name' => Yii::t('common', 'Promotions'),
                'url' => Yii::$app->urlManager->createUrl(['/ecommerce/promotion/list']),
            ),
            array(
                'type' => 'single',
                'active' => false,
                'name' => Yii::t('common', 'Portfolios'),
                'url' => FHtml::createUrl('/portfolio'),
            ),
            array(
                'type' => 'single',
                'active' => false,
                'name' => Yii::t('common', 'Contact'),
                'url' => FHtml::createUrl('/contact'),
            ),
        );
    }

    public static function getServices($params = [], $order_by = null, $limit = -1, $page = 1) {
        if (is_bool($params))
            $params = ['is_top' => $params];

            return CmsService::findAll($params, $order_by, $limit, $page, true);
    }

    public static function getSlides($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsSlide::findAll($params, $order_by, $limit, $page, true);
    }

    public static function getBlogs($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsBlogs::findAll($params, $order_by, $limit, $page, true);
    }

    public static function getAbouts($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsAbout::findAll($params, $order_by, $limit, $page, true);
    }

    public static function getTestimonials($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsTestimonial::findAll($params, $order_by, $limit, $page, true);
    }

    public static function getEmployees($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsEmployee::findAll($params, $order_by, $limit, $page, true);
    }

    public static function getPortfolio($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsPortfolio::findAll($params, $order_by, $limit, $page, true);
    }

    public static function getAlbums($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsAlbum::findAll($params, $order_by, $limit, $page, true);
    }

    public static function getArticles($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsArticle::findAll($params, $order_by, $limit, $page, true);
    }

    public static function getSlidesProvider($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsSlide::getDataProvider($params, $order_by, $limit, $page);
    }

    public static function getBlogsProvider($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsBlogs::getDataProvider($params, $order_by, $limit, $page);
    }

    public static function getAboutsProvider($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsAbout::getDataProvider($params, $order_by, $limit, $page);
    }

    public static function getTestimonialsProvider($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsTestimonial::getDataProvider($params, $order_by, $limit, $page);
    }

    public static function getEmployeesProvider($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsEmployee::getDataProvider($params, $order_by, $limit, $page);
    }

    public static function getPortfolioProvider($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsPortfolio::getDataProvider($params, $order_by, $limit, $page);
    }

    public static function getAlbumsProvider($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsAlbum::getDataProvider($params, $order_by, $limit, $page);
    }

    public static function getArticlesProvider($params = [], $order_by = null, $limit = -1, $page = 1) {
        return CmsArticle::getDataProvider($params, $order_by, $limit, $page);
    }
}
