<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    //'language' => 'en',
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
                    '@app/widgets'     => '@app/themes/qartuliru_default/widgets',
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
        'i18n' => [
        'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app'       => 'app.php',
                        'app/error' => 'error.php',
                    ],
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