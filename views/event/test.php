<?

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $test app\models\Test */
/* @var $q app\models\Question */
/* @var $timer integer */

$timeout = ($timer + $q->time - time());
?>
<?= $this->registerJsFile('/js/timer.js', ['depends' => \app\assets\PublicAsset::class]); ?>
<div class="container-fluid">
    <div class="row page-title align-items-center">

        <div class="col-md-9 col-xl-6 text-md-right">
            <div class="mt-4 mt-md-0">


                <div class="btn-group mb-3 mb-sm-0">
<!--                    <button type="button" class="btn btn-primary">Назад</button>-->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-6">
                    <!-- assignee -->
                    <p class="mt-2 mb-1 text-muted">№ <?= $q->num ?></p>
                    <div class="media">

                        <div class="media-body">
                            <h5 class="mt-1 font-size-14">
                                <?= $q->num ?> из <?= $test->getQuestions()->count() ?>
                            </h5>

                        </div>
                    </div>
                    <!-- end assignee -->
                </div> <!-- end col -->

                <div class="col-6">
                    <!-- start due date -->
                    <? if($q->time > 0): ?>
                    <p class="mt-2 mb-1 text-muted">Таймер</p>
                    <div class="media">
<!--                        <i class='uil uil-clock font-18 text-success mr-1'></i>-->
                        <div class="media-body">
                            <h5 class="mt-1 font-size-14">
                                <div><span id="timer" data-min="<?= intval($timeout/60) ?>" data-sec="<?= ($timeout % 60) ?>" style="border: 2px solid #dfcd6b; padding: 5px; font-size: 16px;"></span></div>
<!--                                --><?//= ($timer + $q->time - time()) ?>
                            </h5>
                        </div>
                    </div>
                    <? endif; ?>
                    <!-- end due date -->
                </div> <!-- end col -->
            </div> <!-- end row -->
            <div><?= $q->text ?></div>

            <!-- start sub tasks/checklists -->
            <h5 class="mt-4 mb-2 font-size-16">Ответы</h5>

            <?php $form = ActiveForm::begin([
                'fieldConfig' => [
                    'options' => [
                        'class' => 'form-group row'
                    ],
                ]
            ]); ?>

            <? foreach ($q->answers as $answer): ?>
                <div class="custom-control custom-radio mb-2">
                    <input type="radio" id="customRadio<?= $answer->id ?>" name="answer" value="<?= $answer->id ?>" class="custom-control-input" required>
                    <label class="custom-control-label" for="customRadio<?= $answer->id ?>"><?= $answer->text ?></label>
                </div>
            <? endforeach; ?>

            <div class="float-right">
                <?= Html::submitButton('Отправить', ['class'=> 'btn btn-primary']); ?>
<!--                <button type="submit" class="btn btn-sm btn-primary"><i class='uil uil-message mr-1'></i>Отправить</button>-->
            </div>

            <?php ActiveForm::end(); ?>
            <!-- end comments -->
        </div> <!-- end col -->
    </div> <!-- end row-->
</div> <!-- container-fluid -->