<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Группы';
$this->params['block'] = 'Модуль: Инфоблоки';
$this->params['title'] = 'Группы';

?>

<div class="panel panel-flat">
    <div class="panel-body">
        <?php echo Html::a(
            '<b><i class="icon-plus-circle2"></i></b> Добавить',
            ["/".Yii::$app->controller->uniqueId."/create"],
            ['class' => 'btn bg-teal-400 btn-labeled']
        ); ?>
        <hr />
        Группы помогут вам разделить инфоблоки по назначению, к примеру: <code>слайдер</code>, <code>акции</code> и т.п.
        <br /><br />
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