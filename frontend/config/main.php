<?php
use common\components\FHtml;
use yii\web\Request;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$application_id = FHtml::getRequestParam('application_id');
if (empty($application_id))
    $application_id = key_exists('application.id', $_COOKIE) ? $_COOKIE['application.id'] : DEFAULT_APPLICATION_ID;

$_COOKIE['application.id'] = $application_id;

$application_folder = $application_id;

$baseUrl = (new Request())->getBaseUrl();
$backEndBaseUrl = str_replace('/frontend/web', '/backend/web', $baseUrl);

$rootFolder = ROOT_FOLDER;

$appname = DEFAULT_APPLICATION_NAME;

return [
    'name' => $appname,
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'ecommerce' => [
            'class' => 'frontend\modules\ecommerce\Ecommerce',
        ],
        'travel' => [
            'class' => 'frontend\modules\travel\Travel',
        ],
        'cms' => [
            'class' => 'frontend\modules\cms\Cms',
        ],
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
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                    'clientId' => '1943476255937769',
                    'clientSecret' => 'bde48317e19ac33f41139b469ecb88f6',
                    'attributeNames' => ['name', 'email', 'first_name', 'last_name'],
                ],
            ],
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        //Config for layout and theme
        'view' => [
            'theme' => [
                'pathMap' => ['@frontend/views' => 'applications/' . $application_folder],
                'baseUrl' => 'applications/' . $application_folder,
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
//        'request'=>[
//            'baseUrl'=>'',
//        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules' => [
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'index.php/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'index.php/<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',

                'captcha' => 'site/captcha',
                'login' => 'site/login',
//                'auth' => 'site/auth',
                'signup' => 'site/signup',
                'logout' => 'site/logout',
                'admin' => 'site/login',
                'detail' => 'site/detail',
                'about' => 'cms/about',
                'contact' => 'cms/contact',
                'home' => 'site/index',

                'help' => 'site/help',
                'store' => 'site/store',

                'portfolio' => 'cms/portfolio',
                'faq' => 'cms/faq',

                'blog' => 'cms/news',
//                'blog/<code:[a-zA-Z0-9_ -]+>-p<id:\d+>-c<category_id:\d+>\/view' => 'cms/news/view',
//                'blog/<code:[a-zA-Z0-9_ -]+>-c<category_id:\d+>/list' => 'cms/news/list',
                'blog/<code:[a-zA-Z0-9_ -]+>-p<id:\d+>-c<category_id:\d+>' => 'cms/news/view',
                'blog/<code:[a-zA-Z0-9_ -]+>-c<category_id:\d+>' => 'cms/news/list',
                'news' => 'cms/news',
                'news/<code:[a-zA-Z0-9_ -]+>/<id:\d+>/<category_id:\d+>' => 'cms/news/view',
                'news/<code:[a-zA-Z0-9_ -]+>/<category_id:\d+>' => 'cms/news/list',

                'promotion' => 'cms/promotion',
                'service' => 'cms/service',
                'team' => 'cms/team',
                'testimonial' => 'cms/testimonial',


                'product/<code:[a-zA-Z0-9_ -]+>-p<id:\d+>-c<category_id:\d+>' => 'ecommerce/product/view',
                'product/<code:[a-zA-Z0-9_ -]+>-c<category_id:\d+>' => 'ecommerce/product/list',
                'product/' => 'ecommerce/product/index',
            ],
        ],
        'Paypal' => array(
            'class'=>'common\components\Paypal',
            'apiUsername' => PAYPAL_API_USERNAME,
            'apiPassword' => PAYPAL_API_PASSWORD,
            'apiSignature' => PAYPAL_API_PASSWORD,
            'apiLive' => PAYPAL_API_LIVE,
            'returnUrl' => 'ecommerce/order/invoice', //regardless of url management component
            'cancelUrl' => 'ecommerce/order/bill', //regardless of url management component
        ),
        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => $baseUrl . '/backend/web/',
            'enablePrettyUrl' => true,
            //'showScriptName' => false,
        ],
    ],
    'params' => $params,
    'language' => 'en',
];
