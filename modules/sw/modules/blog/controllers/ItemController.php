<?php

namespace app\modules\sw\modules\blog\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

use app\modules\sw\modules\blog\models\Item;
use app\modules\sw\modules\blog\models\ItemSearch;
use app\modules\sw\modules\gallery\models\Group;

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
                if ($model->gallery_id
                    && $gallery = Group::findOne($model->gallery_id)) {
                    $model->link('galleries', $gallery);
                }
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
                if ($model->gallery_id
                    && $gallery = Group::findOne($model->gallery_id)) {
                    $model->link('galleries', $gallery);
                }
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
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}