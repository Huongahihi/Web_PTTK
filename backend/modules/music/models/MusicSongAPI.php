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
 * This is the customized model class for table "music_song".
 */
class MusicSongAPI extends MusicSong {

    const COLUMNS_API = ['id', 'thumbnail', 'image', 'song_file', 'name', 'description', 'content', 'price', 'duration', 'release_date', 'artist_singer_id', 'artist_composer_id', 'album_id', 'is_hot', 'is_top', 'is_active', 'is_video', 'lang', 'type', 'status', 'mood', 'category_id', 'count_views', 'count_likes', 'count_purchase', 'count_comments', 'count_rates', 'rates', 'album', 'artistSinger', 'artistComposer','musicArtist',  'objectCategories'];

    public function fields()
    {
        //Customize fields to be displayed in API
        $fields = $this::COLUMNS_API;
        return $fields;
    }

    public function rules()
    {
        //No Rules required for API object
        return [];
    }
}
