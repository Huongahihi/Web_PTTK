<?php

namespace frontend\modules\ecommerce\controllers;

use frontend\components\FrontendController;

/**
 * Default controller for the `ecommerce` module
 */
class DefaultController extends FrontendController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($page = false, $keyword = false, $category_id = false, $id = false)
    {
        if (empty($id))
            return $this->render('/product/list', []);
        else
            return $this->render('/product/view', []);
    }
}
