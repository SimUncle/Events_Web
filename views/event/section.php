<? use yii\helpers\Url; ?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row page-title align-items-center">
        <div class="col-md-3 col-xl-6">
            <h4 class="mb-1 mt-0">Секция: <?= $section->name ?></h4>
        </div>
        <div class="col-md-9 col-xl-6 text-md-right">
            <div class="mt-4 mt-md-0">


                <div class="btn-group mb-3 mb-sm-0">
                    <a href="<?=Url::toRoute(['event/view', 'id' => $section->event_id, '#' => 'pills-section']) ?>" type="button" class="btn btn-primary">Назад</a>
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
                            <a class="nav-link" id="pills-messages-tab" data-toggle="pill"
                               href="#pills-messages" role="tab" aria-controls="pills-messages"
                               aria-selected="false">
                                Выступающие
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-activity" role="tabpanel"
                             aria-labelledby="pills-activity-tab">


                            <div class="media-body">
                                <h6 class="font-size-15 mt-0 mb-1"><?= $section->name ?></h6>
                                <p class="text-muted font-size-14"><?= $section->text ?>
                                </p>
                            </div>

                        </div>


                        <!-- messages -->
                        <div class="tab-pane" id="pills-messages" role="tabpanel"
                             aria-labelledby="pills-messages-tab">

                            <div class="row mt-4">
                                <div class="col">
                                    <!-- end upcoming tasks -->
                                    <div class="mt-4 mb-4">
                                        <a class="text-dark" data-toggle="collapse" href="#otherTasks"
                                           aria-expanded="false" aria-controls="otherTasks">
                                            <h5>
                                                <i class='uil uil-angle-down font-18'></i> <?= $section->name ?> <span
                                                        class="text-muted font-size-14">(<?= $section->getSpeeches()->count() ?>)</span>
                                            </h5>
                                        </a>


                                        <div class="collapse show" id="otherTasks">
                                            <div class="card mb-0 shadow-none">
                                                <div class="card-body">
                                                    <!-- task -->
                                                    <? foreach ($section->speeches as $speech): ?>
                                                        <a class="text-dark"
                                                           href="<?= Url::toRoute(['speaker', 'id' => $speech->id]) ?>">
                                                            <div class="row justify-content-sm-between mt-2 border-bottom pt-2">
                                                                <div class="col-lg-6 mb-2 mb-lg-0">
                                                                    <div>
                                                                        <div>
                                                                            <?= $speech->speaker->name ?>
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
                                                        <div class="row ml-3">
                                                            <h6>В этой секции пока нет доступных выступлений</h6>
                                                        </div>
                                                    <?endif;?>
                                                    <!-- end task -->
                                                </div> <!-- end card-body-->
                                            </div> <!-- end card -->
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->
</div> <!-- container-fluid -->