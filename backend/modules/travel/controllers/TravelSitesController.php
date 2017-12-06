<?php
/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "TravelSites".
*/
namespace backend\modules\travel\controllers;

use backend\modules\travel\models\TravelAttractions;
use frontend\modules\travel\TravelHelper;
use Yii;
use backend\modules\travel\models\TravelSites;
use backend\modules\travel\models\TravelSitesSearch;
//use yii\web\Controller;
use backend\controllers\AdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\Html;
use common\components\BaseController;
use yii\helpers\Json;
use yii\web\UploadedFile;
use yii\imagine\Image;
use common\components\AccessRule;
use common\models\User;
use yii\filters\AccessControl;
use common\components\FHtml;
use common\components\Helper;
use yii\helpers\ArrayHelper;

/**
 * TravelSitesController implements the CRUD actions for TravelSites model.
 */
class TravelSitesController extends AdminController
{
    protected $moduleName = 'TravelSites';
    protected $moduleTitle = 'Travel Sites';
    protected $moduleKey = 'travel_sites';

/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['create', 'update', 'delete', 'view', 'index'],
                'rules' => [
                    [
                        'actions' => ['view', 'index'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_USER,
                            User::ROLE_MODERATOR,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['update', 'create', 'delete'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_MODERATOR,
                            User::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all TravelSites models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new TravelSitesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

           // validate if there is a editable input saved via AJAX
           if (Yii::$app->request->post('hasEditable')) {
               // instantiate your book model for saving
               $Id = Yii::$app->request->post('editableKey');

               $model = TravelSites::findOne($Id);

               // store a default json response as desired by editable
               $out = Json::encode(['output' => '', 'message' => '']);

               // fetch the first entry in posted data (there should
               // only be one entry anyway in this array for an
               // editable submission)
               // - $posted is the posted data for Book without any indexes
               // - $post is the converted array for single model validation
               $post = [];
               $posted = current($_POST['TravelSites']);
               $post['TravelSites'] = $posted;

               // load model like any single model validation
               if ($model->load($post)) {
                   // can save model or do something before saving model
                   $model->save();

                   // custom output to return to be displayed as the editable grid cell
                   // data. Normally this is empty - whereby whatever value is edited by
                   // in the input by user is updated automatically.
                   $output = '';
                   // similarly you can check if the name attribute was posted as well
                   // if (isset($posted['name'])) {
                   //   $output =  ''; // process as you need
                   // }
                   $out = Json::encode(['output' => $output, 'message' => '']);
               }
               // return ajax json encoded response and exit
               echo $out;
               return;
           }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single TravelSites model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;

        $model = $this->findModel($id);
        $type = FHtml::getFieldValue($model, 'type');
        $modelMeta = FHtml::createMetaModel($this->moduleKey, $type, $model->id);


        $view = FHtml::getRequestParam('view');
        if ($view == 'sites') {
            return $this->render('view1', [
                'model' => $model, 'modelMeta' => $modelMeta
            ]);
        }

        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> FHtml::t($this->moduleName)." #".$id,
                    'content'=>$this->renderPartial('_view_preview', [
                        'model' => $model, 'modelMeta' => $modelMeta
                    ]),
                    'footer'=>Html::a(FHtml::t('Update'),['update','id'=>$id],['class'=>'btn btn-primary pull-left','role'=>$this->view->params['displayType']]).
                              Html::button(FHtml::t('Close'),['class'=>'btn btn-default','data-dismiss'=>"modal"])
                ];
        }else{
            return $this->render('view', [
                'model' => $model, 'modelMeta' => $modelMeta
            ]);
        }
    }

    /**
     * Creates a new TravelSites model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type = false)
    {
        $request = Yii::$app->request;
        $model = $this->createModel($this->moduleKey, '', ['type' => $type]);

        $returnParams = FHtml::RequestParams(['id']);
        $returnParams = FHtml::RequestParams(['id']);
        if (!empty($model->city))
            $returnParams = array_merge($returnParams, ['city' => $model->city]);
        if (!empty($model->keywords))
            $returnParams = array_merge($returnParams, ['keywords' => $model->keywords]);

        $modelMeta = FHtml::createMetaModel($this->moduleKey, $type);

        $uploadFields = TravelSites::COLUMNS_UPLOAD;

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> FHtml::t($this->moduleName),
                    'content'=>$this->renderPartial('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button(FHtml::t('Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button(FHtml::t('Create'),['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                'forceReload'=>'#crud-datatable-pjax',
                'title'=> FHtml::t($this->moduleName),
                'content'=>'<span class="text-success">Create TravelSites success</span>',
                'footer'=> Html::button(FHtml::t('Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                Html::a(FHtml::t('Create more'),['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];
            }else{
            return [
            'title'=> FHtml::t($this->moduleName),
            'content'=>$this->renderAjax('create', [
            'model' => $model,
            ]),
            'footer'=> Html::button(FHtml::t('Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
            Html::button(FHtml::t('Create'),['class'=>'btn btn-primary','type'=>"submit"])

            ];
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            $oldModel = clone $model;
            if ($model->load($request->post())) {
                FHtml::prepareDefaultValues($model, ['category_id_array', 'created_date', 'created_user', 'is_active', 'application_id']);

                if ($model->save()) {
                    FHtml::saveModel($modelMeta, $request->post(), ['travel_sites_id' => $model->id]);

                    $files =FHtml::getUploadedFiles($model, $uploadFields, 'travel-sites' . FHtml::getAttribute($model, 'id'), $oldModel);

                    FHtml::saveFiles($files, $this->uploadFolder .  '/travel-sites/', $model);
                    FHtml::saveObjectItems($model, $this->moduleKey, $model->id, $model::getRelatedObjects());

                    if ($this->saveType() == 'clone')
                    {
                        return $this->redirect(ArrayHelper::merge(['create', 'id' => $model->id], $returnParams ));
                    }
                    return $this->redirect(ArrayHelper::merge(['index'], $returnParams ));
                }
                return $this->render('create', [
                    'model' => $model,
                    'modelMeta' => $modelMeta,
                ]);
            } else {
                FHtml::prepareDefaultValues($model, ['created_date', 'created_user', 'is_active', 'application_id'], FHtml::ACTION_LOAD);

                return $this->render('create', [
                    'model' => $model,
                    'modelMeta' => $modelMeta
                ]);
            }
        }
       
    }

    /**
     * Updates an existing TravelSites model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $type = FHtml::getRequestParam('type');
        $returnParams = FHtml::RequestParams(['id']);
        if (!empty($model->city))
            $returnParams = array_merge($returnParams, ['city' => $model->city]);
        if (!empty($model->keywords))
            $returnParams = array_merge($returnParams, ['keywords' => $model->keywords]);

        $type = FHtml::getFieldValue($model, 'type');
        $modelMeta = FHtml::createMetaModel($this->moduleKey, $type, $id);

        $uploadFields = TravelSites::COLUMNS_UPLOAD;


        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> FHtml::t($this->moduleName)." #".$id,
                    'content'=>$this->renderPartial('update', [
                        'model' => $model, 'modelMeta' => $modelMeta,
                    ]),
                    'footer'=> Html::button(FHtml::t('Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button(FHtml::t('Save'),['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> FHtml::t($this->moduleName)." #".$id,
                        'content'=>$this->renderAjax('view', [
                            'model' => $model, 'modelMeta' => $modelMeta,
                        ]),
                        'footer'=> Html::button(FHtml::t('Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                    Html::a(FHtml::t('update'),['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                    ];
            }else{
                    return [
                        'title'=> FHtml::t($this->moduleName)." #".$id,
                        'content'=>$this->renderAjax('update', [
                            'model' => $model, 'modelMeta' => $modelMeta
                        ]),
                        'footer'=> Html::button(FHtml::t('Close'),['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                    Html::button(FHtml::t('Save'),['class'=>'btn btn-primary','type'=>"submit"])
                    ];
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            $oldModel = clone $model;
            //echo $_POST["is_active"];
            if ($model->load($request->post())) {
                FHtml::prepareDefaultValues($model, ['category_id_array', 'modified_date', 'modified_user']);

                $files =FHtml::getUploadedFiles($model, $uploadFields, 'travel-sites' . FHtml::getAttribute($model, 'id'), $oldModel);

                if ($model->save()) {
                    FHtml::saveFiles($files, $this->uploadFolder .  '/travel-sites/');
                    FHtml::saveModel($modelMeta, $request->post(), ['travel_sites_id' => $model->id]);
                    FHtml::saveObjectItems($model, $this->moduleKey, $model->id, $model::getRelatedObjects());
                    if ($this->saveType() == 'clone')
                    {
                        return $this->redirect(['create', 'id' => $model->id, 'type' => $type]);
                    }
                    return $this->redirect(ArrayHelper::merge(['index'], $returnParams ));
                }
                return $this->render('update', [
                    'model' => $model, 'modelMeta' => $modelMeta ]);
            } else {
                FHtml::prepareDefaultValues($model, ['modified_date', 'modified_user', 'category_id_array'], FHtml::ACTION_LOAD);

                return $this->render('update', [
                    'model' => $model, 'modelMeta' => $modelMeta
                ]);
            }
        }
    }

    /**
     * Delete an existing TravelSites model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

     /**
     * Delete multiple existing TravelSites model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            if (isset($model)) {
                $model->delete();
            }
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

    public function actionBulkAction($action = '', $field = '', $value = '')
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            if (isset($model)) {
                if ($action == 'change') {
                    $model[$field] = $value;
                    $model->save();
                } else if ($action == 'search') {
                    TravelHelper::searchSite($model);
                }
            }
        }

        if($request->isAjax){
        /*
        *   Process for ajax request
        */
        Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        }else{
        /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

    public function actionPopulate($city = '', $keyword = '') {

        $cityList = FHtml::getComboArray('city');
        $keywordsList = FHtml::getComboArray('keywords', 'travel', 'keywords');
        foreach ($cityList as $city => $cityName) {
//            $attractions = TravelAttractions::findAll(['city' => $city, 'is_active' => 1]);
//            foreach ($attractions as $attraction) {
//                $attributes = $attraction->getObjectAttributes();
//                $kw = '';
//                if ($attraction->type == 'LOCATION')
//                    $kw = 'Attractions';
//                else  if ($attraction->type == 'RESTAURANT')
//                    $kw = 'Food';
//                else
//                    $kw = '';
//
//                foreach ($attributes as $attribute) {
//                    $url = trim($attribute->meta_value);
//                    $model = TravelSites::findOne(['city' => $city, 'keywords' => $kw, 'url' => $url]);
//                    if (!isset($model)) {
//                        $model = new TravelSites();
//                        $model->city = $city;
//                        $model->keywords = $kw;
//                        $model->url = $url;
//                        $model->name = $attribute->meta_key;
//                        $model->is_active = 0;
//                        $model->created_date = date('Y-m-d');
//                        $model->created_user = FHtml::currentUserId();
//                        $model->weight = 1;
//                        if (!$model->save())
//                            var_dump($model->getErrors());
//                        else
//                            echo $model->name . ' ' . $url . ' <br/> ';
//                    }
//                }
//            }
            foreach ($keywordsList as $keyword => $keywordName) {
                if (empty($city) || empty($keyword))
                    continue;
                $result = [];
                $result = TravelHelper::searchGoogles($city . ' ' . $keyword);
                foreach ($result as $title => $url) {
                    $model = TravelSites::findOne(['city' => $city, 'keywords' => $keyword, 'url' => $url]);
                    if (!isset($model)) {
                        $model = new TravelSites();
                        $model->city = $city;
                        $model->keywords = $keyword;
                        $model->url = $url;
                        $model->name = $title;
                        $model->is_active = 0;
                        $model->created_date = date('Y-m-d');
                        $model->created_user = FHtml::currentUserId();
                        $model->weight = 1;
                        if (!$model->save())
                            var_dump($model->getErrors());
                        else
                            echo $title . ' ' . $url . ' <br/> ';
                    }
                }
            }
        }

        return $this->redirect(['index', 'city' => $city, 'keyword' => $keyword]);
    }

    public function actionSearch($id) {
        if (empty($id)) {

        } else {
            $model = self::findModel($id);
            TravelHelper::searchSite($model);
        }
        return $this->redirect(['view', 'id'=>$id]);
    }

    /**
     * Finds the TravelSites model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TravelSites the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TravelSites::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
