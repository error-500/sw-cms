<?php

use yii\helpers\Html;

$this->title = 'Добавить файл';
$this->params['block'] = 'Модуль: Файловый менеджер';
$this->params['title'] = 'Добавить файл';

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>