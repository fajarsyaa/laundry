<div class="bg-dark">
    <div class="container  m-b-30">
        <div class="row">
            <div class="col-12 text-white p-t-40 p-b-90">

                <h4 class="">
                    Auth <img src="<?= asset_setup('setup/user.png') ?>" style="max-width: 25px;margin-top:-10px" alt="">
                </h4>
                <p class="opacity-75 ">
                    Di halaman ini anda bisa mengatur login & register sistem anda.
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
                    <h5 class="card-title m-b-0">Login & Register</h5>

                    <div class="card-controls">

                        <a href="#" class="js-card-fullscreen icon"></a>

                    </div>
                </div>
                <div class="card-body">

                <form action="<?= controllerSetup('SetupAuth@store') ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fungsi Otomatis </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-6" style="margin-top: 8px;">

                                        <input type="checkbox" checked name="auto_function" id="">
                                        <small id="emailHelp" class="form-text text-muted">
                                            Jika anda centang, maka <code>function auth</code> otomatis akan terbuat,
                                            seperti : <br>
                                            <code>login()</code> dan <code>register()</code>.
                                        </small>

                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Redirect <span class="merah">*</span></label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-6" style="margin-top: 8px;">

                                        <input type="text" placeholder="backend/folder/file" value="<?= @$redirectAuth ?>" required class="form-control" name="redirect" id="">
                                        <small id="emailHelp" class="form-text text-muted">
                                            Isikan nama file/halaman yang akan dituju setelah login.
                                        </small>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Include Register</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-6" style="margin-top: 8px;">

                                        <input type="checkbox" checked name="include_register" id="">
                                        <small id="emailHelp" class="form-text text-muted">
                                            Isikan nama file/halaman yang akan dituju setelah login.
                                        </small>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status <span class="merah">*</span></label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-6" style="margin-top: 8px;">

                                        <select required name="status" id="" class="form-control js-select2">
                                            <option disabled selected>Pilih Status</option>

                                            <option <?php if ($auth == true) {
                                                echo "selected";
                                            } ?> value="true">Aktif</option>
                                            <option <?php if ($auth == false) {
                                                echo "selected";
                                            } ?>  value="false">Tidak Aktif</option>
                                        </select>

                                        <small id="emailHelp" class="form-text text-muted">
                                            Pilih status, jika anda pilih <code>Aktif</code> maka sistem auth akan aktif.
                                        </small>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="float-right">
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>

    </div>


</div>