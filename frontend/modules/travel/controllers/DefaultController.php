<?php

namespace frontend\modules\travel\controllers;

use frontend\components\FrontendController;
use yii\web\Controller;
use common\components\FHtml;

/**
 * Default controller for the `travel` module
 */
class DefaultController extends FrontendController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
