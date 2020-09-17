<?php

\app\modules\sw\assets\SwAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="yandex-verification" content="4c30d421c759e1ed" />
    <title>SwCMS <?= $this->title ?></title>

    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body class="layout-boxed sidebar-xs" style="background-image: url(/theme/sw/global_assets/images/backgrounds/boxed_bg.png);">
<?php $this->beginBody() ?>

    <!-- Main navbar -->
    <?= $this->render('header') ?>
    <!-- /main navbar -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <div class="sidebar sidebar-main">
                <div class="sidebar-content">

                    <!-- Main navigation -->
                    <?= $this->render('menu'); ?>
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
                            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"></span> <?= $this->title ?></h4>
                        </div>

                        <!-- <div class="heading-elements">
                            <div class="heading-btn-group">
                                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
                            </div>
                        </div> -->
                    </div>

                    <div class="breadcrumb-line">
                        <!-- <ul class="breadcrumb">
                            <li><a href="index.html"><i class="icon-arrow-left52 position-left"></i> <?= $this->title ?></span></a></li>
                            <li class="active">Dashboard</li>
                        </ul> -->

                        <!-- <ul class="breadcrumb-elements">
                            <li><a href="#"><i class="icon-comment-discussion position-left"></i> Поддержка</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-gear position-left"></i>
                                    Settings
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                                    <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                                    <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                                </ul>
                            </li>
                        </ul> -->
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

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>