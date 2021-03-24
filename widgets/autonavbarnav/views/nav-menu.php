<?php

use yii\helpers\Url;
$lang = Yii::$app->language === Yii::$app->sourceLanguage
            ? null
            : Yii::$app->language.'/';
?>

<ul class="navbar-nav flex-grow-1">
    <li class="nav-item"><a class="nav-link"
           href="<?= Url::to("/{$lang}news") ?>">
            <?php echo Yii::t('app', 'Лента'); ?>
            <span class="caret"></span></a>
    </li>

    <?php foreach ($products as $mIdx => $main_product): ?>
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
               href="<?= Url::to(["/{$lang}menu/{$group->tech_name}"]) ?>">
                <?= $group->name ?>
            </a>
            <?php endif; ?>
            <?php endforeach ?>
        </div>
    </li>
    <?php endforeach ?>

    <li class="nav-item"><a class="nav-link"
           href="<?= Url::to("/{$lang}delivery") ?>"><?php echo Yii::t('app', 'Доставка'); ?></a></li>
    <li class="nav-item"><a class="nav-link"
           href="<?= Url::to("/{$lang}reservation") ?>">
            <?php echo Yii::t('app', 'Бронь'); ?></a></li>
    <?php foreach( $pages as $page): ?>
    <li class="nav-item">
        <a class="nav-link"
           href="<?php echo Url::to("/{$lang}page/{$page->tech_name}"); ?>">
            <?php echo $page->menu_name; ?>
        </a>
    </li>
    <?php endforeach; ?>
    <li class="nav-item"><a class="nav-link"
           href="<?= Url::to("/{$lang}contacts") ?>">
            <?php echo Yii::t('app', 'Контакты'); ?></a></li>
</ul>