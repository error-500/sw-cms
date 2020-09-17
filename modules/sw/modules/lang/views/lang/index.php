<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Языки';

?>

<div class="panel panel-flat">
    <div class="panel-body">
        <?= Html::a('<b><i class="icon-plus-circle2"></i></b> Добавить', ['/sw/lang/lang/create'], ['class' => 'btn bg-teal-400 btn-labeled']) ?>
        <hr>
        <div class="alert alert-info alert-styled-left">
            <span class="text-semibold">Инфо:</span> Если язык используется его невозможно удалить
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
                'code',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'white-space:nowrap;'],
                    'header' => 'Действия',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<i class="icon-pencil"></i>', ['/sw/lang/lang/update', 'id' => $model->code]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="icon-trash"></i>', ['/sw/lang/lang/delete', 'id' => $model->code], [
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
