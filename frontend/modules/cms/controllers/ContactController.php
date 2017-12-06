<?php
namespace frontend\modules\cms\controllers;

use backend\modules\cms\models\CmsFeedback;
use common\components\FHtml;
use frontend\components\FrontendController;

use frontend\models\ContactForm;
use Yii;

/**
 * Site controller
 */
class ContactController extends FrontendController
{
    public $defaultAction = 'index';

    public function actionIndex($page = false, $keyword = false, $category_id = false, $id = false)
    {

        $model = new ContactForm();
        $model_feedback = new CmsFeedback();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->sendEmail('hung.hoxuan@gmail.com')) {
                    $application_id = FHtml::currentApplicationId();
                    $model_feedback->name = $model->name;
                    $model_feedback->email = $model->email;
                    $model_feedback->phone = $model->phone;
                    $model_feedback->title = $model->title;
                    $model_feedback->content = html_entity_decode($model->content);
                    $model_feedback->user_id = '';
                    $model_feedback->ip_address = '';
                    $model_feedback->type = '';
                    $model_feedback->status = '';
                    $model_feedback->created_date = date('Y-m-d H:i:s', time());
                    $model_feedback->application_id = $application_id;

                    if ($model_feedback->save()) {
                        $text = FHtml::t('common', 'Thank You for contacting us. Our team will get back to you.');
                        FHtml::addMessage($text);
                    } else {
                        $text = FHtml::t('common', 'There was an error sending email.');
                        FHtml::addError($text);
                    }

                } else {
                    $text = FHtml::t('common', 'There was an error sending email.');
                    FHtml::addError($text);
                }
                return $this->render('index', [
                    'model' => $model,
                ]);
            } else {
                $text = $model->errors;
                FHtml::addError($text);
                return $this->render('index', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('index', [
                'model' => $model
            ]);
        }
    }
}
