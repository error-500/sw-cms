<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Обновить элемент: {0}', [$model->name]);
$this->params['block'] = 'Модуль: Инфоблоки';
$this->params['title'] = Yii::t('app', 'Обновить элемент: {0}', [$model->name]);

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
