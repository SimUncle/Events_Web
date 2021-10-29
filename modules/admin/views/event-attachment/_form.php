<?php

use app\models\Event;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventAttachment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-attachment-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'event_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'event_id')->dropDownList(Event::activeList(),['prompt' => '']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(User::$statusList) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
