<?php

namespace app\modules\sw\modules\lang;

/**
 * lang module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\sw\modules\lang\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public static function config()
    {
        return [
        ];
    }
}
