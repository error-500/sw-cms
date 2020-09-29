<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$button_text = sprintf('%s <i class="icon-arrow-right14 position-right"></i>', $model->isNewRecord ? 'Сохранить' : 'Обновить');

$this->registerJs('
    var html_editor = ace.edit("html_editor");
    var textarea = $(\'textarea[name="Group[text]"]\').hide();
        html_editor.setTheme("ace/theme/monokai");
        html_editor.getSession().setMode("ace/mode/html");
        html_editor.setShowPrintMargin(false);
        html_editor.getSession().setValue(textarea.val());
        html_editor.getSession().on(\'change\', function(){
          textarea.val(html_editor.getSession().getValue());
        });
', \yii\web\View::POS_END);

?>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(); ?>
            <div class="panel panel-flat">
                <div class="panel-body">
                    
                    <?= $form->errorSummary($model) ?>

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $form->field($model, 'tech_name')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'text', [
                                'inputTemplate' => '<div id="html_editor"></div> {input}'
                            ])->textarea() ?>
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
