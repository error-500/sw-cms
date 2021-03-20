<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Обновить группу: {0}', [$model->name]);
$this->params['block'] = 'Модуль: Товар';
$this->params['title'] = Yii::t('app', 'Обновить группу: {0}', [$model->name]);

?>

<div class="constant-update">

    <?= $this->render('_form', [
        'model' => $model,
        'dataProvider' => $dataProvider,
        'searchModel' => $searchModel,
    ]) ?>

</div>
