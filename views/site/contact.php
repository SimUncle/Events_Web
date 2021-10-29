<?php

/* @var $this yii\web\View */
/* @var $model Page */

use app\models\Page;

$this->title = 'Контакты';
?>
<div class="container-fluid">
    <div class="row page-title mt-2 d-print-none">
        <div class="col-md-12">

            <h4 class="mb-1 mt-0">Контакты</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="clearfix">
                                <h6 class="text-muted"><?= $model->title ?></h6>

                                <small class="text-muted">
                                    <?= $model->content ?>
                                </small>

                            </div>
                        </div> <!-- end col -->

                    </div>
                    <!-- end row -->


                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div> <!-- container-fluid -->