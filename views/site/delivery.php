<?php

use yii\widgets\ListView;
use yii\helpers\Url;

$header_img = $page->imgSrc ?? '/theme/main/images/bg-23.jpg';

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
            <?= $page->text ?? '' ?>
        </div>
    </div>
</div>
<div class="section-empty section-item">
    <div class="container content">
        <div class="row">
            <div class="col-md-12">
                <h3 id="dishes" class="text-black">First dishes</h3>
                <div class="maso-list list-sm-6 col-margins">
                    <div class="navbar navbar-inner">
                        <div class="navbar-toggle"><i class="fa fa-bars"></i><span>MENU</span><i class="fa fa-angle-down"></i></div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav over inner maso-filters scroll-spy-menu">
                                <li class="active"><a data-filter="maso-item">Все</a></li>
                                <?php foreach ($group->groups as $sub_menu): ?>
                                    <li><a data-filter="<?= $sub_menu->tech_name ?>"><?= $sub_menu->name ?></a></li>
                                <?php endforeach ?>
                                <!-- <li><a class="maso-order" data-sort="asc"><i class="fa fa-arrow-down"></i></a></li> -->
                            </ul>
                        </div>
                    </div>

                    <div class="grid-list">
                        <div class="grid-box maso-box row">
                            <style type="text/css">
                                .advs-box-delivery i {
                                    margin-right: 0px;
                                }
                            </style>
                            <?php foreach ($group->groups as $sub_menu): ?>
                                <?php foreach ($sub_menu->items as $item): ?>
                                    <div class="grid-item maso-item col-md-4 <?= $sub_menu->tech_name ?>">
                                        <div class="advs-box advs-box-top-icon-img advs-box-delivery">
                                            <a class="img-box" href="#">
                                                <span><img src="<?= $item->imgThumbSrc ?>" alt=""></span>
                                            </a>
                                            <div class="advs-box-content text-danger">
                                                <h3><?= $item->name ?></h3>
                                                <span class="extra-content bg-green price"><?= $item->price ?> ₽</span>
                                                <p><?= $item->consist ?></p>
                                                <p class="sub"><?= $item->volume ?></p>
                                            </div>
                                            <a href="#" class="btn btn-border btn-xs add-to-cart" data-id="<?= $item->id ?>"><i class="fas fa-plus"></i></a>
                                        </div>
                                        <hr class="space m" />
                                    </div>
                                <?php endforeach ?>
                            <?php endforeach ?>
                        <div class="clear"></div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>