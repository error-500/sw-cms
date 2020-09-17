<?php

use yii\helpers\Html;

$this->title = 'Добавить элемент';
$this->params['block'] = 'Модуль: Инфоблоки';
$this->params['title'] = 'Добавить элемент';

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>