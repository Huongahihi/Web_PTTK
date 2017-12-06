<?php

namespace backend\models;

use backend\modules\system\System;
use common\components\AccessRule;
use common\components\FConfig;
use common\components\FConstant;
use common\components\FHtml;
use common\components\FSecurity;
use Yii;
use yii\helpers\BaseInflector;
use yii\helpers\Json;

/**
 * @property AuthPermission[] $roles
 */
class AuthMenu extends AuthMenuBase
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['icon', 'name', 'route', 'group', 'role', 'is_active'], 'required'],
            [['is_active'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['icon', 'name', 'route'], 'string', 'max' => 255],
            [['group', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
            [['role'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('auth', 'ID'),
            'icon' => Yii::t('auth', 'Icon'),
            'name' => Yii::t('auth', 'Name'),
            'route' => Yii::t('auth', 'Route'),
            'group' => Yii::t('auth', 'Group'),
            'is_active' => Yii::t('auth', 'Is Active'),
            'created_date' => Yii::t('auth', 'Created Date'),
            'created_user' => Yii::t('auth', 'Created User'),
            'modified_date' => Yii::t('auth', 'Modified Date'),
            'modified_user' => Yii::t('auth', 'Modified User'),
            'application_id' => Yii::t('auth', 'Application ID'),
        ];
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return FHtml::currentDb();
    }

    /**
     * Connections
     */
    public function getRoles()
    {
        return $this->hasMany(AuthPermission::className(), ['object_id' => 'id'])
            ->andOnCondition(['AND',
                ['relation_type' => 'menu-role'],
                ['object2_type' => 'auth_menu'],
                ['object_type' => 'auth_role']
            ]);
    }

    public static function menuItem($route, $name, $icon, $active, $roles = array(), $children = false)
    {
        return FSecurity::createBackendMenuItem($route, $name, $icon, $active, $roles, $children);
    }

    public static function buildDashBoardMenu()
    {
        $controller = FHtml::currentController();

        return AuthMenu::menuItem(
            'site/index',
            'Trang chủ',
            'fa fa-list',
            $controller == 'site',
            ['content']
        );
    }

    public static function buildAdministrationMenu()
    {
        $currentRole = FHtml::getCurrentRole();
        if ($currentRole != User::ROLE_ADMIN)
            return null;

        $menu = System::createModuleMenu();

        return $menu;
    }

    public static function buildToolsMenu()
    {
        $controller = FHtml::currentController();
        $action = FHtml::currentAction();
        $currentRole = FHtml::getCurrentRole();
        if ($currentRole != User::ROLE_ADMIN)
            return null;

        $menu = array(
            'active' => FHtml::isInArray($controller, ['tools*']),
            'name' => Yii::t('common', 'Tools'),
            'icon' => 'glyphicon glyphicon-wrench',
            'url' => FHtml::createUrl('/tools/index'),
            'children' => array(
                array(
                    'label' => Yii::t('common', 'Api'),
                    'active' => in_array($controller, ['tools']) AND ($action == 'api'),
                    'url' => FHtml::createUrl('tools/api'),
                    'icon' => '',
                ),
                array(
                    'label' => Yii::t('common', 'Cache'),
                    'active' => $controller == 'tools' AND ($action == 'cache'),
                    'url' => FHtml::createUrl('tools/cache'),
                    'icon' => '',
                ),
                array(
                    'label' => Yii::t('common', 'Phpmyadmin'),
                    'active' => in_array($controller, ['tools']) AND ($action == 'api'),
                    'url' => FHtml::currentDomain() . '/phpmyadmin',
                    'icon' => '',
                ),
                array(
                    'label' => Yii::t('common', 'Swagger (API test)'),
                    'active' => in_array($controller, ['tools']) AND ($action == 'api'),
                    'url' => FHtml::currentDomain() . '/swagger',
                    'icon' => '',
                ),
            )
        );

        return $menu;
    }
}
