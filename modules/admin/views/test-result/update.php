<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TestResult */

$this->title = 'Изменить результаты: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Результаты теста', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="test-result-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
