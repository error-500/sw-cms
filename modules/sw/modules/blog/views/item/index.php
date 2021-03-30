<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

use app\modules\sw\modules\blog\models\Group;

$this->title = 'Элементы';
$this->params['block'] = 'Модуль: Инфоблоки';
$this->params['title'] = 'Элементы';?>

<div class="panel panel-flat">
    <div class="panel-body">
        <?= Html::a('<b><i class="icon-plus-circle2"></i></b> Добавить', ["/".Yii::$app->controller->uniqueId.'/create'], ['class' => 'btn bg-teal-400 btn-labeled']) ?>
        <hr>
        Элементы которые позволяют создать группы новостей, постов для блога и т.д.
    </div>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-striped'],
            'layout' => '{items}',
            'columns' => [
                [
                    'attribute' => 'title',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (empty($data->img)) {
                            return $data->title;
                        }
                        return Html::a($data->title, [$data->imgSrc], ['target' => '_blank']);
                    }
                ],
                [
                    'attribute' => 'group_id',
                    'filter' => ArrayHelper::map(Group::find()->all(), 'id', 'name'),
                    'value' => function ($data) {
                        return $data->group->name;
                    }
                ],
                [
                    'attribute' => 'active',
                    'filter' => [1 => 'Да', 0 => 'Нет'],
                    'value' => function ($data) {
                        return $data->active ? 'Да' : 'Нет';
                    }
                ],
                [
                    'attribute' => 'alt',
                    'filter' => false
                ],
                [
                    'attribute' => 'pos',
                    'filter' => false
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'white-space:nowrap;'],
                    'header' => 'Действия',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<i class="icon-pencil"></i>', ["/".Yii::$app->controller->uniqueId.'/update', 'id' => $model->id]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="icon-trash"></i>', ["/".Yii::$app->controller->uniqueId.'/delete', 'id' => $model->id], [
                                'data' => [
                                    'confirm' => 'Вы уверены что хотите удалить запись? Действие нельзя отменить!',
                                ]
                            ]);
                        },
                    ],
                ],
            ],
        ]); ?>
    </div>
</div>