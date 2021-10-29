<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Answer */
/* @var $question \app\models\Question */

$this->title = 'Ответ № '.$model->num.'';

$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->params['breadcrumbs'][] = ['label' => 'Список тестов: ('.$model->question->test->event->name.')', 'url' => ['/admin/test', 'event_id' => $model->question->test->event_id]];
$this->params['breadcrumbs'][] = ['label' => 'Список вопросов: ('.$model->question->test->name.')', 'url' => ['/admin/question', 'test_id' => $model->question->test->id]];
$this->params['breadcrumbs'][] = ['label' => 'Ответы на вопрос №: '.$model->question->num.'', 'url' => ['index', 'question_id' => $model->question->id]];

$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="answer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text:ntext',
            'num',
            [
                'attribute' => 'question_id',
                'value' => function ($model) {
                    return $model->question->text;
                }
            ],
            [
                'attribute' => 'Статус',
                'value' => $model->getStatusName()
            ],
            [
                'attribute' => 'is_correct',
                'value' => function($model)
                {
                    return $model->is_correct > 0 ? 'Да' : 'Нет';
                }
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
