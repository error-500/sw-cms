<?php

$header_img = $group->imgSrc ?: '/theme/main/images/bg-23.jpg';

if (!empty($page)) {
    $this->title = $page->title;
    $this->params['keywords'] = $page->keywords;
    $this->params['description'] = $page->description;
}

?>
<!-- <div class="header-title ken-burn white" data-parallax="scroll" data-bleed="0" data-position="top" data-natural-height="850" data-natural-width="1920" data-image-src="<?= $header_img ?>"> -->
<div class="header-title ken-burn white"
     data-parallax="scroll"
     data-bleed="0"
     data-position="top"
     data-image-src="<?= $header_img ?>">
    <div class="container">
        <div class="title-base">
            <hr class="anima" />
            <h1><?= $group->name ?></h1>
            <p><?= $group->text ?></p>
        </div>
    </div>
</div>

<div class="section-bg-image">
    <div class="container content">
        <div class="row">
            <div class="col-md-12">
                <!-- <h3 id="dishes" class="text-black"></h3> -->
                <div class="maso-list list-sm-6 col-margins">
                    <div class="navbar navbar-inner">
                        <div class="navbar-toggle"
                             data-toggle="collapse"
                             data-target="#mobMenu"><i class="fa fa-bars"></i><span>Разделы</span><i
                               class="fa fa-angle-down"></i></div>
                        <div class="collapse navbar-collapse"
                             id="mobMenu">
                            <ul class="nav navbar-nav over inner maso-filters scroll-spy-menu">
                                <li class="active"><a data-filter="maso-item">Все</a></li>
                                <?php foreach ($groups as $sub_group): ?>
                                <li><a data-filter="<?= $sub_group->tech_name ?>"><?= $sub_group->name ?></a></li>
                                <?php endforeach ?>
                                <!-- <li><a class="maso-order" data-sort="asc"><i class="fa fa-arrow-down"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="maso-box row"
                         data-lightbox-anima="fade-top">
                        <div class="list-items row">
                            <?php foreach ($items as $item): ?>
                            <div class=" col-md-6 col-xs-12 maso-item <?= $item->group->tech_name ?>">
                                <div class="list-item row">
                                    <div class="list-item-img">
                                        <div class="col-md-5 col-xs-6">
                                            <i class="onlycover icon"
                                               style="background-image:url(<?= $item->imgSrc ?>)"></i>
                                        </div>
                                        <div class="col-md-5 col-xs-6">

                                            <h3><?= trim($item->name) ?></h3>
                                            <p><?= !empty($item->consist) ? "{$item->consist}<br>" : '' ?>
                                                <?= !empty($item->volume) ? "{$item->volume}" : '' ?></p>
                                        </div>
                                        <div class="col-md-2 col-xs-12">
                                            <span class="text-md-left text-xs-center"><?= $item->price ?>₽</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
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