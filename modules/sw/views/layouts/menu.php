<?php

use app\modules\sw\widgets\swnav\SwNav;
$ref = '/'.Yii::$app->controller->module->module->uniqueId;
$jump = explode('/',Yii::$app->controller->uniqueId);
array_shift($jump);
$main_menu = [
    // Общее меню
    // '<li class="navigation-header"><span>Система</span> <i class="icon-menu" title="Система"></i></li>',
    [
        'label' => 'Главная',
        'icon' => 'icon-home4',
        'url' => ['/sw/dashboard/index']
    ],
    [
        'label' => 'EN',
        'icon' => 'icon-earth',
        'url' => ['/sw/en-US/'.implode('/', $jump)]
    ],
    [
        'label' => 'Пользователи',
        'icon' => 'icon-users2',
        'url' => [$ref.'/user/index']
    ],
    '<li class="navigation-header"><span>Модули</span> <i class="icon-menu" title="Модули"></i></li>',
    [
        'label' => 'Константы',
        'icon' => 'icon-infinite',
        'url' => [$ref.'/constant/item/index']
    ],
    [
        'label' => 'Файловый менеджер',
        'icon' => 'icon-file-plus',
        'url' => [$ref.'/file_manager/item/index']
    ],
    [
        'label' => 'Страницы',
        'icon' => 'icon-file-text2',
        'url' => [$ref.'/page/item/index']],
    [
        'label' => 'Блоки',
        'icon' => 'icon-stack4',
        'url' => [$ref.'/block/item/index']
    ],
    [
        'label' => 'Слайдеры',
        'icon' => 'icon-stack',
        'items' => [
                [
                    'label' => 'Группы',
                    'url' => [$ref.'/slider/group/index']
                ],
                [
                    'label' => 'Элементы',
                    'url' => [$ref.'/slider/item/index']
            ],
        ]
    ],
    [
        'label' => 'Блоги',
        'icon' => 'icon-magazine',
        'items' => [
            [
                'label' => 'Группы',
                'url' => [$ref.'/blog/group/index']
            ],
            [
                'label' => 'Элементы',
                'url' => [$ref.'/blog/item/index']
            ],
        ]
    ],
    [
        'label' => 'Галерея',
        'icon' => 'icon-images3',
        'items' => [
            [
                'label' => 'Группы',
                'url' => [$ref.'/gallery/group/index']
            ],
            [
                'label' => 'Элементы',
                'url' => [$ref.'/gallery/item/index']],
        ]
    ],
    [
        'label' => 'Товар',
        'icon' => 'icon-price-tag',
        'items' => [
            [
                'label' => 'Группы',
                'url' => [$ref.'/product/group/index']
            ],
            [
                'label' => 'Элементы',
                'url' => [$ref.'/product/item/index']
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