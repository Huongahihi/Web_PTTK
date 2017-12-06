<?php
namespace frontend\components;

use backend\models\AppUser;
use backend\models\ObjectCategory;
use backend\modules\cms\Cms;
use common\components\FHtml;
use common\models\LoginFormFrontend;
use frontend\components\Helper;
use Yii;
use yii\web\Controller;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\modules\travel\Travel;

class FrontendController extends \common\controllers\BaseFrontendController
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => array(
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV === 'test' ? 'testme' : null,
                'transparent' => true,
                'minLength' => 3,
                'maxLength' => 4
            ),
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'oAuthSuccess'],
            ],
        ];
    }


    /**
     * This function will be triggered when user is successfuly authenticated using some oAuth client.
     *
     * @param Yii\authclient\ClientInterface $client
     */

    public function successCallback($client)
    {
        $attributes = $client;
//        var_dump($attributes); die;
        $user = AppUser::find()->where(['email' => $attributes['email']])->one();
        if (!empty($user)) {
            return Yii::$app->getUser()->login($user, 3600 * 24 * 30);
        } else {
            $model2 = new SignupForm();
            $model2->email = $attributes['email'];
            $model2->username = explode('@', $model2->email)[0];
            $model2->password = $attributes['email'];
            $model2->password_repeat = $attributes['email'];
            if ($user = $model2->signup()) {
                if (is_object($user))
                    FHtml::currentUser()->login($user, 3600 * 24 * 30);
            }
        }
    }

    /**
     * This function will be triggered when user is successfuly authenticated using some oAuth client.
     *
     * @param Yii\authclient\ClientInterface $client
     */
    public function oAuthSuccess($client)
    {
        // get user data from client
        $userAttributes = $client->getUserAttributes();
        $this->successCallback($userAttributes);
        // do some thing with user data. for example with $userAttributes['email']
    }

    public function init()
    {
        parent::init();
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    protected function createMenu()
    {
        $controller = $this->getUniqueId();
        $action = $this->action->id;

        $this->mainMenu = Helper::getFrontendMenu($controller, $action);
        $this->view->params['mainMenu'] = $this->mainMenu;
    }

    public function authorizeUser()
    {
        $user = FHtml::currentUserIdentity();
        if (!isset($user))
            $this->goHome();
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (Yii::$app->request->isAjax) {
            $model = new LoginFormFrontend();
            $model->email = FHtml::getRequestParam('email');
            $model->password = FHtml::getRequestParam('password');
            $model->asAdmin = FHtml::getRequestParam('asAdmin');

            if (!isset($model->asAdmin))
                $model->asAdmin = false;

            if ($model->asAdmin == 'false')
                $model->asAdmin = false;
            else
                $model->asAdmin = true;

            if ($model->login())
                return 1;
            else
                return FHtml::t('common', 'Invalid Username & Password. Please check again.');
        } else {
            $model = new LoginFormFrontend();

            if ($model->load(Yii::$app->request->post())) {
                if ($model->login()) {
                    return $this->goBack();
                }
            } else {
                return $this->goBack();
            }
        }
    }

    public function actionSignup()
    {
        if (Yii::$app->request->isAjax) {
            $model2 = new SignupForm();
            $model2->email = FHtml::getRequestParam('email');
            $model2->password = FHtml::getRequestParam('password');
            $model2->username = $model2->email;
            if ($user = $model2->signup()) {
                if (is_object($user))
                    $result = FHtml::currentUser()->login($user, 3600 * 24 * 30);
                if ($result)
                    return 1;
                else
                    return FHtml::t('common', 'Unable to register as Invalid Username & Password. Please check again.');
            }
            return FHtml::t('common', 'Unable to register as Invalid Username & Password. Please check again.');

        } else {
            $model2 = new SignupForm();

            if ($model2->load(Yii::$app->request->post())) {
                if ($user = $model2->signup()) {
                    if (is_object($user))
                        FHtml::currentUser()->login($user, 3600 * 24 * 30);

                    return $this->goBack();
                }
            } else {
                return $this->render('signup', [
                    'model' => $model2
                ]);
            }
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        FHtml::currentUser()->logout();

        if (Yii::$app->request->isAjax) {
            return true;
        } else {
            return $this->goBack();
        }
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->refresh();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


}

