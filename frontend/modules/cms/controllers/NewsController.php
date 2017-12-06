<?php
namespace frontend\modules\cms\controllers;

use frontend\components\FrontendController;

/**
 * Site controller
 */
class NewsController extends FrontendController
{
    public $defaultAction = 'index';

    public function actionIndex($page = false, $keyword = false, $category_id = false, $id = false)
    {
        if (empty($id)) {
            return $this->render('list', ['category_id' => $category_id, 'keyword' => $keyword]);
        }
        else {
            return $this->render('view', ['id' => $id, 'category_id' => $category_id]);
        }
    }

    public function actionList($page = false, $keyword = false, $category_id = false)
    {
        return $this->render('list', ['category_id' => $category_id, 'keyword' => $keyword]);
    }

    public function actionView($id = false, $category_id = false)
    {
        return $this->render('view', ['id' => $id, 'category_id' => $category_id]);
    }
}
