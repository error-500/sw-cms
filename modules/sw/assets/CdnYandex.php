<?php

namespace app\modules\sw\assets;

use Yii;
use yii\web\AssetBundle;
use yii\web\View;

class CdnYandex extends AssetBundle
{
    public $js = [
        [
            'https://mc.yandex.ru/metrika/tag.js',
            'position' => View::POS_HEAD,
            'async' => true,
        ]
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);
        $yandexId = Yii::$app->sw->getModule('constant')
            ->item(
                'findOne',
                ['tech_name' => 'yandex_counter_id']
            )->value ?? null;
        if (!empty($yandexId)) {
            $view->registerJs(
                "
                (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                    m[i].l=1*new Date();})
                (window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js', 'ym');
                (function(){
                    document.yandexId = Number($yandexId);
                    ym($yandexId, 'init', {
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                })();",
                View::POS_BEGIN,
                'ym'
            );
        }
    }
}
