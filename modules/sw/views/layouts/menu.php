<?php

use main\helpers\AutoUrl;
use app\modules\sw\widgets\swnav\SwNav;
$prefix = '/'.implode(
    '/',
    array_filter([
        AutoUrl::rootModuleId(),
        AutoUrl::getLanguageSection()
        ])
);
$main_menu = [
    // Общее меню
    // '<li class="navigation-header"><span>Система</span> <i class="icon-menu" title="Система"></i></li>',
    [
        'label' => 'Главная',
        'icon' => 'icon-home4',
        'url' => [$prefix.'/dashboard/index']
    ],
    [
        'label' => 'Languages',
        'icon' => 'icon-earth',
        'items' => [
                [
                    'label' => 'En',
                    'url' => ['/sw/en-US']
                ],
                [
                    'label' => 'Ru',
                    'url' => ['/sw']
            ],
        ],
    ],
    [
        'label' => 'Пользователи',
        'icon' => 'icon-users2',
        'url' => [$prefix.'/user/index']
    ],
    '<li class="navigation-header"><span>Модули</span> <i class="icon-menu" title="Модули"></i></li>',
    [
        'label' => 'Константы',
        'icon' => 'icon-infinite',
        'url' => [$prefix.'/constant/item/index']
    ],
    [
        'label' => 'Файловый менеджер',
        'icon' => 'icon-file-plus',
        'url' => [$prefix.'/file_manager/item/index']
    ],
    [
        'label' => 'Страницы',
        'icon' => 'icon-file-text2',
        'url' => [$prefix.'/page/item/index']],
    [
        'label' => 'Блоки',
        'icon' => 'icon-stack4',
        'url' => [$prefix.'/block/item/index']
    ],
    [
        'label' => 'Слайдеры',
        'icon' => 'icon-stack',
        'items' => [
                [
                    'label' => 'Группы',
                    'url' => [$prefix.'/slider/group/index']
                ],
                [
                    'label' => 'Элементы',
                    'url' => [$prefix.'/slider/item/index']
            ],
        ]
    ],
    [
        'label' => 'Блоги',
        'icon' => 'icon-magazine',
        'items' => [
            [
                'label' => 'Группы',
                'url' => [$prefix.'/blog/group/index']
            ],
            [
                'label' => 'Элементы',
                'url' => [$prefix.'/blog/item/index']
            ],
        ]
    ],
    [
        'label' => 'Галерея',
        'icon' => 'icon-images3',
        'items' => [
            [
                'label' => 'Группы',
                'url' => [$prefix.'/gallery/group/index']
            ],
            [
                'label' => 'Элементы',
                'url' => [$prefix.'/gallery/item/index']],
        ]
    ],
    [
        'label' => 'Товар',
        'icon' => 'icon-price-tag',
        'items' => [
            [
                'label' => 'Группы',
                'url' => [$prefix.'/product/group/index']
            ],
            [
                'label' => 'Элементы',
                'url' => [$prefix.'/product/item/index']
            ],
        ]
    ],
    /*[
        'label' => 'Перевод',
        'icon' => 'icon-earth',
        'items' => [
            [
                'label' => 'Языки',
                'url' => [$ref.'/lang/lang/index']
            ],
            [
                'label' => 'Словарь',
                'url' => [$ref.'/lang/lang-translate/index']
            ],
        ]
    ],*/
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