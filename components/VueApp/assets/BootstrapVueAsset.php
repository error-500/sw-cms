<?php

namespace app\components\VueApp\assets;

use Yii;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\View;

class BootstrapVueAsset extends AssetBundle
{
    public $js = [
        /*[
            '//polyfill.io/v3/polyfill.min.js?features=es2015%2CIntersectionObserver',
            'position' => View::POS_HEAD,
            'crossorigin' => 'anonimus',
        ],
        [
            '//unpkg.com/vue@latest/dist/vue.js',
            'position' => View::POS_END,
        ],*/
        [
            '//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js',
            'position' => View::POS_END,
        ],
        [
            '//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.js',
            'position' => View::POS_END,
        ],

    ];

    public $css = [
        /* [
            '//unpkg.com/vue@latest/dist/vue.js',
            'position' => View::POS_HEAD,
            'rel' => 'preload',
            'as' => 'script',
        ],*/
        [
            '//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js',
            'position' => View::POS_HEAD,
            'rel' => 'preload',
            'as' => 'script',
        ],
       [
            '//unpkg.com/bootstrap/dist/css/bootstrap.min.css',
            'position' => View::POS_HEAD,
            'rel' => 'stylesheet',
            'type' => 'text/css',
        ],
        [
            '//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css',
            'position' => View::POS_HEAD,
            'rel' => 'stylesheet',
            'type' => 'text/css',
        ]
    ];

    public $depends = [
        VueAsset::class,
    ];
}