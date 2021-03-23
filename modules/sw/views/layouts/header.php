<?php

use yii\helpers\Url;

?>
<b-navbar toggleable="lg"
          type="dark"
          variant="dark"
          fixed="top">
    <b-navbar-brand>SwCMS</b-navbar-brand>

    <b-navbar-toggle target="main-nav"></b-navbar-toggle>
    <b-collapse id="main-nav"
                is-nav>
        <b-navbar-nav>
            <b-nav-item-dropdown text="<?php echo Yii::$app->user->identity->username ?>">
                <b-dropdown-item href="/sw/user/update?id=<?php echo Yii::$app->user->id; ?>">Настройки
                </b-dropdown-item>
            </b-nav-item-dropdown>
            <b-nav-item href="<?php echo Url::to(['/sw/auth/logout']) ?>">
                <i class="icon-switch2"></i> Выход
            </b-nav-item>
        </b-navbar-nav>
    </b-collapse>
</b-navbar>
<?php echo $this->render('events');