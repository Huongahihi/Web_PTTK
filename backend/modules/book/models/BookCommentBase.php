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
 * This is the model class for table "book_comment".
 *

 * @property integer $id
 * @property integer $user_id
 * @property integer $book_id
 * @property integer $chapter_id
 * @property string $name
 * @property string $content
 * @property integer $is_active
 * @property string $created_date
 * @property string $modified_date
 */
class BookCommentBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'book_comment';

    public static function tableName()
    {
        return 'book_comment';
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
                    'id' => FHtml::t('BookComment', 'ID'),
                    'user_id' => FHtml::t('BookComment', 'User ID'),
                    'book_id' => FHtml::t('BookComment', 'Book ID'),
                    'chapter_id' => FHtml::t('BookComment', 'Chapter ID'),
                    'name' => FHtml::t('BookComment', 'Name'),
                    'content' => FHtml::t('BookComment', 'Content'),
                    'is_active' => FHtml::t('BookComment', 'Is Active'),
                    'created_date' => FHtml::t('BookComment', 'Created Date'),
                    'modified_date' => FHtml::t('BookComment', 'Modified Date'),
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
        $i18n->translations['BookComment*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/book/messages',
            'fileMap' => [
                'BookComment' => 'BookComment.php',
            ],
        ];
    }



}
