<?php

use yii\helpers\Html;

use app\assets\AppAsset;
use yii\web\View;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 10]> <html  lang="en" class="iex"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="<? /*= Yii::$app->language */?>ru">
<!--<![endif]-->

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta name="description"
          content="<?= Html::encode($this->params['description'] ?? '') ?>">
    <meta name="keywords"
          content="<?= Html::encode($this->params['keywords'] ?? '') ?>">

    <link rel="icon"
          href="/favicon.ico">

    <title><?= Html::encode($this->title) ?></title>

    <?= Yii::$app->sw->getModule('constant')->item('findOne', ['tech_name' => 'custom_header_code'])->value ?? null ?>

    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div id="preloader"></div>
    <div>
        <?= $this->render('header') ?>

        <?= $content ?>

    </div>
    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>

    <?= $this->render('footer') ?>
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
                    <p> Добро пожаловать.
                        Для доступа необходимо подтвердить совершеннолетний возраст.
                    </p>
                    <h5>Подробнее</h5>
                    <p class="text-size-mini">
                        Сайт содержит информацию для лиц совершеннолетнего возраста.
                        Сведения, размещенные на сайте, не являются рекламой, носят исключительно
                        информационный характер, и предназначены только для личного использования.
                    </p>
                    <button class="btn btn-primary"
                            data-bs-dismiss="modal"
                            type="button">Мне исполнилось 18 лет</button>
                </div>
            </div>
        </div>
    </div>
    <?php /*
        $this->registerJs(
            '
            //$.noConflict( true );
            myModal = new bootstrap.Modal(document.getElementById("modal-18"), {});
            myModal.show();
            ',
            View::POS_END,
            'modal-18'
        );
        */
    ?>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>