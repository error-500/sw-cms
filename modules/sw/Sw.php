<?php

namespace app\modules\sw;

use Yii;

class Sw
{
    public function getModule($module)
    {
        return Yii::$app->getModule('sw')->getModule($module);
    }
}
