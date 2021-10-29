<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SpeechAttachment */
/* @var $speech \app\models\Speech */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->params['breadcrumbs'][] = ['label' => 'Список секторов: ('.$model->speech->sector->event->name.')', 'url' => ['/admin/sector', 'event_id' => $model->speech->sector->event->id]];
$this->params['breadcrumbs'][] = ['label' => 'Список выступлений: ('.$model->speech->sector->name.')', 'url' => ['/admin/speech', 'sector_id' => $model->speech->sector->id]];
$this->params['breadcrumbs'][] = ['label' => 'Материалы выступления: ('.$model->speech->name.')', 'url' => ['index', 'speech_id' => $model->speech->id]];

$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="speech-attachment-view">

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
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
