<?php

use yii\web\View;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'sw-cms-site',
    'language' => 'ru-RU',//'en-US',
    'sourceLanguage' => 'ru-RU',//'en-US',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log'
    ],
    //'module' => 'main',
    'controllerNamespace' => 'app\modules\main\controllers',

    'controllerMap' => [
        'site' => [
            'class' => 'app\modules\main\controllers\DefaultController',
        ]
    ],

    'defaultRoute' => 'default/index',
    'aliases' => [
        '@app'  => dirname(__DIR__),
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@sw'    => '@app/modules/sw',
        '@main'  => '@app/modules/main',
    ],
    'modules' => [
        'en-US' => [
            'class' => 'app\modules\main\Module',
            'controllerNamespace' => 'app\modules\main\controllers',
            'initLanguage' => 'en-US',
            'controllerMap' => [
                'default' => 'app\modules\main\controllers\DefaultController',
            ],
            'defaultRoute' => 'default/index',
        ],
        /*'sw' => [
            'class' => 'app\modules\sw\Module',
            'modules' => [
                'en-US' => [
                    'class' => 'app\modules\sw\Module'
                ]
            ],
        ],*/
    ],
    'components' => [
        'assetManager' => [
            'linkAssets' => strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? false : true,
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'jsOptions' => [
                        'position' => View::POS_HEAD,
                    ],
                ],
            ],
        ],
        'sw' => [
            'class' => 'app\modules\sw\Sw',
        ],
        'i18n'         => require_once __DIR__.'/i18n.conf.php',
        'formatter'    => [
            'dateFormat'        => 'dd.MM.yyyy',
            'decimalSeparator'  => ',',
            'thousandSeparator' => ' ',
            'currencyCode'      => 'RUB',
            'timeZone'          => 'UTC',
            'locale'            => 'ru-RU',
        ],
        'vueApp' => [
            'class' =>'app\components\VueApp\VueObject',
            'data' => [
                'ymapProps' => [
                    'settings' => [
                        'apiKey' => "'85485089-7da9-41be-a978-c2846d2f2d5d'",
                        'lang' => "'ru_RU'",
                        'coordorder' => "'latlong'",
                    ],
                    'coords' => [55.77434759100000,37.57800085354571,],
                    'zoom' => 17,
                ]
            ],
        ],
        'request' => [
            'cookieValidationKey' => md5('G934jhf8uakw#$'),
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/qartuliru_default',
                'pathMap'  => [
                    '@app/assets'      => '@app/themes/qartuliru_default',
                    '@app/views'       => [
                        '@app/themes/qartuliru_default/modules/main/views',
                        '@app/themes/qartuliru_default/views',
                        '@app/views',
                    ],
                    '@app/widgets'     => [
                        '@app/widgets',
                        '@app/themes/qartuliru_default/widgets',
                        '@app/themes/qartuliru_default/modules/main/widgets',
                    ],
                    '@app/modules'     => '@app/themes/qartuliru_default/modules',
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'default/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        'urlManager' => [
            /*'class' => 'codemix\localeurls\UrlManager',
            'languages' => ['en-US'],
            'ignoreLanguageUrlPatterns' => [
                '#^sw/' => '#^sw/'
            ],*/
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'menu/<menu:[\w_\-]+>' => 'menu/menu',
                'en-US/menu/<menu:[\w_\-]+>' => 'en-US/menu/menu',
                'page/<name:[\w_\-]+>' => 'default/page',
                'en-US/page/<name:[\w_\-]+>' => 'en-US/default/page',
                'contacts/' => 'default/contacts',
                'en-US/contacts/' => 'en-US/default/contacts',
                'reservation/' => 'default/reservation',
                'en-US/reservation/' => 'en-US/default/reservation',
                'delivery/' => 'default/delivery',
                'en-US/delivery/' => 'en-US/default/delivery',
                'delivery/<sub_group:[\w_\-]+>' => 'default/delivery',
                'en-US/delivery/<sub_group:[\w_\-]+>' => 'en-US/default/delivery',
                'news/' => 'news/list',
                'en-US/news/' => 'en-US/news/list',
            ],
        ],

        'reCaptcha' => [
            'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
            'siteKeyV2' => '6LfjwBYaAAAAAF3iqvMVIbgkZVd-m8q1zursW1mq',
            'secretV2' => '6LfjwBYaAAAAAFc__DHN60euJEVw8g1SKeZdpgWL',
            'siteKeyV3' => '6LdnkxUaAAAAADg0Yqc8gjnfTxQZEf9nhbrQfEg8',
            'secretV3' => '6LdnkxUaAAAAAIdfj8kUr0wzhAyf57LsAOKk21Q1',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.57.1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.57.1'],
    ];
}

// return $config;
return array_merge_recursive($config, require(__DIR__ . '/../modules/sw/config/web.php'));