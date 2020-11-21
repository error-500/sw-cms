<?php

$header_img = $menu->imgSrc ?: '/theme/main/images/bg-23.jpg';

if (!empty($page)) {
    $this->title = $page->title;
    $this->params['keywords'] = $page->keywords;
    $this->params['description'] = $page->description;
}

?>
<div class="header-title ken-burn white" data-parallax="scroll" data-bleed="0" data-position="top" data-image-src="<?= $header_img ?>">
    <div class="container">
        <div class="title-base">
            <hr class="anima" />
            <h1><?= $menu->name ?></h1>
            <p><?= $menu->text ?></p>
        </div>
    </div>
</div>

<div class="section-empty">
    <div class="container content">
        <?php foreach ($menu->groups as $sub_menu): ?>
            <div class="title-base text-left">
                <hr />
                <h2><?= $sub_menu->name ?></h2>
                <!-- <p>Enjoy a sunny day with our breakfast</p> -->
            </div>
            <div class="row">
                <?php $chunks = array_chunk($sub_menu->items, round(count($sub_menu->items) / 2)) ?>
                <?php foreach ($chunks as $chunk): ?>
                    <div class="col-md-6">
                        <div class="list-items">
                            <?php foreach ($chunk as $item): ?>
                                <div class="list-item">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h3><?= $item->name ?></h3>
                                            <p><?= !empty($item->consist) ? '{$item->consist}<br>' ? '' ?> <?= !empty($item->volume) ? "{$item->volume}" : '' ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <span><?= $item->price ?>₽</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <hr class="space" />
        <?php endforeach ?>
    </div>
</div>
