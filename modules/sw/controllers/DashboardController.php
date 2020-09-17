<?php

namespace app\modules\sw\controllers;

class DashboardController extends _BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
