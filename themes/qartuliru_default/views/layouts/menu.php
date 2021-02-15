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

<ul class="navbar-nav flex-grow-1">
    <li class="nav-item"><a class="nav-link"
           href="<?= Url::to('/news') ?>">Лента <span class="caret"></span></a></li>

    <?php foreach ($menu as $mIdx => $main_product): ?>
    <li class="nav-item dropdown">
        <a href="#"
           class="nav-link dropdown-toggle"
           data-toggle="dropdown"
           role="button"
           area-haspopup="true"
           id="main-menu-dropdown-<?php echo $mIdx; ?>"><?= $main_product->name ?></a>
        <div class="dropdown-menu multi-level"
             aria-labelledby="main-menu-dropdown-<?php echo $mIdx; ?>">
            <?php foreach ($main_product->groups as $group): ?>
            <?php if (!empty($group->groups)) : ?>
            <a class="dropdown-item"
               href="<?= Url::to(["/menu/{$group->tech_name}"]) ?>">
                <?= $group->name ?>
            </a>
            <?php endif; ?>
            <?php endforeach ?>
        </div>
    </li>
    <?php endforeach ?>

    <li class="nav-item"><a class="nav-link"
           href="<?= Url::to('/delivery') ?>">Доставка</a></li>
    <li class="nav-item"><a class="nav-link"
           href="<?= Url::to('/reservation') ?>">Бронь</a></li>
    <li class="nav-item"><a class="nav-link"
           href="<?= Url::to('/contacts') ?>">Контакты</a></li>
</ul>
