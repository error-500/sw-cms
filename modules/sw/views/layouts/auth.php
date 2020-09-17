<?php

use yii\helpers\Html;

\app\modules\sw\assets\AuthAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SwoCMS</title>

    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body class="login-container">
    <?php $this->beginBody() ?>

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">
                    <?= $content ?>

                    <!-- Footer -->
                    <div class="footer text-muted text-center">
                        &copy; <?= date('Y') ?>. <a href="#">SwCMS</a>
                    </div>
                    <!-- /footer -->
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
