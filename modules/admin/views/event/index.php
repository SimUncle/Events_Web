<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мероприятия';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
<!--    --><?// print_r($model); die;?>

    <p>
        <?= Html::a('Добавить мероприятие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'date_start:datetime',
            'date_end:datetime',
//            'have_test',
            [
                    'attribute' => 'have_test',
                    'value' => function($model)
                    {
                        return $model->have_test > 0 ? 'Да' : 'Нет';
                    }
            ],
//            'address',
//            'map',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<span class="text-' . ($data->status ? 'success' : 'danger') . '">' . $data->getStatusName() . '</span>';
                }
            ],
            [
                'label'=>'',
                'format' => 'raw',
                'value' => function ($data) {
//                    if ($data->have_test>0)
                    return '<a class="btn btn-info" href="'.Url::toRoute(['sector/index', 'event_id' => $data->id]).'">Секции</a>';
//                    else return '';
                }

            ],
            [
              'label'=>'',
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->have_test>0)
                    return '<a class="btn btn-warning" href="'.Url::toRoute(['test/index', 'event_id' => $data->id]).'">Тесты</a>';
                    else return '';
                }

            ],
            [
                'label'=>'',
                'format' => 'raw',
                'value' => function ($data) {
                        return '<a class="btn btn-info" href="'.Url::toRoute(['event-attachment/index', 'event_id' => $data->id]).'">Материалы</a>';
                }

            ],

//            'created_at:datetime',
//            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
