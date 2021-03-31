<?php

use app\widgets\autonavbarnav\LanguageNav;
use yii\helpers\Url;
use app\widgets\cart\Cart;
use main\helpers\AutoUrl;

$langPrefix = AutoUrl::getLanguageSection();
$langPrefix = empty($langPrefix) ? '' : "/$langPrefix";
$main_logo_white = Yii::$app->sw
    ->getModule('file_manager')
    ->item(
        'findOne',
        ['tech_name' => 'main_logo_white']
    )->filePath ?? null;
$main_logo_green = Yii::$app->sw
    ->getModule('file_manager')
    ->item(
        'findOne',
        ['tech_name' => 'main_logo_green']
    )->filePath ?? null;

$main_logo_white = $this->params['main_logo_white'] ?? $main_logo_white;
$main_logo_green = $this->params['main_logo_green'] ?? $main_logo_green;

$header_class = $this->params['header_class'] ?? 'fixed-top bg-transparent menu-transparent scroll-change wide-area';

?>
<header class="<?php echo $header_class; ?>"
        data-menu-anima="fade-in">
    <!--div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top"
         role="navigation"-->
    <nav class="navbar navbar-expand-lg navbar-default navbar-fixed-top"
         role="navigation"
         style="min-height: 4em;">
        <a class="navbar-brand flex-grow-1 flex-lg-grow-0 ml-1"
           href="<?php echo Url::to($langPrefix.'/'); ?>">

            <img class="logo-default scroll-hide"
                 src="<?php echo $main_logo_white; ?>"
                 alt="logo" />
            <img class="logo-default scroll-show"
                 src="<?php echo $main_logo_green; ?>"
                 alt="logo" />

            <!-- <img class="logo-default scroll-hide" src="/theme/main/images/logo.png" alt="logo" />
            <img class="logo-default scroll-show" src="/theme/main/images/logo-2.png" alt="logo" /> -->

            <img class="logo-retina"
                 src="/theme/main/images/logo-retina.png"
                 alt="logo" />
        </a>
        <div class="navbar-toggler d-inline-flex-xs flex-row justify-content-between align-content-center"
             style="border: none !important; min-width: 50%">
            <a href="tel:+74957237373"
               class="my-auto mx-2"
               @click="$emit('phone-call', $event)">
                <i class="fa fa-2x fa-phone-square text-m"></i>
            </a>
            <a href="https://wa.me/74957237373"
               target="_blank"
               class="my-auto mx-2"
               @click="$emit('whatsap-click', $event)">
                <i class="fa fa-2x fa-whatsapp text-m"></i>
            </a>
            <?php echo Cart::widget(['full' => false]); ?>


            <button type="button"
                    class="navbar-toggler border-0 d-inline ml-2"
                    data-toggle="collapse"
                    data-target="#main-menu">
                <i class="fa fa-bars"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse mt-xs-1"
             id="main-menu">
            <?= $this->render('menu') ?>
            <ul class="navbar-nav navbar-right d-none d-lg-block">
                <?php echo Cart::widget(); ?>
            </ul>
            <ul class="navbar-nav navbar-right mr-3">
                <li class="nav-item">
                    <a href="tel:+74957237373"
                       class="nav-link"
                       @click="$emit('phone-call', $event)">
                        <i class="fa fa-2x fa-phone-square text-m"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://wa.me/74957237373"
                       class="nav-link"
                       target="_blank"
                       @click="$emit('whatsap-click', $event)">
                        <i class="fa fa-2x fa-whatsapp text-m"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a target="_blank"
                       href="https://www.facebook.com/qartuli.msc"
                       class="nav-link">
                        <i class="fa fa-2x fa-facebook text-m"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a target="_blank"
                       class="nav-link"
                       href="https://www.instagram.com/qartuli.ru/">
                        <i class="fa fa-2x fa-instagram text-m"></i>
                    </a>
                </li>
                <?php echo Yii::$app->sw
                        ->getModule('block')
                        ->item('findOne', ['tech_name' => 'header_icons'])
                        ->text ?? '' ?>
                <li class="nav-item">
                    <a href="<?php echo !empty($langPrefix) ? '/' : '/en-US/'; ?>"
                       class="nav-link"><?php echo !empty($langPrefix) ? 'РУС' : 'ENG'; ?></a>
                </li>
            </ul>

        </div>
    </nav>
</header>