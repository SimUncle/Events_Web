<?php

use app\models\Answer;
use app\models\Event;
use app\models\Question;
use app\models\Test;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TestResult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-result-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_id')->dropDownList(User::activeList(),['prompt' => '']) ?>

<!--    --><?//= $form->field($model, 'event_id')->textInput() ?>
    <?= $form->field($model, 'event_id')->dropDownList(Event::activeList(),['prompt' => '']) ?>

<!--    --><?//= $form->field($model, 'test_id')->textInput() ?>
    <?= $form->field($model, 'test_id')->dropDownList(Test::activeList(),['prompt' => '']) ?>

<!--    --><?//= $form->field($model, 'question_id')->textInput() ?>
    <?= $form->field($model, 'question_id')->dropDownList(Question::activeList(),['prompt' => '']) ?>


<!--    --><?//= $form->field($model, 'answer_id')->textInput() ?>
    <?= $form->field($model, 'answer_id')->dropDownList(Answer::activeList(),['prompt' => '']) ?>



    <?= $form->field($model, 'time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
