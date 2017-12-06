<?php
namespace frontend\controllers;

use common\components\FHtml;
use common\models\LoginFormFrontend;
use frontend\components\FrontendController;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class UserController extends FrontendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return mixed
     */
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', []);
    }

    public function actionMessages()
    {
        if (empty(FHtml::currentUserId())) {
            return $this->redirect(['/']);
        }

        return $this->render('messages', []);
    }

    public function actionInbox()
    {
        if (empty(FHtml::currentUserId())) {
            return $this->redirect(['/']);
        }
        return $this->render('inbox', []);
    }
}
