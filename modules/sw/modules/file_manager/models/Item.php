<?php

namespace app\modules\sw\modules\file_manager\models;

use Yii;
use swods\fileloader\FileLoader;

/**
 * exp: Item::byTechName('main_slider');
 */
class Item extends \yii\db\ActiveRecord
{
    use \app\modules\sw\modules\base\traits\FilePath;

    public static $folder = '@webroot/uploads/sw/file_manager/';
    public $web_folder = '/uploads/sw/file_manager/';
    public $file_obj;

    public static function tableName()
    {
        return 'sw_file_manager_item';
    }

    public function rules()
    {
        return [
            [['tech_name', 'file'], 'required'],
            [['created', 'updated'], 'safe'],
            [
                'tech_name', 
                'match', 
                'pattern' => '/^[a-z_]*$/', 
                'message' => 'Техничесокое имя должно быть слитно, на английском, в нижнем регистре, допускается знак "_"'
            ],
            [['name', 'tech_name'], 'string', 'max' => 50],
            ['file_obj', 'file', 'skipOnEmpty' => true, 'checkExtensionByMimeType' => false, 'extensions' => 'png, jpg, jpeg, rar, zip', 'maxSize' => 3145728],
        ]; 
    }

    public function attributeLabels()
    { 
        return [ 
            'id' => 'ID',
            'name' => 'Название',
            'tech_name' => 'Техническое название',
            'file' => 'Файл',
            'file_obj' => 'Файл',
            'path' => 'Путь',
            'created' => 'Создано',
            'updated' => 'Обновлено',
        ]; 
    }

    public function uploadFile()
    {
        if (!is_object($this->file_obj)) {
            return;
        }

        $this->file = FileLoader::save([
            'filename' => $this->isNewRecord ? null : $this->getOldAttribute('file'),
            'file' => $this->file_obj,
            'dir'  => Yii::getAlias(self::$folder),
        ]);
    }

    public static function byTechName($tech_name) 
    {
        return self::findOne(['tech_name' => $tech_name]);
    }
}
