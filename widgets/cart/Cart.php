<?php
namespace app\widgets\cart;

use Yii;

use app\models\Cart as CartModel;

class Cart extends \yii\bootstrap4\Widget
{
    public $full = true;
    public $template = 'cart';

    public function run()
    {

        return $this->render($this->template, [
            'cart' => CartModel::getCart(),
            'full' => $this->full,
        ]);
    }
}
