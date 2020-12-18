<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Вход';
?>

<?php $form = ActiveForm::begin(); ?>

<div class="panel panel-body login-form">

    <div class="text-center">
        <div class="icon-object border-slate-300 text-slate-300"><i class="icon-lock2"></i></div>
        <h5 class="content-group">Вход в панель управления <small class="display-block">Введите логин и пароль
                ниже</small></h5>
    </div>

    <?= $form->field($model, 'username', [
            'template' => '
                <div class="form-group has-feedback has-feedback-left">
                    {input}
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                {hint}{error}
                </div>
            '
        ])->label(false)->textInput(['autofocus' => true, 'placeholder' => 'Логин']) ?>

    <?= $form->field($model, 'password', [
            'template' => '
                <div class="form-group has-feedback has-feedback-left">
                    {input}
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                {hint}{error}
                </div>
            '
        ])->label(false)->passwordInput(['placeholder' => 'Пароль']) ?>

    <div class="form-group">
        <?= Html::submitButton('Вход <i class="icon-circle-right2 position-right"></i>', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
    </div>

</div>
<?php ActiveForm::end(); ?>