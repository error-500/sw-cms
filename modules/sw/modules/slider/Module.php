<?php

namespace app\modules\sw\modules\slider;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\sw\modules\slider\controllers';
    public $defaultRoute = 'group';

    public function init()
    {
        parent::init();
    }

    public static function config()
    {
        return [
        ];
    }
}

