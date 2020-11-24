<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$header_img = $page->imgSrc ?? '/theme/main/images/bg-23.jpg';

if (!empty($page)) {
    $this->title = $page->title;
    $this->params['keywords'] = $page->keywords;
    $this->params['description'] = $page->description;
}

$min_delivery_price = Yii::$app->sw->getModule('constant')->item('findOne', ['tech_name' => 'min_delivery_price'])->value ?? 1;

?>

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
                <h4 class="text-left">Ваш заказ</h4>
                <br>
                <table class="table table-bordered extra-padding">
                    <tbody>
                        <tr>
                            <th>Блюд на сумму</th>
                            <td><span class="amount">₽ <?= number_format($cart['total']) ?></span></td>
                        </tr>
                        <tr>
                            <th>Доставка</th>
                            <td>
                                Бесплатно
                            </td>
                        </tr>
                        <tr>
                            <th>Итого</th>
                            <td><strong><span class="amount">₽ <?= number_format($cart['total']) ?></span></strong> </td>
                        </tr>
                    </tbody>
                </table>
                <br>

                <?php if (0): ?>
                    <h2 class="text-center">Доставка работает с 12:00 до 22:00</h2>
                    <h3 class="text-center">Приносим свои извинения</h3>
                <?php elseif ($cart['total'] < $min_delivery_price) : ?>
                    <h2 class="text-center">Минимальная сумма заказа <?= $min_delivery_price ?>₽</h2>
                    <h3 class="text-center">Благодарим за понимание</h3>
                    <div class="text-center">
                        <div class="text-center top-space-lg">
                            <?= Html::a('Вернуться в корзину', ['/page/cart'], ['class' => 'btn btn-default btn-lg']) ?>
                        </div>
                    </div>
                <?php else: ?>
                    <h4 class="text-center">Данные для доставки</h4>

                    <?php $form = ActiveForm::begin([
                        // 'options' => ['class' => 'contact-form'],
                    ]); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($checkout, 'name')->label(false)->textInput(['placeholder' => 'Имя']) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($checkout, 'email')->label(false)->textInput(['placeholder' => 'email']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <?= $form->field($checkout, 'phone')->label(false)->textInput(['placeholder' => 'Телефон']) ?>
                            </div>
                            <div class="col-md-8">
                                <?= $form->field($checkout, 'address')->label(false)->textInput(['placeholder' => 'Улица']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <?= $form->field($checkout, 'house')->label(false)->textInput(['placeholder' => 'Дом']) ?>
                            </div>
                            <div class="col-md-3">
                                <?= $form->field($checkout, 'housing')->label(false)->textInput(['placeholder' => 'Подъезд']) ?>
                            </div>
                            <div class="col-md-3">
                                <?= $form->field($checkout, 'floor')->label(false)->textInput(['placeholder' => 'Этаж']) ?>
                            </div>
                            <div class="col-md-3">
                                <?= $form->field($checkout, 'flat')->label(false)->textInput(['placeholder' => 'Квартира']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($checkout, 'comment')->label(false)->textArea(['placeholder' => 'Комментарий к заказу']) ?>
                            </div>
                        </div>

                        <div class="text-center">
                            <span >Нажимая на кнопку "Заказать" вы даете согласие на обработку ваших персональных данных, данные будут использованны исключительно для доставки вашего заказа</span>

                            <hr class="space xs" />
                            <div class="text-center">
                                <?= Html::submitButton('Заказать', ['class' => 'circle-button btn-sm btn']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                <?php endif ?>

                <!-- <form action="" method="post" data-email="federicos@pixor.it">
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
                            <button class="anima-button circle-button btn-sm btn" type="submit"><i class="im-envelope"></i>Заказать</button>
                        </div>
                    </div>
                    <div class="success-box">
                        <div class="alert alert-success">Congratulations. Your message has been sent successfully</div>
                    </div>
                    <div class="error-box">
                        <div class="alert alert-warning">Error, please retry. Your message has not been sent</div>
                    </div>
                </form> -->
            </div>
        </div>
    </div>
</div>