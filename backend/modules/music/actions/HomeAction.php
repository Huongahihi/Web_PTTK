<?php
namespace backend\modules\music\actions;

use backend\modules\music\models\MusicArtistAPI;
use backend\modules\music\models\MusicPlaylistAPI;
use backend\modules\music\models\MusicSong;
use backend\modules\music\models\MusicSongAPI;
use common\actions\BaseApiAction;

use backend\actions\BrowseAction;

use backend\models\ObjectCategory;

use common\components\FHtml;

use yii\helpers\Json;



class HomeAction extends BaseApiAction
{
    public function run()
    {

        $limit = isset($this->limit) ? $this->limit : -1;

        $this->listname = 'home';

        $data = [];

        $top_artist = MusicArtistAPI::findAll(Fhtml::merge(['is_top' => 1], $this->paramsArray), 'count_views desc', $limit, 1, false);

        $top_artist_id = null;

        if (count($top_artist) > 1) {
            $top_artist_id = $top_artist[1]->id;
        }

        $data['music_playlist_top'] = MusicPlaylistAPI::findAll(Fhtml::merge(['is_top' => 1], $this->paramsArray), 'name asc', $limit, 1, false);

        $data['music_playlist_new'] = MusicPlaylistAPI::findAll(Fhtml::merge(['is_new' => 1], $this->paramsArray), 'release_date desc', $limit, 1, false);

        $data['music_playlist_hot'] = MusicPlayListAPI::findAll(Fhtml::merge(['is_hot' => 1], $this->paramsArray), 'count_views desc', $limit, 1, false);

        $data['music_song'] = MusicSongAPI::findAll(Fhtml::merge(['is_top' => 1], $this->paramsArray), 'count_views desc', $limit, 1, false);

        $data['music_artist_top'] = $top_artist;

        //$data['music_artist_top_song'] = empty($top_artist_id) ? null : MusicSongAPI::findAll(Fhtml::merge(['artist_singer_id,artist_composer_id' => 1], $this->paramsArray), 'count_views desc', $limit, 1, false);

        $data['music_artist'] = MusicArtistAPI::findAll(Fhtml::merge(['is_hot' => 1], $this->paramsArray), 'count_views desc', $limit, 1, false);

        // Category
        //$categoryList = ObjectCategory::findAll(['object_type' => 'music']);

        //$data['music_category'] = FHtml::prepareDataForAPI($categoryList, 'object-category');


        //if (isset($categoryList) && count($categoryList) > 0)
        //{
        //    foreach ($categoryList as $category) {

        //        $category_playlist = MusicPlaylistAPI::findAll(['category_id' => $category->id], 'id asc', $limit, 1, false);

        //        $category->objectAttributes = $category_playlist;

        //        $category->addExtraField('objectAttributes');
        //    }
        //}

        // Moods

        //$moods = FHtml::getModelsForAPI(FHtml::TABLE_OBJECT_SETTING, ['object_type' => 'music_song', 'meta_key' => 'mood'], 'sort_order asc');

        //$data['moods'] = $moods;


        $out = FHtml::getOutputForAPI($data, $this->listname, '', 'data', 1);

        return $out;
    }
}