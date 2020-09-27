<?php

$header_img = $menu->imgSrc ?: '/theme/main/images/bg-23.jpg';

if (!empty($page)) {
    $this->title = $page->title;
    $this->params['keywords'] = $page->title;
    $this->params['description'] = $page->description;
}

?>
<!-- <div class="header-title ken-burn white" data-parallax="scroll" data-bleed="0" data-position="top" data-natural-height="850" data-natural-width="1920" data-image-src="<?= $header_img ?>"> -->
<div class="header-title ken-burn white" data-parallax="scroll" data-bleed="0" data-position="top" data-image-src="<?= $header_img ?>">
    <div class="container">
        <div class="title-base">
            <hr class="anima" />
            <h1><?= $menu->name ?></h1>
            <p><?= $menu->text ?></p>
        </div>
    </div>
</div>

<!-- <div class="section-bg-image parallax-window" data-bleed="0" data-natural-height="2500" data-natural-width="1920" data-parallax="scroll" data-image-src="/theme/main/images/hd-portrait-2.jpg"> -->
<div class="section-bg-image">
    <div class="container content">
        <div class="row">
            <div class="col-md-12">
                <h3 id="dishes" class="text-black">First dishes</h3>
                <div class="maso-list list-sm-6 col-margins">
                    <div class="navbar navbar-inner">
                        <div class="navbar-toggle"><i class="fa fa-bars"></i><span>Разделы</span><i class="fa fa-angle-down"></i></div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav over inner maso-filters scroll-spy-menu">
                                <li class="active"><a data-filter="maso-item">Все</a></li>
                                <?php foreach ($menu->groups as $sub_menu): ?>
                                    <li><a data-filter="<?= $sub_menu->tech_name ?>"><?= $sub_menu->name ?></a></li>
                                <?php endforeach ?>
                                <!-- <li><a class="maso-order" data-sort="asc"><i class="fa fa-arrow-down"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="maso-box row" data-lightbox-anima="fade-top">
                        <?php foreach ($menu->groups as $sub_menu): ?>
                            <?php foreach ($sub_menu->items as $item): ?>
                                <div data-sort="1" class="maso-item col-md-4 <?= $sub_menu->tech_name ?>">
                                    <div class="img-box adv-img adv-img-half-content">
                                        <i class="fa fa-camera-retro anima"></i>
                                        <a href="#" class="img-box anima-scale-up anima">
                                            <img src="<?= $item->imgThumbSrc ?>" alt="" />
                                        </a>
                                        <div class="caption">
                                            <h2><?= $item->name ?></h2>
                                            <span class="extra-content"><?= $item->price ?>₽</span>
                                            <p><?= $item->consist ?></p>
                                            <p class="sub"><?= $item->volume ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php endforeach ?>
                        <div class="clear"></div>
                    </div>
                </div>
                <hr class="space" />
            </div>
            <!-- <div class="col-md-3">
                <div class="fixed-area" data-bottom="150">
                    <aside id="menu" class="sidebar mi-menu">
                        <nav class="sidebar-nav">
                            <ul class="side-menu">
                                <li class="active">
                                    <a href="#dishes">
                                        <i class="im-cauldron"></i>
                                        First dishes
                                    </a>
                                </li>
                                <li>
                                    <a href="#main">
                                        <i class="im-chef-hat2"></i>
                                        Main courses
                                    </a>
                                </li>
                                <li>
                                    <a href="#appetizers">
                                        <i class="im-cheese"></i>
                                        Appetizers
                                    </a>
                                </li>
                                <li>
                                    <a href="#desserts">
                                        <i class="im-cupcake"></i>
                                        Desserts
                                    </a>
                                </li>
                                <li>
                                    <a href="#drinks">
                                        <i class="im-beer"></i>
                                        Drinks
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </aside>
                </div>
            </div> -->
        </div>
    </div>
</div>
