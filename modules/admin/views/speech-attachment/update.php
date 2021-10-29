<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpeechAttachment */

$this->title = 'Изменить материалы выступления: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/admin/event']];
$this->params['breadcrumbs'][] = ['label' => 'Список секторов: ('.$model->speech->sector->event->name.')', 'url' => ['/admin/sector', 'event_id' => $model->speech->sector->event->id]];
$this->params['breadcrumbs'][] = ['label' => 'Список выступлений: ('.$model->speech->sector->name.')', 'url' => ['/admin/speech', 'sector_id' => $model->speech->sector->id]];
$this->params['breadcrumbs'][] = ['label' => 'Материалы выступления: ('.$model->speech->name.')', 'url' => ['index', 'speech_id' => $model->speech->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="speech-attachment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
