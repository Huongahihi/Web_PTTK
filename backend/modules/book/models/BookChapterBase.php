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
 * This is the model class for table "book_chapter".
 *

 * @property integer $id
 * @property string $image
 * @property integer $book_id
 * @property integer $chapter_number
 * @property string $title
 * @property string $attachment
 * @property string $type
 * @property string $content
 * @property integer $is_active
 * @property string $created_date
 * @property string $modified_date
 */
class BookChapterBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'book_chapter';

    public static function tableName()
    {
        return 'book_chapter';
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
                    'id' => FHtml::t('BookChapter', 'ID'),
                    'image' => FHtml::t('BookChapter', 'Image'),
                    'book_id' => FHtml::t('BookChapter', 'Book ID'),
                    'chapter_number' => FHtml::t('BookChapter', 'Chapter Number'),
                    'title' => FHtml::t('BookChapter', 'Title'),
                    'attachment' => FHtml::t('BookChapter', 'Attachment'),
                    'type' => FHtml::t('BookChapter', 'Type'),
                    'content' => FHtml::t('BookChapter', 'Content'),
                    'is_active' => FHtml::t('BookChapter', 'Is Active'),
                    'created_date' => FHtml::t('BookChapter', 'Created Date'),
                    'modified_date' => FHtml::t('BookChapter', 'Modified Date'),
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
        $i18n->translations['BookChapter*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/book/messages',
            'fileMap' => [
                'BookChapter' => 'BookChapter.php',
            ],
        ];
    }



}
