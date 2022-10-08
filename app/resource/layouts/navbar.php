<main class="admin-main">
    <!--site header begins-->
    <header class="admin-header">

        <a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body"> </a>

        <nav class=" ml-auto">
            <ul class="nav align-items-center">

                <li class="nav-item">
                    <div class="dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-24px mdi-bell-outline"></i>
                            <span class="notification-counter"></span>
                        </a>

                        <div class="dropdown-menu notification-container dropdown-menu-right">
                            <div class="d-flex p-all-15 bg-white justify-content-between border-bottom ">
                                <a href="#!" class="mdi mdi-18px  text-muted"></a>
                                <span class="h5 m-0">Notifications</span>
                                <a href="#!" class="mdi mdi-18px  text-muted"></a>
                            </div>
                            <div class="notification-events bg-gray-300">
                                <div class="text-overline m-b-5">Database : </div>
                                <a href="<?php url('setup/database/data') ?>" class="d-block m-b-10">
                                    <div class="card">
                                        <?php include 'database.php' ?>
                                        <?php if (!$host) { ?>
                                            <div class="card-body"> <i class="mdi mdi-circle text-danger"></i> Database tidak tersambung!</div>
                                        <?php }else{ ?>
                                            <div class="card-body"> <i class="mdi mdi-circle text-success"></i> <?= $DATABASE ?></div>
                                        <?php } ?>
                                    </div>
                                </a>
                                <div class="text-overline m-b-5">Auth : </div>
                                <a href="<?php url('setup/auth/data') ?>" class="d-block m-b-10">
                                    <div class="card">
                                        <?php include '../config.php' ?>

                                        <?php
                                            if ($auth) {

                                                $auth  = "aktif";
                                                $class = "success";

                                            }else{

                                                $auth  = "tidak aktif";
                                                $class = "danger";

                                            }
                                        ?>

                                        <div class="card-body"> <i class="mdi mdi-circle text-<?= $class ?>"></i> <?= $auth ?></div>
                                    </div>
                                </a>


                            </div>

                        </div>
                    </div>
                </li>

            </ul>

        </nav>
    </header>

    <section class="admin-content">