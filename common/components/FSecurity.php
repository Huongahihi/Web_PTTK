<?php
/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "<?= $generator->generateTableName($tableName) ?>".
 */

namespace common\components;

use backend\models\AppUser;
use backend\models\AuthGroup;
use backend\models\AuthMenu;
use backend\models\AuthPermission;
use backend\models\AuthRole;
use backend\modules\system\models\SettingsMenu;
use backend\modules\system\System;
use common\components\FConstant;
use common\models\LoginForm;
use backend\models\User;
use common\widgets\fmedia\FMedia;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseInflector;
use Yii;
use yii\helpers\Json;

class FSecurity extends FConstant
{
    const USER_NAME_SUPERADMIN = ['root', 'superadmin', 'sysadmin'];
    const USER_NAME_ADMIN = ['admin'];

    public static function currentUser($zone = '')
    {
        if (empty($zone))
            $zone = FHtml::currentZone();

        if ($zone === FRONTEND) {
            $appuser = \Yii::$app->appuser;
            $user = \Yii::$app->user;

            if (isset($user->identity))
                return $user;

            return $appuser;
        }

        $user = \Yii::$app->user;

        return $user;
    }

    public static function currentUserIdentity()
    {
        $user = self::currentUser();
        return isset($user->identity) ? $user->identity : null;
    }

    public static function currentBackendUser()
    {
        $user = self::currentUser(BACKEND);

//        $userModel = FHtml::Session()->get('currentBackendUser');
//        if (!isset($userModel) || FHtml::getFieldValue($userModel, 'username') != FHtml::getFieldValue($user, 'username')) {
//            $userModel = \common\models\User::findOne($user->id, false);
//            if (isset($userModel)) {
//                FHtml::Session()->set('currentBackendUser', $userModel);
//                return $userModel;
//            }
//        }

        return $user;
    }

    public static function currentUserId()
    {
        $identity = self::currentUserIdentity();
        if (isset($identity))
            return $identity->getId();
        else
            return '';
    }

    public static function currentUserModel($zone = '')
    {
        if (empty($zone))
            $zone = FHtml::currentZone();

        if ($zone === FRONTEND) {
            $appuser = \Yii::$app->appuser;
            $user = \Yii::$app->user;

            if (isset($user->identity))
                return self::currentBackendUser();

            return $appuser;
        }

        return self::currentBackendUser();
    }

    public static function addBackendUser($username, $email = '', $password = '123456', $role = User::ROLE_USER)
    {
        return self::addUser($username, $email, $password, $role);
    }

    public static function addUser($username, $email = '', $password = DEFAULT_PASSWORD, $role = User::ROLE_USER, $isBackend = BACKEND)
    {
        if (is_object($username)) {
            $model = $username;
            $username = FHtml::getFieldValue($model, ['username', 'email', 'name']);
            $username = strtolower(str_replace(' ', '_', $username));
            $email = FHtml::getFieldValue($model, ['email']);
            $password = FHtml::getFieldValue($model, ['password'], DEFAULT_PASSWORD);
            $role = FHtml::getFieldValue($model, ['role'], User::ROLE_USER);
        } else {
            $table_name = '';
            if ($isBackend == true || $isBackend == BACKEND) {
                $table_name = 'user';
                $model = FHtml::getModel($table_name, '', ['username' => $username]);
            } else {
                $table_name = 'app_user';
                $model = FHtml::getModel($table_name, '', ['username' => $username]);
            }
        }

        if (self::isRootUser($username) && !FHtml::isRoleAdmin()) {
            FHtml::addError(FHtml::t('common', 'Can not use this username. Please select another username.'));
            return false;
        }

        if ($model->isNewRecord) {
            $model->username = $username;

            if (empty($model->name))
                $model->name = $username;

            $model->email = !empty($email) ? $email : (strpos('@', $username) ? $username : '');
            $model->status = FHtml::USER_STATUS_ACTIVE;
            $model->created_at = time();
            $model->updated_at = time();

            $model->setPassword($password);
            $model->generateAuthKey();
            $model->generatePasswordResetToken();
            $model->role = $role;

            if (!$model->save()) {
                FHtml::addError($model->errors);
                return false;
            }
        }

        return $model;
    }

    public static function addFrontendUser($username, $email = '', $password = DEFAULT_PASSWORD, $role = User::ROLE_USER)
    {
        return self::addAppUser($username, $email, $password, $role);
    }

