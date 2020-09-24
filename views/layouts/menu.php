<?php

use yii\helpers\Url;

?>

<ul class="nav navbar-nav">
    <li><a href="<?= Url::to('/') ?>">Лента <span class="caret"></span></a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Меню <span class="caret"></span></a>
        <ul class="dropdown-menu multi-level">
            <?php foreach (Yii::$app->sw->getModule('product')->group('find')->where(['parent_id' => null])->orderBy('pos ASC')->all() as $group): ?>
                <li><a href="<?= Url::to(["/menu/{$group->tech_name}"]) ?>"><?= $group->name ?></a></li>
            <?php endforeach ?>
        </ul>
    </li>

    <li><a href="<?= Url::to('/') ?>">Доставка <span class="caret"></span></a></li>
    <li><a href="<?= Url::to('/') ?>">Бронь <span class="caret"></span></a></li>
    <li><a href="<?= Url::to('/') ?>">Контакты <span class="caret"></span></a></li>
</ul>