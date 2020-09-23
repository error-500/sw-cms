<?php

namespace app\controllers;

use Yii;

class SiteController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'about_section' => Yii::$app->sw->getModule('page')->item('findOne', ['tech_name' => 'about_main_page']),
        ]);
    }
}
