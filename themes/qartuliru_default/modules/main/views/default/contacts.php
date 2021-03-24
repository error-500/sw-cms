<?php

use himiklab\yii2\recaptcha\ReCaptcha;
use himiklab\yii2\recaptcha\ReCaptcha2;
use himiklab\yii2\recaptcha\ReCaptcha3;

if (!empty($page)) {
    $this->title = $page->title;
    $this->params['keywords'] = $page->keywords;
    $this->params['description'] = $page->description;
}

$this->params['main_logo_white'] = Yii::$app->sw->getModule('file_manager')->item('findOne', ['tech_name' => 'main_logo_green'])->filePath ?? null;
$this->params['header_class'] = 'fixed-top scroll-change wide-area';

?>
<div class="section-map box-middle-container row-18 mt-5 mb-0">
    <div class="google-map mt-5">
        <yandex-map v-bind="ymapProps"
                    style="height: 500px">
            <ymap-marker marker-id="q1"
                         :coords="[55.77434759323901,37.57892985354571,]"></ymap-marker>
        </yandex-map>
    </div>
    <div class="overlaybox overlaybox-side overlaybox">
        <div class="container content">
            <div class="row">
                <div class="col-xs-12 col-md-6 overlaybox-inner box-middle"
                     data-anima="fade-left">
                    <div class="row">
                        <?= $contacts_block_text[0] ?? '' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-empty section-item">
    <div class="container content">
        <div class="row">
            <div class="col-md-8 col-center text-center">
                <?= $contacts_block_text[2] ?? '' ?>
                <hr class="space m" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-center text-center">
                <?= $contacts_block_text[1] ?? '' ?>
                <hr class="space s" />
                <form class="form-box"
                      method="post">
                    <input type="hidden"
                           name="<?php echo Yii::$app->request->csrfParam; ?>"
                           value="<?php echo Yii::$app->request->csrfToken; ?>" />
                    <div class="row">
                        <div class="col-md-6">
                            <p>Имя</p>
                            <input id="name"
                                   name="name"
                                   placeholder=""
                                   type="text"
                                   class="form-control form-value"
                                   value="<?php echo $contactForm->name; ?>"
                                   required>
                        </div>
                        <div class="col-md-6">
                            <p>Email</p>
                            <input id="email"
                                   name="email"
                                   placeholder=""
                                   type="email"
                                   value="<?php echo $contactForm->email; ?>"
                                   class="form-control form-value"
                                   required>
                        </div>

                    </div>
                    <hr class="space xs" />
                    <div class="row">
                        <div class="col-md-12">
                            <p>Сообщение</p>
                            <textarea id="message"
                                      name="message"
                                      placeholder=""
                                      value="<?php echo $contactForm->message; ?>"
                                      class="form-control form-value"
                                      required></textarea>
                            <hr class="space s" />

                        </div>
                        <div class="col-md-12">
                            <?php echo ReCaptcha3::widget([
                                'name' => 'reCaptcha',
                                'siteKey' => Yii::$app->reCaptcha->siteKeyV3, // unnecessary is reCaptcha component was set up
                                //'widgetOptions' => ['class' => 'col-sm-offset-3'],
                            ]);  ?>
                        </div>
                        <div class="col-md-12">
                            <button class="btn-xs btn"
                                    type="submit">
                                <i class="im-mail-send"></i>
                                <?php echo Yii::t('app', 'Отправить сообщение'); ?>
                            </button>
                        </div>
                    </div>
                    <?php if($contactForm->hasErrors()): ?>
                    <div class="error-box">
                        <?php foreach($contactForm->getFirstErrors() as $attrName => $attrErr): ?>
                        <div class="alert alert-danger">
                            <b><?php echo $attrName; ?>:</b><?php echo $attrErr; ?>
                        </div>
                        <?php endforeach; ?>
                        <div class="alert alert-warning">
                            <?php echo Yii::t('app', 'Error, please retry. Your message has not been sent'); ?></div>
                    </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>