<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;

$button_text = sprintf('%s <i class="icon-arrow-right14 position-right"></i>', $model->isNewRecord ? 'Сохранить' : 'Обновить');

?>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(); ?>
        <div class="panel panel-flat">
            <div class="panel-body">

                <!-- <div class="alert alert-info alert-styled-left">
                        <span class="text-semibold">Инфо:</span> для вставки в текст файлов из файлового менеджера используйте <b>{file:техническое_название}</b>
                    </div> -->

                <!-- <hr> -->

                <?= $form->errorSummary($model) ?>

                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'title')->textInput() ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'tech_name')->textInput() ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'img_obj')->fileInput(['class' => 'file-styled']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'keywords')->textInput() ?>
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($model, 'description')->textInput() ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php echo $form->field($model, 'menu_name')
                            ->textInput(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->field($model, 'active')
                                ->checkbox(); ?>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <?php echo $form->field($model, 'text',[
                                    'inputOptions' => [
                                        'id' => 'html_editor',
                                        'class' => 'd-none'
                                    ]
                                ])->textarea(); ?>
                        <sw-code-editor selector="#html_editor"></sw-code-editor>
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