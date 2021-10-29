<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $user \app\models\User */

$this->title = 'Отзыв от пользователя: '.$model->user->fio.'';
$this->params['breadcrumbs'][] = ['label' => 'Список отзывов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comment-view">

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
        ],
    ]) ?>

</div>
