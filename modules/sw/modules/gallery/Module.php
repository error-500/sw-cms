<?php

namespace app\modules\sw\modules\gallery;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\sw\modules\gallery\controllers';
    public $defaultRoute = 'group';
    // public $layout = 'main';

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

