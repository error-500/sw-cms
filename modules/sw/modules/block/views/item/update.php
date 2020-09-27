<?php

use yii\helpers\Html;

$this->title = 'Обновить блок';
$this->params['block'] = 'Модуль: Блоки';

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
