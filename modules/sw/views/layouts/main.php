<?php

use sw\assets\SwAsset;

SwAsset::register($this);
Yii::$app->vueApp->methods = [
    'historyBack' => 'function(){
        window.history.back();
    }'
]
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta name="yandex-verification"
          content="4c30d421c759e1ed" />
    <title>SwCMS <?= $this->title ?></title>

    <?php $this->registerCsrfMetaTags(); ?>
    <?php $this->head(); ?>
</head>

<body class="layout-boxed sidebar-xs"
      style="background-image: url(/theme/sw/global_assets/images/backgrounds/boxed_bg.png);">
    <?php $this->beginBody(); ?>
    <div id="vue-app">
        <!-- Main navbar -->
        <?php echo $this->render('header'); ?>
        <!-- /main navbar -->

        <!-- Page container -->
        <div class="page-container"
             style="min-height: 100vh; margin-top: 4em">
            <div class="page-content">

                <!-- Main sidebar -->
                <div class="sidebar sidebar-main">
                    <div class="sidebar-content">

                        <!-- Main navigation -->
                        <?php echo $this->render('menu'); ?>
                        <!-- /main navigation -->

                    </div>
                </div>
                <!-- /main sidebar -->


                <!-- Main content -->
                <div class="content-wrapper">

                    <!-- Page header -->
                    <div class="page-header page-header-default">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4>
                                    <b-link href="#"
                                            @click="historyBack">
                                        <i class="icon-arrow-left52 position-left"></i>
                                    </b-link>
                                    <span class="text-semibold"></span>
                                    <?= $this->title ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content">
                        <?= $content; ?>
                    </div>
                    <!-- /content area -->

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->
    </div>
    <?php $this->endBody(); ?>
</body>

</html>
<?php $this->endPage(); ?>