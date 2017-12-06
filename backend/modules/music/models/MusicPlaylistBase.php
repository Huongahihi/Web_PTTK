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

 * This is the model class for table "music_playlist".

 *



 * @property integer $id

 * @property string $thumbnail

 * @property string $image

 * @property string $name

 * @property string $description

 * @property string $release_date

 * @property integer $songs_count

 * @property string $songs_duration

 * @property integer $is_active

 * @property integer $is_top

 * @property integer $is_new

 * @property integer $is_hot

 * @property integer $is_album

 * @property integer $is_video

 * @property string $lang

 * @property string $type

 * @property string $category_id

 * @property string $count_views

 * @property string $count_likes

 * @property string $count_purchase

 * @property string $count_rates

 * @property integer $rates

 * @property string $created_date

 * @property string $created_user

 * @property string $modified_date

 * @property string $modified_user

 * @property string $application_id

 */

class MusicPlaylistBase extends BaseModel //\yii\db\ActiveRecord

{
    const TYPE_USER = 0;

    const TYPE_EDITOR = 1;

    const TYPE_ALBUM = 2;

    const TYPE_SHOW = 3;

    const TYPE_BY_ARTIST = 4;



    /**

    * @inheritdoc

    */

    public $tableName = 'music_playlist';



    public static function tableName()

    {

        return 'music_playlist';

    }



    /**

     * @return \yii\db\Connection the database connection used by this AR class.

     */

    public static function getDb()

    {

        return FHtml::currentDb();

    }



    /**

    * @inheritdoc

    */

    public function attributeLabels()

    {

        return [

                    'id' => 'ID',

                    'thumbnail' => 'Thumbnail',

                    'image' => 'Image',

                    'name' => 'Name',

                    'description' => 'Description',

                    'release_date' => 'Release Date',

                    'songs_count' => 'Songs Count',

                    'songs_duration' => 'Songs Duration',

                    'is_active' => 'Is Active',

                    'is_top' => 'Is Top',

                    'is_new' => 'Is New',

                    'is_hot' => 'Is Hot',

                    'is_album' => 'Is Album',

                    'is_video' => 'Is Video',

                    'lang' => 'Lang',

                    'type' => 'Type',

                    'category_id' => 'Category ID',

                    'count_views' => 'Count Views',

                    'count_likes' => 'Count Likes',

                    'count_purchase' => 'Count Purchase',

                    'count_rates' => 'Count Rates',

                    'rates' => 'Rates',

                    'created_date' => 'Created Date',

                    'created_user' => 'Created User',

                    'modified_date' => 'Modified Date',

                    'modified_user' => 'Modified User',

                    'application_id' => 'Application ID',

                ];

    }



    public static function tableSchema()

    {

        return FHtml::getTableSchema(self::tableName());

    }



    public static function Columns()

    {

        return self::tableSchema()->columns;

    }



    public static function ColumnsArray()

    {

        return ArrayHelper::getColumn(self::tableSchema()->columns, 'name');

    }



    public function init()

    {

        parent::init();

        $this->registerTranslations();

    }



    public function registerTranslations()

    {

        $i18n = Yii::$app->i18n;

        $i18n->translations['MusicPlaylist*'] = [

            'class' => 'yii\i18n\PhpMessageSource',

            'basePath' => '@backend/modules/music/messages',

            'fileMap' => [

                'MusicPlaylist' => 'MusicPlaylist.php',

            ],

        ];

    }







}

