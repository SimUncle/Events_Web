<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Speech */

$this->title = 'Изменить выступление: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->params['breadcrumbs'][] = ['label' => 'Список секторов: ('.$model->sector->event->name.')', 'url' => ['/admin/sector', 'event_id' => $model->sector->event_id]];
$this->params['breadcrumbs'][] = ['label' => 'Список выступлений: ('.$model->sector->name.')', 'url' => ['index', 'sector_id' => $model->sector->id]];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="speech-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
