<?php

namespace app\models;

use app\components\Mail;
use DateTime;
use Yii;
use yii\base\Model;

class ReservatioForm extends Model
{
    public $checkin = null;
    public $time = null;
    public $guests = 1;
    public $name = "";
    public $email = "";
    public $phone = "";
    public $message = "";

    public function rules()
    {
        return [
            [
                [
                    'checkin',
                    'time',
                    'guests',
                    'name',
                    'email',
                    'phone',
                ],
                'required'
            ],
            [['message'], 'string', 'skipOnError' => true],
            [
                ['checkin'], 'date', 'format' => 'yyyy-M-dd'
            ],
            [
                ['time'], 'safe'
            ],
            [['email'], 'email'],
            [['phone'], 'phone']
        ];
    }
    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => [
                'checkin',
                'time',
                'guests',
                'name',
                'email',
                'phone',
                'message',
            ],
        ];
    }
    public function  fields()
    {
        return [
                    'checkin',
                    'time',
                    'guests',
                    'name',
                    'email',
                    'phone',
                    'message',
        ];
    }
    public function reserv()
    {
        if ($this->validate()) {

            $res = Mail::prepare(
                'reservation',
                $this->toArray(),
                'Бронирование на имя '.$this->name
            )->send();
            return true;
        }

        return false;
    }
    public function phone($attribute)
    {
        if(\is_numeric($this->$attribute)) {
            if (\strlen($this->$attribute) === 11 || \strlen($this->$attribute) === 12) {
                return true;
            }

        }
        $this->addError($attribute, Yii::t("app", "Is not a phone number"));
        return false;
    }
    public function beforeValidate()
    {
        //$this->checkin = new DateTime($this->checkin);
        return parent::beforeValidate();
    }
    public function afterValidate()
    {
        //$this->checkin = $this->checkin->format('Y-m-d');
        return parent::afterValidate();
    }
}