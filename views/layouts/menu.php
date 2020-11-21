<?php

use yii\helpers\Url;

$menu = Yii::$app->sw->getModule('product')->group('find')
    ->alias('mg')
    ->where(['mg.parent_id' => null])
    ->joinWith([
        'groups gs' => function($query) {
            $query->orderBy('gs.pos ASC');
        }
    ])
    ->orderBy('mg.pos ASC')
    ->all();

?>

<ul class="nav navbar-nav">
    <li><a href="<?= Url::to('/news') ?>">Лента <span class="caret"></span></a></li>
    
    <?php foreach ($menu as $main_product): ?>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><?= $main_product->name ?> <span class="caret"></span></a>
            <ul class="dropdown-menu multi-level">
                <?php foreach ($main_product->groups as $group): ?>
                    <li><a href="<?= Url::to(["/menu/{$group->tech_name}"]) ?>"><?= $group->name ?></a></li>
                <?php endforeach ?>
            </ul>
        </li>
    <?php endforeach ?>

    <li><a href="<?= Url::to('/delivery') ?>">Доставка <span class="caret"></span></a></li>
    <li><a href="<?= Url::to('/reservation') ?>">Бронь <span class="caret"></span></a></li>
    <li><a href="<?= Url::to('/contacts') ?>">Контакты <span class="caret"></span></a></li>
</ul>