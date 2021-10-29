<? use yii\helpers\Url; ?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row page-title align-items-center">
        <div class="col-md-3 col-xl-6">
            <h4 class="mb-1 mt-0">Мои мероприятия</h4>
        </div>

    </div>

    <div class="row">
        <? if (!empty($events)): ?>
            <? foreach ($events as $key => $event): ?>
                <div class="col-xl-4 col-lg-6">
                    <? if ($event->isRegistered()): ?>
                    <a href="<?= Url::toRoute(['view', 'id' => $event->id]) ?>">
                        <? else: ?>
                        <a href="<?= Url::toRoute(['ajax/registration', 'event_id' => $event->id]) ?>"
                           data-toggle="modal" data-target="#myModal" data-remote="false">
                            <? endif; ?>
                            <div class="card <?= $key == 0 ? "border-primary border": ''?> ">
                                <div class="card-body">
                                    <? if ($event->isRegistered()): ?>
                                        <div class="badge badge-success float-right">Зарегистрирован</div>
                                        <p class="text-success text-uppercase font-size-12 mb-2">Статус</p>
                                    <? else: ?>
                                        <div class="badge badge-warning float-right">Не зарегистрирован</div>
                                        <p class="text-warning text-uppercase font-size-12 mb-2">Статус</p>
                                    <? endif; ?>
                                    <h5><?= $event->name ?></h5>
                                    <p class="text-muted mb-1"><?= $event->address ?></p>
                                </div>
                                <div class="card-body border-top">
                                    <div class="row align-items-center">
                                        <div class="col-sm-auto">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item pr-2">
                                                    <span class="text-muted d-inline-block"
                                                    <i class="uil uil-calender mr-1"></i>
                                                    <?= Yii::$app->formatter->asDate($event->date_start) ?>
                                                    <i class="uil uil-clock mr-1"></i>
                                                    <?= Yii::$app->formatter->asTime($event->date_start, 'php:H:i') ?>
                                                    </span>
                                                </li>
                                                <li class="list-inline-item pr-2">
                                                    <span class="text-muted d-inline-block"
                                                    <i class="uil uil-calender mr-1"></i>
                                                    <?= Yii::$app->formatter->asDate($event->date_end) ?>
                                                    <i class="uil uil-clock mr-1"></i>
                                                    <?= Yii::$app->formatter->asTime($event->date_end, 'php:H:i') ?>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- end card -->
                </div>
            <? endforeach ?>
        <? else: ?>
            <div class="row ml-3">
                <h5>Для вас пока нет доступных мероприятий</h5>
            </div>
        <? endif ?>
    </div>
    <!-- end row -->
</div> <!-- container-fluid -->