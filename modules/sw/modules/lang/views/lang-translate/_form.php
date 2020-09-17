<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use app\modules\sw\modules\lang\models\Lang;

$button_text = sprintf('%s <i class="icon-arrow-right14 position-right"></i>', $model->isNewRecord ? 'Сохранить' : 'Обновить');

?>

<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(); ?>
            <div class="panel panel-flat">
                <div class="panel-body">
                    
                    <?= $form->errorSummary($model) ?>

                    <div class="row">
                        <div class="col-md-2">
                            <?= $form->field($model, 'lang_code')->dropDownList(ArrayHelper::map(Lang::find()->all(), 'code', 'name')) ?>
                        </div>

                        <div class="col-md-5">
                            <?= $form->field($model, 'key')->textInput() ?>
                        </div>

                        <div class="col-md-5">
                            <?= $form->field($model, 'value')->textInput() ?>
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