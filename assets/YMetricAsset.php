<?php

namespace app\assets;

use Yii;
use yii\web\AssetBundle;
use yii\web\View;

class YMetricAsset extends AssetBundle
{
    public $sourcePath = null;

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);
        $ymId = Yii::$app
        ->sw->getModule('constant')
        ->item(
            'findOne',
            ['tech_name' => 'yandex_counter_id']
        )
        ->value;
        if (!empty($ymId)) {
            $view->registerJs(
                '
                    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                    m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
                    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

                    ym('.$ymId.', "init", {
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true,
                            webvisor:true
                    });
                ',
                View::POS_BEGIN
            );
        }
    }
}