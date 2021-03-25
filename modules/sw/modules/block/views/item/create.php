<?php

use yii\helpers\Html;

$this->title = 'Добавить блок';
$this->params['block'] = 'Модуль: Блоки';

?>

<?= $this->render('_form', [
    'model' => $model,
    'block' => $block,
    'templates' => $templates,
    'pages' => $pages,
]) ?>