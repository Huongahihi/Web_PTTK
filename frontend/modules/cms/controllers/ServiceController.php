<?php
namespace frontend\modules\cms\controllers;

use backend\models\Category;
use backend\models\CmsAbout;
use backend\models\CmsBlogs;
use backend\models\ObjectCategory;
use backend\models\Product;
use backend\models\Products;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use common\components\FHtml;
use frontend\components\FrontendController;

/**
 * Site controller
 */
class ServiceController extends FrontendController
{
    public $defaultAction = 'index';

    public function actionIndex($page = false, $keyword = false, $category_id = false, $id = false)
    {
        if (empty($id))
            return $this->render('list', ['category_id' => $category_id, 'keyword' => $keyword]);
        else
            return $this->render('view', ['id' => $id, 'category_id' => $category_id]);
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
