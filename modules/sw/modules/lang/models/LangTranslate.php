<?php

namespace app\modules\sw\modules\lang\models;

use Yii;

/**
 * This is the model class for table "sw_lang_translate".
 *
 * @property int $id
 * @property string $lang_code
 * @property string $key
 * @property string $value
 *
 * @property Lang $langCode
 */
class LangTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sw_lang_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang_code', 'key', 'value'], 'required'],
            [['key', 'value'], 'string'],
            [['lang_code'], 'string', 'max' => 4],
            [['lang_code'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_code' => 'code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang_code' => 'Язык',
            'key' => 'Ключ',
            'value' => 'Значение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['code' => 'lang_code']);
    }
}
