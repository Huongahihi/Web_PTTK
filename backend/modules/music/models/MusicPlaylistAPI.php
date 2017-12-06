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

 * This is the customized model class for table "music_playlist".

 */

class MusicPlaylistAPI extends MusicPlaylist {

    const COLUMNS_API = ['id', 'thumbnail', 'image', 'name', 'description', 'release_date', 'songs_duration', 'is_active', 'is_top', 'is_new', 'is_hot', 'is_album', 'is_video', 'lang', 'type', 'category_id', 'count_views', 'count_likes', 'count_purchase', 'count_rates', 'rates', 'music_song','objectCategories' ];

    public function fields()
    {
        $fields = $this::COLUMNS_API;
        $fields = array_merge($fields, ['songs_count']);
        return $fields;
    }

    public function rules()
    {
        return [];

    }
}

