<?php
/**
 * Created by PhpStorm.
 * User: BEHUONG
 * Date: 11/17/2017
 * Time: 6:57 PM
 */

namespace applications\SellPhone;

use backend\models\AuthMenu;
use backend\modules\app\App;
use backend\modules\cms\Cms;
use backend\modules\crm\Crm;
use backend\modules\ecommerce\Ecommerce;
use backend\modules\system\System;
use common\components\FApplication;
use common\components\FHtml;
use frontend\components\Helper;
use Yii;

class SellPhone extends FApplication
{
    const SETTINGS = [
        'fonts' => '"Raleway",sans-serif',
        'main_color' => '#797777',
        'languages_enabled' => true,
        'widgets_enabled' => false,
        'lang' => 'vi',
        'languages' => ['en' => 'English', 'vi' => 'Vietnam'],
        'name' => 'PHONESHOP'
    ];

    const LOOKUP = [
        'cms_portfolio.tags' => ['Mobile', 'Website', 'Outsourcing', 'Design'],
        'ecommerce_order.status' => ['New', 'Bidding', 'Paid', 'Completed']
    ];

    public static function getBackendMenu($controller = '', $action = '', $module = '') {

        $menu[] = AuthMenu::buildDashBoardMenu();

        $menu = array_merge($menu, Cms::createModuleMenu([ 'cms-blogs', 'cms-about', 'cms-contact' ,'cms-employee', 'cms-partner','cms-employee' ]));

        $menu = array_merge($menu, Ecommerce::createModuleMenu(['product', 'ecommerce-order']));

        $menu = array_merge($menu, App::createModuleMenu(['app-user-feedback','app-user']));

        $menu = array_merge($menu, System::createModuleMenu(['object-category']));
        
        $menu=array_merge($menu, Crm::createModuleMenu(['crm_client']));

        return $menu;
    }

    public static function getFrontendMenu($controller = '', $action = '', $module = 'SellPhone')
    {
        $data_menu = array(
            array(
                'type' => 'single',
                'name' => FHtml::t('common', 'Trang chủ'),
                'url' => Helper::createHomeUrl(),
            ),
            array(
                'type' => 'tree',
                'name' => FHtml::t('common', 'Sản phẩm'),
                'url' => FHtml::createUrl('/product'),
                'children' => Helper::getCategoriesChildrenMenu('product')
            ),
            array(
                'type' => 'single',
                'name' => FHtml::t('common', 'Tin tức'),
                'url' => Helper::createBlogsUrl(),
            ),
            array(
                'type' => 'single',
                'name' => FHtml::t('common', 'Giới thiệu'),
                'url' => Helper::createAboutUrl(),
            ),
            array(
                'type' => 'single',
                'name' => FHtml::t('common', 'Liên hệ'),
                'url' => Helper::createContactUrl(),
            ),
        );
        return $data_menu;
    }
}