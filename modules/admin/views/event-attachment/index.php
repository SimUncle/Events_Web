<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\EventAttachmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Материалы мероприятия: ('.$event->name.')';
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-attachment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a('Добавить материалы', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Добавить материалы', ['create', 'event_id' => $event->id], ['class' => 'btn btn-success']) ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'event_id',
            [
                'attribute' => 'event_id',
                'value' => function ($model) {
                    return $model->event->name;
                }
            ],
            'name',
            'url:url',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($data)
                {
                    return '<span class="text-'.($data->status ? 'success' : 'danger').'">'.$data->getStatusName().'</span>';
                }
            ],
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
