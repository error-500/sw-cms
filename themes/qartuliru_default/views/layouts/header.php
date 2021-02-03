<?php

use yii\helpers\Url;
use app\widgets\cart\Cart;

$main_logo_white = Yii::$app->sw->getModule('file_manager')->item('findOne', ['tech_name' => 'main_logo_white'])->filePath ?? null;
$main_logo_green = Yii::$app->sw->getModule('file_manager')->item('findOne', ['tech_name' => 'main_logo_green'])->filePath ?? null;

$main_logo_white = $this->params['main_logo_white'] ?? $main_logo_white;
$main_logo_green = $this->params['main_logo_green'] ?? $main_logo_green;

$header_class = $this->params['header_class'] ?? 'fixed-top bg-transparent menu-transparent scroll-change wide-area';

?>
<header class="<?= $header_class ?>"
        data-menu-anima="fade-in">
    <!--div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top"
         role="navigation"-->
    <nav class="navbar navbar-expand-lg navbar-default"
         role="navigation">
        <a class="navbar-brand flex-grow-1 flex-lg-grow-0 ml-1"
           href="<?= Url::to('/') ?>">

            <img class="logo-default scroll-hide"
                 src="<?= $main_logo_white ?>"
                 alt="logo" />
            <img class="logo-default scroll-show"
                 src="<?= $main_logo_green ?>"
                 alt="logo" />

            <!-- <img class="logo-default scroll-hide" src="/theme/main/images/logo.png" alt="logo" />
            <img class="logo-default scroll-show" src="/theme/main/images/logo-2.png" alt="logo" /> -->

            <img class="logo-retina"
                 src="/theme/main/images/logo-retina.png"
                 alt="logo" />
        </a>

        <div class="navbar-toggler"
             style="border: none !important">
            <?php echo Cart::widget(['full' => false]); ?>
        </div>
        <button type="button"
                class="navbar-toggler border-0"
                data-toggle="collapse"
                data-target="#main-menu">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse"
             id="main-menu">
            <?= $this->render('menu') ?>
            <ul class="navbar-nav navbar-right d-none d-lg-block">
                <?= Cart::widget() ?>
            </ul>
            <ul class="navbar-nav navbar-right mr-3">
                <?= Yii::$app->sw
                        ->getModule('block')
                        ->item('findOne', ['tech_name' => 'header_icons'])
                        ->text ?? '' ?>
            </ul>

        </div>
    </nav>
</header>