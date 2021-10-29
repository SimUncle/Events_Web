<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\AnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $question \app\models\Question */

$this->title = 'Ответы на вопрос №: '.$question->num.'';

$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->params['breadcrumbs'][] = ['label' => 'Список тестов: ('.$question->test->event->name.')', 'url' => ['/admin/test', 'event_id' => $question->test->event_id]];
$this->params['breadcrumbs'][] = ['label' => 'Список вопросов: ('.$question->test->name.')', 'url' => ['/admin/question', 'test_id' => $question->test->id]];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-index">

    <h1><?= Html::encode($this->title) ?></h1>
<!--    --><?// print_r($question); die();?>

    <p>
        <?= Html::a('Добавить ответ', ['create', 'question_id' => $question->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'num',
            'text:ntext',
            //            'question_id',
            [
                'attribute' => 'question_id',
                'value' => function ($model) {
                    return $model->question->text;
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($data)
                {
                    return '<span class="text-'.($data->status ? 'success' : 'danger').'">'.$data->getStatusName().'</span>';
                }
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
