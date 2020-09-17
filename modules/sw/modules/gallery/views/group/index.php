<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Группы';
$this->params['block'] = 'Модуль: Инфоблоки';
$this->params['title'] = 'Группы';?>

<div class="panel panel-flat">
    <div class="panel-body">
        <?= Html::a('<b><i class="icon-plus-circle2"></i></b> Добавить', ['/sw/gallery/group/create'], ['class' => 'btn bg-teal-400 btn-labeled']) ?>
        <hr>
        Группы галерей, к примеру: <code>интерьер</code>, <code>ресторан 1</code> и т.п.
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
                'name',
                'tech_name',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'white-space:nowrap;'],
                    'header' => 'Действия',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<i class="icon-pencil"></i>', ['/sw/gallery/group/update', 'id' => $model->id]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="icon-trash"></i>', ['/sw/gallery/group/delete', 'id' => $model->id], [
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

