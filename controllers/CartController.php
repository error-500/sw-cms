<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\Response;

use app\widgets\cart\Cart as CartWidget;
use app\models\Cart as CartModel;
use yii\helpers\Json;

class CartController extends \yii\web\Controller
{
    public function actionAdd($id, $refresh = false)
    {
        $item = Yii::$app->sw
            ->getModule('product')
            ->item(
                'findOne',
                [
                    'id' => $id,
                    'is_delivery' => 1
                ]
            );

        if ($item) {
            CartModel::addItem($item);
        }

        if ($refresh) {
            $this->redirect('/site/cart');
        } else {
            if (Yii::$app->request->isAjax) {
                return Json::encode(
                    [
                        'total' => CartModel::getCount(),
                        'cart' => (new CartModel())->toArray(),
                    ]
                );
            }
        }

        Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'full' => CartWidget::widget(),
            'mobile' => CartWidget::widget(['full' => false]),
        ];
    }

    public function actionRemove($id, $refresh = false)
    {
        $item = Yii::$app->sw
            ->getModule('product')
            ->item(
                'findOne',
                ['id' => $id, 'is_delivery' => 1]
            );

        if ($item) {
            CartModel::removeItem($item);
        }
        if (Yii::$app->request->isAjax) {
            return Json::encode(
                [
                    'total' => CartModel::getCount(),
                    'cart' => (new CartModel())->toArray(),
                ]
            );
        }
        if ($refresh) {
            $this->redirect('/site/cart');
        }

        return CartWidget::widget();
    }
    public function actionClear($id = null)
    {
        if(!empty($id) && $item = Yii::$app->sw
            ->getModule('product')
            ->item(
                'findOne',
                ['id' => $id, 'is_delivery' => 1]
            ))
        {
            CartModel::removeItem($item);
        } else {
            CartModel::clearCart();
        }
    }
}