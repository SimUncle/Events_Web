<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Question */
/* @var $test \app\models\Test */

$this->title = 'Изменить вопрос № ' . $model->num;
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->params['breadcrumbs'][] = ['label' => 'Список тестов: ('.$model->test->event->name.')', 'url' => ['/admin/test', 'event_id' => $model->test->event_id]];
$this->params['breadcrumbs'][] = ['label' => 'Список вопросов: ('.$model->test->name.')', 'url' => ['index', 'test_id' => $model->test->id]];
$this->params['breadcrumbs'][] = ['label' => 'Вопрос № '.$model->num.'', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="question-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
