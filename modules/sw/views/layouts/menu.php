<?php

use app\modules\sw\widgets\swnav\SwNav;

$main_menu = [
    // Общее меню
    // '<li class="navigation-header"><span>Система</span> <i class="icon-menu" title="Система"></i></li>',
    ['label' => 'Главная', 'icon' => 'icon-home4', 'url' => ['/sw/dashboard/index']],
    ['label' => 'Пользователи', 'icon' => 'icon-users2', 'url' => ['/sw/user/index']],
    '<li class="navigation-header"><span>Модули</span> <i class="icon-menu" title="Модули"></i></li>',
    ['label' => 'Константы', 'icon' => 'icon-infinite', 'url' => ['/sw/constant/item/index']],
    ['label' => 'Файловый менеджер', 'icon' => 'icon-file-plus', 'url' => ['/sw/file_manager/item/index']],
    ['label' => 'Страницы', 'icon' => 'icon-file-text2', 'url' => ['/sw/page/item/index']],
    ['label' => 'Блоки', 'icon' => 'icon-stack4', 'url' => ['/sw/block/item/index']],
    ['label' => 'Слайдеры', 'icon' => 'icon-stack', 'items' => [
        ['label' => 'Группы', 'url' => ['/sw/slider/group/index']],
        ['label' => 'Элементы', 'url' => ['/sw/slider/item/index']],
    ]],
    ['label' => 'Блоги', 'icon' => 'icon-magazine', 'items' => [
        ['label' => 'Группы', 'url' => ['/sw/blog/group/index']],
        ['label' => 'Элементы', 'url' => ['/sw/blog/item/index']],
    ]],
    ['label' => 'Галерея', 'icon' => 'icon-images3', 'items' => [
        ['label' => 'Группы', 'url' => ['/sw/gallery/group/index']],
        ['label' => 'Элементы', 'url' => ['/sw/gallery/item/index']],
    ]],
    ['label' => 'Товар', 'icon' => 'icon-price-tag', 'items' => [
        ['label' => 'Группы', 'url' => ['/sw/product/group/index']],
        ['label' => 'Элементы', 'url' => ['/sw/product/item/index']],
    ]],
    ['label' => 'Перевод', 'icon' => 'icon-earth', 'items' => [
        ['label' => 'Языки', 'url' => ['/sw/lang/lang/index']],
        ['label' => 'Словарь', 'url' => ['/sw/lang/lang-translate/index']],
    ]],
    // В разработке
    // ['label' => 'Модули', 'visible' => Yii::$app->user->can('admin'), 'icon' => 'icon-puzzle4', 'url' => ['/swo/module/index']],
];

// $modules = \Yii::$app->getModule('swo')->modules;
$modules_menu = [];

// if (!empty($modules)) {

//     $modules_menu = [
//         '<li class="navigation-header"><span>Модули</span> <i class="icon-menu" title="Модули"></i></li>',
//     ];

//     foreach ($modules as $data) {
//         if (is_object($data)) {
//             $modules_menu[] = (get_class($data))::getMenu();
//         } elseif (is_array($data) && !empty($data['class'])) {
//             $modules_menu[] = ($data['class'])::getMenu();
//         }
//     }
// }

$menu_items = array_merge($main_menu, $modules_menu);

// Пример вложенного меню
// ['label' => 'Управление', 'visible' => Yii::$app->user->can('admin'), 'icon' => 'fa fa-cogs', 'items' => [
//     ['label' => 'Партнеры', 'url' => ['/admin/partner/index']],
//     ['label' => 'Пользователи', 'url' => ['/admin/user/index']],
// ]],

// Разделители:
// Для блоков меню
// <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
// Для сабменю
// <li class="navigation-divider"></li>

?>

<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <?= SwNav::widget([
            'options' => ['class' => 'navigation navigation-main navigation-accordion'],
            'items' => $menu_items,
        ]) ?>
    </div>
</div>