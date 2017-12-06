<?php

namespace common\models;

use backend\models\ObjectCategory;
use backend\models\ObjectTranslation;
use common\components\FActiveQuery;
use common\components\FFrontend;
use common\components\FHtml;
use common\components\FModel;
use common\components\FSecurity;
use frontend\models\ViewModel;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseInflector;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

class BaseModel extends ActiveRecord
{
    const COLUMNS = [];
    const SETTINGS = [];
    const COLUMNS_ARRAY = [];
    const COLUMNS_UPLOADS = [];

    public $id_array;
    private $category_id_array;
    private $objectAttributes;
    private $objectFile;
    private $objectCategories;
    public $tableName;
    public $model_object_type;
    public $order_by;
    public $objectFile_upload;
    public $columnsMode = '';
    public $columns = [];
    public $extraFields = [];
    public $oldContent = [];
    public $changedContent = [];

    public static function getLookupArray($column)
    {
        return [];
    }

    public static function getSetting($key, $default_value = null) {
        if (defined(get_called_class() . '::SETTINGS')) {
            $settings = self::SETTINGS;

            if (is_array($settings) && key_exists($key, $settings)) {
                echo $settings[$key]; die;
            }
        }
        return $default_value;
    }

    public static function getRelatedObjects()
    {
        return [];
    }

    public static function getMetaObjects()
    {
        return [];
    }

    public function addExtraField($field)
    {
        $this->extraFields[] = $field;
    }

    public function setFields($fields)
    {
        if (is_string($fields))
            $fields = FHtml::decode($fields);
        $result = [];
        foreach ($fields as $field) {
            //if (FHtml::field_exists($this, $field))
            $result[] = $field;
        }
        $this->columnsMode = $result;

        $this->prepareUploadFields();
    }

    public function fields()
    {
        if (is_array($this->columnsMode) && !empty($this->columnsMode))
            return $this->columnsMode;

        if (FHtml::field_exists($this, 'COLUMNS_API'))
            $fields = $this::COLUMNS_API;
        else if (FHtml::field_exists($this, 'COLUMNS') && is_array($this::COLUMNS) && key_exists('api', $this::COLUMNS))
            $fields = $this::COLUMNS['api'];
//        else if (FModel::getModelAPI($this) != null)
//            $fields = FModel::getModelAPI($this)->fields(); //Hung:should not automatically get Fields from Model API because it can cause recursive issue
        else
            $fields = parent::fields();

        if (!empty($this->extraFields))
            $fields = array_merge($fields, $this->extraFields);

        if (FHtml::field_exists($this, 'OBJECTS_RELATED'))
            $fields = array_merge($fields, $this::OBJECTS_RELATED);

        self::prepareUploadFields();

        return $fields;
    }

    public function prepareUploadFields() {
        $upload_fields = FModel::getModelUploadFields($this);
        if (!empty($upload_fields)) {
            foreach ($upload_fields as $field) {
                FHtml::setFieldValue($this, $field, FHtml::getFileURL($this->{$field}, FHtml::getImageFolder($this)));
            }
        }
    }

    public function prepareCustomFields()
    {
        $this->objectAttributes = $this->getObjectAttributes();
        $this->objectFile = $this->getObjectFile();
        $this->objectCategories = $this->getObjectCategories();
    }

    public function getObjectAttributes()
    {
        if (!isset($this->objectAttributes)) {
            $this->objectAttributes = FHtml::getModels('object_attributes', ['object_type' => $this->getObjectType(), 'object_id' => self::primaryKeyValue()]);
        }
        return $this->objectAttributes;
    }

    public function setObjectAttributes($value)
    {
        $this->objectAttributes = $value;
    }

    public function getObjectAttributeValue($meta_key, $default_value = null) {
        $attributes = self::getObjectAttributes();

        if (is_array($attributes) && !empty($attributes)) {
            foreach ($attributes as $attribute) {
                if ($attribute->meta_key == $meta_key)
                    return $attribute->meta_value;
            }
        }
        return $default_value;
    }