    public static function addAppUser($username, $email = '', $password = DEFAULT_PASSWORD, $role = User::ROLE_USER)
    {
        return self::addUser($username, $email, $password, $role, FRONTEND);
    }

    public static function getUser($username, $isBackend = BACKEND)
    {
        $zone = FHtml::currentZone();

        if ($isBackend === true || $isBackend === BACKEND) {
            return User::findByUsername($username);
        } else {

            return AppUser::findByUsername($username);
        }
    }

    public static function getUserName($username) {
        if (in_array($username, self::USER_NAME_ADMIN) && APPLICATIONS_ENABLED) {
            $username = $username . '_' . FHtml::currentApplicationId();
        }

        return $username;
    }

    public static function setUserPassword($model, $password_new = '')
    {
        if (empty($password_new))
            $password_new = DEFAULT_PASSWORD;

        $model->setPassword($password_new);
        $model->generateAuthKey();
        $model->generatePasswordResetToken();
        return $model;
    }

    public static function isRoleUser($userid = '')
    {
        if (empty($userid))
            $role = FHtml::getCurrentRole();
        else {
            $role = FHtml::getFieldValue($userid, 'role');
        }
        return $role == \common\models\User::ROLE_USER;
    }

    public static function isRoleModerator($userid = '')
    {
        if (empty($userid))
            $role = FHtml::getCurrentRole();
        else {
            $role = FHtml::getFieldValue($userid, 'role');
        }
        return $role == \common\models\User::ROLE_ADMIN || $role == \common\models\User::ROLE_MODERATOR;
    }

    //HungHX: 20160801
    public static function isInRole($object_type, $action, $role = '', $userid = '', $field = '')
    {
        if ($action == 'update')
            $action = 'edit';

        if ($action == 'add')
            $action = 'create';

        if ($action == 'view-detail') {
            $action = 'view';
        }

        if (empty($object_type))
            $object_type = str_replace('-', '_', FHtml::currentController());

        if (is_object($object_type))
            $object_type = FHtml::getTableName($object_type);

        $object_type = str_replace('-', '_', BaseInflector::camel2id($object_type));

        if (empty($role))
            $role = FHtml::getCurrentRole();

        if (empty($userid))
            $userid = FHtml::currentUserId();

        $user = self::currentUser();
        if (!isset($user)) {
            return false;
        }

        if (in_array($action, ['update', 'edit']) && $user->id == $userid)
            return true;

        if ($user->isGuest && $role != 'guest') {
            return false;
        }

        if ($role == \common\models\User::ROLE_ADMIN) {
            return true; // can do any thing
        }

        $module = FHtml::getModelModule($object_type);
        $controller = str_replace('_', '-', $object_type);

        $rules = FHtml::getControllerRules($object_type);

        if (!empty($rules)) {
            foreach ($rules as $i => $rule) {
                $actions = FHtml::getFieldValue($rule, 'actions');
                if (is_array($actions) && in_array($action, $actions)) {
                    $rights = FHtml::getFieldValue($rule, 'roles');
                    return FHtml::getFieldValue($rule, 'allow', false) && self::isInRoles($rights, $module, $controller, $action);
                }
            }

            return false;
        }

        if ($role == \common\models\User::ROLE_MODERATOR) {
            return in_array($action, ['view', 'index', 'create', 'update']);
        }

        if ($role == \common\models\User::ROLE_USER) {
            return in_array($action, ['view', 'index']);
        }

        if (strlen($role) > 0) {
            return $user->can($role);
        }

        if (strlen($action) > 0)
            return $user->can($action);

        return false;
    }

    public static function getUserRoles($user = null)
    {
        if (!isset($user))
            $user = \Yii::$app->user;

        $roles = array();
        if (isset($user->identity->groups)) {
            $groups = $user->identity->groups;
            /* @var $group AuthPermission */
            foreach ($groups as $group) {
                if (isset($group->group)) {
                    $group_roles = $group->group->roles;
                    foreach ($group_roles as $role) {
                        $roles[] = $role->role->code;
                    }
                }
            }
        }

        if (isset($user->identity->rights)) {
            $rights = $user->identity->rights;
            foreach ($rights as $right) {
                if (isset($right->role))
                    $roles[] = $right->role->code;
            }
        }

        if (count($roles) != 0) {
            $rights = array_merge(array_unique($roles), [$user->identity->role]);
        } else {
            $rights = [$user->identity->role];
        }

        return $rights;
    }


