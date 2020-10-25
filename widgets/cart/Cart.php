<?php
namespace app\widgets\cart;

use Yii;

use app\models\Cart as CartModel;

class Cart extends \yii\bootstrap\Widget
{
    public $full = true;

    public function run()
    {
        $cart = CartModel::getCart();

        return $this->render('cart', [
            'cart' => $cart,
            'full' => $this->full,
        ]);
    }
}
