<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class YMapAsset extends AssetBundle
{
    public $sourcePath = null;

    public $css = [
        /*[
           'https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A1908b4ce1f461cce505bea4a923f4037aa5ab700ed5f67b6ed63e96ce79f97a8&amp;width=100%25&amp;height=450&amp;lang=ru_RU&amp;scroll=true',
           'type' => 'text/javascript',
           'as' => 'script',
           'rel' => 'preload',
        ],*/
        [
           '//unpkg.com/vue-yandex-maps',
           'type' => 'text/javascript',
           'as' => 'script',
           'rel' => 'preload',
        ],
    ];

    public $js = [
        /*[
           'https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A1908b4ce1f461cce505bea4a923f4037aa5ab700ed5f67b6ed63e96ce79f97a8&amp;width=100%25&amp;height=450&amp;lang=ru_RU&amp;scroll=true',
           'charset' => 'utf-8',
           'async' => true,
           'position' => View::POS_END,
        ],*/
        [
           '//unpkg.com/vue-yandex-maps',
           'charset' => 'utf-8',
           'async' => true,
           'position' => View::POS_END,
        ],
    ];
}