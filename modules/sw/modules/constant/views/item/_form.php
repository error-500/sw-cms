<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$button_text = sprintf('%s <i class="icon-arrow-right14 position-right"></i>', $model->isNewRecord ? 'Сохранить' : 'Обновить');

/*
Yii::$app->vueApp->data = [
    'html_editor' => "null",
];
Yii::$app->vueApp->mounted = [
    '
    this.$set(this, "html_editor", window.ace.edit("html_editor"));
    const textarea = document.querySelector(\'textarea[name="Item[text]"]\');
    textarea.classList.add("d-none");
    this.html_editor.setTheme("ace/theme/monokai");
    this.html_editor.getSession().setMode("ace/mode/html");
    this.html_editor.setShowPrintMargin(false);
    this.html_editor.getSession().setValue(textarea.value);
    this.html_editor.getSession().on(\'change\', function(){
          textarea.value =html_editor.getSession().getValue();
        });
    '
];*/
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
                        <?= $form->field($model, 'value',[
                                'inputOptions' => [
                                    'id' => 'html_editor',
                                    'class' => 'd-none'
                                ]
                            ])->textarea() ?>
                    </div>
                    <sw-code-editor selector="#html_editor"></sw-code-editor>
                </div>

                <div class="text-right">
                    <?= Html::submitButton($button_text, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>