    public function setObjectAttributeValue($meta_key, $meta_value) {
        return FModel::setModelCustomAttribute($this->getTableName(), $this->getPrimaryKey(), $meta_key, $meta_value);
    }

    public function setCustomFieldValue($meta_key, $meta_value) {
        return $this->setObjectAttributeValue($meta_key, $meta_value);
    }

    public function getObjectType()
    {
        if (!empty($this->model_object_type))
            return $this->model_object_type;
        else
            return self::getTableName();
    }

    /**
     * Declares the name of the database table associated with this AR class.
     * By default this method returns the class name as the table name by calling [[Inflector::camel2id()]]
     * with prefix [[Connection::tablePrefix]]. For example if [[Connection::tablePrefix]] is 'tbl_',
     * 'Customer' becomes 'tbl_customer', and 'OrderItem' becomes 'tbl_order_item'. You may override this method
     * if the table is not named after this convention.
     * @return string the table name
     */
    public static function tableName()
    {
        return Inflector::camel2id(StringHelper::basename(get_called_class()), '_');
    }

    public function getTableName()
    {
        if (!empty($this->tableName))
            return $this->tableName;
        else {
            $this->tableName = self::tableName();
            return $this->tableName;
        }
    }

    public function primaryKeyValue()
    {
        return FHtml::getFieldValue($this, self::primaryKey());
    }

    public function getObjectFile()
    {
        if (empty($this->objectFile)) {
            $this->objectFile = FHtml::getModels('object_file', ['object_type' => $this->getTableName(), 'object_id' => self::primaryKeyValue()]);
        }
        return $this->objectFile;
    }

    public function getRelatedModels($object_type, $relation_type = FHtml::RELATION_FOREIGN_KEY)
    {
        return FHtml::getRelatedModels($this->getTableName(), self::primaryKeyValue(), $object_type, $relation_type);
    }

    public function getColumns()
    {
        if (empty($this->columns)) {
            $this->columns = FHtml::getObjectColumns($this->getTableName());
        }
        return $this->columns;
    }

    public function getColumn($columnName)
    {
        $columns = $this->getColumns();
        if (!isset($columns) || empty($columns))
            return null;

        foreach ($columns as $column) {
            if (strtolower($column->name) == strtolower($columnName))
                return $column;
        }
        return null;
    }

    public function setObjectFile($value)
    {
        $this->objectFile = $value;
    }

    public function getObjectCategories()
    {
        return $this->getCategories();
    }

    public function toBaseModel()
    {
        return self::toViewModel();
    }

    public function toViewModel()
    {
        $model = new ViewModel();
        $model->name = FHtml::getFieldValue($this, ['name', 'title']);
        $model->overview = FHtml::getFieldValue($this, ['overview', 'description']);
        $model->content = FHtml::getFieldValue($this, ['content', 'text', 'comment']);
        $model->thumbnail = FHtml::getFieldValue($this, ['thumbnail', 'image', 'icon', 'avatar']);
        $model->image = FHtml::getFieldValue($this, ['image', 'file', 'thumbnail', 'icon', 'avatar']);
        $model->is_active = FHtml::getFieldValue($this, ['is_active', 'active', 'isActive', 'status']);
        $model->is_hot = FHtml::getFieldValue($this, ['is_hot', 'is_popular', 'isHot']);
        $model->is_top = FHtml::getFieldValue($this, ['is_top', 'is_featured', 'isTop']);
        $model->is_featured = FHtml::getFieldValue($this, ['is_featured', 'is_top', 'isTop']);
        $model->category_id = trim(FHtml::getFieldValue($this, ['category_id', 'categoryid']), ',');
        $model->type = FHtml::getFieldValue($this, ['type']);
        $model->status = FHtml::getFieldValue($this, ['status']);
        $model->linkurl = FHtml::getFieldValue($this, ['linkurl']);
        $model->id = FHtml::getFieldValue($this, ['id', 'product_id']);
        $model->price = FHtml::getFieldValue($this, ['price', 'cost']);
        $model->created_date = FHtml::getFieldValue($this, ['created_date', 'created_at', 'createdDate', 'date_created']);
        $model->created_user = FHtml::getFieldValue($this, ['created_user', 'created_by', 'created_userid', 'createduser']);

        $model->tablename = Inflector::id2camel(StringHelper::basename(self::className()));
        return $model;
    }

