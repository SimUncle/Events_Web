<? use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model \app\models\Registration */
/* @var $event \app\models\Event */
?>


<div class="modal-header">
    <h6 class="modal-title" id="myModalLabel">Регистрация на мероприятие: <?=$model->event->name?></h6>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
Вы уверены что хотите зарегистрироваться на мероприятие: <h6><?=$model->event->name?></h6>
</div>

<div class="modal-footer">
    <?php $form = ActiveForm::begin(); ?>
    <?= Html::submitButton('Зарегистрироваться', ['class'=> 'btn btn-success']); ?>

    <button type="button" class="btn btn-danger" data-dismiss="modal">Отмена</button>
    <?php ActiveForm::end(); ?>
</div>