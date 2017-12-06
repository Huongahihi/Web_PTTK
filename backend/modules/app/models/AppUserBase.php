<?php

namespace backend\modules\app\models;

use backend\models\UserBase;
use common\models\User;
use Yii;
use common\components\FHtml;
use common\components\FModel;
use common\models\BaseModel;
use frontend\models\ViewModel;

/**
* Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the model class for table "app_user".
 *

 * @property integer $id
 * @property string $avatar
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $description
 * @property string $content
 * @property string $gender
 * @property string $dob
 * @property string $phone
 * @property string $weight
 * @property string $height
 * @property string $address
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $balance
 * @property integer $point
 * @property string $card_number
 * @property string $card_cvv
 * @property string $card_exp
 * @property string $lat
 * @property string $long
 * @property double $rate
 * @property integer $rate_count
 * @property integer $is_online
 * @property string $type
 * @property string $status
 * @property integer $role
 * @property string $provider_id
 * @property string $created_date
 * @property string $modified_date
 * @property string $application_id
 */
class AppUserBase extends UserBase //\yii\db\ActiveRecord
{

}
