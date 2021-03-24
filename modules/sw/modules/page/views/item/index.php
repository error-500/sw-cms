<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

$this->title = 'Страницы и блоки';
$this->params['block'] = 'Модуль: Страницы';
$this->params['title'] = 'Элементы';

?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-flat">
            <div class="panel-body">
                <?= Html::a('<b><i class="icon-plus-circle2"></i></b> Добавить',
                ['/'.Yii::$app->controller->uniqueId.'/create'], ['class' => 'btn bg-teal-400 btn-labeled']) ?>
                <hr>
                Создавайте и редактируйте страницы
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
                        ],
                        [
                            'attribute' => 'tech_name',
                        ],
                        [
                            'attribute' => 'img',
                            'filter' => false,
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a($data->img, [$data->imgSrc], ['target' => '_blank']);
                            }
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'contentOptions' => ['style' => 'white-space:nowrap;'],
                            'header' => 'Действия',
                            'template' => '{lang} | {update} {delete}',
                            'buttons' => [
                                'lang' => function ($url, $model) {
                                    $return = Html::a('<i class="icon-earth"></i>',
                                    ['/'.Yii::$app->controller->uniqueId.'/update', 'id' => $model->id]);
                                    return $return;
                                },
                                'update' => function ($url, $model) {
                                    return Html::a(
                                        '<i class="icon-pencil"></i>',
                                        ['/'.Yii::$app->controller->uniqueId.'/update', 'id' => $model->id]);
                                },
                                'delete' => function ($url, $model) {
                                    return Html::a('<i class="icon-trash"></i>',
                                    ['/'.Yii::$app->controller->uniqueId.'/delete', 'id' => $model->id], [
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
    </div>
</div>