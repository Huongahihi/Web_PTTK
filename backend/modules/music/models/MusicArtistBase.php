<?php

namespace backend\modules\music\models;

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
 * This is the model class for table "music_artist".
 *

 * @property string $id
 * @property string $thumbnail
 * @property string $image
 * @property string $name
 * @property string $real_name
 * @property string $description
 * @property string $content
 * @property string $birth_date
 * @property string $location
 * @property string $count_views
 * @property string $count_likes
 * @property string $count_rates
 * @property integer $rates
 * @property integer $is_top
 * @property integer $is_new
 * @property integer $is_hot
 * @property integer $is_active
 * @property string $lang
 * @property string $type
 * @property string $status
 * @property string $category_id
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class MusicArtistBase extends BaseModel //\yii\db\ActiveRecord
{
    const TYPE_WRITER = 1;
    const TYPE_SINGER = 2;
    const TYPE_BAND = 3;
    const TYPE_PRODUCER = 4;
    const TYPE_ACTOR = 5;
    const STATUS_NEW = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_RETIRED = 0;

    /**
    * @inheritdoc
    */
    public $tableName = 'music_artist';

    public static function tableName()
    {
        return 'music_artist';
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
    public function attributeLabels()
    {
        return [
                    'id' => 'ID',
                    'thumbnail' => 'Thumbnail',
                    'image' => 'Image',
                    'name' => 'Name',
                    'real_name' => 'Real Name',
                    'description' => 'Description',
                    'content' => 'Content',
                    'birth_date' => 'Birth Date',
                    'location' => 'Location',
                    'count_views' => 'Count Views',
                    'count_likes' => 'Count Likes',
                    'count_rates' => 'Count Rates',
                    'rates' => 'Rates',
                    'is_top' => 'Is Top',
                    'is_new' => 'Is New',
                    'is_hot' => 'Is Hot',
                    'is_active' => 'Is Active',
                    'lang' => 'Lang',
                    'type' => 'Type',
                    'status' => 'Status',
                    'category_id' => 'Category ID',
                    'created_date' => 'Created Date',
                    'created_user' => 'Created User',
                    'modified_date' => 'Modified Date',
                    'modified_user' => 'Modified User',
                    'application_id' => 'Application ID',
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
        $i18n->translations['MusicArtist*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/music/messages',
            'fileMap' => [
                'MusicArtist' => 'MusicArtist.php',
            ],
        ];
    }



}
