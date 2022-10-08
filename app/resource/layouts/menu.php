<aside class="admin-sidebar">
    <div class="admin-sidebar-brand">
        <!-- begin sidebar branding-->
        <span class="admin-brand-content font-secondary"><a href="<?= url('setup/about') ?>"> PandoraSetup</a></span>
        <!-- end sidebar branding-->
        <div class="ml-auto">
            <!-- sidebar pin-->
            <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a>
            <!-- sidebar close for mobile device-->
            <a href="#" class="admin-close-sidebar"></a>
        </div>
    </div>
    <div class="admin-sidebar-wrapper js-scrollbar">
        <ul class="menu">
            <?php
                $active = "";
                if (urlHas("setup/database") || urlHas("setup/table") || urlHas("setup/auth") || urlHas("setting")) {
                    $active = 'active opened';
                    $style  = 'style="display: block;"';
                }

                if (urlHas("setup/list-view")) {
                    $activeView = 'active opened';
                    $styleView  = 'style="display: block;"';
                }

                if (urlHas("setup/api")) {
                    $activeApi = 'active opened';
                    $styleApi  = 'style="display: block;"';
                }
            ?>
            <li class="menu-item <?= @$active ?>">
                <a href="#" class="open-dropdown menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Config
                            <span class="menu-arrow"></span>
                        </span>

                    </span>
                    <span class="menu-icon">
                    <?php 
                        if (!$host || empty($DATABASE) ) 
                        { 
                            $count = "1";
                        }else{
                            $count = "4";
                        }
                    ?>
                        <span class="icon-badge badge-success badge badge-pill"><?= $count ?></span>
                        <i class="icon-placeholder mdi mdi-wrench "></i>
                    </span>
                </a>
                <!--submenu-->
                <ul class="sub-menu" <?= @$style ?> >

                    <li class="menu-item <?= activeClass('setup/setting/setting') ?>">
                        <a href="<?php url('setup/setting/setting') ?>" class=" menu-link">
                            <span class="menu-label">
                                <span class="menu-name">Setting Project</span>
                            </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder mdi mdi-settings ">

                                </i>
                            </span>
                        </a>
                    </li>

                    <li class="menu-item <?= activeClass('setup/database') ?>">
                        <a href="<?php url('setup/database/data') ?>" class=" menu-link">
                            <span class="menu-label">
                                <span class="menu-name">Database</span>
                            </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder  mdi mdi-database ">

                                </i>
                            </span>
                        </a>
                    </li>

                    <?php if ($host && !empty($DATABASE)) { ?>

                    <li class="menu-item <?= activeClass('setup/table') ?>">
                        <a href="<?php url('setup/table/data') ?>" class=" menu-link">
                            <span class="menu-label">
                                <span class="menu-name">Table</span>
                            </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder mdi mdi-table-large ">

                                </i>
                            </span>
                        </a>
                    </li>

                    <li class="menu-item <?= activeClass('setup/auth') ?>">
                        <a href="<?php url('setup/auth/data') ?>" class=" menu-link">
                            <span class="menu-label">
                                <span class="menu-name">Auth</span>
                            </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder mdi mdi-account ">

                                </i>
                            </span>
                        </a>
                    </li>

                    <?php } ?>

                </ul>
            </li>

            <?php if ($host && !empty($DATABASE)) { ?>
                
                <li class="menu-item <?= activeClass('setup/make-controller') ?>">
                    <a href="<?php url('setup/make-controller/data') ?>" class="menu-link">
                        <span class="menu-label">
                            <span class="menu-name">
                                Controllers
                            </span>
                        </span>
                        <span class="menu-icon">
                            <img src="<?= asset_setup('setup/controller.png') ?>" alt="" class="w-50">
                        </span>
                    </a>
                </li>

                <li class="menu-item <?= @$activeView ?>">
                    <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                            <span class="menu-name">Views
                                <span class="menu-arrow"></span>
                            </span>

                        </span>
                        <span class="menu-icon">
                            <span class="icon-badge badge-success badge badge-pill">3</span>
                            <img src="<?= asset_setup('setup/file.png') ?>" alt="" class="w-50">
                        </span>
                    </a>
                    <!--submenu-->
                    <ul class="sub-menu" <?= @$styleView ?> >

                        <li class="menu-item <?= activeClass('setup/list-view/config-view') ?>">
                            <a href="<?php url('setup/list-view/config-view') ?>" class="menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">
                                        Config View
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li class="menu-item <?= activeClass('setup/list-view/backend') ?>">
                            <a href="<?php url('setup/list-view/backend') ?>" class="menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">
                                        Backend
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li class="menu-item <?= activeClass('setup/list-view/frontend') ?>">
                            <a href="<?php url('setup/list-view/frontend') ?>" class="menu-link">
                                <span class="menu-label">
                                    <span class="menu-name">
                                        Frontend
                                    </span>
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="menu-item <?= activeClass('setup/about') ?>">
                    <a href="<?php url('setup/about') ?>" class="menu-link">
                        <span class="menu-label">
                            <span class="menu-name">
                                Developers
                            </span>
                        </span>
                    </a>
                </li>

            <?php } ?>

        </ul>

    </div>

</aside>