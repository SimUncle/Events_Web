<?php

use app\models\Organization;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<h6 class="h5 mb-0 mt-4">Добро пожаловать!</h6>
<p class="text-muted mt-1 mb-4">ОАО «Удмуртнефть» Учет мероприятий</p>

<?php $form = ActiveForm::begin([
    'id' => 'signup-form',
    'fieldConfig' => [
        'template' => "<div class=\"form-group\">{label}{input}{error}</div>",
        'labelOptions' => ['class' => 'form-control-label'],
    ],
]); ?>
    <?= $form->field($model, 'fio', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="user"></i></span></div>{input}</div>'])->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => 'Введите ФИО']) ?>
    <?= $form->field($model, 'username', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="user"></i></span></div>{input}</div>'])->textInput(['class' => 'form-control', 'placeholder' => 'Введите логин']) ?>
    <?= $form->field($model, 'email', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="user"></i></span></div>{input}</div>'])->textInput(['class' => 'form-control', 'placeholder' => 'Введите email']) ?>
    <?= $form->field($model, 'organization_id', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="user"></i></span></div>{input}</div>'])->dropDownList(Organization::activeList(),['class' => 'form-control', 'placeholder' => 'Введите организацию']) ?>
    <?= $form->field($model, 'password', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="lock"></i></span></div>{input}</div>'])->passwordInput(['class' => 'form-control', 'placeholder' => 'Введите пароль']) ?>
    <?= $form->field($model, 'password_repeat', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="lock"></i></span></div>{input}</div>'])->passwordInput(['class' => 'form-control', 'placeholder' => 'Повторите пароль']) ?>

    <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
<?php ActiveForm::end(); ?>