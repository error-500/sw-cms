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
        <?= $map_constant->value ?>
    </div>
    <div class="overlaybox overlaybox-side overlaybox">
        <div class="container content">
            <div class="row">
                <div class="col-md-6 overlaybox-inner box-middle"
                     data-anima="fade-left">
                    <div class="row">
                        <?= $contacts_block_text[0] ?? '' ?>
                        <!-- <div class="col-md-6">
                            <h3>Hello!</h3>
                            <p class="text-left">
                                Ligula aenean, voluptatem a lorem laoreet quod dolores acnatoque modiignani merto inventore solone.
                            </p>
                            <hr class="space s" />
                            <div class="btn-group btn-group-icons" role="group">
                                <a class="btn btn-default">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a class="btn btn-default">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a class="btn btn-default">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a class="btn btn-default">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3>Contacts</h3>
                            <p>
                                05, Martin Street, San Francisco<br />
                                United States of America
                            </p>
                            <hr class="space s" />
                            <ul class="fa-ul">
                                <li><i class="fa-li im-envelope"></i> hello@company.com</li>
                                <li><i class="fa-li im-phone"></i> (123) 456-78910</li>
                                <li><i class="fa-li im-phone"></i> (123) 456-78915</li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
</div>
<div class="section-empty section-item">
    <div class="container content">
        <div class="row">
            <div class="col-md-8 col-center text-center">
                <?= $contacts_block_text[2] ?? '' ?>
                <!-- <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Morning</th>
                            <th>Afternoom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Monday</th>
                            <td>8am - 12am</td>
                            <td>15PM - 19PM</td>
                        </tr>
                        <tr>
                            <th>Tuesday</th>
                            <td>8am - 12am</td>
                            <td>5pm - 9pm</td>
                        </tr>
                        <tr>
                            <th>Wednesday</th>
                            <td>8am - 12am</td>
                            <td>5pm - 9pm</td>
                        </tr>
                        <tr>
                            <th>Thirsday</th>
                            <td>8am - 12am</td>
                            <td>5pm - 9pm</td>
                        </tr>
                        <tr>
                            <th>Friday</th>
                            <td>8am - 12am</td>
                            <td>5pm - 9pm</td>
                        </tr>
                        <tr>
                            <th>Saturday</th>
                            <td>8am - 12am</td>
                            <td>Closed</td>
                        </tr>
                        <tr>
                            <th>Sunday</th>
                            <td>Closed</td>
                            <td>Closed</td>
                        </tr>
                    </tbody>
                </table> -->
                <hr class="space m" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-center text-center">
                <?= $contacts_block_text[1] ?? '' ?>
                <!-- <div class="title-base text-left text-left-sm">
                    <hr />
                    <h2>Keep in touch</h2>
                    <p>Get in touch with us</p>
                </div>
                <p>
                    Our helpline is always open to receive any inquiry or feedback. Please feel free to drop us an email
                    from the form below and we will get back to you as soon as we can. Thank you for undersanding.  Erat voluptatum varius vulputate laboriosam, rhoncus repudiandae, occaecat! Impedi
                </p> -->
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
                                    type="submit"><i class="im-mail-send"></i>Отправить сообщение</button>
                        </div>
                    </div>
                    <?php if($contactForm->hasErrors()): ?>
                    <div class="error-box">
                        <?php foreach($contactForm->getFirstErrors() as $attrName => $attrErr): ?>
                        <div class="alert alert-danger">
                            <b><?php echo $attrName; ?>:</b><?php echo $attrErr; ?>
                        </div>
                        <?php endforeach; ?>
                        <div class="alert alert-warning">Error, please retry. Your message has not been sent</div>
                    </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>