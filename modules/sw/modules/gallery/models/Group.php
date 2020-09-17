<?php

namespace app\modules\sw\modules\gallery\models;

use Yii;

use swods\fileloader\FileLoader;

class Group extends \yii\db\ActiveRecord
{
    public static $folder = '@webroot/uploads/sw/gallery/';
    public $web_folder = '/uploads/sw/gallery/';
    public $img_obj;
    public $images;

    public static function tableName()
    {
        return 'sw_gallery_group';
    }

    public function rules()
    {
        return [
            [['tech_name', 'name'], 'required'],
            [
                'tech_name', 
                'match', 
                'pattern' => '/^[a-z_]*$/', 
                'message' => 'Техничесокое имя должно быть слитно на английском в нижнем регистре, допускается знак "_"'
            ],
            [['created', 'updated', 'images'], 'safe'],
            [['tech_name', 'name'], 'string', 'max' => 255],
            [['img_obj'], 'file', 'skipOnEmpty' => true, 'checkExtensionByMimeType' => false, 'extensions' => 'png, jpg', 'maxSize' => 2097152],
            [['tech_name'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tech_name' => 'Техническое название',
            'name' => 'Название',
            'created' => 'Создано',
            'updated' => 'Обновлено',
            'img' => 'Картинка',
            'img_obj' => 'Картинка группы',
            'images' => 'Картинки галереи',
        ];
    }

    public function uploadFiles()
    {
        foreach ($this->images as $image) {
            $gi = new Item;
            $gi->img_obj = $image;
            $gi->group_id = $this->id;
            $gi->uploadFile();
            $gi->save();
        }
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

    public function getImgSrc()
    {
        return $this->web_folder.$this->img;
    }

    public function getItems()
    {
        return $this->hasMany(Item::className(), ['group_id' => 'id']);
    }
}
