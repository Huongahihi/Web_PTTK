<?php
$baseUrl = Yii::$app->getUrlManager()->getBaseUrl();

$baseUrl .= "/applications/SellPhone/assets/";

?>
<?php $this->registerJsFile($baseUrl . "js/jquery-1.11.3.min.js", ['depends' => [\yii\web\JqueryAsset::className()]]) ?>
<?php $this->registerJsFile($baseUrl . "js/modernizr.custom.js", ['depends' => [\yii\web\JqueryAsset::className()]]) ?>
<?php $this->registerJsFile($baseUrl . "js/custom_form.js", ['depends' => [\yii\web\JqueryAsset::className()]]) ?>
<?php $this->registerJsFile($baseUrl . "js/slick.min.js", ['depends' => [\yii\web\JqueryAsset::className()]]) ?>
<?php $this->registerJsFile($baseUrl . "js/responsive.js", ['depends' => [\yii\web\JqueryAsset::className()]]) ?>
<?php $this->registerJsFile($baseUrl . "js/picturefill.min.js", ['depends' => [\yii\web\JqueryAsset::className()]]) ?>
<?php $this->registerJsFile($baseUrl . "js/jquery.flexslider.js", ['depends' => [\yii\web\JqueryAsset::className()]]) ?>
<?php $this->registerJsFile($baseUrl . "js/scripts.js", ['depends' => [\yii\web\JqueryAsset::className()]]) ?>
<?php $this->registerJsFile($baseUrl . "js/responsive.js", ['depends' => [\yii\web\JqueryAsset::className()]]) ?>
<?php $this->registerJsFile($baseUrl . "js/picturefill.min.js", ['depends' => [\yii\web\JqueryAsset::className()]]) ?>
<?php $this->registerJsFile($baseUrl . "js/jquery.flexslider.js", ['depends' => [\yii\web\JqueryAsset::className()]]) ?>
<?php $this->registerJsFile($baseUrl . "js/jquery.waiting.min.js", ['depends' => [\yii\web\JqueryAsset::className()]]) ?>
<?php $this->registerJsFile($baseUrl . "js/jquery.lazyload.js", ['depends' => [\yii\web\JqueryAsset::className()]]) ?>

<!--Echo header css, js -->
<?php $this->registerJs("
    $(document).ready(function () {
        $('img.lazy').lazyload(
            {effect: 'fadeIn'});
    });
 "); ?>
