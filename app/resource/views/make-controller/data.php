<div class="bg-dark">
    <div class="container  m-b-30">
        <div class="row">
            <div class="col-12 text-white p-t-40 p-b-90">

                <h4 class="">
                    Controller <img src="<?= asset_setup('setup/controller.png') ?>" style="max-width: 25px;" alt="">
                </h4>
                <p class="opacity-75 ">
                    Di halaman ini anda bisa membuat file controller untuk sistem anda.
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
                    <h5 class="card-title m-b-0">Buat Controller</h5>

                    <div class="card-controls">

                        <a href="#" class="js-card-fullscreen icon"></a>

                    </div>
                </div>
                <div class="card-body">

                <form action="<?= controllerSetup('SetupController@store') ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Controller </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-6">

                                        <input class="form-control" name="controller" type="text" required placeholder="AwesomeController">
                                        <small id="emailHelp" class="form-text text-muted">Isikan nama controller yang
                                            ingin anda buat.</small>

                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fungsi Otomatis</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-6" style="margin-top: 8px;">

                                        <input type="checkbox" checked name="auto_function" id="">
                                        <small id="emailHelp" class="form-text text-muted">
                                            Jika anda centang, maka <code>function dasar</code> otomatis akan terbuat,
                                            seperti : <br>
                                            <code>TambahData()</code>, <code>EditData()</code>,
                                            <code>UpdateData()</code>, <code>HapusData()</code>
                                        </small>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="float-right">
                            <button type="submit" class="btn btn-sm btn-primary">Buat</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>

            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title m-b-0">List File Controller</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover datatable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                foreach (glob(dir_project()."controller/*") as $key => $file) {
                                    $file = explode('/', $file);

                                    $file = $file[count($file) - 1];

                                    if ($file != "Auth") {

                                        ?>

                                            <tr>

                                                <td>
                                                    <img src="<?= asset_setup('setup/controller.png') ?>" style="max-width: 18px;" alt="" class="mr-2"><?= $file ?>
                                                </td>

                                                <td>

                                                    <a class="mx-1" tip title="Buka <?= $file ?> di vscode" href="vscode://file/<?= dir_project()."/controller/$file"?>">
                                                        <img src="<?= asset_setup('setup/code.png') ?>" style="max-width: 18px;" alt="">
                                                    </a>

                                                    <a class="alert-delete mx-1" data-content="<?= $file ?>" tip title="Hapus controller <?= $file ?>" data-url="<?= controllerSetup('SetupController@hapusFile', $file) ?>">
                                                        <img src="<?= asset_setup('setup/cancel.png') ?>" style="max-width: 13px;" alt="">
                                                    </a>

                                                    <!-- Button trigger modal -->
                                                    <a class="mx-1" data-toggle="modal" data-target="#editnamaController<?= str_replace(".php","",$file) ?>" tip title="Edit nama controller <?= $file ?>">
                                                        <img src="<?= asset_setup('setup/edit.png') ?>" style="max-width: 13px;" alt="">
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editnamaController<?= str_replace(".php","",$file) ?>" tabindex="-1" role="dialog" aria-labelledby="editnamaControllerLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <form action="<?= controllerSetup('SetupController@editNamaController', $file) ?>" method="POST">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editnamaControllerLabel">Edit nama file <?= $file ?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                            <input type="text" class="form-control" name="new_file_name" placeholder="menjadi...">
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary btn-sm shadow">Simpan</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </td>

                                            </tr>

                                        <?php
                                        
                                    }

                                    ?>
                                        
                                        
                                    <?php      

                                }

                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

    </div>


</div>