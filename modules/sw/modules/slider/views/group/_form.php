<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var sw\modules\slider\models\Group $model
 */
$button_text = sprintf('%s <i class="icon-arrow-right14 position-right"></i>', $model->isNewRecord ? 'Сохранить' : 'Обновить');
Yii::$app->vueApp->data = [
    'activeImg' => [
        'title' => null,
        'uri'   => null,
    ],
];
Yii::$app->vueApp->methods = [
    'resetImg' => 'function(){
        this.activeImg = {
            title: null,
            uri: null,
        }
    }',
    'popupImg' => 'function(itemId, uri){
        if ( !this.slides ) {
            this.resetImg();
            return;
        }
        this.activeImg = {
            title: this.slides.find((slide) => {return slide.id === itemId}).title,
            uri: uri,
        };
        this.$refs["image-view"].show();
    }'
]
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
        <?php if (!$model->isNewRecord): ?>
        <h3><?php echo Yii::t('app', 'Слайды в группе "{0}"', [$model->name]);?></h3>
        <b-row>
            <b-col>
                <?php
                    /**
                     * @var sw\modules\slider\models\Item[] $items
                     */
                    $items = $model->items;
                    if (!empty($items)):
                        Yii::$app->vueApp->data = [
                            'sliders' => array_map(function($item){
                                return $item->toArray();
                            }, $items),
                        ];
                ?>
                <b-table-simple responsive
                                striped
                                table-variant="default">
                    <b-thead>
                        <b-tr>
                            <?php
                            /**
                             * @var sw\modules\slider\models\Item $item
                             */
                            foreach($items[0]->attributes() as $attrName): ?>
                            <b-th ref="<?php echo '-'.$attrName;?>">
                                <?php switch($attrName):
                                     case "group_id":
                                     case "created":
                                     case "updated":
                                     break;
                                ?>
                                <?php default: ?>
                                <?php echo $items[0]->getAttributeLabel($attrName); ?>
                                <?php break; ?>
                                <?php endswitch; ?>
                            </b-th>
                            <?php endforeach; ?>
                        </b-tr>
                    </b-thead>
                    <b-tbody>
                        <?php foreach($items as $item):?>
                        <b-tr ref="item-<?php echo $item->id; ?>"
                              @click="$emit('item-click', '<?php echo $item->id; ?>')">
                            <?php foreach($item->attributes() as $attrName): ?>
                            <b-td ref="item-<?php echo $item->id.'-'.$attrName; ?>">
                                <?php switch($attrName):
                                     case "group_id":
                                     case "created":
                                     case "updated":
                                     break;
                                ?>
                                <?php case "img": ?>
                                <b-link @click="popupImg(<?php echo $item->id; ?>, '<?php echo $item->imgSrc; ?>')">
                                    <b-img fluid
                                           thumbnail
                                           style="max-height: 3em;"
                                           src="<?php echo $item->imgSrc; ?>"></b-img>
                                </b-link>
                                <?php break; ?>
                                <?php default: ?>
                                <?php echo $item->$attrName; ?>
                                <?php break; ?>
                                <?php endswitch; ?>
                            </b-td>
                            <?php endforeach; ?>
                        </b-tr>
                        <?php endforeach; ?>
                    </b-tbody>
                </b-table-simple>
                <?php else: ?>
                <span class="text-center">
                    <?php echo Yii::t('app', "Нет слайдов в группе \"{0}\"", [$model->name]); ?>
                </span>
                <?php endif; ?>
            </b-col>
        </b-row>
        <b-modal ref="image-view"
                 hide-footer
                 size="xl"
                 @hide="resetImg">
            <template v-slot.modal-title>
                <?php echo Yii::t('app', 'Изображение для слайда "{{ activeImg.title }}"'); ?>
            </template>
            <div>
                <b-img fluid
                       thumbnail
                       :src="activeImg.uri"></b-img>
            </div>
        </b-modal>
        <?php endif; ?>
    </div>
</div>