<?php
use common\widgets\BulkButtonWidget;
use yii\helpers\Html;
use common\components\FHtml;
use common\components\Helper;
use kartik\nav\NavX;
use kartik\dropdown\DropdownX;
use yii\helpers\BaseInflector;

$moduleName = 'TravelSites';
$moduleTitle = 'Travel Sites';
$moduleKey = 'travel_sites';

$currentRole = FHtml::getCurrentRole();
$createButton = '';
if (FHtml::isInRole('', 'create', $currentRole)) {
    $createButton = FHtml::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;' . FHtml::t('common', 'Create'), ['create'],
        [
            'role' => $this->params['editType'],
            'data-pjax' => $this->params['isAjax'] == true ? 1 : 0,
            'title' => FHtml::t('common', 'title.create'),
            'class' => 'btn btn-success',
            'style' => 'float:left;'
        ]);

    $createButton .= '&nbsp;&nbsp;' . FHtml::a('<i class="glyphicon glyphicon-refresh"></i>&nbsp;' . FHtml::t('common', 'Populate'), ['populate'],
            [
                'role' => $this->params['editType'],
                'data-pjax' => $this->params['isAjax'] == true ? 1 : 0,
                'title' => FHtml::t('common', 'Populate'),
                'class' => 'btn btn-warning',
                'style' => 'float:left;'
            ]);
}

$deleteButton = '';
if (FHtml::isInRole('', 'delete', $currentRole)) {
    $deleteButton = BulkButtonWidget::widget([
        'buttons' => FHtml::a('<i class="glyphicon glyphicon-trash"></i>',
            ["bulk-delete"],
            [
                "class" => "btn btn-danger",
                'role' => 'modal-remote-bulk',
                'data-confirm' => false, 'data-method' => false,// for overide yii data api
                'data-request-method' => 'post',
                'data-confirm-title' => FHtml::t('common', ''),
                'data-confirm-message' => FHtml::t('common', 'Are you sure to delete ?'),
                'style' => 'float:left; margin-left:2px;'
            ]),
    ]);
}

$bulkActionButton = '';
if (FHtml::isInRole('', 'action', $currentRole)) {
    $bulkActionButton = '<div class="dropdown pull-left">&nbsp;<button class="btn btn-default" data-toggle="dropdown">' . FHtml::t('common', 'Actions') . '</button>' . DropdownX::widget([
            'items' =>
                \yii\helpers\ArrayHelper::merge(
                    [FHtml::buildBulkActionsMenu(FHtml::t('common', 'Set') . ' [' . FHtml::t('TravelSites', 'Is Active') . ']:', 'travel_sites', 'travel_sites', 'is_active')],
                    [FHtml::buildBulkActionsMenu(FHtml::t('common', 'Search'), 'travel_sites', 'travel_sites', '', 'search')],
                    [FHtml::buildBulkDividerMenu()],
                    [FHtml::buildBulkDeleteMenu()]
                )
        ]) . '</div>';
}

return [
    [
        'content' =>
            $createButton .
            '{export}' .
            FHtml::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
            '{toggleData}' .
            $bulkActionButton,
        'options' => ['class' => 'text-right kv-panel-before']
    ],
];