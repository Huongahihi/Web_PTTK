<?php

namespace backend\modules\music;

use backend\models\AuthMenu;
use common\components\FHtml;

/**
 * cms module definition class
 */
class Music extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\music\controllers';

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

    public static function createModuleMenu($menu = ['music*', 'music-playlist', 'music-song', 'music-artist'])
    {
        $controller = FHtml::currentController();

        $menu[] = AuthMenu::menuItem(
            '#',
            'MUSIC',
            'glyphicon glyphicon-th',
            FHtml::isInArray($controller, $menu),
            [],
            [

                !FHtml::isInArray('music-playlist', $menu) ? null : AuthMenu::menuItem(
                    '/music/music-playlist/index',
                    'Playlists',
                    'glyphicon glyphicon-book',
                    $controller == 'music-playlist',
                    []
                ),
                !FHtml::isInArray('music-song', $menu) ? null : AuthMenu::menuItem(
                    '/music/music-song/index',
                    'Songs',
                    'glyphicon glyphicon-book',
                    $controller == 'music-song',
                    []
                ),
                !FHtml::isInArray('music-artist', $menu) ? null : AuthMenu::menuItem(
                    '/music/music-artist/index',
                    'Artists',
                    'glyphicon glyphicon-book',
                    $controller == 'music-artist',
                    []
                ),
            ]
        );
        return $menu;
    }

}