    public function getCategory()
    {
        $arr = self::getCategories();
        if (count($arr) > 0)
            return $arr[0];
        return new ObjectCategory();
    }

    public function getCategories()
    {
        if (!isset($this->objectCategories)) {
            $category_id = FHtml::getFieldValue($this, ['category_id', 'categoryid']);
            if (!empty($category_id))
                $this->objectCategories = FHtml::getCategories($category_id);
            else
                $this->objectCategories = FHtml::getRelatedModels(self::getTableName(), $category_id, FHtml::TABLE_CATEGORIES);
        }
        return $this->objectCategories;
    }

    public function getGalleries()
    {
        return FHtml::getGalleries(self::tableName(), $this->id);
    }

    public function getCategory_id_array()
    {
        if (isset($this['category_id']) && empty($this->category_id_array))
            $this->category_id_array =  explode(',', trim($this['category_id'], ','));

        return $this->category_id_array;
    }

    public function setCategory_id_array($value)
    {
        $this->category_id_array = $value;
    }

    public function setSortOrder($value)
    {
        if (FHtml::field_exists($this, 'sort_order'))
            FHtml::setFieldValue($this, 'sort_order', $value);
    }

    public function getOrderBy()
    {
        if (!empty($this->order_by))
            return $this->order_by;

        return FHtml::getOrderBy($this);
    }

    public function beforeSave($insert)
    {
        FHtml::saveUploadedFiles($this);

        if ($insert)
            FHtml::prepareDefaultValues($this, ['category_id_array', 'is_active', 'category_id', 'created_user', 'created_date', 'application_id'], FHtml::ACTION_ADD);
        else
            FHtml::prepareDefaultValues($this, ['category_id_array', 'category_id', 'modified_user', 'modified_date'], FHtml::ACTION_SAVE);

        // if field is array type
        $fields = $this::COLUMNS_ARRAY;
        foreach ($fields as $field) {
            $field_value = $this->getFieldValue($field);
            if (!empty($field_value) && is_array($field_value) && $field != 'category_id')
                $this[$field] = FHtml::encode($field_value);
        }

        $result = parent::beforeSave($insert); // TODO: Change the autogenerated stub

        if ($result) {
            $lang = FHtml::currentLang();
            // Save languages data
            if (!$insert && $lang != DEFAULT_LANG && FHtml::isLanguagesEnabled($this->tableName)) {
                $translated = ObjectTranslation::findOne(['lang' => $lang, 'object_id' => $this->id, 'object_type' => $this->tableName, 'application_id' => FHtml::currentApplicationCode()]);
                if (!isset($translated))
                    $translated = new ObjectTranslation();
                $translated->object_type = $this->tableName;
                $translated->object_id = $this->id;
                $translated->application_id = FHtml::currentApplicationCode();
                $translated->lang = $lang;
                $translated->content = FHtml::encode($this->getAttributes());
                $translated->save();
                if (FHtml::isAjaxRequest()) {
                    die; // important, do not delete.
                }
                else {
                    $this->afterSave($insert, []);
                    return false; // already save translated data into Object_Translation table, no need to save in real table -> return false;
                }
            }

            // If Enabled Object Changes Log - Prepare Change data
            if (FHtml::isObjectActionsLogEnabled($this->tableName)) {
                foreach ($this->oldAttributes as $key => $value) {
                    $this->oldContent = array_merge($this->oldContent, [$key => $value]);
                }
            }

        } else {

        }

        FHtml::executeApplicationFunction($this->tableName . '_' . 'beforeSave', ['model' => $this, 'insert' => $insert]);
        return $result;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub

        FHtml::saveObjectItems($this, $this->getTableName(),$this->primaryKeyValue(), $this::getRelatedObjects());

        //Show success/ error message
        if (!empty($this->getErrors()))
            FHtml::addError($this->getErrors());
        else {
            //Show success/ error message
            $object = FHtml::t('common', BaseInflector::camel2words(self::getTableName()));
            $object_title = FHtml::getFieldValue($this, ['name', 'title']);
            $object_id = FHtml::getFieldValue($this, ['id']);

            if (FHtml::isObjectActionsLogEnabled($this->tableName)) {
                // If Enabled Object Changes Log - Log data changed into Object_actions table
                FHtml::logObjectActions($this, $insert ? FHtml::ACTION_CREATE : FHtml::ACTION_EDIT, $this->oldContent, $this->attributes);

                $message = FHtml::t('common', 'Saved successfully');
                FHtml::addMessage("$message. $object #$object_id - $object_title");
            }

            FHtml::refreshCache();
        }

        FHtml::executeApplicationFunction($this->tableName . '_' . 'afterSave', ['model' => $this, 'insert' => $insert, 'changedAttributes' => $changedAttributes]);
    }

