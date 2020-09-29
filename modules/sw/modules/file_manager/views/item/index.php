<?php

use yii\helpers\{Html, ArrayHelper};
use yii\grid\GridView;

$this->title = 'Файлы';
$this->params['block'] = 'Модуль: Файловый менеджер';
$this->params['title'] = 'Файлы';?>

<div class="panel panel-flat">
    <div class="panel-body">
        <?= Html::a('<b><i class="icon-plus-circle2"></i></b> Добавить', ['/sw/file_manager/item/create'], ['class' => 'btn bg-teal-400 btn-labeled']) ?>
        <hr>
        Добавление файлов, после загрузки вы получите ссылку на файл
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
                    'attribute' => 'path',
                    'filter' => false,
                    'format' => 'raw',
                    'value' => function ($item) {
                        return Html::a($item->filePath, $item->filePath, ['target' => '_blank']);
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'white-space:nowrap;'],
                    'header' => 'Действия',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<i class="icon-pencil"></i>', ['/sw/file_manager/item/update', 'id' => $model->id]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="icon-trash"></i>', ['/sw/file_manager/item/delete', 'id' => $model->id], [
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
