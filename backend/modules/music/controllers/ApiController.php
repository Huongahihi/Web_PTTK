<?php

namespace backend\modules\music\controllers;

// use ApiController;

/**
 * Default controller for the `api` module
 */
class ApiController extends \backend\controllers\ApiController
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function actions()
    {
        return [
            'index' => ['class' => 'backend\modules\music\actions\HomeAction', 'checkAccess' => [$this, 'checkAccess']],
            'home' => ['class' => 'backend\modules\music\actions\HomeAction', 'checkAccess' => [$this, 'checkAccess']],
            'song' => ['class' => 'backend\modules\music\actions\MusicSongAction', 'checkAccess' => [$this, 'checkAccess']],
            'playlist' => ['class' => 'backend\modules\music\actions\MusicPlaylistAction', 'checkAccess' => [$this, 'checkAccess']],
            'artist' => ['class' => 'backend\modules\music\actions\MusicArtistAction', 'checkAccess' => [$this, 'checkAccess']],
            'song-download' => ['class' => 'backend\modules\music\actions\MusicSongDownloadAction', 'checkAccess' => [$this, 'checkAccess']],
            'search' => ['class' => 'backend\modules\music\actions\SearchAction', 'checkAccess' => [$this, 'checkAccess']],
            'feedback' => ['class' => 'backend\modules\music\actions\FeedbackAction', 'checkAccess' => [$this, 'checkAccess']],
            'browse' => ['class' => 'backend\modules\music\actions\BrowseMusicAction', 'checkAccess' => [$this, 'checkAccess']],
        ];
    }

}
