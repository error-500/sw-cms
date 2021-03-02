<?php

namespace app\modules\sw;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\sw\controllers';
    public $defaultRoute = 'dashboard';
    public $layout = 'main';

    public function init()
    {
        parent::init();

        $modules = json_decode(file_get_contents(__DIR__ . '/config/modules.json'), 1);
        Yii::configure($this, $modules);
    }
}
