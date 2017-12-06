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
 * This is the model class for table "cms_widgets".
 *

 * @property integer $id
 * @property string $name
 * @property string $page_code
 * @property string $title
 * @property string $overview
 * @property string $content
 * @property string $display_type
 * @property integer $columns_count
 * @property integer $items_count
 * @property string $width_css
 * @property string $background_css
 * @property string $color_bg
 * @property string $color
 * @property string $style
 * @property string $item_style
 * @property string $item_layout
 * @property integer $show_viewmore
 * @property integer $show_headline
 * @property string $viewmore_url
 * @property integer $is_active
 * @property integer $sort_order
 * @property string $created_date
 * @property string $created_user
 * @property string $application_id
 */
class CmsWidgetsBase extends BaseModel //\yii\db\ActiveRecord
{

    /**
    * @inheritdoc
    */
    public $tableName = 'cms_widgets';

    public static function tableName()
    {
        return 'cms_widgets';
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
        
            [['id', 'name', 'page_code', 'title', 'overview', 'content', 'display_type', 'columns_count', 'items_count', 'width_css', 'background_css', 'color_bg', 'color', 'style', 'item_style', 'item_layout', 'show_viewmore', 'show_headline', 'viewmore_url', 'is_active', 'sort_order', 'created_date', 'created_user', 'application_id'], 'filter', 'filter' => 'trim'],
                
            [['name'], 'required'],
            [['content'], 'string'],
            [['columns_count', 'items_count', 'show_viewmore', 'show_headline', 'is_active', 'sort_order'], 'integer'],
            [['created_date'], 'safe'],
            [['name', 'page_code', 'title', 'display_type', 'width_css', 'background_css', 'color_bg', 'color', 'viewmore_url'], 'string', 'max' => 255],
            [['overview', 'style', 'item_style', 'item_layout'], 'string', 'max' => 1000],
            [['created_user', 'application_id'], 'string', 'max' => 100],
        ];
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
                    'id' => FHtml::t('CmsWidgets', 'ID'),
                    'name' => FHtml::t('CmsWidgets', 'Name'),
                    'page_code' => FHtml::t('CmsWidgets', 'Page Code'),
                    'title' => FHtml::t('CmsWidgets', 'Title'),
                    'overview' => FHtml::t('CmsWidgets', 'Overview'),
                    'content' => FHtml::t('CmsWidgets', 'Content'),
                    'display_type' => FHtml::t('CmsWidgets', 'Display Type'),
                    'columns_count' => FHtml::t('CmsWidgets', 'Columns Count'),
                    'items_count' => FHtml::t('CmsWidgets', 'Items Count'),
                    'width_css' => FHtml::t('CmsWidgets', 'Width Css'),
                    'background_css' => FHtml::t('CmsWidgets', 'Background Css'),
                    'color_bg' => FHtml::t('CmsWidgets', 'Color Bg'),
                    'color' => FHtml::t('CmsWidgets', 'Color'),
                    'style' => FHtml::t('CmsWidgets', 'Style'),
                    'item_style' => FHtml::t('CmsWidgets', 'Item Style'),
                    'item_layout' => FHtml::t('CmsWidgets', 'Item Layout'),
                    'show_viewmore' => FHtml::t('CmsWidgets', 'Show Viewmore'),
                    'show_headline' => FHtml::t('CmsWidgets', 'Show Headline'),
                    'viewmore_url' => FHtml::t('CmsWidgets', 'Viewmore Url'),
                    'is_active' => FHtml::t('CmsWidgets', 'Is Active'),
                    'sort_order' => FHtml::t('CmsWidgets', 'Sort Order'),
                    'created_date' => FHtml::t('CmsWidgets', 'Created Date'),
                    'created_user' => FHtml::t('CmsWidgets', 'Created User'),
                    'application_id' => FHtml::t('CmsWidgets', 'Application ID'),
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
        $i18n->translations['CmsWidgets*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@backend/modules/cms/messages',
            'fileMap' => [
                'CmsWidgets' => 'CmsWidgets.php',
            ],
        ];
    }




}
