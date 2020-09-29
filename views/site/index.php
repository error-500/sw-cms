<?php

if (!empty($page)) {
    $this->title = $page->title;
    $this->params['keywords'] = $page->title;
    $this->params['description'] = $page->description;
}

?>
<div class="section-bg-video grunge-border">
    <div class="bg-overlay transparent-dark"></div>
    <div class="videobox">
        <video autoplay loop muted poster="/theme/main/images/video-1-poster.jpg">
            <source src="<?= $video->imgSrc ?>" type="video/mp4">
        </video>
    </div>
    <div class="container content overlay-content white text-center" data-anima="fade-top" data-timeline="asc" data-time="1000">
        <?= $video->text ?>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="row">
            <div class="col-md-6 col-sm-12 text-center-sm">
                <?= $about->text ?>
            </div>
            <div class="col-md-6 col-sm-12 text-center-sm" data-anima="fade-right">
                <hr class="space m visible-sm" />
                <a class="img-box lightbox shadow-1" href="<?= $about->imgSrc ?>" data-lightbox-anima="show-scale">
                    <img src="<?= $about->imgSrc ?>" alt="">
                </a>
            </div>
        </div>
        <hr class="space m" />
        <hr />
        <hr class="space m" />
        <?= $our_place->text ?>
        <div class="row">
            <?php $block_size = 12 / count($our_place->items) ?>
            <?php foreach ($our_place->items as $item): ?>
                <div class="col-md-<?= $block_size ?>">
                    <div class="img-box adv-img adv-img-full-content">
                        <div class="img-box">
                            <img src="<?= $item->imgSrc ?>" alt="" />
                        </div>
                        <a href="#" class="caption-bg img-box">
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
        <div class="title-base">
            <hr />
            <h2>Наше меню</h2>
            <p>Грузинская кухня - это контраст пряного и острого. Это насыщенный вкус и необычная подача</p>
        </div>
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
        <div class="text-center">
            <a href="#" class="btn btn-sm">Меню полностью</a>
        </div>
    </div>