    public function afterValidate()
    {
        parent::afterValidate(); // TODO: Change the autogenerated stub
    }

    public function afterFind()
    {
        $fields = $this::COLUMNS_ARRAY;
        foreach ($fields as $field) {
            $field_value = $this->getFieldValue($field);
            if (!empty($field_value) && FHtml::is_json($field_value) && $field != 'category_id')
                $this[$field] = FHtml::decode($field_value);
        }
        return parent::afterFind(); // TODO: Change the autogenerated stub
    }

    public function beforeDelete()
    {
        if (!FHtml::isRoleAdmin() && FHtml::field_exists($this, 'is_active'))
        {
            $this->disable();
            return false;
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public
    function afterDelete()
    {
        // If Enabled Object Changes Log - Log data changed into Object_actions table
        if (FHtml::isObjectActionsLogEnabled($this->tableName)) {
            FHtml::logObjectActions($this, FHtml::ACTION_DELETE, $this->attributes, [], 'Deleted successful !');
        }

        parent::afterDelete(); // TODO: Change the autogenerated stub
        FHtml::refreshCache();

        FHtml::executeApplicationFunction($this->tableName . '_' . 'afterDelete', ['model' => $this]);
    }

    /**
     * @inheritdoc
     * @return ActiveQuery the newly created [[ActiveQuery]] instance.
     */
    public
    static function find()
    {

        $model = FHtml::createModel(self::tableName());
        if (isset($model) && self::className() != $model::className())
            $result = $model;
        else
            $result = get_called_class();

        $query = \Yii::createObject(FActiveQuery::className(), [$result]); //using FActiveQuery

        if (FHtml::isApplicationsEnabled(static::tableName())) {
            $query = $query->andWhere(['application_id' => FHtml::currentApplicationCode()]);
        }

        if (!FHtml::isRoleAdmin() && FHtml::field_exists($model, 'is_active')) {
            $query = $query->andWhere(['is_active' => 1]);
        }

        return $query;
    }

//2017/6/23
    public
    static function findOne($condition, $applications_enabled = true)
    {
        $model = FHtml::createModel(self::tableName());

        if ($applications_enabled && FHtml::isApplicationsEnabled() && FHtml::field_exists(self::tableName(), 'application_id')) {
            $check_by_application_id = FHtml::isInArray(self::tableName(), FHtml::EXCLUDED_TABLES_AS_APPLICATIONS);
            $application_id = FHtml::currentApplicationCode(); // $check_by_application_id ? FHtml::currentApplicationId() : FHtml::currentApplicationCode();
            $application_id_none = FHtml::APPLICATION_NONE;

            if (is_array($condition)) {
                if ($check_by_application_id)
                    $condition = array_merge($condition, ['application_id' => [$application_id, $application_id_none]]);
                else
                    $condition = array_merge($condition, ['application_id' => $application_id]);

                if (!FHtml::isRoleAdmin() && FHtml::field_exists($model, 'is_active')) {
                    $condition = array_merge($condition, ['is_active' => 1]);
                }

            } else if (is_string($condition) && !is_numeric($condition)) {
                if ($check_by_application_id)
                    $condition = $condition . " and (application_id = '$application_id' or application_id = '$application_id_none')";
                else
                    $condition = $condition . " and (application_id = '$application_id')";

                if (!FHtml::isRoleAdmin() && FHtml::field_exists($model, 'is_active')) {
                    $condition = $condition . " and (is_active = 1)";
                }
            }
        }

        if (isset($model) && self::className() != $model::className()) {
            if ($applications_enabled) {

                $result = $model::findOne($condition, $applications_enabled);
            }
            else {
                $result = $model::findOne($condition, $applications_enabled);
            }
        } else {
            $result = parent::findOne($condition, $applications_enabled);
            //echo self::tableName(); var_dump($result); var_dump($condition); echo $applications_enabled; die;
        }

        if (isset($result)) {
            if (StringHelper::endsWith(self::className(), 'API'))
                $result->prepareUploadFields();
            return $result;
        }

        return null;
    }

    public
    static function getOne($condition, $applications_enabled = true)
    {
        if (is_numeric($condition)) {
            $model = self::findOne($condition, $applications_enabled);
            if (isset($model))
                return $model;
        }

        $items = self::findAll($condition);

        if (count($items) > 0) {
            return $items[0];
        } else
            return null;
    }

    public static function getModelFieldValue($condition, $field_name, $default_value = null, $applications_enabled = true) {
        $model = self::getOne($condition, $applications_enabled);
        return isset($model) ? FModel::getFieldValue($model, $field_name, $default_value) : $default_value;
    }

    public static function findOneAndGetFieldValue($condition, $field_name, $default_value = null, $applications_enabled = true) {
        return self::getModelFieldValue($condition, $field_name, $default_value, $applications_enabled);
    }

    public
    static function findAll($condition = [], $order_by = [], $page_size = -1, $page = 1, $isCached = false, $display_fields = [], $load_activeonly = true)
    {
        if (is_numeric($condition) && !empty($condition)) { //findOne
            return self::findOne($condition);
        }

        return FHtml::getModels(self::tableName(), $condition, $order_by, $page_size, $page, $isCached, $load_activeonly, self::getAPIFields($display_fields));
    }

    public
    static function findLimit($limit = -1, $condition = [], $order_by = [], $page = 1, $isCached = false, $display_fields = [], $load_activeonly = true)
    {
        return FHtml::getModels(self::tableName(), $condition, $order_by, $limit, $page, $isCached, $load_activeonly, self::getAPIFields($display_fields));
    }

    public
    static function findHot($limit = -1, $condition = [], $order_by = [], $page = 1, $isCached = false, $display_fields = [], $load_activeonly = true)
    {
        if (is_array($condition) && !key_exists('is_hot', $condition) && FHtml::field_exists(static::tableName(), 'is_hot'))
            $condition = array_merge($condition, ['is_hot' => 1]);

        return FHtml::getModels(self::tableName(), $condition, $order_by, $limit, $page, $isCached, $load_activeonly, self::getAPIFields($display_fields));
    }

    public
    static function findTop($limit = -1, $condition = [], $order_by = [], $page = 1, $isCached = false, $display_fields = [], $load_activeonly = true)
    {
        if (is_array($condition) && !key_exists('is_top', $condition) && FHtml::field_exists(static::tableName(), 'is_top'))
            $condition = array_merge($condition, ['is_top' => 1]);
        return FHtml::getModels(self::tableName(), $condition, $order_by, $limit, $page, $isCached, $load_activeonly, self::getAPIFields($display_fields));
    }

    public static function getAPIFields($display_fields = []) {
        if (StringHelper::endsWith(self::className(), 'API') && empty($display_fields))
        {
            $model = \Yii::createObject(self::className());
            $display_fields = $model->fields();
        }

        return $display_fields;
    }

    public
    static function getDataProvider($condition = [], $order_by = [], $page_size = -1, $page = 1, $isCached = false, $display_fields = [], $load_activeonly = true)
    {
        $display_fields = self::getAPIFields($display_fields);
        $list = FHtml::getPageModelsList(self::tableName(), $condition, $order_by, $page_size, $page, $isCached, $display_fields);

        return $list;
    }

    public
    static function findAllForAPI($condition = [], $order_by = [], $page_size = -1, $page = 1, $isCached = false, $folder = '', $display_fields = [], $load_activeonly = true)
    {
        return FHtml::getModelsForAPI(self::tableName(), $condition, $order_by, $page_size, $page, $isCached, $folder, $display_fields);
    }

    public
    static function findViewModelsForAPI($condition = [], $order_by = [], $page_size = -1, $page = 1, $isCached = false, $folder = '', $display_fields = [], $load_activeonly = true)
    {
        return FHtml::getViewModelsForAPI(self::tableName(), $condition, $order_by, $page_size, $page, $isCached, $folder, $display_fields);
    }

    public
    static function findViewModels($condition = [], $order_by = [], $page_size = -1, $page = 1, $isCached = false, $display_fields = [], $load_activeonly = true)
    {
        return FHtml::getViewModels(self::tableName(), $condition, $order_by, $page_size, $page, $isCached, $display_fields);
    }

    public
    static function findByCategory($categories = 0, $order_by = [], $page_size = -1, $page = 1, $field = 'category_id')
    {
        $list = [];
        if (is_string($categories)) {
            if (strpos($categories, ',') !== false)
                $list = explode(',', $categories);
            else
                $list[] = $categories;
        } else if (is_array($categories))
            $list = $categories;
        $result = [];
        if (!empty($list)) {
            foreach ($list as $listItem) {
                $result = array_merge($result, self::findAll([$field => $listItem], $order_by, $page_size, $page));
            }
        }
        return $result;
    }

    public
    function inActive()
    {
        FHtml::setFieldValue($this, ['is_active', 'isactive'], 0);
        FHtml::setFieldValue($this, ['is_deleted', 'deleted'], 1);

        $this->save();
    }

    public
    function disable()
    {
        self::inActive();
    }

    public
    function active()
    {
        FHtml::setFieldValue($this, ['is_active', 'isactive'], 1);
        FHtml::setFieldValue($this, ['is_deleted', 'deleted'], 0);

        $this->save();
    }

    public
    function enable()
    {
        self::active();
    }

    public
    function softDelete()
    {
        self::disable();
    }

    public
    function restoreDelete()
    {
        self::enable();
    }

    public
    function load($data, $formName = null)
    {
        $result = parent::load($data, $formName);
        FHtml::loadParams($this, $data);
        return $result;
    }

    public
    static function create($data = [])
    {
        $model = FHtml::createModel(self::tableName());
        FHtml::loadParams($model, $data);
        return $model;
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public
    static function getDb()
    {
        $db = self::getSetting('database', '');

        return FHtml::currentDb($db);
    }

    public
    static function deleteAll($condition = '', $params = [])
    {
        $model = FHtml::createModel(self::tableName());
        if (FHtml::field_exists($model, 'application_id')) {
            $application_id = FHtml::currentApplicationCode();
            if (is_string($condition))
                $condition .= (!empty($condition) ? ' AND ' : '') . "application_id = '$application_id'";
            else
                $condition = array_merge($condition, ['application_id' => $application_id]);
        }
        return parent::deleteAll($condition, $params); // TODO: Change the autogenerated stub
    }

    public
    static function createNew($values = [])
    {
        $model = FHtml::createModel(self::tableName());
        foreach ($values as $field => $value) {
            FHtml::setFieldValue($model, $field, $value);
        }
        FHtml::setFieldValue($model, 'application_id', FHtml::currentApplicationCode());
        if ($model->save())
            return $model;
        else
            return $model->errors;
    }

    public
    static function createOrUpdate($condition, $values = [], $overrideIfExisted = true)
    {
        $model = self::findOne($condition);
        if (!isset($model)) {
            $model = FHtml::createModel(self::tableName());
            $overrideIfExisted = true;
        }
        if ($overrideIfExisted) {
            if (is_array($condition)) {
                foreach ($condition as $field => $value) {
                    FHtml::setFieldValue($model, $field, $value);
                }
            }
            foreach ($values as $field => $value) {
                FHtml::setFieldValue($model, $field, $value);
            }
            FHtml::setFieldValue($model, 'is_active', 1);
            FHtml::setFieldValue($model, 'application_id', FHtml::currentApplicationCode());

            if ($model->save())
                return $model;
            else
                return $model->errors;
        }
        return false;
    }

    public function getTranslatedModel()
    {
        return $this->hasOne(ObjectTranslation::className(), ['object_id' => 'id'])
            ->andOnCondition(['AND',
                ['object_type' => $this->tableName],
                ['lang' => FHtml::currentLang()]
            ]);
    }

    public static function getModelCategories($object_type = '') {
        $module = FHtml::getModelModule(self::tableName());

        if (empty($object_type))
            $params = [self::tableName(), $module];
        else
            $params = $object_type;

        return ObjectCategory::findAll(['is_active' => 1, 'object_type' => $params]);
    }

    public function getFieldValue($fieldname)
    {
        return FHtml::getFieldValue($this, $fieldname);
    }

    public function createListUrl($controller = '', $params = []) {
        return FFrontend::createListUrl($controller, $this, $params);
    }

    public function createViewUrl($controller = '', $params = []) {
        return FFrontend::createViewUrl($controller, $this, $params);
    }

    public function showImage($width = '', $height = '', $fields = [],  $css = '', $showEmptyImage = true)
    {
        if (empty($fields))
            $fields = ['image', 'avatar', 'banner'];
        return FHtml::showImage($this->getFieldValue($fields), str_replace('_', '-', $this->tableName), $width, $height, $css, strip_tags($this->getFieldValue(['tags', 'overview', 'description', 'name', 'title'])), $showEmptyImage);
    }

    public function showThumbnail($width = '', $height = '', $fields = [],  $css = '', $showEmptyImage = true)
    {
        if (empty($fields))
            $fields = ['thumbnail', 'image', 'banner'];
        return FHtml::showImage($this->getFieldValue($fields), str_replace('_', '-', $this->tableName), $width, $height, $css, strip_tags($this->getFieldValue(['tags', 'overview', 'description', 'name', 'title'])), $showEmptyImage);
    }

    public function showContent($fields = ['content'], $css = '')
    {
        if (empty($fields))
            $fields = ['content'];
        $result = FHtml::encode($this->getFieldValue($fields));
        return FHtml::showDiv($result, $css);
    }

    public function showTags($url = '', $template = '{tag}', $color = '', $fields = ['tags', 'keywords']) {
        if (empty($fields))
            $fields = ['tags', 'keywords'];
        $result = $this->getFieldValue($fields);
        return FHtml::showTags($result, $url, $template, $color);
    }

    public function showDate($fields = [], $format = '', $showTime = false) {
        if (empty($fields))
            $fields = ['created_date'];
        $result = $this->getFieldValue($fields);

        return FHtml::showDate($result, $format, $showTime);
    }

    public function showPrice($color = '', $showFriendly = true, $showPrice = true, $fields = []) {
        if (empty($fields))
            $fields = ['price', 'cost'];
        $result = $this->getFieldValue($fields);

        return FHtml::showModelPrice($this, $color, $showFriendly, $showPrice);
    }
}
