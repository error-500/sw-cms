<?php

namespace app\assets\FontAwesome;

use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = __DIR__;

    public $css = [
        'css/font-awesome.min.css',
    ];

    public $js = [];
}