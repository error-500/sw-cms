<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(); ?>
            <div class="panel panel-flat">
                <div class="panel-body">
                    
                    <?= $form->errorSummary($model) ?>

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <div class="text-right">
                        <?= Html::submitButton('Обновить <i class="icon-arrow-right14 position-right"></i>', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

