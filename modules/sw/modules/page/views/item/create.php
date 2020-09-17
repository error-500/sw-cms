<?php

use yii\helpers\Html;

$this->title = 'Добавить страницу';
$this->params['block'] = 'Модуль: Страницы';
$this->params['title'] = 'Добавить страницу';

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>