<?php

namespace app\models;

use Yii;
use yii\base\Model;

use app\components\Mail;

class Cart extends Model
{
    public $name;
    public $email;
    public $phone;
    public $address;
    public $floor;
    public $house;
    public $housing;
    public $flat;
    public $comment;

    public function rules()
    {
        return [
            [['name', 'phone', 'address', 'floor', 'house', 'flat'], 'required'],
            [['phone', 'flat', 'floor'], 'integer'],
            [['comment', 'housing'], 'string'],
            // ['name', 'customValidate'],
        ];
    }

    public function customValidate($att)
    {
        if (date('H') < 12 || date('H') >= 22) {
            $this->addError($att, 'Время доставки с 12 до 22 часов');
        }
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'email',
            'phone' => 'Телефон',
            'address' => 'Улица',
            'floor' => 'Этаж',
            'house' => 'Дом',
            'flat' => 'Квартира',
            'housing' => 'Подъезд',
            'comment' => 'Комментарий',
        ];
    }

    public function send()
    {
        if ($this->validate()) {

            $res = Mail::prepare('delivery', [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'floor' => $this->floor,
                'house' => $this->house,
                'flat' => $this->flat,
                'comment' => $this->comment,
                'housing' => $this->housing,
                'cart' => self::getCart(),
            ], 'Форма доставки')->send();

            return true;
        }
        
        return false;
    }

    public static function getCart()
    {
        return Yii::$app->session->get('cart', []);
    }

    public static function getCartAsGrid()
    {
        $cart = self::getCart();

        if (empty($cart)) {
            return [];
        }

        $cart_grid = [];

        foreach ($cart['items'] as $id => $item) {
            $cart_grid[] = [
                'obj' => $item['obj'],
                'Наименование' => $item['obj']->name,
                'Цена' => $item['obj']->price.' ₽',
                'Количество' => $item['count'],
                'Сумма' => $item['obj']->price*$item['count'].' ₽',
            ];
        }

        return $cart_grid;
    }

    public static function addItem($item)
    {
        $cart = self::getCart();

        if (empty($cart['items'][$item->id])) {
            $cart['items'][$item->id]['obj'] = $item;
            $cart['items'][$item->id]['count'] = 1;
        } else {
            $cart['items'][$item->id]['count']++;
        }

        $cart['total'] = empty($cart['total']) ? $item->price : $cart['total']+$item->price;

        Yii::$app->session->set('cart', $cart);
    }

    public static function removeItem($item)
    {
        $cart = self::getCart();

        if (!empty($cart['items'][$item->id])) {
            $cart['items'][$item->id]['obj'] = $item;
            $cart['items'][$item->id]['count']--;

            if ($cart['items'][$item->id]['count'] <= 0) {
                unset($cart['items'][$item->id]);
            }
            
            $cart['total'] = empty($cart['total']) ? $item->price : $cart['total']-$item->price;

            if (empty($cart['items'])) {
                $cart = [];
            }
        }

        Yii::$app->session->set('cart', $cart);
    }

    public static function getTotal()
    {
        $cart = self::getCart();

        if (empty($cart['items'])) {
            $cart['items'][$item->id]['obj'] = $item;
            $cart['items'][$item->id]['count'] = 1;
            
            $cart['total'] = empty($cart['total']) ? $item->price : $cart['total']+$item->price;
        }

        Yii::$app->session->set('cart', $cart);
    }

    public static function getCount()
    {
        $cart = self::getCart();

        if (empty($cart)) {
            return;
        }

        return array_sum(array_column($cart['items'], 'count'));
    }
}