    public static function isInRoles($roles, $module = '', $controller = '', $action = '', $user = null)
    {
        if (FHtml::isRoleAdmin())
            return true;

        if (\Yii::$app->user->isGuest) {
            return false;
        }

        if (empty($roles))
            $roles = [User::ROLE_ALL];

        if (is_string($roles))
            $roles = FHtml::decode($roles);

        $roles = self::getRoles($roles, $module, $controller, $action);

        $user_roles = self::getUserRoles($user);

        return (in_array(User::ROLE_ALL, $roles) || !empty(array_intersect($user_roles, $roles)));
    }

    public static function getRoles($roles, $module = '', $controller = '', $action = '')
    {
        $arr = [];

        if (empty($roles) || !isset($roles)) {
            $roles = [];
        }

        if (is_string($roles)) {
            $roles = [$roles];
        }

        foreach ($roles as $item) {
            if (key_exists($item, FHtml::ROLE_CODE_GROUPS))
                $arr[] = FHtml::ROLE_CODE_GROUPS[$item];
            else
                $arr[] = $item;
        }

        $roles1 = [User::ROLE_ADMIN];

        $object_type = strtolower(str_replace('-', '_', $controller));

        if (in_array($action, ['view', 'index'])) {
            if (!empty($module)) {
                $roles1 = array_merge($roles1, [strtolower($module)]);
                $roles1 = array_merge($roles1, [strtolower($module) . '/view']);
                $roles1 = array_merge($roles1, [strtolower($module) . '/manage']);
                $roles1 = array_merge($roles1, [strtolower($module) . '/admin']);
            }
            if (!empty($controller)) {
                $roles1 = array_merge($roles1, [$object_type]);
                $roles1 = array_merge($roles1, [$object_type . '/view']);
                $roles1 = array_merge($roles1, [$object_type . '/manage']);
                $roles1 = array_merge($roles1, [$object_type . '/admin']);
            }
        } else if (in_array($action, ['add', 'update', 'create', 'update', 'delete'])) {
            if (!empty($module)) {
                $roles1 = array_merge($roles1, [strtolower($module) . '/manage']);
                $roles1 = array_merge($roles1, [strtolower($module) . '/admin']);
            }
            if (!empty($controller)) {
                $roles1 = array_merge($roles1, [$object_type . '/manage']);
                $roles1 = array_merge($roles1, [strtolower($module) . '/admin']);
                $roles1 = array_merge($roles1, [$object_type . '/' . strtolower($action)]);
            }
        } else {
            $roles1 = array_merge($roles1, [$object_type . '/' . strtolower($action)]);
        }

        $arr = array_merge($arr, $roles1);
        return $arr;
    }

    public static function isAuthorized($action, $object_type, $field, $form_name = '', $form_type = '', $role = '', $userid = '', $manualValue = false)
    {
        if (is_object($object_type))
            $object_type = FHtml::getTableName($object_type);

        $object_type = str_replace('-', '_', BaseInflector::camel2id($object_type));

        if (FHtml::isInArray($field, ['id', 'application_id']) && $action != self::ACTION_VIEW)
            return false;

        $user = self::currentUser();
        if (!isset($user)) {
            return false;
        }

        if (empty($role))
            $role = FHtml::getCurrentRole();

        if ($role == self::ROLE_ADMIN)
            return true;

        if (empty($userid))
            $userid = FHtml::currentUserId();

        return self::isInRole($object_type, $action) || $manualValue;
    }

    public static function getPermissions($object_type, $field, $form_name = '', $form_type = '', $role = '', $userid = '')
    {
        return null;
    }


    //HungHX: 20160801
    public static function getCurrentRole()
    {
        $identity = self::currentUserIdentity();

        if (isset($identity))
            return $identity->role;
        else
            return 'guest';
    }

    public static function logOut()
    {
        //\Yii::$app->db->schema->refresh();
//        FHtml::flushCache();
//        FHtml::Session()->close();

        FHtml::setApplicationId('');
        FHtml::refreshCache();
        FHtml::Session()->close();

        $user = FHtml::currentUserIdentity();
        if (isset($user)) {
            FHtml::setFieldValue($user, 'is_online', 0);
            FHtml::setFieldValue($user, 'last_logout', FHtml::Now());
            $user->save();
        }

        \Yii::$app->user->logout();
    }

