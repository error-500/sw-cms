<?php

use yii\web\View;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'sw-cms-site',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log'
    ],
    //'language' => 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
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
        'i18n'         => [
            'translations' => [
                'app*' => [
                    'sourceLanguage' => 'ru-RU',
                    'class'          => 'yii\i18n\PhpMessageSource',
                    'basePath'       => '@app/messages',
                    'fileMap'        => [
                        'app'       => 'messages.php',
                        'app/error' => 'errors.php',
                    ],
                ],
            ],
        ],
        'formatter'    => [
            'dateFormat'        => 'dd.MM.yyyy',
            'decimalSeparator'  => ',',
            'thousandSeparator' => ' ',
            'currencyCode'      => 'EUR',
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
                    'coords' => [55.77434759323901,37.57892985354571,],
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
                // 'baseUrl'  => '@web/themes/vue-app',
                'pathMap'  => [
                    '@app/assets'      => '@app/themes/qartuliru_default',
                    '@app/views'       => ['@app/views','@app/themes/qartuliru_default/views'],
                    '@app/widgets'     => ['@app/widgets','@app/themes/qartuliru_default/widgets'],
                    '@app/modules'     => '@app/themes/qartuliru_default/modules',
                    // '@app/modules/post/widgets/views' => '@app/themes/crystald/widgets',
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'menu/<menu:[\w_\-]+>' => 'menu/menu',
                'page/<name:[\w_\-]+>' => 'site/page',
                'contacts/' => 'site/contacts',
                'reservation/' => 'site/reservation',
                'delivery/' => 'site/delivery',
                'delivery/<sub_group:[\w_\-]+>' => 'site/delivery',
                'news/' => '/news/list',
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
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

// return $config;
return array_merge_recursive($config, require(__DIR__ . '/../modules/sw/config/web.php'));