<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\helpers\Url;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="authentication-bg">
<?php $this->beginBody() ?>
<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-6 p-5">
                                <div class="mx-auto mb-5">
                                    <a href="/">
                                        <img src="/images/logo.png" alt="" height="45" />
                                        <h3 class="d-inline align-middle ml-1 text-logo">Удмуртнефть</h3>
                                    </a>
                                </div>
                                <?= $content ?>
                            </div>
                            <div class="col-lg-6 d-none d-md-inline-block">
                                <div class="auth-page-sidebar">
                                    <div class="overlay"></div>

                                </div>
                            </div>
                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <? if(Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'login'): ?>
                            <p class="text-muted">Нет аккаунта? <a href="<?= Url::toRoute(['site/signup']) ?>" class="text-primary font-weight-bold ml-1">Регистрация</a></p>
                        <? else: ?>
                            <p class="text-muted">Уже есть аккаунт? <a href="<?= Url::toRoute(['site/login']) ?>" class="text-primary font-weight-bold ml-1">Авторизация</a></p>
                        <? endif; ?>
                    </div> <!-- end col -->
                </div>


            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>