<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;

use app\modules\sw\modules\blog\models\Group;

$button_text = sprintf('%s <i class="icon-arrow-right14 position-right"></i>', $model->isNewRecord ? 'Сохранить' : 'Обновить');

$options = ['depends' => ['app\modules\sw\assets\SwAsset']];
$this->registerJsFile('/theme/sw/global_assets/js/plugins/editors/summernote/summernote.min.js', $options);
$this->registerJsFile('/theme/sw/global_assets/js/plugins/forms/styling/uniform.min.js', $options);
$this->registerJsFile('/theme/sw/global_assets/js/demo_pages/editor_summernote.js', $options);
$this->registerJsFile('theme/sw/plugin/ckeditor/options.js', $options);

?>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(); ?>
            <div class="panel panel-flat">
                <div class="panel-body">

                    <?= $form->errorSummary($model) ?>

                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map(Group::find()->all(), 'id', 'name'), [
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
                            <?= $form->field($model, 'preview_text')->textarea(['id' => 'preview_text']) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'text')->textarea(['id' => 'text']) ?>
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
