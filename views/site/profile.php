<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ProfileForm */
/* @var $user app\models\ProfileForm */

use app\models\Organization;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Личный кабинет';
?>
<div class="container-fluid">
    <div class="row page-title mt-2 d-print-none">
        <div class="col-md-12">

            <h4 class="mb-1 mt-0">Личный кабинет</h4>
        </div>
    </div>
    <?php if (Yii::$app->session->hasFlash('ProfileUpdated')): ?>

        <div class="alert alert-success">
            Ваши личные данные были обновлены.
        </div>
    <?php else: ?>

    <div class="row">
        <div class="col-lg-6 p-5">

            <?php $form = ActiveForm::begin([
//                'id' => 'profile',
//                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "<div class=\"form-group\">{label}{input}{error}</div>",
                    'labelOptions' => ['class' => 'form-control-label'],
                ],
            ]); ?>
            <?= $form->field($model, 'username', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="user"></i></span></div>{input}</div>'])->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => 'Введите новый логин', 'value' => $user->username]) ?>
            <?= $form->field($model, 'email', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="user"></i></span></div>{input}</div>'])->textInput(['class' => 'form-control', 'placeholder' => 'Введите новый email', 'value' => $user->email]) ?>
            <?= $form->field($model, 'fio', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="user"></i></span></div>{input}</div>'])->textInput(['class' => 'form-control', 'placeholder' => 'Введите новый ФИО', 'value' => $user->fio]) ?>
            <?= $form->field($model, 'organization_id')->dropDownList(Organization::activeList(),['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"></div>{input}</div>']) ?>
            <?= $form->field($model, 'password', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="lock"></i></span></div>{input}</div>'])->passwordInput(['class' => 'form-control', 'placeholder' => 'Введите новый пароль']) ?>
            <?= $form->field($model, 'password_repeat', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="lock"></i></span></div>{input}</div>'])->passwordInput(['class' => 'form-control', 'placeholder' => 'Подтвердите новый пароль']) ?>

            <?= Html::submitButton('Обновить личные данные', ['class' => 'btn btn-primary btn-block', 'name' => 'profile-button']) ?>


            <?php ActiveForm::end(); ?>

<?php endif; ?>