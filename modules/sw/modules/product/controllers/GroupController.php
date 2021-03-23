<?php

namespace app\modules\sw\modules\product\controllers;

use Yii;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;

use app\modules\sw\modules\product\models\Item;
use app\modules\sw\modules\product\models\Group;
use app\modules\sw\modules\product\models\GroupSearch;
use app\modules\sw\modules\product\models\ItemSearch;

class GroupController extends _BaseController
{
    public function actionIndex()
    {
        $searchModel = new GroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Group();

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
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['group_id' => $model->id]);
        return $this->render('update', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionDelete($id)
    {
        if (!empty(Item::findAll(['group_id' => $id]))) {
            throw new ForbiddenHttpException('Группая используется, ее нельзя удалить');
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Group::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}