    public static function logInBackend($model = null, $username = '', $password = '')
    {
        if (!isset($model))
            $model = new LoginForm();
        if (!empty($username) && !empty($password)) {
            $model->username = $username;
            $model->password = $password;
        } else {
            $model->load(\Yii::$app->request->post());
        }
        if ($model->login()) {
            $user = $model->getUser();
            $application_id = FHtml::getFieldValue($model->getUser(), 'application_id');
            if (!empty($application_id) && APPLICATIONS_ENABLED) {
                $application = FHtml::getApplication($application_id);
                if (isset($application)) {
                    FHtml::setApplicationId($application_id);
                    FHtml::setFieldValue($user, 'is_online', 1);
                    FHtml::setFieldValue($user, 'last_login', FHtml::Now());
                    $user->save();
                    return true;
                }
                FSecurity::logOut();
                return false;
            }

            return true;
        }

        return false;
    }

    public static function getControllerBehaviours($rules = [], $controller = '')
    {
        return $rules;
    }

    public static function getApplicationUsers()
    {
        return FHtml::findAll('user');
    }

    public static function getApplicationRoles()
    {
        $result = FHtml::findAll('auth_role');

        return $result;
    }

    public static function getApplicationGroups()
    {
        $result = FHtml::findAll('auth_group');
        return $result;
    }

    public static function getApplicationUsersComboArray($displayName = 'username')
    {
        return ArrayHelper::map(self::getApplicationUsers(), 'id', $displayName);
    }

    public static function getApplicationRolesComboArray()
    {
        $arr = ArrayHelper::map(self::getApplicationRoles(), 'id', 'name');
        return $arr;

//        $object_types = ArrayHelper::getColumn(FHtml::findbySql('select distinct `object_type` from settings_menu'), 'object_type');
//        foreach ($object_types as $object_type) {
//            $object_type = str_replace('_', '-', strtolower($object_type));
//            $arr = array_merge($arr, [$object_type]);
//        }
//
//        $object_types = ArrayHelper::getColumn(FHtml::findbySql('select distinct `module` from settings_menu'), 'module');
//        foreach ($object_types as $object_type) {
//            $object_type = str_replace('_', '-', strtolower($object_type));
//            $arr = array_merge($arr, [$object_type]);
//        }

        return $arr;
    }

    public static function getRolesComboArray()
    {
        $arr = ['admin' => 'Admin', 'moderator' => 'Moderator', 'user' => 'User'];
        $arr = array_merge($arr, ArrayHelper::map(self::getApplicationRoles(), 'code', 'name'));

//        $object_types = ArrayHelper::getColumn(FHtml::findbySql('select distinct `object_type` from settings_menu'), 'object_type');
//        foreach ($object_types as $object_type) {
//            $object_type = str_replace('_', '-', $object_type);
//            $arr = array_merge($arr, [$object_type]);
//        }
        return $arr;
    }

    public static function getApplicationModulesComboArray()
    {
        $application_id = FHtml::currentApplicationCode();
        $result = \yii\helpers\ArrayHelper::map(FHtml::findbySql("select distinct module, module from settings_menu where application_id = '$application_id'"), 'module', 'module');
        return $result;
    }

    public static function populateAuthItems()
    {
        $items = FHtml::getModuleControllersFromUrls();
        foreach ($items as $module => $controllers) {
            $module = strtolower($module);
            $group_model1 = AuthGroup::createOrUpdate(['name' => BaseInflector::camel2words($module) . ' User'], [], false);
            $group_model2 = AuthGroup::createOrUpdate(['name' => BaseInflector::camel2words($module) . ' Admin'], [], false);

            $role_model1 = AuthRole::createOrUpdate(['code' => $module], ['name' => BaseInflector::camel2words($module) . ' - View'], false);
            $role_model2 = AuthRole::createOrUpdate(['code' => "$module/manage"], ['name' => BaseInflector::camel2words($module) . ' - Manage'], false);

            if (is_object($group_model1) && is_object($role_model1))
                $permission_model1 = AuthPermission::createOrUpdate(['object_type' => 'auth_group', 'object_id' => $group_model1->id, 'relation_type' => 'group-role', 'object2_type' => 'auth_role', 'object2_id' => $role_model1->id]);

            if (is_object($group_model2) && is_object($role_model2))
                $permission_model2 = AuthPermission::createOrUpdate(['object_type' => 'auth_group', 'object_id' => $group_model2->id, 'relation_type' => 'group-role', 'object2_type' => 'auth_role', 'object2_id' => $role_model2->id]);

            foreach ($controllers as $controller) {
                $controller = str_replace('-', '_', $controller);
                $role_model1 = AuthRole::createOrUpdate(['code' => $controller], ['name' => BaseInflector::camel2words($controller) . ' - View'], false);
                $role_model2 = AuthRole::createOrUpdate(['code' => "$controller/manage"], ['name' => BaseInflector::camel2words($controller) . ' - Manage'], false);
            }
        }
    }

