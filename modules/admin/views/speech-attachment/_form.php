<?php

use app\models\Speech;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpeechAttachment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="speech-attachment-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'speech_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'speech_id')->dropDownList(Speech::activeList(),['prompt' => '']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(User::$statusList) ?>


    <!--    --><?//= $form->field($model, 'created_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
