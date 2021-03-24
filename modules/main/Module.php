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
        Yii::info(Yii::t('yii', 'Init module: {0}', [$this->uniqueId]));
        if (!empty($this->initLanguage)) {

            $moduleId = explode('-', $this->initLanguage);
            Yii::$app->language = $this->initLanguage;
            Yii::info(Yii::t('yii', 'Module {0} - set app language: {1}', [$this->uniqueId, $this->initLanguage]));

            Yii::$app->db->tablePrefix = \count($moduleId) > 1 ? $moduleId[0].'_' : Yii::$app->db->tablePrefix;
            Yii::info(
                Yii::t(
                    'yii',
                    'Module {0}: dbPrefix - {1}, appLanguage - {2}',
                    [
                        $this->uniqueId,
                        Yii::$app->db->tablePrefix,
                        Yii::$app->language
                    ]
                )
            );
        }


        // custom initialization code goes here
    }
    public function beforeAction($action)
    {
        //Yii::$app->language = $this->initLanguage;
        Yii::info(
                Yii::t(
                    'yii',
                    'Module {0} before {3}: dbPrefix - {1}, appLanguage - {2}',
                    [
                        $this->uniqueId,
                        Yii::$app->db->tablePrefix,
                        Yii::$app->language,
                        $action->uniqueId,
                    ]
                )
            );
        return parent::beforeAction($action);
    }
}