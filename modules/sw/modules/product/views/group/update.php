<?php

use yii\helpers\Html;

$this->title = 'Обновить Группу';
$this->params['block'] = 'Модуль: Товар';
$this->params['title'] = 'Обновить группу';

?>

<div class="constant-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

