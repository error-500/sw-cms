<?php

namespace sw\assets\SwUi;

use app\assets\FontAwesome\FontAwesomeAsset;
use app\components\VueApp\assets\VueAsset;
use yii\web\AssetBundle;
use yii\web\View;
use yii\web\YiiAsset;

class SwUiAsset extends AssetBundle
{
    public $sourcePath = __DIR__;

    public $js = [
        [
            'sw.common.js',
            'position' => View::POS_END,
            'type' => 'module',
            'id' => 'sw-ui-jsmodule',
        ],
        [
            'sw.umd.js',
            'position' => View::POS_END,
            'type' => 'text/javascript',
            'id' => 'sw-ui-jslib',
        ],
    ];

    public $css = [
        [
            'sw.umd.js',
            'type' => 'text/javascript',
            'rel' => 'preload',
            'as' => 'script',
        ],
        [
            'sw.common.js',
            'type' => 'module',
            'rel' => 'modulepreload',
            'as' => 'script',
        ],
        [
            'sw.css',
            'type' => 'text/css',
            'media' => 'all',
            'rel' => 'stylesheet',
        ],
    ];

    public $depends = [
        VueAsset::class,
        FontAwesomeAsset::class,
        YiiAsset::class
    ];
}