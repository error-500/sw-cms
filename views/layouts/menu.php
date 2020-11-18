<?php

use yii\helpers\Url;

$delivery = Yii::$app->sw->getModule('product')->group('find')
    ->where(['it.is_delivery' => 1])
    ->joinWith([
        'groups g2' => function($query) {
            $query->joinWith([
                'items it' => function($query) {
                    $query->orderBy('pos ASC');
                }, 
                'parent p2'
            ])->indexBy('tech_name');
        }
    ])
    ->all();

?>

<ul class="nav navbar-nav">
    <li><a href="<?= Url::to('/news') ?>">Лента <span class="caret"></span></a></li>
    
    <?php foreach (Yii::$app->sw->getModule('product')->group('find')->where(['parent_id' => null])->orderBy('pos ASC')->all() as $main_product): ?>
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