<?php

namespace app\modules\sw\controllers;

use Yii;
use app\modules\sw\models\User;
use app\modules\sw\models\UserSearch;
use yii\web\NotFoundHttpException;

class UserController extends _BaseController
{
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->updatePassword();

            if ($model->save()) {
                return $this->redirect('index');
            }
        }

        $model->password = null;
        
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
