<?php

use yii\helpers\Html;

$this->title = 'Обновить элемент';
$this->params['block'] = 'Модуль: Инфоблоки';
$this->params['title'] = 'Обновить элемент';

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
