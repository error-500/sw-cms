<?php

use yii\helpers\Html;

$this->title = 'Обновить файл';
$this->params['block'] = 'Модуль: Файловый менеджер';
$this->params['title'] = 'Обновить файл';

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
