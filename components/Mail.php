<?php

namespace app\components;

use Yii;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mail 
{
    public $to;
    // public $from = 'qartulirest@yandex.ru';
    public $from = 'info@mikek8.ru';
    public $from_name = 'Qartuli';
    public $title = 'Тестовое письмо';
    public $body = 'Тестовое письмо';
    public $mail;

    function __construct() {
        $this->mail = new PHPMailer(true);
    }

    public static function prepare($view, $params = [], $title = 'Форма связи')
    {
        $emails_to = Yii::$app->sw->getModule('constant')->item('findOne', ['tech_name' => 'delivery_emails']) ?: 'etc@swods.ru';
        $emails_to = explode(',', $emails_to);
        $emails_to = array_map('trim', $emails_to);

        $mail = new \app\components\Mail;
        $mail->to = $emails_to;
        $mail->title = $title;
        $mail->body = (new \yii\base\View)->renderFile("@app/mail/{$view}.php", $params);

        return $mail;
    }

    public function send() 
    {
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->mail->Host = 'smtp.yandex.ru';
        // $this->mail->Username = 'qartulirest@yandex.ru';
        // $this->mail->Password = 'Qartuli13245768djSX';
        $this->mail->Username = 'info@mikek8.ru';
        $this->mail->Password = 'MIKEk8123';
        // $this->mail->Port = 587;
        $this->mail->SMTPAuth = true;
        // $this->mail->SMTPAutoTLS = false;
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isHTML(true);
        $this->mail->setFrom($this->from, $this->from_name);
        $this->mail->Subject = sprintf('Qartuli - %s', $this->title);
        $this->mail->Body = $this->body;

        return $this->sendByEmail();
    }

    public function sendByEmail() 
    {
        $result = [];

        if (is_array($this->to)) {
            foreach ($this->to as $email) {
                $this->mail->addAddress($email);
                try {
                    $result[] = [$email => $this->mail->send()];
                } catch (\Exception $e) {
                    $result[] = [$email => $e];
                }
                $this->mail->clearAddresses();
            }
            return $result;
        }
        elseif (is_string($this->to) && !empty($this->to)) {
            $this->mail->addAddress($this->to);
            $result[$this->to] = $this->mail->send();
            $this->mail->clearAddresses();
            return $result;
        } else return false;
    }
}