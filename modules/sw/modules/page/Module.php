<?php

namespace app\modules\sw\modules\page;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\sw\modules\page\controllers';
    public $defaultRoute = 'item';

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

