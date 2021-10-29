<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventAttachment */

$this->title = 'Добавить материалы';
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->params['breadcrumbs'][] = ['label' => 'Материалы мероприятия: ('.$model->event->name.')', 'url' => ['index', 'event_id' => $model->event_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-attachment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
