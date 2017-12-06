<?php

namespace backend\modules\system;

use backend\models\AuthMenu;
use common\components\FHtml;
use yii\base\Module;

/**
 * api module definition class
 */
class System extends Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\system\controllers';

    const FIELDS_GROUP = [ //table.column
    ];

    const LOOKUP = [    // 'table.column' => array(), 'table.column' => 'table1.column1'
    ];

    public static function getLookupArray($column) {
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
    }

    public static function createModuleMenu($menu = ['object*', 'setting*', 'user', 'auth*', 'application', 'settings-menu'])
    {
//        if (!FHtml::isRoleAdmin())
//            return [];

        $controller = FHtml::currentController();

        $menu[] = AuthMenu::menuItem(
            '#',
            'Hệ thống ',
            'glyphicon glyphicon-th',
            FHtml::isInArray($controller, $menu),
            [],
            [
                !FHtml::isInArray('setting', $menu) ? null : AuthMenu::menuItem(
                    '/setting/index',
                    ' Settings',
                    'glyphicon glyphicon-cog',
                    $controller == 'setting',
                    [FHtml::ROLE_ADMIN]
                ),
                !FHtml::isInArray('settings', $menu) ? null : AuthMenu::menuItem(
                    '/settings/index',
                    'System Settings',
                    'glyphicon glyphicon-cog',
                    $controller == 'settings',
                    [FHtml::ROLE_ADMIN]
                ),
                !FHtml::isInArray('object-setting', $menu) ? null : AuthMenu::menuItem(
                    '/system/object-setting/index',
                    'Data Settings',
                    'glyphicon glyphicon-book',
                    $controller == 'object-setting',
                    [FHtml::ROLE_ADMIN]
                ),
                !FHtml::isInArray('object-category', $menu) ? null : AuthMenu::menuItem(
                    '/system/object-category/index',
                    'Hãng điện thoại',
                    'glyphicon glyphicon-book',
                    $controller == 'object-category',
                    [FHtml::ROLE_ADMIN]
                ),
                !FHtml::isInArray('user', $menu) ? null : AuthMenu::menuItem(
                    '/user/index',
                    'Users',
                    'glyphicon glyphicon-cog',
                    $controller == 'user',
                    [FHtml::ROLE_ADMIN]
                ),
                !FHtml::isInArray('auth-group', $menu) ? null : AuthMenu::menuItem(
                    '/auth-group/index',
                    'User Groups',
                    'glyphicon glyphicon-cog',
                    $controller == 'auth-group',
                    [FHtml::ROLE_ADMIN]
                ),
                !FHtml::isInArray('auth-role', $menu) ? null : AuthMenu::menuItem(
                    '/auth-role/index',
                    'User Rights',
                    'glyphicon glyphicon-cog',
                    $controller == 'auth-role',
                    [FHtml::ROLE_ADMIN]
                ),
                !FHtml::isInArray('settings-menu', $menu) ? null : AuthMenu::menuItem(
                    '/system/settings-menu/index',
                    'Menus',
                    'glyphicon glyphicon-cog',
                    $controller == 'settings-menu',
                    [FHtml::ROLE_ADMIN]
                ),
                !DYNAMIC_OBJECT_ENABLED || !FHtml::isInArray('object-type', $menu) ? null : AuthMenu::menuItem(
                    '/system/object-type/index',
                    'Objects',
                    'glyphicon glyphicon-book',
                    $controller == 'object-type',
                    [FHtml::ROLE_ADMIN]
                ),

                !OBJECT_ACTIONS_ENABLED || !FHtml::isInArray('object-actions', $menu) ? null : AuthMenu::menuItem(
                    '/object-actions/index',
                    FHtml::t('common', 'Object Changes Log'),
                    'glyphicon glyphicon-book',
                    $controller == 'object-actions',
                    [FHtml::ROLE_ADMIN]
                ),
                !FHtml::isInArray('application', $menu) ? null : AuthMenu::menuItem(
                    '/system/application/index',
                    FHtml::t('common', 'Applications'),
                    'glyphicon glyphicon-book',
                    $controller == 'applications',
                    [FHtml::ROLE_ADMIN]
                ),
            ]
        );

        return $menu;
    }
}
