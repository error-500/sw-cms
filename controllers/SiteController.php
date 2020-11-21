<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;

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

        $random_delivery_menu = Yii::$app->sw->getModule('product')->item('find')
            ->joinWith([
                'group' => function($query) {
                    $query->joinWith('parent pt')->where(['pt.tech_name' => 'food']);
                }
            ])
            ->where(['is_delivery' => 1])
            ->orderBy('rand()')
            ->limit(6)
            ->all();

        $contacts_block_text = Yii::$app->sw->getModule('block')->item('findOne', ['tech_name' => 'contacts'])->text ?? '';
        $contacts_block_text = explode('{separate}', $contacts_block_text);

        $menu_random = Yii::$app->sw->getModule('product')->item('find')
            ->joinWith([
                'group' => function($query) {
                    $query->joinWith('parent pt')->where(['pt.tech_name' => 'food']);
                }
            ])
            ->limit(10)
            ->orderBy('RAND()')
            ->all();

        $menu_random = Yii::$app->sw->getModule('product')->item('find')
            ->joinWith([
                'group' => function($query) {
                    $query->joinWith('parent pt')->where(['pt.tech_name' => 'food']);
                }
            ])
            ->limit(10)
            ->orderBy('RAND()')
            ->all();


        return $this->render('index', [
            'page' => Yii::$app->sw->getModule('page')->item('findOne', ['tech_name' => 'main']),
            'video_block' => Yii::$app->sw->getModule('block')->item('findOne', ['tech_name' => 'video_main_page']),
            'about_block' => Yii::$app->sw->getModule('block')->item('findOne', ['tech_name' => 'about_main_page']),
            'our_place_slider' => Yii::$app->sw->getModule('slider')->group('findOne', ['tech_name' => 'our_place_main_page']),
            'menu_random_block_text' => $menu_random_block_text,
            'menu_random' => $menu_random,
            'quotes_slider' => Yii::$app->sw->getModule('slider')->group('findOne', ['tech_name' => 'quotes_main_page']),
            'chefs_main_block_file' => Yii::$app->sw->getModule('file_manager')->item('findOne', ['tech_name' => 'quote_main_page']),
            'chefs_main_block' => Yii::$app->sw->getModule('block')->item('findOne', ['tech_name' => 'chefs_main_page']),
            'delivery_slider' => Yii::$app->sw->getModule('slider')->group('findOne', ['tech_name' => 'delivery_main_page']),
            'map_constant' => Yii::$app->sw->getModule('constant')->item('findOne', ['tech_name' => 'map']),
            'random_delivery_menu' => $random_delivery_menu,
            'contacts_block_text' => $contacts_block_text,
        ]);
    }

    public function actionPage($name)
    {
        $page = Yii::$app->sw->getModule('page')->item('findOne', ['tech_name' => $name]);

        if (!$page) {
            throw new NotFoundHttpException('Станица не найдена');
        }

        return $this->render('page', [
            'page' => $page,
        ]);
    }

    public function actionContacts()
    {
        $contacts_block_text = Yii::$app->sw->getModule('block')->item('findOne', ['tech_name' => 'contacts'])->text ?? '';
        $contacts_block_text = explode('{separate}', $contacts_block_text);

        return $this->render('contacts', [
            'page' => Yii::$app->sw->getModule('page')->item('findOne', ['tech_name' => 'contacts']),
            'map_constant' => Yii::$app->sw->getModule('constant')->item('findOne', ['tech_name' => 'map']),
            'contacts_block_text' => $contacts_block_text,
        ]);
    }

    public function actionReservation()
    {
        return $this->render('reservation', [
            'page' => Yii::$app->sw->getModule('page')->item('findOne', ['tech_name' => 'reservation']),
            'reservation_block' => Yii::$app->sw->getModule('block')->item('findOne', ['tech_name' => 'reservation']),
            'map_constant' => Yii::$app->sw->getModule('constant')->item('findOne', ['tech_name' => 'map']),
        ]);
    }

    public function actionDelivery($sub_group = null)
    {
        $menu = Yii::$app->sw->getModule('product')->group('find')
            ->where(['it.is_delivery' => 1])
            ->joinWith([
                'groups g2' => function($query) {
                    $query->where(['it.is_delivery' => 1])->joinWith([
                        'items it' => function($query) {
                            $query->orderBy('pos ASC');
                        }, 
                        'parent p2'
                    ])->indexBy('tech_name');
                }
            ])
            ->all();

        $show_menu = Yii::$app->sw->getModule('product')->item('find')->where(['is_delivery' => 1]);

        if ($sub_group) {
            $show_menu->andWhere([
                'tech_name' => $sub_group,
            ])->joinWith(['group'])->orderBy('pos ASC');
        } else {
            $show_menu->orderBy('rand()')->limit(9);
        }

        $show_menu_items = $show_menu->all();

        if (!$show_menu_items) {
            throw new NotFoundHttpException('Меню не найдено');
        }

        return $this->render('delivery', [
            'menu' => $menu,
            'page' => Yii::$app->sw->getModule('page')->item('findOne', ['tech_name' => 'delivery']),
            'show_menu_items' => $show_menu_items,
            'sub_group_name' => $sub_group,
        ]);
    }

    public function actionDelivery2($menu = null)
    {
        if ($menu) {
            $group = Yii::$app->sw->getModule('product')->group('find')
                ->where([
                    'it.is_delivery' => 1,
                    'sw_product_group.tech_name' => $menu,
                ])
                ->joinWith([
                    'groups g2' => function($query) {
                        $query->joinWith([
                            'items it' => function($query) {
                                $query->orderBy('it.pos ASC');
                            }, 
                        ])->indexBy('tech_name');
                    }
                ])
                ->one();

            if (!$group) {
                throw new NotFoundHttpException('Меню не найдено');
            }
        } else {
            $random_items = Yii::$app->sw->getModule('product')->item('find')
                ->where(['is_delivery' => 1])
                ->orderBy('rand()')
                ->limit(9)
                ->all();
        }

        return $this->render('delivery', [
            'group' => $group ?? null,
            'random_items' => $random_items ?? null,
        ]);
    }
}
