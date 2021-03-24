<?php

namespace app\modules\sw;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\sw\controllers';
    public $defaultRoute = 'dashboard';
    public $layout = 'main';
    public $initLanguage = null;

    public function init()
    {
        parent::init();
        $modules = Json::decode(
                    file_get_contents(__DIR__ . '/config/modules.json'),
                    true
                );

        Yii::configure($this, $modules);

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
    }
}
