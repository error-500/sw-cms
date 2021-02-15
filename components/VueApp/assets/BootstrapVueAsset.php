<?php

namespace app\components\VueApp\assets;

use Yii;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\View;

class BootstrapVueAsset extends AssetBundle
{
    public $js = [
        [
            '//polyfill.io/v3/polyfill.min.js?features=es2015%2CIntersectionObserver',
            'position' => View::POS_HEAD,
            'crossorigin' => 'anonimus',
        ],
        [
            '//unpkg.com/vue@latest/dist/vue.js',
            'position' => View::POS_END,
        ],
        [
            '//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js',
            'position' => View::POS_END,
        ],
        [
            '//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.js',
            'position' => View::POS_END,
        ]
    ];

    public $css = [
        [
            '//unpkg.com/vue@latest/dist/vue.js',
            'position' => View::POS_HEAD,
            'rel' => 'preload',
            'as' => 'script',
        ],
        [
            '//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js',
            'position' => View::POS_HEAD,
            'rel' => 'preload',
            'as' => 'script',
        ],
        /*[
            '//unpkg.com/bootstrap/dist/css/bootstrap.min.css',
            'position' => View::POS_HEAD,
            'rel' => 'stylesheet',
            'type' => 'text/css',
        ],*/
        [
            '//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css',
            'position' => View::POS_HEAD,
            'rel' => 'stylesheet',
            'type' => 'text/css',
        ]
    ];
    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);
        /*
            foreach ($this->linkTags as $linkTag) {
            $view->registerLinkTag(
                [
                    'href'  => $this->baseUrl.'/'.$linkTag,
                    'rel'   => 'prefetch',
                    'class' => 'vue-asset',
                ]
            );
        }*/

        $view->registerJs(
            'window.bundleUrl = "'.$this->baseUrl.'/";',
            \yii\web\View::POS_HEAD
        );
        if (!isset($view->js[\yii\web\View::POS_END]['vue-app-init'])) {
            /*
                $view->registerJs(
                file_get_contents(__DIR__ . '/js/app.init.js'),
                \yii\web\View::POS_END,
                'vue-app-init'
                /*
                * @todo После кода запуска открытие коментария не требуется - используем
                 * ключ vue-app-init для перезаписи приложения по умолчанию
                * *
            );*/
            Yii::$app->vueApp->mounted = [
                '$.holdReady(false);',
            ];
            $view->registerJs(
                "$.holdReady(true);".
                Yii::$app->vueApp,
                View::POS_END,
                'vue-app-init'
            );
        }

        // var_dump($view->js) & exit();

    }
    public $depends = [
        BootstrapAsset::class,
    ];
}