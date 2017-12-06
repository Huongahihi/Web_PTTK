<?php

namespace backend\models;

use Yii;
use common\components\FHtml;
use common\components\FModel;
use common\models\BaseModel;
use frontend\models\ViewModel;
use yii\helpers\ArrayHelper;


/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the model class for table "user".
 *

 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $username
 * @property string $image
 * @property string $overview
 * @property string $content
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $birth_date
 * @property string $birth_place
 * @property string $gender
 * @property string $identity_card
 * @property string $email
 * @property string $phone
 * @property string $skype
 * @property string $address
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $post_code
 * @property string $organization
 * @property string $department
 * @property string $position
 * @property string $start_date
 * @property string $end_date
 * @property integer $lat
 * @property integer $long
 * @property double $rate
 * @property integer $rate_count
 * @property string $card_number
 * @property string $card_name
 * @property string $card_exp
 * @property string $card_cvv
 * @property string $balance
 * @property integer $point
 * @property integer $role
 * @property string $type
 * @property integer $status
 * @property integer $is_online
 * @property string $last_login
 * @property string $last_logout
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $application_id
 */
class UserBase extends \common\models\User //\yii\db\ActiveRecord
{
    const ROLE_ADMIN = 'ADMIN';
    const STATUS_DISABLED = FHtml::USER_STATUS_DELETED;
    const STATUS_ACTIVE = FHtml::USER_STATUS_ACTIVE;

    /**
    * @inheritdoc
    */
    public $tableName = 'user';

    public static function tableName()
    {
        return 'user';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return FHtml::currentDb();
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
        
            [['id', 'code', 'name', 'username', 'image', 'overview', 'content', 'auth_key', 'password_hash', 'password_reset_token', 'birth_date', 'birth_place', 'gender', 'identity_card', 'email', 'phone', 'skype', 'address', 'country', 'state', 'city', 'post_code', 'organization', 'department', 'position', 'start_date', 'end_date', 'lat', 'long', 'rate', 'rate_count', 'card_number', 'card_name', 'card_exp', 'card_cvv', 'balance', 'point', 'role', 'type', 'status', 'is_online', 'last_login', 'last_logout', 'created_at', 'updated_at', 'application_id'], 'filter', 'filter' => 'trim'],
            [['content'], 'string'],
            [['birth_date', 'start_date', 'end_date', 'last_login', 'last_logout'], 'safe'],
            [['lat', 'long', 'rate_count', 'point', 'role', 'status', 'is_online', 'created_at', 'updated_at'], 'integer'],
            [['rate', 'balance'], 'number'],
            [['code', 'name', 'username', 'password_hash', 'password_reset_token', 'birth_place', 'identity_card', 'email', 'phone', 'skype', 'post_code', 'card_number', 'card_name', 'card_exp', 'card_cvv'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 300],
            [['overview', 'address'], 'string', 'max' => 2000],
            [['auth_key'], 'string', 'max' => 32],
            [['gender', 'country', 'state', 'city', 'organization', 'department', 'position', 'type', 'application_id'], 'string', 'max' => 100],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
                    'id' => FHtml::t('User', 'ID'),
                    'code' => FHtml::t('User', 'Code'),
                    'name' => FHtml::t('User', 'Name'),
                    'username' => FHtml::t('User', 'Username'),
                    'image' => FHtml::t('User', 'Image'),
                    'overview' => FHtml::t('User', 'Overview'),
                    'content' => FHtml::t('User', 'Content'),
                    'auth_key' => FHtml::t('User', 'Auth Key'),
                    'password_hash' => FHtml::t('User', 'Password Hash'),
                    'password_reset_token' => FHtml::t('User', 'Password Reset Token'),
                    'birth_date' => FHtml::t('User', 'Birth Date'),
                    'birth_place' => FHtml::t('User', 'Birth Place'),
                    'gender' => FHtml::t('User', 'Gender'),
                    'identity_card' => FHtml::t('User', 'Identity Card'),
                    'email' => FHtml::t('User', 'Email'),
                    'phone' => FHtml::t('User', 'Phone'),
                    'skype' => FHtml::t('User', 'Skype'),
                    'address' => FHtml::t('User', 'Address'),
                    'country' => FHtml::t('User', 'Country'),
                    'state' => FHtml::t('User', 'State'),
                    'city' => FHtml::t('User', 'City'),
                    'post_code' => FHtml::t('User', 'Post Code'),
                    'organization' => FHtml::t('User', 'Organization'),
                    'department' => FHtml::t('User', 'Department'),
                    'position' => FHtml::t('User', 'Position'),
                    'start_date' => FHtml::t('User', 'Start Date'),
                    'end_date' => FHtml::t('User', 'End Date'),
                    'lat' => FHtml::t('User', 'Lat'),
                    'long' => FHtml::t('User', 'Long'),
                    'rate' => FHtml::t('User', 'Rate'),
                    'rate_count' => FHtml::t('User', 'Rate Count'),
                    'card_number' => FHtml::t('User', 'Card Number'),
                    'card_name' => FHtml::t('User', 'Card Name'),
                    'card_exp' => FHtml::t('User', 'Card Exp'),
                    'card_cvv' => FHtml::t('User', 'Card Cvv'),
                    'balance' => FHtml::t('User', 'Balance'),
                    'point' => FHtml::t('User', 'Point'),
                    'role' => FHtml::t('User', 'Role'),
                    'type' => FHtml::t('User', 'Type'),
                    'status' => FHtml::t('User', 'Status'),
                    'is_online' => FHtml::t('User', 'Is Online'),
                    'last_login' => FHtml::t('User', 'Last Login'),
                    'last_logout' => FHtml::t('User', 'Last Logout'),
                    'created_at' => FHtml::t('User', 'Created At'),
                    'updated_at' => FHtml::t('User', 'Updated At'),
                    'application_id' => FHtml::t('User', 'Application ID'),
                ];
    }

    public static function tableSchema()
    {
        return FHtml::getTableSchema(self::tableName());
    }

    public static function Columns()
    {
        return self::tableSchema()->columns;
    }

    public static function ColumnsArray()
    {
        return ArrayHelper::getColumn(self::tableSchema()->columns, 'name');
    }

    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        $i18n = Yii::$app->i18n;
        $i18n->translations['User*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/messages',
            'fileMap' => [
                'User' => 'User.php',
            ],
        ];
    }




}
