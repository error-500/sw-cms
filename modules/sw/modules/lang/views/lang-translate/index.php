<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

use app\modules\sw\modules\lang\models\Lang;

$this->title = 'Словарь';

?>

<div class="panel panel-flat">
    <div class="panel-body">
        <?= Html::a('<b><i class="icon-plus-circle2"></i></b> Добавить', ['/sw/lang/lang-translate/create'], ['class' => 'btn bg-teal-400 btn-labeled']) ?>
        <hr>
        В качестве ключа слово или фраза которое нужно перевести, в значении указываем перевод того что вставили в ключ
    </div>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-striped'],
            'layout' => '{items}',
            'columns' => [
                'lang_code',
                [
                    'attribute' => 'lang_code',
                    'filter' => ArrayHelper::map(Lang::find()->all(), 'code', 'name'),
                    'value' => function($lang_translate) {
                        return $lang_translate->lang->name;
                    }
                ],
                'key:ntext',
                'value:ntext',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'white-space:nowrap;'],
                    'header' => 'Действия',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<i class="icon-pencil"></i>', ['/sw/lang/lang-translate/update', 'id' => $model->id]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="icon-trash"></i>', ['/sw/lang/lang-translate/delete', 'id' => $model->id], [
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
