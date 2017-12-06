<?php
use common\widgets\BulkButtonWidget;
use yii\helpers\Html;
use common\components\FHtml;
use common\components\Helper;
use kartik\nav\NavX;
use kartik\dropdown\DropdownX;
use yii\helpers\BaseInflector;

$moduleName = 'CmsPortfolio';
$moduleTitle = 'Cms Portfolio';
$moduleKey = 'cms_portfolio';

$currentRole = FHtml::getCurrentRole();
$createButton = '';
if (FHtml::isInRole('', 'create', $currentRole))
{
    $createButton = FHtml::buttonCreate();
}

$deleteButton = '';  $deleteAllButton = '';
if (FHtml::isInRole('', 'delete', $currentRole))
{
    $deleteButton = FHtml::buttonDeleteBulk();
    $deleteAllButton = FHtml::buildDeleteAllMenu();

}

$bulkActionButton = '';
if (FHtml::isInRole('', 'action', $currentRole))
{
    $bulkActionButton = FHtml::buttonBulkActions([
    FHtml::buildBulkActionsMenu('', 'cms_portfolio', 'cms_portfolio', 'status'),
FHtml::buildBulkActionsMenu('', '@object_category', 'object_category', 'product_category_id'),
FHtml::buildBulkActionsMenu('', 'cms_portfolio', 'cms_portfolio', 'lang'),
FHtml::buildBulkActionsMenu('', 'cms_portfolio', 'cms_portfolio', 'is_active'),
FHtml::buildBulkActionsMenu('', 'cms_portfolio', 'cms_portfolio', 'is_top'),
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