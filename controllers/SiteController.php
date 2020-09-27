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
            'about' => Yii::$app->sw->getModule('block')->item('findOne', ['tech_name' => 'about_main_page']),
            'video' => Yii::$app->sw->getModule('block')->item('findOne', ['tech_name' => 'main_page_video']),
            'work_time' => Yii::$app->sw->getModule('block')->item('findOne', ['tech_name' => 'work_time']),
            'our_place' => Yii::$app->sw->getModule('slider')->group('findOne', ['tech_name' => 'our_place_main']),
        ]);
    }
}
