<?php
namespace common\models;

use backend\models\AuthPermission;
use backend\modules\app\models\AppUserDevice;
use common\components\FHtml;
use common\components\FSecurity;
use Yii;
use yii\base\NotSupportedException;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $image
 * @property string $overview
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property string $role
 * @property string $application_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends BaseModel implements IdentityInterface
{
    const STATUS_DELETED = FHtml::USER_STATUS_DELETED;
    const STATUS_DISABLED = FHtml::USER_STATUS_DELETED;
    const STATUS_ACTIVE = FHtml::USER_STATUS_ACTIVE;
    const ROLE_USER = FHtml::ROLE_USER;
    const ROLE_MODERATOR = FHtml::ROLE_MODERATOR;
    const ROLE_ADMIN = FHtml::ROLE_ADMIN;
    const ROLE_ALL = FHtml::ROLE_ALL;
    const ROLE_NONE = FHtml::ROLE_NONE;

    public $password_new;
    public $rights_array;
    public $groups_array;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id, $check_applications = null)
    {
        return parent::findOne($id, false);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username, $check_applications = null)
    {
        if (!isset($check_applications)) {
            if (FHtml::currentApplicationId() !== DEFAULT_APPLICATION_ID) {
                $check_applications = true;
            } else if (APPLICATIONS_ENABLED) {
                $check_applications = false;
            } else if (empty(DEFAULT_APPLICATION_ID)) {
                $check_applications = false;
            } else {
                $check_applications = !in_array($username, FSecurity::USER_NAME_SUPERADMIN);
            }
        }

        if (in_array($username, FSecurity::USER_NAME_SUPERADMIN)) {
            $check_applications = false;
        }
        $check_applications = true;
        if (strpos($username, '@') !== false) {
            $model =  self::findOne(['email' => $username, 'status' => self::STATUS_ACTIVE], $check_applications);
            if (isset($model))
                return $model;
        }

        $model =  self::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE], $check_applications);

        if ((!isset($model) || !is_object($model)) && in_array($username, FSecurity::USER_NAME_ADMIN)) {
            $username = $username . '_' . FHtml::currentApplicationId();
            $model =  self::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE], true);
        }

        return $model;
    }

    public static function findUser($username)
    {
        if (APPLICATIONS_ENABLED) {
            $check_applications = false;
        } else if (empty(DEFAULT_APPLICATION_ID)) {
            $check_applications = false;
        } else {
            $check_applications = !in_array($username, FSecurity::USER_NAME_SUPERADMIN);
        }

        if (strpos($username, '@') !== false) {
            $model =  self::findOne(['email' => $username, 'status' => self::STATUS_ACTIVE], $check_applications);
            if (isset($model))
                return $model;
        }

        $model = self::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE], $check_applications);
        if ((!isset($model) || !is_object($model)) && in_array($username, FSecurity::USER_NAME_ADMIN)) {
            $username = $username . '_' . FHtml::currentApplicationId();
            $model =  self::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE], true);
        }

        return $model;
    }


    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public static function isAdmin($role)
    {
        return $role == self::ROLE_ADMIN;
    }

    public static function isModerator($role)
    {
        return $role == self::ROLE_MODERATOR;
    }

    public static function isNormalUser($role)
    {
        return $role == self::ROLE_USER;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            //TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            ['role', 'default', 'value' => self::ROLE_USER],
            ['role', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN, self::ROLE_MODERATOR]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getRole()
    {
        return $this->role;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function getDb()
    {
        return FHtml::currentDb();
    }

    public function beforeSave($insert)
    {
        if (empty($this->username)) {
            if (!empty($this->email)) {
                $this->username = explode('@', $this->email)[0];
            } else {
                $this->username = str_replace(' ', '_', $this->name);
            }
        }

        if (key_exists('User', $_POST)) {
            $this->password_new = $_POST['User']['password_new'];

        }

        if (empty($this->email))
            $this->email = $this->username . '@gmail.com';

        if ($insert) {
            FHtml::setUserPassword($this, $this->password_new);

            if (FHtml::isRoleModerator()) // if added user is Admin -> auto Active
                $this->status = FHtml::USER_STATUS_ACTIVE;
        } else {
            if (!empty($this->password_new))
                FHtml::setUserPassword($this, $this->password_new);
        }

        $this->created_at = FHtml::Now();
        $this->updated_at = FHtml::Now();
        $this->application_id = FHtml::currentApplicationId();

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        if (key_exists('User', $_POST)) {
            $userPost = $_POST['User'];
            if (key_exists('groups_array', $userPost)) {
                $groups = $userPost['groups_array'];
                FHtml::updateUserGroups($this, $groups);
            }

            if (key_exists('rights_array', $userPost)) {
                $roles = $userPost['rights_array'];
                FHtml::updateUserRoles($this, $roles);
            }
        }

        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function getGroups()
    {
        $models = $this->hasMany(AuthPermission::className(), ['object2_id' => 'id'])
            ->andOnCondition(['AND',
                ['relation_type' => 'group-user'],
                ['object2_type' => 'user'],
                ['object_type' => 'auth_group']]);

        return $models;
    }

    public function getGroupsArray() {
        return ArrayHelper::getColumn($this->groups, 'object_id');
    }

    public function getRights()
    {
        $models = $this->hasMany(AuthPermission::className(), ['object_id' => 'id'])
            ->andOnCondition(['AND',
                ['relation_type' => 'user-role'],
                ['object2_type' => 'auth_role'],
                ['object_type' => 'user']]);

        return $models;
    }

    public function getRightsArray() {
        return ArrayHelper::getColumn($this->rights, 'object2_id');
    }

    /*
  * @property AppUserDevice[] $devices
  */
    public function getDevice()
    {
        return $this->hasMany(AppUserDevice::className(), ['user_id' => 'id']);
    }
}
