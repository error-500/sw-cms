<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;

use app\modules\sw\modules\product\models\Group;
use yii\grid\GridView;

$button_text = sprintf('%s <i class="icon-arrow-right14 position-right"></i>', $model->isNewRecord ? 'Сохранить' : 'Обновить');

?>

<b-tabs content-class="mt-3">
    <b-tab title="Параметры группы">
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
                    <div class="col-md-5">
                        <?= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(Group::find()->all(), 'id', function($data) {
                                if (empty($data->parent->name)) {
                                    return $data['name'];
                                }
                                return sprintf('%s (Родительская группа - %s)', $data['name'], $data->parent->name);
                            }), [
                                'prompt' => 'Выберите'
                            ]) ?>
                    </div>

                    <div class="col-md-2">
                        <?= $form->field($model, 'pos')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-5">
                        <?= $form->field($model, 'img_obj')->fileInput(['class' => 'file-styled']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $form->field($model, 'active')->checkbox(); ?>
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
    </b-tab>
    <?php if(!$model->isNewRecord): ?>
    <b-tab title="Товары в группе">
        <div class="table-responsive">
            <?php echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'tableOptions' => ['class' => 'table table-striped'],
                    'layout' => '{items}',
                    'columns' => [
                        [
                            'attribute' => 'name',
                        ],
                        [
                            'attribute' => 'group_id',
                            'filter' => ArrayHelper::map(Group::find()->all(), 'id', function($data) {
                                if (empty($data->parent->name)) {
                                    return $data['name'];
                                }
                                return sprintf('%s (Родительская группа - %s)', $data['name'], $data->parent->name);
                            }),
                            'value' => function ($data) {
                                return $data->group->name;
                            }
                        ],
                        [
                            'attribute' => 'price',
                        ],
                        [
                            'attribute' => 'img',
                            'header' => 'Картинка',
                            'filter' => false,
                            'format' => 'raw',
                            'value' => function($data) {
                                if (!$data->imgSrc) {
                                    return '<span class="text-warning">Нет</span>';
                                }

                                $img = Html::img($data->imgThumbSrc, ['height' => 50]);
                                return Html::a($img, [$data->imgSrc], ['target' => '_blank']);
                            }
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'contentOptions' => ['style' => 'white-space:nowrap;'],
                            'header' => 'Действия',
                            'template' => '{update} {delete}',
                            'buttons' => [
                                'update' => function ($url, $data) {
                                    return Html::a('<i class="icon-pencil"></i>', ['/sw/product/item/update', 'id' => $data->id]);
                                },
                                'delete' => function ($url, $data) {
                                    return Html::a('<i class="icon-trash"></i>', ['/sw/product/item/delete', 'id' => $data->id], [
                                        'data' => [
                                            'confirm' => 'Вы уверены что хотите удалить запись? Действие нельзя отменить!',
                                        ]
                                    ]);
                                },
                            ],
                        ],
                    ],
                ]); ?>
        </div>
    </b-tab>
    <?php endif; ?>
</b-tabs>