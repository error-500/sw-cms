<?php

use yii\widgets\ListView;

$header_img = $page->imgSrc ?? '/theme/main/images/bg-23.jpg';

if (!empty($page)) {
    $this->title = $page->title;
    $this->params['keywords'] = $page->keywords;
    $this->params['description'] = $page->description;
}

?>
<!-- <div class="header-title ken-burn white" data-parallax="scroll" data-position="top" data-natural-height="850" data-natural-width="1920" data-image-src="/theme/main/images/bg-7.jpg"> -->
<!-- <div class="header-title ken-burn white" data-parallax="scroll" data-bleed="0" data-position="top" data-image-src="<?= $header_img ?? '' ?>">
    <div class="container">
        <div class="title-base">
            <hr class="anima" />
            <?= $page->text ?? '' ?>
        </div>
    </div>
</div> -->
<div class="header-title ken-burn white" data-parallax="scroll" data-bleed="0" data-position="top" data-image-src="<?= $header_img ?>">
    <div class="container">
        <div class="title-base">
            <hr class="anima" />
            <?= $page->text ?? '' ?>
        </div>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="row">
            <div class="col-md-8 col-center">
                <form action="http://www.framework-y.com/scripts/php/contact-form.php" class="form-box form-ajax text-center" method="post" data-email="federicos@pixor.it">
                    <div class="col-md-6">
                        <p>Дата</p>
                        <input name="checkin" id="checkin" type="text" data-toggle="datepicker" class="form-control form-value" placeholder="" required>
                    </div>
                    <div class="col-md-6">
                        <p>Время</p>
                        <input id="time" name="time" placeholder="" type="text" class="form-control form-value" required>
                    </div>
                    <hr class="space s" />
                    <div class="row">
                        <div class="col-md-12">
                            <p>Имя</p>
                            <input id="name" name="name" placeholder="" type="text" class="form-control form-value" required>
                        </div>
                    </div>
                    <hr class="space xs" />
                    <div class="row">
                        <div class="col-md-6">
                            <p>Email</p>
                            <input id="email" name="email" placeholder="" type="email" class="form-control form-value" required>
                        </div>
                        <div class="col-md-6">
                            <p>Телефон</p>
                            <input id="phone" name="phone" placeholder="" type="text" class="form-control form-value">
                        </div>
                    </div>
                    <hr class="space xs" />
                    <div class="row">
                        <div class="col-md-12">
                            <p>Комментарий</p>
                            <textarea id="messagge" name="messagge" class="form-control form-value" placeholder="" required></textarea>
                            <hr class="space s" />
                            <button class="anima-button circle-button btn-sm btn" type="submit"><i class="im-envelope"></i>Забронировать</button>
                        </div>
                    </div>
                    <div class="success-box">
                        <div class="alert alert-success">Congratulations. Your message has been sent successfully</div>
                    </div>
                    <div class="error-box">
                        <div class="alert alert-warning">Error, please retry. Your message has not been sent</div>
                    </div>
                </form>
            </div>
        </div>
        <hr class="space" />
        <?= $reservation_block->text ?>
    </div>
</div>