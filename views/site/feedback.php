<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

$this->title = 'Обратная связь';
?>
<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

    <div class="alert alert-success">
        Спасибо за обращение к нам. Мы постараемся ответить вам как можно скорее.
    </div>
<?php else: ?>
<div class="container-fluid">
    <div class="row page-title mt-2 d-print-none">
        <div class="col-md-12">
            <h4 class="mb-1 mt-0">Обратная связь</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row mt-2">
                                <div class="col">
                                    <?php $form = ActiveForm::begin([
                                        'id' => 'feedback',
                                        'layout' => 'horizontal',
                                        'fieldConfig' => [
                                            'template' => "<div class=\"col-form-label \">{label}</div>\n<div class=\"\">{input}</div>\n<div class=\"col-lg-12 col-lg-offset-3 \">{error}</div>",
                                            'horizontalCssClasses' => [
                                                'offset' => 'col-sm-offset-4',
                                                'wrapper' => 'form-group row',
                                                'hint' => '',
                                            ],
                                        ],
                                    ]); ?>
                                    <?= $form->field($model, 'email') ?>
                                    <?= $form->field($model, 'text')->textArea(['rows' => 6]) ?>
                                    <div class="p-2">
                                        <?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-warning waves-effect btn-color-orange btn-color-orange-long', 'name' => 'contact-button']) ?>
                                    </div>
                                    <?php ActiveForm::end(); ?>
                                </div> <!-- end col-->
                            </div> <!-- end row-->
                            <!-- end comments -->
                        </div> <!-- end col -->
                    </div> <!-- end row-->


                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
<?php endif; ?><!-- container-fluid -->