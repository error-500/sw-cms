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
    public $initLanguage = null;
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        if (!empty($this->initLanguage)) {
            $moduleId = explode('-', $this->initLanguage);
            Yii::$app->language = $this->initLanguage;
            Yii::$app->db->tablePrefix = \count($moduleId) > 1 ? $moduleId[0].'_' : Yii::$app->db->tablePrefix;
            Yii::configure(Yii::$app, ['language' => $this->initLanguage]);
        }
        // custom initialization code goes here
    }
}