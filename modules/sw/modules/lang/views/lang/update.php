<?php

use yii\helpers\Html;

$this->title = 'Обновить язык: ' . $model->name;

?>
<div class="lang-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
