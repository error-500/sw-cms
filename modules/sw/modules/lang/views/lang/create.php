<?php

use yii\helpers\Html;

$this->title = 'Добавить язык';

?>
<div class="lang-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
