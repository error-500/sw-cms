<?php

use yii\widgets\ListView;
use yii\helpers\Url;
use yii\helpers\Html;

$header_img = $page->imgSrc ?? '/theme/main/images/bg-23.jpg';

if (!empty($page)) {
    $this->title = $page->title;
    $this->params['keywords'] = $page->keywords;
    $this->params['description'] = $page->description;
}

?>
<div class="header-title ken-burn white"
     data-parallax="scroll"
     data-bleed="0"
     data-position="top"
     data-image-src="<?= $header_img ?>">
    <div class="container">
        <div class="title-base">
            <hr class="anima" />
            <?= $page->text ?? '' ?>
        </div>
    </div>
</div>

<div class="section-empty section-item">
    <div class="container content">
        <div class="row">
            <div class="col-lg-2 col-xs-12">
                <aside id="menu"
                       class="sidebar mi-menu">
                    <nav class="sidebar-nav">
                        <ul class="list-group accordion-list">
                            <?php foreach ($menu as $base_menu): ?>
                            <?php
                                    $is_active = false;

                                    if (!empty($base_menu->groups[$sub_group_name])) {
                                        $is_active = true;
                                    }
                                ?>
                            <li class="list-group-item <?= $is_active ? 'active-panel' : '' ?>">

                                <?= Html::tag('a', $base_menu->name, [
                                        'data-toggle' => 'collapse',
                                        'class' => $is_active ? 'active' : '',
                                        'data-target' => "#menu-{$base_menu->tech_name}",
                                        'aria-expanded' => $is_active ? "true" : "false",
                                        'aria-controls' => "menu-{$base_menu->tech_name}"
                                    ]) ?>

                                <div class="collapse"
                                     id="menu-<?php echo $base_menu->tech_name; ?>">
                                    <ul>
                                        <?php foreach ($base_menu->groups as $sub_group): ?>
                                        <li>
                                            <?php $name = $sub_group->tech_name != $sub_group_name ? $sub_group->name : Html::tag('b', $sub_group->name) ?>
                                            <?= Html::a(
                                                $name,
                                                ["/delivery/{$sub_group->tech_name}"],
                                                [
                                                    'data-toggle' => 'collapse-close',
                                                    'data-target' => '#menu-main',
                                                    'aria-expanded' => 'true'
                                                ]) ?>
                                        </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </nav>
                </aside>
            </div>
            <div class="col-lg-10 col-xs-12">
                <div class="grid-list">
                    <?php foreach (array_chunk($show_menu_items, 3) as $chunk_item): ?>
                    <div class="grid-box row">
                        <?php foreach ($chunk_item as $item): ?>
                        <div class="col-md-4">
                            <div class="advs-box advs-box-top-icon-img advs-box-delivery">
                                <a class="img-box"
                                   href="#">
                                    <span><img src="<?= $item->imgThumbSrc ?>"
                                             alt=""></span>
                                </a>
                                <div class="advs-box-content">
                                    <!-- <h4><?= $item->price ?> ₽</h4> -->
                                    <h3><?= $item->name ?></h3>
                                    <span class="extra-content bg-green price add-to-cart"
                                          data-id="<?= $item->id ?>">Добавить <i class="fa im-add-cart"></i> </span>
                                    <p><?= $item->consist ?></p>
                                    <p class="sub"><?= $item->volume ?></p>
                                    <h3><?= $item->price ?> ₽</h3>
                                </div>
                            </div>
                            <hr class="space m" />
                        </div>
                        <?php endforeach ?>
                    </div>
                    <?php endforeach ?>
                </div>
                <hr class="space" />
            </div>
        </div>
    </div>
</div>
<?php $this->registerCss('
    a:hover {
        text-decoration: none;
    }
');