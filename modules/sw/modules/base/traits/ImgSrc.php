<?php

namespace app\modules\sw\modules\base\traits;

trait ImgSrc
{
    public function getImgSrc()
    {
        return $this->img ? $this->web_folder.$this->img : null;
    }
}
