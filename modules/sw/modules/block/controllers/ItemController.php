<?php

namespace sw\modules\block\controllers;


use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

use sw\modules\block\models\ItemSearch;
use sw\modules\block\controllers\_BaseController;
use sw\modules\block\models\BlockSearch;
use sw\modules\block\models\Item;
use sw\modules\block\models\Template;
use app\modules\sw\modules\page\models\Item as Page;
use sw\modules\block\models\Block;

class ItemController extends _BaseController
{
    public function actionIndex()
    {
        $searchModel = new BlockSearch();
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
        $block = new Block();

        if ($model->load(Yii::$app->request->post())) {
            $model->img_obj = UploadedFile::getInstance($model, 'img_obj');
            $model->uploadFile();

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }
        $templates = Template::find()->all();
        $pages = Page::find()->all();
        return $this->render('create', [
            'model' => $model,
            'block' => $block,
            'templates' => $templates,
            'pages' => $pages,
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
        $model = Item::find(['id' => $id])
            ->with(['block', 'templates'])
            ->one();

        if (empty($model)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $model;
    }
}