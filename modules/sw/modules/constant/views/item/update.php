<?php

use yii\helpers\Html;

$this->title = 'Обновление константы';
$this->params['block'] = 'Система';
$this->params['title'] = 'Обновление константы';
?>
<div class="constant-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
