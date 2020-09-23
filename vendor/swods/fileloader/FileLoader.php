<?php

namespace swods\fileloader;

use Yii;
use yii\web\HttpException;
use yii\base\InvalidConfigException;

use swods\randstring\RandString;

/**
 * "How to use" can be found in README.md file
 * @author SSU (SwoDs) <etc@swods.ru>
 */
class FileLoader
{
    private $file;

    private $filename;
    private $dir;
    private $path;
    private $chmod = 0777;
    private $length = 5;

    function __construct($config) 
    {
        if (empty($config)) {
            throw new InvalidConfigException('Params is empty');
        } elseif (empty($config['file'])) {
            throw new InvalidConfigException('File (UploadedFile) must be set');
        }
        
        foreach ($config as $name => $value) {
            $this->$name = $value;
        }

        $this->filename = $this->filename ?: $this->genRandomName();
        $this->dir = $this->checkDir($this->dir ?: Yii::getAlias('@webroot/uploads/'));
        $this->path = sprintf('%s%s', $this->dir, $this->filename);

        $this->saveFile();
    }

    public static function save($config) 
    {   
        $obj = new self($config);
        return $obj->filename;
    }

    private function genRandomName() 
    {
        return sprintf('%s_%s.%s', RandString::generate(), time(), $this->file->extension);
    }

    private function checkDir($dir) 
    {
        
        if (!is_dir($dir)) {
            mkdir($dir, $this->chmod, true);
        }

        return $dir;
    }

    public function saveFile() 
    {
        if (@$this->file->saveAs($this->path, false)){
            chmod($this->path, 0777);
        }
        else {
            throw new HttpException(404, sprintf('Save failed. Path not found: %s', $this->path));
        }
    }
}
