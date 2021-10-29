<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $test \app\models\Test */

$this->title = 'Список вопросов: ('.$test->name.')';

$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->params['breadcrumbs'][] = ['label' => 'Список тестов: ('.$test->event->name.')', 'url' => ['/admin/test', 'event_id' => $test->event_id]];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить вопрос', ['create', 'test_id' => $test->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'num',
            'text:text',
            'time',
//            'test_id',
            [
                'attribute' => 'test_id',
                'value' => function ($model) {
                    return $model->test->name;
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
                'label'=>'',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<a class="btn btn-warning" href="'.Url::toRoute(['answer/index', 'question_id' => $data->id]).'">Ответы</a>';
                }

            ],
//            'created_at:datetime',
//            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
