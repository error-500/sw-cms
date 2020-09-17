<?php

namespace app\modules\sw\modules\product\models;

use Yii;

use Gumlet\ImageResize;
use swods\fileloader\FileLoader;

class Item extends \yii\db\ActiveRecord
{
    public static $folder = '@webroot/uploads/sw/product/item/';
    public $web_folder = '/uploads/sw/product/item/';
    public $img_obj;

    public static function tableName()
    {
        return 'sw_product_item';
    }

    public function rules()
    {
        return [
            [['group_id', 'name', 'price', 'is_delivery'], 'required'],
            [['group_id', 'pos'], 'integer'],
            [['consist', 'about'], 'string'],
            [['name', 'price'], 'string', 'max' => 100],
            [['img', 'volume'], 'string', 'max' => 50],
            ['img_obj', 'file', 'skipOnEmpty' => true, 'checkExtensionByMimeType' => false, 'extensions' => 'png, jpg', 'maxSize' => 2097152],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
        ]; 
    }

    public function attributeLabels()
    {
        return [ 
            'id' => 'ID',
            'group_id' => 'Группа',
            'name' => 'Название',
            'price' => 'Цена',
            'is_delivery' => 'На доставке',
            'img_obj' => 'Картинка',
            'img' => 'Картинка',
            'consist' => 'Состав',
            'about' => 'Описание',
            'volume' => 'Объем',
            'pos' => 'Позиция',
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

        $this->saveThumb();
    }

    public function saveThumb()
    {
        $path = Yii::getAlias(self::$folder).$this->img;

        if (!file_exists($path)) {
            return;
        }
        
        $image = new ImageResize($path);
        $image->resizeToLongSide(500);
        $image->save(Yii::getAlias(self::$folder).'thumb_'.$this->img);
    }

    public function getImgSrc()
    {
        return $this->web_folder.$this->img;
    }

    public function getImgThumbSrc()
    {
        if (!file_exists(Yii::getAlias(self::$folder).'thumb_'.$this->img)) {
            return $this->imgSrc;
        }

        return $this->web_folder.'thumb_'.$this->img;
    }

    public function getGroup() 
    { 
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    } 
}
