<?php

use yii\helpers\{Html, ArrayHelper};
use yii\bootstrap\ActiveForm;

$button_text = sprintf('%s <i class="icon-arrow-right14 position-right"></i>', $model->isNewRecord ? 'Сохранить' : 'Обновить');

?>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(); ?>
            <div class="panel panel-flat">
                <div class="panel-body">
                    
                    <?= $form->errorSummary($model) ?>

                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'name')->textInput() ?>
                        </div>

                        <div class="col-md-4">
                            <?= $form->field($model, 'tech_name')->textInput() ?>
                        </div>

                        <div class="col-md-4">
                            <?= $form->field($model, 'file_obj')->fileInput(['class' => 'file-styled']) ?>
                        </div>
                    </div>

                    <div class="text-right">
                        <?= Html::submitButton($button_text, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
