<?php

use app\models\Event;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Registration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registration-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>
    <?= $form->field($model, 'user_id')->dropDownList(User::activeList(),['prompt' => '']) ?>


<!--    --><?//= $form->field($model, 'event_id')->textInput() ?>
    <?= $form->field($model, 'event_id')->dropDownList(Event::activeList(),['prompt' => '']) ?>


<!--        --><?//= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
