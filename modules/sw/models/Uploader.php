<?php

namespace app\modules\sw\models;

use Yii;
use yii\web\UploadedFile;

class Uploader extends \yii\base\Model
{
    public static $folder = '@webroot/uploads/sw/editor/';
    public static $web_folder = '/uploads/sw/editor/';

    public $img;

    public function rules()
    {
        return [
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public static function upload()
    {
        $model = new self;
        $model->img = UploadedFile::getInstanceByName('upload');

        if (!$model->validate()) {
            $message = $model->errors;
        }

        $filename = date('d.m.Y_').rand(10, 99).rand(10, 99).'.'.$model->img->extension;
        $path_dir = Yii::getAlias(self::$folder);
        
        if (!is_dir($path_dir)) {
            mkdir($path_dir, 0777, true);
        }

        $full_path = $path_dir.$filename;

        if (@$model->img->saveAs($full_path)) {
            $message = "Файл загружен";
        } else {
            $message = 'Не удалось сохранить файл(ы). Не найденный путь: '.$full_path;
        }

        $callback = $_REQUEST['CKEditorFuncNum'];
        echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$callback.'", "'.self::$web_folder.$filename.'", "'.$message.'" );</script>';
    }
}
