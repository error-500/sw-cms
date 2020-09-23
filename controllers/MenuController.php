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

        return $this->render('menu', [
            'menu' => $menu
        ]);
    }
}
