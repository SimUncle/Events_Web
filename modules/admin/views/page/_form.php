<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2jodit\JoditWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>
    <?=$form->field($model, 'content')->widget(JoditWidget::className(), [
        'settings' => [
            'buttons'=>[
                'bold', 'italic', 'underline', '|', 'ul', 'ol', '|', 'image', '|', 'hr',
            ],
        ],
    ]);?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
