<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;

use app\modules\sw\modules\product\models\Group;

$button_text = sprintf('%s <i class="icon-arrow-right14 position-right"></i>', $model->isNewRecord ? 'Сохранить' : 'Обновить');
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
];
?>

<b-media no-body>
    <b-media-aside>
        <b-img <?php if(empty($model->imgSrc)): ?>
               blank
               <?php endif; ?>
               blank-color="rgba(128, 128, 128, .8)"
               thumbnail
               width="200"
               <?php if(!empty($model->imgSrc)): ?>
               src="<?php echo $model->imgSrc; ?>"
               <?php endif;?>></b-img>
    </b-media-aside>
    <b-media-body>
        <?php $form = ActiveForm::begin(); ?>
        <div class="panel panel-flat">
            <div class="panel-body">

                <?= $form->errorSummary($model) ?>

                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map(Group::find()->all(), 'id', function($data) {
                                if (empty($data->parent->name)) {
                                    return $data['name'];
                                }
                                return sprintf('%s (Родительская группа - %s)', $data['name'], $data->parent->name);
                            }), [
                                'prompt' => 'Выберите'
                            ]) ?>
                    </div>

                    <div class="col-md-5">
                        <?= $form->field($model, 'name')->textInput() ?>
                    </div>

                    <div class="col-md-3">
                        <?php echo $form->field($model, 'img_obj')
                                ->fileInput(['class' => 'file-styled form-control']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <?= $form->field($model, 'pos')->textInput() ?>
                    </div>

                    <div class="col-md-2">
                        <?= $form->field($model, 'is_delivery')->dropDownList([1 => 'Да', 0 => 'Нет']) ?>
                    </div>

                    <div class="col-md-2">
                        <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-2">
                        <?= $form->field($model, 'volume')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($model, 'consist')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $form->field($model, 'active')->checkbox(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'about', [
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
    </b-media-body>
</b-media>
