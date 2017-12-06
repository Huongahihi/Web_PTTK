<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use \common\components\FHtml;
use common\components\Helper;
use common\widgets\FDetailView;
use yii\widgets\Pjax;

$moduleName = 'MusicSong';

$currentRole = FHtml::getCurrentRole();
$currentAction = FHtml::currentAction();

$canEdit = FHtml::isInRole('', 'edit', $currentRole, FHtml::getFieldValue($model, ['user_id', 'created_user']));
$canDelete = FHtml::isInRole('', 'delete', $currentRole);

$print = isset($print) ? $print : true;
$ajax = isset($ajax) ? $ajax : (FHtml::isListAction($currentAction) ? false : true);

/* @var $this yii\web\View */
/* @var $model backend\modules\music\models\MusicSong */
?>
<?php if (!Yii::$app->request->isAjax) {
$this->title = 'Music Songs';
$this->params['toolBarActions'] = array(
'linkButton'=>array(),
'button'=>array(),
'dropdown'=>array(),
);
$this->params['mainIcon'] = 'fa fa-list';
} ?>
<?php if ($ajax) Pjax::begin(['id' => 'crud-datatable'])  ?>

<?php if (Yii::$app->request->isAjax) { ?>
<div class="music-song-view">

       <?= FDetailView::widget([
    'model' => $model,
    'attributes' => [
                    'id',
                'thumbnail',
                'image',
                'song_file',
                'name',
                'description',
                'content',
                'price',
                'duration',
                'release_date',
                'artist_singer_id',
                'artist_composer_id',
                'album_id',
                'is_hot',
                'is_top',
                'is_active',
                'is_video',
                'lang',
                'type',
                'status',
                'mood',
                'category_id',
                'count_views',
                'count_likes',
                'count_purchase',
                'count_comments',
                'count_rates',
                'rates',
                'created_date',
                'created_user',
                'modified_date',
                'modified_user',
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
                'thumbnail',
                'image',
                'song_file',
                'name',
                'description',
                'content',
                'price',
                'duration',
                'release_date',
                'artist_singer_id',
                'artist_composer_id',
                'album_id',
                'is_hot',
                'is_top',
                'is_active',
                'is_video',
                'lang',
                'type',
                'status',
                'mood',
                'category_id',
                'count_views',
                'count_likes',
                'count_purchase',
                'count_comments',
                'count_rates',
                'rates',
                'created_date',
                'created_user',
                'modified_date',
                'modified_user',
                'application_id',
                ],
                ]) ?>

            </div>

        </div>

<?php } ?><?php if ($ajax) Pjax::end()  ?>

