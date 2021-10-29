<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SpeechSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Speech */
/* @var $sector app\models\Sector */

$this->title = 'Список выступлений: ('.$sector->name.')' ;

$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->params['breadcrumbs'][] = ['label' => 'Список секторов: ('.$sector->event->name.')', 'url' => ['/admin/sector', 'event_id' => $sector->event_id]];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="speech-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить выступление', ['create', 'sector_id' => $sector->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
//            'speaker_id',
            [
               'attribute' => 'speaker_id',
                'value' => function ($model) {
                    return $model->speaker->name;
                }
            ],
//            'sector.name',
            [
                'attribute' => 'sector_id',
                'value' => function ($model) {
                    return $model->sector->name;
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<span class="text-' . ($data->status ? 'success' : 'danger') . '">' . $data->getStatusName() . '</span>';
                }
            ],
//            [
//                'label'=>'',
//                'format' => 'raw',
//                'value' => function ($data) {
//                    return '<a class="btn btn-info" href="'.Url::toRoute(['speaker/index', 'speaker_id' => $data->speaker_id]).'">Выступающий</a>';
//                }
//            ],
            [
                'label'=>'',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<a class="btn btn-warning" href="'.Url::toRoute(['speech-attachment/index', 'speech_id' => $data->id]).'">Материалы</a>';
                }
            ],
//            'created_at:datetime',
//            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
