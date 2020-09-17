<?php

use yii\helpers\Url;

?>
<header class="fixed-top bg-transparent menu-transparent scroll-change wide-area" data-menu-anima="fade-in">
    <div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top" role="navigation">
        <div class="navbar navbar-main">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?= Url::to('/') ?>">
                        <img class="logo-default scroll-hide" src="/theme/main/images/logo.png" alt="logo" />
                        <img class="logo-default scroll-show" src="/theme/main/images/logo-2.png" alt="logo" />
                        <img class="logo-retina" src="/theme/main/images/logo-retina.png" alt="logo" />
                    </a>
                </div>
                <div class="collapse navbar-collapse">

                    <?= $this->render('menu') ?>

                    <div class="nav navbar-nav navbar-right">
                        <div class="shop-menu-cnt">
                            <i class="fa fa-shopping-cart"><span class="cart-count">1</span></i>
                            <div class="shop-menu">
                                <ul class="shop-cart">
                                    <li class="cart-item">
                                        <img src="/theme/main/images/gallery/pizza-1.jpg" alt="">
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><img src="/theme/main/images/en.png" alt="" />En<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><img src="/theme/main/images/it.png" alt="" />IT</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>