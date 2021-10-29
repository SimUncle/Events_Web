<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SpeechAttachmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $speech \app\models\Speech */

$this->title = 'Материалы выступления: ('.$speech->name.')';

$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->params['breadcrumbs'][] = ['label' => 'Список секторов: ('.$speech->sector->event->name.')', 'url' => ['/admin/sector', 'event_id' => $speech->sector->event->id]];
$this->params['breadcrumbs'][] = ['label' => 'Список выступлений: ('.$speech->sector->name.')', 'url' => ['/admin/speech', 'sector_id' => $speech->sector->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="speech-attachment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить материалы выступления', ['create', 'speech_id' => $speech -> id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'speech_id',
            [
                'attribute' => 'speech_id',
                'value' => function ($model) {
                    return $model->speech->name;
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
//            'created_at:datetime',
//            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
