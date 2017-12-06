<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\FHtml;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
$user = \common\components\FHtml::currentUserIdentity();

if (!isset($model)) {
    $model = new \common\models\LoginFormFrontend();
}
if (!isset($model2)) {
    $model2 = new \frontend\models\SignupForm();
}
$allowAdminLogin = isset($allowAdminLogin) ? $allowAdminLogin : false;

?>
<!--=== Login ===-->
<div class="bg-color-light" style="padding-top:50px;padding-bottom:50px">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php if (!empty($message)) {
                    FHtml::showErrorMessage($message);
                }
                ?>
                <?php $form = ActiveForm::begin(['id' => 'login-form',
                    'action' => FHtml::createUrl('{controller}/login'),
                    'method' => 'post',
                    'options' => [
                        'class' => '',
                    ]]); ?>

                <p>
                    <!--
                    <span class="social-login-facebook"><a class="facebook auth-link" target="_blank"
                                                           href="<?php echo FHtml::createUrl('site/auth', ['authclient' => 'facebook']) ?>"><i
                                    class="fa fa-facebook"></i> Facebook</a></span>

                    <span class="social-login-google"><a href="<?php echo FHtml::createUrl('site/auth', ['authclient' => 'google']) ?>"><i class="fa fa-google"></i> Google</a></span>
                    <span class="social-login-twitter"><a href="#"><i class="fa fa-twitter"></i> Twitter</a></span>
                    -->
                </p>
                <div class="col-md-12">
                    <label>Email</label>
                    <?= $form->field($model, 'email')
                        ->textInput([
                            'autofocus' => true,
                            'placeholder' => 'E-mail',
                            'class' => '',
                            'autocomplete' => 'off'
                        ])
                        ->label(false)
                    ?>
                </div>
                <div class="col-md-12">
                    <label>Password</label>

                    <?= $form->field($model, 'password')
                        ->passwordInput([
                            'autofocus' => true,
                            'placeholder' => 'Password',
                            'class' => '',
                            'autocomplete' => 'off'
                        ])
                        ->label(false)
                    ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'rememberMe', ['template' => "<label class=\"rememberme mt-checkbox mt-checkbox-outline\">\n{input}\nRemember Me<span></span></label>\n{error}", 'options' => ['class' => 'col-xs-8']])->checkbox([], false) ?>
                    <?= $allowAdminLogin ? $form->field($model, 'asAdmin', ['template' => "<label class=\"rememberme mt-checkbox mt-checkbox-outline\">\n{input}\nLogin as Admin ?<span></span></label>\n{error}", 'options' => ['class' => 'col-xs-8']])->checkbox([], false) : '' ?>

                </div>
                <div class="col-md-12">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>

            <div class="col-md-5">

            </div>
        </div>
    </div>
</div>
<!--=== Login ===-->


<script>
    function login($username, $password, $asAdmin) {
        $.ajax({
            url: '<?= FHtml::createUrl('login', []) ?>?email=' + $username + '&password=' + $password + '&asAdmin=' + $asAdmin,
            type: 'post',
            success: function (data) {
                if (data == 1 || data == '')
                    reloadPage();
                else
                    message(data);
            }
        });
    }

    function signup($username, $password) {
        $.ajax({
            url: '<?= FHtml::createUrl('signup', []) ?>?email=' + $username + '&password=' + $password,
            type: 'post',
            success: function (data) {
                if (data == 1 || data == '')
                    reloadPage();
                else
                    message(data);
            }
        });
    }

    function message(data) {
        $('#login-message').html('<br/>' + data);
    }

    function reloadPage() {
        location.reload();
    }
</script>