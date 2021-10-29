<!-- Start Content-->
<?
use yii\helpers\Url;
/* @var $speech \app\models\Speech */
?>

<div class="container-fluid">
    <div class="row page-title align-items-center">
        <div class="col-md-3 col-xl-6">
<!--            --><?//=print_r($speech);  die;?>
            <h4 class="mb-1 mt-0">Выступление: <?= $speech->name ?></h4>
        </div>
        <div class="col-md-9 col-xl-6 text-md-right">
            <div class="mt-4 mt-md-0">
                <a href="<?= Url::toRoute(['ajax/comment', 'type' => 1, 'object_id' => $speech->id]) ?>" data-toggle="modal" data-target="#myModal" data-remote="false" class="btn btn-danger mr-4 mb-3  mb-sm-0"><i class="uil-plus mr-1"></i> Отзыв</a>
                <div class="btn-group mb-3 mb-sm-0">
                    <a href="<?=Url::toRoute(['event/view', 'id' => $speech->sector->event_id, '#' => 'pills-section']) ?>" type="button" class="btn btn-primary">Назад</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">


                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-activity" role="tabpanel"
                             aria-labelledby="pills-activity-tab">


                            <div class="media-body">
                                <h6 class="font-size-15 mt-0 mb-1">Выступающий: <?= $speech->speaker->name ?></h6>
                                <p class="text-muted font-size-14">Тема выступления: <?=$speech->name?>
                                </p>
                                <hr>
                                <p>Вложения:<?$speech->attachments?> </p>
                                <?foreach ($speech->attachments as $attachment):?>
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
                                <? endforeach;?>
                                <? if (empty($attachment)): ?>
                                    <div class="row ml-1">
                                        <h6>В этом выступлении пока нет доступных материалов</h6>
                                    </div>
                                <?endif;?>
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