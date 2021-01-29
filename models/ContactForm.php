<?php

namespace app\models;

use app\components\Mail;
use himiklab\yii2\recaptcha\ReCaptchaValidator2;
use himiklab\yii2\recaptcha\ReCaptchaValidator3;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public $reCaptcha;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'message'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            //['verifyCode', 'captcha'],
            [
                ['reCaptcha'],
                ReCaptchaValidator3::class,
                'secret' => Yii::$app->reCaptcha->secretV3, // unnecessary if reСaptcha is already configured
                //'uncheckedMessage' => 'Please confirm that you are not a bot.',
            ],
        ];
    }
    public function fields()
    {
        return [
            'name',
            'email',
            'message',
        ];
    }
    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }

    public function send()
    {
         if ($this->validate()) {

            $res = Mail::prepare(
                'contact',
                $this->toArray(),
                'Обратная связь от '.$this->name
            )->send();
            return true;
        }

        return false;
    }
}