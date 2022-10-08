<div class="bg-dark">
    <div class="container  m-b-30">
        <div class="row">
            <div class="col-12 text-white p-t-40 p-b-90">

                <h4 class="">
                    Views Frontend <img src="<?= asset_setup('setup/file.png') ?>" style="max-width: 25px;" alt="">
                </h4>
                <p class="opacity-75 ">
                    Di halaman ini anda bisa membuat folder & views untuk tampilan anda.
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
                    <h5 class="card-title m-b-0">Buat Folder & File</h5>

                    <div class="card-controls">

                        <a href="#" class="js-card-fullscreen icon"></a>

                    </div>
                </div>
                <div class="card-body">

                    <form action="<?= controllerSetup('SetupViewFrontend@store'); ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Folder</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-4">

                                            <input class="form-control  name-folder" name="folder" type="text"
                                                placeholder="AwesomeFolder">
                                            <small id="emailHelp" class="form-text text-muted">Isikan nama folder yang
                                                ingin anda buat.</small>

                                        </div>
                                        <div class="col-md-4">

                                            <select style="width: 265px;" name="exist_folder" id=""
                                                class="exist_folder form-control js-select2">
                                                <option value="" selected disabled>-Pilih Folder-</option>

                                                <?php

                                                    foreach (glob(dir_project()."resource/views/frontend/*") as $key => $see) {

                                                        $see = explode('/', $see);

                                                        $attr = null;

                                                            if ($see[count($see) - 1] == "Auth") {
                                                                
                                                            }else{
                                                                ?>

                                                <option <?= $attr ?> value="<?= $see[count($see) - 1] ?>"><?= $see[count($see) - 1] ?></option>

                                                <?php
                                                            }
                                                        ?>

                                                <?php } ?>

                                            </select>


                                            <small id="emailHelp" class="form-text text-muted">Atau
                                                pilih dari folder yang sudah ada.</small>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row create-file">
                                <label class="col-sm-2 col-form-label">Nama File <span class="merah">*</span></label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-4" style="margin-top: 8px;">

                                            <input placeholder="AwesomeFile" required type="text" name="file"
                                                class="form-control file-name">

                                            <small id="emailHelp" class="form-text text-muted">Isikan nama file yang
                                                ingin anda buat. </small>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="float-right">
                                <button type="submit" class="btn btn-sm btn-primary shadow">Buat</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title m-b-0">List Folder & File</h5>
                </div>
                <div class="card-body">
                    <div class="accordion " id="accordionExample">

                        <?php

                            foreach (glob(dir_project()."resource/views/frontend/*") as $key => $folder) {

                                $folder = explode('/', $folder);

                                $folder = $folder[count($folder) - 1];

                                if (strHas($folder, ".php")) {?>

                                    <div class="card-body">
                                        <?php

                                            foreach (glob(dir_project()."resource/views/frontend/$folder") as $key => $file) {
                                                
                                                $file = explode('/', $file);

                                                $file = $file[count($file) - 1];

                                                ?>
                                                    
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th width="90%">
                                                                    <img src="<?= asset_setup('setup/file.png') ?>" style="max-width: 18px;" alt=""><?= $file ?>
                                                                </th>
                                                                <th></th>
                                                                <th>
                                                                    <a tip title="Buka <?= $folder."/".$file ?> di vscode" href="vscode://file/<?= dir_project()."resource/views/frontend/$file"?>">
                                                                        <img src="<?= asset_setup('setup/code.png') ?>" style="max-width: 18px;" alt="">
                                                                    </a>

                                                                    <a tip title="Jalankan <?= $file ?> di browser" target="_blank" href="<?= url(str_replace(".php","",$file)) ?>">
                                                                        <img src="<?= asset_setup('setup/rocket.png') ?>" style="max-width: 18px;" alt="">
                                                                    </a>

                                                                    <a data-content="<?= $file ?>" class="alert-delete ml-1" tip title="Hapus <?= $file ?>" data-url="<?= controllerSetup('SetupViewBackend@hapusFileFrontend', $file) ?>">
                                                                        <img src="<?= asset_setup('setup/cancel.png') ?>" style="max-width: 10px;" alt="">
                                                                    </a>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    
                                                <?php      

                                            }

                                            ?>
                                    </div>

                                <?php }else{


                                    if ($folder == "Auth") { }else{ ?>

                                        <div class="card" data-toggle="collapse" data-target="#collapseOne<?= $folder ?>" aria-expanded="true" aria-controls="collapseOne<?= $folder ?>">

                                            <div class="card-header" id="heading<?= $folder ?>">
                                                <span class="mb-0">

                                                    <div class="row">

                                                        <a href="#!" class="d-block">
                                                            <img src="<?= asset_setup('setup/folder.png') ?>" style="max-width: 15px;" alt=""> <?= $folder ?>
                                                        </a>

                                                        <!-- Button trigger modal -->
                                                        <a class="ml-3" data-toggle="modal" data-target="#editnamafolder<?= $folder ?>" tip title="Edit nama folder <?= $folder ?>">
                                                            <img src="<?= asset_setup('setup/edit.png') ?>" style="max-width: 10px;" alt="">
                                                        </a>

                                                        <a data-content="<?= $folder ?>" class="alert-delete ml-1" tip title="Hapus folder <?= $folder ?>" data-url="<?= controllerSetup('SetupViewBackend@hapusFolderFrontend', $folder) ?>">
                                                            <img src="<?= asset_setup('setup/cancel.png') ?>" style="max-width: 10px;" alt="">
                                                        </a>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="editnamafolder<?= $folder ?>" tabindex="-1" role="dialog" aria-labelledby="editnamafolderLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form action="<?= controllerSetup('SetupViewBackend@editNamaFolderFrontend', $folder) ?>" method="POST">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="editnamafolderLabel">Edit nama folder <?= $folder ?></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                                <input type="text" class="form-control" name="new_folder_name" placeholder="menjadi...">
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary btn-sm shadow">Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </span>
                                            </div>

                                            <div id="collapseOne<?= $folder ?>" class="collapse" aria-labelledby="heading<?= $folder ?>"
                                                data-parent="#accordionExample">
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

                                                                foreach (glob(dir_project()."resource/views/frontend/$folder/*") as $key => $file) {
                                                                    
                                                                    $file = explode('/', $file);

                                                                    $file = $file[count($file) - 1];

                                                                    ?>
                                                                        
                                                                        <tr>

                                                                            <td>
                                                                                <img src="<?= asset_setup('setup/file.png') ?>" style="max-width: 18px;" alt=""><?= $file ?>
                                                                            </td>

                                                                            <td>

                                                                                <a tip title="Buka <?= $folder."/".$file ?> di vscode" href="vscode://file/<?= dir_project()."resource/views/frontend/$folder/$file"?>">
                                                                                    <img src="<?= asset_setup('setup/code.png') ?>" style="max-width: 18px;" alt="">
                                                                                </a>

                                                                                <a tip title="Jalankan <?= $folder."/".$file ?> di browser" target="_blank" href="<?= url("$folder/".str_replace('.php','',$file)) ?>">
                                                                                    <img src="<?= asset_setup('setup/rocket.png') ?>" style="max-width: 18px;" alt="">
                                                                                </a>

                                                                                <!-- Button trigger modal -->
                                                                                <a class="mx-1" data-toggle="modal" data-target="#editnamafileFrontend<?= str_replace(".php","",$file) ?>" tip title="Edit nama controller <?= $file ?>">
                                                                                    <img src="<?= asset_setup('setup/edit.png') ?>" style="max-width: 13px;" alt="">
                                                                                </a>

                                                                                <a data-content="<?= $file ?>" class="alert-delete ml-1" tip title="Hapus <?= $file ?>" data-url="<?= controllerSetup('SetupViewBackend@hapusFileFrontend', $folder."/".$file) ?>">
                                                                                    <img src="<?= asset_setup('setup/cancel.png') ?>" style="max-width: 10px;" alt="">
                                                                                </a>

                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="editnamafileFrontend<?= str_replace(".php","",$file) ?>" tabindex="-1" role="dialog" aria-labelledby="editnamafileFrontendLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <form action="<?= controllerSetup('SetupViewBackend@editNamafileFrontend', $file) ?>" method="POST">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="editnamafileFrontendLabel">Edit nama file <?= $file ?></h5>
                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                        <input type="text" class="form-control" name="new_file_name" placeholder="menjadi...">
                                                                                                        <input type="hidden"name="dir" value="<?= $folder ?>">
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
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>  

                                <?php } ?>

                            <?php } ?>

                        <?php } ?>

                    </div>
                    
                </div>
            </div>
        </div>

    </div>


</div>