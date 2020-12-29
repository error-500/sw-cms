<?php

namespace app\themes\qartuliru_default\assets;

use yii\web\AssetBundle;
use yii\web\View;

class YandexMetricAsset extends AssetBundle
{
    public $sourcePath = __DIR__;
    public $js = [
        [
            'src/ym-goals.js',
            'position' => View::POS_READY
        ]
    ];
    public $depends = [
        'app\modules\sw\assets\CdnYandex',
    ];
}