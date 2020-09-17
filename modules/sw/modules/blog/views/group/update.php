<?php

use yii\helpers\Html;

$this->title = 'Обновить Группу';
$this->params['block'] = 'Модуль: Инфоблоки';
$this->params['title'] = 'Обновить группу';

?>

<div class="constant-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

