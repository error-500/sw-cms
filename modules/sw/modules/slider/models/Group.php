<?php

namespace app\modules\sw\modules\slider\models;

use Yii;

class Group extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'sw_slider_group';
    }

    public function rules()
    {
        return [
            [['tech_name', 'name'], 'required'],
            [['created', 'updated'], 'safe'],
            [
                'tech_name',
                'match',
                'pattern' => '/^[a-z_]*$/',
                'message' => 'Техничесокое имя должно быть слитно на английском в нижнем регистре, допускается знак "_"'
            ],
            [['tech_name', 'name'], 'string', 'max' => 50],
            [['text'], 'string'],
            [['tech_name'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tech_name' => 'Техническое название',
            'name' => 'Название',
            'text' => 'Текст',
            'created' => 'Создано',
            'updated' => 'Обновлено',
        ];
    }

    public static function get($tech_name, $attr)
    {
        $self = self::find()->where(['tech_name' => $tech_name])->joinWith('items')->one();

        if (!$self || !$attr) {
            return $self;
        }

        return $self->$attr;
    }

    public function getItems()
    {
        return $this->hasMany(Item::className(), ['group_id' => 'id'])->andWhere(['active' => Item::ACTIVE])->orderBy('pos ASC');
    }
}