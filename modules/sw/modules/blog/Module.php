<?php

namespace app\modules\sw\modules\blog;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\sw\modules\blog\controllers';
    public $defaultRoute = 'group';

    public function init()
    {
        parent::init();
    }

    public function group($method, $params = null)
    {
        return call_user_func([__NAMESPACE__.'\models\\Group', $method], $params);
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
