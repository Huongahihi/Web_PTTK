<?php

namespace backend\modules\cms;

use backend\models\AuthMenu;
use common\components\FHtml;

/**
 * cms module definition class
 */
class Cms extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\cms\controllers';

    const FIELDS_GROUP = [ //table.column
    ];

    const LOOKUP = [    // 'table.column' => array(), 'table.column' => 'table1.column1'
        'cms_blogs.type' => []
    ];

    public static function getLookupArray($column)
    {
        if (key_exists($column, self::LOOKUP)) {
            $data = self::LOOKUP[$column];

            $data = FHtml::getComboArray($data);

            return $data;
        }

        return [];
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public static function createModuleMenu($menu = [
        'cms-blogs', 'cms-about', 'cms-service', 'cms-slide', 'cms-page', 'cms-about', 'cms-partner', 'cms-testimonial', 'cms-portfolio', 'cms-albumn', 'cms-contact', 'cms-employee'
        , 'cms-faq', 'cms-feedback', 'cms-statistic', 'cms-links', 'cms-widgets', 'cms*'])
    {
        $controller = FHtml::currentController();

        $menu[] = AuthMenu::menuItem(
            '#',
            'Quản trị thông tin',
            'glyphicon glyphicon-th',
            FHtml::isInArray($controller, $menu),
            [],
            [
                !FHtml::isInArray('cms-blogs', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-blogs/index',
                    'Tin tức',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-blogs',
                    []
                ),
                !FHtml::isInArray('cms-article', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-article/index',
                    'Articles',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-article',
                    []
                ),
                !FHtml::isInArray('cms-slide', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-slide/index',
                    'Slide',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-slide',
                    []
                ),
                !FHtml::isInArray('cms-about', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-about/index',
                    'Giới thiệu',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-about',
                    []
                ),
                !FHtml::isInArray('cms-service', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-service/index',
                    'Services',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-service',
                    []
                ),
                !FHtml::isInArray('cms-partner', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-partner/index',
                    'Đối tác',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-partner',
                    []
                ),
                !FHtml::isInArray('cms-links', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-links/index',
                    'Links',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-links',
                    []
                ),
                !FHtml::isInArray('cms-portfolio', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-portfolio/index',
                    'Portfolio',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-portfolio',
                    []
                ),
                !FHtml::isInArray('cms-testimonial', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-testimonial/index',
                    'Testimonials',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-testimonial',
                    []
                ),
                !FHtml::isInArray('cms-album', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-album/index',
                    'Albums',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-album',
                    []
                ),

                !FHtml::isInArray('cms-contact', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-contact/index',
                    'Liên hệ',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-contact',
                    []
                ),
                !FHtml::isInArray('cms-employee', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-employee/index',
                    'Nhân viên',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-employee',
                    []
                ),
                !FHtml::isInArray('cms-faq', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-faq/index',
                    'FAQ',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-faq',
                    []
                ),
                !FHtml::isInArray('cms-statistics', $menu) ? null :AuthMenu::menuItem(
                    '/cms/cms-statistics/index',
                    'Statistics',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-statistics',
                    []
                ),
                !FHtml::isInArray('cms-feedback', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-feedback/index',
                    'Feedback',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-feedback',
                    []
                ),
                !FHtml::isInArray('cms-page', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-page/index',
                    'Pages',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-page',
                    []
                ),
                !FHtml::isInArray('cms-widgets', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-widgets/index',
                    'Widgets',
                    'glyphicon glyphicon-book',
                    $controller == 'cms-widgets',
                    []
                )
            ]
        );
        return $menu;
    }

}
