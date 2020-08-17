<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/theme';
    public $baseUrl = '@web/theme';

    public $css = [
        'scripts/bootstrap/css/bootstrap.css',
        'style.css',
        'css/content-box.css',
        'css/image-box.css',
        'css/animations.css',
        'css/components.css',
        'scripts/flexslider/flexslider.css',
        'scripts/magnific-popup.css',
        'scripts/php/contact-form.css',
        'scripts/social.stream.css',
        'skin.css',
        'scripts/iconsmind/line-icons.min.css',
    ];

    public $js = [
        // 'scripts/jquery.min.js',
        // 'scripts/bootstrap/js/bootstrap.min.js',
        'scripts/imagesloaded.min.js',
        'scripts/parallax.min.js',
        'scripts/flexslider/jquery.flexslider-min.js',
        'scripts/isotope.min.js',
        'scripts/php/contact-form.js',
        'scripts/jquery.progress-counter.js',
        'scripts/jquery.tab-accordion.js',
        'scripts/bootstrap/js/bootstrap.popover.min.js',
        'scripts/jquery.magnific-popup.min.js',
        'scripts/social.stream.min.js',
        'scripts/jquery.slimscroll.min.js',
        'scripts/smooth.scroll.min.js',
        'scripts/script.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
