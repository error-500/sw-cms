<?php

namespace app\modules\sw\modules\lang\controllers;

use Yii;
use yii\web\NotFoundHttpException;

use app\modules\sw\modules\lang\models\Lang;
use app\modules\sw\modules\lang\models\LangTranslate;
use app\modules\sw\modules\lang\models\LangSearch;

class LangController extends _BaseController
{
    public function actionIndex()
    {
        $searchModel = new LangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Lang();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if (!empty(Item::findAll(['group_id' => $id]))) {
            throw new ForbiddenHttpException('Язык используется, нельзя удалить');
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Lang::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
