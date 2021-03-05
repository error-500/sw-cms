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
        $moduleId = explode('-',$this->id);
        Yii::$app->language = \count($moduleId) > 1 ? $this->id : 'ru-RU';
        Yii::$app->db->tablePrefix = \count($moduleId) > 1 ? $moduleId[0].'_' : Yii::$app->db->tablePrefix;


    }
}