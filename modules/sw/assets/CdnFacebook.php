<?php

namespace app\modules\sw\assets;

use Yii;
use yii\web\View;
use yii\web\AssetBundle;

class CdnFacebook extends AssetBundle
{
    public $js = [
        'https://connect.facebook.net/en_US/fbevents.js'
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);
        $fbId = Yii::$app->sw->getModule('constants')
            ->item(
                'findOne',
                ['tech_name' => 'fb-pixel-id']
            ) ?? null;
        if (!empty($fbId)) {
            $view->registerJs(
                "(function(){
                    fbq('init', '$fbId');
                    fbq('track', 'PageView');
                })();",
                View::POS_BEGIN,
                'fb'
            );
        }
    }
}
