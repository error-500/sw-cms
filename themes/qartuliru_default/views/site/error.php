<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="section-empty">
    <div class="container content">
        <div class="title-base">
            <hr />
            <h2><?= Html::encode($this->title) ?></h2>
            <p>Genuine and delicious</p>
            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
            </div>
        </div>
    </div>
</div>