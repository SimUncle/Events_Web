<?php

use yii\helpers\Html;
use yii\widgets\Menu;

?>

<div class="left-side-menu">

    <div class="sidebar-content">

        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <?= Menu::widget([
                'items' => [
                    ['label' => '<i data-feather="home"></i><span>ОАО «Удмуртнефть»</span>', 'url' => ['site/index']],

                    ['label' => '<i data-feather="calendar"></i><span>Мои мероприятия</span>', 'url' => ['event/index']],

//                    ['label' => '<i data-feather="calendar"></i><span>Верстка мероприятия (удалить)</span>', 'url' => ['event/view', 'id' => 1]],
//                    ['label' => '<i data-feather="calendar"></i><span>Верстка секции (удалить)</span>', 'url' => ['event/section', 'id' => 1]],
//                    ['label' => '<i data-feather="calendar"></i><span>Верстка выступающего (удалить)</span>', 'url' => ['event/speaker', 'id' => 1]],
//                    ['label' => '<i data-feather="calendar"></i><span>Верстка теста (удалить)</span>', 'url' => ['event/test', 'id' => 1]],
                    ['label' => '<i data-feather="inbox"></i><span>Обратная связь</span>', 'url' => ['site/feedback']],
                    ['label' => '<i data-feather="bookmark"></i><span>Контакты</span>', 'url' => ['site/contact']],
                    ['label' => '<i data-feather="layout"></i><span>Личный кабинет</span>', 'url' => ['site/profile']],
                    ['label' => '<i data-feather="log-out"></i><span>Выход</span>', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post">{label}</a>'],


                ],
                'options' => [
                    'id' => 'menu-bar',
                    'class' => 'metismenu'
                ],
                'encodeLabels' => false
            ]); ?>


        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>