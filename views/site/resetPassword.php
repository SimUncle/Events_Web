<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $model app\models\ResetPasswordForm */

$this->title = 'Сброс пароля';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
    'id' => 'reset-password-form',
    'fieldConfig' => [
        'template' => "<div class=\"form-group\">{label}{input}{error}</div>",
        'labelOptions' => ['class' => 'form-control-label'],
    ],
]); ?>
    <h4 class="ks-header">Сброс пароля</h4>

<?= $form->field($model, 'password', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="lock"></i></span></div>{input}</div>'])->passwordInput(['class' => 'form-control', 'placeholder' => 'Введите ваш пароль']) ?>

<?= $form->field($model, 'password_repeat', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="lock"></i></span></div>{input}</div>'])->passwordInput(['class' => 'form-control', 'placeholder' => 'Повторите ваш пароль']) ?>


    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
    </div>
    <div class="ks-text-center">
        Пожалуйста, измените ваш пароль.
    </div>
<?php ActiveForm::end(); ?>