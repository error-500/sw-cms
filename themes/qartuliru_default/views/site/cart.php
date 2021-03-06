<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

$header_img = $page->imgSrc ?? '/theme/main/images/bg-23.jpg';

if (!empty($page)) {
    $this->title = $page->title;
    $this->params['keywords'] = $page->keywords;
    $this->params['description'] = $page->description;
}

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
            <div class="col-md-12">
                <style type="text/css">
                .table>thead:first-child>tr:first-child>th {
                    border-top-width: 1px !important;
                }
                </style>
                <div class="table-responsive">
                    <?= GridView::widget([
                    'dataProvider' => $cart_provider,
                    'options' => [
                        'class' => 'cart-table table',
                        'style' => 'margin-bottom: 0;'
                    ],
                    'layout' => '{items}',
                    'columns' => [
                        [
                            'attribute' => 'Наименование',
                        ],
                        [
                            'attribute' => 'Цена',
                        ],
                        [
                            'attribute' => 'Количество',
                        ],
                        [
                            'attribute' => 'Сумма',
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'contentOptions' => ['style' => 'white-space:nowrap;'],
                            'header' => 'Действия',
                            'template' => '{add} | {delete}',
                            'buttons' => [
                                'add' => function ($url, $item) {
                                    return Html::a('Добавить', ['/cart/add', 'id' => $item['obj']->id, 'refresh' => true]);
                                },
                                'delete' => function ($url, $item) {
                                    return Html::a('Удалить', ['/cart/remove', 'id' => $item['obj']->id, 'refresh' => true]);
                                },
                            ],
                        ],
                    ],
                ]) ?>
                </div>
                <?php
                    $dateNow = new DateTime('now', new DateTimeZone('Europe/Moscow'));
                    $dateStart = new DateTime($dateNow->format('Y-m-d 12:00'), new DateTimeZone('Europe/Moscow'));
                    $dateEnd = new DateTime($dateNow->format('Y-m-d 22:30'), new DateTimeZone('Europe/Moscow'));
                    /*echo '<pre>'.$dateNow->format('d.m.Y H:i:s')
                    .' '.$dateStart->format('d.m.Y H:i:s')
                    .' '.$dateEnd->format('d.m.Y H:i:s').'</pre>';*/
                ?>
                <?php if($dateNow < $dateStart || $dateNow > $dateEnd): ?>
                <div class="d-flex flex-row justify-content-center">
                    <div class="w-50">
                        <div class="alert alert-warning">
                            <h5>Внимание</h5>
                            <p class="text-dark">
                                Доставка заказов осуществляется ежедневно с 12:30 до 23:00.
                                Вы можете овормить заказ на доставку сейчас и мы свяжемся с Вами
                                в рабочее время.
                            </p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-left">Итог:</h4>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Блюд на сумму</th>
                                    <td><span class="amount"><?= number_format($cart['total']) ?> ₽</span></td>
                                </tr>
                                <tr>
                                    <th>Доставка</th>
                                    <td>
                                        Бесплатно
                                    </td>
                                </tr>
                                <tr>
                                    <th>Итого</th>
                                    <td>
                                        <strong>
                                            <span class="amount">
                                                <?= number_format($cart['total']) ?>&nbsp;₽
                                            </span>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <?php /* echo '<pre>'.var_export($cart, true).'</pre>'; */?>
                        <?php if(!empty($cart['total']) && $cart['total'] < 1500 ): ?>
                        <div class="alert alert-warning alert-dismissable">
                            <?php echo /*Yii::t('app',*/  'Минимальная сумма заказа 1500'/*)*/;?>₽<br />
                            <?php echo /*Yii::t('app',*/ 'Благодарим за понимание'/*)*/;?>
                        </div>
                        <?php endif; ?>
                        <div class="">
                            <a href="<?= Url::to('/site/checkout') ?>"
                               class="btn-checkout btn btn-default btn-block<?php if($cart['total'] < 1500):?> disabled<?php endif;?>"
                               type="submit">Далее</a>
                        </div>
                    </div>
                </div>

                <div class="row">

                </div>

            </div>
        </div>
        <hr class="space" />
    </div>
</div>