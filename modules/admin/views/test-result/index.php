<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TestResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Результаты теста';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-result-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a('Создать результат на время проверок, потом удоли', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
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

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view}',],
        ],
    ]); ?>


</div>
