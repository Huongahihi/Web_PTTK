<?php
/**
 * Created by PhpStorm.
 * User: tongd
 * Date: 2017-07-31
 * Time: 09:42
 */
namespace common\widgets;

use common\components\FPagination;
use yii\widgets\LinkPager;
use yii\helpers\Html;

class FLinkPager extends LinkPager
{
    protected function renderPageButton($label, $page, $class, $disabled, $active)
    {
        $options = ['class' => empty($class) ? $this->pageCssClass : $class];
        if ($active) {
            Html::addCssClass($options, $this->activePageCssClass);
        }
        if ($disabled) {
            Html::addCssClass($options, $this->disabledPageCssClass);

            return Html::tag('li', Html::tag('span', $label), $options);
        }
        $linkOptions = $this->linkOptions;
        $linkOptions['data-page'] = $page;
        $url = new FPagination();
        return Html::tag('li', Html::a($label, $url->createUrl($page), $linkOptions), $options);
    }
}