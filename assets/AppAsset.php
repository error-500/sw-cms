<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/theme/main';
    public $baseUrl = '@web/theme/main';

    public $css = [
        'scripts/bootstrap/css/bootstrap.css',
        'style.css',
        'css/content-box.css',
        'css/animations.css',
        'css/components.css',
        'css/image-box.css',
        'scripts/php/contact-form.css',
        'skin.css',
        'scripts/iconsmind/line-icons.min.css',
        'scripts/flexslider/flexslider.css',
        'scripts/social.stream.css',
        'scripts/magnific-popup.css',
    ];

    public $js = [
        'scripts/jquery.min.js',
        'scripts/script.js',
        'scripts/parallax.min.js',
        'scripts/flexslider/jquery.flexslider-min.js',
        'scripts/bootstrap/js/bootstrap.min.js',
        'scripts/imagesloaded.min.js',
        'scripts/isotope.min.js',
        'scripts/jquery.twbsPagination.min.js',
        'scripts/jquery.tab-accordion.js',
        'scripts/smooth.scroll.min.js',
        'scripts/social.stream.min.js',
        'scripts/php/contact-form.js',
        'scripts/jquery.progress-counter.js',
        'scripts/jquery.slimscroll.min.js',
    ];

    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
