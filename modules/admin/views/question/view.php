<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Question */
/* @var $test \app\models\Test */

$this->title = 'Вопрос № '.$model->num.' ';
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->params['breadcrumbs'][] = ['label' => 'Список тестов: ('.$model->test->event->name.')', 'url' => ['/admin/test', 'event_id' => $model->test->event_id]];
$this->params['breadcrumbs'][] = ['label' => 'Список вопросов: ('.$model->test->name.')', 'url' => ['index', 'test_id' => $model->test->id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="question-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'time:datetime',
            'num',
//            'test_id',
            [
                'attribute' => 'test_id',
                'value' => function ($model) {
                    return $model->test->name;
                }
            ],
            [
                'attribute' => 'Статус',
                'value' => $model->getStatusName()
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
