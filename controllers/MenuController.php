<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;

class MenuController extends \yii\web\Controller
{
    public function actionMenu($menu)
    {
        $group = Yii::$app->sw->getModule('product')
            ->group('find')
            ->andWhere(['tech_name' => $menu,])
            ->andWhere(['active' => true])
            ->one();

        if ($group->parent->tech_name == 'food') {
            return $this->showMenu($menu, $group);
        } else if ($group->parent->tech_name == 'bar') {
            return $this->showBar($menu);
        } else {
            throw new NotFoundHttpException('Меню не найдено');
        }
    }

    public function showMenu($menu, $group)
    {
        $items = Yii::$app->sw->getModule('product')
            ->item('find')
            ->andWhere(['p.tech_name' => $menu])
            ->andWhere(['p.active' => true])
            ->joinWith([
                'group' => function($query) {
                    $query->alias('g')
                    ->andWhere(['g.active' => true]);
                    $query->joinWith([
                        'parent' => function($query) {
                            $query->alias('p')->orderBy('pos ASC');
                        },
                    ]);
                }
            ])
            ->all();

        if (!$items) {
            throw new NotFoundHttpException('Меню не найдено');
        } else {
            $groups_id = array_column($items, 'group_id');
            $groups = Yii::$app->sw->getModule('product')
                ->group('find')
                ->andWhere(['id' => $groups_id])
                ->andWhere(['active' => true])
                ->all();
        }

        return $this->render('menu', [
            'items' => $items,
            'groups' => $groups,
            'group' => $group,
            'page' => Yii::$app->sw->getModule('page')
                ->item(
                    'findOne',
                    [
                        'and',
                        [
                        'tech_name' => 'menu',
                        'active' => true,
                        ],
                    ]
                ),
        ]);
    }

    public function showBar($menu)
    {
        $group = Yii::$app->sw->getModule('product')->group('find')
            ->alias('g')
            ->andWhere(['g.tech_name' => $menu])
            ->andWhere(['g.active' => true])
            ->joinWith([
                'groups' => function($query) {
                    $query->joinWith([
                        'items i' => function($query) {
                            $query->where(['not', ['i.id' => null]])->orderBy('pos ASC');
                        },
                    ]);
                }
            ])
            ->one();

        if (!$group) {
            throw new NotFoundHttpException('Меню не найдено');
        }

        return $this->render('bar', [
            'menu' => $group,
            'page' => Yii::$app->sw->getModule('page')
            ->item(
                'findOne',
                [
                    'and',
                    [
                        'tech_name' => 'menu',
                        'active' => true,
                    ]
                ]
            ),
        ]);
    }
}