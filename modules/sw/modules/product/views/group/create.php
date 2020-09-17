<?php

use yii\helpers\Html;

$this->title = 'Добавить Группу';
$this->params['block'] = 'Модуль: Товар';
$this->params['title'] = 'Добавить группу';

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
