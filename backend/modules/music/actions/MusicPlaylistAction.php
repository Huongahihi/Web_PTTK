<?php


namespace backend\modules\music\actions;


use backend\modules\music\models\MusicPlaylist;
use backend\modules\music\models\MusicPlaylistAPI;
use backend\modules\music\models\MusicSong;
use common\actions\BaseApiAction;

use backend\actions\BrowseAction;

use common\components\FHtml;

use yii\helpers\Json;


class MusicPlaylistAction extends BaseApiAction
{
    public function run()
    {
        $this->listname = 'music_playlist';
        $params = json_decode(FHtml::getRequestParam('params',''));
        $category_id = $params->category_id;

        if (!empty($this->objectid)) {

            $object = MusicPlaylistAPI::findOne($this->objectid);

            $out = FHtml::getOutputForAPI($object, $this->objectname, '', 'data', 1);

            $out['code'] = $this->objectid;

            return $out;

        }
        elseif(!empty($category_id) && is_numeric($category_id) && ($this->listname == 'music_playlist')) {
            $list = MusicPlaylistAPI::getDataProvider(
                        FHtml::merge(
                            [
                                'category_id' => '%'.$category_id
                            ], $this->paramsArray
                        ),
                    $this->orderby,
                    $this->limit,
                    $this->page,
                    false
                    );
            $models = FHtml::prepareDataForAPI($list->getModels());

            $out = FHtml::getOutputForAPI($models, $this->listname, '', 'data', $list->pagination->pageCount);

            $out['code'] = $this->params;

            return $out;
        }
        else {
            $list = MusicPlaylistAPI::getDataProvider(Fhtml::mergeRequestParams(['name' => '%' . $this->keyword], $this->paramsArray), $this->orderby, $this->limit, $this->page, false);

            $out = FHtml::getOutputForAPI($list->getModels(), $this->listname, '', 'data', $list->pagination->pageCount);

            $out['code'] = $this->params;

            return $out;

        }

    }

}





