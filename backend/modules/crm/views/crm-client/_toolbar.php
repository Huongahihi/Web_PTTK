<?php
use common\widgets\BulkButtonWidget;
use yii\helpers\Html;
use common\components\FHtml;
use common\components\Helper;
use kartik\nav\NavX;
use kartik\dropdown\DropdownX;
use yii\helpers\BaseInflector;

$moduleName = 'CrmClient';
$moduleTitle = 'Crm Client';
$moduleKey = 'crm_client';

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
    FHtml::buildBulkActionsMenu('', 'crm_client', 'crm_client', 'is_active'),
FHtml::buildBulkActionsMenu('', 'crm_client', 'crm_client', 'type'),
FHtml::buildBulkActionsMenu('', 'crm_client', 'crm_client', 'status'),
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