    public static function getUserGroupModels($user)
    {
        $arr = [];
        $groups = $user->groups;
        foreach ($groups as $group) {
            $arr[] = $group->group;
        }

        return $arr;
    }

    public static function getUserGroupArray($user)
    {
        $groups = self::getUserGroupModels($user);
        $result = ArrayHelper::getColumn($groups, 'object_id');
        return $result;
    }

    public static function getUserRoleModels($user)
    {
        $models = $user->hasMany(AuthPermission::className(), ['object_id' => 'id'])
            ->andOnCondition(['AND',
                ['relation_type' => 'user-role'],
                ['object2_id' => 'auth_group'],
                ['object_type' => 'user']]);
        return $models;
    }

    public static function getUserRoleArray($user)
    {
        $groups = self::getUserRoleModels($user);
        $result = ArrayHelper::getColumn($groups, 'object_id2');
        return $result;
    }

    public static function getGroupRoleModels($group) {

        $arr = [];
        $roles = $group->roles;
        foreach ($roles as $role) {
            $arr[] = $role->role;
        }

        return $arr;
    }

    public static function getApplicationGroupsComboArray()
    {
        return ArrayHelper::map(self::getApplicationGroups(), 'id', 'name');
    }

    public static function saveAuthPermission($object_type, $id, $relation_type, $related_object_type, $related_objects = [])
    {
        if (!isset($id) || empty($id))
            return;

        $time_string = time();
        $today = date('Y-m-d H:i:s', $time_string);

        if (!is_array($related_objects))
            $related_objects = [$related_objects];

        if (count($related_objects) != 0) {
            AuthPermission::deleteAll("relation_type = '$relation_type' AND object_id = $id");
            foreach ($related_objects as $related_object) {
                $new_user = new AuthPermission();
                $new_user->object_id = $id;
                $new_user->object_type = $object_type;
                $new_user->object2_id = $related_object;
                $new_user->object2_type = $related_object_type;
                $new_user->relation_type = $relation_type;
                $new_user->sort_order = 0;
                $new_user->created_date = $today;
                $new_user->save();
            }
        }
    }

    public static function updateUserGroups($userModel, $groups = [])
    {
        $time_string = time();
        $today = date('Y-m-d H:i:s', $time_string);

        if (!is_array($groups))
            $groups = [$groups];

        AuthPermission::deleteAll("relation_type = 'group-user' AND object2_id = $userModel->id AND object2_type='user'");

        foreach ($groups as $group) {
            //$new_user = FHtml::getModel('auth_permission', '', ['relation_type' => 'group-user', 'object2_id' => $userModel->id, 'object2_type' => 'user', 'object_id' => $group, 'object_type' => 'auth_group']);
            $new_user = new AuthPermission();
            if ($new_user->isNewRecord) {
                $new_user->object_id = $group;
                $new_user->object_type = 'auth_group';
                $new_user->object2_id = $userModel->id;
                $new_user->object2_type = 'user';
                $new_user->relation_type = 'group-user';
                $new_user->sort_order = 0;
                $new_user->created_date = $today;
                $new_user->save();

            }
        }
    }

    public static function updateUserRoles($userModel, $roles = [])
    {
        $time_string = time();
        $today = date('Y-m-d H:i:s', $time_string);

        if (!is_array($roles))
            $roles = [$roles];

        AuthPermission::deleteAll("relation_type = 'user-role' AND object_id = $userModel->id AND object_type='user'");

        foreach ($roles as $role) {
            $new_user = new AuthPermission();
            if ($new_user->isNewRecord) {
                $new_user->object2_id = $role;
                $new_user->object2_type = 'auth_role';
                $new_user->object_id = $userModel->id;
                $new_user->object_type = 'user';
                $new_user->relation_type = 'user-role';
                $new_user->sort_order = 0;
                $new_user->created_date = $today;
                $new_user->save();

            }
        }
    }

