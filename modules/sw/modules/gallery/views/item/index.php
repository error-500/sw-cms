<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

use app\modules\sw\modules\gallery\models\Group;

$this->title = 'Элементы';
$this->params['block'] = 'Модуль: Инфоблоки';
$this->params['title'] = 'Элементы';?>

<div class="panel panel-flat">
    <div class="panel-body">
        <!-- <?= Html::a('<b><i class="icon-plus-circle2"></i></b> Добавить', ["/".Yii::$app->controller->uniqueId.'/create'], ['class' => 'btn bg-teal-400 btn-labeled']) ?> -->
        <hr>
        Элементы галереи
    </div>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-striped'],
            'layout' => '{items} {pager}',
            'columns' => [
                [
                    'attribute' => 'name',
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'group_id',
                    'filter' => ArrayHelper::map(Group::find()->all(), 'id', 'name'),
                    'value' => function ($data) {
                        return $data->group->name;
                    }
                ],
                [
                    'attribute' => 'alt',
                    'filter' => false
                ],
                [
                    'header' => 'Превью',
                    'format' => 'raw',
                    'value' => function ($data) {
                        $img = Html::img($data->imgThumbSrc, ['height' => 50]);
                        return Html::a($img, [$data->imgSrc], ['target' => '_blank']);
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'white-space:nowrap;'],
                    'header' => 'Действия',
                    'template' => '{delete}',
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