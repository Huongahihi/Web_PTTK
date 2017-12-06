<?php
use common\components\FHtml;

$step=\common\components\FHtml::currentAction();
$message = FHtml::getRequestParam('message');
if (!empty($message))
    $message = FHtml::t('common', 'Please input your contact information so that we can reach out to you');
?>

<div class="contain-to-grid header__center-bar site-header light">
    <div class="row" >
        <ul role="tablist">
            <li role="tab" class="small-4 columns first <?=($step=='viewcart')?'current':'disabled';?>" aria-disabled="false" aria-selected="true">
                <a id="steps-uid-0-t-0" href="#steps-uid-0-h-0" aria-controls="steps-uid-0-p-0">
                    <span class="current-info audible">current step: </span>
                    <span class="number">1.</span>
                    <div class="overflow-h">
                        <h2 ><?= FHtml::t('common', 'Shopping Cart') ?></h2>
                        <p style="margin-bottom: 1.25em;"><?= FHtml::t('common', 'Review & edit Products') ?></p>
                        <i class="rounded-x fa fa-check"></i>
                    </div>
                </a>
            </li>
            <li role="tab" class="small-4 columns <?=($step=='bill')?'current':'disabled';?>" aria-disabled="true">
                <a id="steps-uid-0-t-1" href="#steps-uid-0-h-1"
                   aria-controls="steps-uid-0-p-1"><span
                            class="number">2.</span>
                    <div class="overflow-h">
                        <h2><?= FHtml::t('common', 'Billing Info') ?></h2>
                        <p style="margin-bottom: 1.25em;"><?= FHtml::t('common', 'Shipping & Delivery Information') ?></p>
                        <i class="rounded-x fa fa-home"></i>
                    </div>
                </a>
            </li>
            <li role="tab" class="small-4 columns <?=($step=='checkout')?'current':'disabled';?> last" aria-disabled="true">
                <a id="steps-uid-0-t-2" href="#steps-uid-0-h-2" aria-controls="steps-uid-0-p-2">
                    <span class="number">3.</span>
                    <div class="overflow-h">
                        <h2><?= FHtml::t('common', 'Payment') ?></h2>
                        <p style="margin-bottom: 1.25em;"><?= FHtml::t('common', 'Select Payment method') ?></p>
                        <i class="rounded-x fa fa-credit-card"></i>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>


<?= FHtml::showErrorMessage($message) ?>
