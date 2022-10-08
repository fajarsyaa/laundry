<?php

    function store($request)
    {

        $createConfigFile  = fopen(dir_project()."/app/config-project.php", "w") or die("Unable to open file!");

            $content = "<?php

    '$'protokol     = '$request->protokol'; 

    '$'redirectView = '$request->redirect_view';
            ";

            $content = str_replace("'$'",'$',$content);

            fwrite($createConfigFile, $content);
            fclose($createConfigFile);
        
            alertSetup("Berhasil","Berhasil diupdate untuk file setting/config.php");

            view('setup/setting/setting');
    }