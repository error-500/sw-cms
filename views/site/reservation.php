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
<div class="header-title ken-burn white"
     data-parallax="scroll"
     data-bleed="0"
     data-position="top"
     data-image-src="<?= $header_img ?>">
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
                <form action="/reservation"
                      class="form-box text-center"
                      method="post"
                      data-email="qartuli@qartuli.ru">
                    <input type="hidden"
                           name="<?php echo Yii::$app->request->csrfParam; ?>"
                           value="<?php echo Yii::$app->request->csrfToken; ?>" />
                    <div class="col-md-6">
                        <p>Дата</p>
                        <input name="checkin"
                               id="checkin"
                               type="date"
                               data-toggle="datepicker"
                               class="form-control form-value"
                               placeholder=""
                               value="<?php echo $form->checkin; ?>"
                               required>
                    </div>
                    <div class="col-md-6">
                        <p>Время</p>
                        <input id="time"
                               name="time"
                               placeholder=""
                               type="time"
                               value="<?php echo $form->time; ?>"
                               class="form-control form-value"
                               required>
                    </div>
                    <hr class="space s" />
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <p>Имя</p>
                            <input id="name"
                                   name="name"
                                   placeholder=""
                                   type="text"
                                   value="<?php echo $form->name; ?>"
                                   class="form-control form-value"
                                   required />
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <p>Кол-во гостей</p>
                            <input id="guests"
                                   name="guests"
                                   placeholder=""
                                   type="number"
                                   min="1"
                                   max="130"
                                   step="1"
                                   value="<?php echo $form->guests; ?>"
                                   class="form-control form-value"
                                   required />
                        </div>
                    </div>
                    <hr class="space xs" />
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <p>Email</p>
                            <input id="email"
                                   name="email"
                                   placeholder=""
                                   type="email"
                                   value="<?php echo $form->email; ?>"
                                   class="form-control form-value"
                                   required>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <p>Телефон</p>
                            <input id="phone"
                                   name="phone"
                                   placeholder="+79996543210"
                                   type="text"
                                   value="<?php echo $form->phone; ?>"
                                   class="form-control form-value">
                        </div>
                    </div>
                    <hr class="space xs" />
                    <div class="row">
                        <div class="col-md-12">
                            <p>Комментарий</p>
                            <textarea id="message"
                                      name="message"
                                      class="form-control form-value"
                                      placeholder=""
                                      required></textarea>
                            <hr class="space s" />
                            <button class="anima-button circle-button btn-sm btn"
                                    type="submit">
                                <i class="im-envelope"></i>Забронировать
                            </button>
                        </div>
                    </div>
                    <?php if ( $form->hasErrors()): ?>
                    <div class="error-box">
                        <?php foreach($form->getFirstErrors() as $attrName => $attrError): ?>
                        <div class="alert alert-danger">
                            <b><?php echo $attrName; ?>:</b><?php echo $attrError; ?>
                        </div>
                        <?php endforeach; ?>
                        <div class="alert alert-warning">Error, please retry. Your message has not been sent</div>
                    </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
        <hr class="space" />
        <?= $reservation_block->text ?>
    </div>
</div>
<div class="section-map box-middle-container row-18">
    <div class="google-map">
        <?= $map_constant->value ?>
    </div>
</div>