</div>
<div class="section-bg-image parallax-window white" data-natural-height="850" data-natural-width="1920" data-parallax="scroll" data-image-src="/theme/main/images/bg-3.jpg">
    <div class="container content">
        <div class="row">
            <div class="col-md-8 col-center">
                <div class="flexslider slider outer-navs" data-options="controlNav:true,directionNav:true">
                    <ul class="slides">
                        <li>
                            <div class="advs-box advs-box-top-icon niche-box-testimonails">
                                <i class="fa text-xl circle onlycover" style="background-image:url('/theme/main/images/users/user-1.jpg')"></i>
                                <p>
                                    Lorem ipsum dolor sitamet, consectetur adipisicing elito, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniamqrem aperiam.
                                </p>
                                <h5>Simone Parotti</h5>
                            </div>
                        </li>
                        <li>
                            <div class="advs-box advs-box-top-icon niche-box-testimonails">
                                <i class="fa text-xl circle onlycover" style="background-image:url('/theme/main/images/users/user-2.jpg')"></i>
                                <p>
                                    Lorem ipsum dolor sitamet, consectetur adipisicing elito, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniamqrem aperiam.
                                </p>
                                <h5>Francesca Pariset</h5>
                            </div>
                        </li>
                        <li>
                            <div class="advs-box advs-box-top-icon niche-box-testimonails">
                                <i class="fa text-xl circle onlycover" style="background-image:url('/theme/main/images/users/user-3.jpg')"></i>
                                <p>
                                    Lorem ipsum dolor sitamet, consectetur adipisicing elito, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniamqrem aperiam.
                                </p>
                                <h5>Andrea Michelon</h5>
                            </div>
                        </li>
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
            <h2>TODAY'S BEST OFFERTS</h2>
            <p>A new taste every day</p>
        </div>
        <hr class="space m" />
         
        <div class="row" data-anima="fade-bottom" data-timeline="asc" data-timeline-time="200" data-ti>
            <div class="col-md-4 anima">
                <div class="advs-box advs-box-top-icon-img">
                    <a class="img-box" href="#">
                        <span><img src="/theme/main/images/gallery/image-44.jpg" alt=""></span>
                    </a>
                    <div class="advs-box-content">
                        <h3><a href="#">Rice with wild boar liver and cutted cheese from Texas</a></h3>
                        <span class="extra-content">DOLOMITI</span>
                        <p>
                            Interdum iusto pulvinar consequuntur augue optio repellat fugaurus expedita fusce temporibus malesio.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 anima">
                <div class="advs-box advs-box-top-icon-img">
                    <a class="img-box" href="#">
                        <span><img src="/theme/main/images/gallery/image-45.jpg" alt=""></span>
                    </a>
                    <div class="advs-box-content">
                        <h3><a href="#">Montana Speck from Dolomiti mountains with cheese</a></h3>
                        <span class="extra-content">FAST FOOD</span>
                        <p>
                            Interdum iusto pulvinar consequuntur augue optio repellat fugaurus expedita fusce temporibus malesio.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 anima">
                <div class="advs-box advs-box-top-icon-img">
                    <a class="img-box" href="#">
                        <span><img src="/theme/main/images/gallery/image-46.jpg" alt=""></span>
                    </a>
                    <div class="advs-box-content">
                        <h3><a href="#">Wild mountain mushroom skewerss with pork and salads</a></h3>
                        <span class="extra-content">MOUNTAIN</span>
                        <p>
                            Interdum iusto pulvinar consequuntur augue optio repellat fugaurus expedita fusce temporibus malesio.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="space m" />
        <div class="row" data-anima="fade-bottom" data-timeline="asc" data-timeline-time="200" data-ti>
            <div class="col-md-4 anima">
                <div class="advs-box advs-box-top-icon-img">
                    <a class="img-box" href="#">
                        <span><img src="/theme/main/images/gallery/image-11.jpg" alt=""></span>
                    </a>
                    <div class="advs-box-content">
                        <h3><a href="#">Donut with red cranberries of the italian dolomites</a></h3>
                        <span class="extra-content">BARBECUE</span>
                        <p>
                            Interdum iusto pulvinar consequuntur augue optio repellat fugaurus expedita fusce temporibus malesio.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 anima">
                <div class="advs-box advs-box-top-icon-img">
                    <a class="img-box" href="#">
                        <span><img src="/theme/main/images/gallery/image-47.jpg" alt=""></span>
                    </a>
                    <div class="advs-box-content">
                        <h3><a href="#">Montana Cheese Burger with home made macon and onion</a></h3>
                        <span class="extra-content">FAST FOOD</span>
                        <p>
                            Interdum iusto pulvinar consequuntur augue optio repellat fugaurus expedita fusce temporibus malesio.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 anima">
                <div class="advs-box advs-box-top-icon-img">
                    <a class="img-box" href="#">
                        <span><img src="/theme/main/images/gallery/image-48.jpg" alt=""></span>
                    </a>
                    <div class="advs-box-content">
                        <h3><a href="#">Wild mountain mushroom skewerss with pork and salads</a></h3>
                        <span class="extra-content">MOUNTAIN</span>
                        <p>
                            Interdum iusto pulvinar consequuntur augue optio repellat fugaurus expedita fusce temporibus malesio.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-bg-color">
    <div class="container content">
        <div class="row">
            <div class="col-md-6">
                <img src="/theme/main/images/chefs-2.png" alt="" />
            </div>
            <div class="col-md-6">
                <div class="content">
                    <div class="title-base text-left">
                        <hr />
                        <h2>Our chefs</h2>
                        <p>Starred Michelin chiefs</p>
                    </div>
                    <p>
                        Tincidunt integer eu augue augue nunc elit dolor, luctus placerat scelerisque euismod, iaculis eu lacus nunc mit amet consectetur adipiscing elitsed do eiusmod tempor elit vehicula.
                        Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                        Utenim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <hr class="space s" />
                    <a href="#" class="btn btn-sm btn-border">Our story</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="row">
            <?= $work_time->text ?>
        </div>
    </div>
</div>