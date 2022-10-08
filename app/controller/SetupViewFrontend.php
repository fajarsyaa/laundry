<?php

    function store($request)
    {

        if(!dir_project().'/resource/views/frontend/'){
            mkdir(dir_project().'/resource/views/frontend/');
        }

        $folder = "";

        if ($request->exist_folder) {

            $folder = $request->exist_folder;

        }else{

            $folder = $request->folder;

        }

        $replace = ["*"," ","/"];
            
        $file = str_replace($replace,"-", str_replace(".php","",$request->file));

        mkdir(dir_project().'/resource/views/frontend/'.$folder);

        $myfile  = fopen(dir_project()."/resource/views/frontend/$folder/$file.php", "w") or die("Unable to open file!");

        $content = "<div><h1>$file</h1></div>";

        fwrite($myfile, $content);
        fclose($myfile);

        alertSetup('Berhasil membuat file baru di frontend dengan nama'.$file);
        back();

    }