<?php

namespace backend\modules\book;
use backend\models\AuthMenu;
use common\components\FHtml;
/**
 * book module definition class
 */
class Book extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\book\controllers';

    const FIELDS_GROUP = [ //table.column
    ];

    const LOOKUP = [    // 'table.column' => array(), 'table.column' => 'table1.column1'
    ];

    const
        OBJECT_TYPE_BOOK = "book",
        OBJECT_TYPE_CHAPTER = "chapter";
    const
        TYPE_CLASSIC = "classic",
        TYPE_EBOOK = "ebook";

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



    public static function createModuleMenu($menu = ['book*', 'book', 'book-chapter', 'book-comment'])
    {
        $controller = FHtml::currentController();

        $menu[] = AuthMenu::menuItem(
            '#',
            'BOOK',
            'glyphicon glyphicon-book',
            FHtml::isInArray($controller, $menu),
            [],
            [
                !FHtml::isInArray('book', $menu) ? null : AuthMenu::menuItem(
                    '/book/book/index',
                    'Book',
                    'glyphicon glyphicon-book',
                    $controller == 'book',
                    []
                ),
                !FHtml::isInArray('book-chapter', $menu) ? null : AuthMenu::menuItem(
                    '/book/book-chapter/index',
                    'Chapter',
                    'glyphicon glyphicon-book',
                    $controller == 'book-chapter',
                    []
                ),
                !FHtml::isInArray('book-comment', $menu) ? null : AuthMenu::menuItem(
                    '/book/book-comment/index',
                    'Comment',
                    'glyphicon glyphicon-book',
                    $controller == 'book-comment',
                    []
                ),
            ]
        );
        return $menu;
    }
}
