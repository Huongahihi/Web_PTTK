<?php

namespace backend\modules\app;

use backend\models\AuthMenu;
use backend\models\User;
use common\components\FHtml;

/**
 * app module definition class
 */
class App extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\app\controllers';

    const FIELDS_GROUP = [ //table.column
    ];

    const LOOKUP = [    // 'table.column' => array(), 'table.column' => 'table1.column1'

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

    public static function createModuleMenu($menu = ['app-user', 'app-user-device', 'app-user-feedback', 'app-notification'])
    {
        $controller = FHtml::currentController();

        $menu[] = AuthMenu::menuItem(
            '#',
            'Quản trị người dùng',
            'glyphicon glyphicon-th',
            FHtml::isInArray($controller, $menu),
            [User::ROLE_ADMIN],
            [
                !FHtml::isInArray('app-user', $menu) ? null : AuthMenu::menuItem(
                    '/cms/cms-employee/index',
                    'Khách hàng',
                    'glyphicon glyphicon-wrench',
                    $controller == 'cms-employee',
                    [User::ROLE_ADMIN]
                ),
                !FHtml::isInArray('app-user-device', $menu) ? null : AuthMenu::menuItem(
                    '/app/app-user-device/index',
                    'Customer',
                    'glyphicon glyphicon-wrench',
                    $controller == 'app-user-device',
                    [User::ROLE_ADMIN]
                ),
                !FHtml::isInArray('app-user-feedback', $menu) ? null : AuthMenu::menuItem(
                    '/app/app-user-feedback/index',
                    'Phản hồi',
                    'glyphicon glyphicon-wrench',
                    $controller == 'app-user-feedback',
                    [User::ROLE_ADMIN]
                ), !FHtml::isInArray('app-notification', $menu) ? null : AuthMenu::menuItem(
                    '/app/app-notification/index',
                    'Push Notifications',
                    'glyphicon glyphicon-wrench',
                    $controller == 'app-notification',
                    [User::ROLE_ADMIN]
                )
            ]
        );

        return $menu;
    }

}
