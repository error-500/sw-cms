<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
use app\models\Cart;
use app\models\ContactForm;
//use app\models\ContactForm;
use app\models\ReservatioForm;

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
                    $query->joinWith([
                        'parent sub' => function($query) {
                            $query->joinWith('parent parent')->where(['parent.tech_name' => 'food']);
                        }
                    ]);
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
                    $query->joinWith([
                        'parent sub' => function($query) {
                            $query->joinWith('parent parent')->where(['parent.tech_name' => 'food']);
                        }
                    ]);
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
            throw new NotFoundHttpException('?????????????? ???? ??????????????');
        }

        return $this->render('page', [
            'page' => $page,
        ]);
    }

    public function actionContacts()
    {
        $contactForm = new ContactForm();
        if (Yii::$app->request->isPost) {
            $contactForm->load(Yii::$app->request->post(null, []), '');
            if ($contactForm->send()) {
                $this->redirect('/contacts');
            }
        }
        $contacts_block_text = Yii::$app->sw
            ->getModule('block')
            ->item('findOne', ['tech_name' => 'contacts'])
            ->text ?? '';
        $contacts_block_text = explode('{separate}', $contacts_block_text);

        return $this->render('contacts', [
            'contactForm' => $contactForm,
            'page' => Yii::$app
                ->sw->getModule('page')
                ->item(
                    'findOne',
                    ['tech_name' => 'contacts']
            ),
            'map_constant' => Yii::$app
                ->sw->getModule('constant')
                ->item(
                    'findOne',
                    ['tech_name' => 'map']
                ),
            'contacts_block_text' => $contacts_block_text,
        ]);
    }

    public function actionReservation()
    {
        $form = new ReservatioForm();
        if (Yii::$app->request->isPost) {

            $form->load(Yii::$app->request->post(null, []), '');
            if ( $form->reserv()) {
                $this->redirect('/');
            }
        }

        return $this->render('reservation', [
            'form' => $form,
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

        $show_menu = Yii::$app->sw
                        ->getModule('product')
                        ->item('find')
                        ->where(['is_delivery' => 1]);

        if ($sub_group) {
            $show_menu->andWhere([
                'tech_name' => $sub_group,
            ])->joinWith(['group'])->orderBy('pos ASC');
        } else {
            $show_menu->orderBy('rand()')->limit(9);
        }

        $show_menu_items = $show_menu->all();

        if (!$show_menu_items) {
            throw new NotFoundHttpException('???????? ???? ??????????????');
        }

        return $this->render('delivery', [
            'menu' => $menu,
            'page' => Yii::$app->sw->getModule('page')->item('findOne', ['tech_name' => 'delivery']),
            'show_menu_items' => $show_menu_items,
            'sub_group_name' => $sub_group,
        ]);
    }

    public function actionCheckout()
    {
        $checkout = new Cart;

        if ($checkout->load(Yii::$app->request->post()) && $checkout->send()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            Yii::$app->session->set('cart', []);
            return $this->redirect(['/delivery']);
        }

        return $this->render('checkout', [
            'checkout' => $checkout,
            'cart' => Cart::getCart(),
            'page' => Yii::$app->sw
                            ->getModule('page')
                            ->item('findOne', ['tech_name' => 'checkout']),
        ]);
    }

    public function actionCart()
    {
        $cart_as_grid = Cart::getCartAsGrid();

        if (empty($cart_as_grid)) {
            return $this->redirect(['/delivery']);
        }

        $cart_provider = new ArrayDataProvider([
            'allModels' => $cart_as_grid,
            'sort' => [
                // 'attributes' => ['????????????????????????', '????????', '????????????????????', '??????????'],
            ],
            'pagination' => false
        ]);

        return $this->render('cart', [
            'cart_provider' => $cart_provider,
            'cart' => Cart::getCart(),
            'page' => Yii::$app->sw
                        ->getModule('page')
                        ->item('findOne', ['tech_name' => 'cart']),
        ]);
    }
}