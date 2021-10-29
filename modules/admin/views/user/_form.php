<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Organization;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'organization')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organization_id')->dropDownList(Organization::activeList(),['prompt' => '']) ?>


        <?= $form->field($model, 'status')->dropDownList(User::$statusList) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
