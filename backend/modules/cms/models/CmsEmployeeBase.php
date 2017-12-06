<?php

namespace backend\modules\cms\models;

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
 * This is the model class for table "cms_employee".
 *

 * @property integer $id
 * @property string $image
 * @property string $name
 * @property string $position
 * @property string $overview
 * @property string $content
 * @property string $link_url
 * @property string $facebook
 * @property string $twitter
 * @property string $google
 * @property string $linkedin
 * @property string $email
 * @property string $mobile
 * @property string $chat
 * @property integer $sort_order
 * @property integer $is_contact
 * @property integer $is_top
 * @property integer $is_active
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class CmsEmployeeBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_employee';

    public static function tableName()
    {
        return 'cms_employee';
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
                    'id' => FHtml::t('CmsEmployee', 'ID'),
                    'image' => FHtml::t('CmsEmployee', 'Image'),
                    'name' => FHtml::t('CmsEmployee', 'Name'),
                    'position' => FHtml::t('CmsEmployee', 'Position'),
                    'overview' => FHtml::t('CmsEmployee', 'Overview'),
                    'content' => FHtml::t('CmsEmployee', 'Content'),
                    'link_url' => FHtml::t('CmsEmployee', 'Link Url'),
                    'facebook' => FHtml::t('CmsEmployee', 'Facebook'),
                    'twitter' => FHtml::t('CmsEmployee', 'Twitter'),
                    'google' => FHtml::t('CmsEmployee', 'Google'),
                    'linkedin' => FHtml::t('CmsEmployee', 'Linkedin'),
                    'email' => FHtml::t('CmsEmployee', 'Email'),
                    'mobile' => FHtml::t('CmsEmployee', 'Mobile'),
                    'chat' => FHtml::t('CmsEmployee', 'Chat'),
                    'sort_order' => FHtml::t('CmsEmployee', 'Sort Order'),
                    'is_contact' => FHtml::t('CmsEmployee', 'Is Contact'),
                    'is_top' => FHtml::t('CmsEmployee', 'Is Top'),
                    'is_active' => FHtml::t('CmsEmployee', 'Is Active'),
                    'created_date' => FHtml::t('CmsEmployee', 'Created Date'),
                    'created_user' => FHtml::t('CmsEmployee', 'Created User'),
                    'modified_date' => FHtml::t('CmsEmployee', 'Modified Date'),
                    'modified_user' => FHtml::t('CmsEmployee', 'Modified User'),
                    'application_id' => FHtml::t('CmsEmployee', 'Application ID'),
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
        $i18n->translations['CmsEmployee*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsEmployee' => 'CmsEmployee.php',
            ],
        ];
    }



}
