<?php

namespace app\modules\sw\controllers;

use Yii;
use yii\web\Controller;

use app\modules\sw\models\LoginForm;

class AuthController extends Controller
{
    public $layout = 'auth';
    public $defaultAction = 'login';

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/sw/dashboard/index');
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/sw/dashboard/index');
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }  
}
