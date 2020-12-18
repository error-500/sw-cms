<?php

use yii\helpers\Url;

if (!empty($page)) {
    $this->title = $page->title;
    $this->params['keywords'] = $page->keywords;
    $this->params['description'] = $page->description;
}

?>
<div class="section-bg-video grunge-border">
    <div class="bg-overlay transparent-dark"></div>
    <div class="videobox">
        <video autoplay
               loop
               muted
               poster="/theme/main/images/video-1-poster.jpg">
            <source src="<?= $video_block->imgSrc ?>"
                    type="video/mp4">
        </video>
    </div>
    <div class="container content overlay-content white text-center"
         data-anima="fade-top"
         data-timeline="asc"
         data-time="1000">
        <?= $video_block->text ?>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="row">
            <div class="col-md-6 col-sm-12 text-center-sm">
                <?= $about_block->text ?>
            </div>
            <div class="col-md-6 col-sm-12 text-center-sm"
                 data-anima="fade-right">
                <hr class="space m visible-sm" />
                <a class="img-box lightbox shadow-1"
                   href="<?= $about_block->imgSrc ?>"
                   data-lightbox-anima="show-scale">
                    <img src="<?= $about_block->imgSrc ?>"
                         alt="">
                </a>
            </div>
        </div>
    </div>
</div>
<div class="section-bg-color">
    <div class="container content">
        <?= $our_place_slider->text ?>
        <div class="row">
            <?php $block_size = 12 / count($our_place_slider->items) ?>
            <?php foreach ($our_place_slider->items as $item): ?>
            <div class="col-md-<?= $block_size ?>">
                <div class="img-box adv-img adv-img-full-content">
                    <div class="img-box">
                        <img src="<?= $item->imgSrc ?>"
                             alt="" />
                    </div>
                    <a href="<?= $item->href ?: '#' ?>"
                       class="caption-bg img-box">
                        <div class="caption">
                            <div class="inner">
                                <h2><?= $item->title ?></h2>
                                <p class="sub"> <?= $item->text ?> </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- <div class="section-bg-color overflow-visible">
    <div class="container content">
        <div class="row">
            <div class="col-md-3">
                <div class="title-base text-left">
                    <hr />
                    <h2>Book a table</h2>
                    <p>A table only for you</p>
                </div>
            </div>
            <div class="col-md-9">
                <script type='text/javascript' src='http://www.opentable.com/widget/reservation/loader?rid=347401&domain=com&type=standard&theme=wide&lang=en&overlay=false&iframe=false'></script>
            </div>
        </div>
    </div>
</div> -->
<div class="section-empty">
    <div class="container content">
        <?= $menu_random_block_text[0] ?? '' ?>
        <hr class="space s" />
        <div class="row">
            <div class="col-md-6">
                <div class="list-items">
                    <?php foreach (array_chunk($menu_random, 5)[0] ?? [] as $item): ?>
                    <div class="list-item">
                        <div class="row">
                            <div class="col-md-9">
                                <h3><?= $item->name ?></h3>
                                <p><?= $item->about ?></p>
                            </div>
                            <div class="col-md-3">
                                <span><?= $item->price ?> ₽</span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="list-items">
                    <?php foreach (array_chunk($menu_random, 5)[1] ?? [] as $item): ?>
                    <div class="list-item">
                        <div class="row">
                            <div class="col-md-9">
                                <h3><?= $item->name ?></h3>
                                <p><?= $item->about ?></p>
                            </div>
                            <div class="col-md-3">
                                <span><?= $item->price ?> ₽</span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <hr class="space l" />
        <?= $menu_random_block_text[1] ?? '' ?>
    </div>
</div>
<div class="section-bg-image parallax-window white"
     data-natural-height="850"
     data-natural-width="1920"
     data-parallax="scroll"
     data-image-src="<?= $chefs_main_block_file->filePath ?>">
    <div class="container content">
        <div class="row">
            <div class="col-md-8 col-center">
                <div class="flexslider slider outer-navs"
                     data-options="controlNav:true,directionNav:true">
                    <ul class="slides">
                        <?php foreach ($quotes_slider->items as $quote): ?>
                        <li>
                            <div class="advs-box advs-box-top-icon niche-box-testimonails">
                                <i class="fa text-xl circle onlycover"
                                   style="background-image:url('<?= $quote->imgSrc ?>')"></i>
                                <?= $quote->text ?>
                            </div>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="title-base">
            <hr />
            <?= $delivery_slider->text ?>
        </div>
        <hr class="space m" />
        <div class="row"
             data-anima="fade-bottom"
             data-timeline="asc"
             data-timeline-time="200"
             data-ti>
            <div class="col-md-12">
                <div class="grid-list">
                    <?php foreach (array_chunk($random_delivery_menu, 3) as $chunk_item): ?>
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
            </div>
        </div>
        <div class="text-center">
            <a href="<?= Url::to('/delivery') ?>"
               class="btn btn-border btn-sm anima anima-fade-bottom">В магазин</a>
        </div>
    </div>
</div>
<div class="section-bg-color">
    <div class="container content">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= $chefs_main_block->imgSrc ?>"
                     alt="" />
            </div>
            <div class="col-md-6">
                <div class="content">
                    <?= $chefs_main_block->text ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-map box-middle-container row-18">
    <div class="google-map">
        <?= $map_constant->value ?>
    </div>
    <div class="overlaybox overlaybox-side overlaybox">
        <div class="container content">
            <div class="row">
                <div class="col-md-6 overlaybox-inner box-middle"
                     data-anima="fade-left">
                    <div class="row">
                        <?= $contacts_block_text[0] ?? '' ?>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
</div>