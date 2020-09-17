<?php

namespace app\modules\sw\modules\page\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

use app\modules\sw\modules\page\models\Item;
use app\modules\sw\modules\page\models\ItemSearch;

class ItemController extends _BaseController
{
    public function actionIndex()
    {
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Item();

        if ($model->load(Yii::$app->request->post())) {
            
            $model->img_obj = UploadedFile::getInstance($model, 'img_obj');
            $model->uploadFile();

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $model->img_obj = UploadedFile::getInstance($model, 'img_obj');
            $model->uploadFile();

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Item::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
