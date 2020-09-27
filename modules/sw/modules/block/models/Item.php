<?php

namespace app\modules\sw\modules\block\models;

use Yii;
use swods\fileloader\FileLoader;

/**
 * exp: Yii::$app->swo->module('page', 'Item')->byTechName('main_slider');
 */
class Item extends \yii\db\ActiveRecord
{
    use \app\modules\sw\modules\base\traits\ImgSrc;
    
    public static $folder = '@webroot/uploads/sw/block/';
    public $web_folder = '/uploads/sw/block/';
    public $img_obj;

    public static function tableName()
    {
        return 'sw_block_item';
    }

    public function rules()
    {
        return [
            [['tech_name', 'title'], 'required'],
            [['tech_name', 'title'], 'string', 'max' => 200],
            [
                'tech_name', 
                'match', 
                'pattern' => '/^[a-z_]*$/', 
                'message' => 'Техничесокое имя должно быть слитно, на английском, в нижнем регистре, допускается знак "_"'
            ],
            ['img_obj', 'file', 'skipOnEmpty' => true, 'checkExtensionByMimeType' => false, 'extensions' => 'png, jpg, mp4', 'maxSize' => 10485760],
            [['tech_name'], 'unique'],
            [['text'], 'string'],
        ];
    }

    public function attributeLabels()
    { 
        return [ 
            'id' => 'ID',
            'tech_name' => 'Техническое название',
            'img' => 'Картинка',
            'img_obj' => 'Картинка',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'created' => 'Создано',
            'updated' => 'Обновлено',
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

    public static function get($tech_name, $attr) 
    {
        $self = self::findOne(['tech_name' => $tech_name]);

        if (!$self || !$attr) {
            return $self;
        }

        return $self->$attr;
    }

    // public static function byTechName($tech_name) 
    // {
    //     $page = self::findOne(['tech_name' => $tech_name]);

    //     $patterns = [
    //         '/{title}/',
    //         '/{tech_name}/',
    //         '/{img}/',
    //         '/{keywords}/',
    //         '/{description}/',
    //     ];

    //     $replacements = [
    //         $page->title,
    //         $page->tech_name,
    //         (new self)->web_folder.$page->img,
    //         $page->keywords,
    //         $page->description,
    //     ];

    //     $page->text = preg_replace($patterns, $replacements, $page->text);

    //     $pattern = '/\{file:(.+?)\}/';
    //     preg_match_all($pattern, $page->text, $matches);

    //     if (!empty($matches[1])) {
    //         foreach ($matches[1] as $match) {
    //             $file = Yii::$app->swo->module('file_manager', 'Item')->byTechName($match);
    //             if (!empty($file)) {
    //                 $page->text = preg_replace(sprintf('/{file:%s}/', $match), $file->path.$file->file, $page->text);
    //             }
    //         }
    //     }

    //     return $page;
    // }
}
