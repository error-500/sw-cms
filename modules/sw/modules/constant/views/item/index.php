<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'Константы';
$this->params['block'] = 'Система';
$this->params['title'] = 'Константы';
?>

<div class="panel panel-flat">
    <div class="panel-body">
        <?= Html::a('<b><i class="icon-plus-circle2"></i></b> Добавить', ['/sw/constant/item/create'], ['class' => 'btn bg-teal-400 btn-labeled']) ?>
        <hr>
        С помощью констант вы можете управлять постоянными значениями, такими как: <code>телефон</code>, <code>адрес</code>, <code>email</code>, <code>часы работы</code> и т.п.
        <br><br>
        <div class="alert alert-warning alert-styled-left">
            <span class="text-semibold">Будьте внимательны!</span> Удаление используемой константы может привести к ошибкам в работе сайта
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
                    'attribute' => 'value',
                    'format' => 'raw',
                    'value' => function ($item) {
                        return mb_strlen($item->value) > 60 ? '<span class="text-warning">Значение слишком большое, нажмите</span> <i class="icon-pencil"></i>' : $item->value;
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'white-space:nowrap;'],
                    'header' => 'Действия',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<i class="icon-pencil"></i>', ['/sw/constant/item/update', 'id' => $model->id]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="icon-trash"></i>', ['/sw/constant/item/delete', 'id' => $model->id], [
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

