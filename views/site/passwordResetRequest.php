<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $model app\models\PasswordResetRequestForm */

$this->title = 'Сброс пароля';
?>

<?php $form = ActiveForm::begin([
    'id' => 'reset-form',
    'fieldConfig' => [
        'template' => "<div class=\"form-group\">{label}{input}{error}</div>",
        'labelOptions' => ['class' => 'form-control-label'],
    ],
]); ?>
    <h4 class="ks-header">Сброс пароля</h4>

<?= $form->field($model, 'email', ['inputTemplate' => '<div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><i class="icon-dual" data-feather="user"></i></span></div>{input}</div>'])->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => 'Введите ваш email']) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
    </div>
    <div class="ks-text-center">
        Пожалуйста, заполните вашу электронную почту. Ссылка для сброса пароля будет отправлена туда.
    </div>
<?php ActiveForm::end(); ?>