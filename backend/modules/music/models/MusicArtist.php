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
 * This is the customized model class for table "music_artist".
 */
class MusicArtist extends MusicArtistBase //\yii\db\ActiveRecord
{
    const LOOKUP = ['type' => [
        ['id' => MusicArtist::TYPE_WRITER, 'name' => 'WRITER'],
        ['id' => MusicArtist::TYPE_SINGER, 'name' => 'SINGER'],
        ['id' => MusicArtist::TYPE_BAND, 'name' => 'BAND'],
        ['id' => MusicArtist::TYPE_PRODUCER, 'name' => 'PRODUCER'],
        ['id' => MusicArtist::TYPE_ACTOR, 'name' => 'ACTOR'],
    ],
        'status' => [
            ['id' => MusicArtist::STATUS_NEW, 'name' => 'NEW'],
            ['id' => MusicArtist::STATUS_ACTIVE, 'name' => 'ACTIVE'],
            ['id' => MusicArtist::STATUS_RETIRED, 'name' => 'RETIRED'],
        ],
    ];

    const COLUMNS_UPLOAD = ['thumbnail', 'image',];

    public $order_by = 'is_top desc,is_hot desc,is_active desc,created_date desc,';

    const OBJECTS_RELATED = ['music_song', 'music_playlist'];
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

            [['id', 'thumbnail', 'image', 'name', 'real_name', 'description', 'content', 'birth_date', 'location', 'count_views', 'count_likes', 'count_rates', 'rates', 'is_top', 'is_new', 'is_hot', 'is_active', 'lang', 'type', 'status', 'category_id', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],

            [['name'], 'required'],
            [['content'], 'string'],
            [['birth_date', 'created_date', 'modified_date'], 'safe'],
            [['count_views', 'count_likes', 'count_rates', 'rates', 'is_top', 'is_new', 'is_hot', 'is_active'], 'integer'],
            [['thumbnail', 'image'], 'string', 'max' => 300],
            [['name', 'real_name', 'location'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 2000],
            [['lang', 'type', 'status', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
            [['category_id'], 'string', 'max' => 500],
        ];
    }

    // Related Object: music_song
    protected $music_song;

    public function getMusicSong()
    {
        if (!isset($this->music_song)) {
            $this->music_song = FHtml::getRelatedModels($this->getTableName(), $this->id, 'music_song', '');
        }

        return $this->music_song;
    }

    public function setMusicSong($value)
    {
        $this->music_song = $value;
    }

    // Related Object: music_playlist
    public $music_playlist;

    public function getMusicPlaylist()
    {
        if (!isset($this->music_playlist))
            $this->music_playlist = FHtml::getRelatedModels($this->getTableName(), $this->id, 'music_playlist', '');

        return $this->music_playlist;
    }

    public function setMusicPlaylist($value)
    {
        $this->music_playlist = $value;
    }

    public function prepareCustomFields()
    {
        parent::prepareCustomFields();

        $this->music_song = self::getMusicSong();
        $this->music_playlist = self::getMusicPlaylist();
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
