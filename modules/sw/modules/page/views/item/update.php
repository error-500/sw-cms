<?php

use yii\helpers\Html;

$this->title = 'Обновить страницу';
$this->params['block'] = 'Модуль: Страницы';
$this->params['title'] = 'Обновить страницу';

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
