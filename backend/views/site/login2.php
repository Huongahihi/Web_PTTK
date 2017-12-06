<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\FHtml;

$this->title = 'Login';
?>
<style>
    .div-full {
        height: 100%;
        padding: 0;
        padding-top:40px;
        padding-bottom:40px;
        margin:0;     /* This is used to reset any browser-default margins */
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        background-image: url('<?= FHtml::getImageUrl(FHtml::settingAdminBackground(), '') ?>');
    }
    .login .content {
        margin:0 auto 0;
    }
    @media only screen and (max-width: 480px){
        .login .content .form-actions {
            padding-bottom: 0 !important;
        }
    }
</style>
<div class="div-full">
    <div class="content">
        <div class="logo" style="">
            <?= \common\components\FHtml::showCurrentLogo('100%', '', '', '') ?>
        </div>
        <!-- BEGIN LOGIN FORM -->

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => [
            'class' => 'login-form'
        ]]); ?>
        <h3 class="form-title" style="text-align: center; margin-bottom: 30px"><?php if (APPLICATIONS_ENABLED) echo FHtml::currentCompanyName(); else echo FHtml::t('common', 'User Login') ?></h3>
        <hr/>
        <h5><?= FHtml::t('common', 'Login using Username or Email') ?></h5>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Enter any username and password. </span>
        </div>

        <?= $form->field($model, 'username', ['template' => "{label}\n<label class=\"control-label visible-ie8 visible-ie9\">Username</label>\n<div class=\"input-icon\"><i class=\"fa fa-user\"></i>\n{input}\n</div>\n{hint}\n{error}"])
            ->textInput([
                'autofocus' => true,
                'placeholder' => 'Username',
                'class' => 'form-control placeholder-no-fix',
                'autocomplete' => 'off'
            ])
            ->label(false)
        ?>

        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <?= $form->field($model, 'password', ['template' => "{label}\n<label class=\"control-label visible-ie8 visible-ie9\">Password</label>\n<div class=\"input-icon\"><i class=\"fa fa-lock\"></i>\n{input}\n</div>\n{hint}\n{error}"])
                ->passwordInput([
                    'autofocus' => true,
                    'placeholder' => 'Password',
                    'class' => 'form-control placeholder-no-fix',
                    'autocomplete' => 'off'
                ])
                ->label(false)
            ?>
        </div>

        <div class="form-actions">
            <?= $form->field($model, 'rememberMe', ['template' => "<label class=\"rememberme mt-checkbox mt-checkbox-outline\">\n{input}\nRemember Me<span></span></label>\n{error}", 'options' => ['class' => 'col-xs-8']])->checkbox([], false) ?>

            <?= Html::submitButton('Login', ['class' => 'btn green pull-right', 'name' => 'login-button']) ?>

        </div>
        <?php ActiveForm::end(); ?>

        <div class="login-options">
            <h4>Or access via</h4>
            <ul class="social-icons">
                <li>
                    <a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
                </li>
                <li>
                    <a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
                </li>
                <li>
                    <a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
                </li>
                <li>
                    <a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
                </li>
            </ul>
        </div>
        <!-- END LOGIN FORM -->
        <div class="copyright" style="margin-top:0px;margin-bottom: 0;color:darkgrey"> <?= \common\components\FHtml::settingCompanyPowerby() ?> </div>
    </div>
</div>

