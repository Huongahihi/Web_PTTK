<?php

namespace backend\modules\music\actions;

use common\actions\BaseApiAction;
use backend\actions\BrowseAction;
use common\components\FHtml;
use yii\helpers\Json;

/**
* Developed by Hung Ho (Steve): hung.hoxuan@gmail.com | skype: hung.hoxuan | whatsapp: +84912738748
* Software Outsourcing, Mobile Apps development, Website development: Make meaningful products for start-ups and entrepreneurs
* MOZA TECH Inc: www.moza-tech.com | www.apptemplate.co | www.projectemplate.com | www.code-faster.com
* This is the customized model class for table "backend\models\MusicSong".
*/
class MusicSongDownloadAction extends BaseApiAction
{
    public function run()
    {
        $this->listname = 'music_song';
        $this->objectname = 'music_song';

        if (!empty($this->objectid)) {
            $object = FHtml::getModel($this->objectname, '', $this->objectid, null, false);

            if (isset($object)) {
                $object->count_purchase += 1;
                $object->save();
            }

            $out = FHtml::getOutputForAPI($object, $this->objectname, '', 'data', 1);
            $out['code'] = $this->objectid;
            return $out;
        }
    }
}


