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
 * This is the customized model class for table "pm_issue".
 */
class PmIssue extends PmIssueBase //\yii\db\ActiveRecord
{
    const LOOKUP = [        'type' => [
		['id' => PmIssue::TYPE_CRASH, 'name' => 'CRASH'],
 	['id' => PmIssue::TYPE_FEATURE, 'name' => 'FEATURE'],
 	['id' => PmIssue::TYPE_UI, 'name' => 'UI'],
 	['id' => PmIssue::TYPE_SECURITY, 'name' => 'SECURITY'],
 	['id' => PmIssue::TYPE_PERFORMANCE, 'name' => 'PERFORMANCE'],
 ],
        'status' => [
		['id' => PmIssue::STATUS_OPEN, 'name' => 'OPEN'],
 	['id' => PmIssue::STATUS_DOING, 'name' => 'DOING'],
 	['id' => PmIssue::STATUS_DONE, 'name' => 'DONE'],
 	['id' => PmIssue::STATUS_TEST, 'name' => 'TEST'],
 	['id' => PmIssue::STATUS_CLOSED, 'name' => 'CLOSED'],
 ],
        'priority' => [
		['id' => PmIssue::PRIORITY_LOW, 'name' => 'LOW'],
 	['id' => PmIssue::PRIORITY_NORMAL, 'name' => 'NORMAL'],
 	['id' => PmIssue::PRIORITY_HIGH, 'name' => 'HIGH'],
 ],
];

    const COLUMNS_UPLOAD = [];

    public $order_by = 'created_date desc,';

    const OBJECTS_RELATED = [];
    const OBJECTS_META = [];

    public static function getLookupArray($column) {
        if (key_exists($column, self::LOOKUP))
            return self::LOOKUP[$column];
        return [];
    }

    public function fields()
    {
        $fields = array_merge(parent::fields(), self::OBJECTS_RELATED);

        foreach (self::COLUMNS_UPLOAD as $field) {
            $this->{$field} = FHtml::getFileURL($this->{$field}, $this->getTableName());
        }
        return $fields;
    }



    // Lookup Object: project\n
    public $project;
    public function getProject() {
        if (!isset($this->project))
        $this->project = FHtml::getModel('pm_project', '', $this->project_id, '', false);

        return $this->project;
    }
    public function setProject($value) {
        $this->project = $value;
    }


    public function prepareCustomFields() {
        parent::prepareCustomFields();

        $this->project = self::getProject();
    }


    public static function getRelatedObjects() {
        return self::OBJECTS_RELATED;
    }

    public static function getMetaObjects() {
        return self::OBJECTS_META;
    }
}
