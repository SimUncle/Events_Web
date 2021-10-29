<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SpeakerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Выступающие';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="speaker-index">
<!--    --><?// print_r($speaker); die; ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить выступающего', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'photo',
            'profession',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
