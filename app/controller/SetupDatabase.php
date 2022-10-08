<?php

    function createDB($request)
    {

        $host     = empty($request->host)     ? "localhost": $request->host;
        $user     = empty($request->user)     ? "root"     : $request->user;
        $password = empty($request->password) ? ""     : $request->password;

        $auth     = $request->featured_auth;
        $redirect = $request->redirect;

        if ($request->exist_database) {

            $database = $request->exist_database;

        }else{

            $database = $request->database;
            
            //Create Database
            $conn = new mysqli($host,$user,$password);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Create database
            $sql = "CREATE DATABASE $database";

            if($conn->query($sql) === TRUE){
                view('setup/table');
            }else{
            }

            $conn->close();
            
        }

        if ($auth == "active") {
            $auth = true;
            $auth = str_replace('1','true',$auth);
        }else{
            $auth = 0;
            $auth = str_replace('0','false',$auth);
        }

        $myfile  = fopen("configuration.php", "w") or die("Unable to open file!");

        $content = "<?php\n";
    $content .= '
    $HOST          = "'.$host.'";
    $USER          = "'.$user.'";
    $PASSWORD      = "'.$password.'";
    $DATABASE      = "'.$database.'";';

        fwrite($myfile, $content);
        fclose($myfile);

        /* Store the path of source file */

        $filePath = 'configuration.php';

        

        /* Store the path of destination file */

        $destinationFilePath = dir_project().'/configuration.php';

        

        /* Move File from images to copyImages folder */

        if( !rename($filePath, $destinationFilePath) ) {  
            echo "File can't be moved!";  
        }else {  
            alertSetup("Berhasil setting database", "Project anda sudah terhubung dengan database $database", "success");
            view('setup/database/data');
        }
    }