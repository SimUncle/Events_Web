<? use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model \app\models\Registration */
/* @var $event \app\models\Event */
/* @var $test \app\models\Test */
?>


<div class="modal-header">
    <h6 class="modal-title" id="myModalLabel">Начать тест: <?=$model->name?>?</h6>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <p>Вы уверены что хотите начать тест: <strong><?=$model->name?></strong> мероприятия <strong><?=$model->event->name?>?</strong></p>
    <p>Поcле нажатия кнопки начнется отсчет времени на выполнение теста!</p>
    <p>Если вы покинете сайт, или не уложитесь в отведенное время ответ засчитан не будет.</p>
</div>

<div class="modal-footer">
    <?php $form = ActiveForm::begin(); ?>
    <?= Html::submitButton('Начать', ['class'=> 'btn btn-success']); ?>

    <button type="button" class="btn btn-danger" data-dismiss="modal">Отмена</button>
    <?php ActiveForm::end(); ?>
</div>