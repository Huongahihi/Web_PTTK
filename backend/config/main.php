<?php
use kartik\datecontrol\Module;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$theme =ADMIN_THEME;

return [
    'id' => '',
    'name' => 'MOZA Framework',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'system' => [
            'class' => 'backend\modules\system\System',
        ],
        'cms' => [
            'class' => 'backend\modules\cms\Cms',
        ],
        'crm' => [
            'class' => 'backend\modules\crm\Crm',
        ],
        'ecommerce' => [
            'class' => 'backend\modules\ecommerce\Ecommerce',
        ],
        'music' => [
            'class' => 'backend\modules\music\Music',
        ],
        'travel' => [
            'class' => 'backend\modules\travel\Travel',
        ],
        'deals' => [
            'class' => 'backend\modules\deals\Deals',
        ],
        'purchase' => [
            'class' => 'backend\modules\purchase\Purchase',
        ],
        'pm' => [
            'class' => 'backend\modules\pm\Pm',
        ],
        'hrm' => [
            'class' => 'backend\modules\hrm\Hrm',
        ],
        'finance' => [
            'class' => 'backend\modules\finance\Finance',
        ],
        'app' => [
            'class' => 'backend\modules\app\App',
        ],
        'football' => [
            'class' => 'backend\modules\football\Football',
        ],
        'jobs' => [
            'class' => 'backend\modules\jobs\Jobs',
        ],
        'office' => [
            'class' => 'backend\modules\office\Office',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'dynagrid' => [
            'class' => '\kartik\dynagrid\Module',
            // other module settings
        ],
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',

            // format settings for displaying each date attribute (ICU format example)
            'displaySettings' => [
                Module::FORMAT_DATE => 'php:Y-m-d',
                Module::FORMAT_TIME => 'HH:mm:ss a',
                Module::FORMAT_DATETIME => 'dd-MM-yyyy HH:mm:ss a',
            ],

            // format settings for saving each date attribute (PHP format example)
            'saveSettings' => [
                Module::FORMAT_DATE => 'php:Y-m-d', // saves as unix timestamp
                Module::FORMAT_TIME => 'php:H:i:s',
                Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
            ],

            // set your display timezone
            //'displayTimezone' => 'Asia/Ho_Chi_Minh',

            // set your timezone for date saved to db
            //'saveTimezone' => 'UTC',

            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,

            // use ajax conversion for processing dates from display format to save format.
            'ajaxConversion' => true,

            // default settings for each widget from kartik\widgets used when autoWidget is true
            'autoWidgetSettings' => [
                Module::FORMAT_DATE => ['type' => 2, 'pluginOptions' => ['autoclose' => true]], // example
                Module::FORMAT_DATETIME => [], // setup if needed
                Module::FORMAT_TIME => [], // setup if needed
            ],

            // custom widget settings that will be used to render the date input instead of kartik\widgets,
            // this will be used when autoWidget is set to false at module or widget level.
            'widgetSettings' => [
                Module::FORMAT_DATE => [
                    'class' => 'yii\jui\DatePicker', // example
                    'options' => [
                        'dateFormat' => 'php:Y-m-d',
                        'options' => ['class' => 'form-control'],
                    ]
                ]
            ]
            // other settings
        ]
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'appuser' => [
            'identityClass' => 'backend\models\AppUser',
            'enableAutoLogin' => true,
            'class' => 'yii\web\User'
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'fs' => [
            'class' => 'creocoder\flysystem\LocalFilesystem',
            'path' => '@backend/..',
        ],

        'ftpFs' => [
            'class' => 'creocoder\flysystem\FtpFilesystem',
            'host' => '',
//             'port' => 21,
//             'username' => '',
//             'password' => '',
//             'ssl' => false,
//             'timeout' => 3600,
//             'root' => '/',
            // 'permPrivate' => 0700,
            // 'permPublic' => 0744,
             'passive' => false,
             'transferMode' => FTP_TEXT,
        ],
        'sftpFs' => [
            'class' => 'creocoder\flysystem\SftpFilesystem',
            'host' => '',
            'port' => 22,
            'username' => '',
            'password' => '',
            'timeout' => 3600,
            'root' => '/',
            //'privateKey' => '/path/to/or/contents/of/privatekey',
            // 'timeout' => 60,
            // 'root' => '/path/to/root',
            // 'permPrivate' => 0700,
            // 'permPublic' => 0744,
        ],
        'filemanager' => [
            'class' => 'pendalf89\filemanager\Module',
            // Upload routes
            'routes' => [
                // Base absolute path to web directory
                'baseUrl' => '',
                // Base web directory url
                'basePath' => '@frontend/web',
                // Path for uploaded files in web directory
                'uploadPath' => 'uploads',
            ],
            // Thumbnails info
            'thumbs' => [
                'small' => [
                    'name' => 'Мелкий',
                    'size' => [100, 100],
                ],
                'medium' => [
                    'name' => 'Средний',
                    'size' => [300, 200],
                ],
                'large' => [
                    'name' => 'Большой',
                    'size' => [500, 400],
                ],
            ],
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        //Config for layout and theme
        'view' => [
            'theme' => [
                'pathMap' => ['@backend/views' => '@backend/web/themes/' . $theme],
                'baseUrl' => '@backend/web/themes/' . $theme,
            ],
        ],
        //Remove bootstrap css
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
        //Config I18N for label  can be moved to common/config/main.php to use for both backend and frontend
        'i18n' => [
            'translations' => [
                'auth*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'auth' => 'auth.php',
                    ],
                ],
                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'common' => 'common.php',
                    ],
                ],
            ],
        ],
        'paypal' => [
            'class' => 'cinghie\paypal\components\Paypal',
            'clientId' => 'ATn8jCCZCBQGTiOdvVw6R_AVC0QVRsM9VBMi8HnCvtEO0ZasFtNwwL5QNCBx5QRYYG-fd9GCLmxdhdei',
            'clientSecret' => 'EBC8YyppZCtFBEWoAw1snPVhna5l-I5uKyvSJlwbzGT4nKOjXmMPUQb5wck6EcFG87-bSKh43vyXrG1x',
            'isProduction' => false,
            // This is config file for the PayPal system
            'config' => [
                'mode' => 'sandbox', // development (sandbox) or production (live) mode
            ]
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [],
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '/project/frontend/web/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],

    ],
    'params' => $params,
    'language' => '',
];
