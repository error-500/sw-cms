<?php

namespace app\assets;

use Yii;
use yii\web\AssetBundle;
use yii\web\View;

class FbPixelAsset extends AssetBundle
{
    public $sourcePath = null;

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $fbId = Yii::$app
        ->sw->getModule('constant')
        ->item(
            'findOne',
            ['tech_name' => 'fb_pixel_id']
        );
        if (!empty($fbId)) {
            $view->registerJsFile(
                'https://www.googletagmanager.com/gtag/js?id='.$fbId->value,
                [
                    'async' => true,
                    'position' => View::POS_HEAD,
                ]
            );
            $view->registerJs(
                "!function(f,b,e,v,n,t,s)
                {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '{$fbId->value}');
                fbq('track', 'PageView');",
                View::POS_END
            );
        }
    }
}