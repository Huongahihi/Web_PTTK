<?php

namespace backend\modules\book\models;

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
 * This is the model class for table "book".
 *

 * @property integer $id
 * @property string $image
 * @property string $title
 * @property string $author
 * @property string $publisher
 * @property string $description
 * @property string $attachment
 * @property string $type
 * @property integer $category_id
 * @property integer $view_count
 * @property integer $like_count
 * @property integer $is_feature
 * @property integer $is_active
 * @property string $created_date
 * @property string $modified_date
 */
class BookBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'book';

    public static function tableName()
    {
        return 'book';
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
                    'id' => FHtml::t('Book', 'ID'),
                    'image' => FHtml::t('Book', 'Image'),
                    'title' => FHtml::t('Book', 'Title'),
                    'author' => FHtml::t('Book', 'Author'),
                    'publisher' => FHtml::t('Book', 'Publisher'),
                    'description' => FHtml::t('Book', 'Description'),
                    'attachment' => FHtml::t('Book', 'Attachment'),
                    'type' => FHtml::t('Book', 'Type'),
                    'category_id' => FHtml::t('Book', 'Category ID'),
                    'view_count' => FHtml::t('Book', 'View Count'),
                    'like_count' => FHtml::t('Book', 'Like Count'),
                    'is_feature' => FHtml::t('Book', 'Is Feature'),
                    'is_active' => FHtml::t('Book', 'Is Active'),
                    'created_date' => FHtml::t('Book', 'Created Date'),
                    'modified_date' => FHtml::t('Book', 'Modified Date'),
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
        $i18n->translations['Book*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/book/messages',
            'fileMap' => [
                'Book' => 'Book.php',
            ],
        ];
    }



}
