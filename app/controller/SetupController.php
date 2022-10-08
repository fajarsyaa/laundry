<?php

    function store($request)
    {
        
        $cekFile  = false;
        $namaFile = str_replace('.php','',$request->controller).".php";
        
        if(!is_dir(dir_project()."/controller/")){
            mkdir(dir_project()."/controller/");
        }

        foreach (glob(dir_project()."/controller/$namaFile") as $see) {
            $cekFile = true;
        }

        if ($cekFile) {

            alertSetup('Nama file sudah ada!','Gunakan nama lain','error');
            view('setup/make-controller/data');
            
            die();
            exit();
            
        }

        date_default_timezone_set("Asia/Jakarta");
        $date = date('d M Y H:i');

        $controllerName = str_replace(".php","",$request->controller);
        

        $myfile  = fopen(dir_project()."/controller/$controllerName.php", "w") or die("Unable to open file!");

        $content = "<?php";

        if ($request->auto_function) {
            $content .= "

    function TambahData('$'request)
    {

        query()->insert('nama_table',[

            '$'request->name_inputan1,
            '$'request->name_inputan2

        ])->view('backend/folder/file','Berhasil!');

    }

    function EditData('$'request)
    {

        '$'data = query()->table('nama_table')->where('id','$'request->id)->single();

        view('backend/folder/file', compact('data'));

    }

    function UpdateData('$'request)
    {

        query()->update('nama_table',[

            'kolom_table1' => '$'request->name_input1,
            'kolom_table2' => '$'request->name_input2

        ], '$'request->id)->view('backend/folder/file','Berhasil!');

    }

    function HapusData('$'request)
    {

        '$'id = '$'request->id_delete;

        for ('$'i=0; '$'i < count('$'request->id_delete) ; '$'i++) { 
            
            query()->table('nama_table')->where('id', '$'id['$'i])->delete();
            
        }

        alert('Berhasil !','Data berhasil dihapus');
        view('backend/folder/file');

    }

   /*
    |--------------------------------------------------------------------------
    | PandoraCode Phoenix
    |--------------------------------------------------------------------------
    |
    | Nama File   : $controllerName
    | Dibuat pada : $date
    | 
    */"
    
    ;    
        }

        $content = str_replace("'$'",'$',$content);

        fwrite($myfile, $content);
        fclose($myfile);

        alertSetup('Berhasil','Berhasil membuat controller '.$namaFile);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function hapusFile($file)
    {

        unlink('../../controller/'.$file->id);
        alertSetup("Berhasil","Berhasil menghapus controller!");
        back();
        
    }

    function editNamaController($oldName)
    {

        $old_name = $oldName->id;
        
        $new_name = $oldName->new_file_name.".php";

        $rename = rename("../../controller/$old_name", "../../controller/".str_replace(" ","-",$new_name));

        if ($rename) {

            alertSetup("Berhasil","Berhasil mengubah nama file menjadi ".str_replace(" ","-",$new_name));

        }else{

            alertSetup("Gagal","Gagal mengubah nama file menjadi ".str_replace(" ","-",$new_name), "error");

        }

        back();

    }