<?php



namespace backend\modules\music\actions;



use backend\modules\music\models\MusicSong;
use backend\modules\music\models\MusicSongAPI;
use common\actions\BaseApiAction;

use backend\actions\BrowseAction;

use common\components\FHtml;

use common\components\FModel;
use yii\helpers\Json;



class MusicSongAction extends BaseApiAction
{
    public function run()
    {
        if (!empty($this->objectid)) {

            $object = MusicSongAPI::findOne($this->objectid);

            $out = FHtml::getOutputForAPI($object, $this->objectname, '', 'data', 1);

            $out['code'] = $this->objectid;

            return $out;

        } else {

            $list = MusicSongAPI::getDataProvider(Fhtml::mergeRequestParams(['name' => '%'.$this->keyword], $this->paramsArray), $this->orderby, $this->limit, $this->page, false);

            $out = FHtml::getOutputForAPI($list->getModels(), $this->listname, '', 'data', $list->pagination->pageCount);

            $out['code'] = $this->params;

            return $out;
        }
    }
}





