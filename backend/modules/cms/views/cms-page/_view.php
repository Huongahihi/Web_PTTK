<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use \common\components\FHtml;
use common\components\Helper;
use common\widgets\FDetailView;
use yii\widgets\Pjax;

$moduleName = 'CmsPage';

$currentRole = FHtml::getCurrentRole();
$currentAction = FHtml::currentAction();

$canEdit = FHtml::isInRole('', 'edit', $currentRole, FHtml::getFieldValue($model, ['user_id', 'created_user']));
$canDelete = FHtml::isInRole('', 'delete', $currentRole);

$print = isset($print) ? $print : true;
$ajax = isset($ajax) ? $ajax : (FHtml::isListAction($currentAction) ? false : true);

/* @var $this yii\web\View */
/* @var $model backend\modules\cms\models\CmsPage */
?>
<?php if (!Yii::$app->request->isAjax) {
$this->title = 'Cms Pages';
$this->params['toolBarActions'] = array(
'linkButton'=>array(),
'button'=>array(),
'dropdown'=>array(),
);
$this->params['mainIcon'] = 'fa fa-list';
} ?>
<?php if ($ajax) Pjax::begin(['id' => 'crud-datatable'])  ?>

<?php if (Yii::$app->request->isAjax) { ?>
<div class="cms-page-view">

       <?= FDetailView::widget([
    'model' => $model,
    'attributes' => [
                    'id',
                'code',
                'image',
                'name',
                'description',
                'content',
                'keywords',
                'page_image',
                'page_title',
                'page_slug',
                'page_description',
                'page_content',
                'page_width',
                'page_background',
                'body_css',
                'body_style',
                'page_style',
                'page_script',
                'views_count',
                'is_active',
                'sort_order',
                'created_date',
                'created_user',
                'application_id',
    ],
    ]) ?>
</div>
<?php } else { ?>

        <div class="row" style="padding: 20px">
            <div class="col-md-12" style="background-color: white; padding: 20px">
                <?= FDetailView::widget([
                'model' => $model,
                'attributes' => [
                                'id',
                'code',
                'image',
                'name',
                'description',
                'content',
                'keywords',
                'page_image',
                'page_title',
                'page_slug',
                'page_description',
                'page_content',
                'page_width',
                'page_background',
                'body_css',
                'body_style',
                'page_style',
                'page_script',
                'views_count',
                'is_active',
                'sort_order',
                'created_date',
                'created_user',
                'application_id',
                ],
                ]) ?>

            </div>

        </div>

<?php } ?><?php if ($ajax) Pjax::end()  ?>

