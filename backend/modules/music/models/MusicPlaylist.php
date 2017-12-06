<?php

namespace backend\modules\music\models;


use Yii;

use common\components\FHtml;

use common\components\FModel;

use common\models\BaseModel;

use frontend\models\ViewModel;

use yii\helpers\ArrayHelper;

use backend\models\ObjectRelation;

/**
 * Developed by Hung Ho (Steve): ceo@mozagroup.com | hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
 * Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
 * MOZA TECH Inc: www.mozagroup.com | www.mozasolution.com | www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
 * This is the customized model class for table "music_playlist".
 */
class MusicPlaylist extends MusicPlaylistBase //\yii\db\ActiveRecord
{

    const LOOKUP = ['type' => [

        ['id' => MusicPlaylist::TYPE_USER, 'name' => 'USER'],

        ['id' => MusicPlaylist::TYPE_EDITOR, 'name' => 'EDITOR'],

        ['id' => MusicPlaylist::TYPE_ALBUM, 'name' => 'ALBUM'],

        ['id' => MusicPlaylist::TYPE_SHOW, 'name' => 'SHOW'],

        ['id' => MusicPlaylist::TYPE_BY_ARTIST, 'name' => 'BY_ARTIST'],

    ],

    ];


    const COLUMNS_UPLOAD = ['thumbnail', 'image',];


    public $order_by = 'is_active desc,is_top desc,is_hot desc,created_date desc,';


    const OBJECTS_RELATED = ['music_song',];

    const OBJECTS_META = [];

    public static function getLookupArray($column)
    {

        if (key_exists($column, self::LOOKUP))

            return self::LOOKUP[$column];

        return [];

    }


    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [

            [['id', 'thumbnail', 'image', 'name', 'description', 'release_date', 'songs_count', 'songs_duration', 'is_active', 'is_top', 'is_new', 'is_hot', 'is_album', 'is_video', 'lang', 'type', 'category_id', 'count_views', 'count_likes', 'count_purchase', 'count_rates', 'rates', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],


            [['name'], 'required'],

            [['release_date', 'created_date', 'modified_date'], 'safe'],

            [['songs_count', 'is_active', 'is_top', 'is_new', 'is_hot', 'is_album', 'is_video', 'count_views', 'count_likes', 'count_purchase', 'count_rates', 'rates'], 'integer'],

            [['thumbnail', 'image'], 'string', 'max' => 300],

            [['name'], 'string', 'max' => 255],

            [['description'], 'string', 'max' => 2000],

            [['songs_duration'], 'string', 'max' => 8],

            [['lang', 'type', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],

            [['category_id'], 'string', 'max' => 500],

        ];

    }

    public $songs_count;

    public function getSongs_count()
    {
        if (!isset($this->songs_count))
            $this->songs_count = count($this->getMusicSong());
        return $this->songs_count;
    }

    public function setSongs_count($value)
    {
        $this->songs_count = $value;
    }

    private $music_song;

    // Related Object: music_song
    public function getMusicSong()
    {
        if (!isset($this->music_song))
            $this->music_song = FHtml::getRelatedModels($this->getTableName(), $this->id, 'music_song', '');
        $this->songs_count = count($this->music_song);
        return $this->music_song;
    }

    public function setMusicSong($value)
    {
        $this->music_song = $value;
    }

    public function getMusic_song()
    {
        return $this->getMusicSong();
    }

    public function getObjectCategory()
    {
        $objectCategories = ObjectRelation::find()->where(['object_type' => $this->getTableName(), 'object_id' => $this->id, 'object2_type' => 'object-category'])->all();
        foreach ($objectCategories as $key => $value) {
            $value->category->image = $value->category->getImageurl();
            $this->objectCategories[] = $value->category;
        }
        return $this->objectCategories;
    }

    public static function getRelatedObjects()
    {
        return self::OBJECTS_RELATED;
    }

    public static function getMetaObjects()
    {
        return self::OBJECTS_META;
    }

    public function getObjectCategories() {
        return $this->getCategories();
    }
}

