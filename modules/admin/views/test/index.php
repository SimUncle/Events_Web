<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $event \app\models\Event */

$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->title = 'Список тестов: ('.$event->name.')';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить тест', ['create', 'event_id' => $event->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
//            'event_id',
            [
                'attribute' => 'event_id',
                'value' => function ($model) {
                    return $model->event->name;
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
                    return '<a class="btn btn-warning" href="'.Url::toRoute(['question/index', 'test_id' => $data->id]).'">Вопрос</a>';
                }

            ],
//            'created_at:datetime',
//            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
