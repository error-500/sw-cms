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
        $menu_random_block_text = Yii::$app->sw->getModule('block')->item('findOne', ['tech_name' => 'menu_random_main_page'])->text ?? '';
        $menu_random_block_text = explode('{separate}', $menu_random_block_text);

        return $this->render('index', [
            'page' => Yii::$app->sw->getModule('page')->item('findOne', ['tech_name' => 'main']),
            'video_block' => Yii::$app->sw->getModule('block')->item('findOne', ['tech_name' => 'video_main_page']),
            'about_block' => Yii::$app->sw->getModule('block')->item('findOne', ['tech_name' => 'about_main_page']),
            'our_place_slider' => Yii::$app->sw->getModule('slider')->group('findOne', ['tech_name' => 'our_place_main_page']),
            'menu_random_block_text' => $menu_random_block_text,
            'menu_random' => Yii::$app->sw->getModule('product')->item('find')->limit(10)->orderBy('RAND()')->all(),
            'quotes_slider' => Yii::$app->sw->getModule('slider')->group('findOne', ['tech_name' => 'quotes_main_page']),
            'chefs_main_block_file' => Yii::$app->sw->getModule('file_manager')->item('findOne', ['tech_name' => 'quote_main_page']),
            'chefs_main_block' => Yii::$app->sw->getModule('block')->item('findOne', ['tech_name' => 'chefs_main_page']),
            'delivery_slider' => Yii::$app->sw->getModule('slider')->group('findOne', ['tech_name' => 'delivery_main_page']),
        ]);
    }
}
