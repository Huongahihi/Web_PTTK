<?php
use common\widgets\BulkButtonWidget;
use yii\helpers\Html;
use common\components\FHtml;
use common\components\Helper;
use kartik\nav\NavX;
use kartik\dropdown\DropdownX;
use yii\helpers\BaseInflector;

$moduleName = 'CmsBlogs';
$moduleTitle = 'Cms Blogs';
$moduleKey = 'cms_blogs';

$currentRole = FHtml::getCurrentRole();
$createButton = '';
if (FHtml::isInRole('', 'create', $currentRole))
{
    $createButton = FHtml::buttonCreate();
}

$deleteButton = '';
if (FHtml::isInRole('', 'delete', $currentRole))
{
    $deleteButton = FHtml::buttonDeleteBulk();
    $deleteAllButton = FHtml::buildDeleteAllMenu();

}

$bulkActionButton = '';
if (FHtml::isInRole('', 'action', $currentRole))
{
    $bulkActionButton = FHtml::buttonBulkActions([
    FHtml::buildBulkActionsMenu(FHtml::t('common', 'Set'). ' ['. FHtml::t('CmsBlogs', 'Type') . ']:', 'cms_blogs', 'cms_blogs', 'type'),
FHtml::buildBulkActionsMenu(FHtml::t('common', 'Set'). ' ['. FHtml::t('CmsBlogs', 'Status') . ']:', 'cms_blogs', 'cms_blogs', 'status'),
FHtml::buildBulkActionsMenu(FHtml::t('common', 'Set'). ' ['. FHtml::t('CmsBlogs', 'Category Id') . ']:', 'cms_blogs', 'cms_blogs', 'category_id'),
FHtml::buildBulkActionsMenu(FHtml::t('common', 'Set'). ' ['. FHtml::t('CmsBlogs', 'Is Active') . ']:', 'cms_blogs', 'cms_blogs', 'is_active'),
FHtml::buildBulkActionsMenu(FHtml::t('common', 'Set'). ' ['. FHtml::t('CmsBlogs', 'Lang') . ']:', 'cms_blogs', 'cms_blogs', 'lang'),
FHtml::buildBulkActionsMenu(FHtml::t('common', 'Set'). ' ['. FHtml::t('CmsBlogs', 'Is Top') . ']:', 'cms_blogs', 'cms_blogs', 'is_top'),
FHtml::buildBulkActionsMenu(FHtml::t('common', 'Set'). ' ['. FHtml::t('CmsBlogs', 'Is New') . ']:', 'cms_blogs', 'cms_blogs', 'is_new'),
FHtml::buildBulkActionsMenu(FHtml::t('common', 'Set'). ' ['. FHtml::t('CmsBlogs', 'Is Hot') . ']:', 'cms_blogs', 'cms_blogs', 'is_hot'),
    FHtml::buildBulkDividerMenu(), $deleteAllButton]);
}

?>

<div class='row'>
    <div class='col-md-12'>
        <div>
            <?= $createButton . $deleteButton . $bulkActionButton ?>
        </div>
        <div class='pull-right'>
            <?=  '{export}' . '{toggleData}' ?>
        </div>
    </div>
</div>