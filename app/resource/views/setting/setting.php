<div class="bg-dark">
    <div class="container  m-b-30">
        <div class="row">
            <div class="col-12 text-white p-t-40 p-b-90">

                <h4 class="">
                    Setting Project <img src="<?= asset_setup('setup/config.png') ?>" style="max-width: 25px;" alt="">
                </h4>
                <p class="opacity-75 ">
                    Halaman ini dikhusus kan untuk setting project anda, mulai dari redirect view, protokol https/http dll.
                </p>


            </div>
        </div>
    </div>
</div>

<div class="container  pull-up">

    <div class="row">


        <div class="col-lg-12 m-b-30">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title m-b-0">Setting</h5>

                    <div class="card-controls">

                        <a href="#" class="js-card-fullscreen icon"></a>

                    </div>
                </div>
                <div class="card-body">

                    <div class="alert alert-warning">
                        Inputan di bawah ini bersifat <strong>global</strong>.
                    </div>

                    <form action="<?= controllerSetup('SetupSetting@store'); ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Protokol <span class="merah">*</span></label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <select name="protokol" class="form-control js-select2" id="">
                                                <option <?php echo $protokol == "http" ? "selected" : ""; ?> value="http">http</option>
                                                <option <?php echo $protokol == "https" ? "selected" : ""; ?> value="https">https</option>
                                            </select>
                                            <small id="emailHelp" class="form-text text-muted">Isikan protokol anda (http/https).</small>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Redirect <span class="merah">*</span></label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <input class="form-control " name="redirect_view" type="text"
                                                placeholder="Redirect..." value="<?= $redirectView ?>">
                                            <small id="emailHelp" class="form-text text-muted">Isikan redirect view pertama anda.</small>

                                        </div>
                                    </div>
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