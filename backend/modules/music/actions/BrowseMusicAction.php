<?php

namespace backend\modules\music\actions;

use common\actions\BaseApiAction;
use backend\actions\BaseAction;
use backend\actions\BrowseAction;
use common\components\FHtml;
use yii\helpers\Json;

class BrowseMusicAction extends BrowseAction
{
    public function run()
    {
        if ($this->listname == 'home')
        {
            return (new HomeAction($this->uniqueId, 'home'))->run();
        }
        elseif(($this->listname == 'music_playlist'))
        {
	    return (new MusicPlaylistAction($this->uniqueId, 'music_playlist'))->run();
        }

        return parent::run();
    }
}