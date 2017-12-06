<?php

namespace backend\modules\pm\models;

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
 * This is the model class for table "pm_issue".
 *

 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $content
 * @property string $type
 * @property string $status
 * @property string $priority
 * @property string $user_id
 * @property string $client_id
 * @property string $project_id
 * @property string $created_date
 * @property string $created_user
 * @property string $modified_date
 * @property string $modified_user
 * @property string $application_id
 */
class PmIssueBase extends BaseModel //\yii\db\ActiveRecord
{
    const TYPE_CRASH = 'CRASH';
    const TYPE_FEATURE = 'FEATURE';
    const TYPE_UI = 'UI';
    const TYPE_SECURITY = 'SECURITY';
    const TYPE_PERFORMANCE = 'PERFORMANCE';
    const STATUS_OPEN = 'OPEN';
    const STATUS_DOING = 'DOING';
    const STATUS_DONE = 'DONE';
    const STATUS_TEST = 'TEST';
    const STATUS_CLOSED = 'CLOSED';
    const PRIORITY_LOW = 'LOW';
    const PRIORITY_NORMAL = 'NORMAL';
    const PRIORITY_HIGH = 'HIGH';

    /**
    * @inheritdoc
    */
    public $tableName = 'pm_issue';

    public static function tableName()
    {
        return 'pm_issue';
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
    public function rules()
    {
        return [
        
            [['id', 'name', 'description', 'content', 'type', 'status', 'priority', 'user_id', 'client_id', 'project_id', 'created_date', 'created_user', 'modified_date', 'modified_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['name'], 'required'],
            [['content'], 'string'],
            [['created_date', 'modified_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 2000],
            [['type', 'status', 'priority', 'user_id', 'client_id', 'project_id', 'created_user', 'modified_user', 'application_id'], 'string', 'max' => 100],
        ];
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
                    'id' => FHtml::t('PmIssue', 'ID'),
                    'name' => FHtml::t('PmIssue', 'Name'),
                    'description' => FHtml::t('PmIssue', 'Description'),
                    'content' => FHtml::t('PmIssue', 'Content'),
                    'type' => FHtml::t('PmIssue', 'Type'),
                    'status' => FHtml::t('PmIssue', 'Status'),
                    'priority' => FHtml::t('PmIssue', 'Priority'),
                    'user_id' => FHtml::t('PmIssue', 'User ID'),
                    'client_id' => FHtml::t('PmIssue', 'Client ID'),
                    'project_id' => FHtml::t('PmIssue', 'Project ID'),
                    'created_date' => FHtml::t('PmIssue', 'Created Date'),
                    'created_user' => FHtml::t('PmIssue', 'Created User'),
                    'modified_date' => FHtml::t('PmIssue', 'Modified Date'),
                    'modified_user' => FHtml::t('PmIssue', 'Modified User'),
                    'application_id' => FHtml::t('PmIssue', 'Application ID'),
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
        $i18n->translations['PmIssue*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/pm/messages',
            'fileMap' => [
                'PmIssue' => 'PmIssue.php',
            ],
        ];
    }




}
