<?php

use app\models\Event;
use app\models\User;
use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2jodit\JoditWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'date_start')->textInput() ?>

    <?=$form->field($model, 'date_start')->widget(DateTimePicker::classname(), [
    'options' => ['placeholder' => 'Время начала мероприятия ...', 'autocomplete' => 'off'],
    'pluginOptions' => [
    'autoclose' => true
    ]
    ]);?>

<!--    --><?//= $form->field($model, 'date_end')->textInput() ?>

    <?=$form->field($model, 'date_end')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Время окончания мероприятия ...', 'autocomplete' => 'off'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);?>

<!--    --><?//= $form->field($model, 'have_test')->textInput() ?>

    <?= $form->field($model, 'have_test')->checkbox() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'map')->widget(JoditWidget::className(), [
        'settings' => [
            'buttons'=>[
                'bold', 'italic', 'underline', '|', 'ul', 'ol', '|', 'image', '|', 'hr',
            ],
        ],
    ]);?>

<!--    --><?//= $form->field($model, 'map')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(User::$statusList) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
