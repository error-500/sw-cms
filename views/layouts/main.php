<?php

use yii\helpers\Html;

use app\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 10]> <html  lang="en" class="iex"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="<?= Yii::$app->language ?>">
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

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>