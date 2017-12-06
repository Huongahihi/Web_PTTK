<?php
/**
 * Created by PhpStorm.
 * User: tongd
 * Date: 6/20/2017
 * Time: 2:15 PM
 */

use common\components\FHtml;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\widgets\fheadline\FPageHeader;

$this->title = FHtml::t('common','Sign in');

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

if (!isset($model)) {
    $model = new \common\models\LoginFormFrontend();
    $model2 = new \frontend\models\SignupForm();
}

$t_username = FHtml::t('common', 'Username');
$t_password = FHtml::t('common', 'Password');
$t_password_repeat = FHtml::t('common', 'Confirm your password');
$t_remember = FHtml::t('common','Remember Me');
?>
<style>
    .auth-clients a{
        padding-left: 0;
        padding-right: 0;
        margin-top: 0;
    }
    .fb{
        padding: 12px 20px;
        height: 44px;
        color:white;
        background-color: #46629E;
    }
	.login label {
    	margin-top: 10px
    }
    .checkbox label {
        margin: 0;
    }
     @media only screen and (max-width: 768px) {
        #chbox{
        	height: 30px;
        }
        #chbox2{
        	margin-bottom: 20px;
        }
    }
    /*@media only screen and (max-width: 768px) {
        .tabs-list li{
            margin-top: 10px;
        }
    }*/
</style>
<!--=== Page Header ===-->
<?= FPageHeader::widget([
    'title' => $this->title, 'overview' => '', 'display_type' => 'pageheader_blank']) ?>
<!--=== End Page Header ===-->
<?= FHtml::showCurrentMessages() ?>

<div class="login-page page fix"><!--start login Area-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-5">
                <div class="login">
                    <?php
                    $form = ActiveForm::begin(['id' => 'login-form',
                        'action' => FHtml::createUrl('/login'),
                        'method' => 'post',
                        'options' => [
                            'class' => '',
                        ]]);
                    ?>
                    <h2><?= FHtml::t('common','Login') ?></h2>
                    <!-- <p>Welcome to your account</p> -->
                    
                    <label><?= $t_username ?><span>*</span></label>
                    <?= $form
                        ->field($model,'username')
                        ->label(false)
                        ->textInput() ?>
                    <label><?= $t_password ?><span>*</span></label>
                    <?= $form
                        ->field($model, 'password')
                        ->label(false)
                        ->passwordInput() ?>
                    <div class="row remember">
                        <div class="col-md-6" id="chbox"><?= $form->field($model, 'rememberMe')->checkbox(['label' => $t_remember]) ?></div>
                        <div class="col-md-6" id="chbox2"><a href="#"><?= FHtml::t('common','Forgot Your Password ?') ?></a></div>
                    </div>
                    <input style="margin-top: 0px" type="submit" value="<?= FHtml::t('common','Sign in') ?>" name="login-button"/>
                    <p style="margin-top: 40px"><?= FHtml::t('common','Or')  ?> </p>
                    <div class="social-login">
                         <?= yii\authclient\widgets\AuthChoice::widget([
                             'baseAuthUrl' => ['site/auth'],
                         ]) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-sm-6 col-md-5">
                <div class="login">
                    <?php $form = ActiveForm::begin(['id' => 'signup-form',
                        'action' => FHtml::createUrl('/signup'),
                        'method' => 'post',
                        'options' => [
                            'class' => '',
                        ]]);
                    ?>
                    <h2><?= FHtml::t('common','Create A new Account') ?></h2>
                    <label><?= $t_username ?><span>*</span></label>
                    <?= $form
                        ->field($model2, 'username')
                        ->input('username')
                        ->label(false)
                        ->textInput() ?>
                    <label>E-mail<span>*</span></label>
                    <?= $form
                        ->field($model2, 'email')
                        ->input('email')
                        ->label(false)
                        ->textInput() ?>
                    <label><?= $t_password ?><span>*</span></label>
                    <?= $form
                        ->field($model2, 'password')
                        ->label(false)
                        ->passwordInput() ?>
                    <label><?= $t_password_repeat ?><span>*</span></label>
                    <?= $form->field($model2, 'password_repeat')->passwordInput()->label(false) ?>
                    <input type="submit" value="<?= FHtml::t('common','Sign up') ?>" name="signup-button"/>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div><!--End login Area-->