    public static function getControllerRules($controller = null)
    {
        if (is_string($controller))
            $controller = FHtml::getControllerObject($controller);

        if (is_object($controller) && isset($controller)) {
            $arr = $controller->behaviors();
            if (key_exists('access', $arr))
                $arr = $arr['access'];
            else
                return null;
            if (key_exists('rules', $arr))
                $rules = $arr['rules'];
            else
                return null;
            return $rules;
        }
        return null;
    }

    public static function createAuthRole($controller, $action = '', $description = '')
    {
        if (empty($action)) {
            $name = $controller;
            $action = 'View';
            $description = empty($description) ? 'View, List' : $description;
        } else {
            $name = "$controller/$action";
            $description = empty($description) ? ($action == 'manage' ? 'Create, Update, Delete' : $action) : $description;

        }

        $role = AuthRole::findOne(['code' => $name]);
        if (!isset($role)) {
            $role = new AuthRole();
            $role->code = strtolower($name);
            $role->name = BaseInflector::camel2words($controller) . ' - ' . BaseInflector::camel2words($action);
            $role->description = $description;
            $role->is_active = 1;
            $role->application_id = FHtml::currentApplicationCode();
            $role->save();
        }

        return $role;
    }

    public static function createAuthGroup($controller, $name, $actions = [])
    {
        $name = BaseInflector::camel2words($controller) . ' ' . $name;
        $object_type = str_replace('-', '_', $controller);
        $group = AuthGroup::findOne(['name' => $name]);
        if (!isset($group)) {
            $group = new AuthGroup();
            $group->name = $name;
            $group->is_active = 1;
            $group->application_id = FHtml::currentApplicationCode();
            $group->save();
        }

        if (isset($group) && !empty($actions))
        {
            foreach ($actions as $action) {
                if ($action == 'view')
                    $action = '';

                $role_model = self::createAuthRole($controller, $action);
                if (isset($role_model))
                {
                    self::saveAuthPermission('auth_group', $group->id, 'group-role', 'auth_role', [$role_model->id]);
                }
            }
        }

        return $group;
    }

    public static function generateHash($arr, $algorithm = SECRET_HASH_ALGORITHM, $secret_key = SECRET_KEY, $secret_key_position = true) {
        if (!is_array($arr))
            $arr = [$arr];

        if ($secret_key_position)
            $arr = array_merge([$secret_key], $arr);
        else
            $arr = array_merge($arr, [$secret_key]);

        $arr_str = implode($arr, ',');
        $sha1 = hash($algorithm, $arr_str, true);
        return bin2hex($sha1);
    }

    public static function checkHash($hash, $arr, $algorithm = SECRET_HASH_ALGORITHM, $secret_key = SECRET_KEY, $secret_key_position = null) {
        if (isset($secret_key_position)) {
            $hash1 = self::generateHash($arr, $algorithm, $secret_key, $secret_key_position);
            $hash2 = '';
        } else {
            $hash1 = self::generateHash($arr, $algorithm, $secret_key, true);
            $hash2 = self::generateHash($arr, $algorithm, $secret_key, false);
        }

        if ($hash1 == $hash || $hash2 == $hash)
            return true;
        else
            return false;
    }

    public static function checkExpired($time, $max = FOOTPRINT_TIME_LIMIT) {
        $time_value = is_numeric($time) ? $time : strtotime($time);

        $duration = FHtml::time() - $time_value;

        if (abs($duration) > $max)
            return false;

        return true;
    }

    public static function checkFootPrint($hash, $time, $arr, $check_footprint = true, $check_time = true, $max_duration = FOOTPRINT_TIME_LIMIT, $algorithm = SECRET_HASH_ALGORITHM, $secret_key = SECRET_KEY) {
        if ($check_footprint && !self::checkHash($hash, $arr, $algorithm, $secret_key))
            return FError::INVALID_FOOTPRINT;

        if ($check_time && !self::checkExpired($time, $max_duration))
            return FError::EXPIRED_FOOTPRINT;

        return '';
    }

