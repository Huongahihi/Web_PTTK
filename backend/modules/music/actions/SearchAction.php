<?php

namespace backend\modules\music\actions;



use common\actions\BaseApiAction;

use backend\actions\BrowseAction;

use common\components\FHtml;

use yii\helpers\Json;



class SearchAction extends BaseApiAction

{
    public function run()

    {

        $limit = isset($this->limit) ? $this->limit : 10;



        $this->listname = 'search';

        $data = [];



        $data['music_albumn'] = FHtml::getModelsForAPI('music_playlist', Fhtml::merge(['is_album' => 1,'name' => '%'.$this->keyword], $this->paramsArray), 'name asc', $limit, 1, false);

        $data['music_playlist'] = FHtml::getModelsForAPI('music_playlist', Fhtml::merge(['name' => '%'.$this->keyword], $this->paramsArray), 'release_date desc', $limit, 1, false);

        $data['music_song'] = FHtml::getModelsForAPI('music_song', Fhtml::merge(['name' => '%'.$this->keyword], $this->paramsArray), 'count_views desc', $limit, 1, false);

        $data['music_artist'] = FHtml::getModelsForAPI('music_artist', Fhtml::merge(['name' => '%'.$this->keyword], $this->paramsArray), 'count_views desc', $limit, 1, false);

        $out = FHtml::getOutputForAPI($data, $this->listname, '', 'data', 1);



        return $out;

    }

}