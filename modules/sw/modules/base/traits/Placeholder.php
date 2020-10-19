<?php

namespace app\modules\sw\modules\base\traits;

trait Placeholder
{
	public $patterns = [
		'separator' => [

		]
	];

    public function getPText()
    {
        return $this->text;
    }
}
