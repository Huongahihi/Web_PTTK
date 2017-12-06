<?php

namespace common\config;

use backend\models\AuthMenu;
use backend\modules\app\App;
use backend\modules\cms\Cms;
use backend\modules\ecommerce\Ecommerce;
use backend\modules\system\System;
use backend\modules\travel\Travel;
use common\components\FHtml;
use common\components\FSecurity;
use yii\base\Component;

class FSettings extends \common\components\FSettings
{
    const MODULES = [
        '' => ['object_category', 'object_attributes', 'object_file', 'object_actions', 'object_relation', 'user*', 'settings', 'auth*', 'user'],
        'system' => ['object_*', 'application*', 'settings_schema', 'object_type', 'settings_menu'],
        'app' => ['app_*'],
        'cms' => ['cms_*'],
        'travel' => ['travel_*'],
        'ecommerce' => ['product*', 'provider*', 'promotion*', 'ecommerce*'],
        'music' => ['music_*'],
    ];

    const LABEL_COLORS = [
        'success' => ['started', 'processing', 'active'],
        'warning' => ['pending', 'late', 'hot'],
        'danger' => ['alert', 'fail', 'risk', 'top'],
        'primary' => ['done', 'closed']
    ];

    const ARRAY_LANG = [
        'en' => 'English', 'vi' => 'Vietnam', 'ru' => 'Russia', 'jp' => 'Japanese', 'kr' => 'Korea', 'es' => 'Spain', 'pt' => 'Potugal', 'fr' => 'French', 'de' => 'Germany', 'cn' => 'China'
    ];

    const LOOKUP = [
    ];

    const APPLICATIONS_RULES = [
            'mobap' => 'mobap',
        ];
}