    public static function isUserInApplication($user = null, $application_id = '')
    {
        if (!isset($user))
            $user = FHtml::currentBackendUser();

        if (empty($application_id))
            $application_id = FHtml::currentApplicationCode();

        if (self::isRoleAdmin($user))
            return true;
        else {
            $user_application_id = FHtml::getFieldValue($user, 'application_id');
            return $application_id == $user_application_id;
        }

        return false;
    }

    public static function isRootUser($username = '')
    {
        if (empty($username)) {
            return self::isRoleAdmin() && in_array(FHtml::currentUsername(), FSecurity::USER_NAME_SUPERADMIN);
        } else {
            return in_array($username, FSecurity::USER_NAME_SUPERADMIN);
        }
    }

    public static function isRoleAdmin($userid = '')
    {
        if (empty($userid))
            $role = FHtml::getCurrentRole();
        else {
            $role = FHtml::getFieldValue($userid, 'role');
        }

        return $role == \common\models\User::ROLE_ADMIN;
    }

    /**
     * Calls a method, function or closure. Parameters are supplied by their names instead of their position.
     * @param $call_arg like $callback in call_user_func_array()
     * Case1: {object, method}
     * Case2: {class, function}
     * Case3: "class::function"
     * Case4: "function"
     * Case5: closure
     * @param array $param_array A key-value array with the parameters
     * @return result of the method, function or closure
     * @throws \Exception when wrong arguments are given or required parameters are not given.
     */
    public static function callFunc($call_arg, array $param_array)
    {
        $Func = null;
        $Method = null;
        $Object = null;
        $Class = null;

        // The cases. f means function name
        // Case1: f({object, method}, params)
        // Case2: f({class, function}, params)
        if(is_array($call_arg) && count($call_arg) == 2)
        {
            if(is_object($call_arg[0]))
            {
                $Object = $call_arg[0];
                $Class = get_class($Object);
            }
            else if(is_string($call_arg[0]))
            {
                $Class = $call_arg[0];
            }

            if(is_string($call_arg[1]))
            {
                $Method = $call_arg[1];
            } else if (is_array($call_arg[1])) {
                list($Class, $Method) = explode("->", $call_arg[0]);
                if (class_exists($Class)) {
                    $Object = \Yii::createObject(['class' => $Class::className()], $call_arg[1]);
                    return $Object->$Method($param_array);
                }
            }
        }
        // Case3: f("class::function", params)
        else if(is_string($call_arg) && strpos($call_arg, "::") !== FALSE)
        {

            list($Class, $Method) = explode("::", $call_arg);
        }
        // Case4: f("function", params)
        else if(is_string($call_arg) && strpos($call_arg, "->") !== FALSE)
        {

            list($Class, $Method) = explode("->", $call_arg);
            if (class_exists($Class)) {
                $properties = FHtml::getFieldValue($param_array, ['properties', 'objectProperties', 1]);
                if (!empty($properties))
                    $objectClass = array_merge($properties, ['class' => $Class::className()]);
                else
                    $objectClass = ['class' => $Class::className()];
                $Object = \Yii::createObject( $objectClass, FHtml::getFieldValue($param_array, ['constructors', 'objectParams', 0]));
                return $Object->$Method(FHtml::getFieldValue($param_array, ['methodParams', 'params', 2]));
            }
        }
        else if(is_string($call_arg) && strpos($call_arg, "::") === FALSE)
        {

            $Method = $call_arg;
        }
        // Case5: f(closure, params)
        else if(is_object($call_arg) && $call_arg instanceof \Closure)
        {
            $Method = $call_arg;
            return $Method($param_array);
        }
        else if(is_object($call_arg))
        {
            $Class = $call_arg;
            $Method = $param_array[0];
            unset($param_array[0]);
            return $Class->$Method($param_array);
        }
        else throw new \Exception("Case not allowed! Invalid Data supplied!");
        if($Class) $Func = new \ReflectionMethod($Class, $Method);
        else $Func = new \ReflectionFunction($Method);
        $params = array();
        foreach($Func->getParameters() as $Param)
        {
            if($Param->isDefaultValueAvailable()) $params[$Param->getPosition()] = $Param->getDefaultValue();
            if(array_key_exists($Param->name, $param_array)) $params[$Param->getPosition()] = $param_array[$Param->name];
            if(!$Param->isOptional() && !isset($params[$Param->getPosition()])) die("No Defaultvalue available and no Value supplied!\r\n");
        }
        if($Func instanceof \ReflectionFunction) return $Func->invokeArgs($params);
        if($Func->isStatic()) return $Func->invokeArgs(null, $params);
        else return $Func->invokeArgs($Object, $params);
    }

