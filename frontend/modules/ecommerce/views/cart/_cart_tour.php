<?php
use frontend\assets\CustomAsset;
use frontend\components\Helper;
use common\components\FHtml;

$asset = CustomAsset::register($this);
$baseUrl = $asset->baseUrl;
?>

<div class="round-border"
     style="background-color: white;width:100%; border:solid 1px lightgrey;padding:20px">
    <label class="control-label"><?= FHtml::t('common', 'Select date') ?></label>
    <?php

    echo \kartik\widgets\DatePicker::widget([
        'name' => 'dp_3',
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'value' => '23-Feb-2017',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]);
    ?>
    <br/>
    <div class="select-no-people form-group">
        <div class="select-no-people-dropdown " data-adult-required="true" style="display: none">
            <div class="">
                <p id="maximum-people-msg" class="travel-error-massage error"
                   style="color: red; display: none;">Minimum 1 and maximum 9 people allowed.</p>
                <p id="adult-req-msg" class="travel-error-massage error"
                   style="color:red; display:none">Adult(s) are required for this tour</p>
                <p class="no-ppl-error travel-error-massage error" style="display:none">
                    <i class="fa fa-caret-up"></i>Minimum 1 and maximum 9 people allowed. </p>
                <p class="price-na-error" style="display:none">
                </p>
            </div>
            <div class="adult-youth-child-wrapper adult-youth-child-wrapper-above" data-band="1">
                <div class="pull-left">
                        <span><strong><?= FHtml::t('common', 'Adult') ?></strong>
                        <small class="text-muted">(<?= FHtml::t('common', 'Age above 12') ?>)</small>
                        </span>
                </div>
                <div class="pull-right" data-source="VIATOR_ID">
                    <div>
                        <span class="minus" onclick="choosemember_above_minus('adult', '<?= FHtml::createUrl('travel/cart/member') ?>')"><a href="javascript:;">-</a></span>

                        <span class="count" data-type="adult" data-min="0" data-max="99"
                              id="id-adult"><?=$adult?></span>
                        <span class="plus" onclick="choosemember_above_plus('adult','<?= FHtml::createUrl('travel/cart/member') ?>')"><a href="javascript:;">+</a></span>
                    </div>
                </div>
            </div>
            <div class="adult-youth-child-wrapper adult-youth-child-wrapper-under" data-band="3">
                <div class="pull-left">
                        <span><strong><?= FHtml::t('common', 'Children') ?></strong>
                        <small class="text-muted">(<?= FHtml::t('common', 'Age below 12') ?>)</small>
                        </span>
                </div>
                <div class="pull-right" data-source="VIATOR_ID">
                    <div>
                        <span class="minus" onclick="choosemember_under_minus('child', '<?= FHtml::createUrl('travel/cart/member') ?>')"><a href="javascript:;">-</a></span>
                        <span class="count" data-type="infant" data-min="0" data-max="99"
                              id="id-infant"><?=$child?></span>
                        <span class="plus" onclick="choosemember_under_plus('child','<?= FHtml::createUrl('travel/cart/member') ?>')"><a href="javascript:;">+</a></span>
                    </div>
                </div>
            </div>
            <i id="hidden" class="glyphicon glyphicon-chevron-up" onclick="choosememberhidden()"
               style="text-align: center;font-size: 20px;width: 100%;"></i>
        </div>
        <span class="selection-input custom-select-ppl">
            <label class="control-label" onclick="choosemembercollepse()"><?= FHtml::t('common', 'No. of Travellers') ?></label>
                <input type="text" class="custom-select age-crit form-control" value="Adult: <?=$adult?>, Children: <?=$child?> "
                       readonly="true" name="data_input_category"
                       id="data_input_category" placeholder="Select" onclick="choosemembercollepse()"/>
            </span>
    </div>
<br/>

<button class="btn btn-lg btn-success" style="width:100%" value="<?php $model->id ?>"
        onclick="actionAdd('<?= $model->id ?>',1,'add','<?= FHtml::createUrl('travel/cart/cart') ?>')"><?= FHtml::t('common', 'Add to cart') ?>
</button>

</div>