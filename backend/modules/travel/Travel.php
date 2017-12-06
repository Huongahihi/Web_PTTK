<?php

namespace backend\modules\travel;

use backend\models\AuthMenu;
use common\components\FHtml;

/**
 * travel module definition class
 */
class Travel extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\travel\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public static function createModuleMenu()
    {
        $controller = FHtml::currentController();

        $menu[] = AuthMenu::menuItem(
            '#',
            'Travel',
            'glyphicon glyphicon-th',
            FHtml::isInArray($controller, ['travel*']),
            [],
            [
                AuthMenu::menuItem(
                    'travel/travel-itinerary/index',
                    'Itinerary',
                    'glyphicon glyphicon-book',
                    $controller == 'travel-itinerary',
                    []
                ),
                AuthMenu::menuItem(
                    'travel/travel-attractions/index',
                    'Attractions',
                    'glyphicon glyphicon-book',
                    $controller == 'travel-attractions',
                    []
                ),
                AuthMenu::menuItem(
                    'travel/travel-sites/index',
                    'Sites',
                    'glyphicon glyphicon-book',
                    $controller == 'travel-sites',
                    []
                ),
                AuthMenu::menuItem(
                    'travel/travel-scores/index',
                    'Scores',
                    'glyphicon glyphicon-book',
                    $controller == 'travel-scores',
                    []
                )
            ]
        );

        return $menu;
    }
}
