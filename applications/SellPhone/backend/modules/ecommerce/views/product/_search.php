<?php

use yii\helpers\Url;
use common\components\FHtml;
use common\components\Helper;
use kartik\datecontrol\DateControl;
use kartik\grid\GridView;
 ?>
 <style type="text/css">
 	.companyes_search{
 		margin: top;
 		width: 50px;
 		height: 100%;
 	}
 </style>
 <div class="companyes_search">
 	<?php $form= ActiveForm::begin([
 		'action'=>['index'],
 		'acthod'=>'get',)]; ?>
 	<?= $form->field($model,'globalSearch') ?>
 	<div class="form-gropu">
 	<?= Html::submitButton('Search',['class'=>'btn btn-primary']) ?>
 	<?= Html::resetButon('Reset',['class'=>'btn btn-default']) ?> 
 	</div>
 	<?php ActiveForm::end ?>
 </div>