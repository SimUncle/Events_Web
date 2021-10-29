<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventAttachment */

$this->title = 'Изменить матриалы: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->params['breadcrumbs'][] = ['label' => 'Материалы мероприятия: ('.$model->event->name.')', 'url' => ['index', 'event_id' => $model->event_id]];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="event-attachment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
