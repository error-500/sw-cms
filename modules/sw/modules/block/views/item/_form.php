<?php

use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Json;

$button_text = sprintf('%s <i class="icon-arrow-right14 position-right"></i>', $model->isNewRecord ? 'Сохранить' : 'Обновить');

Yii::$app->vueApp->data = [
    'tinyMceOpts' => Json::encode([
        'image_list' => '/sw/file_manager/item/index'
    ]),
    'templatesList' => array_map(function($tplItem){
        return [
            'id' => $tplItem->id,
            'name' => $tplItem->name,
            'config' => $tplItem->params,
            'path' => $tplItem->path,
        ];
    }, $templates),
    'template' => null,
];
Yii::$app->vueApp->computed = [
    'tplConfig' => 'function(){
        const list = this.templatesList.slice();
        const template = list.find((tpl) => { return tpl.id === this.template});
        if(template && template.config) {
            return template.config;
        }
        return null;
    }',
];

?>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(); ?>
        <div class="panel panel-flat">
            <div class="panel-body">
                <?php if($model->hasErrors()): ?>
                <b-alert variant="danger"
                         dissmisible>
                    <?php $form->errorSummary($model) ?>
                </b-alert>
                <?php endif; ?>
                <b-tabs>
                    <b-tab title="Конфигурация блока">


                        <div class="row">
                            <div class="col-md-4">
                                <?php echo $form->field($model, 'title')->textInput(); ?>
                            </div>

                            <div class="col-md-4">
                                <?php echo $form->field($model, 'tech_name')->textInput(); ?>
                            </div>

                            <div class="col-md-4">
                                <?php echo $form->field($model, 'img_obj')
                                    ->fileInput(['class' => 'file-styled']); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <?php echo $form->field($model, 'text')->textarea([
                                    'id' => 'sw-editor',
                                    'class' => 'd-none',
                                ]); ?>
                                <sw-editor id="sw-editor"
                                           class="d-none"
                                           :other_options="tinyMceOpts"></sw-editor>
                            </div>
                        </div>
                    </b-tab>
                    <b-tab title="Шаблон блока и переменные блока">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <?php echo $form->field(
                                    $model,
                                    'template_id',
                                    ['inputOptions' => [
                                        'placeholder' => 'Выберите шаблон блока',
                                        'v-model.number' => 'template'
                                        ]
                                    ])
                                        ->dropdownList(
                                            ArrayHelper::map($templates, 'id', 'name')
                                        )->label('Шаблон блока');
                                ?>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <b-form-group v-for="(field, name, idx) in tplConfig"
                                              :key="`tpl-field-${idx}`"
                                              :label-for="`tpl-field-${name}`"
                                              :label="field.label">
                                    <b-form-input :id="`tpl-field-${name}`"
                                                  v-bind="field"
                                                  :name="`Block['template_vars'][${field.name}]`"></b-form-input>
                                </b-form-group>
                            </div>
                        </div>
                    </b-tab>
                    <b-tab title="Страница размещения">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <?php echo $form->field($model, 'page_id', ['inputOptions' => ['placeholder' => "Укажите страницу размещения"]])
                                            ->dropdownList(
                                                ArrayHelper::map($pages, 'id', 'title'),
                                            )->label('Страница');
                                    ?>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <?php echo $form->field($model, 'position')
                                        ->input(['type' => 'number'])
                                        ->label('Позиция на странице');
                                ?>
                            </div>
                        </div>
                    </b-tab>
                    <div class="text-right">
                        <?php echo Html::submitButton($button_text, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
                    </div>
                </b-tabs>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>