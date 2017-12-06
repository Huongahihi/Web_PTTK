<?php

namespace backend\modules\music\actions;

use backend\modules\music\models\MusicArtist;
use backend\modules\music\models\MusicArtistAPI;
use common\actions\BaseApiAction;
use backend\actions\BrowseAction;
use common\components\FApi;
use common\components\FHtml;
use yii\helpers\Json;

/**
* Developed by Hung Ho (Steve): hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "backend\models\MusicArtist".
*/
class MusicArtistAction extends BaseApiAction
{
    public function run()
    {
        if (!empty($this->objectid)) {

            $object = MusicArtistAPI::findOne($this->objectid);

            $out = FHtml::getOutputForAPI($object, $this->objectname, '', 'data', 1);
            $out['code'] = $this->objectid;
            return $out;
        } else {

            $list = MusicArtistAPI::getDataProvider(Fhtml::mergeRequestParams(['name' => '%'.$this->keyword], $this->paramsArray), $this->orderby, $this->limit, $this->page, false);
            $out = FHtml::getOutputForAPI($list->getModels(), $this->listname, '', 'data', $list->pagination->pageCount);
            $out['code'] = $this->params;
            return $out;
        }
    }
}


