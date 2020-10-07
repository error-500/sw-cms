<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class NewsController extends \yii\web\Controller
{
    public $defaultAction = 'list';

    public function actionList()
    {
        $query = Yii::$app->sw->getModule('blog')->item('find')->alias('i')->joinWith([
            'group' => function($query) {
                $query->alias('g')->where(['g.tech_name' => 'news']);
            }
        ])->where(['i.active' => 1])->orderBy('pos ASC');

        $newsProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('list', [
            'newsProvider' => $newsProvider,
            'page' => Yii::$app->sw->getModule('page')->item('findOne', ['tech_name' => 'news']),
            // 'page' => Yii::$app->sw->getModule('page')->item('findOne', ['tech_name' => 'menu']),
        ]);
    }

    public function actionSingle($id)
    {
        $item = Yii::$app->sw->getModule('blog')->item('find')->alias('i')->joinWith([
            'group' => function($query) {
                $query->alias('g')->where(['g.tech_name' => 'news']);
            }
        ])->where(['i.id' => $id, 'i.active' => 1])->orderBy('i.pos ASC')->one();

        if (!$item) {
            throw new NotFoundHttpException('Запись не найдена');
        }

        return $this->render('single', [
            'item' => $item,
            'page' => Yii::$app->sw->getModule('page')->item('findOne', ['tech_name' => 'news']),
        ]);
    }
}
