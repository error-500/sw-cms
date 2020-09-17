<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

use app\modules\sw\modules\product\models\Group;

$this->title = 'Группы';

?>

<div class="panel panel-flat">
    <div class="panel-body">
        <?= Html::a('<b><i class="icon-plus-circle2"></i></b> Добавить', ['/sw/product/group/create'], ['class' => 'btn bg-teal-400 btn-labeled']) ?>
        <br><br>
        <div class="alert alert-info alert-styled-left">
            <span class="text-semibold">Инфо:</span> Если группа используется ее невозможно удалить
        </div>
    </div>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-striped'],
            'layout' => '{items}',
            'columns' => [
                [
                    'attribute' => 'name',
                ],
                [
                    'attribute' => 'tech_name',
                ],
                [
                    'attribute' => 'parent_id',
                    'filter' => ArrayHelper::map(Group::find()->all(), 'id', function($data) {
                        if (empty($data->parent->name)) {
                            return $data['name'];
                        }
                        return sprintf('%s (Родительская группа - %s)', $data['name'], $data->parent->name);
                    }),
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->parent->name ?? '<span class="text-warning">Нет</span>';
                    }
                ],
                [
                    'attribute' => 'img',
                    'header' => 'Картинка',
                    'filter' => false,
                    'format' => 'raw',
                    'value' => function($data) {
                        if (!$data->imgSrc) {
                            return '<span class="text-warning">Нет</span>';
                        }

                        $img = Html::img($data->imgSrc, ['height' => 50]);
                        return Html::a($img, [$data->imgSrc], ['target' => '_blank']);
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'white-space:nowrap;'],
                    'header' => 'Действия',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $data) {
                            return Html::a('<i class="icon-pencil"></i>', ['/sw/product/group/update', 'id' => $data->id]);
                        },
                        'delete' => function ($url, $data) {
                            return Html::a('<i class="icon-trash"></i>', ['/sw/product/group/delete', 'id' => $data->id], [
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

