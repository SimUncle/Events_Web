<?

use app\models\Comment;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model app\models\Comment */
?>

<?php $form = ActiveForm::begin([
    'fieldConfig' => [
        'options' => [
            'class' => 'form-group row'
        ],
        'template' => '<label class="col-sm-3 col-form-label">{label}</label><div class="col-sm-9">{input}</div><div class="col-sm-3"></div><div class="col-sm-9 help-block form-error">{error}</div>',
    ]
]); ?>
    <div class="modal-header">
                <h6 class="modal-title" id="myModalLabel">Отзыв о <?=$model->type > 0 ? 'выступлении' : 'мероприятии'?>: <?=$model->object->name?></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

        <?= $form->field($model, "score")->dropDownList(Comment::$scopeList,['class' => 'form-control']) ?>

        <?= $form->field($model, "text")->textarea(['class' => 'form-control']) ?>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Закрыть</button>
        <?= Html::submitButton('Отправить', ['class'=> 'btn btn-primary']); ?>
    </div>
<?php ActiveForm::end(); ?>