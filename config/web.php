<?php

//Yii::setAlias('@runtime', '@webroot/web/runtime');

Yii::setAlias('@console', dirname(__DIR__) . '/../console/web');

$config = [
    'id' => 'web',
    'homeUrl' => '/',
    'basePath' => dirname(__DIR__), //if in web dir
    //'basePath' => dirname(__DIR__),
    'defaultRoute' => 'main/index',
    'bootstrap' => [
        'plugins',
        'panix\engine\plugins\goaway\GoAway',
        //'webcontrol'
    ],
	'aliases' => [
        '@uploads' => '@app/web/uploads',
    ],
    'components' => [
        'plugins' => [
            'class' => 'panix\mod\plugins\components\PluginsManager',
            'appId' => panix\mod\plugins\BasePlugin::APP_WEB,
            // by default
            'enablePlugins' => true,
            'shortcodesParse' => true,
            'shortcodesIgnoreBlocks' => [
                '<pre[^>]*>' => '<\/pre>',
                '<a[^>]*>' => '<\/a>',
               // '<div class="content[^>]*>' => '<\/div>',
            ]
        ],
        'sphinx' => [
            'class' => 'yii\sphinx\Connection',
            'dsn' => 'mysql:host=127.0.0.1;port=9306;',
            'username' => '',
            'password' => '',
        ],
        'fcm' => [
            'class' => 'understeam\fcm\Client',
            'apiKey' => 'AIzaSyAbeTCpxK7OGu_lXZDSnJjV1ItkUwPOBbc', // Server API Key (you can get it here: https://firebase.google.com/docs/server/setup#prerequisites)
        ],
        'stats' => ['class' => 'panix\mod\stats\components\Stats'],
        'geoip' => ['class' => 'panix\engine\components\geoip\GeoIP'],
        //'webcontrol' => ['class' => 'panix\engine\widgets\webcontrol\WebInlineControl'],
        'view' => [
            'class' => 'panix\mod\plugins\components\View',
            'as Layout' => [
                'class' => 'panix\engine\behaviors\LayoutBehavior',
            ],
            'renderers' => [
                'tpl' => [
                    'class' => 'yii\smarty\ViewRenderer',
                    //'cachePath' => '@runtime/Smarty/cache',
                ],
            ],
            'theme' => [
                'class' => 'panix\engine\base\Theme'
            ],
        ],
        'request' => [
            'class' => 'panix\engine\WebRequest',
            'baseUrl' => '',
            // 'csrfParam' => '_csrf-frontend',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fpsiKaSs1Mcb6zwlsUZwuhqScBs5UgPQ',
        ],

        'errorHandler' => [
            //'class'=>'panix\engine\base\ErrorHandler'
            //'errorAction' => 'site/error',
            'errorAction' => 'main/error',
            // 'errorView' => '@webroot/themes/basic/views/layouts/error.php'
        ],


        'urlManager' => require(__DIR__ . '/urlManager.php'),

    ],
    //'on beforeRequest' => ['class' => 'panix\engine\base\ThemeView']
    /*'as access' => [
        'class' => panix\mod\rbac\filters\AccessControl::class,
        'allowActions' => [
            '/*',
            'admin/*',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],*/

];

return $config;
