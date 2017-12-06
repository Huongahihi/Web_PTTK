<?php
/**
 * Created by PhpStorm.
 * User: Darkness
 * Date: 9/6/2016
 * Time: 4:43 PM
 */

/* @var $model \backend\models\News */
/* @var $this yii\web\View */

use common\components\FHtml;

$controlName = FHtml::settingPageView('_view_normal');
$object_type = FHtml::settingPageObject('promotion'); // table name or query name
$model = FHtml::getPageViewModel($object_type);
$this->title = FHtml::settingPageTitle('Promotions');

?>

<?= $this->render($controlName, [
    'model' => $model,
    'object_type' => $object_type,
    'title' => $this->title
]) ?>

