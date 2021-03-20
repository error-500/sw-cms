<?php

namespace app\widgets\autonavbarnav;

use Yii;
use yii\bootstrap4\Widget;

class AutoNav extends Widget
{
    public $order = [
        'pages',
        'products',
    ];
    public function run()
    {
        $pages = Yii::$app->getModule('sw')->getModule('page')
            ->item('find')
            ->andWhere(
                ['is not','menu_name', null]
            )
            ->andWhere(
                ['active' => true]
            )
            ->all();
        $products = Yii::$app->getModule('sw')->getModule('product')->group('find')
            ->alias('mg')
            ->andWhere(['mg.parent_id' => null])
            ->andWhere(['mg.active' => true])
            ->joinWith([
                'groups gs' => function($query) {
                    $query->orderBy('gs.pos ASC');
                }
            ])
            ->orderBy('mg.pos ASC')
            ->all();
        return $this->render(
            'nav-menu',
            [
                'order' => $this->order,
                'products' => $products,
                'pages' => $pages
            ]
            );
    }
}