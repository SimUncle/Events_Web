<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Списик отзывов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a('Создать комент на время отзыва, затем не забудь удолить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'text',
            'score',
//            'user_id',
            [
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->user->fio;
                }
            ],
//            'type',
            [
                'attribute' => 'type',
                'value' => function($model)
                {
                    return $model->type > 0 ? 'Выступление' : 'Мероприятие';
                }
            ],

//            'object_id',
            [
                'attribute' => 'object_id',
                'value' => function($model)
                {
                    return $model->object->name;
                }
            ],
            'date',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view}',],        ],
    ]); ?>


</div>
