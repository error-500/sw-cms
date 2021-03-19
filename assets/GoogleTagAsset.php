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

        $gTags = Yii::$app
        ->sw->getModule('constant')
        ->item('find')
        ->andWhere(
            ['like', 'tech_name', 'google_tag']
        )->all();

        foreach($gTags as $gId):
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
        endforeach;
    }
}