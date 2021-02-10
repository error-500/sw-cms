<?php

namespace app\widgets\ymetric;

use Yii;
use yii\bootstrap4\Html;
use yii\bootstrap4\Widget;

class YMetricWidget extends Widget
{
    public function run() {
        $ymId = Yii::$app
        ->sw->getModule('constant')
        ->item(
            'findOne',
            ['tech_name' => 'yandex_counter_id']
        );
        if (!empty($ymId)) {
            return Html::beginTag('noscript')
                .Html::img('https://mc.yandex.ru/watch/'.$ymId->value, ['style' => 'position:absolute; left:-9999px;'])
                .Html::endTag('noscript');
        }
    }
}