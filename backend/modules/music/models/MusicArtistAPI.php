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

 * This is the customized model class for table "music_artist".

 */

class MusicArtistAPI extends MusicArtist {

    const COLUMNS_API = ['id', 'music_song', 'thumbnail', 'image', 'name', 'real_name', 'description', 'content', 'birth_date', 'location', 'count_views', 'count_likes', 'count_rates', 'rates', 'is_top', 'is_new', 'is_hot', 'is_active', 'lang', 'type', 'status', 'category_id', ];

    public function fields()
    {
        $fields = $this::COLUMNS_API;
        return $fields;
    }

    public function rules()
    {
        return [];
    }
}

