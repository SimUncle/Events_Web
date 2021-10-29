<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TestResult */

$this->title = $model->question->text;
$this->params['breadcrumbs'][] = ['label' => 'Результат теста', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>`
<div class="test-result-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'user_id',
            [
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->user->fio;
                }
            ],
//            'event_id',
            [
                'attribute' => 'event_id',
                'value' => function ($model) {
                    return $model->event->name;
                }
            ],
//            'test_id',
            [
                'attribute' => 'test_id',
                'value' => function ($model) {
                    return $model->test->name;
                }
            ],
//            'question_id',
            [
                'attribute' => 'question_id',
                'value' => function ($model) {
                    return $model->question->text;
                }
            ],
//            'answer_id',
            [
                'attribute' => 'answer_id',
                'value' => function ($model) {
                    return $model->answer->text;
                }
            ],
            'time',
        ],
    ]) ?>

</div>
