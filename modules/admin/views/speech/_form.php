<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Speaker;

/* @var $this yii\web\View */
/* @var $model app\models\Speech */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="speech-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'speaker_id')->textInput() ?>

    <?= $form->field($model, 'speaker_id')->dropDownList(Speaker::activeList(),['prompt' => '']) ?>


<!--    --><?//= $form->field($model, 'sector_id')->textInput() ?>

    <?= $form->field($model, 'sector_id')->dropDownList(\app\models\Sector::activeList(),['prompt' => '']) ?>


    <!--    --><?//= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(User::$statusList) ?>


    <!--    --><?//= $form->field($model, 'created_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
