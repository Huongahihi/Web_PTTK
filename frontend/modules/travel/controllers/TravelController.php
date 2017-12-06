<?php
namespace frontend\modules\travel\controllers;

use backend\models\ObjectCategory;
use backend\modules\cms\models\CmsBlogs;
use backend\modules\ecommerce\models\Product;
use common\components\AccessRule;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\components\FHtml;
use yii\web\User;
use frontend\components\FrontendController;

/**
 * Site controller
 */
class TravelController extends FrontendController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'ruleConfig' => [
                    'class' => \yii\filters\AccessRule::className(),
                ],
                'only' => ['create', 'update', 'delete', 'view', 'index'],
                'rules' => [
                    [
                        'actions' => ['view', 'index', 'create', 'update', 'attraction'],
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }


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

    public function actionPlan()
    {
        $itineraryid = FHtml::getRequestParam('itineraryid', 'draft');
        $itinerary = FHtml::getModel('travel_itinerary', '', $itineraryid);
        if (empty($itinerary->image))
            $image = FHtml::currentBaseURL() . '/upload/www/' . str_replace(' ', '', strtolower($itinerary->city)) . '.jpg';
        else
            $image = FHtml::getFileURL($itinerary->image, 'travel-itinerary', FRONTEND);

        FHtml::setPageMeta('My Travels Plan', 'Check out my ' . $itinerary->name . ' in ' . $itinerary->city, $image);
        return $this->render('plan', [
            'itineraryid' => $itineraryid,
        ]);
    }

    public function actionAttraction() {
        $request = \Yii::$app->request;
        $id = FHtml::getRequestParam('id');

        if($request->isAjax){
            return $this->render('attraction', []);
        }

        return $this->render('attraction', []);
    }

    public function actionTrip() {
        $this->authorizeUser();

        $request = \Yii::$app->request;

        $id = FHtml::getRequestParam('itineraryid');

        if($request->isAjax){
            return $this->render('trip', []);
        }

        return $this->render('trip', []);
    }

    public function actionTours() {
        //$this->authorizeUser();

        $request = \Yii::$app->request;

        $city = FHtml::getRequestParam(['city', 'type']);

        if($request->isAjax){
            return $this->render('tours', ['city' => $city]);
        }

        return $this->render('tours', ['city' => $city]);
    }

    public function actionEditPlan() {
        $request = \Yii::$app->request;
        $id = FHtml::getRequestParam('id');
        $duration = FHtml::getRequestParam('duration');
        $title = FHtml::getRequestParam('title');

        if (empty($id))
            return 'No Id';

        $model = FHtml::getModel('travel_plans', '', ['id' => $id]);

        if($request->isAjax){
            if (isset($model) && (!empty($duration) || !empty($title))) {
                if (!empty($duration))
                    $model->attraction_duration = $duration;
                if (!empty($title))
                    $model->name = $title;

                $model->save();
            }

            return $this->renderPartial('_edit_plan', ['id' => $id, 'model' => $model]);
            /*
            *   Process for ajax request
            */
            //Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> 'Attraction ' . " #".$id,
                    'content'=> 'DDDDDD',
                    'footer'=> Html::button(FHtml::t('Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button(FHtml::t('Save'),['class'=>'btn btn-primary','type'=>"submit"])
                ];
            }
            return [
                'title'=> 'Attraction ' . " #".$id,
                'content'=> 'HIHihi',
                'footer'=> Html::button(FHtml::t('Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::button(FHtml::t('Save'),['class'=>'btn btn-primary','type'=>"submit"])
            ];
        }

        return $this->render('_edit_plan', []);
    }

    public function actionSavePlan() {
        $request = \Yii::$app->request;
        $id = FHtml::getRequestParam('id');
        $duration = FHtml::getRequestParam('duration');
        $title = FHtml::getRequestParam('title');

        if (empty($id))
            return 'No Id';

        $model = FHtml::getModel('travel_plans', '', ['id' => $id]);

        if($request->isAjax){
            if (isset($model) && (!empty($duration) || !empty($title))) {
                if (!empty($duration))
                    $model->attraction_duration = $duration;
                if (!empty($title))
                    $model->name = $title;

                $model->save();
                return 'Saved success';
            }
        }

        return '';
    }
}
