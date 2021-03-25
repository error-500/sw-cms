<?php

namespace main\helpers;

use Yii;
use yii\base\Module;
use yii\web\Application;

class AutoUrl
{
    public static function rootModuleId(Module $module = null)
    {
        $currentModule = !empty($module) ? $module: Yii::$app->controller->module;
        Yii::info(Yii::t('yii', 'Module {0} is submodule of {1}', [$currentModule->id, !empty($currentModule->module) ? $currentModule->module->id: 'null']));
        if(!empty($currentModule->module) && !($currentModule->module instanceof Application)) {
            return self::rootModuleId($currentModule->module);
        }
        return $currentModule->uniqueId;
    }
    public static function getLanguageSection(Module $module = null)
    {
        $currentLangMod = !empty($module) ? $module : Yii::$app->controller->module;
        if ( !isset($currentLangMod->initLanguage)
            && !empty($currentLangMod->module)
            && !($currentLangMod->module instanceof Application)
            ){
                return self::getLanguageSection($currentLangMod->module);
        }
        return !isset($currentLangMod->initLanguage) ? null : $currentLangMod->initLanguage;
    }
}