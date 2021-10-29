<?php

use app\models\User;
use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'score')->textInput() ?>
    <?= $form->field($model, 'score')->dropDownList([
        '1' => '1 - Очень плохо',
        '2' => '2 - Такое себе',
        '3' => '3 - Ниче так',
        '4' => '4 - С пивом сойдет',
        '5' => '5 - Зашибись',

    ], ['prompt' => '']) ?>

<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>
    <?= $form->field($model, 'user_id')->dropDownList(User::activeList(),['prompt' => '']) ?>


<!--    --><?//= $form->field($model, 'type')->textInput() ?>
    <?= $form->field($model, 'type')->dropDownList([
        '0' => 'Мероприятие',
        '1' => 'Выступление',
    ]) ?>

<!--    проверка мероприятие или отзыв-->

    <?= $form->field($model, 'object_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'date')->textInput() ?>
    <?=$form->field($model, 'date')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Время окончания мероприятия ...', 'autocomplete' => 'off'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
