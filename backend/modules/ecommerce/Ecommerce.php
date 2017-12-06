<?php

namespace backend\modules\ecommerce;

use backend\models\AuthMenu;
use backend\models\User;
use common\components\FHtml;

/**
 * ecommerce module definition class
 */
class Ecommerce extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\ecommerce\controllers';

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

    public static function createModuleMenu($menu = ['product', 'ecommerce*', 'provider', 'promotion'])
    {
        $controller = FHtml::currentController();

        $menu[] = AuthMenu::menuItem(
            '#',
            'Quản trị bán hàng',
            'glyphicon glyphicon-th',
            FHtml::isInArray($controller, $menu),
            [],
            [
                !FHtml::isInArray('product', $menu) ? null : AuthMenu::menuItem(
                    '/ecommerce/product/index',
                    'Điện thoại',
                    'glyphicon glyphicon-glass',
                    $controller == 'product',
                    []
                ),
                !FHtml::isInArray('ecommerce-order', $menu) ? null : AuthMenu::menuItem(
                    '/ecommerce/ecommerce-order/index',
                    'Hóa đơn',
                    'glyphicon glyphicon-shopping-cart',
                    $controller == 'ecommerce-order',
                    []
                ),
                !FHtml::isInArray('provider', $menu) ? null : AuthMenu::menuItem(
                    '/ecommerce/provider/index',
                    'Provider',
                    'glyphicon glyphicon-book',
                    $controller == 'provider',
                    []
                ),
                !FHtml::isInArray('promotion', $menu) ? null : AuthMenu::menuItem(
                    '/ecommerce/promotion/index',
                    'Promotion',
                    'glyphicon glyphicon-book',
                    $controller == 'promotion',
                    []
                )
            ]
        );

        return $menu;
    }

}
