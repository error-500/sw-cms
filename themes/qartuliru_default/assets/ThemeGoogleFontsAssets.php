<?php

namespace app\themes\qartuliru_default\assets;

use yii\web\AssetBundle;

class ThemeGoogleFontsAssets extends AssetBundle
{
    public $sourcePath = null;
    public $css = [
        [
            '//fonts.googleapis.com/css?family=Montserrat:400,300,100,500,700,900',
            'rel' => 'stylesheet',
        ],
        [
            '//fonts.googleapis.com/css?family=Merriweather:400,300,100,500,700,900',
            'rel' => 'stylesheet',
        ],
        [
            '//fonts.googleapis.com/css?family=Marck Script:400,300,100,500,700,900',
            'rel' => 'stylesheet',
        ],
    ];
}