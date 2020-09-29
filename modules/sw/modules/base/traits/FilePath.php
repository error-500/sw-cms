<?php

namespace app\modules\sw\modules\base\traits;

trait FilePath
{
    public function getFilePath()
    {
        return $this->file ? $this->web_folder.$this->file : null;
    }
}
