<?php

use yii\helpers\Html;

$this->title = 'Добвить константу';
$this->params['block'] = 'Система';
$this->params['title'] = 'Добвить константу';

?>

<div class="constant-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>