    public static function executeApplicationFunction($func_name, $params = null) {
        $helper = FHtml::getApplicationHelper();
        if (isset($helper) && method_exists($helper, $func_name))
        {
            return $helper->$func_name($params);
        }
        if (isset($helper) && method_exists($helper, 'execute')) {
            return $helper->execute($func_name, $params);
        }
    }

    public static function createBackendMenuItem($route, $name, $icon, $active, $roles = array(), $children = false)
    {
        /* @var $check AuthMenu */
        if (empty($route))
            return null;

        $object_type = '';
        $module = ''; $controller = ''; $action = '';
        $arr = explode('/', str_replace('/index', '', trim($route, '/')));
        if (count($arr) > 2) {
            $controller = $arr[1];
            $object_type = str_replace('-', '_', $controller);
            $module = BaseInflector::camel2words($arr[0]);
            $action = $arr[2];

        } else if (count($arr) > 1) {
            $controller = $arr[1];
            $object_type = str_replace('-', '_', $controller);
            $module = BaseInflector::camel2words($arr[0]);
            $action = 'index';

        } else if (count($arr) == 1) {
            $controller = $arr[0];
            $object_type = str_replace('-', '_', $controller);
            $module = BaseInflector::camel2words($name);
            $action = 'index';
        }

        if ($route == '#')
            $condition = ['url' => $route, 'name' => $name];
        else
            $condition = ['url' => $route];

        if (FConfig::isDBSecurityEnabled()) {
            $check = AuthMenu::findOne($condition);
            if (isset($check)) {
                $roles = Json::decode($check->role);

                $menu = array(
                    'active' => $active,
                    'name' => FHtml::t('common', $check->name),
                    'visible' => $check->is_active && AccessRule::checkAccess($roles, $module, $controller, $action),
                    'icon' => $check->icon,
                    'url' => Yii::$app->urlManager->createUrl([$check->route]),
                );

            } else {
                $menu = array(
                    'active' => $active,
                    'name' => FHtml::t('common', $name),
                    'visible' => AccessRule::checkAccess($roles, $module, $controller, $action),
                    'icon' => $icon,
                    'url' => Yii::$app->urlManager->createUrl([$route]),
                );

                $now = time();
                //$imageName = '';
                $today = date('Y-m-d H:i:s', $now);
                $new_menu = new AuthMenu();
                $new_menu->icon = $icon;
                $new_menu->name = $name;
                $new_menu->route = $route;
                $new_menu->group = BACKEND;
                $new_menu->is_active = $active;
                $new_menu->role = Json::encode($roles);
                $new_menu->application_id = FHtml::currentApplicationCode();
                $new_menu->created_user = (string)FHtml::currentUserId();

                if ($route == '#')
                    $new_menu->sort_order = 0;
                else
                    $new_menu->sort_order = 1;

                $new_menu->created_date = $today;

                if (count($arr) > 1) {
                    $new_menu->object_type = $object_type;
                    $new_menu->module = $module;
                    if ($new_menu->module == 'System')
                        $new_menu->module = 'Administration';
                } else if (count($arr) == 1) {
                    if ($name == 'Home') {
                        $new_menu->module = 'Home';
                        $new_menu->object_type = '';
                    } else if ($route !== '#')
                        $new_menu->module = 'Administration';
                    else
                        $new_menu->module = $name == 'Administration' ? 'Administration' : $module;
                }
                $new_menu->save();
            }
        } else {

            $menu = array(
                'active' => $active,
                'name' => FHtml::t('common', $name),
                'visible' => AccessRule::checkAccess($roles, $module, $controller, $action),
                'icon' => $icon,
                'url' => Yii::$app->urlManager->createUrl([$route]),
            );
        }

        if (!($children === false)) { // if all child menu is not visible and also set parent menu is invisible
            $menu['children'] = $children;
            $visible = false;
            foreach ($children as $child) {
                $visible = $visible || $child['visible'];
            }
            $menu['visible'] = $visible;
        }

        return $menu;
    }
}