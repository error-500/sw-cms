<?php

namespace app\modules\sw\modules\lang\models;

use Yii;

/**
 * This is the model class for table "sw_lang".
 *
 * @property string $code
 * @property string $name
 * @property string $img_flag
 *
 * @property SwLangTranslate[] $swLangTranslates
 */
class Lang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sw_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code'], 'string', 'max' => 4],
            [['name', 'img_flag'], 'string', 'max' => 255],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Код языка',
            'name' => 'Название',
            'img_flag' => 'Флаг',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSwLangTranslates()
    {
        return $this->hasMany(LangTranslate::className(), ['lang_code' => 'code']);
    }
}
