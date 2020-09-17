<?php

use yii\helpers\Html;

$this->title = 'Обновление пользователя';
$this->params['block'] = 'Система';
$this->params['title'] = 'Обновление пользователя';

?>

<div class="user-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
