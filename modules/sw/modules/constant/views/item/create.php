<?php

use yii\helpers\Html;

$this->title = 'Добавить константу';
$this->params['block'] = 'Система';
$this->params['title'] = 'Добавить константу';

?>

<div class="constant-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>