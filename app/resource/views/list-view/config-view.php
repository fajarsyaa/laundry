<div class="bg-dark">
    <div class="container  m-b-30">
        <div class="row">
            <div class="col-12 text-white p-t-40 p-b-90">

                <h4 class="">
                    Config View <img src="<?= asset_setup('setup/config.png') ?>" style="max-width: 25px;" alt="">
                </h4>
                <p class="opacity-75 ">
                    Halaman ini dikhusus kan untuk layouting views anda.
                </p>


            </div>
        </div>
    </div>
</div>

<div class="container  pull-up">

    <div class="row">


        <div class="col-lg-12 m-b-30">
            <div class="card m-b-30">
                <!-- <div class="card-header">
                    <h5 class="card-title m-b-0">Config View</h5>

                    <div class="card-controls">

                        <a href="#" class="js-card-fullscreen icon"></a>

                    </div>
                </div> -->
                <div class="card-body">

                    <div class="alert alert-warning">
                        Semua inputan mengarah ke direktori <strong><i>resource/layouts</i></strong>
                    </div>


                    <?php include dir_project()."/resource/config.php"; ?>
                    <form action="<?= controllerSetup('SetupViewConfig@store'); ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Backend Header <span class="merah">*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <input class="form-control " name="backend_header" type="text"
                                                placeholder="Layouts..." required value="<?= $backendHeader ?>">
                                            <!-- <small id="emailHelp" class="form-text text-muted">Isikan layout anda.</small> -->

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-center">
                                    <a tip title="Buka <?= "resource/layouts/".$backendHeader ?> di vscode" href="vscode://file/<?= dir_project("resource/layouts/".$backendHeader) ?>">
                                        <img src="<?= asset_setup('setup/code.png') ?>" style="max-width: 20px;" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Backend Menu <span class="merah">*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <input class="form-control " name="backend_menu" type="text"
                                                placeholder="Layouts..." required value="<?= $backendMenu ?>">
                                            <!-- <small id="emailHelp" class="form-text text-muted">Isikan layout anda.</small> -->

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-center">
                                    <a tip title="Buka <?= "resource/layouts/".$backendMenu ?> di vscode" href="vscode://file/<?= dir_project("resource/layouts/".$backendMenu) ?>">
                                        <img src="<?= asset_setup('setup/code.png') ?>" style="max-width: 20px;" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Backend Footer <span class="merah">*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <input class="form-control " name="backend_footer" type="text"
                                                placeholder="Layouts..." required value="<?= $backendFooter ?>">
                                            <!-- <small id="emailHelp" class="form-text text-muted">Isikan layout anda.</small> -->

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-center">
                                    <a tip title="Buka <?= "resource/layouts/".$backendFooter ?> di vscode" href="vscode://file/<?= dir_project("resource/layouts/".$backendFooter) ?>">
                                        <img src="<?= asset_setup('setup/code.png') ?>" style="max-width: 20px;" alt="">
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Frontend Header <span class="merah">*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <input class="form-control " name="frontend_header" type="text"
                                                placeholder="Layouts..." required value="<?= $frontendHeader ?>">
                                            <!-- <small id="emailHelp" class="form-text text-muted">Isikan layout anda.</small> -->

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-center">
                                    <a tip title="Buka <?= "resource/layouts/".$frontendHeader ?> di vscode" href="vscode://file/<?= dir_project("resource/layouts/".$frontendHeader) ?>">
                                        <img src="<?= asset_setup('setup/code.png') ?>" style="max-width: 20px;" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Frontend Menu <span class="merah"></span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <input class="form-control " name="frontend_menu" type="text"
                                                placeholder="Layouts..." value="<?= $frontendMenu ?>">
                                            <!-- <small id="emailHelp" class="form-text text-muted">Isikan layout anda.</small> -->

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-center">
                                    <a tip title="Buka <?= "resource/layouts/".$frontendMenu ?> di vscode" href="vscode://file/<?= dir_project("resource/layouts/".$frontendMenu) ?>">
                                        <img src="<?= asset_setup('setup/code.png') ?>" style="max-width: 20px;" alt="">
                                    </a>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Frontend Footer <span class="merah">*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <input class="form-control " name="frontend_footer" type="text"
                                                placeholder="Layouts..." required value="<?= $frontendFooter ?>">
                                            <!-- <small id="emailHelp" class="form-text text-muted">Isikan layout anda.</small> -->

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-center">
                                    <a tip title="Buka <?= "resource/layouts/".$frontendFooter ?> di vscode" href="vscode://file/<?= dir_project("resource/layouts/".$frontendFooter) ?>">
                                        <img src="<?= asset_setup('setup/code.png') ?>" style="max-width: 20px;" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="float-right">
                                <button type="submit" class="btn btn-sm btn-primary shadow">Simpan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>


</div>