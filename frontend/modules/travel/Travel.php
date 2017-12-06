<?php

namespace frontend\modules\travel;

use Yii;
use frontend\components\Helper;
use common\components\FHtml;

/**
 * travel module definition class
 */
class Travel extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\travel\controllers';

    public static function getModuleName()
    {
        return 'travel';
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
                'url' => FHtml::createUrl('/'),
            ),
            array(
                'type' => 'tree',
                'active' => $controller == 'travel' && $action == 'plan',
                'name' => Yii::t('common', 'Itineraries'),
                'url' => '#',
                'children' => Helper::getModelsItemMenu('travel_itinerary', 'travel/travel/plan?itineraryid={id}', ['is_system' => 1, 'is_top' => 1], 'city asc')
            ),
            array(
                'type' => 'tree',
                'active' => $controller == 'news' && $action == 'index',
                'name' => Yii::t('common', 'Articles & Guides'),
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
}
