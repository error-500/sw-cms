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
                <h4 class="text-left"><?php echo Yii::t('app', 'Ваш заказ'); ?></h4>
                <br>
                <table class="table table-bordered extra-padding">
                    <tbody>
                        <tr>
                            <th><?php echo Yii::t('app', 'Блюд на сумму'); ?></th>
                            <td><span class="amount">₽
                                    <?php echo !empty($cart['total']) ? number_format($cart['total']) : '0'; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo Yii::t('app', 'Доставка'); ?></th>
                            <td>
                                <?php echo Yii::t('app', 'Бесплатно'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo Yii::t('app', 'Итого'); ?></th>
                            <td><strong><span class="amount">₽
                                        <?php echo !empty($cart['total']) ? number_format($cart['total']) : '0'; ?></span></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>

                <?php if (0): ?>
                <h2 class="text-center"><?php echo Yii::t('app', 'Доставка работает с 12:00 до 22:00'); ?></h2>
                <h3 class="text-center"><?php echo Yii::t('app', 'Приносим свои извинения');?></h3>
                <?php elseif (!empty($cart['total']) && $cart['total'] < $min_delivery_price) : ?>
                <h2 class="text-center"><?php echo Yii::t('app', 'Минимальная сумма заказа {0} ₽', [$min_delivery_price]); ?></h2>
                <h3 class="text-center"><?php echo Yii::t('app', 'Благодарим за понимание'); ?></h3>
                <div class="text-center">
                    <div class="text-center top-space-lg">
                        <?php echo Html::a(
                            Yii::t('app', 'Вернуться в корзину'),
                            ['/page/cart'],
                            ['class' => 'btn btn-default btn-lg']); ?>
                    </div>
                </div>
                <?php else: ?>
                <h4 class="text-center"><?php echo Yii::t('app', 'Данные для доставки'); ?></h4>

                <?php $form = ActiveForm::begin([
                        // 'options' => ['class' => 'contact-form'],
                    ]); ?>
                <div class="row">
                    <div class="col-md-6">
                        <?php echo  $form->field($checkout, 'name')
                                        ->label(false)
                                        ->textInput(['placeholder' => Yii::t('app', 'Имя')]); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->field($checkout, 'email')
                                        ->label(false)
                                        ->textInput(['placeholder' => Yii::t('app', 'email')]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?php echo $form->field($checkout, 'phone')
                                        ->label(false)
                                        ->textInput(['placeholder' => Yii::t('app', 'Телефон')]);?> ?>
                    </div>
                    <div class="col-md-8">
                        <?php echo $form->field($checkout, 'address')
                                        ->label(false)
                                        ->textInput(['placeholder' => Yii::t('app', 'Улица')]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <?php echo $form->field($checkout, 'house')
                                        ->label(false)
                                        ->textInput(['placeholder' => Yii::t('app', 'Дом')]) ?>
                    </div>
                    <div class="col-md-3">
                        <?php echo $form->field($checkout, 'housing')
                                        ->label(false)
                                        ->textInput(['placeholder' => Yii::t('app', 'Подъезд')]); ?>
                    </div>
                    <div class="col-md-3">
                        <?php echo $form->field($checkout, 'floor')
                                        ->label(false)
                                        ->textInput(['placeholder' => Yii::t('app', 'Этаж')]) ?>
                    </div>
                    <div class="col-md-3">
                        <?php echo $form->field($checkout, 'flat')
                                        ->label(false)
                                        ->textInput(['placeholder' => Yii::t('app', 'Квартира')]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $form->field($checkout, 'comment')
                                        ->label(false)
                                        ->textArea(['placeholder' => Yii::t('app', 'Комментарий к заказу')]) ?>
                    </div>
                </div>

                <div class="text-center">
                    <span><?php echo Yii::t('app', 'Нажимая на кнопку "Заказать" вы даете согласие на обработку ваших персональных данных, данные
                        будут использованны исключительно для доставки вашего заказа'); ?></span>

                    <hr class="space xs" />
                    <div class="text-center">
                        <?php echo
                                Html::submitButton(
                                    Yii::t('app', 'Заказать'),
                                    ['class' => 'circle-button btn-sm btn btn-order']
                                ); ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
