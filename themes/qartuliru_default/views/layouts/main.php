<?php

use Yii;
use yii\helpers\Html;

//use app\assets\AppAsset;
//use app\themes\qartuliru_default\assets\YandexMetricAsset;
//use app\modules\sw\assets\CdnYandex;
use app\themes\qartuliru_default\assets\ThemeAssets;
use app\widgets\cart\Cart;
use app\widgets\fbpixel\FbPixelWidget;
use app\widgets\ymetric\YMetricWidget;

ThemeAssets::register($this);
//YandexMetricAsset::register($this);
$this->registerCss("
    body, p {
        font-family: 'Merriweather', serif !important;
        font-size: 14px !important;
        /*color: #603617 !important;*/
    }


    /*настройка курсивного заголвка*/
    .title-base p {
        font-family: 'Marck Script', serif !important;
        font-size: 20px !important;
        font-style: unset !important;
        /*color: #bd7945 !important;*/
    }

    /*настройка кнопки*/
    .btn.btn-border {
        /*color: #97aa53 !important;*/
    }

    /*настройка заголовков*/
    .title-base h2 {
        /*color: #647a29 !important;*/
        font-family: 'Montserrat', sans-serif !important;
    }
");

$this->beginPage() ?>

<!DOCTYPE html>
<!--[if lt IE 10]> <html  lang="<?php //echo Yii::$app->language; ?>en" class="iex"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="<?php //echo Yii::$app->language; ?>en">
<!--<![endif]-->

<head>
    <meta charset="<?php echo Yii::$app->charset; ?>">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta name="description"
          content="<?php echo Html::encode($this->params['description'] ?? ''); ?>">
    <meta name="keywords"
          content="<?php echo Html::encode($this->params['keywords'] ?? ''); ?>">
    <meta name="yandex-verification"
          content="4ec76dfad66716e1" />
    <link rel="icon"
          href="/favicon.ico">

    <title><?php echo Html::encode($this->title); ?></title>

    <?php /* echo Yii::$app->sw
                    ->getModule('constant')
                    ->item(
                        'findOne',
                        ['tech_name' => 'custom_header_code']
                    )->value ?? null;
        */
    ?>

    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div id="preloader"></div>
    <div id="vue-app">
        <?php echo $this->render('header'); ?>
        <?php echo $content ?>
        <?php echo $this->render('footer'); ?>
        <?php echo Cart::widget(['template' => 'sidebar-cart']); ?>
    </div>
    <i class="scroll-top scroll-top-mobile rounded-circle text-black show fa fa-sort-asc"></i>
    <?php /* */?>
    <div id="modal-18"
         class="modal fade"
         tabindex="-1"
         role="dialog"
         aria-hidden="true"
         data-bs-backdrop="static">
        <div class="modal-dialog"
             role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h2 class="text-danger">18+</h2>
                    <p> <?php echo Yii::t('app', 'Добро пожаловать.'); ?>
                        <?php echo Yii::t('app', 'Для доступа необходимо подтвердить совершеннолетний возраст.'); ?>
                    </p>
                    <h5><?php echo Yii::t('app', 'Подробнее'); ?></h5>
                    <p class="text-size-mini">
                        <?php echo Yii::t('app', 'Сайт содержит информацию для лиц совершеннолетнего возраста.'); ?>
                        <?php echo Yii::t('app', 'Сведения, размещенные на сайте, не являются рекламой, носят исключительно'); ?>
                        <?php echo Yii::t('app', 'информационный характер, и предназначены только для личного использования.'); ?>
                    </p>
                    <button class="btn btn-gray"
                            data-dismiss="modal"
                            type="button"><?php echo Yii::t('app', 'Мне исполнилось 18 лет'); ?></button>
                </div>
            </div>
        </div>
    </div>
    <?php
    /*
        $this->registerJs(
            '(function() {
                const stor = window.localStorage;
                if (!stor.getItem("mi18")) {
                    jQuery("#modal-18").modal("show");
                }
                jQuery("#modal-18 .btn-gray").on("click", (event) => {
                    stor.setItem("mi18",  true);
                });
            })();
            ',
            View::POS_END,
            'modal-18'
        );
    */
    ?>
    <?php $this->endBody() ?>
    <?php echo YMetricWidget::widget(); ?>
    <?php echo FbPixelWidget::widget(); ?>
</body>

</html>
<?php $this->endPage() ?>