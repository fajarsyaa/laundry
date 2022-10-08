<div class="bg-dark">
    <div class="container  m-b-30">
        <div class="row">
            <div class="col-12 text-white p-t-40 p-b-90">

                <h4 class="">
                    Database <img src="<?= asset_setup('setup/database.png') ?>" style="max-width: 25px;" alt="">
                </h4>
                <p class="opacity-75 ">
                    Di halaman ini anda bisa mengolah database untuk sistem anda.
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
                    <h5 class="card-title m-b-0">Setting Database</h5>

                    <div class="card-controls">

                        <a href="#" class="js-card-fullscreen icon"></a>

                    </div>
                </div>
                <div class="card-body">

                    <form action="<?= controllerSetup('SetupDatabase@createDB') ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Database <span class="merah">*</span></label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                                include dir_project()."/app/core/database.php";
                                            ?>
                                            <input autocomplete="off" class="form-control form-control-sm" name="database" type="text"
                                                value="<?= $DATABASE ?>" placeholder="Nama Database">

                                            <small id="emailHelp" class="form-text text-muted">Isikan nama database yang
                                                ingin anda buat.</small>
                                        </div>
                                        <div class="col-md-6">

                                            <select name="exist_database" class="js-select2 form-control">
                                                <option value="" selected>-Pilih yang sudah tersedia-</option>
                                                <?php
                                                        // Usage without mysql_list_dbs()
                                                        $link = mysqli_connect('localhost', 'root', '');
                                                        $res = mysqli_query($link,"SHOW DATABASES");

                                                        while ($row = mysqli_fetch_assoc($res)) {
                                                            ?>
                                                <option value="<?= $row['Database'] ?>"><?= $row['Database'] ?></option>
                                                <?php
                                                                }
                                                            ?>
                                            </select>

                                            <small id="emailHelp" class="form-text text-muted">Atau pilih dari yang
                                                sudah tersedia.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Host</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" class="form-control" name="host" type="text" value="<?= $HOST ?>"
                                        placeholder="localhost">
                                    <small id="emailHelp" class="form-text text-muted">Isikan nama server database
                                        anda, default <b>localhost</b>.</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">User</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" class="form-control" name="user" value="<?= $USER ?>" type="text" placeholder="root">
                                    <small id="emailHelp" class="form-text text-muted">Isikan nama user database anda,
                                        default <b>root</b>.</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" class="form-control" name="password" value="<?= $PASSWORD ?>" type="password" placeholder="password">
                                    <small id="emailHelp" class="form-text text-muted">Isikan password database
                                        anda.</small>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" name="process-configuration"
                                    class="btn btn-sm btn-primary">Selesai</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>