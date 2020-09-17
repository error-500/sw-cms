<?php

namespace app\modules\sw\controllers;

use app\modules\sw\models\Uploader;

class UploadController extends _BaseController
{
	public $enableCsrfValidation = false;

    public function actionSave()
    {
    	return Uploader::upload();
    }
}
