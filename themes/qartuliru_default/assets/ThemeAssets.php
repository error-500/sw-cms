<?php

namespace app\themes\qartuliru_default\assets;

use app\assets\GoogleTagAsset;
use app\assets\GoogleTagManagerAsset;
use app\assets\YMapAsset;
use app\assets\YMetricAsset;
use app\components\VueApp\assets\BootstrapVueAsset;
use app\themes\qartuliru_default\assets\SwQartuliAsset;
use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\View;

class ThemeAssets extends AssetBundle
{
    public $sourcePath = __DIR__;
    public $css = [
        //'scripts/bootstrap/css/bootstrap.css',
        'css/style.css',
        'css/content-box.css',
        'css/animations.css',
        'css/components.css',
        'css/image-box.css',
        'css/contact-form.css',
        'css/skin.css',
        'js/iconsmind/line-icons.min.css',
        'js/flexslider/flexslider.css',
        'css/social.stream.css',
        //'scripts/magnific-popup.css',
        'css/font-awesome.min.css',
        'css/custom.css',
        // '../../css/icomoon.css',
        [
            'js/script.js',
            'type' => 'text/javascript',
            'rel' => 'preload',
            'as' => 'script',
        ],
        [
            'js/source/parallax.js',
            'type' => 'text/javascript',
            'rel' => 'preload',
            'as' => 'script',
        ],
         [
            'js/flexslider/jquery.flexslider-min.js',
            'type' => 'text/javascript',
            'rel' => 'preload',
            'as' => 'script',
        ],
        /*[
            'js/imagesloaded.min.js',
            'type' => 'text/javascript',
            'rel' => 'preload',
            'as' => 'script',
        ],
        [
            'js/isotope.min.js',
            'type' => 'text/javascript',
            'rel' => 'preload',
            'as' => 'script',
        ],
        [
            'js/jquery.twbsPagination.min.js',
            'type' => 'text/javascript',
            'rel' => 'preload',
            'as' => 'script',
        ],*/
        /*[
            'js/jquery.tab-accordion.js',
            'type' => 'text/javascript',
            'rel' => 'preload',
            'as' => 'script',
        ],
        [
            'js/social.stream.min.js',
            'type' => 'text/javascript',
            'rel' => 'preload',
            'as' => 'script',
        ],
        [
            'js/contact-form.js',
            'type' => 'text/javascript',
            'rel' => 'preload',
            'as' => 'script',
        ],
        [
            'js/jquery.progress-counter.js',
            'type' => 'text/javascript',
            'rel' => 'preload',
            'as' => 'script',
        ],
        [
            'js/jquery.slimscroll.min.js',
            'type' => 'text/javascript',
            'rel' => 'preload',
            'as' => 'script',
        ],*/
        [
            'js/custom.js',
            'type' => 'text/javascript',
            'rel' => 'preload',
            'as' => 'script',
        ],
    ];

    public $js = [
        //'scripts/jquery.min.js',
        //'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js',
        [
            'js/script.js',
            'position' => View::POS_END,
            'type' => 'text/javascript'
        ],
        [
            'js/source/parallax.js',
            'position' => View::POS_END,
            'type' => 'text/javascript'
        ],
        [
            'js/flexslider/jquery.flexslider-min.js',
            'position' => View::POS_END,
            'type' => 'text/javascript'
        ],
        // 'scripts/parallax.min.js',
        //'js/flexslider/jquery.flexslider-min.js',
        // 'scripts/bootstrap/js/bootstrap.min.js',

        /*[
            'js/imagesloaded.min.js',
            'position' => View::POS_END,
            'type' => 'text/javascript'
        ],
        [
            'js/isotope.min.js',
            'position' => View::POS_END,
            'type' => 'text/javascript'
        ],
        [
            'js/jquery.twbsPagination.min.js',
            'position' => View::POS_END,
            'type' => 'text/javascript'
        ],*/
        /*[
            'js/jquery.tab-accordion.js',
            'position' => View::POS_END,
            'type' => 'text/javascript'
        ],
        //'scripts/smooth.scroll.min.js',
        [
            'js/social.stream.min.js',
            'position' => View::POS_END,
            'type' => 'text/javascript'
        ],
        [
            'js/contact-form.js',
            'position' => View::POS_END,
            'type' => 'text/javascript'
        ],
        [
            'js/jquery.progress-counter.js',
            'position' => View::POS_END,
            'type' => 'text/javascript'
        ],
        [
            'js/jquery.slimscroll.min.js',
            'position' => View::POS_END,
            'type' => 'text/javascript'
        ],*/
        [
            'js/custom.js',
            'position' => View::POS_END,
            'type' => 'text/javascript'
        ],
        // 'https://kit.fontawesome.com/d758724557.js',
        // 'https://unpkg.com/ionicons@5.2.3/dist/ionicons.js',
    ];

    public $depends = [
        ThemeGoogleFontsAssets::class,
        //BootstrapAsset::class,
        BootstrapPluginAsset::class,
        YMetricAsset::class,
        //YMapAsset::class,
        GoogleTagAsset::class,
        GoogleTagManagerAsset::class,
        JqueryAsset::class,
        BootstrapVueAsset::class,
        SwQartuliAsset::class,
    ];
}