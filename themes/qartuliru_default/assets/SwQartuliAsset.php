<?php

namespace app\themes\qartuliru_default\assets;

use yii\web\AssetBundle;
use yii\web\View;

class SwQartuliAsset extends AssetBundle
{
    public $sourcePath = __DIR__;

    public $css = [
        [
            'sw.css',
            'type' => 'text/css',
            'media' => 'all',
            'rel' => 'stylesheet',
        ],
        [
            'sw.umd.js',
            'type' => 'text/javascript',
            'rel' => 'preload',
            'as' => 'script',
        ],
        [
            'sw.common.js',
            'type' => 'module',
            'rel' => 'preload',
            'as' => 'script',
        ]
    ];

    public $js = [
        [
            'sw.umd.js',
            'type' => 'text/javascript',
            'position' => View::POS_END,
        ],
        /*[
            'sw.common.js',
            'type' => 'module',
            'position' => View::POS_END,
        ],*/
    ];
}