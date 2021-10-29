<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Registration */

$this->title = 'Изменить регистрацию: ' . $model->user->fio;
$this->params['breadcrumbs'][] = ['label' => 'Регистрации', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->fio, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="registration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
