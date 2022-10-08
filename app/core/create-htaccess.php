<?php

include 'route.php';
include 'configuration.php';


class CreateHtaccess{

    public function __construct()
    {
        
        // $projectName = $_SERVER['REQUEST_URI'];

        // var_pre($projectName);

        $projectName = $_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
        $countProject = count(explode('/', $projectName));
        if($countProject > 2){
            $projectName = explode('/', $projectName, 2);
        }else{
            $projectName = explode('/', $projectName);
        }

        
        if(empty($projectName[1])){
            $projectName = "/";
        }else{
            $projectName = "/".$projectName[1];
        }
        

    
        $myfileRoot  = fopen("app/root-project.php", "w") or die("Unable to open file!");
        $content = '<?php
    include "config-project.php";
    $rootUrl = $protokol."://'.$_SERVER["HTTP_HOST"].$projectName.'";
    $rootDir = "'.$_SERVER['DOCUMENT_ROOT'].$projectName.'";';
        fwrite($myfileRoot, $content);
        fclose($myfileRoot);


        $myfile  = fopen(".htaccess", "w") or die("Unable to open file!");
    
        $content = "RewriteEngine  on
    
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.*)$ $1.php

# redirect all requests to non-existing resources to special handler
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-dWWW
RewriteRule ^(.+)$ ".$projectName."app/core/route.php?params=$1 [L,NC]";
    
    
        fwrite($myfile, $content);
        fclose($myfile);
    
        /* Store the path of source file */
    
        $filePath = '.htaccess';
    
        
    
        /* Store the path of destination file */
    
        $destinationFilePath = '.htaccess';
    
        
    
        /* Move File from images to copyImages folder */
    
        if( !rename($filePath, $destinationFilePath) ) {  
    
            echo "File can't be moved!";  
    
        }  
    
        else {  
            // view('setup/table');
        }

    }

}