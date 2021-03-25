<?php

namespace sw\modules\block;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'sw\modules\block\controllers';
    public $defaultRoute = 'item';

    public function init()
    {
        parent::init();
    }

    public function item($method, $params = null)
    {
        return call_user_func([__NAMESPACE__.'\models\\Item', $method], $params);
    }

    public static function config()
    {
        return [
        ];
    }
}