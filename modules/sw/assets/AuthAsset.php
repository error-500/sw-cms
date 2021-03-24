<?php

namespace app\modules\sw\assets;

use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;

class AuthAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900',
        'theme/sw/global_assets/css/icons/icomoon/styles.css',
        //'theme/sw/assets/css/bootstrap.min.css',
        'theme/sw/assets/css/core.min.css',
        'theme/sw/assets/css/components.min.css',
        'theme/sw/assets/css/colors.min.css',
    ];

    public $js = [
        'theme/sw/global_assets/js/plugins/loaders/pace.min.js',
        //'theme/sw/global_assets/js/core/libraries/bootstrap.min.js',
        'theme/sw/global_assets/js/plugins/loaders/blockui.min.js',

        'theme/sw/assets/js/app.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        BootstrapAsset::class,
    ];
}
