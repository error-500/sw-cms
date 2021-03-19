<?php

namespace app\assets;

use Yii;
use yii\web\AssetBundle;
use yii\web\View;

class GoogleTagManagerAsset extends AssetBundle
{
    public $sourcePath = null;

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $gId = Yii::$app
        ->sw->getModule('constant')
        ->item(
            'findOne',
            ['tech_name' => 'google_tag_manager']
        );

        if (!empty($gId)) {
            $view->registerJsFile(
                'https://www.googletagmanager.com/gtm.js?id='.$gId->value,
                [
                    'async' => true,
                    'position' => View::POS_HEAD,
                ]
            );
            $view->registerJs(
                "window.dataLayer = window.dataLayer || [];

                dataLayer.push(
                    {
                        'gtm.start': new Date().getTime(),
                        event:'gtm.js'
                    }
                )",
                View::POS_BEGIN
            );
        }
    }
}