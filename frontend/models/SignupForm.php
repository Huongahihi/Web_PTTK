<?php
namespace frontend\models;

use backend\models\AppUser;
use common\components\FHtml;
use yii\base\Model;
use common\models\User;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $name;
    public $email;
    public $password;
    public $password_repeat;
    public $rememberMe = true;

    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required'],
            ['name', 'unique', 'targetClass' => '\backend\models\AppUser', 'message' => FHtml::t('common','This username has already been taken.')],
            ['name', 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\backend\models\AppUser', 'message' => FHtml::t('common', 'This email address has already been taken.')],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'required'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=> FHtml::t('common','These passwords do not match. Record?') ],
        ];
    }

    /**
     * Signs user up.
     *
     * @return AppUser|null the saved model or null if saving fails
     */

    public function signup()
    {
        if (!$this->validate()) {
            return 'Validation fail!';
        }
        $user = new User();
        $user->email = $this->email;
        $user->name = $this->name;
        $user->username = $this->name;

        FHtml::setFieldValue($user, 'is_active', \Globals::STATE_ACTIVE);
        FHtml::setFieldValue($user, 'status', \Globals::STATE_ACTIVE);

        $user->setPassword($this->password);
        $user->generateAuthKey();

        if ($user->save()){
            return $user;
        }
        else
            return json_encode($user->getErrors());
    }
}
