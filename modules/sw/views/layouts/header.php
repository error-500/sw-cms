<?php

use yii\helpers\Url;

?>

<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?= Url::to(['/sw/dashboard/index']) ?>">SwCMS</a> 

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-right">                
            <!-- <?= $this->render('events') ?> -->
            
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <span><?= Yii::$app->user->identity->username ?></span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <?php if (Yii::$app->user->can('admin')) : ?>
                    <li><a href="#"><i class="icon-coins"></i> Оплата</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> Настройки</a></li>
                    <?php endif; ?>
                    <li><a href="<?= Url::to(['/sw/auth/logout']) ?>"><i class="icon-switch2"></i> Выход</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>