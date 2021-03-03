<?php

namespace app\modules\main;

use Yii;
use yii\base\Component;

/**
 * main module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\main\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $moduleId = explode('-',$this->id);
        Yii::$app->language = \count($moduleId) > 1 ? $this->id : 'ru-RU';
        Yii::$app->db->tablePrefix = \count($moduleId) > 1 ? $moduleId[0].'_' : Yii::$app->db->tablePrefix;
        parent::init();

        // custom initialization code goes here
    }
}