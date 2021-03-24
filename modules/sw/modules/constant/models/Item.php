<?php

namespace app\modules\sw\modules\constant\models;

use Yii;

/**
 * exp: Constant::byTechName('public_email');
 */
class Item extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%constant_item}}';
    }

    public function rules()
    {
        return [
            [['name', 'tech_name', 'value'], 'required'],
            [['value'], 'string'],
            [['name', 'tech_name'], 'string', 'max' => 50],
            [
                'tech_name',
                'match',
                'pattern' => '/^[a-z_]*$/',
                'message' => 'Техничесокое имя должно быть слитно, на английском, в нижнем регистре, допускается знак "_"'
            ],
            [['tech_name'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'tech_name' => 'Техническое название',
            'value' => 'Значение',
            'created' => 'Создано',
            'updated' => 'Обновлено',
        ];
    }

    public static function get($tech_name, $attr)
    {
        $self = self::findOne(['tech_name' => $tech_name]);

        if (!$self || !$attr) {
            return $self;
        }

        return $self->$attr;
    }
}