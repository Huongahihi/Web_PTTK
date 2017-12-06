<?php
namespace frontend\modules\cms\controllers;

use backend\modules\cms\models\CmsTestimonial;
use frontend\components\FrontendController;
use yii\web\NotFoundHttpException;


/**
 * Site controller
 */
class TestimonialController extends FrontendController
{
    public $defaultAction = 'index';

    public function actionIndex($page = false, $keyword = false, $category_id = false, $id = false)
    {
        if (empty($id))
            return $this->render('list', []);
        else
            return $this->render('view', []);
    }

    public function actionList($page = false, $keyword = false, $category_id = false)
    {
        return $this->render('list', []);
    }

    public function actionView($id)
    {
        return $this->render('view', [
        ]);
    }
}
