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
 * This is the customized model class for table "music_song".
 */
class MusicSong extends MusicSongBase //\yii\db\ActiveRecord
{
    const LOOKUP = ['type' => [

        ['id' => MusicSong::TYPE_ORIGINAL, 'name' => 'ORIGINAL'],

        ['id' => MusicSong::TYPE_REMIX, 'name' => 'REMIX'],

        ['id' => MusicSong::TYPE_REMAKE, 'name' => 'REMAKE'],

        ['id' => MusicSong::TYPE_COVER, 'name' => 'COVER'],

    ],

        'status' => [

            ['id' => MusicSong::STATUS_NEW, 'name' => 'NEW'],

            ['id' => MusicSong::STATUS_HOT, 'name' => 'HOT'],

            ['id' => MusicSong::STATUS_HIT, 'name' => 'HIT'],

            ['id' => MusicSong::STATUS_CLASSIC, 'name' => 'CLASSIC'],

        ],

    ];


    const COLUMNS_UPLOAD = ['thumbnail', 'image', 'song_file',];


    public $order_by = 'is_hot desc,is_top desc,is_active desc,created_date desc,';


    const OBJECTS_RELATED = ['music_artist', 'music_playlist'];

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

            [['id', 'thumbnail', 'image', 'song_file', 'name', 'description', 'content', 'price', 'duration', 'release_date', 'artist_singer_id', 'artist_composer_id', 'is_hot', 'is_top', 'is_active', 'is_video', 'lang', 'type', 'status', 'mood', 'category_id', 'count_views', 'count_likes', 'count_purchase', 'count_comments', 'count_rates', 'rates', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],

            [['name'], 'required'],

            [['content'], 'string'],

            [['price'], 'number'],

            [['release_date', 'created_date', 'modified_date','album_id'], 'safe'],

            [['is_hot', 'is_top', 'is_active', 'is_video', 'count_views', 'count_likes', 'count_purchase', 'count_comments', 'count_rates', 'rates'], 'integer'],

            [['thumbnail', 'image', 'song_file'], 'string', 'max' => 300],

            [['name'], 'string', 'max' => 255],

            [['description'], 'string', 'max' => 2000],

            [['duration'], 'string', 'max' => 8],

            [['artist_singer_id', 'artist_composer_id', 'lang', 'type', 'status', 'mood', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],

            [['category_id'], 'string', 'max' => 500],

        ];

    }


    // Related Object: music_artist

    private $music_artist;

    public function getMusicArtist()
    {

        if (!isset($this->music_artist))

            $this->music_artist = FHtml::getRelatedModels($this->getTableName(), $this->id, 'music_artist', '');


        return $this->music_artist;

    }

    public function getMusic_artist()
    {

        if (!isset($this->music_artist))

            $this->music_artist = FHtml::getRelatedModels($this->getTableName(), $this->id, 'music_artist', '');


        return $this->music_artist;

    }



    public function setMusicArtist($value)
    {
        $this->music_artist = $value;
    }

    // Related Object: music_playlist

    private $music_playlist;

    public function getMusicPlaylist()
    {

        if (!isset($this->music_playlist))

            $this->music_playlist= FHtml::getRelatedModels($this->getTableName(), $this->id, 'music_playlist', '');


        return $this->music_playlist;

    }

    public function getMusic_playlist()
    {

        if (!isset($this->music_playlist))

            $this->music_playlist= FHtml::getRelatedModels($this->getTableName(), $this->id, 'music_playlist', '');


        return $this->music_playlist;

    }



    public function setMusicPlaylist($value)
    {
        $this->music_playlist= $value;
    }

    // Lookup Object: artist_singer\n

    private $artist_singer;

    public function getArtistSinger()
    {

        if (!isset($this->artist_singer))

            $this->artist_singer = FHtml::getModel('music_artist', '', $this->artist_singer_id, '', false);


        return $this->artist_singer;

    }

    public function setArtistSinger($value)
    {

        $this->artist_singer = $value;

    }


    // Lookup Object: artist_composer\n

    private $artist_composer;

    public function getArtistComposer()
    {

        if (!isset($this->artist_composer))

            $this->artist_composer = FHtml::getModel('music_artist', '', $this->artist_composer_id, '', false);


        return $this->artist_composer;

    }

    public function setArtistComposer($value)
    {
        $this->artist_composer = $value;

    }


    // Lookup Object: album\n

    private $album;

    public function getAlbum()
    {

        if (!isset($this->album))

            $this->album = FHtml::getModel('music_playlist', '', $this->album_id, '', false);


        return $this->album;

    }

    public function setAlbum($value)
    {
        $this->album = $value;
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

