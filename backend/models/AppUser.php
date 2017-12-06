<?php

namespace backend\models;

use backend\modules\app\models\AppUserDevice;
use Yii;
use common\components\FHtml;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "app_user".
 *
 * @property integer $id
 * @property string $avatar
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $auth_key
 * @property string $password
 * @property string $description
 * @property string $gender
 * @property string $dob
 * @property int $role
 * @property string $phone
 * @property string $address
 * @property integer $status
 * @property string $created_date
 * @property string $modified_date
 * @property string $application_id
 */
class AppUser extends \backend\modules\app\models\AppUser implements IdentityInterface
{
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
    public function behaviors()
    {
        return [
        ];
    }

    /*
    * @property AppUserDevice[] $devices
    */
    public function getDevice()
    {
        return $this->hasMany(AppUserDevice::className(), ['user_id' => 'id']);
    }

    /*
    * @property AppUserReviews[] $reviews
    */
    public function getReviews()
    {
        return $this->hasMany(AppUserDevice::className(), ['user_id' => 'id']);
    }

    public static function getDb()
    {
        return FHtml::currentDb();
    }
}
