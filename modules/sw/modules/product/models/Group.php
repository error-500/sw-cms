<?php

namespace app\modules\sw\modules\product\models;

use Yii;
use swods\fileloader\FileLoader;

class Group extends \yii\db\ActiveRecord
{
    use \app\modules\sw\modules\base\traits\ImgSrc;

    public static $folder = '@webroot/uploads/sw/product/group/';
    public $web_folder = '/uploads/sw/product/group/';
    public $img_obj;

    public static function tableName()
    {
        return '{{%product_group}}';
    }

    public function rules()
    {
        return [
            [['parent_id', 'pos'], 'integer'],
            [
                'tech_name',
                'match',
                'pattern' => '/^[a-z_]*$/',
                'message' => 'Техничесокое имя должно быть слитно, на английском, в нижнем регистре, допускается знак "_"'
            ],
            [['text'], 'string'],
            [['tech_name', 'name'], 'required'],
            [['name', 'img'], 'string', 'max' => 50],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['parent_id' => 'id']],
            ['img_obj', 'file', 'skipOnEmpty' => true, 'checkExtensionByMimeType' => false, 'extensions' => 'png, jpg', 'maxSize' => 2097152],
            [['tech_name'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tech_name' => 'Техническое название',
            'parent_id' => 'Родительская группа',
            'pos' => 'Позиция',
            'name' => 'Название',
            'img' => 'Картинка',
            'is_delivery' => 'На доставке',
            'img_obj' => 'Картинка',
            'text' => 'Текст',
        ];
    }

    public function uploadFile()
    {
        if (!is_object($this->img_obj)) {
            return;
        }

        $this->img = FileLoader::save([
            'file' => $this->img_obj,
            'dir'  => Yii::getAlias(self::$folder),
        ]);
    }

    public function getParent()
    {
        return $this->hasOne(Group::className(), ['id' => 'parent_id']);
    }

    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['parent_id' => 'id']);
    }

    public function getItems()
    {
        return $this->hasMany(Item::className(), ['group_id' => 'id']);
    }
}
