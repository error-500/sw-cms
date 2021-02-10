<?php

namespace app\widgets\fbpixel;

use Yii;
use yii\bootstrap4\Html;
use yii\bootstrap4\Widget;

class FbPixelWidget extends Widget
{

    public function run()
    {
        $fbId = Yii::$app
        ->sw->getModule('constant')
        ->item(
            'findOne',
            ['tech_name' => 'fb_pixel_id']
        );
        if (!empty($fbId)) {
            return Html::beginTag('noscript')
                .Html::img(
                    "https://www.facebook.com/tr?id={$fbId->value}&ev=PageView&noscript=1",
                    [
                        'height' => 1,
                        'width'  => 1,
                        'style' => 'display: none'
                    ]
                )
                .Html::endTag('noscript');
        }
    }
}