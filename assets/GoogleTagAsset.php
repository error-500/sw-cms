<?php

namespace app\assets;

use Yii;
use yii\web\AssetBundle;
use yii\web\View;

class GoogleTagAsset extends AssetBundle
{
    public $sourcePath = null;

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $gId = Yii::$app
        ->sw->getModule('constant')
        ->item(
            'findOne',
            ['tech_name' => 'google_tag_id']
        );

        if (!empty($gId)) {
            $view->registerJsFile(
                'https://www.googletagmanager.com/gtag/js?id='.$gId->value,
                [
                    'async' => true,
                    'position' => View::POS_HEAD,
                ]
            );
            $view->registerJs(
                "window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', '{$gId->value}');",
                View::POS_END
            );
        }
    }
}