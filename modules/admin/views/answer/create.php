<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Answer */
/* @var $question \app\models\Question */

$this->title = 'Добавить ответ';
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->params['breadcrumbs'][] = ['label' => 'Список тестов: ('.$model->question->test->event->name.')', 'url' => ['/admin/test', 'event_id' => $model->question->test->event_id]];
$this->params['breadcrumbs'][] = ['label' => 'Список вопросов: ('.$model->question->test->name.')', 'url' => ['/admin/question', 'test_id' => $model->question->test->id]];
$this->params['breadcrumbs'][] = ['label' => 'Ответы на вопрос №: '.$model->question->num.'', 'url' => ['index', 'question_id' => $model->question->id]];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
