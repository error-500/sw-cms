<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Пользователи';
// $this->params['block'] = 'Система';
// $this->params['title'] = 'Пользователи';
?>

<div class="panel panel-flat">
    <div class="panel-body">
<!--         Тут можно редактировать пользователей. По умолчанию доступно два вида пользователя:<br><br>
        <code>admin</code> - Может все<br>
        <code>seo</code> - Может редактировать SEO - заголовки, описание, ключевые слова и альты<br>
        <br> -->
        Для добавлению других ролей обратитесь к веб мастеру
    </div>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-striped'],
            'layout' => '{items}',
            'columns' => [
                'username',
                'email:email',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'white-space:nowrap;'],
                    'header' => 'Действия',
                    'template' => '{update}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<i class="icon-pencil"></i>', ['/sw/user/update', 'id' => $model->id]);
                        },
                    ],
                ],
            ],
        ]); ?>
    </div>
</div>
