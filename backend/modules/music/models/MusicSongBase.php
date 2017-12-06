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
 * This is the model class for table "music_song".
 *

 * @property string $id
 * @property string $thumbnail
 * @property string $image
 * @property string $song_file
 * @property string $name
 * @property string $description
 * @property string $content
 * @property string $price
 * @property string $duration
 * @property string $release_date
 * @property string $artist_singer_id
 * @property string $artist_composer_id
 * @property string $album_id
 * @property integer $is_hot
 * @property integer $is_top
 * @property integer $is_active
 * @property integer $is_video
 * @property string $lang
 * @property string $type
 * @property string $status
 * @property string $mood
 * @property string $category_id
 * @property string $count_views
 * @property string $count_likes
 * @property string $count_purchase
 * @property integer $count_comments
 * @property string $count_rates
 * @property integer $rates
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class MusicSongBase extends BaseModel //\yii\db\ActiveRecord
{
    const TYPE_ORIGINAL  = 4;
    const TYPE_REMIX     = 1;
    const TYPE_REMAKE    = 2;
    const TYPE_COVER     = 3;
    const STATUS_NEW     = 4;
    const STATUS_HOT     = 1;
    const STATUS_HIT     = 2;
    const STATUS_CLASSIC = 3;

    /**
    * @inheritdoc
    */
    public $tableName = 'music_song';

    public static function tableName()
    {
        return 'music_song';
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
                    'song_file' => 'Song File',
                    'name' => 'Name',
                    'description' => 'Description',
                    'content' => 'Content',
                    'price' => 'Price',
                    'duration' => 'Duration',
                    'release_date' => 'Release Date',
                    'artist_singer_id' => 'Artist Singer ID',
                    'artist_composer_id' => 'Artist Composer ID',
                    'album_id' => 'Album ID',
                    'is_hot' => 'Is Hot',
                    'is_top' => 'Is Top',
                    'is_active' => 'Is Active',
                    'is_video' => 'Is Video',
                    'lang' => 'Lang',
                    'type' => 'Type',
                    'status' => 'Status',
                    'mood' => 'Mood',
                    'category_id' => 'Category ID',
                    'count_views' => 'Count Views',
                    'count_likes' => 'Count Likes',
                    'count_purchase' => 'Count Purchase',
                    'count_comments' => 'Count Comments',
                    'count_rates' => 'Count Rates',
                    'rates' => 'Rates',
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
        $i18n->translations['MusicSong*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/music/messages',
            'fileMap' => [
                'MusicSong' => 'MusicSong.php',
            ],
        ];
    }



}
