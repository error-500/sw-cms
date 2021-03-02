<?php

namespace app\modules\main\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class NewsController extends \yii\web\Controller
{
    public $defaultAction = 'list';

    public function actionList($category = null)
    {
        $query = Yii::$app->sw->getModule('blog')
            ->item('find')
            ->alias('i')
            ->joinWith([
                'group' => function($query) use ($category) {
                    $query->alias('g')->andFilterWhere(['g.tech_name' => $category]);
                }
            ])
            ->where(['i.active' => 1])
            ->orderBy('pos ASC');

        $newsProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        // $page = Yii::$app->request->get('per-page') ?: 0;
        // $per_page = Yii::$app->request->get('per-page') ?: 0;
        // $offset = $page * $per_page;

        return $this->render('list', [
            'newsProvider' => $newsProvider,
            'page' => Yii::$app->sw->getModule('page')->item('findOne', ['tech_name' => 'news']),
            'groups' => Yii::$app->sw->getModule('blog')->group('find')->orderBy('pos ASC')->all(),
            'random_posts' => Yii::$app->sw->getModule('blog')->item('find')->orderBy('rand()')->limit('5')->all(),
        ]);
    }

    public function actionSingle($id)
    {
        $item = Yii::$app->sw->getModule('blog')->item('find')
            ->alias('i')
            ->where(['i.id' => $id, 'i.active' => 1])
            ->orderBy('i.pos ASC')
            ->one();

        if (!$item) {
            throw new NotFoundHttpException('Запись не найдена');
        }

        return $this->render('single', [
            'item' => $item,
            'page' => Yii::$app->sw->getModule('page')->item('findOne', ['tech_name' => 'news']),
            'groups' => Yii::$app->sw->getModule('blog')->group('find')->all(),
            'random_posts' => Yii::$app->sw->getModule('blog')->item('find')->orderBy('rand()')->limit('5')->all(),
        ]);
    }
}
