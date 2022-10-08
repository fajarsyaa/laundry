<?php

    function store($request)
    {
        $content = '<?php
    
    /*
    * File untuk mengatur layouting views
    * Developer bisa mengatur header, menu serta footer
    * Anda bisa membedakan menjadi 2 layouts
    * Misal : Backend & Frontend
    */

    /* Backend */

    $backendHeader = "'.$request->backend_header.'";

    $backendMenu   = "'.$request->backend_menu.'";

    $backendFooter = "'.$request->backend_footer.'";

    /* Frontend */

    $frontendHeader = "'.$request->frontend_header.'";

    $frontendMenu   = "'.$request->frontend_menu.'";

    $frontendFooter = "'.$request->frontend_footer.'";

    /* Note : semua isi variable sudah mengarah ke direktori resource/layouts */';

        $myfile  = fopen(dir_project()."/resource/config.php", "w") or die("Unable to open file!");

        fwrite($myfile, $content);
        fclose($myfile);

        alertSetup('Berhasil memperbaruhi file view config!');
        back();
    }