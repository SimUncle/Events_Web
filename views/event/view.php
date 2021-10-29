<?

use app\models\TestUser;
use app\models\TestResult;
use yii\helpers\Url;

/* @var $event app\models\Event */

$js = <<< JS
const hash = window.location.hash;

$('a[href="'+hash+'"]').tab('show');
JS;
$this->registerJs( $js, $position = yii\web\View::POS_READY, $key = null );
?>

<!-- Start Content-->
<div class="container-fluid">
    <div class="row page-title align-items-center">
        <div class="col-md-3 col-xl-6">
            <h4 class="mb-1 mt-0"><?= $event->name ?></h4>
        </div>
        <div class="col-md-9 col-xl-6 text-md-right">
            <div class="mt-4 mt-md-0">
                <a href="<?= Url::toRoute(['ajax/comment', 'type' => 0, 'object_id' => $event->id]) ?>"
                   data-toggle="modal" data-target="#myModal" data-remote="false"
                   class="btn btn-danger mr-4 mb-3  mb-sm-0"><i class="uil-plus mr-1"></i> Отзыв</a>

                <div class="btn-group mb-3 mb-sm-0">
                    <form action="index">
                        <button type="submit" class="btn btn-primary">Все мероприятия</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">


        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">

                    <ul class="nav nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-activity-tab" data-toggle="pill"
                               href="#pills-activity" role="tab" aria-controls="pills-activity"
                               aria-selected="true">
                                Инфо
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-section-tab" data-toggle="pill"
                               href="#pills-section" role="tab" aria-controls="pills-section"
                               aria-selected="false">
                                Секции
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-materials-tab" data-toggle="pill"
                               href="#pills-materials" role="tab" aria-controls="pills-materials"
                               aria-selected="false">
                                Материалы
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-tests-tab" data-toggle="pill"
                               href="#pills-tests" role="tab" aria-controls="pills-tests"
                               aria-selected="false">
                                Тесты
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-activity" role="tabpanel"
                             aria-labelledby="pills-activity-tab">


                            <div class="media-body">
                                <h2 class="font-size-15 mt-0 mb-1"><?= $event->name ?></h2>
                                <div class="text-muted font-size-14">
                                    <p>
                                    <h6>Адрес проведения:</h6>
                                    <?= $event->address ?>
                                    </p>
                                    <p>
                                    <h6>Как добраться:</h6>
                                    <?= $event->map ?>
                                    </p>
                                </div>
                            </div>

                        </div>


                        <!-- messages -->
                        <div class="tab-pane" id="pills-section" role="tabpanel"
                             aria-labelledby="pills-section-tab">

                            <div class="row ">
                                <div class="col">
                                    <!-- end upcoming tasks -->
                                    <? foreach ($event->sectors as $sector): ?>
                                        <div class="mt-4 mb-4">
                                            <a class="text-dark" data-toggle="collapse"
                                               href="#otherTasks<?= $sector->id ?>"
                                               aria-expanded="false" aria-controls="otherTasks">
                                                <h5>
                                                    <i class='uil uil-angle-down font-18'></i><?= $sector->name ?> <span
                                                            class="text-muted font-size-14">(<?= $sector->getSpeeches()->count() ?>)</span>
                                                </h5>
                                            </a>

                                            <div class="collapse" id="otherTasks<?= $sector->id ?>">
                                                <div class="card mb-0 shadow-none">
                                                    <div class="card-body">
                                                        <a href="<?= Url::toRoute(['section', 'id' => $sector->id]) ?>"
                                                           class="btn btn-success mr-4 mb-3 mb-sm-0 btn-sm">Подробнее о
                                                            секции</a>
                                                        <!-- task -->
                                                        <? foreach ($sector->speeches as $speech): ?>
                                                            <a class="text-dark"
                                                               href="<?= Url::toRoute(['speaker', 'id' => $speech->id]) ?>">
                                                                <div class="row justify-content-sm-between mt-2 border-bottom pt-2">
                                                                    <div class="col-lg-12 mb-2 mb-lg-0">
                                                                        <div class="d-flex mb-1">
                                                                            <div style="flex: 2">
                                                                                <div class="font-weight-bold"><?= $speech->speaker->name ?></div>
                                                                                <div class="font-weight-light"><?= $speech->speaker->profession ?></div>
                                                                            </div>
                                                                            <div style="flex: 1">
                                                                                <img style="width: 100%" src="<?= $speech->speaker->photo ?>">
                                                                            </div>
                                                                        </div> <!-- end checkbox -->
                                                                    </div> <!-- end col -->
                                                                    <div class="col-lg-6">
                                                                        <div class="d-sm-flex justify-content-between">

                                                                            <div class="mt-3 mt-sm-0">
                                                                                <ul
                                                                                        class="list-inline font-13 text-sm-right">

                                                                                    <li class="list-inline-item pr-1">
                                                                                        <i
                                                                                                class='uil uil-align-alt font-16 mr-1'></i>
                                                                                        <?= $speech->name ?>
                                                                                    </li>

                                                                                </ul>
                                                                            </div>
                                                                        </div> <!-- end .d-flex-->
                                                                    </div> <!-- end col -->
                                                                    <div class="col-lg-6 mb-2">
                                                                        <span class="btn btn-light mr-4 mb-3 mb-sm-0 btn-sm">Подробнее о выступлении</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        <? endforeach; ?>
                                                        <? if (empty($speech)): ?>
                                                            <div class="row ml-1">
                                                                <h6>В этой секции пока нет доступных выступлений</h6>
                                                            </div>
                                                        <?endif;?>
                                                        <!-- end task -->
                                                    </div> <!-- end card-body-->
                                                </div> <!-- end card -->
                                            </div>
                                        </div>
                                    <? endforeach; ?>
                                    <? if (empty($sector)): ?>
                                        <div class="row ml-3">
                                            <h5>В этом мероприятии пока нет доступных секций</h5>
                                        </div>
                                    <?endif;?>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-materials" role="tabpanel"
                             aria-labelledby="pills-materials-tab">

                            <? foreach ($event->attachments as $attachment): ?>
                                <div class="card mb-2 shadow-none border">
                                    <div class="p-1 px-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img src="/images/file.png"
                                                     class="avatar-sm rounded" alt="file-image">
                                            </div>
                                            <div class="col pl-0">
                                                <a href="javascript:void(0);"
                                                   class="text-muted font-weight-bold"><?= $attachment->name ?></a>
                                                <!--                                                    <p class="mb-0">2.3 MB</p>-->
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="<?= $attachment->url ?>" download data-toggle="tooltip"
                                                   data-placement="bottom" title="Download"
                                                   class="btn btn-link text-muted btn-lg p-0">
                                                    <i class='uil uil-cloud-download font-size-14'></i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <? endforeach; ?>
                            <? if (empty($attachment)): ?>
                                <div class="row ml-3">
                                    <h5>В этом мероприятии пока нет доступных материалов</h5>
                                </div>
                            <?endif;?>
                        </div>

                        <div class="tab-pane fade" id="pills-tests" role="tabpanel"
                             aria-labelledby="pills-tests-tab">
                            <h5 class="mt-3 ml-3">Тесты</h5>

                            <div class="card mb-0 shadow-none">
                                <div class="card-body">
                                    <!-- task -->
                                    <? foreach ($event->tests as $test): ?>
                                        <div class="row justify-content-sm-between border-bottom">
                                            <div class="col-lg-6 mb-2 mb-lg-0">
                                                <div>

                                                    <label>
                                                        <?= $test->name ?>
                                                    </label>
                                                </div> <!-- end checkbox -->
                                            </div> <!-- end col -->
                                            <!--start if complite-->

                                            <div class="col-lg-3">
                                                <div class="d-sm-flex justify-content-between">
                                                    <div class="mt-sm-0">
                                                        <ul class="list-inline font-13 text-sm-right">
                                                            <li class="list-inline-item">
                                                                <? if (TestUser::isComplete($test->id)): ?>
                                                                    <span class="badge badge-soft-success p-1">Пройден</span>
                                                                <? else: ?>
                                                                    <span class="badge badge-soft-danger p-1">Не пройден</span>
                                                                <? endif; ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> <!-- end .d-flex-->
                                            </div> <!-- end col -->

                                            <div class="col-lg-3">
                                                <? if (!TestUser::isComplete($test->id)): ?>
                                                    <a href="<?= Url::toRoute(['ajax/test', 'id' => $test->id]) ?>"
                                                       data-toggle="modal" data-target="#myModal" data-remote="false"
                                                       class="btn btn-info mr-4 mb-3 btn-sm mb-sm-0"><i></i>Начать тест
                                                    </a>
                                                <? else: ?>
                                                <div><?= TestResult::countCorrect($test->id) ?> из <?= TestResult::countAll($test->id) ?></div>
                                                <? endif; ?>
                                            </div>
                                            <!--end if complite-->
                                        </div>
                                    <? endforeach; ?>
                                    <!-- end task -->
                                    <? if (empty($test)): ?>
                                        <div class="row ml-1">
                                            <h5>В этом мероприятии пока нет доступных тестов</h5>
                                        </div>
                                    <?endif;?>
                                    <!-- end task -->
                                </div> <!-- end card-body-->
                            </div> <!-- end card -->
                        </div>


                    </div>

                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->
</div> <!-- container-fluid -->