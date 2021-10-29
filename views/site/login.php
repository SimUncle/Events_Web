<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Логин';
$this->params['breadcrumbs'][] = $this->title;
?>

<h6 class="h5 mb-0 mt-4">Добро пожаловать!</h6>
<p class="text-muted mt-1 mb-4">ОАО «Удмуртнефть» Учет мероприятий</p>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'fieldConfig' => [
        'template' => "<div class=\"form-group\">{label}{input}{error}</div>",
        'labelOptions' => ['class' => 'form-control-label'],
    ],
]); ?>
    <?= $form->field($model, 'email', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="user"></i></span></div>{input}</div>'])->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => 'Введите ваш email']) ?>
    <?= $form->field($model, 'password', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="lock"></i></span></div>{input}</div>'])->passwordInput(['class' => 'form-control', 'placeholder' => 'Введите ваш пароль']) ?>
    <div class="text-right mb-3"><a href="request-password-reset">Забыли пароль?</a></div>
<?= Html::submitButton('Авторизоваться', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
<?php ActiveForm::end(); ?>
