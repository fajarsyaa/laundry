<?php

    function store($request)
    {

        if(!dir_project().'/resource/views/backend/'){
            mkdir(dir_project().'/resource/views/backend/');
        }

        if ($request->paket_crud) {

            makeData($request, true);
            makeForm($request, true);
            makeFormEdit($request, true);
            
        }else{

            if (!$request->type_view || $request->type_view == "blank") {

                makeBlank($request);

            }else{

                if ($request->type_view == "table") {

                    makeData($request);

                }

                if ($request->type_view == "form") {

                    makeForm($request);

                }

            }

        }

        alertSetup('Berhasil','Berhasil membuat view !','success');

        back();

        
    }

    function makeBlank($request)
    {
        $content = "";
        $replace = ["*"," ","/"];
            
        $file = str_replace($replace,"-", str_replace(".php","",$request->file));

        $folder = "";

        if ($request->exist_folder) {

            $folder = str_replace(" ","-",$request->exist_folder);

        }else{

            $folder = str_replace(" ","-",$request->folder);

        }

        mkdir(dir_project().'/resource/views/backend/'.str_replace(" ","-",$folder));

        $myfile  = fopen(dir_project()."/resource/views/backend/$folder/$file.php", "w") or die("Unable to open file!");

        fwrite($myfile, $content);
        fclose($myfile);

    }

    function makeData($request, $crud = 0)
    {

        //count column in table x

        $countColumn = query()->table(@$request->table_name)->get();

        if ($request->table_name) {

            $getCount  = mysqli_num_fields($countColumn);            
            
        }



        if ($crud) {

            $file = "data";

        }else{

            $file = $request->file;
            
        }

        $replace = ["*"," ","/"];
            
        $file = str_replace($replace,"-", str_replace(".php","",$file));

        
        $controller = "NamaController";
        
        if ($request->include_controller) {
            
            $controller = $controller = str_replace('.php','',$request->include_controller);
            
        }

        $folder = "";

        if ($request->exist_folder) {

            $folder = str_replace(" ","-",$request->exist_folder);

        }else{

            $folder = str_replace(" ","-",$request->folder);

        }
        
        mkdir(dir_project().'/resource/views/backend/'.str_replace(" ","-",$folder));

        $myfile  = fopen(dir_project()."/resource/views/backend/$folder/$file.php", "w") or die("Unable to open file!");
        $content = '<div class="card">
    <div class="card-header">
        <h3 class="card-title name-file">
            Judul
        </h3>
        <a href="<?php url("backend/'.$folder.'/form") ?>" class="btn btn-sm btn-primary shadow float-right">
            <i class="fa fa-plus"></i>
        </a>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("'.$controller.'@HapusData") ?>" method="POST">
                <table class="table table-striped data-table">
                    <thead>
                        <tr>
                            <th>No</th>
    ';
                            
        global $host;

        $getColumn = $host->query("DESC " . @$request->table_name);
                        

        while ($listColumn = mysqli_fetch_assoc($getColumn)) {

            $columnName = $listColumn["Field"];
            $columnName = ucfirst($columnName);
            $columnName = str_replace("_"," ", $columnName);

            if ($columnName != "Id") {

                $content .= "                           <th>$columnName</th>\n";
                
            }

            
        }

            // die();

                    $content .='                         <th><input type="checkbox" class="ml-2" id="check-all" style="width: 18px;height: 18px;"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach( query()->table("'.@$request->table_name.'")->get() AS $item ){ ?>

                            <tr>
                                <td> <?= $no++ ?> </td>
    ';
        $getColumns = $host->query("DESC " . @$request->table_name);
        while ($listColumnForTd = mysqli_fetch_assoc($getColumns)) {

            $columnName = $listColumnForTd["Field"];

            if ($columnName != "id") {

                $content .= "\t\t\t\t\t\t\t".'<td> <?= $item["'.$columnName.'"] ?> </td>'."\n";
                
            }
            
            
        }

                
                $content .='
                                <td>
                                    <div class="d-flex px-2">

                                        <!-- Tombol Hapus -->
                                        <input type="checkbox" class="mr-3 mt-1 check-item" value="<?php echo $item["id"] ?>" name="id_delete[]" style="width: 23px;height: 23px;">

                                        <!-- Tombol Edit -->
                                        <a href="<?php controller("'.$controller.'@EditData", $item["id"]) ?>" class="btn btn-primary btn-sm shadow">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="'.$getCount.'"></th>
                            <th>
                                <?= buttonDelete("'.@$request->table_name.'"); ?>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div><!-- /.card-body -->
</div>';

        fwrite($myfile, $content);
        fclose($myfile);

    }

    function makeForm($request, $crud = 0)
    {

        if ($crud) {

            $file = "form";

        }else{

            $file = $request->file;
            
        }

        $replace = ["*"," ","/"];
            
        $file = str_replace($replace,"-", str_replace(".php","",$file));

        $controller = "NamaController";

        if ($request->include_controller) {

            $controller = $controller = str_replace('.php','',$request->include_controller);
            
        }

        $folder = "";

        if ($request->exist_folder) {

            $folder = str_replace(" ","-",$request->exist_folder);

        }else{

            $folder = str_replace(" ","-",$request->folder);

        }

        mkdir(dir_project().'/resource/views/backend/'.str_replace(" ","-",$folder));

        $myfile  = fopen(dir_project()."/resource/views/backend/$folder/$file.php", "w") or die("Unable to open file!");

        $content = '<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Judul
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("'.$controller.'@TambahData") ?>" method="POST" enctype="multipart/form-data">
        
                <div class="form-group">
                    <label for="">Label</label>
                    <input type="text" name="???" class="form-control">
                </div>

                <?php tombolForm() ?>
                <!-- Agar fungsi tombol kembali berfungsi dengan baik, pastikan anda punya file dengan nama data.php -->

            </form>
        </div>
    </div><!-- /.card-body -->
</div>';

        fwrite($myfile, $content);
        fclose($myfile);

    }

    function makeFormEdit($request, $crud = 0)
    {

        if ($crud) {

            $file = "form-edit";

        }else{

            $file = $request->file;
            
        }

        $replace = ["*"," ","/"];
            
        $file = str_replace($replace,"-", str_replace(".php","",$file));


        $controller = "NamaController";

        if ($request->include_controller) {

            $controller = $controller = str_replace('.php','',$request->include_controller);
            
        }

        $folder = "";

        if ($request->exist_folder) {

            $folder = str_replace(" ","-",$request->exist_folder);

        }else{

            $folder = str_replace(" ","-",$request->folder);

        }

        mkdir(dir_project().'/resource/views/backend/'.str_replace(" ","-",$folder));

        $myfile  = fopen(dir_project()."/resource/views/backend/$folder/$file.php", "w") or die("Unable to open file!");

        $content = '<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Judul
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("'.$controller.'@UpdateData", $data->id) ?>" method="POST" enctype="multipart/form-data">
        
                <div class="form-group">
                    <label for="">Label</label>
                    <input type="text" name="???" class="form-control" value="<?= $data->name ?>">
                </div>

                <?php tombolForm() ?>
                <!-- Agar fungsi tombol kembali berfungsi dengan baik, pastikan anda punya file dengan nama data.php -->

            </form>
        </div>
    </div><!-- /.card-body -->
</div>';

        fwrite($myfile, $content);
        fclose($myfile);
        
    }

    function hapusFile($file)
    {

        unlink('../../resource/views/backend/'.$file->id);
        alertSetup("Berhasil","Berhasil menghapus view!");
        back();
        
    }

    function hapusFileFrontend($request)
    {
        unlink('../../resource/views/frontend/'.$request->id);
        alertSetup("Berhasil","Berhasil menghapus view!");
        back();
    }

    function hapusFolder($folder)
    {

        foreach (glob(dir_project()."/resource/views/backend/$folder->id/*") as $key => $file) {

            unlink($file);

        }

        rmdir('../../resource/views/backend/'.$folder->id);
        alertSetup("Berhasil","Berhasil menghapus view!");
        back();

    }

    function hapusFolderFrontend($folder)
    {

        foreach (glob(dir_project()."/resource/views/frontend/$folder->id/*") as $key => $file) {

            unlink($file);

        }

        rmdir('../../resource/views/frontend/'.$folder->id);
        alertSetup("Berhasil","Berhasil menghapus view!");
        back();

    }

    function editNamaFolder($oldName)
    {

        $rename = rename("../../resource/views/backend/$oldName->id", "../../resource/views/backend/".str_replace(" ","-",$oldName->new_folder_name));

        if ($rename) {

            alertSetup("Berhasil","Berhasil mengubah nama folder menjadi ".str_replace(" ","-",$oldName->new_folder_name));

        }else{

            alertSetup("Gagal","Gagal mengubah nama folder menjadi ".str_replace(" ","-",$oldName->new_folder_name), "error");

        }

        back();

    }

    function editNamaFolderFrontend($oldName)
    {
        
        $rename = rename("../../resource/views/frontend/$oldName->id", "../../resource/views/frontend/".str_replace(" ","-",$oldName->new_folder_name));

        if ($rename) {

            alertSetup("Berhasil","Berhasil mengubah nama folder menjadi ".str_replace(" ","-",$oldName->new_folder_name));

        }else{

            alertSetup("Gagal","Gagal mengubah nama folder menjadi ".str_replace(" ","-",$oldName->new_folder_name), "error");

        }

        back();

    }

    function editNamafilebackend($oldName)
    {

        $old_name = $oldName->id;
        
        $new_name = $oldName->new_file_name.".php";

        $dir      = $oldName->dir;


        $rename = rename("../../resource/views/backend/$dir/$old_name", "../../resource/views/backend/$dir/".str_replace(" ","-",$new_name));

        if ($rename) {

            alertSetup("Berhasil","Berhasil mengubah nama file menjadi ".str_replace(" ","-",$new_name));

        }else{

            alertSetup("Gagal","Gagal mengubah nama file menjadi ".str_replace(" ","-",$new_name), "error");

        }

        back();

    }

    function editNamafileFrontend($oldName)
    {

        $old_name = $oldName->id;
        
        $new_name = $oldName->new_file_name.".php";

        $dir      = $oldName->dir;


        $rename = rename("../../resource/views/frontend/$dir/$old_name", "../../resource/views/frontend/$dir/".str_replace(" ","-",$new_name));

        if ($rename) {

            alertSetup("Berhasil","Berhasil mengubah nama file menjadi ".str_replace(" ","-",$new_name));

        }else{

            alertSetup("Gagal","Gagal mengubah nama file menjadi ".str_replace(" ","-",$new_name), "error");

        }

        back();

    }