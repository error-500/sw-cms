<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;

class MenuController extends \yii\web\Controller
{
    public function actionMenu($menu)
    {
        $menu = Yii::$app->sw->getModule('product')->group('find')
            ->alias('g')
            ->where(['g.tech_name' => $menu])
            ->joinWith([
                'groups' => function($query) {
                    $query->joinWith([
                        'items' => function($query) {
                            $query->orderBy('pos ASC');
                        }, 
                    ]);
                }
            ])
            ->one();


        if (!$menu) {
            throw new NotFoundHttpException('Меню не найдено');
        }

        $view = $menu->parent->tech_name == 'bar' ? 'bar' : 'menu';

        return $this->render($view, [
            'menu' => $menu,
            'page' => Yii::$app->sw->getModule('page')->item('findOne', ['tech_name' => 'menu']),
        ]);
    }
}
