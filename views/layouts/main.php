<?php

use yii\helpers\Html;

use app\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 10]> <html  lang="en" class="iex"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="<?= Yii::$app->language ?>">
<!--<![endif]-->
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= Html::encode($this->title) ?>">
    
    <link rel="icon" href="/theme/images/favicon.png">

    <title><?= Html::encode($this->title) ?></title>

    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <div id="preloader"></div>
    <div class="footer-parallax-container">
        <header class="fixed-top bg-transparent menu-transparent scroll-change wide-area" data-menu-anima="fade-in">
            <div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top" role="navigation">
                <div class="navbar navbar-main">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="index.html">
                                <img class="logo-default scroll-hide" src="/theme/images/logo.png" alt="logo" />
                                <img class="logo-default scroll-show" src="/theme/images/logo-2.png" alt="logo" />
                                <img class="logo-retina" src="/theme/images/logo-retina.png" alt="logo" />
                            </a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="dropdown active">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Home <span class="caret"></span></a>
                                    <div class="mega-menu dropdown-menu multi-level row">
                                        <div class="col">
                                            <ul class="fa-ul no-icons text-s">
                                                <li><a href="index-main.html">Main home</a></li>
                                                <li><a href="index-pizzeria.html">Pizzeria home</a></li>
                                                <li><a href="index-desserts.html">Desserts home</a></li>
                                                <li><a href="index-green.html">Green home</a></li>
                                                <li><a href="index-wine.html">Wine home</a></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul class="fa-ul no-icons text-s">
                                                <li><a href="index-bistro.html">Bistro home</a></li>
                                                <li><a href="index-retro.html">Retrò home</a></li>
                                                <li><a href="index-steakhouse.html">Steakhouse home</a></li>
                                                <li><a href="index-elegance.html">Elegance home</a></li>
                                                <li><a href="index-fast-food.html">Fast food home</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pages <span class="caret"></span></a>
                                    <div class="mega-menu dropdown-menu multi-level row bg-menu">
                                        <div class="col">
                                            <ul class="fa-ul no-icons text-s">
                                                <li><a href="about-1.html">About one</a></li>
                                                <li><a href="about-2.html">About two</a></li>
                                                <li><a href="about-3.html">About three</a></li>
                                                <li><a href="pricing.html">Pricing</a></li>
                                                <li><a href="careers.html">Careers</a></li>
                                                <li><a href="gallery-album.html">Gallery</a></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul class="fa-ul no-icons text-s">
                                                <li><a href="reservation-1.html">Reservation one</a></li>
                                                <li><a href="reservation-2.html">Reservation two</a></li>
                                                <li><a href="faq.html">Faq</a></li>
                                                <li><a href="history.html">History</a></li>
                                                <li><a href="team.html">Team</a></li>
                                                <li><a href="coming-soon.html">Coming soon</a></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul class="fa-ul no-icons text-s">
                                                <li><a href="services-1.html">Services one</a></li>
                                                <li><a href="services-2.html">Services two</a></li>
                                                <li><a href="event.html">Event page</a></li>
                                                <li><a href="contacts-1.html">Contacts one</a></li>
                                                <li><a href="contacts-2.html">Contacts two</a></li>
                                                <li><a href="contacts-3.html">Contacts three</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Menus <span class="caret"></span></a>
                                    <ul class="dropdown-menu multi-level">
                                        <li>
                                            <a href="menu-list-1.html">List menu one</a>
                                        </li>
                                        <li>
                                            <a href="menu-list-2.html">List menu two</a>
                                        </li>
                                        <li>
                                            <a href="menu-albums.html">Albums menu</a>
                                        </li>
                                        <li>
                                            <a href="menu-pizza.html">Pizza menu</a>
                                        </li>
                                        <li>
                                            <a href="menu-grid.html">Grid menu</a>
                                        </li>
                                        <li>
                                            <a href="menu-classic.html">Classic menu</a>
                                        </li>
                                        <li>
                                            <a href="menu-slider.html">Slider menu</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Blog <span class="caret"></span></a>
                                    <ul class="dropdown-menu multi-level">
                                        <li><a href="blog-1.html">Standard</a></li>
                                        <li><a href="blog-2.html">Standard two</a></li>
                                        <li><a href="blog-grid.html">Grid blog</a></li>
                                        <li class="dropdown dropdown-submenu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Single post</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="blog-single-1.html">Post one</a></li>
                                                <li><a href="blog-single-2.html">Post two</a></li>
                                                <li><a href="blog-single-3.html">Post three</a></li>
                                                <li><a href="blog-single-4.html">Post four</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown mega-dropdown mega-tabs">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Elements <span class="caret"></span></a>
                                    <div class="mega-menu dropdown-menu multi-level row bg-menu">
                                        <div class="tab-box" data-tab-anima="fade-left">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#">Components</a></li>
                                                <li><a href="#">Headers</a></li>
                                                <li><a href="#">Titles</a></li>
                                            </ul>
                                            <div class="panel active">
                                                <div class="col">
                                                    <ul class="fa-ul text-s">
                                                        <li><i class="fa-li im-posterous"></i> <a href="features/components/icons.html">Icons</a></li>
                                                        <li><i class="fa-li im-secound"></i> <a href="features/components/counters-countdown.html">Counters</a></li>
                                                        <li><i class="fa-li im-clock-back"></i> <a href="features/components/counters-countdown.html">Countdowns</a></li>
                                                        <li><i class="fa-li im-libra"></i> <a href="features/components/progress-bars.html">Progress bars</a></li>
                                                        <li><i class="fa-li im-arrow-refresh2"></i> <a href="features/components/progress-bars.html">Circle progress bars</a></li>
                                                        <li><i class="fa-li im-calendar-4"></i> <a href="features/components/timeline.html">Timeline</a></li>
                                                        <li><i class="fa-li im-arrow-outside"></i> <a href="features/containers/section-slider.html">Slider</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <ul class="fa-ul text-s">
                                                        <li><i class="fa-li im-hand-touch"></i> <a href="features/components/buttons.html">Buttons</a></li>
                                                        <li><i class="fa-li im-old-camera"></i> <a href="features/components/image-boxes.html">Image boxes</a></li>
                                                        <li><i class="fa-li im-old-camera"></i> <a href="features/components/image-boxes-advanced.html">Advanced image boxes</a></li>
                                                        <li><i class="fa-li im-id-2"></i> <a href="features/components/content-box.html">Content boxes</a></li>
                                                        <li><i class="fa-li im-facebook"></i> <a href="features/components/social-media.html">Social media</a></li>
                                                        <li><i class="fa-li im-numbering-list"></i> <a href="features/components/lists.html">Lists</a></li>
                                                        <li><i class="fa-li im-map2"></i> <a href="features/components/maps.html">Google maps</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <ul class="fa-ul text-s">
                                                        <li><i class="fa-li im-split-horizontal2window"></i> <a href="features/components/tables.html">Advanced table</a></li>
                                                        <li><i class="fa-li im-maximize"></i> <a href="features/containers/lightbox.html">Lightbox and popups</a></li>
                                                        <li><i class="fa-li im-arrow-outside"></i> <a href="features/containers/sliders.html">Sliders and carousels</a></li>
                                                        <li><i class="fa-li im-scroll-fast"></i> <a href="features/containers/scroll-box-collapse.html">Scroll box</a></li>
                                                        <li><i class="fa-li im-download-2"></i> <a href="features/containers/scroll-box-collapse.html">Collapse box</a></li>
                                                        <li><i class="fa-li im-new-tab"></i> <a href="features/containers/tabs.html">Tabs</a></li>
                                                        <li><i class="fa-li im-new-tab"></i> <a href="features/containers/accordions.html">Accordions</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <ul class="fa-ul text-s">
                                                        <li><i class="fa-li im-speach-bubbles"></i> <a href="features/components/php-contact-form.html">Contact form</a></li>
                                                        <li><i class="fa-li im-go-bottom"></i> <a href="features/footers/footer-parallax.html">Footer parallax</a></li>
                                                        <li><i class="fa-li im-go-bottom"></i> <a href="features/footers/footer-minimal.html">Footer minimal</a></li>
                                                        <li><i class="fa-li im-go-bottom"></i> <a href="features/footers/footer-base.html">Footer base</a></li>
                                                        <li><i class="fa-li im-bold-text"></i> <a href="features/components/typography.html">Typography</a></li>
                                                        <li><i class="fa-li im-split-foursquarewindow"></i> <a href="features/containers/list-grid.html">Grid</a></li>
                                                        <li><i class="fa-li im-split-foursquarewindow"></i> <a href="features/containers/list-masonry.html">Masonry</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <ul class="fa-ul text-s">
                                                        <li><i class="fa-li im-panorama"></i> <a href="features/containers/section-background-image.html">Background image</a></li>
                                                        <li><i class="fa-li im-panorama"></i> <a href="features/containers/section-background-image-parallax.html">Background parallax</a></li>
                                                        <li><i class="fa-li im-film-strip"></i> <a href="features/containers/section-background-video.html">Background video</a></li>
                                                        <li><i class="fa-li im-clouds"></i> <a href="features/containers/section-animations.html">Bg animations</a></li>
                                                        <li><i class="fa-li im-clouds"></i> <a href="features/containers/section-animations-parallax.html">Bg animations parallax</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="panel">
                                                <div class="col">
                                                    <ul class="fa-ul text-s">
                                                        <li><i class="fa-li im-road"></i> <a href="features/menus/menu-classic.html">Menu classic</a></li>
                                                        <li><i class="fa-li im-road"></i> <a href="features/menus/menu-classic-transparent.html">Menu classic transparent</a></li>
                                                        <li><i class="fa-li im-road"></i> <a href="features/menus/menu-big-logo.html">Menu big logo</a></li>
                                                        <li><i class="fa-li im-road"></i> <a href="features/menus/menu-subline.html">Menu subline</a></li>
                                                        <li><i class="fa-li im-road"></i> <a href="features/menus/menu-subtitle.html">Menu subtitle</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <ul class="fa-ul text-s">
                                                        <li><i class="fa-li im-road"></i> <a href="features/menus/menu-middle-logo.html">Menu middle logo</a></li>
                                                        <li><i class="fa-li im-road"></i> <a href="features/menus/menu-middle-logo-top.html">Menu middle logo top</a></li>
                                                        <li><i class="fa-li im-road"></i> <a href="features/menus/menu-middle-box.html">Menu middle box</a></li>
                                                        <li><i class="fa-li im-road"></i> <a href="features/menus/menu-icons.html">Menu icons</a></li>
                                                        <li><i class="fa-li im-road"></i> <a href="features/menus/menu-icons-top.html">Menu icons top</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <ul class="fa-ul text-s">
                                                        <li><i class="fa-li im-road-2"></i> <a href="features/menus/menu-side.html">Side classic</a></li>
                                                        <li><i class="fa-li im-road-2"></i> <a href="features/menus/menu-side-lateral.html">Side lateral</a></li>
                                                        <li><i class="fa-li im-road-2"></i> <a href="features/menus/menu-side-simple.html">Side simple</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="panel">
                                                <div class="col">
                                                    <ul class="fa-ul text-s">
                                                        <li><i class="fa-li im-old-camera"></i> <a href="features/titles/template-title-image.html">Image background</a></li>
                                                        <li><i class="fa-li im-old-camera"></i> <a href="features/titles/template-title-image-fullscreen.html">Image full-screen</a></li>
                                                        <li><i class="fa-li im-old-camera"></i> <a href="features/titles/template-title-image-fullscreen-parallax.html">Image full-screen parallax</a></li>
                                                        <li><i class="fa-li im-old-camera"></i> <a href="features/titles/template-title-image-parallax.html">Image parallax</a></li>
                                                        <li><i class="fa-li im-old-camera"></i> <a href="features/titles/template-title-image-parallax-ken-burn.html">Image parallax ken-burn</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <ul class="fa-ul text-s">
                                                        <li><i class="fa-li im-film-board"></i> <a href="features/titles/template-title-video-mp4.html">Video background MP4</a></li>
                                                        <li><i class="fa-li im-film-board"></i> <a href="features/titles/template-title-video-youtube.html">Video background Youtube</a></li>
                                                        <li><i class="fa-li im-film-board"></i> <a href="features/titles/template-title-video-fullscreen.html">Video full-screen</a></li>
                                                        <li><i class="fa-li im-film-board"></i> <a href="features/titles/template-title-video-fullscreen-parallax.html">Video full-screen parallax</a></li>
                                                        <li><i class="fa-li im-film-board"></i> <a href="features/titles/template-title-video-parallax.html">Video parallax</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <ul class="fa-ul text-s">
                                                        <li><i class="fa-li im-panorama"></i> <a href="features/titles/template-title-base-1.html">Title base 1</a></li>
                                                        <li><i class="fa-li im-panorama"></i> <a href="features/titles/template-title-base-2.html">Title base 2</a></li>
                                                        <li><i class="fa-li im-panorama"></i> <a href="features/titles/template-title-bootstrap.html">Title bootstrap</a></li>
                                                        <li><i class="fa-li im-clouds"></i> <a href="features/titles/template-title-animation.html">Animation background</a></li>
                                                        <li><i class="fa-li im-clouds"></i> <a href="features/titles/template-title-animation-parallax.html">Animation parallax</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <ul class="fa-ul text-s">
                                                        <li><i class="fa-li im-arrow-outside"></i> <a href="features/titles/template-title-slider.html">Slider background</a></li>
                                                        <li><i class="fa-li im-arrow-outside"></i> <a href="features/titles/template-title-slider-fullscreen.html">Slider full-screen</a></li>
                                                        <li><i class="fa-li im-arrow-outside"></i> <a href="features/titles/template-title-slider-fullscreen-parallax.html">Slider full-screen parallax</a></li>
                                                        <li><i class="fa-li im-arrow-outside"></i> <a href="features/titles/template-title-slider-parallax.html">Slider parallax</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="nav navbar-nav navbar-right">
                                <div class="shop-menu-cnt">
                                    <i class="fa fa-shopping-cart"><span class="cart-count">1</span></i>
                                    <div class="shop-menu">
                                        <ul class="shop-cart">
                                            <li class="cart-item">
                                                <img src="/theme/images/gallery/pizza-1.jpg" alt="">
                                                <div class="cart-content">
                                                    <h5>Wood Airplain</h5>
                                                    <span class="cart-quantity">
                                                        1 x 299.00$
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>
                                        <p class="cart-total">
                                            Subtotal: <span>$299.00</span>
                                        </p>
                                        <p class="cart-buttons">
                                            <a href="#" class="btn btn-xs cart-view">View Cart</a>
                                            <a href="#" class="btn btn-xs cart-checkout">Checkout</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="search-box-menu">
                                    <div class="search-box scrolldown">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                    </div>
                                    <button type="button" class="btn btn-default btn-search">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </div>
                                <ul class="nav navbar-nav lan-menu">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><img src="/theme/images/en.png" alt="" />En<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#"><img src="/theme/images/it.png" alt="" />IT</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <?= $content ?>

    </div>
    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
    <footer class="footer-base footer-parallax">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 footer-center">
                        <hr class="space s" />
                        <img width="180" src="/theme/images/logo-2.png" alt="" />
                        <hr class="space m" />
                        <p>
                            We don't care if we're doing haute cuisine or burgers and pizza.<br />We just do it right. Always.
                        </p>
                        <hr class="space s" />
                        <div class="btn-group social-group btn-group-icons">
                            <a target="_blank" href="#" data-social="share-facebook"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="#" data-social="share-twitter"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="#" data-social="share-google"><i class="fa fa-instagram"></i></a>
                            <a target="_blank" href="#" data-social="share-linkedin"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <div class="row copy-row">
                <div class="col-md-12 copy-text">
                    © 2017 Gourmet - info@restaurant.com - +02 123458992 - Wall Street Avenue 502, New York - Restaurant Template Handmade by <a href="http://schiocco.io/">schiocco.io</a>
                </div>
            </div>
        </div>
    </footer>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
