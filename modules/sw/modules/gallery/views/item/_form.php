<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;

use app\modules\sw\models\InfoBlockGroup;

$button_text = sprintf('%s <i class="icon-arrow-right14 position-right"></i>', $model->isNewRecord ? 'Сохранить' : 'Обновить');

$this->registerJs('
    var html_editor = ace.edit("html_editor");
    var textarea = $(\'textarea[name="Item[text]"]\').hide();
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
                        <div class="col-md-4">
                            <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map(InfoBlockGroup::find()->all(), 'id', 'name'), [
                                'prompt' => 'Выберите'
                            ]) ?>
                        </div>

                        <div class="col-md-2">
                            <?= $form->field($model, 'pos')->textInput() ?>
                        </div>

                        <div class="col-md-2">
                            <?= $form->field($model, 'active')->dropDownList([1 => 'Да', 0 => 'Нет']) ?>
                        </div>

                        <div class="col-md-4">
                            <?= $form->field($model, 'href')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-md-4">
                            <?= $form->field($model, 'alt')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-md-4">
                            <?= $form->field($model, 'img_obj')->fileInput(['class' => 'file-styled']) ?>
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
