<?php

namespace app\modules\sw\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return 'sw_user';
    }

    public function rules()
    {
        return [
            [['email'], 'required'],
            [['email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 200],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
            'email' => 'Email',
            'created' => 'Создано',
            'updated' => 'Обновлено',
        ];
    }

    public function updatePassword() 
    {
        if (!empty($this->password)) {
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        } else {
            unset($this->password);
        }
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }

    // Usless
    public function getAuthKey() {}
    public function validateAuthKey($authKey) {}
    public static function findIdentityByAccessToken($token, $type = null) {}
    // usless
}
